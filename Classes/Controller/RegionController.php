<?php

namespace WapplerSystems\SiteRegion\Controller;

use TYPO3\CMS\Core\Site\Entity\SiteLanguage;
use TYPO3\CMS\Core\Site\SiteFinder;
use TYPO3\CMS\Core\Utility\DebugUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use WapplerSystems\SiteRegion\Domain\Model\Region;
use WapplerSystems\SiteRegion\Domain\Repository\RegionRepository;


/**
 *
 */
class RegionController extends ActionController
{

    /**
     *
     * @return void
     */
    public function listAction(): void
    {

        $regionRepository = GeneralUtility::makeInstance(RegionRepository::class);

        $siteLanguages = [];
        foreach (GeneralUtility::makeInstance(SiteFinder::class)->getAllSites() as $site) {
            foreach ($site->getAllLanguages() as $languageId => $language) {
                if (!isset($siteLanguages[$languageId])) {
                    $siteLanguages[$languageId] = $language;
                }
            }
        }

        $tree = $this->buildTree(0,$regionRepository,$siteLanguages, 1);


        $this->view->assignMultiple([
            'settings' => $this->settings,
            'tree' => $tree,
        ]);
    }


    private function buildTree(int $parentId, RegionRepository $regionRepository, $siteLanguages, int $level) {

        $subRegions = $regionRepository->findByParent($parentId);
        /** @var Region $subRegion */
        foreach ($subRegions as $subRegion) {

            $subRegion->setLevel($level);
            $subRegion->setSubRegions($this->buildTree($subRegion->getUid(),$regionRepository,$siteLanguages, $level+1));

            $languages = [];
            /** @var SiteLanguage $siteLanguage */
            foreach ($siteLanguages as $siteLanguage) {
                $langConfig = $siteLanguage->toArray();
                if ((int)($langConfig['region'] ?? 0) === $subRegion->getUid()) {
                    $languages[] = $siteLanguage;
                }
            }
            $subRegion->setLanguages($languages);
        }

        return $subRegions;
    }


}
