<?php

/**
 * @file
 * Contains Drupal\product_search\CategoryListBuilder.
 */

namespace Drupal\product_search;

use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Entity\EntityListBuilder;
use Drupal\Core\Routing\LinkGeneratorTrait;
use Drupal\Core\Url;

/**
 * Defines a class to build a listing of Category entities.
 *
 * @ingroup product_search
 */
class CategoryListBuilder extends EntityListBuilder {
  use LinkGeneratorTrait;
  /**
   * {@inheritdoc}
   */
  public function buildHeader() {
    $header['id'] = $this->t('Category ID');
    $header['name'] = $this->t('Name');
    return $header + parent::buildHeader();
  }

  /**
   * {@inheritdoc}
   */
  public function buildRow(EntityInterface $entity) {
    /* @var $entity \Drupal\product_search\Entity\Category */
    $row['id'] = $entity->id();
    $row['name'] = $this->l(
      $this->getLabel($entity),
      new Url(
        'entity.ps_category.edit_form', array(
          'ps_category' => $entity->id(),
        )
      )
    );
    return $row + parent::buildRow($entity);
  }

}
