<?php

/**
 * Copyright (C) 2019  Daniel Schultheis
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
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
        'Dachande.Djdb',
        'Sets',
        'LLL:EXT:djdb/Resources/Private/Language/locallang_be.xlf:tx_djdb_sets.title',
        'tx-djdb-sets'
    );

    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
        'Dachande.Djdb',
        'Tracks',
        'LLL:EXT:djdb/Resources/Private/Language/locallang_be.xlf:tx_djdb_tracks.title',
        'tx-djdb-tracks'
    );
});
