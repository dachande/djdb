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
use TYPO3\CMS\Extbase\DomainObject\AbstractDomainObject;
use Dachande\Djdb\Domain\Model\Download;

class Recording extends AbstractDomainObject
{
    /**
     * @var string
     */
    protected $name = '';

    /**
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Dachande\Djdb\Domain\Model\Download>
     */
    protected $downloads;

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
        $this->downloads = new ObjectStorage;
    }

    /**
     * Get the value of name
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @param string $name
     * @return void
     */
    public function setName(string $name)
    {
        $this->name = $name;
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
}
