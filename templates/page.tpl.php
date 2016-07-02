<?php
/**

 */
?>

<?php 
if(isset($node) && $node->type =='section_page'): ?>

  <div id="fixedbar">
    <div class="fixedbar_left">
    <div class="fixedleft_1"><a href="#" class="slideout-menu-toggle"><i class="fa fa-bars"></i> </a></div>
    <div class="fixedleft_2 upperexternal">
      <ul class="menu">
      <li class="first leaf homelink "><a class="fa" href="/"></a></li>
      <li class="leaf pith"><a class="fa" href="http://livingstoneonline.org/about-this-site/livingstone-online-site-guide"></a></li>
      </ul> 
    </div>

    </div>
    <div class="fixedbar_center">
      <div id="logo" class="site-branding">
        <?php if ($logo): ?>
            <div id="site-logo"><a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>">
            <img class="desktoplogo" src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
            <img class="mobilelogo" src="<?php print $lo_mobilelogo = theme_get_setting('lo_mobilelogo'); ?>" alt="<?php print t('Home'); ?>" /></a></div>
            <?php print $search_box; ?> <div class="uptotop"><a href="#TOP">Top ⤴</a></div>
        <?php endif; ?>
      </div>
    <div id="header_mobilenav"></div>  
    <?php print $breadcrumb; ?></div>
    <div class="fixedbar_right"><?php print $search_box; ?></div>    
     
    <?php print render($page['fixedbar']); ?>  
    <div class="slideout-menu">
      <h3>Sections <a href="#" class="slideout-menu-toggle">&times;</a></h3>
      <ul>
      <?php print render($page['section']); ?>
      <?php print render($page['header']); ?>
      </ul>
    </div>
<!--/.slideout-menu-->
  </div>

 <?php endif; ?> 

<div id="page" class="page--nodetype">
  <header id="masthead" class="site-header container" role="banner">
    <div class="row">
      <div id="logo" class="site-branding">
        <?php if ($logo): ?><div id="site-logo"><a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>">
          <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
        </a></div><?php endif; ?>
      </div>
      <div class="mainmenu">
      <?php print render($page['external']); ?>

        <nav id="navigation" role="navigation">
          <div id="main-menu">
            <?php 
              if (module_exists('i18n_menu')) {
                $main_menu_tree = i18n_menu_translated_tree(variable_get('menu_main_links_source', 'main-menu'));
              } else {
                $main_menu_tree = menu_tree(variable_get('menu_main_links_source', 'main-menu'));
              }
              print drupal_render($main_menu_tree);
            ?>
          </div>
        </nav>
      </div>
    </div>
  </header>

<!--
    <ul class="flex-direction-nav basic">
    <li><a title="resources" class="flex-prev" href="<?php print base_path() . 'resources' ?>">Previous</a></li>
    <li><a title="livingstone online" class="flex-next" href="<?php print base_path() . 'about-this-site' ?>">Level 2</a></li>
    </ul>   
-->
     
    <!--<div class="flex-direction-nav"><a class="flex-prev" href="<?php print base_path() ?>">Previous</a><a class="flex-next" href="<?php print base_path() ?>">Next</a></div>-->
    <div class="content_main">
          <div id="uppermost"><?php print render($page['uppermost']); ?></div>
               <?php if ($page['sidebar_first']): ?>
          <aside id="sidebar" class="col-sm-4" role="complementary">
           <?php print render($page['sidebar_first']); ?>
          </aside> 
        <?php endif; ?> 
          <?php if($page['sidebar_first']) { $primary_col = 8; } else { $primary_col = 12; } ?>         
        <div id="primary" class="content-area col-sm-<?php print $primary_col; ?>">
          <section id="content" role="main" class="clearfix">
            <!--<?php if (theme_get_setting('breadcrumbs')): ?><?php if ($breadcrumb): ?><div id="breadcrumbs"><?php print $breadcrumb; ?></div><?php endif;?><?php endif; ?>-->
            <?php print $messages; ?>
            <?php if ($page['content_top']): ?><div id="content_top"><?php print render($page['content_top']); ?></div><?php endif; ?>
                <div id="header_mobilenav"></div> 
            <div id="content-wrap">
              <?php print render($title_prefix); ?>
              <?php if ($title): ?><h1 class="page-title"><?php print $title; ?></h1><?php endif; ?>
              <?php print render($title_suffix); ?>
              <?php if (!empty($tabs['#primary'])): ?><div class="tabs-wrapper clearfix"><?php print render($tabs); ?></div><?php endif; ?>
              <?php print render($page['help']); ?>
              <?php if ($action_links): ?><ul class="action-links"><?php print render($action_links); ?></ul><?php endif; ?>
              <?php print render($page['content']); ?>
            </div>
          </section>
        </div>
    </div>
     <?php print render($page['footer']); ?>
</div>
