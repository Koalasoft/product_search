<?php

/**
 * @file
 * Contains Drupal\product_search\PresentationListBuilder.
 */

namespace Drupal\product_search;

use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Entity\EntityListBuilder;
use Drupal\Core\Routing\LinkGeneratorTrait;
use Drupal\Core\Url;

/**
 * Defines a class to build a listing of Presentation entities.
 *
 * @ingroup product_search
 */
class PresentationListBuilder extends EntityListBuilder {
  use LinkGeneratorTrait;
  /**
   * {@inheritdoc}
   */
  public function buildHeader() {
    $header['id'] = $this->t('Presentation ID');
    $header['name'] = $this->t('Name');
    return $header + parent::buildHeader();
  }

  /**
   * {@inheritdoc}
   */
  public function buildRow(EntityInterface $entity) {
    /* @var $entity \Drupal\product_search\Entity\Presentation */
    $row['id'] = $entity->id();
    $row['name'] = $this->l(
      $this->getLabel($entity),
      new Url(
        'entity.ps_presentation.edit_form', array(
          'ps_presentation' => $entity->id(),
        )
      )
    );
    return $row + parent::buildRow($entity);
  }

}
