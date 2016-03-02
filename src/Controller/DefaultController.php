<?php

/**
 * @file
 * Contains \Drupal\product_search\Controller\DefaultController.
 */

namespace Drupal\product_search\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\HttpFoundation\Response;
use Drupal\product_search\Entity\Product;

/**
 * Class DefaultController.
 *
 * @package Drupal\product_search\Controller
 */
class DefaultController extends ControllerBase {
  /**
   * Search.
   *
   * @return json
   *   Return json.
   */
  public function search($searched, $operation) {
    $idsEntities = \Drupal::entityQuery('ps_product', 'OR')
        ->condition('name', $searched, 'CONTAINS')
        ->condition('detail', $searched, 'CONTAINS')
        ->execute();
    $entities = Product::loadMultiple($idsEntities);
    $i = 0;

    $result = array();
    foreach ($entities as $entity) {
      if ($entity->getType() == $operation) {
        $result[$i] = array(
            'id' => $entity->getId(),
            'name' => $entity->get('name')->value,
            'phone' => $entity->get('phone')->value,
            'cellphone' => $entity->get('cellphone')->value,
            'email' => $entity->get('email')->value,
            'webpage' => $entity->get('webpage')->value,
            'address' => $entity->get('address')->value,
            'detail' => $entity->get('detail')->value,
        );
        $i++;
      }
    }

    $response = new Response();
    $response->setContent(json_encode($result));
    $response->headers->set('Content-Type', 'application/json');
    return $response;
  }

}
