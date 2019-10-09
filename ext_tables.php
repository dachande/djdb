<?php

defined('TYPO3_MODE') or die();

call_user_func(function () {
    $models = [
        'download',
        'genre',
        'recording',
        'set',
        'track',
    ];

    // Add context sensitive help for each model
    foreach ($models as $table) {
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_djdb_domain_model_' . $table);
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr(
            'tx_djdb_domain_model_' . $table,
            'EXT:djdb/Resources/Private/Language/locallang_csh_' . $table . '.xlf'
        );
    }
});
