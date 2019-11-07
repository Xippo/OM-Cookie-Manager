<?php
namespace OM\OmCookieManager\Domain\Model;


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
 * CookieHtml
 */
class CookieHtml extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * html
     * 
     * @var string
     */
    protected $html = '';

    /**
     * insertPlace
     * 
     * @var int
     */
    protected $insertPlace = 0;

    /**
     * Returns the html
     * 
     * @return string $html
     */
    public function getHtml()
    {
        return $this->html;
    }

    /**
     * Sets the html
     * 
     * @param string $html
     * @return void
     */
    public function setHtml($html)
    {
        $this->html = $html;
    }

    /**
     * Returns the insertPlace
     * 
     * @return int $insertPlace
     */
    public function getInsertPlace()
    {
        return $this->insertPlace;
    }

    /**
     * Sets the insertPlace
     * 
     * @param int $insertPlace
     * @return void
     */
    public function setInsertPlace($insertPlace)
    {
        $this->insertPlace = $insertPlace;
    }


}
