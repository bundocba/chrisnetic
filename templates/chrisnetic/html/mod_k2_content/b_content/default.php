<?php
/**
 * @version		2.6.x
 * @package		K2
 * @author		JoomlaWorks http://www.joomlaworks.net
 * @copyright	Copyright (c) 2006 - 2014 JoomlaWorks Ltd. All rights reserved.
 * @license		GNU/GPL license: http://www.gnu.org/copyleft/gpl.html
 */

// no direct access

?>
<div id="k2ModuleBox<?php echo $module->id; ?>" class="k2ItemsBlock<?php if($params->get('moduleclass_sfx')) echo ' '.$params->get('moduleclass_sfx'); ?>">
	<?php if(count($items)): ?>
	<ul>
	    <?php foreach ($items as $key=>$item):	?>
			
	    <li class="even">
	    	<a  href="<?php echo $item->link; ?>">
			<div class="opactity">
				
				
				<input type="hidden" name="layout" value="item_smart">
			</div>
			<div class="itemDetails">
					
						<p><?php echo JText::_('DETAILS'); ?></p>
					
				</div>
			</a>
	     	<?php if($params->get('itemImage') || $params->get('itemIntroText')): ?>
		      <div class="moduleItemIntrotext">
					<div class="itemImage">

						<?php if($params->get('itemImage') && isset($item->image)): ?>
					      <a class="moduleItemImage" href="<?php echo $item->link; ?>" title="<?php echo JText::_('K2_CONTINUE_READING'); ?><?php echo K2HelperUtilities::cleanHtml($item->title); ?>">
					      	<img src="<?php echo $item->image; ?>" alt="<?php echo K2HelperUtilities::cleanHtml($item->title); ?>"/>
					      </a>
					      <?php endif; ?>
					</div>
			      	<div class="itemTitle">
						<?php if($params->get('itemTitle')): ?>
						  	<div class="wellcome_ItemTitle"><a class="moduleItemTitle" href="<?php echo $item->link; ?>"><?php echo $item->title; ?></a></div>
					 	 <?php endif; ?>
					</div>
		      </div>
	  		<?php endif;?>

   		</li>
	    <?php endforeach; ?>
	</ul>
	<?php endif; ?>

</div>
<script type="text/javascript">
	jQuery(document).ready(function($) {
	
		$('.opactity').hover(function() {
			$(this).css("opacity","0.6");
			$(this).css("cursor","pointer");
		}, function() {

			$(this).css("opacity","0");
		});
		$('.content_item ul li').each(function(){
		  var t = $(this);
		  t.hover(function() {
		  	t.find('.itemDetails').css("display","block");
		  }, function() {
		  		t.find('.itemDetails').css("display","none");
		  });
		});
	});
</script>