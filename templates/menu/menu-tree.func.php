<?php
/**
 * @file
 * Stub file for bootstrap_menu_tree() and suggestion(s).
 */

/**
 * Bootstrap theme wrapper function for the primary menu links.
 */
function livingstone_theme_menu_tree__primary(&$variables) {
  return '<ul class="menu nav navbar-nav primary">' . $variables['tree'] . '</ul>';
}

/**
 * Bootstrap theme wrapper function for the primary menu on the front page.
 */
function livingstone_theme_menu_tree__primary__front(&$variables) {
  return '<ul class="menu nav primary">' . $variables['tree'] . '</ul>';
}
