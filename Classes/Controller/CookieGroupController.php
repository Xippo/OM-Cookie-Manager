<?php
namespace OM\OmCookieManager\Controller;


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
 * CookieGroupController
 */
class CookieGroupController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * cookieGroupRepository
     * 
     * @var \OM\OmCookieManager\Domain\Repository\CookieGroupRepository
     */
    protected $cookieGroupRepository = null;

    public function __construct(\OM\OmCookieManager\Domain\Repository\CookieGroupRepository $cookieGroupRepository)
    {
        $this->cookieGroupRepository = $cookieGroupRepository;
    }

    /**
     * action list
     * 
     * @return void
     */
    public function listAction(): \Psr\Http\Message\ResponseInterface
    {
        $cookieGroups = $this->cookieGroupRepository->findAll();
        $this->view->assign('cookieGroups', $cookieGroups);
        return $this->htmlResponse();
    }

    /**
     * action show
     * 
     * @param \OM\OmCookieManager\Domain\Model\CookieGroup $cookieGroup
     * @return void
     */
    public function showAction(\OM\OmCookieManager\Domain\Model\CookieGroup $cookieGroup): \Psr\Http\Message\ResponseInterface
    {
        $this->view->assign('cookieGroup', $cookieGroup);
        return $this->htmlResponse();
    }
}
