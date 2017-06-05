<?php

/**
 * @file
 * Stub file for "node" theme hook [pre]process functions.
 */

/**
 * Implements hook_theme_preprocess_node().
 */
function livingstone_theme_preprocess_node(array &$variables) {
  $node = $variables['node'];
  switch ($node->type) {
    case 'section_page':
      $variables['classes_array'][] = "uuid-{$node->uuid}";
      // Required field, should be populated.
      $tid = $node->field_section['und'][0]['tid'];
      $section = taxonomy_term_load($tid);
      if ($section !== FALSE) {
        $name = preg_replace('/[^a-zA-Z_-]+/', '-', strtolower($section->name));
        $variables['classes_array'][] = "section-{$name}";
      }
      break;
  }
  // Hack specific UUID for the node.
  if ($variables['node']->uuid == '255bf215-fc27-4341-8695-a0a7b4a38d6f') {
    $variables['theme_hook_suggestions'][] = 'node__section_page_encoding_guidelines';
  }
}
