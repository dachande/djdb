<?php
declare(strict_types=1);

namespace Dachande\Djdb\Domain\Model;

use TYPO3\CMS\Extbase\Persistence\ObjectStorage;
use TYPO3\CMS\Extbase\Domain\Model\FileReference;
use TYPO3\CMS\Extbase\DomainObject\AbstractDomainObject;

class Set extends AbstractDomainObject
{
    /**
     * @var string
     */
    protected $title = '';

    /**
     * @var string
     */
    protected $release = '';

    /**
     * @var string
     */
    protected $label = '';

    /**
     * @var string
     */
    protected $catno = '';

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
     * @return void
     */
    public function setTitle(string $title)
    {
        $this->title = $title;
    }

    /**
     * Get the value of release
     *
     * @return string
     */
    public function getRelease(): string
    {
        return $this->release;
    }

    /**
     * Set the value of release
     *
     * @param string $release
     * @return void
     */
    public function setRelease(string $release)
    {
        $this->release = $release;
    }

    /**
     * Get the value of label
     *
     * @return string
     */
    public function getLabel(): string
    {
        return $this->label;
    }

    /**
     * Set the value of label
     *
     * @param string $label
     * @return void
     */
    public function setLabel(string $label)
    {
        $this->label = $label;
    }

    /**
     * Get the value of catno
     *
     * @return string
     */
    public function getCatno(): string
    {
        return $this->catno;
    }

    /**
     * Set the value of catno
     *
     * @param string $catno
     * @return void
     */
    public function setCatno(string $catno)
    {
        $this->catno = $catno;
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
}
