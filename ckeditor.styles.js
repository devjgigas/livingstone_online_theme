/*
Copyright (c) 2003-2013, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/

/*
 * This file is used/requested by the 'Styles' button.
 * The 'Styles' button is not enabled by default in DrupalFull and DrupalFiltered toolbars.
 */
if(typeof(CKEDITOR) !== 'undefined') {
  CKEDITOR.addStylesSet( 'drupal',
      [
        { name : 'Inset Image', element : 'span', attributes : { 'class' : 'insetimage' } },
        { name : 'Inset Image Table', element : 'table', attributes : { 'class' : 'insetimagetable' } },
        {
          name: 'Compact table',
          element: 'table',
          attributes: {
            column: '1',
            row: '2',
            cellpadding: '0',
            cellspacing: '0',
            border: '0',
            bordercolor: '#ccc',
            class: 'insetimagetable'
          },
          styles: {
            'border-collapse': 'collapse'
          }
        },
        { name : 'Paragraph+10px', element : 'p', attributes : { 'class' : 'space1'}},
        { name : 'Paragraph+20px', element : 'p', attributes : { 'class' : 'space2'}},
        { name : 'Paragraph-10px', element : 'p', attributes : { 'class' : 'space-1'}},
        { name : 'Paragraph-15px', element : 'p', attributes : { 'class' : 'space-2'}},

        {
          name : 'Unnumbered List',
          element : 'ol',
          styles : {
            'list-style-type' : 'none'
          }
        },

        {
          name : 'Numbered List',
          element : 'ol',
          styles : {
            'list-style-type' : 'decimal'
          }
        },

        {
          name : 'Alphabetic List',
          element : 'ol',
          styles : {
            'list-style-type' : 'lower-alpha'
          }
        },

        {
          name : 'Roman Lowercase List',
          element : 'ol',
          styles : {
            'list-style-type' : 'lower-roman'
          }
        },

        {
          name : 'Roman Uppercase List',
          element : 'ol',
          styles : {
            'list-style-type' : 'upper-roman'
          }
        }
      ]);
}