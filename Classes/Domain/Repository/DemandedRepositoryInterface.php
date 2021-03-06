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

use TYPO3\CMS\Extbase\Persistence\QueryResultInterface;
use Dachande\Djdb\Domain\Model\DemandInterface;

interface DemandedRepositoryInterface
{
    /**
     * Returns the objects of this repository matching the demand.
     *
     * @param \Dachande\Djdb\Domain\Model\DemandInterface $demand
     * @param bool $respectEnableFields
     * @param bool $disableLanguageOverlayMode
     * @return \TYPO3\CMS\Extbase\Persistence\QueryResultInterface
     */
    public function findDemanded(
        DemandInterface $demand,
        bool $respectEnableFields = true,
        bool $disableLanguageOverlayMode = false
    ): QueryResultInterface;

    /**
     * Returns the total number objects of this repository matching the demand.
     *
     * @param \Dachande\Djdb\Domain\Model\DemandInterface $demand
     * @return int
     */
    public function countDemanded(DemandInterface $demand): int;
}
