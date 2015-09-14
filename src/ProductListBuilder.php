<?php

/**
 * @file
 * Contains Drupal\product_search\ProductListBuilder.
 */

namespace Drupal\product_search;

use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Entity\EntityListBuilder;
use Drupal\Core\Routing\LinkGeneratorTrait;
use Drupal\Core\Url;

/**
 * Defines a class to build a listing of Product entities.
 *
 * @ingroup product_search
 */
class ProductListBuilder extends EntityListBuilder {
  use LinkGeneratorTrait;
  /**
   * {@inheritdoc}
   */
  public function buildHeader() {
    $header['id'] = $this->t('Product ID');
    $header['name'] = $this->t('Name');
    return $header + parent::buildHeader();
  }

  /**
   * {@inheritdoc}
   */
  public function buildRow(EntityInterface $entity) {
    /* @var $entity \Drupal\product_search\Entity\Product */
    $row['id'] = $entity->id();
    $row['name'] = $this->l(
      $this->getLabel($entity),
      new Url(
        'entity.ps_product.edit_form', array(
          'ps_product' => $entity->id(),
        )
      )
    );
    return $row + parent::buildRow($entity);
  }

}
