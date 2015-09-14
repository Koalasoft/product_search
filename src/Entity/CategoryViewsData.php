<?php

/**
 * @file
 * Contains Drupal\product_search\Entity\Category.
 */

namespace Drupal\product_search\Entity;

use Drupal\views\EntityViewsData;
use Drupal\views\EntityViewsDataInterface;

/**
 * Provides Views data for Category entities.
 */
class CategoryViewsData extends EntityViewsData implements EntityViewsDataInterface {
  /**
   * {@inheritdoc}
   */
  public function getViewsData() {
    $data = parent::getViewsData();

    $data['ps_category']['table']['base'] = array(
      'field' => 'id',
      'title' => $this->t('Category'),
      'help' => $this->t('The Category ID.'),
    );

    return $data;
  }

}
