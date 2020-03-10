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

use TYPO3\CMS\Backend\Utility\BackendUtility;

class TcaUtility
{
    /**
     * Alter label by combining artist and title
     *
     * @param array $parameters
     * @return void
     */
    public function getArtistTitleLabel(array &$parameters)
    {
        $parameters['title'] = $parameters['row']['artist'] . ' - ' . $parameters['row']['title'];
    }

    public function getRecordingLabel(array &$parameters)
    {
        $setRecord = BackendUtility::getRecord('tx_djdb_domain_model_set', $parameters['row']['set']);

        $parameters['title'] = (!empty($setRecord))
            ? $setRecord['title'] . ' - ' . $parameters['row']['name']
            : $parameters['row']['name'];
    }
}
