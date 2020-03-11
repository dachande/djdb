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

namespace Dachande\Djdb\Domain\Model\Dto;

use TYPO3\CMS\Extbase\DomainObject\AbstractDomainObject;
use Dachande\Djdb\Domain\Model\DemandInterface;

abstract class AbstractDemand extends AbstractDomainObject implements DemandInterface
{
    /**
     * @var array
     */
    protected $genres = [];

    /**
     * @var string
     */
    protected $genreConjunction = '';

    /**
     * @var bool
     */
    protected $newRestriction = false;

    /**
     * @var bool
     */
    protected $featuredRestriction = false;

    /**
     * @var string
     */
    protected $order = '';

    /**
     * @var bool
     */
    protected $newFirst = false;

    /**
     * @var bool
     */
    protected $featuredFirst = false;

    /**
     * @var string
     */
    protected $storagePage = '';

    /**
     * @var int
     */
    protected $limit = 0;

    /**
     * @var int
     */
    protected $offset = 0;

    /**
     * @var string
     */
    protected $hideIdList = '';

    /**
     * @var string
     */
    protected $idList = '';

    /**
     * Get the value of genres
     *
     * @return array
     */
    public function getGenres(): array
    {
        return $this->genres;
    }

    /**
     * Set the value of genres
     *
     * @param array $genres
     * @return void
     */
    public function setGenres(array $genres)
    {
        $this->genres = $genres;
    }

    /**
     * Get the value of genreConjunction
     *
     * @return string
     */
    public function getGenreConjunction(): string
    {
        return $this->genreConjunction;
    }

    /**
     * Set the value of genreConjunction
     *
     * @param string $genreConjunction
     * @return void
     */
    public function setGenreConjunction(string $genreConjunction)
    {
        $this->genreConjunction = $genreConjunction;
    }

    /**
     * Get the value of newRestriction
     *
     * @return bool
     */
    public function getNewRestriction(): bool
    {
        return $this->newRestriction;
    }

    /**
     * Set the value of newRestriction
     *
     * @param bool $newRestriction
     * @return void
     */
    public function setNewRestriction(bool $newRestriction)
    {
        $this->newRestriction = $newRestriction;
    }

    /**
     * Get the value of featuredRestriction
     *
     * @return bool
     */
    public function getFeaturedRestriction(): bool
    {
        return $this->featuredRestriction;
    }

    /**
     * Set the value of featuredRestriction
     *
     * @param bool $featuredRestriction
     * @return void
     */
    public function setFeaturedRestriction(bool $featuredRestriction)
    {
        $this->featuredRestriction = $featuredRestriction;
    }

    /**
     * Get the value of order
     *
     * @return string
     */
    public function getOrder(): string
    {
        return $this->order;
    }

    /**
     * Set the value of order
     *
     * @param string $order
     * @return void
     */
    public function setOrder(string $order)
    {
        $this->order = $order;
    }

    /**
     * Get the value of newFirst
     *
     * @return bool
     */
    public function getNewFirst(): bool
    {
        return $this->newFirst;
    }

    /**
     * Set the value of newFirst
     *
     * @param bool $newFirst
     * @return void
     */
    public function setNewFirst(bool $newFirst)
    {
        $this->newFirst = $newFirst;
    }

    /**
     * Get the value of featuredFirst
     *
     * @return bool
     */
    public function getFeaturedFirst(): bool
    {
        return $this->featuredFirst;
    }

    /**
     * Set the value of featuredFirst
     *
     * @param bool $featuredFirst
     * @return void
     */
    public function setFeaturedFirst(bool $featuredFirst)
    {
        $this->featuredFirst = $featuredFirst;
    }

    /**
     * Get the value of storagePage
     *
     * @return string
     */
    public function getStoragePage(): string
    {
        return $this->storagePage;
    }

    /**
     * Set the value of storagePage
     *
     * @param string $storagePage
     * @return void
     */
    public function setStoragePage(string $storagePage)
    {
        $this->storagePage = $storagePage;
    }

    /**
     * Get the value of limit
     *
     * @return int
     */
    public function getLimit(): int
    {
        return $this->limit;
    }

    /**
     * Set the value of limit
     *
     * @param int $limit
     * @return void
     */
    public function setLimit(int $limit)
    {
        $this->limit = $limit;
    }

    /**
     * Get the value of offset
     *
     * @return int
     */
    public function getOffset(): int
    {
        return $this->offset;
    }

    /**
     * Set the value of offset
     *
     * @param int $offset
     * @return void
     */
    public function setOffset(int $offset)
    {
        $this->offset = $offset;
    }

    /**
     * Get the value of hideIdList
     *
     * @return string
     */
    public function getHideIdList(): string
    {
        return $this->hideIdList;
    }

    /**
     * Set the value of hideIdList
     *
     * @param string $hideIdList
     * @return void
     */
    public function setHideIdList(string $hideIdList)
    {
        $this->hideIdList = $hideIdList;
    }

    /**
     * Get the value of idList
     *
     * @return string
     */
    public function getIdList(): string
    {
        return $this->idList;
    }

    /**
     * Set the value of idList
     *
     * @param string $idList
     * @return void
     */
    public function setIdList(string $idList)
    {
        $this->idList = $idList;
    }
}
