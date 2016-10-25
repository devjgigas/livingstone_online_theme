<?php
/**
 * @file panels-pane.tpl.php
 * Main panel pane template
 *
 * Variables available:
 * - $pane->type: the content type inside this pane
 * - $pane->subtype: The subtype, if applicable. If a view it will be the
 *   view name; if a node it will be the nid, etc.
 * - $title: The title of the content
 * - $content: The actual content
 * - $links: Any links associated with the content
 * - $more: An optional 'more' link (destination only)
 * - $admin_links: Administrative links associated with the content
 * - $feeds: Any feed icons or associated with the content
 * - $display: The complete panels display object containing all kinds of
 *   data including the contexts and all of the other panes being displayed.
 */
?>
<?php
$node = $content['#node'];
$nid = $node->nid;
$find_menu = function($menu_items) use(&$find_menu) {
  foreach ($menu_items as $menu_item) {
    // Check current active menu.
    $active = $menu_item['link']['in_active_trail'];
    if ($active) {
      $depth = $menu_item['link']['depth'];
      if ($depth == 2) {
        return $menu_item;
      }
      return $find_menu($menu_item['below']);
    }
  }
  return FALSE;
};
$is_sub_section_page = function($menu_items) use($nid, &$is_sub_section_page) {
  foreach ($menu_items as $menu_item) {
    // Check current active menu.
    $active = $menu_item['link']['in_active_trail'];
    if ($active) {
      $path = $menu_item['link']['link_path'];
      $depth = $menu_item['link']['depth'];
      if ($depth <= 2 && $path == "node/$nid" ) {
        return FALSE;
      }
      elseif ($depth > 2) {
        return TRUE;
      }
      return $is_sub_section_page($menu_item['below']);
    }
  }
  return FALSE;
};
$menu_items = menu_tree_page_data('menu-topmenu', NULL, FALSE);
$menu = $find_menu($menu_items);
$menu_output = empty($menu['below']) ? array() : menu_tree_output(array($menu));
if ($is_sub_section_page($menu_items)) {
  $classes .= ' sub-section-page';
}
?>
<?php if ($pane_prefix): ?>
  <?php print $pane_prefix; ?>
<?php endif; ?>
<div class="<?php print $classes; ?>" <?php print $id; ?> <?php print $attributes; ?>>
  <?php if ($admin_links): ?>
    <?php print $admin_links; ?>
  <?php endif; ?>
  <?php if (!empty($menu_output)): ?>
  <div id="sub-section-navigation">
    <?php print drupal_render($menu_output); ?>
  </div>
  <?php endif; ?>
  <?php print render($title_prefix); ?>
  <?php if ($title): ?>
    <<?php print $title_heading; ?><?php print $title_attributes; ?>>
      <?php print $title; ?>
    </<?php print $title_heading; ?>>
  <?php endif; ?>
  <?php print render($title_suffix); ?>

  <?php if ($feeds): ?>
    <div class="feed">
      <?php print $feeds; ?>
    </div>
  <?php endif; ?>

  <div class="pane-content">
    <?php print render($content); ?>
  </div>

  <?php if ($links): ?>
    <div class="links">
      <?php print $links; ?>
    </div>
  <?php endif; ?>

  <?php if ($more): ?>
    <div class="more-link">
      <?php print $more; ?>
    </div>
  <?php endif; ?>
</div>
<?php if ($pane_suffix): ?>
  <?php print $pane_suffix; ?>
<?php endif; ?>
