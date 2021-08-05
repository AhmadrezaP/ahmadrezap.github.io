jQuery.noConflict();
	
jQuery(document).ready(function () {
	jQuery(".toggle-container").hide();
	jQuery("#al_body_font, #al_headings_font, #al_menu_font").after('<div class="font-preview"></div>');
    if (jQuery('.color-picker').size() > 0) {
        jQuery('.color-picker').ColorPicker({
            onSubmit: function (hsb, hex, rgb, el) {
                jQuery(el).val('#' + hex);
                jQuery(el).ColorPickerHide();
            },
            onBeforeShow: function () {
                jQuery(this).ColorPickerSetColor(this.value);
            }
        }).bind('keyup', function () {
            jQuery(this).ColorPickerSetColor(this.value);
        });
    }
	
	
	
	// Drag & Drop sorting 
	
	jQuery(function($) {
		$('#sortable-table tbody').sortable({
			axis: 'y',
			handle: '.column-order img',
			placeholder: 'ui-state-highlight',
			forcePlaceholderSize: true,
			update: function(event, ui) {
				var theOrder = $(this).sortable('toArray');
	
				var data = {
					action: 'sneek_update_post_order',
					postType: $(this).attr('data-post-type'),
					order: theOrder
				};
	
				$.post(ajaxurl, data);
			}
		}).disableSelection();
	
	});
	
	jQuery(function($) {
		$('#sortable-table-portfolio tbody').sortable({
			axis: 'y',
			handle: '.column-order img',
			placeholder: 'ui-state-highlight',
			forcePlaceholderSize: true,
			update: function(event, ui) {
				var theOrder = $(this).sortable('toArray');
	
				var data = {
					action: 'portfolio_update_post_order',
					postType: $(this).attr('data-post-type'),
					order: theOrder
				};
	
				$.post(ajaxurl, data);
			}
		}).disableSelection();
	
	});
    
	// image Uploader Functions ##############################################
	function Universfolio_set_uploader(field) {
		var button = "#upload_"+field+"_button";
		jQuery(button).click(function() {
			window.restore_send_to_editor = window.send_to_editor;
			tb_show('', 'media-upload.php?referer=tie-settings&amp;type=image&amp;TB_iframe=true&amp;post_id=0');
			Universfolio_set_send_img(field);
			return false;
		});
		jQuery('#'+field).change(function(){
			jQuery('#'+field+'-preview').show();
			jQuery('#'+field+'-preview img').attr("src",jQuery('#'+field).val());
		});
	}
	function Universfolio_set_send_img(field) {
		window.send_to_editor = function(html) {
			imgurl = jQuery('img',html).attr('src');
			
			if(typeof imgurl == 'undefined') // Bug fix By Fouad Badawy
				imgurl = jQuery(html).attr('src');
				
			jQuery('#'+field).val(imgurl);
			jQuery('#'+field+'-preview').show();
			jQuery('#'+field+'-preview img').attr("src",imgurl);
			tb_remove();
			window.send_to_editor = window.restore_send_to_editor;
		}
	};
	
	//Universfolio_set_uploader("slide");
	Universfolio_set_uploader("favicon");
	Universfolio_set_uploader("gravatar");
	Universfolio_set_uploader("banner_top_img");
	Universfolio_set_uploader("banner_bottom_img");
	Universfolio_set_uploader("banner_above_img");
	Universfolio_set_uploader("banner_below_img");
	Universfolio_set_uploader("dashboard_logo");

	
// image Uploader Functions ##############################################
	function Universfolio_styling_uploader(field) {
		var button = "#upload_"+field+"_button";
		jQuery(button).click(function() {
			window.restore_send_to_editor = window.send_to_editor;
			tb_show('', 'media-upload.php?referer=tie-settings&amp;type=image&amp;TB_iframe=true&amp;post_id=0');
			styling_send_img(field);
			return false;
		});
		jQuery('#'+field).change(function(){
			jQuery('#'+field+'-preview img').attr("src",jQuery('#'+field).val());
		});
	}
	function styling_send_img(field) {
		window.send_to_editor = function(html) {
			imgurl = jQuery('img',html).attr('src');
			
			if(typeof imgurl == 'undefined') // Bug fix By Fouad Badawy
				imgurl = jQuery(html).attr('src');
				
			jQuery('#'+field+'-img').val(imgurl);
			jQuery('#'+field+'-preview').show();
			jQuery('#'+field+'-preview img').attr("src",imgurl);
			tb_remove();
			window.send_to_editor = window.restore_send_to_editor;
		}
	};	
	Universfolio_styling_uploader("background");
	Universfolio_styling_uploader("topbar_background");
	Universfolio_styling_uploader("header_background");
	Universfolio_styling_uploader("footer_background");
	Universfolio_styling_uploader("main_content_bg");

	
	// Del Preview Image ##############################################
	jQuery(".del-img").live("click" , function() {
		jQuery(this).parent().fadeOut(function() {
			jQuery(this).hide();
			jQuery(this).parent().find('input[class="img-path"]').attr('value', '' );
		});
	});	
	
}) 