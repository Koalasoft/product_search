<?php

/**
 * @file
 * Contains Drupal\product_search\PersonInterface.
 */

namespace Drupal\product_search;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\Core\Entity\EntityTypeInterface;
use Drupal\user\EntityOwnerInterface;

/**
 * Provides an interface for defining Person entities.
 *
 * @ingroup product_search
 */
interface PersonInterface extends ContentEntityInterface, EntityOwnerInterface {
  // Add get/set methods for your configuration properties here.

}
