<?php

/**
 * @file
 * Stub file for "html" theme hook [pre]process functions.
 */

/**
 * Implements hook_preprocess_html().
 */
function livingstone_theme_preprocess_html(array &$variables) {
  // We require some custom settings on the HTML element on the front page.
  if ($variables['is_front']) {
    $variables['html_attributes_array']['class'][] = 'front';
  }
  // Load site wide fonts.
  drupal_add_css('https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700,400italic,700italic|Crimson+Text:400,600,700,400italic,600italic|Patua+One|Oxygen:400,300,700', array(
    'type' => 'external'
  ));
  // Font awesome is used for icons.
  /*drupal_add_css('//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css', array(
   * 'type' => 'external'
   *));
   */
  // @todo add toggle for use of CDN.
  $theme_path = drupal_get_path('theme', 'livingstone_theme');
  drupal_add_css("$theme_path/css/font-awesome.min.css");
}