<?php
/**
 * Implements hook_html_head_alter().
 * This will overwrite the default meta character type tag with HTML5 version.
 */
function lo_html_head_alter(&$head_elements) {
  $head_elements['system_meta_content_type']['#attributes'] = array(
    'charset' => 'utf-8'
  );
}

function lo_breadcrumb($breadcrumb) {
   $themed_breadcrumb_class = token_replace('[current-page:url:args:first]'); 
  if (empty($breadcrumb)) {
    return $themed_breadcrumb = 'Livingstone Online <div id="breadcrumb" class="' . $themed_breadcrumb_class . '"></div>';
  }
  else {
    $themed_breadcrumb = '<div id="breadcrumb" class="' . $themed_breadcrumb_class . '">';
    $array_size = count($breadcrumb['breadcrumb']);
    $i = 0;
    while ( $i < $array_size ) {
      $themed_breadcrumb .= '<span class="breadcrumb-';
      $themed_breadcrumb .= $i;
      $themed_breadcrumb .=  '">' . $breadcrumb['breadcrumb'][$i] . '</span>';
      if ( $i + 1 != $array_size ) {
        $themed_breadcrumb .=  '  ';
      }
      $i++;
    }
    $themed_breadcrumb .= '</div>';
    return $themed_breadcrumb;
  }
}

function lo_preprocess_html(&$vars) {
  $vars['attributes_array']['class'][] = $vars['classes_array'][] = 'page-' . drupal_html_class(drupal_get_title());

    $path = drupal_get_path_alias($_GET['q']);
  $aliases = explode('/', $path);
 
  foreach($aliases as $alias) {
    $vars['classes_array'][] = drupal_clean_css_identifier($alias);
  } 
}
/**
 * Override or insert variables into the page template.
 */
function lo_preprocess_page(&$vars) {
  $form = drupal_get_form('search_block_form');
  $search_box = drupal_render($form);
  $vars['search_box'] = $search_box;

  if ($node = menu_get_object()) {
    $variables['node'] = $node;
  }

  if (isset($vars['main_menu'])) {
    $vars['main_menu'] = theme('links__system_main_menu', array(
      'links' => $vars['main_menu'],
      'attributes' => array(
        'class' => array('links', 'main-menu', 'clearfix'),
      ),
      'heading' => array(
        'text' => t('Main menu'),
        'level' => 'h2',
        'class' => array('element-invisible'),
      )
    ));
  }
  else {
    $vars['main_menu'] = FALSE;
  }
  if (isset($vars['secondary_menu'])) {
    $vars['secondary_menu'] = theme('links__system_secondary_menu', array(
      'links' => $vars['secondary_menu'],
      'attributes' => array(
        'class' => array('links', 'secondary-menu', 'clearfix'),
      ),
      'heading' => array(
        'text' => t('Secondary menu'),
        'level' => 'h2',
        'class' => array('element-invisible'),
      )
    ));
  }
  else {
    $vars['secondary_menu'] = FALSE;
  }
 
   $templates = $vars['theme_hook_suggestions'];
}

/**
 * Duplicate of theme_menu_local_tasks() but adds clearfix to tabs.
 */
function lo_menu_local_tasks(&$variables) {
  $output = '';

  if (!empty($variables['primary'])) {
    $variables['primary']['#prefix'] = '<h2 class="element-invisible">' . t('Primary tabs') . '</h2>';
    $variables['primary']['#prefix'] .= '<ul class="tabs primary clearfix">';
    $variables['primary']['#suffix'] = '</ul>';
    $output .= drupal_render($variables['primary']);
  }
  if (!empty($variables['secondary'])) {
    $variables['secondary']['#prefix'] = '<h2 class="element-invisible">' . t('Secondary tabs') . '</h2>';
    $variables['secondary']['#prefix'] .= '<ul class="tabs secondary clearfix">';
    $variables['secondary']['#suffix'] = '</ul>';
    $output .= drupal_render($variables['secondary']);
  }
  return $output;
}

/**
 * Override or insert variables into the node template.
 */
function lo_preprocess_node(&$variables) {
  $node = $variables['node'];
  if ($variables['view_mode'] == 'full' && node_is_page($variables['node'])) {
    $variables['classes_array'][] = 'node-full';
  }
  $variables['date'] = t('!datetime', array('!datetime' =>  date('j F Y', $variables['created'])));
}

function lo_page_alter($page) {
  // <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
  $viewport = array(
    '#type' => 'html_tag',
    '#tag' => 'meta',
    '#attributes' => array(
    'name' =>  'viewport',
    'content' =>  'width=device-width, initial-scale=1, maximum-scale=1'
    )
  );
  drupal_add_html_head($viewport, 'viewport');
}


/**
 * Add javascript files for front-page jquery slideshow.
 */
