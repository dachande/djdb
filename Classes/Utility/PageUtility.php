<?php
declare(strict_types=1);

namespace Dachande\Djdb\Utility;

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Database\QueryGenerator;

class PageUtility
{
    /**
     * Find all ids from given ids and level
     *
     * @param string $pidList comma separated list of ids
     * @param int $recursive recursive levels
     * @return string comma separated list of ids
     */
    public static function extendPidListByChildren(string $pidList = '', int $recursive = 0): string
    {
        if ($recursive <= 0) {
            return $pidList;
        }

        /**
         * @var \TYPO3\CMS\Core\Database\QueryGenerator $queryGenerator
         */
        $queryGenerator = GeneralUtility::makeInstance(QueryGenerator::class);
        $recursiveStoragePids = $pidList;
        $storagePids = GeneralUtility::intExplode(',', $pidList);

        foreach ($storagePids as $startPid) {
            if ($startPid >= 0) {
                $pids = $queryGenerator->getTreeList($startPid, $recursive, 0, '1');
                if (strlen($pids) > 0) {
                    $recursiveStoragePids .= ',' . $pids;
                }
            }
        }

        return GeneralUtility::uniqueList($recursiveStoragePids);
    }
}
