<?php
declare(strict_types=1);

namespace Dachande\Djdb\Utility;

use TYPO3\CMS\Backend\Utility\BackendUtility;

class TCAUtility
{
    /**
     * Alter track label by combining track artist and track title
     *
     * @param array $parameters
     * @return void
     */
    public function getTrackLabel(array &$parameters)
    {
        $record = BackendUtility::getRecord($parameters['table'], $parameters['row']['uid']);

        $parameters['title'] = $record['track_artist'] . ' - ' . $record['track_title'];
    }
}
