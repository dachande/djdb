<?php
declare(strict_types=1);

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

namespace Dachande\Djdb\Utility;

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Database\Query\Restriction\DeletedRestriction;
use TYPO3\CMS\Core\Database\Query\QueryHelper;
use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Backend\Utility\BackendUtility;

class TcaUtility
{
    /**
     * Alter label by combining artist and title
     *
     * @param array $parameters
     * @return void
     * @throws \InvalidArgumentException
     */
    public function getArtistTitleLabel(array &$parameters)
    {
        $record = $this->getCurrentRecord($parameters);
        $parameters['title'] = $record['artist'] . ' - ' . $record['title'];
    }

    /**
     * Alter label by combining set title with recording name
     *
     * @param array $parameters
     * @return void
     * @throws \InvalidArgumentException
     */
    public function getRecordingLabel(array &$parameters)
    {
        $record = $this->getCurrentRecord($parameters);
        $setRecord = (!empty($record) && $record['set'] !== null)
            ? BackendUtility::getRecord('tx_djdb_domain_model_set', $record['set'])
            : null;

        $parameters['title'] = (!empty($setRecord))
            ? $setRecord['title'] . ' - ' . $record['name']
            : $record['name'];
    }

    /**
     * Get current record
     *
     * @param array $parameters
     * @return array|null
     *
     */
    protected function getCurrentRecord(array $parameters):? array
    {
        return BackendUtility::getRecord($parameters['table'], $parameters['row']['uid']);
    }

    /**
     * Get a distinct list of used label names from all set records
     *
     * @param array $config
     * @return void
     * @throws \InvalidArgumentException
     */
    public function getDistinctLabels(array &$config)
    {
        $labels = array_unique($this->getRecords(['label'], 'tx_djdb_domain_model_set'));
        asort($labels);

        foreach ($labels as $label) {
            array_push($config['items'], [htmlspecialchars($label), $label]);
        }
    }

    /**
     * Get list of fields from records from database
     *
     * @param array $fields
     * @param string $table
     * @param string $where
     * @return array
     * @throws \InvalidArgumentException
     */
    protected function getRecords(array $fields, string $table, string $where = ''): array
    {
        $fieldsIndex = array_flip($fields);

        $result = [];

        $queryBuilder = GeneralUtility::makeInstance(ConnectionPool::class)->getQueryBuilderForTable($table);
        $queryBuilder->getRestrictions()
            ->removeAll()
            ->add(GeneralUtility::makeInstance(DeletedRestriction::class));

        $res = $queryBuilder
            ->select('*')
            ->from($table)
            ->where(QueryHelper::stripLogicalOperatorPrefix($where))
            ->execute();

        while ($record = $res->fetch()) {
            $recordId = $record['uid'];
            $result[$recordId] = (sizeof($fields) <= 1 && !empty($record[$fields[0]])) ? $record[$fields[0]] : array_intersect_key($record, $fieldsIndex);
        }

        return $result;
    }
}
