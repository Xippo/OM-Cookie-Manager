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
 * CookiePanel
 */
class CookiePanel extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * name
     *
     * @var string
     */
    #[TYPO3\CMS\Extbase\Annotation\Validate(['validator' => 'NotEmpty'])]
    protected $name = '';

    /**
     * description
     *
     * @var string
     */
    protected $description = '';

    /**
     * Link to cookie policy
     *
     * @var string
     */
    protected $link = '';

    /**
     * Link text to cookie policy
     *
     * @var string
     */
    protected $linkText = '';

    /**
     * Link to legal notice
     *
     * @var string
     */
    protected $linkLegalNotice = '';

    /**
     * Link Text for legal notice
     *
     * @var string
     */
    protected $linkLegalNoticeText = '';

    /**
     * groups
     *
     * @var string
     */
    protected $groups = '';



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
     * Returns the link
     *
     * @return string $link
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * Sets the link
     *
     * @param string $link
     * @return void
     */
    public function setLink($link): void
    {
        $this->link = $link;
    }

    /**
     * @return string
     */
    public function getGroups()
    {
        return $this->groups;
    }

    /**
     * @param string $groups
     */
    public function setGroups($groups): void
    {
        $this->groups = $groups;
    }

    public function getLinkText(): string
    {
        return $this->linkText;
    }

    public function setLinkText(string $linkText): void
    {
        $this->linkText = $linkText;
    }

    public function getLinkLegalNotice(): string
    {
        return $this->linkLegalNotice;
    }

    public function setLinkLegalNotice(string $linkLegalNotice): void
    {
        $this->linkLegalNotice = $linkLegalNotice;
    }

    public function getLinkLegalNoticeText(): string
    {
        return $this->linkLegalNoticeText;
    }

    public function setLinkLegalNoticeText(string $linkLegalNoticeText): void
    {
        $this->linkLegalNoticeText = $linkLegalNoticeText;
    }

}
