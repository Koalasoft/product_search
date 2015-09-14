<?php

/**
 * @file
 * Contains Drupal\product_search\CategoryInterface.
 */

namespace Drupal\product_search;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\Core\Entity\EntityTypeInterface;
use Drupal\user\EntityOwnerInterface;

/**
 * Provides an interface for defining Category entities.
 *
 * @ingroup product_search
 */
interface CategoryInterface extends ContentEntityInterface, EntityOwnerInterface {
  // Add get/set methods for your configuration properties here.

}
