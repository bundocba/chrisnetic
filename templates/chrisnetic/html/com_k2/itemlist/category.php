<?php

 defined('_JEXEC') or die;
 
?>
<div class="main_item_smart">
	<div class="main_item_smart_left">
		{module 105}
	</div>
	<div class="main_item_smart_right">
		<ul class="category_smarts">
			<?php foreach ($this->leading as $key => $value): ?>
				<li>
					<a href="<?php echo $value->link?>">
						<div class="opactity_smart">
							
						</div>
						<div class="itemDetails_smart">
					
									<p><?php echo JText::_('DETAILS'); ?></p>
								
						</div>
						<div class="detail">
							<div><img src="<?php echo $value->imageXLarge; ?>" /></div>
							
							<div class="title_smart"><p>
								<?php echo $value->title;?>
							</p></div>
						</div>
					</a>
				</li>
			<?php endforeach ?>
		</ul>
		
	</div>
	
</div>

<script type="text/javascript">
	jQuery(document).ready(function($) {
	
		$('.opactity_smart').hover(function() {
			$(this).css("opacity","0.6");
			$(this).css("cursor","pointer");
			
		}, function() {

			$(this).css("opacity","0");
		});
		$('ul.category_smarts li').each(function(){
		  var t = $(this);
		  t.hover(function() {
		  	t.find('.itemDetails_smart').css("display","block");
		  }, function() {
		  		t.find('.itemDetails_smart').css("display","none");
		  });
		});
		
	});
</script>