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
 * CookieGroup
 */
class CookieGroup extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * name
     * 
     * @var string
     * @TYPO3\CMS\Extbase\Annotation\Validate("NotEmpty")
     */
    protected $name = '';

    /**
     * description
     *
     * @var string
     */
    protected $description = '';

    /**
     * gtm event name
     *
     * @var string
     */
    protected $gtmEventName = '';

    /**
     * essential
     * 
     * @var bool
     */
    protected $essential = false;

    /**
     * cookies
     * 
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\OM\OmCookieManager\Domain\Model\Cookie>
     * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
     */
    protected $cookies = null;

    /**
     * __construct
     */
    public function __construct()
    {

        //Do not remove the next line: It would break the functionality
        $this->initStorageObjects();
    }

    /**
     * Initializes all ObjectStorage properties
     * Do not modify this method!
     * It will be rewritten on each save in the extension builder
     * You may modify the constructor of this class instead
     * 
     * @return void
     */
    protected function initStorageObjects()
    {
        $this->cookies = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    }

    /**
     * Returns the name
     * 
     * @return string $name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets the name
     * 
     * @param string $name
     * @return void
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Returns the description
     * 
     * @return string $description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Sets the description
     * 
     * @param string $description
     * @return void
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * Returns the essential
     * 
     * @return bool $essential
     */
    public function getEssential()
    {
        return $this->essential;
    }

    /**
     * Sets the essential
     * 
     * @param bool $essential
     * @return void
     */
    public function setEssential($essential)
    {
        $this->essential = $essential;
    }

    /**
     * Returns the boolean state of essential
     * 
     * @return bool
     */
    public function isEssential()
    {
        return $this->essential;
    }

    /**
     * Adds a Cookie
     * 
     * @param \OM\OmCookieManager\Domain\Model\Cookie $cooky
     * @return void
     */
    public function addCooky(\OM\OmCookieManager\Domain\Model\Cookie $cooky)
    {
        $this->cookies->attach($cooky);
    }

    /**
     * Removes a Cookie
     * 
     * @param \OM\OmCookieManager\Domain\Model\Cookie $cookyToRemove The Cookie to be removed
     * @return void
     */
    public function removeCooky(\OM\OmCookieManager\Domain\Model\Cookie $cookyToRemove)
    {
        $this->cookies->detach($cookyToRemove);
    }

    /**
     * Returns the cookies
     * 
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\OM\OmCookieManager\Domain\Model\Cookie> $cookies
     */
    public function getCookies()
    {
        return $this->cookies;
    }

    /**
     * Sets the cookies
     * 
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\OM\OmCookieManager\Domain\Model\Cookie> $cookies
     * @return void
     */
    public function setCookies(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $cookies)
    {
        $this->cookies = $cookies;
    }

    /**
     * @return string
     */
    public function getGtmEventName()
    {
        return $this->gtmEventName;
    }

    /**
     * @param string $gtmEventName
     */
    public function setGtmEventName(string $gtmEventName)
    {
        $this->gtmEventName = $gtmEventName;
    }
}
