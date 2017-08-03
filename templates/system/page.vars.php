<?php

/**
 * @file
 * Stub file for "page" theme hook [pre]process functions.
 */

/**
 * Implements hook_preprocess_page().
 */
function livingstone_theme_preprocess_page(array &$variables) {
  if ($variables['is_front']) {
    $variables['primary_nav']['#theme_wrappers'] = array('menu_tree__primary__front');
  }
  // Remove the container class as there we don't need to nest them.
  foreach ($variables['navbar_classes_array'] as $key => $class) {
    if ($class == 'container') {
      unset($variables['navbar_classes_array'][$key]);
    }
  }
  // Hide the content pager when displaying specific content.
  $hide_content_pager = array(
    //'livingstone_browse_catalogue_livingstone_browse_catalogue',
  );
  foreach (array_keys($variables['page']['content']) as $content) {
    if (in_array($content, $hide_content_pager)) {
      unset($variables['page']['content_pager']);

    }
  }
}

/**
 * Implements hook_process_page().
 */
function livingstone_theme_process_page(array &$variables) {

}
