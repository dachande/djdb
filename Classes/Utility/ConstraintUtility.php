<?php
declare(strict_types=1);

namespace Dachande\Djdb\Utility;

use TYPO3\CMS\Extbase\Persistence\QueryInterface;
use TYPO3\CMS\Extbase\Persistence\Generic\Qom\ConstraintInterface;
use TYPO3\CMS\Core\Utility\GeneralUtility;

class ConstraintUtility
{
    /**
     * Returns as genre constraint created by
     * a given list of genres and a junction string
     *
     * @param \TYPO3\CMS\Extbase\Persistence\QueryInterface $query
     * @param array $genres
     * @param string $conjunction
     * @return null|\TYPO3\CMS\Extbase\Persistence\Generic\Qom\ConstraintInterface
     */
    public static function getGenreConstraint(
        QueryInterface $query,
        array $genres,
        string $conjunction
    ):? ConstraintInterface {
        $constraint = null;
        $genreConstraints = [];

        if (empty($conjunction)) {
            return $constraint;
        }

        foreach ($genres as $genre) {
            $genreConstraints[] = $query->contains('genres', $genre);
        }

        if (!empty($genreConstraints)) {
            switch (strtolower($conjunction)) {
                case 'or':
                    $constraint = $query->logicalOr($genreConstraints);
                    break;
                case 'notor':
                    $constraint = $query->logicalNot($query->logicalOr($genreConstraints));
                    break;
                case 'notand':
                    $constraint = $query->logicalNot($query->logicalOr($genreConstraints));
                    break;
                case 'and':
                default:
                    $constraint = $query->logicalAnd($genreConstraints);
            }
        }

        return $constraint;
    }

    /**
     * Returns a label constraint created by
     * a comma separated list of label names
     *
     * @param \TYPO3\CMS\Extbase\Persistence\QueryInterface $query
     * @param string $labels
     * @return null|\TYPO3\CMS\Extbase\Persistence\Generic\Qom\ConstraintInterface
     */
    public static function getLabelConstraint(QueryInterface $query, string $labels):? ConstraintInterface
    {
        $constraint = null;
        $labelConstraints = [];

        if (empty($labels)) {
            return $constraint;
        }

        $labels = GeneralUtility::trimExplode(',', $labels, true);

        foreach ($labels as $label) {
            $labelConstraints[] = $query->equals('label', $label);
        }

        $constraint = $query->logicalOr($labelConstraints);

        return $constraint;
    }
}
