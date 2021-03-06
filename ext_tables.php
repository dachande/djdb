<?php

/**
 * Copyright (C) 2020  Daniel Schultheis
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
 */

defined('TYPO3_MODE') or die();

call_user_func(function () {
    $models = [
        'download',
        'genre',
        'recording',
        'set',
        'album',
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
