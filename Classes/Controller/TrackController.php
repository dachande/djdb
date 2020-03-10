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

namespace Dachande\Djdb\Controller;

use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;
use Dachande\Djdb\Domain\Repository\TrackRepository;
use Dachande\Djdb\Domain\Model\Track;

class TrackController extends ActionController
{
    /**
     * @var \Dachande\Djdb\Domain\Repository\TrackRepository
     */
    protected $trackRepository;

    /**
     * Inject a track repository
     *
     * @return void
     *
     * @param \Dachande\Djdb\Domain\Repository\TrackRepository $trackRepository
     * @return void
     */
    public function injectTrackRepository(TrackRepository $trackRepository)
    {
        $this->trackRepository = $trackRepository;
    }

    /**
     * Output a list view of tracks
     *
     * @return void
     */
    public function listAction()
    {
        // TODO: Use demand interface instead of using find method from repository
        $tracks = $this->trackRepository->findAll();

        $this->view->assignMultiple([
            'tracks' => $tracks,
        ]);
    }

    /**
     * Single view of a track record
     *
     * @param \Dachande\Djdb\Domain\Model\Track|null $track
     * @return void
     */
    public function detailAction(Track $track = null)
    {
        $this->view->assignMultiple([
            'track' => $track,
        ]);
    }
}
