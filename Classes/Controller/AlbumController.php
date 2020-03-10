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

namespace Dachande\Djdb\Controller;

use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use Dachande\Djdb\Domain\Repository\AlbumRepository;
use Dachande\Djdb\Domain\Model\Album;

class SetController extends ActionController
{
    /**
     * @var \Dachande\Djdb\Domain\Repository\AlbumRepository
     */
    protected $albumRepository;

    /**
     * Inject a set repository
     *
     * @return void
     *
     * @param \Dachande\Djdb\Domain\Repository\AlbumRepository $albumRepository
     * @return void
     */
    public function injectAlbumRepository(AlbumRepository $albumRepository)
    {
        $this->albumRepository = $albumRepository;
    }

    /**
     * Output a list view of albums
     *
     * @return void
     */
    public function listAction()
    {
        // TODO: Use demand interface instead of using find method from repository
        $albums = $this->albumRepository->findAll();

        $this->view->assignMultiple([
            'albums' => $albums,
        ]);
    }

    /**
     * Single view of a album record
     *
     * @param \Dachande\Djdb\Domain\Model\Album|null $album
     * @return void
     */
    public function detailAction(Album $album = null)
    {
        $this->view->assignMultiple([
            'album' => $album,
        ]);
    }
}
