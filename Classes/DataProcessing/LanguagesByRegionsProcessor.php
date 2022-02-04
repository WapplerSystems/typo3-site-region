<?php

namespace WapplerSystems\SiteRegion\DataProcessing;


use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Core\Exception\SiteNotFoundException;
use TYPO3\CMS\Core\Site\SiteFinder;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer;
use TYPO3\CMS\Frontend\ContentObject\DataProcessorInterface;

/**
 *
 */
class LanguagesByRegionsProcessor implements DataProcessorInterface
{
    /**
     * Process data of a record to resolve File objects to the view
     *
     * @param ContentObjectRenderer $cObj The data of the content element or page
     * @param array $contentObjectConfiguration The configuration of Content Object
     * @param array $processorConfiguration The configuration of this processor
     * @param array $processedData Key/value store of processed data (e.g. to be passed to a Fluid View)
     * @return array the processed data as key/value store
     */
    public function process(ContentObjectRenderer $cObj, array $contentObjectConfiguration, array $processorConfiguration, array $processedData)
    {
        if (isset($processorConfiguration['if.']) && !$cObj->checkIf($processorConfiguration['if.'])) {
            return $processedData;
        }


        $queryBuilder = GeneralUtility::makeInstance(ConnectionPool::class)->getQueryBuilderForTable('tx_siteregion_domain_model_region');
        $result = $queryBuilder->select('uid', 'title')->from('tx_siteregion_domain_model_region')->execute();

        /** @var SiteFinder $siteFinder */
        $siteFinder = GeneralUtility::makeInstance(SiteFinder::class);

        try {
            $site = $siteFinder->getSiteByPageId($GLOBALS['TSFE']->id);
        } catch (SiteNotFoundException $e) {
            return $processedData;
        }
        $languages = $site->getLanguages();

        $regions = [];
        while ($row = $result->fetchAssociative()) {
            $selLanguages = [];
            foreach ($languages as $language) {
                if ((int)($language->toArray()['region'] ?? -1) === (int)$row['uid']) {
                    $selLanguages[] = $language;
                }
            }
            $regions[] = [
                'uid' => $row['uid'],
                'title' => $row['title'],
                'languages' => $selLanguages
            ];
        }
        $processedData['regions'] = $regions;

        return $processedData;
    }


}
