<?php
namespace OM\OmCookieManager\Domain\Model;

use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use OM\OmCookieManager\Domain\Model\TYPO3\CMS\Extbase\Annotation\Validate;
use OM\OmCookieManager\Domain\Model\TYPO3\CMS\Extbase\Annotation\ORM\Cascade;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;

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
class CookieGroup extends AbstractEntity
{

    /**
     * title
     *
     * @var string
     */
    protected $title = '';

    /**
     * name
     *
     * @var string
     */
    #[Validate(['validator' => 'NotEmpty'])]
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
     * gtm consent mode groups
     *
     * @var string
     */
    protected $gtmConsentGrps = '';

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
     */
    #[Cascade(['value' => 'remove'])]
    protected $cookies = null;

    /**
     * existing cookies
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\OM\OmCookieManager\Domain\Model\Cookie>
     */
    protected $existingCookies = null;

    /**
     * keywords
     *
     * @var string
     */
    protected $keywords = '';

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
        $this->cookies = new ObjectStorage();
    }

    /**
     * Returns the title
     *
     * @return string $title
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * Sets the title
     *
     * @param string $title
     * @return void
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
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
    public function setName($name): void
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
    public function setDescription($description): void
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
    public function setEssential($essential): void
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
    public function addCooky(Cookie $cooky): void
    {
        $this->cookies->attach($cooky);
    }

    /**
     * Removes a Cookie
     *
     * @param \OM\OmCookieManager\Domain\Model\Cookie $cookyToRemove The Cookie to be removed
     * @return void
     */
    public function removeCooky(Cookie $cookyToRemove): void
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
    public function setCookies(ObjectStorage $cookies): void
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
    public function setGtmEventName(string $gtmEventName): void
    {
        $this->gtmEventName = $gtmEventName;
    }

    /**
     * @return string
     */
    public function getGtmConsentGrps(): string
    {
        return $this->gtmConsentGrps;
    }

    /**
     * @param string $gtmConsentGrps
     */
    public function setGtmConsentGrps(string $gtmConsentGrps): void
    {
        $this->gtmConsentGrps = $gtmConsentGrps;
    }

    public function getExistingCookies(): ?ObjectStorage
    {
        return $this->existingCookies;
    }

    public function setExistingCookies(?ObjectStorage $existingCookies): void
    {
        $this->existingCookies = $existingCookies;
    }

    public function getKeywords(): string
    {
        return $this->keywords;
    }

    public function setKeywords(string $keywords): void
    {
        $this->keywords = $keywords;
    }
}
