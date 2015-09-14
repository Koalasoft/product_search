<?php

/**
 * @file
 * Contains Drupal\product_search\Entity\Product.
 */

namespace Drupal\product_search\Entity;

use Drupal\views\EntityViewsData;
use Drupal\views\EntityViewsDataInterface;

/**
 * Provides Views data for Product entities.
 */
class ProductViewsData extends EntityViewsData implements EntityViewsDataInterface {
  /**
   * {@inheritdoc}
   */
  public function getViewsData() {
    $data = parent::getViewsData();

    $data['ps_product']['table']['base'] = array(
      'field' => 'id',
      'title' => $this->t('Product'),
      'help' => $this->t('The Product ID.'),
    );

    return $data;
  }

}
