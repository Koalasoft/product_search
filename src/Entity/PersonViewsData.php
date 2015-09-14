<?php

/**
 * @file
 * Contains Drupal\product_search\Entity\Person.
 */

namespace Drupal\product_search\Entity;

use Drupal\views\EntityViewsData;
use Drupal\views\EntityViewsDataInterface;

/**
 * Provides Views data for Person entities.
 */
class PersonViewsData extends EntityViewsData implements EntityViewsDataInterface {
  /**
   * {@inheritdoc}
   */
  public function getViewsData() {
    $data = parent::getViewsData();

    $data['ps_person']['table']['base'] = array(
      'field' => 'id',
      'title' => $this->t('Person'),
      'help' => $this->t('The Person ID.'),
    );

    return $data;
  }

}
