<?php
 defined('_JEXEC') or die;
 $item=$this->item;

$files = array();
$url_dir=JRoute::_(JUri::root().'/media/k2/galleries/'.$this->item->id.'/');

$dir = opendir(JPATH_BASE.'/media/k2/galleries/'.$this->item->id.'/');
while ($f = readdir($dir)) {
	if (eregi("\.jpg|\.gif|\.png", $f))
	array_push($files, $f);
}
closedir($dir);
$data = array();

?>

<div class="ip-mainheader">
	<div class="ip-image_large">
			<?php
			if (! empty($files)) {
					echo '<img src="' .$url_dir. $files[0] . '"/>';
			}
			?>
	</div>
	<div class="prev"></div>
	<div class="next"></div>
	<div class="ip-image-thumnai">
		<ul>
			<?php
			if (! empty($files)) {
				 foreach ($files as $k => $v) {
				 	echo '<li class="detail">';
					echo '<img src="'.$url_dir . $v . '"/>';
					echo '</li>';
				 }
				
			}
			?>
		</ul>
	</div>
	<div class="prev-mall"></div>
	<div class="next-mall"></div>
</div>
<script>
	jQuery(document).ready(function($) {
		jQuery('.prev').click(function(){
			var first_item = jQuery('.ip-image-thumnai ul li:first');
			var next_item = first_item.next();
			var main_image = jQuery('.ip-image_large').find('img');
			first_item.remove();
			jQuery('.ip-image-thumnai ul').append(first_item);
			var src = next_item.find('img').attr('src');
			main_image.attr('src',src);
			return false;
		});
		jQuery('.next').click(function(){
			var last_item = jQuery('.ip-image-thumnai ul li:last');
			var main_image = jQuery('.ip-image_large').find('img');
			last_item.remove();
			jQuery('.ip-image-thumnai ul').prepend(last_item);
			var src = last_item.find('img').attr('src');
			main_image.attr('src',src);
			return false;
		});
		jQuery( ".ip-image-thumnai ul " ).delegate( "li", "click", function() {
			
			var src = jQuery(this).find('img').attr('src');
			var main_image = jQuery('.ip-image_large').find('img');
			main_image.hide();
			main_image.attr('src',src);
			main_image.fadeIn();
		});
		var numer_item = jQuery('.ip-image-thumnai').find('li').length;
		if(numer_item<2){
			jQuery('.ip-image-thumnai').hide();
			
			jQuery('.ip-image_large').css('height','auto');
		}
		$('.ip-mainheader .prev-mall').click(function(event) {
			  var $last = $('.ip-image-thumnai ul li:last');
			    $last.remove().css({ 'margin-left': '-400px' });
			    $('.ip-image-thumnai ul li:first').before($last);
			    $last.animate({ 'margin-left': '0px' }, 200);
		});
		$('.ip-mainheader .next-mall').click(function(event) {
			   var $first = $('.ip-image-thumnai ul li:first');
		    $first.animate({ 'margin-left': '-400px' }, 200, function() {
		        $first.remove().css({ 'margin-left': '0px' });
		        $('.ip-image-thumnai ul li:last').after($first);
	    });
		    
		});
	});
</script>