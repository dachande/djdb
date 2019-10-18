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

$EM_CONF['djdb'] = [
    'title' => 'DJ Set database extension for TYPO3',
    'description' => 'DJ Set database extension for TYPO3',
    'version' => '0.1.0',
    'state' => 'alpha',
    'category' => 'plugin',
    'author' => 'Daniel Schultheis',
    'author_email' => 'd.schultheis@kabel-salat.net',
    'constraints' => [
        'depends' => [
            'php' => '7.2.0-0.0.0',
            'typo3' => '9.5.0-9.5.99',
        ],
        'conflicts' => [],
        'suggests' => [],
    ],
    'clearCacheOnLoad' => true,
    'autoload' => [
        'psr-4' => [
            'Dachande\\Djdb\\' => 'Classes/',
        ],
    ],
];
