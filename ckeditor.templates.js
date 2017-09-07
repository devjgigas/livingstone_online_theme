/**
 * @license Copyright (c) 2003-2017, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

// Register a templates definition set named "default".
CKEDITOR.addTemplates( 'default', {
  // The name of sub folder which hold the shortcut preview images of the
  // templates.
  imagesPath: CKEDITOR.getUrl( CKEDITOR.plugins.getPath( 'templates' ) + 'templates/images/' ),

  // The templates definitions.
  templates: [ {
    title: 'Table of Contents',
    description: 'Table of Contents.',
    html:
    '<div class="section-page-toc-links">' +
    '  <ol style="list-style-type:none"><li>List item one<ol style="list-style-type:decimal"><li>Sub list</li></ol></li><li>List item two</li></ol>' +
    '</div>'
  }],
});