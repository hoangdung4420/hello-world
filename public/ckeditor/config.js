/**
 * @license Copyright (c) 2003-2017, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
	config.filebrowserBrowseUrl = '/williamsheakpear/img';
	 
	config.filebrowserImageBrowseUrl = '/williamsheakpear/img?type=Images';
	 
	config.filebrowserFlashBrowseUrl = '/williamsheakpear/img?type=Flash';
	 
	config.filebrowserUploadUrl = '/public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files';
	 
	config.filebrowserImageUploadUrl = '/public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images';
	 
	config.filebrowserFlashUploadUrl = '/public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash';

};
