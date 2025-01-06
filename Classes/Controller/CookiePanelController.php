<?php
namespace OM\OmCookieManager\Controller;


use OM\OmCookieManager\Domain\Model\CookieGroup;
use OM\OmCookieManager\Domain\Model\CookiePanel;
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

    public function __construct(\OM\OmCookieManager\Domain\Repository\CookiePanelRepository $cookiePanelRepository, \OM\OmCookieManager\Domain\Repository\CookieGroupRepository $cookieGroupRepository)
    {
        $this->cookiePanelRepository = $cookiePanelRepository;
        $this->cookieGroupRepository = $cookieGroupRepository;
    }

    /**
     * cookieGroupRepository
     *
     * @var \OM\OmCookieManager\Domain\Repository\CookieGroupRepository
     */
    protected $cookieGroupRepository = null;

    public function initializeShowAction(): void
    {
        /** @var PageRenderer $pageRenderer */
        $pageRenderer = GeneralUtility::makeInstance(PageRenderer::class);
        if(empty($this->settings['googleConsentModeV2']) === false) {
            $googleConsentModeV2DefaultValues = "
            <script> 
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
    public function showAction(): \Psr\Http\Message\ResponseInterface
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
        }
        return $this->htmlResponse();
    }

    /**
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function infoAction(): \Psr\Http\Message\ResponseInterface
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
