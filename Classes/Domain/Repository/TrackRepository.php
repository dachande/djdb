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
use Dachande\Djdb\Domain\Model\DemandInterface;

class TrackRepository extends AbstractDemandedRepository
{
    protected function createConstraintsFromDemand(
        QueryInterface $query,
        DemandInterface $demand
    ): array {
        return [];
    }

    protected function createOrderingsFromDemand(DemandInterface $demand): array
    {
        return [];
    }
}
