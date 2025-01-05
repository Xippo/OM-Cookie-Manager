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

}