if (drupal_is_front_page()) {
  drupal_add_js(drupal_get_path('theme', 'lo') . '/js/jquery.flexslider.js');
  drupal_add_js(drupal_get_path('theme', 'lo') . '/js/slide.js');
  drupal_add_css(drupal_get_path('theme', 'lo') . '/style.css', array('group' => CSS_THEME));
}else{    
    drupal_add_css(drupal_get_path('theme', 'lo') . '/style_section.css', array('group' => CSS_THEME)); 
}
function lo_menu_link__main_menu(array $variables) {
$element = $variables['element'];
  
  return '<li class="frmore"><a title="'.$element['#title'].'"  href="'.base_path().$element['#href'].'">' . $element['#title'] . "</a></li>\n";
}
function lo_menu_tree__main_menu($variables) {
  return '' . $variables['tree'] . '';
}
function lo_menu_tree__menu_external_links($variables) {
  return '' . $variables['tree'] . '';
}

function lo_menu_link__menu_external_links(array $variables) {
  $element = $variables['element'];
  /*$sub_menu = '';

  if ($element['#below']) {
    $sub_menu = drupal_render($element['#below']);
  }
  $output = l($element['#title'], $element['#href'], $element['#localized_options']);
  return '<li' . drupal_attributes($element['#attributes']) . '>' . $output . $sub_menu . "</li>\n";*/
  if($element['#title'] == 'Home'){
     //$element['#title'] = '<img title="home" class="img_menu"   src="'.base_path().drupal_get_path('theme', 'lo').'/images/home.png"/>'; 
     $element['#title'] = '/><i class="fa fa-home"></i>';
  }
    if($element['#title'] == 'Mail'){
     //$element['#title'] = '<img title="mail" class="img_menu_mail" src="'.base_path().drupal_get_path('theme', 'lo').'/images/mail.jpg"/>'; 
     $element['#title'] = '/><i class="fa fa-envelope"></i>';      
  }
    if($element['#title'] == 'Twitter'){
     //$element['#title'] = '<img title="twitter" class="img_menu"  src="'.base_path().drupal_get_path('theme', 'lo').'/images/twitter.png"/>';
      $element['#title'] = 'target="_blank"/><i class="fa fa-twitter"></i>';  
  }
    if($element['#title'] == 'WordPress'){
     //$element['#title'] = '<img title="wordpress" class="img_menu" src="'.base_path().drupal_get_path('theme', 'lo').'/images/wordpress.png"/>'; 
     $element['#title'] = 'target="_blank"/><i class="fa fa-wordpress"></i>';        
  }
  
  //$output = l($element['#title'], $element['#href'], $element['#localized_options']);
  return '<li' . drupal_attributes($element['#attributes']) . '><li class="leaf"><a href="'.$element['#href'].'"' . $element['#title'] . "</a></li>\n";
}

function lo_form_element($variables) {
  $element = &$variables['element'];

  // This function is invoked as theme wrapper, but the rendered form element
  // may not necessarily have been processed by form_builder().
  $element += array(
    '#title_display' => 'before',
  );

  
 
  $output =  "\n";

  // If #title is not set, we don't display any label or required marker.
  if (!isset($element['#title'])) {
    $element['#title_display'] = 'none';
  }
  $prefix = isset($element['#field_prefix']) ? '<span class="field-prefix">' . $element['#field_prefix'] . '</span> ' : '';
  $suffix = isset($element['#field_suffix']) ? ' <span class="field-suffix">' . $element['#field_suffix'] . '</span>' : '';

  switch ($element['#title_display']) {
    case 'before':
    case 'invisible':
      $output .= ' ' . theme('form_element_label', $variables);
      $output .= ' ' . $prefix . $element['#children'] . $suffix . "\n";
      break;

    case 'after':
      $output .= ' ' . $prefix . $element['#children'] . $suffix;
      $output .= ' ' . theme('form_element_label', $variables) . "\n";
      break;

    case 'none':
    case 'attribute':
      // Output no label and no required marker, only the children.
      $output .= ' ' . $prefix . $element['#children'] . $suffix . "\n";
      break;
  }

  if (!empty($element['#description'])) {
    $output .= '<div class="description">' . $element['#description'] . "</div>\n";
  }

  $output .= "\n";

  return $output;
}

function taxonomy_select_nodes_from_nid($tid, $nid, $direction = 'next', $limit = 1) {
    if (!variable_get('taxonomy_maintain_index_table', TRUE)) {
        return array();
    }
    $query = db_select('taxonomy_index', 't');
    $query->addTag('node_access');
    $query->condition('tid', $tid);
    $query->condition('nid', $nid, $direction == 'next' ? '>' : '<');
    if ($limit !== FALSE) {
        $query->range(0, $limit);
    }
    $query->addField('t', 'nid');
    $query->addField('t', 'tid');
    $query->orderBy('t.nid', $direction == 'next' ? 'ASC' : 'DESC');
    return $query->execute()->fetchCol();
}

