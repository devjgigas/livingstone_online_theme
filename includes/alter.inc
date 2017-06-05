<?php

/**
 * @file
 * alter.inc
 *
 * Contains various implementations of hook_*_alter().
 */

/**
* implements hook_form_alter().
*/
function livingstone_theme_form_alter(array &$form, array &$form_state = array(), $form_id = null) {
  if ($form_id) {
    switch ($form_id) {
      case 'search_block_form':
        $form['#attributes']['class'][] = 'form-inline';
        $form['search_block_form']['#attributes']['placeholder'] = t('Search the entire site');
        $form['search_block_form']['#attributes']['class'][] = 'input-xs';
        $form['search_block_form']['#size'] = 30;
        break;
      case 'views_exposed_form':
        $views = array(
          'views-exposed-form-timeline-block-timeline',
          'views-exposed-form-geolocation-block-geolocation',
        );
        if (in_array($form['#id'], $views)) {
          $field_prefix = <<<EOT
<span class="input-group-addon">
  <span class="icon glyphicon glyphicon-search" aria-hidden="true"></span>
</span>
EOT;
          $size = 25;
          $form['#attributes']['class'][] = 'form-inline';
          $form['title']['#attributes']['placeholder'] = t('Search title');
          $form['title']['#wrapper_attributes']['class'][] = 'input-group';
          $form['title']['#field_prefix'] = $field_prefix;
          $form['title']['#size'] = $size ;
          $form['field_manuscript_dates_value']['#attributes']['placeholder'] = t('Search date(s)');
          $form['field_manuscript_dates_value']['#wrapper_attributes']['class'][] = 'input-group';
          $form['field_manuscript_dates_value']['#field_prefix'] = $field_prefix;
          $form['field_manuscript_dates_value']['#size'] = $size;
          $form['field_manuscript_creators_value']['#attributes']['placeholder'] = t('Search creator(s)');
          $form['field_manuscript_creators_value']['#wrapper_attributes']['class'][] = 'input-group';
          $form['field_manuscript_creators_value']['#field_prefix'] = $field_prefix;
          $form['field_manuscript_creators_value']['#size'] = $size;
        }
        break;
    }
  }
}
