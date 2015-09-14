<?php

/**
 * @file
 * Contains ps_presentation.page.inc.
 *
 * Page callback for Presentation entities.
 */

use Drupal\Core\Render\Element;

/**
 * Prepares variables for Presentation templates.
 *
 * Default template: ps_presentation.html.twig.
 *
 * @param array $variables
 *   An associative array containing:
 *   - elements: An associative array containing the user information and any
 *   - attributes: HTML attributes for the containing element.
 */
function template_preprocess_ps_presentation(array &$variables) {
  // Fetch Presentation Entity Object.
  $ps_presentation = $variables['elements']['#ps_presentation'];

  // Helpful $content variable for templates.
  foreach (Element::children($variables['elements']) as $key) {
    $variables['content'][$key] = $variables['elements'][$key];
  }
}
