<?php

/**
 * @file
 * Contains \Drupal\product_search\Tests\DefaultController.
 */

namespace Drupal\product_search\Tests;

use Drupal\simpletest\WebTestBase;

/**
 * Provides automated tests for the product_search module.
 */
class DefaultControllerTest extends WebTestBase {
  /**
   * {@inheritdoc}
   */
  public static function getInfo() {
    return array(
      'name' => "product_search DefaultController's controller functionality",
      'description' => 'Test Unit for module product_search and controller DefaultController.',
      'group' => 'Other',
    );
  }

  /**
   * {@inheritdoc}
   */
  public function setUp() {
    parent::setUp();
  }

  /**
   * Tests product_search functionality.
   */
  public function testDefaultController() {
    // Check that the basic functions of module product_search.
    $this->assertEquals(TRUE, TRUE, 'Test Unit Generated via App Console.');
  }

}
