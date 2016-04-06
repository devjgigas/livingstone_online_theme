<?php
/**
 * @file
 * Default theme implementation to display a single Drupal page.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/garland.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['sidebar_second']: Items for the second sidebar.
 * - $page['header']: Items for the header region.
 * - $page['footer']: Items for the footer region.
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see template_process()
 */
?>


  <div id="fixedbar">
    <div class="fixedbar_left">
    <div class="fixedleft_1"><a href="#" class="slideout-menu-toggle"><i class="fa fa-bars"></i> </a></div>
    <div class="fixedleft_2"><a href="home"><img class="fixedheaderlogo" src="<?php print base_path() . drupal_get_path('theme', 'lo') . '/images/lo-sm-30.jpg'; ?>"/></a>  </div>
    </div>
    <div class="fixedbar_center">
      <div class="his-own-words" id="breadcrumb">
        <span class="breadcrumb-0"><a href="/">Livingstone Online</a></span>  
        <span class="breadcrumb-1"><a href="/in-his-own-words">In His Own Words</a></span>  
        <span class="breadcrumb-2"><?php echo $title ?></span>
      </div>
</div>
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

<div id="page" class="browse--addressee">
  <header id="masthead" class="site-header container" role="banner">
    <div class="row">
      <div id="logo" class="site-branding">
        <?php if ($logo): ?><div id="site-logo"><a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>">
          <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
        </a></div><?php endif; ?>
        <h1 id="site-title">
          <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>"><?php print $site_name; ?></a>
        </h1>
      </div>
      <div class="mainmenu">
      <?php print render($page['external']); ?>
        <!-- <div class="mobilenavi"></div> -->
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
            <div id="content-wrap">
              <?php print render($title_prefix); ?>
              <?php if ($title): ?><h1 class="page-title"></h1><?php endif; ?>
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