function lo_item_list($variables) {
  $items = $variables ['items'];
  $title = $variables ['title'];
  $type = $variables ['type'];
  $attributes = $variables ['attributes'];

  // Only output the list container and title, if there are any list items.
  // Check to see whether the block title exists before adding a header.
  // Empty headers are not semantic and present accessibility challenges.
   $checkSortClass = $attributes['class'];
    if($checkSortClass == 'islandora-solr-sort'){
         $output = '<div class="islandora-solr-sort">';
         $output .= '<table>';
        $output .= '<th class="access_s"> <a href="#">Access</a></th>';
          if (!empty($items)) {
   
    $num_items = count($items);
    $i = 0;
    foreach ($items as $item) {
      $attributes = array();
      $children = array();
      $data = '';
      $i++;
      if (is_array($item)) {
        foreach ($item as $key => $value) {
          if ($key == 'data') {
            $data = $value;
          }
          elseif ($key == 'children') {
            $children = $value;
          }
          else {
            $attributes [$key] = $value;
          }
        }
      }
      else {
        $data = $item;
      }
      if (count($children) > 0) {
        // Render nested list.
        $data .= theme_item_list(array('items' => $children, 'title' => NULL, 'type' => $type, 'attributes' => $attributes));
      }
      if (strpos($data,'title="Title"') !== false) {
             $output .= '<th class="mods_titleInfo_title_s" >' . $data . '</th>';
       }
       if (strpos($data,'title="Date"') !== false) {
             $output .= '<th class="mods_originInfo_dateCreated_s" >' . $data . '</th>';
       }
       if (strpos($data,'title="Creator"') !== false) {
             $output .= '<th class="creator_s" >' . $data . '</th>';
       }
       if (strpos($data,'title="Addressee"') !== false) {
             $output .= '<th class="addressee_s" >' . $data . '</th>';
       }
       if (strpos($data,'title="Place Created"') !== false) {
             $output .= '<th class="mods_originInfo_place_placeTerm_text_s" >' . $data . '</th>';
       }
       if (strpos($data,'title="Extent (size)"') !== false) {
             $output .= '<th class="mods_physicalDescription_extent_mm_s" >' . $data . '</th>';
       }
       if (strpos($data,'title="Extent (pages)"') !== false) {
             $output .= '<th class="mods_physicalDescription_extent_pages_s" >' . $data . '</th>';
       }
       if (strpos($data,'title="Genre"') !== false) {
             $output .= '<th class="genre_s" >' . $data . '</th>';
       }
       if (strpos($data,'Repository') !== false) {
             $output .= '<th class="repository_s" >' . $data . '</th>';
       }
        if (strpos($data,'title="Copy of Item"') !== false) {
             $output .= '<th class="mods_identifier_local_NLS_copy_identifier_s" >' . $data . '</th>';
       }
        if (strpos($data,'title="Other Versions"') !== false) {
             $output .= '<th class="otherVersions_s" >' . $data . '</th>';
       }
        if (strpos($data,'Catalogue Number') !== false) {           
             $output .= '<th class="mods_identifier_local_Canonical_Catalog_Number_s" >' . $data . '</th>';
       }
       
       
     
    }
   
  }
        $output .= '</table>';
         $output .= '</div>';
    }else{
        $output = '<div class="item-list">';
        if (isset($title) && $title !== '') {
            $output .= '<h3>' . $title . '</h3>';
        }

  if (!empty($items)) {
    $output .= "<$type" . drupal_attributes($attributes) . '>';
    $checkSortClass = $attributes['class'];  
    $num_items = count($items);
    $i = 0;
    foreach ($items as $item) {
      $attributes = array();
      $children = array();
      $data = '';
      $i++;
      if (is_array($item)) {
        foreach ($item as $key => $value) {
          if ($key == 'data') {
            $data = $value;
          }
          elseif ($key == 'children') {
            $children = $value;
          }
          else {
            $attributes [$key] = $value;
          }
        }
      }
      else {
        $data = $item;
      }
      if (count($children) > 0) {
        // Render nested list.
        $data .= theme_item_list(array('items' => $children, 'title' => NULL, 'type' => $type, 'attributes' => $attributes));
      }
      if ($i == 1) {
        $attributes ['class'][] = 'first';
      }
      if ($i == $num_items) {
        $attributes ['class'][] = 'last';
      }
      $output .= '<li' . drupal_attributes($attributes) . '>' . $data . "</li>\n";
    }
    $output .= "</$type>";
  }
  $output .= '</div>';
    }
  
  return $output;
}

/**
 * Returns HTML for an islandora_solr_facet_wrapper.
 *
 * @param array $variables
 *   An associative array containing:
 *   - title: A string to use as the header/title.
 *   - content: A string containing the content being wrapped.
 *
 * @ingroup themeable
 */
function lo_islandora_solr_facet_wrapper($variables) {
  $output = '<div class="islandora-solr-facet-wrapper '.$variables['title'].'">';
  $output .= '<h3>' . $variables['title'] . '</h3>';   
  $output .= $variables['content'];  
  $output .= '</div>';
  return $output;
}
 
/*function lo_link($variables) {
    if(strpos($variables['path'], 'islandora/object/livingstone:')!== false){
        $variables ['text'] = 'view';
    }
  return '<a href="' . check_plain(url($variables ['path'], $variables ['options'])) . '"' . drupal_attributes($variables ['options']['attributes']) . '>' . ($variables ['options']['html'] ? $variables ['text'] : check_plain($variables ['text'])) . '</a>';
}*/
