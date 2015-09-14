<?php

/**
 * @file
 * Contains ps_political_division.page.inc.
 *
 * Page callback for Political division entities.
 */

use Drupal\Core\Render\Element;

/**
 * Prepares variables for Political division templates.
 *
 * Default template: ps_political_division.html.twig.
 *
 * @param array $variables
 *   An associative array containing:
 *   - elements: An associative array containing the user information and any
 *   - attributes: HTML attributes for the containing element.
 */
function template_preprocess_ps_political_division(array &$variables) {
  // Fetch PoliticalDivision Entity Object.
  $ps_political_division = $variables['elements']['#ps_political_division'];

  // Helpful $content variable for templates.
  foreach (Element::children($variables['elements']) as $key) {
    $variables['content'][$key] = $variables['elements'][$key];
  }
}
