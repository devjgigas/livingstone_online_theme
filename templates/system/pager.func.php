<?php
/**
 * @file
 * Stub file for bootstrap_pager().
 */

/**
 * Returns HTML for a query pager.
 *
 * Menu callbacks that display paged query results should call theme('pager') to
 * retrieve a pager control so that users can view other results. Format a list
 * of nearby pages with additional query results.
 *
 * @param array $variables
 *   An associative array containing:
 *   - tags: An array of labels for the controls in the pager.
 *   - element: An optional integer to distinguish between multiple pagers on
 *     one page.
 *   - parameters: An associative array of query string parameters to append to
 *     the pager links.
 *   - quantity: The number of pages in the list.
 *
 * @return string
 *   The constructed HTML.
 *
 * @see theme_pager()
 *
 * @ingroup theme_functions
 */
function livingstone_theme_pager($variables) {
  // Use the default pager implementation.
  return theme_pager($variables);
}
