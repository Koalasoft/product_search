<?php

/**
 * @file
 * Contains Drupal\product_search\PoliticalDivisionListBuilder.
 */

namespace Drupal\product_search;

use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Entity\EntityListBuilder;
use Drupal\Core\Routing\LinkGeneratorTrait;
use Drupal\Core\Url;

/**
 * Defines a class to build a listing of Political division entities.
 *
 * @ingroup product_search
 */
class PoliticalDivisionListBuilder extends EntityListBuilder {
  use LinkGeneratorTrait;
  /**
   * {@inheritdoc}
   */
  public function buildHeader() {
    $header['id'] = $this->t('Political division ID');
    $header['name'] = $this->t('Name');
    return $header + parent::buildHeader();
  }

  /**
   * {@inheritdoc}
   */
  public function buildRow(EntityInterface $entity) {
    /* @var $entity \Drupal\product_search\Entity\PoliticalDivision */
    $row['id'] = $entity->id();
    $row['name'] = $this->l(
      $this->getLabel($entity),
      new Url(
        'entity.ps_political_division.edit_form', array(
          'ps_political_division' => $entity->id(),
        )
      )
    );
    return $row + parent::buildRow($entity);
  }

}
