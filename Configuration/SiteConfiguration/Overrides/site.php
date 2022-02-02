<?php
defined('TYPO3_MODE') or die('Access denied.');

$GLOBALS['SiteConfiguration']['site']['columns']['region'] = [
    'label' => 'LLL:EXT:site_region/Resources/Private/Language/locallang_db.xlf:siteConfiguration.region',
    'config' => [
        'type' => 'select',
        'renderType' => 'selectSingle',
        'items' => [
            ['Please select', ''],
        ],
        'minitems' => 0,
        'foreign_table' => 'tx_siteregion_domain_model_region',
    ],
];
$GLOBALS['SiteConfiguration']['site']['types'][0]['showitem'] .= ',--div--;LLL:EXT:site_region/Resources/Private/Language/locallang_db.xlf:siteConfiguration.tab,region';


$GLOBALS['SiteConfiguration']['site_language']['columns']['region'] = [
    'label' => 'LLL:EXT:site_region/Resources/Private/Language/locallang_db.xlf:siteConfiguration.region',
    'config' => [
        'type' => 'select',
        'renderType' => 'selectSingle',
        'items' => [
            ['Please select', ''],
        ],
        'minitems' => 0,
        'foreign_table' => 'tx_siteregion_domain_model_region',
    ],
];
$GLOBALS['SiteConfiguration']['site_language']['types'][1]['showitem'] .= ',--div--;LLL:EXT:site_region/Resources/Private/Language/locallang_db.xlf:siteConfiguration.tab,region';
