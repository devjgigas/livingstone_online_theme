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

<div id="page" class="page-row page-row-expanded wrapper">
    <?php if ($page['header']) : ?> 
  <header id="masthead" class="site-header container" role="banner">
    <div class="row">
      <div class="col-md-8 col-sm-8 col-xs-12 mainmenu">
      <?php print render($page['external']); ?>
        <!-- <div class="mobilenavi"></div> -->
      </div>
    </div>
  </header>
    <?php endif; ?>
 <!--   <ul class="flex-direction-nav">
    <li><a title="resources" class="flex-prev" rel="prev" href="<?php print base_path() . 'resources' ?>">Previous</a></li>
    <li><a title="livingstone online" class="flex-next" rel="next"href="<?php print base_path() . 'about-this-site' ?>">Level 2</a></li>
    </ul>  -->
        <?php if (theme_get_setting('slideshow_display', 'lo')): ?>
    <div id="slider">
        <div class="flexslider">
            <ul class="slides">
                <li><img class="slide-image" src="/sites/default/files/Level-1-1.jpg"/></li>
                <li><img class="slide-image" src="/sites/default/files/Level-1-2.jpg"/></li>
                <li><img class="slide-image" src="/sites/default/files/Level-1-3.jpg"/></li>
                <li><img class="slide-image" src="/sites/default/files/Level-1-4.jpg"/></li>
                <li><img class="slide-image" src="/sites/default/files/Level-1-5.jpg"/></li>
                <li><img class="slide-image" src="/sites/default/files/Level-1-6.jpg"/></li>
                <li><img class="slide-image" src="/sites/default/files/Level-1-7.jpg"/></li>                                                
            </ul>
            <div class="flex-caption">  

                <?php print render($page['title']); ?>

    <div class="row">
      <div id="logo" class="site-branding">
        <?php if ($logo): ?><div id="site-logo"><a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>">
          <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
        </a></div><?php endif; ?>
        <h1 id="site-title">
          <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>"><?php print $site_name; ?></a>
        </h1>
      </div>
    </div>  

                <?php print render($page['section']); ?>
            </div>
        </div>  
                 <?php print render($page['footer_first']); ?>
    </div>
        <?php endif; ?>
    <!-- <div class="push"></div>      -->
</div>
<div class="footer"> 
 <div class="footerimages">
<div class="footimg"><a href="http://lib.umd.edu/" target="_blank"><img class="footerlogos" src="<?php print base_path() . drupal_get_path('theme', 'lo') . '/images/logos/umd_libraries.png'; ?>"> </a></div>
<div class="footimg"><a href="http://www.nts.org.uk/property/davidlivingstonecentre/" target="_blank"><img class="footerlogos" src="<?php print base_path() . drupal_get_path('theme', 'lo') . '/images/logos/nts.png'; ?>"> </a></div>
<div class="footimg"><a href="http://www.neh.gov/" target="_blank"><img class="footerlogos" src="<?php print base_path() . drupal_get_path('theme', 'lo') . '/images/logos/humanities.png'; ?>"> </a></div>
<div class="footimg"><a href="http://www.nls.uk" target="_blank"><img class="footerlogos" src="<?php print base_path() . drupal_get_path('theme', 'lo') . '/images/logos/nls.png'; ?>"> </a></div>
<div class="footimg"><a href="http://www.unl.edu" target="_blank"><img class="footerlogos" src="<?php print base_path() . drupal_get_path('theme', 'lo') . '/images/logos/nebraska.png'; ?>"> </a></div>
  </div>
</div>    