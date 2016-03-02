<?php

/**
 * @file
 * Contains Drupal\product_search\Plugin\Block\Results.
 */

namespace Drupal\product_search\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Provides a 'Results' block.
 *
 * @Block(
 *  id = "ps_results",
 *  admin_label = @Translation("Results"),
 * )
 */
class Results extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function blockForm($form, FormStateInterface $form_state) {
    $form['number_of_results'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Number of results'),
      '#description' => $this->t('Number of results for sercher'),
      '#default_value' => isset($this->configuration['number_of_results']) ? $this->configuration['number_of_results'] : '',
    );

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function blockSubmit($form, FormStateInterface $form_state) {
    $this->configuration['number_of_results'] = $form_state->getValue('number_of_results');
  }

  /**
   * {@inheritdoc}
   */
  public function build() {
    $build = [];

    $build['content'] = array(
        '#markup' => "
          <div id='block-results'> </div>",
    );

    return $build;
  }

}
