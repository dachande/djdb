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

namespace Dachande\Djdb\Domain\Repository;

use TYPO3\CMS\Extbase\Persistence\QueryInterface;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use Dachande\Djdb\Utility\ConstraintUtility;
use Dachande\Djdb\Domain\Model\DemandInterface;

class SetRepository extends AbstractDemandedRepository
{
    protected function createConstraintsFromDemand(
        QueryInterface $query,
        DemandInterface $demand
    ): array {
        /**
         * @var \Dachande\Djdb\Domain\Model\Dto\SetDemand $demand
         */

        $constraints = [];

        // genre
        if (!empty($demand->getGenres())) {
            $constraints['genres'] = ConstraintUtility::getGenreConstraint(
                $query,
                $demand->getGenres(),
                $demand->getGenreConjunction()
            );
        }

        // new only
        if ($demand->getNewRestriction() === 1) {
            $constraints['newSets'] = $query->equals('is_new', 1);
        }

        // except new
        if ($demand->getNewRestriction() === 2) {
            $constraints['newSets'] = $query->equals('is_new', 0);
        }

        // featureed only
        if ($demand->getFeaturedRestriction() === 1) {
            $constraints['featuredSets'] = $query->equals('is_featured', 1);
        }

        // except featureed
        if ($demand->getFeaturedRestriction() === 2) {
            $constraints['featuredSets'] = $query->equals('is_featured', 0);
        }

        // label
        if (!empty($demand->getLabelRestriction())) {
            $constraints['labels'] = ConstraintUtility::getLabelConstraint($query, $demand->getLabelRestriction());
        }

        // storage page
        if ($demand->getStoragePage() != 0) {
            $pidList = GeneralUtility::intExplode(',', $demand->getStoragePage(), true);
            $constraints['pid'] = $query->in('pid', $pidList);
        }

        // Clean not used constraints
        foreach ($constraints as $key => $value) {
            if (null === $value) {
                unset($constraints[$key]);
            }
        }

        return $constraints;
    }

    protected function createOrderingsFromDemand(DemandInterface $demand): array
    {
        /**
         * @var \Dachande\Djdb\Domain\Model\Dto\SetDemand $demand
         */

         return [];
    }
}
