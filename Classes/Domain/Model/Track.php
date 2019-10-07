<?php
declare(strict_types=1);

namespace Dachande\Djdb\Domain\Model;

use TYPO3\CMS\Extbase\DomainObject\AbstractDomainObject;

class Track extends AbstractDomainObject
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
}
