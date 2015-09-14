<?php

/**
 * @file
 * Contains Drupal\product_search\Entity\Form\PoliticalDivisionSettingsForm.
 */

namespace Drupal\product_search\Entity\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class PoliticalDivisionSettingsForm.
 *
 * @package Drupal\product_search\Form
 *
 * @ingroup product_search
 */
class PoliticalDivisionSettingsForm extends FormBase {
  /**
   * Returns a unique string identifying the form.
   *
   * @return string
   *   The unique string identifying the form.
   */
  public function getFormId() {
    return 'PoliticalDivision_settings';
  }

  /**
   * Form submission handler.
   *
   * @param array $form
   *   An associative array containing the structure of the form.
   * @param \Drupal\Core\Form\FormStateInterface $form_state
   *   The current state of the form.
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    // Empty implementation of the abstract submit class.
  }


  /**
   * Defines the settings form for Political division entities.
   *
   * @param array $form
   *   An associative array containing the structure of the form.
   * @param \Drupal\Core\Form\FormStateInterface $form_state
   *   The current state of the form.
   *
   * @return array
   *   Form definition array.
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['PoliticalDivision_settings']['#markup'] = 'Settings form for Political division entities. Manage field settings here.';
    return $form;
  }

}
