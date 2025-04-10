<?php
namespace OM\OmCookieManager\Controller;


use OM\OmCookieManager\Domain\Model\CookieGroup;
use OM\OmCookieManager\Domain\Model\CookiePanel;
use TYPO3\CMS\Core\Domain\ConsumableString;
use TYPO3\CMS\Core\Page\PageRenderer;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Utility\PathUtility;
use TYPO3\CMS\Extbase\Utility\DebuggerUtility;
use TYPO3\CMS\Frontend\Controller\TypoScriptFrontendController;

/***
 *
 * This file is part of the "OM Cookie Manager " Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2019 Oliver Pfaff <info@olli-machts.de>, Olli machts
 *
 ***/
/**
 * CookiePanelController
 */
class CookiePanelController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * cookiePanelRepository
     *
     * @var \OM\OmCookieManager\Domain\Repository\CookiePanelRepository
     */
    protected $cookiePanelRepository = null;

    /**
     * @param \OM\OmCookieManager\Domain\Repository\CookiePanelRepository $cookiePanelRepository
     */
    public function injectCookiePanelRepository(\OM\OmCookieManager\Domain\Repository\CookiePanelRepository $cookiePanelRepository)
    {
        $this->cookiePanelRepository = $cookiePanelRepository;
    }

    /**
     * cookieGroupRepository
     *
     * @var \OM\OmCookieManager\Domain\Repository\CookieGroupRepository
     */
    protected $cookieGroupRepository = null;

    /**
     * @param \OM\OmCookieManager\Domain\Repository\CookieGroupRepository $cookieGroupRepository
     */
    public function injectCookieGroupRepository(\OM\OmCookieManager\Domain\Repository\CookieGroupRepository $cookieGroupRepository)
    {
        $this->cookieGroupRepository = $cookieGroupRepository;
    }

    public function initializeShowAction()
    {
        /** @var PageRenderer $pageRenderer */
        $pageRenderer = GeneralUtility::makeInstance(PageRenderer::class);
        if(empty($this->settings['googleConsentModeV2']) === false) {
            /** @var ConsumableString|null $nonce */
            $nonceAttribute = $this->request->getAttribute('nonce');
            $nonce = '';
            if ($nonceAttribute instanceof ConsumableString) {
                $nonce = $nonceAttribute->consume();
            }
            $googleConsentModeV2DefaultValues = "
            <script nonce='".$nonce."'>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
    
            gtag('consent', 'default', {
              'ad_storage': 'denied',
              'ad_user_data': 'denied',
              'ad_personalization': 'denied',
              'analytics_storage': 'denied'
            });
            </script>
            ";
            $pageRenderer->addHeaderData($googleConsentModeV2DefaultValues);
        }
        if(empty($this->settings['js']) === false){
            $pageRenderer->addJsFooterFile($this->settings['js']);
        }
        if(empty($this->settings['css']) === false) {
            $pageRenderer->addCssFile($this->settings['css']);
        }
    }

    /**
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function showAction()
    {
        $allPanels = $this->cookiePanelRepository->findAll();
        if($allPanels->count() > 0){
            //render only the first
            /** @var CookiePanel $panel */
            $panel = $allPanels->getFirst();
            $this->view->assign('cookiePanel',$panel);
            $groupIds = explode(',',$panel->getGroups());
            if(count($groupIds) > 0){
                // @todo make some nice sql query in repo for this
                foreach ($groupIds as $id){
                    /** @var CookieGroup $grp */
                    $grp = $this->cookieGroupRepository->findByUid((int)$id);
                    if($grp !== null){
                        if($grp->getEssential() === true){
                            $this->view->assign('essential',true);
                        }
                        $cookieGroups[] = $grp;
                    }
                }
            }
            if(is_array($cookieGroups) && count($cookieGroups) > 0){
                $grpJson = \OM\OmCookieManager\Utility\JsBuilder::buildCompleteGrpJson($cookieGroups, $this->request);
                /** @var PageRenderer $pageRenderer */
                $pageRenderer = GeneralUtility::makeInstance(PageRenderer::class);
                $pageRenderer->addHeaderData('<script id="om-cookie-consent" type="application/json">'.$grpJson.'</script>');
            }
            if (true === isset($cookieGroups)){
                $this->view->assign('cookieGroups',$cookieGroups);
            }
            //check if panel should be suppressed
            if(false === empty($this->settings['dontShowOnPids'])){
                // false positive
                // @extensionScannerIgnoreLine
                $pageUid = $this->request->getAttribute('frontend.controller')->id;
                $supressPIds = array_map('intval',explode(',',$this->settings['dontShowOnPids']));
                if (true === in_array($pageUid, $supressPIds, true)){
                    $this->view->assign('suppressPanel',1);
                }
            }
            //check links and set default if needed
            if(true === empty($panel->getLink()) && false === empty($this->settings['privacyPolicyPid'])){
                $panel->setLink($this->settings['privacyPolicyPid']);
            }
            if(true === empty($panel->getLinkLegalNotice()) && false === empty($this->settings['legalNoticePid'])){
                $panel->setLinkLegalNotice($this->settings['legalNoticePid']);
            }
        }
        return $this->htmlResponse();
    }

    /**
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function infoAction()
    {
        $allPanels = $this->cookiePanelRepository->findAll();

        if($allPanels->count() > 0) {
            //render only the first
            /** @var CookiePanel $panel */
            $panel = $allPanels->getFirst();
            $groupIds = explode(',',$panel->getGroups());

            foreach ($groupIds as $id){
                /** @var CookieGroup $grp */
                $grp = $this->cookieGroupRepository->findByUid((int)$id);
                if($grp !== null){
                    $cookieGroups[] = $grp;
                }
            }
            if (true === isset($cookieGroups)){
                $this->view->assign('cookieGroups',$cookieGroups);
            }
        }

        return $this->htmlResponse();
    }
}
