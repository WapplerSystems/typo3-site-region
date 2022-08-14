<?php
defined('TYPO3_MODE') or die();

call_user_func(function () {
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
        'site_region',
        'List',
        'LLL:EXT:site_region/Resources/Private/Language/locallang_db.xlf:siteregion_list'
    );
});
