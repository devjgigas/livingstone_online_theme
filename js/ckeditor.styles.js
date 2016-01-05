/*
$Id: ckeditor.styles.js,v 1.1.2.2 2009/12/16 11:32:04 wwalc Exp $
Copyright (c) 2003-2009, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/

/*
 * This file is used/requested by the 'Styles' button.
 * 'Styles' button is not enabled by default in DrupalFull and DrupalFiltered toolbars.
 */

CKEDITOR.addStylesSet( 'drupal',
[
	/* Block Styles */

	// These styles are already available in the "Format" combo, so they are
	// not needed here by default. You may enable them to avoid placing the
	// "Format" combo in the toolbar, maintaining the same features.
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
	//{ name : 'Align Image to Left', element : 'img', attributes : { 'class' : 'floatleft' } },
	//{ name : 'Align Image to Right', element : 'img', attributes : { 'class' : 'floatright' } },
	//{ name : 'Clear Float', element : 'p', attributes : { 'class' : 'clear' } },
]);
