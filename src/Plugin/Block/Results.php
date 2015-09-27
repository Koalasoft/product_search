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
    $number = $this->configuration['number_of_results'];
    $i = 1;

    $result = db_query(
      "SELECT * FROM {ps_product} ORDER BY RAND() LIMIT $number"
    );

    foreach ($result as $record) {
      $id = $record->id;
      $name = ($record->name != '' ? "<h2>" . $record->name . "</h2>" : "");
      $phone = ($record->phone != '' ? "<p><span class='highlight'>" . t("Phone") . ": </span>" . $record->phone . "</p>" : "");
      $cellphone = ($record->cellphone != '' ? "<p><span class='normal'>" . t("Cellphone") . ": </span>" . $record->cellphone . "</p>" : "");
      $email = ($record->email != '' ? "<p><span class='normal'>" . t("Email") . ": </span>" . $record->email . "</p>" : "");
      $webpage = ($record->webpage != '' ? "<p><span class='normal'>" . t("Webpage") . ": </span><a href='http://" . $record->webpage . "' target='_blank' >" . $record->webpage . "</a></p>" : "");
      $address = ($record->address != '' ? "<p><span class='normal'>" . t("Address") . ": </span>" . $record->address . "</p>" : "");

      $build['newContent_' . $i] = array(
        '#markup' => "
          <div id='searched_" . $i . "'>
          <a href='product/" . $id . "' >" . $name . " </a>
          " . $phone . "
          " . $cellphone . "
          " . $email . "
          " . $webpage . "
          " . $address . "
          </div>",
      );
      $i++;
    }

    return $build;
  }

}
