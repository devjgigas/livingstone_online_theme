<?php
/**
 * @file
 * Default theme implementation to display a single Drupal page.
 *
 * The doctype, html, head and body tags are not in this template. Instead they
 * can be found in the html.tpl.php template in this directory.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/bartik.
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
 * @see bootstrap_preprocess_page()
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see bootstrap_process_page()
 * @see template_process()
 * @see html.tpl.php
 *
 * @ingroup templates
 */
?>
<header id="navbar" role="banner" class="<?php print $navbar_classes; ?>">
  <div class="<?php print $container_class; ?>">
    <div class="row">
      <div class="col-xs-12 col-lg-4">
        <div class="navbar-header">
          <?php if (!$is_front && $logo): ?>
            <div id="site-logo">
              <a class="logo navbar-btn" href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>">
                <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
              </a>
            </div>
          <?php endif; ?>
        </div>
      </div>
      <div class="col-xs-12 col-lg-8">
        <?php if (!empty($primary_nav) || !empty($secondary_nav) || !empty($page['navigation'])): ?>
          <nav role="navigation">
            <?php if (!empty($page['navigation'])): ?>
                <?php print render($page['navigation']); ?>
            <?php endif; ?>
            <?php if (!empty($primary_nav)): ?>
              <?php print render($primary_nav); ?>
            <?php endif; ?>
            <div id="mobile-navigation"></div>
          </nav>
        <?php endif; ?>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-12">
        <?php if (!empty($page['carousel'])): ?>
          <?php print render($page['carousel']); ?>
        <?php endif; ?>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-12">
        <?php if (!empty($page['fixed_header'])): ?>
          <?php print render($page['fixed_header']); ?>
        <?php endif; ?>
      </div>
    </div>
  </div>
</header>

<div class="main-container <?php print $container_class; ?>">
  <div class="row">
    <section<?php print $content_column_class; ?>>
      <a id="main-content"></a>
      <?php print $messages; ?>
      <?php if (!empty($tabs)): ?>
        <?php print render($tabs); ?>
      <?php endif; ?>
      <?php if (!empty($page['help'])): ?>
        <?php print render($page['help']); ?>
      <?php endif; ?>
      <?php if (!empty($action_links)): ?>
        <ul class="action-links"><?php print render($action_links); ?></ul>
      <?php endif; ?>
      <?php if (!empty($page['content_pager'])): ?>
        <?php print render($page['content_pager']); ?>
      <?php endif; ?>
      <?php print render($page['content']); ?>
    </section>
  </div>
</div>

<footer class="footer <?php print $container_class; ?>">
  <?php if (!empty($page['footer'])): ?>
    <hr/>
    <?php print render($page['footer']); ?>
  <?php endif; ?>
  <div id="footer-copyright">
    <p>© Livingstone Online, 2004-2021 | <a href="mailto:awisnicki@yahoo.com">Adrian S. Wisnicki</a>, director; <a href="mailto:megan.ward@oregonstate.edu">Megan Ward</a>, co-director; <a href="mailto:nigel.g.banks@gmail.com">Nigel Banks</a>, system administrator | <a href="https://www.unl.edu/" target="_blank">University of Nebraska-Lincoln</a>, server hosting & maintenance (2020-2021) | <a href="https://www.qub.ac.uk/" target="_blank">Queen's University Belfast</a>, server purchase (2020) | <a href="https://www.soyoustart.com/us/" target="_blank">So You Start</a>, site hosting (2018-2020) | <a href="http://www.lib.umd.edu/" target="_blank">University of Maryland Libraries</a>, 2017 (new version, second edition), 2016 (new version, first edition) | <a href="https://www.ucl.ac.uk/" target="_blank">University College London</a>, (original version), 2006-2015 | Peer reviewed by <a href="https://www.mla.org/About-Us/Governance/Committees/Committee-Listings/Publications/Committee-on-Scholarly-Editions" target="_blank">MLA Committee on Scholarly Editions</a>, 2019 (new version, second edition) | Peer reviewed by <a href="http://www.nines.org/" target="_blank">NINES</a>, 2016 (new version, first edition) | <a href="/behind-the-scenes/credits-and-permissions">Credits and Permissions</a> | <a href="/behind-the-scenes/illustrative-image-credits">Illustrative Image Credits</a> | <a href="/sites/default/files/shared/Livingstone-Online-Instruction-Manual-final-v1.5.pdf" target="_blank">Instruction Manual</a> | <a href="/resources/livingstone-online-tei-p5-encoding-guidelines">Coding Guidelines</a> | <a href="mailto:awisnicki@yahoo.com?subject=Technical%20issue%20with%20Livingstone%20Online%20site">Bugs?</a> | <a href="/about-this-site/livingstone-online-site-guide">Site Guide</a></p>
  </div>
</footer>
