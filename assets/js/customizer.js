jQuery( document ).ready(function($) {
	"use strict";

	/**
	 * @author Iheb Hafdallah <http://ihebhafdallah.com>
	 * @license http://www.gnu.org/licenses/gpl-2.0.html
	 * @link https://github.com/ihebhafdallah
	 */

	/**
	 * TinyMCE Custom Control
	 *
	 * @author Iheb Hafdallah <http://ihebhafdallah.com>
	 * @license http://www.gnu.org/licenses/gpl-2.0.html
	 * @link https://github.com/ihebhafdallah
	 */

	$('.customize-control-tinymce-editor').each(function(){
		// Get the toolbar strings that were passed from the PHP Class
		var tinyMCEToolbar1String = _wpCustomizeSettings.controls[$(this).attr('id')].pwtinymcetoolbar1;
		var tinyMCEToolbar2String = _wpCustomizeSettings.controls[$(this).attr('id')].pwtinymcetoolbar2;
		var tinyMCEMediaButtons = _wpCustomizeSettings.controls[$(this).attr('id')].pwmediabuttons;

		wp.editor.initialize( $(this).attr('id'), {
			tinymce: {
				wpautop: false,
				toolbar1: tinyMCEToolbar1String,
				toolbar2: tinyMCEToolbar2String
			},
			quicktags: true,
			mediaButtons: tinyMCEMediaButtons
		});
	});
	$(document).on( 'tinymce-editor-init', function( event, editor ) {
		editor.on('change', function(e) {
			tinyMCE.triggerSave();
			$('#'+editor.id).trigger('change');
		});
	});
});
