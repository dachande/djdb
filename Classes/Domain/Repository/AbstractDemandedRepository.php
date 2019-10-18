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

namespace Dachande\Djdb\Domain\Repository;

use TYPO3\CMS\Extbase\Persistence\Repository;
use TYPO3\CMS\Extbase\Persistence\QueryResultInterface;
use TYPO3\CMS\Extbase\Persistence\QueryInterface;
use Dachande\Djdb\Domain\Model\DemandInterface;

abstract class AbstractDemandedRepository extends Repository implements DemandedRepositoryInterface
{
    /**
     * Returns an array of constraints created from a given demand object.
     *
     * @param \TYPO3\CMS\Extbase\Persistence\QueryInterface $query
     * @param \Dachande\Djdb\Domain\Model\DemandInterface $demand
     * @return array<\TYPO3\CMS\Extbase\Persistence\Generic\Qom\ConstraintInterface>
     * @abstract
     */
    abstract protected function createConstraintsFromDemand(QueryInterface $query, DemandInterface $demand): array;

    /**
     * Returns an array of orderings created from a given demand object.
     *
     * @param \Dachande\Djdb\Domain\Model\DemandInterface $demand
     * @return array<\TYPO3\CMS\Extbase\Persistence\Generic\Qom\ConstraintInterface>
     * @abstract
     */
    abstract protected function createOrderingsFromDemand(DemandInterface $demand): array;

    /**
     * {@inheritDoc}
     */
    public function findDemanded(
        DemandInterface $demand,
        bool $respectEnableFields = true,
        bool $disableLanguageOverlayMode = false
    ): QueryResultInterface {
        $query = $this->generateQuery($demand, $respectEnableFields, $disableLanguageOverlayMode);

        return $query->execute();
    }

    /**
     * @param \Dachande\Djdb\Domain\Model\DemandInterface $demand
     * @param bool $respectEnableFields
     * @param bool $disableLanguageOverlayMode
     * @return \TYPO3\CMS\Extbase\Persistence\QueryInterface
     */
    protected function generateQuery(
        DemandInterface $demand,
        $respectEnableFields = true,
        $disableLanguageOverlayMode = false
    ): QueryInterface {
        $query = $this->createQuery();

        $query->getQuerySettings()->setRespectStoragePage(false);

        if ($disableLanguageOverlayMode) {
            $query->getQuerySettings()->setLanguageOverlayMode(false);
        }

        $constraints = $this->createConstraintsFromDemand($query, $demand);

        if ($respectEnableFields === false) {
            $query->getQuerySettings()->setIgnoreEnableFields(true);

            $constraints[] = $query->equals('deleted', 0);
        }

        if (!empty($constraints)) {
            $query->matching(
                $query->logicalAnd($constraints)
            );
        }

        if ($orderings = $this->createOrderingsFromDemand($demand)) {
            $query->setOrderings($orderings);
        }

        if ($demand->getLimit() !== null) {
            $query->setLimit((int)$demand->getLimit());
        }

        if ($demand->getOffset() !== null) {
            if (!$query->getLimit()) {
                $query->setLimit(PHP_INT_MAX);
            }
            $query->setOffset((int)$demand->getOffset());
        }

        return $query;
    }

    /**
     * {@inheritDoc}
     */
    public function countDemanded(DemandInterface $demand): int
    {
        $query = $this->createQuery();

        if ($constraints = $this->createConstraintsFromDemand($query, $demand)) {
            $query->matching(
                $query->logicalAnd($constraints)
            );
        }

        $result = $query->execute();
        return $result->count();
    }
}
