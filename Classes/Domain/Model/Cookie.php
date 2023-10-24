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
 * Cookie
 */
class Cookie extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
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
     * lifetime
     *
     * @var string
     */
    protected $lifetime = '';

    /**
     * provider
     *
     * @var string
     */
    protected $provider = '';

    /**
     * cookieGroup
     *
     * @var \OM\OmCookieManager\Domain\Model\CookieGroup
     */
    protected $cookieGroup = null;

    /**
     * cookieHtml
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\OM\OmCookieManager\Domain\Model\CookieHtml>
     * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
     */
    protected $cookieHtml = null;

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
        $this->cookieHtml = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    }

    /**
     * Adds a CookieHtml
     *
     * @param \OM\OmCookieManager\Domain\Model\CookieHtml $cookieHtml
     * @return void
     */
    public function addCookieHtml(\OM\OmCookieManager\Domain\Model\CookieHtml $cookieHtml)
    {
        $this->cookieHtml->attach($cookieHtml);
    }

    /**
     * Removes a CookieHtml
     *
     * @param \OM\OmCookieManager\Domain\Model\CookieHtml $cookieHtmlToRemove The CookieHtml to be removed
     * @return void
     */
    public function removeCookieHtml(\OM\OmCookieManager\Domain\Model\CookieHtml $cookieHtmlToRemove)
    {
        $this->cookieHtml->detach($cookieHtmlToRemove);
    }

    /**
     * Returns the cookieHtml
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\OM\OmCookieManager\Domain\Model\CookieHtml> $cookieHtml
     */
    public function getCookieHtml()
    {
        return $this->cookieHtml;
    }

    /**
     * Sets the cookieHtml
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\OM\OmCookieManager\Domain\Model\CookieHtml> $cookieHtml
     * @return void
     */
    public function setCookieHtml(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $cookieHtml)
    {
        $this->cookieHtml = $cookieHtml;
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
     * Returns the provider
     *
     * @return string $provider
     */
    public function getProvider()
    {
        return $this->provider;
    }

    /**
     * Sets the provider
     *
     * @param string $provider
     * @return void
     */
    public function setProvider($provider)
    {
        $this->provider = $provider;
    }

    /**
     * Returns the cookieGroup
     *
     * @return \OM\OmCookieManager\Domain\Model\CookieGroup $cookieGroup
     */
    public function getCookieGroup()
    {
        return $this->cookieGroup;
    }

    /**
     * Sets the cookieGroup
     *
     * @param \OM\OmCookieManager\Domain\Model\CookieGroup $cookieGroup
     * @return void
     */
    public function setCookieGroup(\OM\OmCookieManager\Domain\Model\CookieGroup $cookieGroup)
    {
        $this->cookieGroup = $cookieGroup;
    }


	/**
	 * lifetime
	 *
	 * @return string
	 */
	public function getLifetime() {
		return $this->lifetime;
	}

	/**
	 * lifetime
	 *
	 * @param string $lifetime lifetime
	 * @return self
	 */
	public function setLifetime($lifetime): self {
		$this->lifetime = $lifetime;
		return $this;
	}
}
