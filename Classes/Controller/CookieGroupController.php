<?php

declare(strict_types=1);

namespace OM\OmCookieManager\Controller;

use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use OM\OmCookieManager\Domain\Repository\CookieGroupRepository;
use Psr\Http\Message\ResponseInterface;
use OM\OmCookieManager\Domain\Model\CookieGroup;

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
class CookieGroupController extends ActionController
{

    /**
     * cookieGroupRepository
     * 
     * @var \OM\OmCookieManager\Domain\Repository\CookieGroupRepository
     */
    protected $cookieGroupRepository = null;

    public function __construct(CookieGroupRepository $cookieGroupRepository)
    {
        $this->cookieGroupRepository = $cookieGroupRepository;
    }

    /**
     * action list
     * 
     * @return void
     */
    public function listAction(): ResponseInterface
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
    public function showAction(CookieGroup $cookieGroup): ResponseInterface
    {
        $this->view->assign('cookieGroup', $cookieGroup);
        return $this->htmlResponse();
    }
}
