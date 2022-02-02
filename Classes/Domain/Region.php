<?php

namespace WapplerSystems\SiteRegion\Domain\Model;


use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

class Region extends AbstractEntity
{
    /**
     * title
     *
     * @var \string
     * @TYPO3\CMS\Extbase\Annotation\Validate("NotEmpty")
     */
    protected $title;


    /**
     * __construct
     */
    public function __construct()
    {

    }


    /**
     * Returns the title
     *
     * @return \string $title
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Sets the title
     *
     * @param string $title
     * @return \void
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

}
