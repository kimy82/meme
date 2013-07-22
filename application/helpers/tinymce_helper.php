<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

function form_tinymce($theme = "advanced")
{
	$config = '
		tinyMCE.init({
			mode : "specific_textareas",
			editor_deselector : "mceNoEditor",
			elements : "ajaxfilemanager",
			skin : "o2k7",
			skin_variant : "silver",
			theme : "'.$theme.'",
			plugins : "advimage,advlink,media,contextmenu,table,insertdatetime,preview",
			theme_advanced_buttons1_add : "cut,copy,separator,forecolor,backcolor,liststyle,media,|,insertdate,inserttime,preview",
			theme_advanced_buttons2_add_before: "tablecontrols",
			theme_advanced_toolbar_location : "top",
			theme_advanced_toolbar_align : "left",
			extended_valid_elements : "a[class|name|href|target|title|onclick|rel],script[type|src],iframe[src|style|width|height|scrolling|marginwidth|marginheight|frameborder],img[class|src|border=0|alt|title|hspace|vspace|width|height|align|onmouseover|onmouseout|name]",
			file_browser_callback : "ajaxfilemanager",
			apply_source_formatting : true,
			relative_urls : false,
			content_css: "'.base_url().'css/editor.css"
		});
	
		function ajaxfilemanager(field_name, url, type, win) {
			var ajaxfilemanagerurl = "'.base_url().'admin_assets/ajaxfilemanager/gzNZXO5ndEeCDtilkNYi7PFsM.php";
			switch (type) {
				case "image":
					break;
				case "media":
					break;
				case "flash": 
					break;
				case "file":
					break;
				default:
					return false;
			}
			tinyMCE.activeEditor.windowManager.open({
				url: "'.base_url().'admin_assets/ajaxfilemanager/gzNZXO5ndEeCDtilkNYi7PFsM.php",
				width: 900,
				height: 500,
				inline : "yes",
				close_previous : "no"
			},{
				window : win,
				input : field_name
			});
		}';
	
	return
	'<script src="'.base_url().'admin_assets/tiny_mce/tiny_mce.js"></script>' . "\n" .
	'<script>'. $config .'</script>';
}