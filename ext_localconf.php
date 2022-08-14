<?php
defined('TYPO3_MODE') or die();

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    'site_region',
    'List',
    [
        \WapplerSystems\SiteRegion\Controller\RegionController::class => 'list',
    ],
    [
    ]
);

