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
}
