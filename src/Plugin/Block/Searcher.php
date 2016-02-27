<?php

/**
 * @file
 * Contains Drupal\product_search\Plugin\Block\Searcher.
 */

namespace Drupal\product_search\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Provides a 'Searcher' block.
 *
 * @Block(
 *  id = "ps_searcher",
 *  admin_label = @Translation("Searcher"),
 * )
 */
class Searcher extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function blockForm($form, FormStateInterface $form_state) {
    $form['default_search'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Default search'),
      '#description' => $this->t('Default search'),
      '#default_value' => isset($this->configuration['default_search']) ? $this->configuration['default_search'] : '',
    );

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function blockSubmit($form, FormStateInterface $form_state) {
    $this->configuration['default_search'] = $form_state->getValue('default_search');
  }

  /**
   * {@inheritdoc}
   */
  public function build() {

    $defaultSearch = $this->configuration['default_search'];

    $build = [];
    $build['#attached']['library'][] = 'product_search/searcher';
    $build['#attached']['library'][] = 'product_search/awesomplete';

    $result = db_query('SELECT DISTINCT(name) FROM {ps_product}');
    $services = "";
    foreach ($result as $record) {
      $services = $record->name . ", " . $services;
    }
    $result = db_query('SELECT DISTINCT(detail) FROM {ps_product}');
    foreach ($result as $record) {
      if (!empty($record->detail) && strpos($services, $record->detail) === FALSE) {
        $services = $record->detail . ", " . $services;
      }
    }

    $build['need'] = array(
      '#type' => 'textfield',
      '#description' => $this->t(''),
      '#description_display' => null,
      '#default_value' => "",
      '#attributes' => array(
        'placeholder' => '_' . $this->t('What do you search?'),
        'id' => 'for-search',
        'class' => array(
          'awesomplete',
        ),
        'data-list' => $services,
      ),
      '#weight' => 1,
      '#maxlength' => 700,
      '#prefix' => "<div id='search'><div id='search-content'>",
    );

    $build['require'] = array(
      '#type' => "button",
      '#description_display' => null,
      '#value' => $this->t("I require"),
      '#attributes' => array(
        'id' => 'edit-require',
      ),
      '#ajax' => array(
        'callback' => array($this, 'viewSearch'),
        'wrapper' => 'searched',
        'method' => 'replace',
        'effect' => 'fade',
      ),
      '#weight' => 2,
    );

    $build['bid'] = array(
      '#type' => "button",
      '#description_display' => null,
      '#value' => $this->t("I bid"),
      '#attributes' => array(
        'id' => 'edit-bid',
      ),
      '#ajax' => array(
        'callback' => array($this, 'viewSearch'),
        'wrapper' => 'searched',
        'method' => 'replace',
        'effect' => 'fade',
      ),
      '#weight' => 3,
      '#suffix' => "</div></div>",
    );

    $build['promotional']['#markup'] = '<div id="promotional"><p>' . t('If you ') . '<strong>' . t('NEED') . '</strong>' . t(' a product. You are in the correct place...') . '</p></div>';

    return $build;
  }

}
