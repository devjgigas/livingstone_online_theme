<?php

/**
 * implementation of hook_panels_layouts()
 */
// Plugin definition
$plugin = array(
  'title' => t('Level 2 layout'),
  'category' => t('Columns: 1'),
  'icon' => 'level2.png',
  'theme' => 'panels_level2',
  'css' => 'level2.css',
  'regions' => array('middle' => t('Middle column')),
);
