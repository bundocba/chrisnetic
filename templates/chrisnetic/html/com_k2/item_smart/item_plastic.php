<?php
 defined('_JEXEC') or die;
$item=$this->item;
// dump($item);
// echo "<pre>";
// print_r($item->category->extraFieldsGroup);
// echo "</pre>";
// die;
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

<div class="main_item_smart_right_main">
		<?php if (! empty($files)): ?>
	<div class="image_content">
			<div class="image_large">
			<?php
			if (! empty($files)) {
					echo '<img src="' .$url_dir. $files[0] . '"/>';
			}
			?>
			</div>
		
				<ul class="image_thumnai ">
					<?php
					if (! empty($files)) {
						 foreach ($files as $k => $v) {
						 	echo '<li class="image_thumai_detail">';
							echo '<img src="'.$url_dir . $v . '"/>';
							echo '</li>';
						 }
						
					}
					?>
				</ul>
		
		
		<div class="prev"></div>
		<div class="next"></div>
			
		
	</div>
		<?php endif ?>
	
	<?php echo $item->introtext;?>

	
</div>
<script>
	jQuery(document).ready(function($) {
		
		jQuery('.tab-content-product').click(function(){
			// jQuery(this).find('.panel-body-product')
			if(jQuery(this).find('.panel-body-product-click').length>0){
				jQuery(this).find('.panel-body-product-click').removeClass('panel-body-product-click');
				$('.panel-heading-content').css('background-color','#E0E0E0');
			    
			    $('.panel-heading-content h4 a').css('color','#000000');
			  
			}else{
				jQuery('.tab-content-product .panel-body-product-click').removeClass('panel-body-product-click');
				jQuery(this).find('.panel-body-product').addClass('panel-body-product-click');
				$('.panel-heading-content').css('background-color','#E0E0E0');
			    jQuery(this).find('.panel-heading-content').css('background-color','#D91573');
			    $('.panel-heading-content h4 a').css('color','#000000');
			   jQuery(this).find('.panel-heading-content h4 a').css('color','#FFFFFF');
			}
		});	
		
		$('.image_content .prev').click(function(event) {
			  var $last = $('.main_item_smart_right_main .image_content ul.image_thumnai li:last');
			  if ($('.main_item_smart_right_main .image_content ul.image_thumnai li').length<=1) {
			  		return;
			  };
			    $last.remove().css({ 'margin-left': '-400px' });
			    $('.main_item_smart_right_main .image_content ul.image_thumnai li:first').before($last);
			    $last.animate({ 'margin-left': '0px' }, 200);
		});
		$('.image_content .next').click(function(event) {
			   var $first = $('.main_item_smart_right_main .image_content ul.image_thumnai li:first');
			   if ($('.main_item_smart_right_main .image_content ul.image_thumnai li').length<=1) {
			  		return;
			  };
		        $first.animate({ 'margin-left': '-400px' }, 200, function() {
		        $first.remove().css({ 'margin-left': '0px' });
		        $('.main_item_smart_right_main .image_content ul.image_thumnai li:last').after($first);
	    });
		    
		});
	
	});
</script>


