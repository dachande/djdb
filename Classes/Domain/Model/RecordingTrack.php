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

namespace Dachande\Djdb\Domain\Model;

use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use Dachande\Djdb\Domain\Model\Track;

class RecordingTrack extends AbstractEntity
{
    /**
     * @var string
     */
    protected $setPosition = "00:00:00";

    /**
     * @var \Dachande\Djdb\Domain\Model\Track
     */
    protected $track = null;

    /**
     * Get the value of setPosition
     *
     * @return string
     */
    public function getSetPosition(): string
    {
        return $this->setPosition;
    }

    /**
     * Set the value of setPosition
     *
     * @param string $setPosition
     */
    public function setSetPosition(string $setPosition)
    {
        $this->setPosition = $setPosition;
    }

    /**
     * Get the value of track
     *
     * @return \Dachande\Djdb\Domain\Model\Track
     */
    public function getTrack(): Track
    {
        return $this->track;
    }

    /**
     * Set the value of track
     *
     * @param \Dachande\Djdb\Domain\Model\Track $track
     * @return void
     */
    public function setTrack(Track $track)
    {
        $this->track = $track;

        return $this;
    }
}
