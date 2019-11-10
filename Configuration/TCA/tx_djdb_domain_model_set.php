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

return call_user_func(function () {
    $ll = 'LLL:EXT:djdb/Resources/Private/Language/locallang_db.xlf:tx_djdb_domain_model_set.';

    $tx_djdb_domain_model_set = [
        'ctrl' => [
            'title' => $ll . 'title',
            'label' => 'title',
            'hideAtCopy' => true,
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
            'iconfile' => 'EXT:djdb/Resources/Public/Icons/Set.svg',
            'searchFields' => 'title,release,label,catno,description',
        ],
        'interface' => [
            'showRecordFieldList' => 'hidden,title,release,label,catno',
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
                    'foreign_table' => 'tx_djdb_domain_model_set',
                    'foreign_table_where' => 'AND {#tx_djdb_domain_model_set}.{#pid}=###CURRENT_PID### AND {#tx_djdb_domain_model_set}.{#sys_language_uid} IN (-1,0)',
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

            'title' => [
                'exclude' => false,
                'label' => $ll . 'field.title',
                'config' => [
                    'type' => 'input',
                    'size' => 50,
                    'eval' => 'trim,required',
                    'behaviour' => [
                        'allowLanguageSynchronization' => true,
                    ],
                ],
            ],
            'release' => [
                'exclude' => true,
                'label' => $ll . 'field.release',
                'l10n_mode' => 'exclude',
                'l10n_display' => 'defaultAsReadonly',
                'config' => [
                    'type' => 'input',
                    'size' => 50,
                    'eval' => 'trim',
                ],
            ],
            'label' => [
                'exclude' => true,
                'label' => $ll . 'field.label',
                'l10n_mode' => 'exclude',
                'l10n_display' => 'defaultAsReadonly',
                'config' => [
                    'type' => 'input',
                    'size' => 50,
                    'eval' => 'trim',
                ],
            ],
            'catno' => [
                'exclude' => true,
                'label' => $ll . 'field.catno',
                'l10n_mode' => 'exclude',
                'l10n_display' => 'defaultAsReadonly',
                'config' => [
                    'type' => 'input',
                    'size' => 50,
                    'eval' => 'trim',
                ],
            ],
            'cover' => [
                'exclude' => true,
                'label' => $ll . 'field.cover',
                'l10n_mode' => 'exclude',
                'l10n_display' => 'defaultAsReadonly',
                'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
                    'cover',
                    [
                        'minitems' => 0,
                        'maxitems' => 1,
                        'appearance' => [
                            'createNewRelationLinkTitle' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:images.addFileReference',
                            'fileUploadAllowed' => false,
                        ],
                        'foreign_types' => [
                            \TYPO3\CMS\Core\Resource\File::FILETYPE_UNKNOWN => [
                                'showitem' => '
                                    --palette--;LLL:EXT:lang/Resources/Private/Language/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                                    --palette--;;filePalette
                                ',
                            ],
                            \TYPO3\CMS\Core\Resource\File::FILETYPE_TEXT => [
                                'showitem' => '
                                    --palette--;LLL:EXT:lang/Resources/Private/Language/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                                    --palette--;;filePalette
                                ',
                            ],
                            \TYPO3\CMS\Core\Resource\File::FILETYPE_IMAGE => [
                                'showitem' => '
                                    --palette--;LLL:EXT:lang/Resources/Private/Language/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                                    --palette--;;filePalette
                                ',
                            ],
                            \TYPO3\CMS\Core\Resource\File::FILETYPE_AUDIO => [
                                'showitem' => '
                                    --palette--;LLL:EXT:lang/Resources/Private/Language/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                                    --palette--;;filePalette
                                ',
                            ],
                            \TYPO3\CMS\Core\Resource\File::FILETYPE_VIDEO => [
                                'showitem' => '
                                    --palette--;LLL:EXT:lang/Resources/Private/Language/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                                    --palette--;;filePalette
                                ',
                            ],
                            \TYPO3\CMS\Core\Resource\File::FILETYPE_APPLICATION => [
                                'showitem' => '
                                    --palette--;LLL:EXT:lang/Resources/Private/Language/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                                    --palette--;;filePalette
                                ',
                            ],
                        ],
                    ],
                    'jpeg,jpg,png'
                ),
            ],
            'release_date' => [
                'exclude' => true,
                'label' => $ll . 'field.release_date',
                'l10n_mode' => 'exclude',
                'l10n_display' => 'defaultAsReadonly',
                'config' => [
                    'type' => 'input',
                    'renderType' => 'inputDateTime',
                    'eval' => 'datetime,int',
                    'default' => 0,
                ],
            ],
            'description' => [
                'exclude' => true,
                'label' => $ll . 'field.description',
                'l10n_mode' => 'prefixLangTitle',
                'l10n_cat' => 'text',
                'config' => [
                    'type' => 'text',
                    'cols' => '80',
                    'rows' => '15',
                    'softref' => 'typolink_tag,images,email[subst],url',
                    'enableRichtext' => true,
                    'richtextConfiguration' => 'default',
                ],
            ],
            'genres' => [
                'exclude' => true,
                'label' => $ll . 'field.genres',
                'l10n_mode' => 'exclude',
                'l10n_display' => 'defaultAsReadonly',
                'config' => [
                    'type' => 'select',
                    'renderType' => 'selectMultipleSideBySide',
                    'size' => 5,
                    'minitems' => 0,
                    'maxitems' => 100,
                    'foreign_table' => 'tx_djdb_domain_model_genre',
                    'foreign_table_where' => 'AND {#tx_djdb_domain_model_genre}.{#pid}=###CURRENT_PID### AND {#tx_djdb_domain_model_genre}.{#sys_language_uid} IN (-1,0) ORDER BY tx_djdb_domain_model_genre.name',
                    'MM' => 'tx_djdb_domain_model_set_genre_mm',
                ],
            ],
            'recordings' => [
                'exclude' => true,
                'label' => $ll . 'field.recordings',
                'config' => [
                    'type' => 'inline',
                    'allowed' => 'tx_djdb_domain_model_recording',
                    'foreign_table' => 'tx_djdb_domain_model_recording',
                    'foreign_sortby' => 'sorting',
                    'foreign_field' => 'set',
                    'size' => 5,
                    'minitems' => 0,
                    'maxitems' => 100,
                    'appearance' => [
                        'collapseAll' => true,
                        'expandSingle' => true,
                        'newRecordLinkTitle' => 'LLL:EXT:djdb/Resources/Private/Language/locallang_be.xlf:label.add_recording',
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
            'is_new' => [
                'exclude' => true,
                'label' => $ll . 'field.is_new',
                'config' => [
                    'type' => 'check',
                    'renderType' => 'checkboxToggle',
                    'items' => [
                        [
                            0 => '',
                            1 => '',
                        ],
                    ],
                ],
            ],
            'is_featured' => [
                'exclude' => true,
                'label' => $ll . 'field.is_featured',
                'config' => [
                    'type' => 'check',
                    'renderType' => 'checkboxToggle',
                    'items' => [
                        [
                            0 => '',
                            1 => '',
                        ],
                    ],
                ],
            ],
        ],
        'types' => [
            '1' => [
                'showitem' => '
                    --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:general,
                        title,
                        genres,
                        --palette--;;properties,
                        release,
                        label,
                        catno,
                        release_date,
                        description,
                    --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.media,
                        cover,
                    --div--;LLL:EXT:djdb/Resources/Private/Language/locallang_be.xlf:tabs.content,
                        recordings,
                    --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:language,
                        --palette--;;language,
                    --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access,
                        --palette--;;hidden,
                        --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.access;access,
                ',
            ],
        ],
        'palettes' => [
            'properties' => [
                'label' => 'LLL:EXT:djdb/Resources/Private/Language/locallang_be.xlf:palette.properties',
                'showitem' => '
                    is_new,
                    is_featured,
                ',
            ],
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

    return $tx_djdb_domain_model_set;
});
