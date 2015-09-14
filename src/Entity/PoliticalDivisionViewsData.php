<?php

/**
 * @file
 * Contains Drupal\product_search\Entity\PoliticalDivision.
 */

namespace Drupal\product_search\Entity;

use Drupal\views\EntityViewsData;
use Drupal\views\EntityViewsDataInterface;

/**
 * Provides Views data for Political division entities.
 */
class PoliticalDivisionViewsData extends EntityViewsData implements EntityViewsDataInterface {
  /**
   * {@inheritdoc}
   */
  public function getViewsData() {
    $data = parent::getViewsData();

    $data['ps_political_division']['table']['base'] = array(
      'field' => 'id',
      'title' => $this->t('Political division'),
      'help' => $this->t('The Political division ID.'),
    );

    return $data;
  }

}
