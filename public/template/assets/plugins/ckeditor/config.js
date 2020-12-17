/**
 * @license Copyright (c) 2003-2020, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	config.language = 'vi';
	//config.uiColor = '#6cbafa';
	config.removeButtons = 'Source,Save,NewPage,About,Iframe,InsertPre,Flash,Anchor';
	config.removeDialogTabs = 'image:advanced;link:advanced';
	config.filebrowserUploadMethod = 'form';
	config.entities = false;
};
