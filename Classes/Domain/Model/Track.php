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

use TYPO3\CMS\Extbase\Persistence\ObjectStorage;
use TYPO3\CMS\Extbase\Domain\Model\FileReference;
use TYPO3\CMS\Extbase\DomainObject\AbstractDomainObject;

class Track extends AbstractDomainObject
{
    /**
     * @var string
     */
    protected $trackTitle = '';

    /**
     * @var string
     */
    protected $trackArtist = '';

    /**
     * @var string
     */
    protected $releaseTitle = '';

    /**
     * @var string
     */
    protected $releaseArtist = '';

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference>
     */
    protected $cover = null;

    /**
     * @var int
     */
    protected $releaseDate = 0;

    /**
     * @var string
     */
    protected $description = '';

    /**
     * @var string
     */
    protected $link = '';

    /**
     * @var string
     */
    protected $setPosition = '00:00:00';

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->initializeObjectStorages();
    }

    /**
     * Initialize object storages
     *
     * @return void
     */
    protected function initializeObjectStorages()
    {
        $this->cover = new ObjectStorage;
    }

    /**
     * Get the value of trackTitle
     *
     * @return string
     */
    public function getTrackTitle(): string
    {
        return $this->trackTitle;
    }

    /**
     * Set the value of trackTitle
     *
     * @param string $trackTitle
     */
    public function setTrackTitle(string $trackTitle)
    {
        $this->trackTitle = $trackTitle;
    }

    /**
     * Get the value of trackArtist
     *
     * @return string
     */
    public function getTrackArtist(): string
    {
        return $this->trackArtist;
    }

    /**
     * Set the value of trackArtist
     *
     * @param string $trackArtist
     */
    public function setTrackArtist(string $trackArtist)
    {
        $this->trackArtist = $trackArtist;
    }

    /**
     * Get the value of releaseTitle
     *
     * @return string
     */
    public function getReleaseTitle(): string
    {
        return $this->releaseTitle;
    }

    /**
     * Set the value of releaseTitle
     *
     * @param string $releaseTitle
     * @return void
     */
    public function setReleaseTitle(string $releaseTitle)
    {
        $this->releaseTitle = $releaseTitle;
    }

    /**
     * Get the value of releaseArtist
     *
     * @return string
     */
    public function getReleaseArtist(): string
    {
        return $this->releaseArtist;
    }

    /**
     * Set the value of releaseArtist
     *
     * @param string $releaseArtist
     * @return void
     */
    public function setReleaseArtist(string $releaseArtist)
    {
        $this->releaseArtist = $releaseArtist;
    }

    /**
     * Get the value of cover
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference>
     */
    public function getCover(): ObjectStorage
    {
        return $this->cover;
    }

    /**
     * Set the value of cover
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference> $cover
     * @return void
     */
    public function setCover(ObjectStorage $cover)
    {
        $this->cover = $cover;

        return $this;
    }

    /**
     * Add cover
     *
     * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $cover
     * @return void
     */
    public function addCover(FileReference $cover)
    {
        $this->cover->attach($cover);
    }

    /**
     * Remove cover
     *
     * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $cover
     * @return void
     */
    public function removeCover(FileReference $cover)
    {
        $this->cover->detach($cover);
    }

    /**
     * Get the value of releaseDate
     *
     * @return int
     */
    public function getReleaseDate()
    {
        return $this->releaseDate;
    }

    /**
     * Set the value of releaseDate
     *
     * @param int $releaseDate
     * @return void
     */
    public function setReleaseDate(int $releaseDate)
    {
        $this->releaseDate = $releaseDate;
    }

    /**
     * Get the value of description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @param string $description
     * @return void
     */
    public function setDescription(string $description)
    {
        $this->description = $description;
    }

    /**
     * Get the value of link
     *
     * @return string
     */
    public function getLink(): string
    {
        return $this->link;
    }

    /**
     * Set the value of link
     *
     * @param string $link
     * @return void
     */
    public function setLink(string $link)
    {
        $this->link = $link;
    }

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
     * @return void
     */
    public function setSetPosition(string $setPosition)
    {
        $this->setPosition = $setPosition;
    }
}
