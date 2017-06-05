<?php

/**
 * @file
 * The primary PHP file for this theme.
 */

/**
 * Implements hook_theme_registry_alter().
 */
function livingstone_theme_theme_registry_alter(&$registry) {
  // Use the default menu link rather than the bootstrap dropdown.
  $registry['menu_link']['function'] = 'theme_menu_link';
}

/**
 * Declare various hook_*_alter() hooks.
 *
 * hook_*_alter() implementations must live (via include) inside this file so
 * they are properly detected when drupal_alter() is invoked.
 */
bootstrap_include('livingstone_theme', 'includes/alter.inc');


/**
 * Builds the final Nodequeue Pager.
 *
 * @param array $variables
 *   An associative array containing:
 *   - sqid: The id of the nodequeue to use
 *   - nid: The id of the node within the nodequeue.
 *   - wrap: Boolean true or false value as to whether prev and next
 *   links should wrap back to begining or end of nodequeue.
 * @return
 *   An HTML string of the pager
}
 */
function livingstone_theme_nodequeue_pager($vars) {
  $pager = getPager($vars['sqid'], $vars['wrap']);

  $prev = FALSE;
  $next = FALSE;

  switch ($vars['links']) {
    case 0:
      $prev = _getPagerPrevious($pager, $vars['nid']);
      break;

    case 1:
      $next = _getPagerNext($pager, $vars['nid']);
      break;

    default:
      $prev = _getPagerPrevious($pager, $vars['nid']);
      $next = _getPagerNext($pager, $vars['nid']);
      break;
  }

  $render = array();

  if ($prev) {
    $title = '';
    if($node = node_load($prev)) {
      $title = $node->title;
    }
    $render[] = array(
      '#type' => 'link',
      '#title' => '&nbsp;',
      '#href' => 'node/'. $prev,
      '#options' => array(
        'attributes' => array(
          'title' => $title,
        ),
        'html' => TRUE,
      )
    );
  }
  if ($next) {
    $title = '';
    if($node = node_load($next)) {
      $title = $node->title;
    }
    $render[] = array(
      '#type' => 'link',
      '#title' => '&nbsp;',
      '#href' => 'node/'. $next,
      '#options' => array(
        'attributes' => array(
          'title' => $title,
        ),
        'html' => TRUE,
      )
    );
  }
  return $render;
}

function livingstone_theme_breadcrumb(array $variables) {
  $output = '';
  $breadcrumb = &$variables['breadcrumb'];
  // Determine if we are to display the breadcrumb.
  $bootstrap_breadcrumb = bootstrap_setting('breadcrumb');
  if (($bootstrap_breadcrumb == 1 || ($bootstrap_breadcrumb == 2 && arg(0) == 'admin')) && !empty($breadcrumb)) {
    // Rename home to the site name.
    $breadcrumb[0] = l(variable_get('site_name'), '<front>');
    // Add link to site section if possible.
    if ($node = menu_get_object()) {
      if (isset($node->type) && $node->type == 'section_page') {
        $tid = $node->field_section['und'][0]['tid'];
        $section = taxonomy_term_load($tid);
        if ($section !== FALSE) {
          $name = $section->name;
          $section = preg_replace('/[^a-zA-Z_-]+/', '-', strtolower($name));
          array_splice($breadcrumb, 1, 0, l($name, "/{$section}"));
          $variables['classes_array'][] = "section-$section";
        }
      }
    }
    $classes = isset($variables['classes_array']) ? $variables['classes_array'] : array();
    $output = theme('item_list', array(
      'attributes' => array(
        'class' => array_merge(array('breadcrumb'), $classes),
      ),
      'items' => $breadcrumb,
      'type' => 'ol',
    ));
  }
  return $output;
}

/**
 * Theme function to render the alphabetical pager.
 *
 * @param array $variables
 *   Array of parameters, including:
 *   - facet_queries: Facet queries returned from Solr.
 *     eg: solr_field:A* => 1234
 *     This array is used to check the bucket size. An empty bucket won't be
 *     rendered into a link.
 *   - fq_map: Array which maps query filter so prefixes.
 *     eg: solr_field:A* => A
 *     Used to render the link values.
 *   - prefix: Currently active prefix for this page. Used to set active
 *     classes.
 *   - path: Currently active path which is set in the admin interface to
 *     decide what Solr field to facet on. Used to create URL's.
 *     eg: url('browse/' . $path).
 *
 * @return string
 *   Return rendered alphabetical pager
 *
 * @see islandora_solr_facet_pages_theme()
 * @see islandora_solr_facet_pages_build_letterer()
 */
function livingstone_theme_theme_islandora_solr_facet_pages_letterer(&$variables) {
  extract($variables);
  $output = '<ul class="islandora-solr-facet-pages-letterer">';
  $output .= '<li class="letter first' . ((t('ALL') == $prefix) ? ' active' : '') . '">';
  $output .= '<a href="' . url('browse/' . $path) . '" title="' . t('Browse all') . '">' . t('ALL') . '</a>';
  $output .= '</li>';
  // Loop over facet queries to render letters.
  foreach ($facet_queries as $query => $count) {
    $value = $fq_map[$query];
    $output .= '<li class="letter' . (($value == $prefix) ? ' active' : '') . '">';
    // Create link if facet bucket is not empty.
    if ($count > 0) {
      $url = 'in-his-own-words/' . $path . '/' . $value;
      $output .= '<a href="' . url($url) . '" title="' . t('Browse starting with @letter', array('@letter' => $value)) . '">' . $value . '</a>';
    }
    else {
      $output .= $value;
    }
    $output .= '</li>';
  }
  $output .= '</ul>';
  return $output;
}
