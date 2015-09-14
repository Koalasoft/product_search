<?php

/**
 * @file
 * Contains Drupal\product_search\ProductInterface.
 */

namespace Drupal\product_search;

use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\Core\Entity\EntityTypeInterface;
use Drupal\user\EntityOwnerInterface;

/**
 * Provides an interface for defining Product entities.
 *
 * @ingroup product_search
 */
interface ProductInterface extends ContentEntityInterface, EntityOwnerInterface {
  // Add get/set methods for your configuration properties here.

}
