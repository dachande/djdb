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
use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;
use Dachande\Djdb\Domain\Model\Genre;

class Track extends AbstractEntity
{
    /**
     * @var string
     */
    protected $title = '';

    /**
     * @var string
     */
    protected $artist = '';

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Dachande\Djdb\Domain\Model\Genre>
     */
    protected $genres = null;

    /**
     * @var int
     */
    protected $releaseDate = 0;

    /**
     * @var string
     */
    protected $description = '';

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Dachande\Djdb\Domain\Model\Download>
     */
    protected $downloads = null;

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Dachande\Djdb\Domain\Model\Album>
     */
    protected $albums = null;

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Dachande\Djdb\Domain\Model\Recording>
     */
    protected $recordings = null;

    /**
     * @var bool
     */
    protected $isNew = false;

    /**
     * @var bool
     */
    protected $isFeatured = false;

    /**
     * @var int
     */
    protected $duration = 0;

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
        $this->genres = new ObjectStorage;
        $this->downloads = new ObjectStorage;
        $this->albums = new ObjectStorage;
        $this->recordings = new ObjectStorage;
    }

    /**
     * Get the value of title
     *
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * Set the value of title
     *
     * @param string $title
     */
    public function setTitle(string $title)
    {
        $this->title = $title;
    }

    /**
     * Get the value of artist
     *
     * @return string
     */
    public function getArtist(): string
    {
        return $this->artist;
    }

    /**
     * Set the value of artist
     *
     * @param string $artist
     */
    public function setArtist(string $artist)
    {
        $this->artist = $artist;
    }

    /**
     * Get the value of genres
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Dachande\Djdb\Domain\Model\Genre>
     */
    public function getGenres(): ObjectStorage
    {
        return $this->genres;
    }

    /**
     * Set the value of genres
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Dachande\Djdb\Domain\Model\Genre> $genres
     * @return void
     */
    public function setGenres(ObjectStorage $genres)
    {
        $this->genres = $genres;

        return $this;
    }

    /**
     * Add genre
     *
     * @param \Dachande\Djdb\Domain\Model\Genre $genre
     * @return void
     */
    public function addGenre(Genre $genre)
    {
        $this->genres->attach($genre);
    }

    /**
     * Remove genre
     *
     * @param \Dachande\Djdb\Domain\Model\Genre $genre
     * @return void
     */
    public function removeGenre(Genre $genre)
    {
        $this->genres->detach($genre);
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
     * Get the value of downloads
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Dachande\Djdb\Domain\Model\Download>
     */
    public function getDownloads(): ObjectStorage
    {
        return $this->downloads;
    }

    /**
     * Set the value of downloads
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Dachande\Djdb\Domain\Model\Download> $downloads
     * @return void
     */
    public function setDownloads(ObjectStorage $downloads)
    {
        $this->downloads = $downloads;

        return $this;
    }

    /**
     * Add download
     *
     * @param \Dachande\Djdb\Domain\Model\Download $download
     * @return void
     */
    public function addDownload(Download $download)
    {
        $this->downloads->attach($download);
    }

    /**
     * Remove download
     *
     * @param \Dachande\Djdb\Domain\Model\Download $download
     * @return void
     */
    public function removeDownload(Download $download)
    {
        $this->downloads->detach($download);
    }

    /**
     * Get the value of albums
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Dachande\Djdb\Domain\Model\Album>
     */
    public function getAlbums(): ObjectStorage
    {
        return $this->albums;
    }

    /**
     * Set the value of albums
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Dachande\Djdb\Domain\Model\Album> $albums
     * @return void
     */
    public function setAlbums(ObjectStorage $albums)
    {
        $this->albums = $albums;

        return $this;
    }

    /**
     * Add album
     *
     * @param \Dachande\Djdb\Domain\Model\Album $album
     * @return void
     */
    public function addAlbum(Album $album)
    {
        $this->albums->attach($album);
    }

    /**
     * Remove album
     *
     * @param \Dachande\Djdb\Domain\Model\Album $album
     * @return void
     */
    public function removeAlbum(Album $album)
    {
        $this->albums->detach($album);
    }

    /**
     * Get the value of recordings
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Dachande\Djdb\Domain\Model\Recording>
     */
    public function getRecordings(): ObjectStorage
    {
        return $this->recordings;
    }

    /**
     * Set the value of recordings
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Dachande\Djdb\Domain\Model\Recording> $recordings
     * @return void
     */
    public function setRecordings(ObjectStorage $recordings)
    {
        $this->recordings = $recordings;

        return $this;
    }

    /**
     * Add recording
     *
     * @param \Dachande\Djdb\Domain\Model\Recording $recording
     * @return void
     */
    public function addRecording(Recording $recording)
    {
        $this->recordings->attach($recording);
    }

    /**
     * Remove recording
     *
     * @param \Dachande\Djdb\Domain\Model\Recording $recording
     * @return void
     */
    public function removeRecording(Recording $recording)
    {
        $this->recordings->detach($recording);
    }

    /**
     * Get the value of isNew
     *
     * @return bool
     */
    public function getIsNew(): bool
    {
        return $this->isNew;
    }

    /**
     * Set the value of isNew
     *
     * @param bool $isNew
     * @return void
     */
    public function setIsNew(bool $isNew)
    {
        $this->isNew = $isNew;
    }

    /**
     * Get the value of isFeatured
     *
     * @return bool
     */
    public function getIsFeatured(): bool
    {
        return $this->isFeatured;
    }

    /**
     * Set the value of isFeatured
     *
     * @param bool $isFeatured
     * @return void
     */
    public function setIsFeatured(bool $isFeatured)
    {
        $this->isFeatured = $isFeatured;
    }

    /**
     * Get the value of duration
     *
     * @return int
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * Set the value of duration
     *
     * @param int $duration
     * @return void
     */
    public function setDuration(int $duration)
    {
        $this->duration = $duration;
    }
}
