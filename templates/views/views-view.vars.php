<?php
/**
 * @file
 * Stub file for "views_view" theme hook [pre]process functions.
 */

/**
 * Pre-processes variables for the "views_view" theme hook.
 *
 * See template for list of available variables.
 *
 * @see views-view-table.tpl.php
 *
 * @ingroup theme_preprocess
 */
function livingstone_theme_preprocess_views_view(array &$variables) {
  $views = array(
    'repository',
    'geolocation',
    'timeline',
  );
  if (in_array($variables['view']->name, $views)) {
    $variables['classes_array'][] = 'col-md-push-1';
    $variables['classes_array'][] = 'col-md-10';
    $variables['classes_array'][] = 'clearfix';
  }
}
