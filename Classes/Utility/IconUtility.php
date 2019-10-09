<?php
declare(strict_types=1);

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

namespace Dachande\Djdb\Utility;

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Imaging\IconRegistry;
use TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider;

class IconUtility
{
    /**
     * Register icons
     *
     * The icons parameter is an array of icons with each entry consisting of
     * * icon identifier
     * * source file location
     * * icon provider classname (optional)
     *
     * As the default icon provider classname 'SvgIconProvider' is used if no classname is provided.
     *
     * @param array $icons
     * @return void
     */
    public static function registerIcons(array $icons)
    {
        /**
         * @var \TYPO3\CMS\Core\Imaging\IconRegistry $iconRegistry
         */
        $iconRegistry = GeneralUtility::makeInstance(IconRegistry::class);
        $defaultIconProviderClassName = SvgIconProvider::class;

        foreach ($icons as $icon) {
            $iconRegistry->registerIcon(
                $icon[0],
                (!empty($icon[2])) ? $icon[2] : $defaultIconProviderClassName,
                [
                    'source' => $icon[1],
                ]
            );
        }
    }
}
