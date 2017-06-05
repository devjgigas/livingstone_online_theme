<?php

/**
 * @file
 * Stub file for "region" theme hook [pre]process functions.
 */

/**
 * @param $variables
 */
function livingstone_theme_preprocess_region(array &$variables) {
  if (bootstrap_setting('fluid_container') == 1) {
    $variables['container_class'] = 'container-fluid';
  }
  else {
    $variables['container_class'] = 'container';
  }
  $region = $variables['region'];
  $classes = &$variables['classes_array'];
  switch ($region) {
    case 'fixed_header':
      $classes[] = 'no-gutter';
      break;
  }
}
