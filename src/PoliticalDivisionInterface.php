<?php

/**
 * @file
 * Contains Drupal\product_search\PoliticalDivisionInterface.
 */

namespace Drupal\product_search;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\Core\Entity\EntityTypeInterface;
use Drupal\user\EntityOwnerInterface;

/**
 * Provides an interface for defining Political division entities.
 *
 * @ingroup product_search
 */
interface PoliticalDivisionInterface extends ContentEntityInterface, EntityOwnerInterface {
  // Add get/set methods for your configuration properties here.

}
