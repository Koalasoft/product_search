<?php

/**
 * @file
 * Contains Drupal\product_search\Entity\Presentation.
 */

namespace Drupal\product_search\Entity;

use Drupal\views\EntityViewsData;
use Drupal\views\EntityViewsDataInterface;

/**
 * Provides Views data for Presentation entities.
 */
class PresentationViewsData extends EntityViewsData implements EntityViewsDataInterface {
  /**
   * {@inheritdoc}
   */
  public function getViewsData() {
    $data = parent::getViewsData();

    $data['ps_presentation']['table']['base'] = array(
      'field' => 'id',
      'title' => $this->t('Presentation'),
      'help' => $this->t('The Presentation ID.'),
    );

    return $data;
  }

}
