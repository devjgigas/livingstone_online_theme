<?php
/**
 * @file
 * Stub file for "block" theme hook [pre]process functions.
 */

/**
 */
function livingstone_theme_preprocess_block(array &$variables) {
  $block = $variables['block'];
  switch ($block->delta) {
    case 'livingstone_slide_out_menu':
      $variables['classes_array'][] = 'hidden-xs';
      $variables['classes_array'][] = 'col-sm-1';
      break;

    case 'menu-fixed-header-menu':
      $variables['classes_array'][] = 'visible-lg-inline-block';
      $variables['classes_array'][] = 'col-lg-1';
      break;

    case 'livingstone_fixed_search_form':
      $variables['classes_array'][] = 'col-xs-12';
      $variables['classes_array'][] = 'hidden-sm';
      $variables['classes_array'][] = 'col-md-3';
      $variables['classes_array'][] = 'fixed-header';
      break;

    case 'livingstone_breadcrumbs':
      $variables['classes_array'][] = 'hidden-xs';
      $variables['classes_array'][] = 'col-sm-11';
      $variables['classes_array'][] = 'col-md-8';
      $variables['classes_array'][] = 'col-lg-7';
      break;

    case 'livingstone_browse_catalogue':
      break;
  }
}
