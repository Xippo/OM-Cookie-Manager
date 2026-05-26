<?php

declare(strict_types=1);

namespace OM\OmCookieManager\Tca\ItemsProcFunc;

use Doctrine\DBAL\Exception;
use Doctrine\DBAL\ParameterType;
use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Utility\DebuggerUtility;

final class CookieItemsProcFunc
{
    /**
     * @param array $params FormEngine itemsProcFunc params (by reference)
     * @throws Exception
     */
    public function existingCookiesItems(array &$params): void
    {
        // Current record (cookiegroup) uid; fallback for translated records
        $row = $params['row'] ?? [];
        $currentUid = (int)($row['uid'] ?? 0);
        if ($currentUid <= 0) {
            $currentUid = (int)($row['l10n_parent'] ?? 0);
        }

        $queryBuilder = GeneralUtility::makeInstance(ConnectionPool::class)
            ->getQueryBuilderForTable('tx_omcookiemanager_domain_model_cookie');

        $queryBuilder
            ->select('uid', 'name')
            ->from('tx_omcookiemanager_domain_model_cookie')
            ->orderBy('name', 'ASC');

        // Exclude cookies that are already assigned to this cookiegroup
        if ($currentUid > 0) {
            $queryBuilder->andWhere(
                $queryBuilder->expr()->neq(
                    'cookiegroup',
                    $queryBuilder->createNamedParameter($currentUid, ParameterType::INTEGER)
                )
            );
        }

        $rows = $queryBuilder->executeQuery()->fetchAllAssociative();

        // Reset default items and fill with our dynamic items
        $params['items'] = [];
        foreach ($rows as $cookie) {
            $params['items'][] = [
                (string)($cookie['name'] ?? ('UID ' . (string)$cookie['uid'])),
                (int)$cookie['uid'],
            ];
        }
    }
}
