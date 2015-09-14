<?php

/**
 * @file
 * Contains Drupal\product_search\PoliticalDivisionAccessControlHandler.
 */

namespace Drupal\product_search;

use Drupal\Core\Entity\EntityAccessControlHandler;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Access\AccessResult;

/**
 * Access controller for the Political division entity.
 *
 * @see \Drupal\product_search\Entity\PoliticalDivision.
 */
class PoliticalDivisionAccessControlHandler extends EntityAccessControlHandler {
  /**
   * {@inheritdoc}
   */
  protected function checkAccess(EntityInterface $entity, $operation, $langcode, AccountInterface $account) {

    switch ($operation) {
      case 'view':
        return AccessResult::allowedIfHasPermission($account, 'view political division entities');

      case 'update':
        return AccessResult::allowedIfHasPermission($account, 'edit political division entities');

      case 'delete':
        return AccessResult::allowedIfHasPermission($account, 'delete political division entities');
    }

    return AccessResult::allowed();
  }

  /**
   * {@inheritdoc}
   */
  protected function checkCreateAccess(AccountInterface $account, array $context, $entity_bundle = NULL) {
    return AccessResult::allowedIfHasPermission($account, 'add political division entities');
  }

}
