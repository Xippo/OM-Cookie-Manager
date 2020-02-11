<?php
namespace OM\OmCookieManager\Controller;


use OM\OmCookieManager\Domain\Model\CookieGroup;
use OM\OmCookieManager\Domain\Model\CookiePanel;
use TYPO3\CMS\Core\Page\PageRenderer;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Utility\PathUtility;

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
        $pageRenderer = $this->objectManager->get(PageRenderer::class);
        //compatibility < 8
        if(\TYPO3\CMS\Core\Utility\VersionNumberUtility::convertVersionNumberToInteger(\TYPO3\CMS\Core\Utility\VersionNumberUtility::getCurrentTypo3Version()) < 8007000){
            $jsPath = rtrim(PathUtility::getRelativePathTo(GeneralUtility::getFileAbsFileName($this->settings['js'])), '/');
            $pageRenderer->addJsFooterFile($jsPath);
            $cssPath = rtrim(PathUtility::getRelativePathTo(GeneralUtility::getFileAbsFileName($this->settings['css'])), '/');
            $pageRenderer->addCssFile($cssPath);

        }else{
            $pageRenderer->addJsFooterFile($this->settings['js']);
            $pageRenderer->addCssFile($this->settings['css']);
        }
    }

    /**
     * action show
     *
     * @return void
     */
    public function showAction()
    {
        $allPanels = $this->cookiePanelRepository->findAll();
        if($allPanels->count() > 0){
            //render only the first
            /** @var CookiePanel $panel */
            $panel = $allPanels->getFirst();
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
                $grpJson = \OM\OmCookieManager\Utility\JsBuilder::buildCompleteGrpJson($cookieGroups);
                /** @var PageRenderer $pageRenderer */
                $pageRenderer = $this->objectManager->get(PageRenderer::class);
                $pageRenderer->addHeaderData('<script id="om-cookie-consent" type="application/json">'.$grpJson.'</script>');
            }

            $this->view->assign('cookiePanel',$panel);
            $this->view->assign('cookieGroups',$cookieGroups);

        }

    }

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
            $this->view->assign('cookieGroups',$cookieGroups);
        }
    }
}
