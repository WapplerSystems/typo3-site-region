<?php

namespace WapplerSystems\SiteRegion\Domain\Model;


use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

class Region extends AbstractEntity
{

    /**
     * title
     *
     * @var string
     */
    protected $title;


    /**
     * @var string
     */
    protected $shortname;


    /**
     * @var string
     */
    protected $flag;

    /**
     * @var []
     */
    protected $subRegions;


    /**
     * @var []
     */
    protected $languages;


    /** @var int */
    protected $level;


    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getShortname(): string
    {
        return $this->shortname;
    }

    /**
     * @param string $shortname
     */
    public function setShortname(string $shortname): void
    {
        $this->shortname = $shortname;
    }

    /**
     * @return string
     */
    public function getFlag(): string
    {
        return $this->flag;
    }

    /**
     * @param string $flag
     */
    public function setFlag(string $flag): void
    {
        $this->flag = $flag;
    }

    /**
     * @return mixed
     */
    public function getSubRegions()
    {
        return $this->subRegions;
    }

    /**
     * @param mixed $subRegions
     */
    public function setSubRegions($subRegions): void
    {
        $this->subRegions = $subRegions;
    }

    /**
     * @return mixed
     */
    public function getLanguages()
    {
        return $this->languages;
    }

    /**
     * @param mixed $languages
     */
    public function setLanguages($languages): void
    {
        $this->languages = $languages;
    }

    /**
     * @return int
     */
    public function getLevel(): int
    {
        return $this->level;
    }

    /**
     * @param int $level
     */
    public function setLevel(int $level): void
    {
        $this->level = $level;
    }

}
