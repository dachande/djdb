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

return call_user_func(function () {
    $ll = 'LLL:EXT:djdb/Resources/Private/Language/locallang_db.xlf:tx_djdb_domain_model_recording.';

    $tx_djdb_domain_model_recording = [
        'ctrl' => [
            'title' => $ll . 'title',
            'label' => 'name',
            'label_userFunc' => \Dachande\Djdb\Utility\TcaUtility::class . '->getRecordingLabel',
            'hideAtCopy' => true,
            'hideTable' => true,
            'tstamp' => 'tstamp',
            'crdate' => 'crdate',
            'cruser_id' => 'cruser_id',
            'editlock' => 'editlock',
            'versioningWS' => true,
            'origUid' => 't3_origuid',
            'sortby' => 'sorting',
            'delete' => 'deleted',
            'transOrigPointerField' => 'l10n_parent',
            'transOrigDiffSourceField' => 'l10n_diffsource',
            'languageField' => 'sys_language_uid',
            'translationSource' => 'l10n_source',
            'enablecolumns' => [
                'disabled' => 'hidden',
                'starttime' => 'starttime',
                'endtime' => 'endtime',
                'fe_group' => 'fe_group',
            ],
            'iconfile' => 'EXT:djdb/Resources/Public/Icons/Recording.svg',
            'searchFields' => 'name',
        ],
        'interface' => [
            'showRecordFieldList' => 'hidden,name',
        ],
        'columns' => [
            'hidden' => [
                'exclude' => true,
                'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.visible',
                'config' => [
                    'type' => 'check',
                    'renderType' => 'checkboxToggle',
                    'items' => [
                        [
                            0 => '',
                            1 => '',
                            'invertStateDisplay' => true,
                        ],
                    ],
                ],
            ],
            'starttime' => [
                'exclude' => true,
                'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.starttime',
                'config' => [
                    'type' => 'input',
                    'renderType' => 'inputDateTime',
                    'eval' => 'datetime,int',
                    'default' => 0,
                ],
                'l10n_mode' => 'exclude',
                'l10n_display' => 'defaultAsReadonly',
            ],
            'endtime' => [
                'exclude' => true,
                'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.endtime',
                'config' => [
                    'type' => 'input',
                    'renderType' => 'inputDateTime',
                    'eval' => 'datetime,int',
                    'default' => 0,
                    'range' => [
                        'upper' => mktime(0, 0, 0, 1, 1, 2038),
                    ],
                ],
                'l10n_mode' => 'exclude',
                'l10n_display' => 'defaultAsReadonly',
            ],
            'fe_group' => [
                'exclude' => true,
                'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.fe_group',
                'config' => [
                    'type' => 'select',
                    'renderType' => 'selectMultipleSideBySide',
                    'size' => 5,
                    'maxitems' => 20,
                    'items' => [
                        [
                            'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.hide_at_login',
                            -1,
                        ],
                        [
                            'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.any_login',
                            -2,
                        ],
                        [
                            'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.usergroups',
                            '--div--',
                        ],
                    ],
                    'exclusiveKeys' => '-1,-2',
                    'foreign_table' => 'fe_groups',
                    'foreign_table_where' => 'ORDER BY fe_groups.title',
                    'enableMultiSelectFilterTextfield' => true,
                ]
            ],
            'sys_language_uid' => [
                'exclude' => true,
                'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.language',
                'config' => [
                    'type' => 'select',
                    'renderType' => 'selectSingle',
                    'special' => 'languages',
                    'items' => [
                        [
                            'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.allLanguages',
                            -1,
                            'flags-multiple',
                        ],
                    ],
                    'default' => 0,
                ],
            ],
            'l10n_parent' => [
                'exclude' => true,
                'displayCond' => 'FIELD:sys_language_uid:>:0',
                'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.l18n_parent',
                'config' => [
                    'type' => 'select',
                    'renderType' => 'selectSingle',
                    'items' => [
                        [
                            '',
                            0,
                        ],
                    ],
                    'foreign_table' => 'tx_djdb_domain_model_recording',
                    'foreign_table_where' => 'AND {#tx_djdb_domain_model_recording}.{#pid}=###CURRENT_PID### AND {#tx_djdb_domain_model_recording}.{#sys_language_uid} IN (-1,0)',
                    'default' => 0,
                ],
            ],
            'l10n_source' => [
                'config' => [
                    'type' => 'passthrough',
                ],
            ],
            'l10n_diffsource' => [
                'config' => [
                    'type' => 'passthrough',
                    'default' => '',
                ],
            ],
            't3ver_label' => [
                'label' => 'LLL:EXT:lang/Resources/Private/Language/locallang_general.xlf:LGL.versionLabel',
                'config' => [
                    'type' => 'input',
                    'size' => 30,
                    'max' => 255,
                ],
            ],
            'cruser_id' => [
                'label' => 'cruser_id',
                'config' => [
                    'type' => 'passthrough',
                ],
            ],
            'pid' => [
                'label' => 'pid',
                'config' => [
                    'type' => 'passthrough',
                ],
            ],
            'crdate' => [
                'label' => 'crdate',
                'config' => [
                    'type' => 'passthrough',
                ],
            ],
            'tstamp' => [
                'label' => 'tstamp',
                'config' => [
                    'type' => 'passthrough',
                ],
            ],
            'sorting' => [
                'label' => 'sorting',
                'config' => [
                    'type' => 'passthrough',
                ],
            ],

            'name' => [
                'exclude' => false,
                'label' => $ll . 'field.name',
                'config' => [
                    'type' => 'input',
                    'size' => 50,
                    'eval' => 'trim,required',
                    'behaviour' => [
                        'allowLanguageSynchronization' => true,
                    ],
                ],
            ],
            'duration' => [
                'exclude' => false,
                'label' => $ll . 'field.duration',
                'config' => [
                    'type' => 'input',
                    'eval' => 'trim,timesec',
                    'behaviour' => [
                        'allowLanguageSynchronization' => true,
                    ],
                ],
            ],
            'downloads' => [
                'exclude' => true,
                'label' => $ll . 'field.downloads',
                'config' => [
                    'type' => 'inline',
                    'allowed' => 'tx_djdb_domain_model_download',
                    'foreign_table' => 'tx_djdb_domain_model_download',
                    'foreign_sortby' => 'sorting',
                    'foreign_field' => 'recording',
                    'size' => 5,
                    'minitems' => 0,
                    'maxitems' => 100,
                    'appearance' => [
                        'collapseAll' => true,
                        'expandSingle' => true,
                        'newRecordLinkTitle' => 'LLL:EXT:djdb/Resources/Private/Language/locallang_be.xlf:label.add_download',
                        'levelLinksPosition' => 'bottom',
                        'useSortable' => true,
                        'showPossibleLocalizationRecords' => true,
                        'showRemovedLocalizationRecords' => true,
                        'showAllLocalizationLink' => true,
                        'showSynchronizationLink' => true,
                    ],
                    'behaviour' => [
                        'allowLanguageSynchronization' => true,
                    ],
                ],
            ],
            'tracks' => [
                'exclude' => true,
                'label' => $ll . 'field.tracks',
                'config' => [
                    'type' => 'group',
                    'internal_type' => 'db',
                    'allowed' => 'tx_djdb_domain_model_track',
                    'foreign_table' => 'tx_djdb_domain_model_track',
                    'MM' => 'tx_djdb_recording_track_mm',
                    'MM_hasUidField' => true,
                    'multiple' => true,
                    'size' => 10,
                    'minitems' => 0,
                    'maxitems' => 100,
                    'behaviour' => [
                        'allowLanguageSynchronization' => true,
                    ],
                    'fieldControl' => [
                        'addRecord' => [
                            'disabled' => false,
                        ],
                        'editPopup' => [
                            'disabled' => false,
                        ],
                    ],
                ],
            ],
        ],
        'types' => [
            '1' => [
                'showitem' => '
                    --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:general,
                        name,
                        duration,
                    --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.media,
                        downloads,
                    --div--;LLL:EXT:djdb/Resources/Private/Language/locallang_be.xlf:tabs.tracklist,
                        tracks,
                    --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:language,
                        --palette--;;language,
                    --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access,
                        --palette--;;hidden,
                        --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.access;access,
                ',
            ],
        ],
        'palettes' => [
            'hidden' => [
                'showitem' => '
                    hidden;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:field.default.hidden
                ',
            ],
            'language' => [
                'showitem' => '
                    sys_language_uid;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:sys_language_uid_formlabel,l18n_parent
                ',
            ],
            'access' => [
                'label' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.access',
                'showitem' => '
                    starttime;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:starttime_formlabel,
                    endtime;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:endtime_formlabel,
                    --linebreak--,
                    fe_group;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:fe_group_formlabel,
                    --linebreak--,editlock
                ',
            ],
        ],
    ];

    return $tx_djdb_domain_model_recording;
});
