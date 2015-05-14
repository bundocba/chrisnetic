(function($){
	jQuery(document).ready(function($) {
		jQuery( ".main_item_smart_right_main .image_content ul.image_thumnai" ).delegate( "li", "click", function() {
			
			var src = jQuery(this).find('img').attr('src');
			var main_image = jQuery('.main_item_smart_right_main .image_content .image_large').find('img');
			main_image.hide();
			main_image.attr('src',src);
			main_image.fadeIn();
		});
	});
	
})(jQuery);