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
use Dachande\Djdb\Domain\Repository\SetRepository;
use Dachande\Djdb\Domain\Model\Set;

class SetController extends ActionController
{
    /**
     * @var \Dachande\Djdb\Domain\Repository\SetRepository
     */
    protected $setRepository;

    /**
     * Inject a set repository
     *
     * @return void
     *
     * @param \Dachande\Djdb\Domain\Repository\SetRepository $setRepository
     * @return void
     */
    public function injectSetRepository(SetRepository $setRepository)
    {
        $this->setRepository = $setRepository;
    }

    /**
     * Output a list view of sets
     *
     * @return void
     */
    public function listAction()
    {
        $sets = $this->setRepository->findAll();

        $this->view->assignMultiple([
            'sets' => $sets,
        ]);
    }

    /**
     * Single view of a set record
     *
     * @param \Dachande\Djdb\Domain\Model\Set|null $set
     * @return void
     */
    public function showAction(Set $set = null)
    {
        $this->view->assignMultiple([
            'set' => $set,
        ]);
    }
}
