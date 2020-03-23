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
use TYPO3\CMS\Core\Utility\GeneralUtility;
use Dachande\Djdb\Domain\Repository\SetRepository;
use Dachande\Djdb\Domain\Model\Set;
use Dachande\Djdb\Domain\Model\Dto\SetDemand;

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
        $demand = $this->createDemandObjectFromSettings($this->settings);

        $sets = $this->setRepository->findDemanded($demand);

        $this->view->assignMultiple([
            'sets' => $sets,
            'demand' => $demand,
            'settings' => $this->settings,
        ]);
    }

    /**
     * Single view of a set record
     *
     * @param \Dachande\Djdb\Domain\Model\Set|null $set
     * @return void
     */
    public function detailAction(Set $set = null)
    {
        $this->view->assignMultiple([
            'set' => $set,
        ]);
    }

    /**
     * Create the demand object which define which records will get shown
     *
     * @param array $settings
     * @return \Dachande\Djdb\Domain\Model\Dto\SetDemand
     */
    protected function createDemandObjectFromSettings(array $settings): SetDemand
    {
        /**
         * @var \Dachande\Djdb\Domain\Model\Dto\SetDemand $demand
         */
        $demand = $this->objectManager->get(SetDemand::class, $settings);

        // TODO: Do basic setup of demand object
        $demand->setGenres(GeneralUtility::trimExplode(',', $settings['genres'], true));
        $demand->setGenreConjunction($settings['genreConjunction']);
        $demand->setNewRestriction((int)$settings['newRestriction']);
        $demand->setFeaturedRestriction((int)$settings['featuredRestriction']);

        if ($settings['orderBy']) {
            $demand->setOrder($settings['orderBy'] . ' ' . $settings['orderDirection']);
        }

        $demand->setNewFirst((bool)$settings['newSetsFirst']);
        $demand->setFeaturedFirst((bool)$settings['featuredSetsFirst']);
        $demand->setLimit((int)$settings['limit']);
        $demand->setOffset((int)$settings['offset']);
        // $demand->setHideIdList($settings['hideIdList']);

        $demand->setStoragePage(PageUtility::extendPidListByChildren(
            $settings['startingpoint'],
            (int)$settings['recursive']
        ));

        $demand->setLabelRestriction($settings['labelRestriction']);

        return $demand;
    }
}
