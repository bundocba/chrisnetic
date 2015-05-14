<?php
 defined('_JEXEC') or die;
$item=$this->item;

 ?>

<div class="main_item_smart">
	<div class="main_item_smart_left">
		{module 105}
	</div>
	<div class="main_item_smart_right">
		<?php if ($item->category->id==7)
				echo	$this->loadTemplate('machinery') ;
			else 
				echo	$this->loadTemplate('plastic') ;
			
		?>
		<div class="link_contactus">
			{module 106}
		</div>
	</div>
	
</div>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$('ul.tab-content-content li').each(function() {
			var t=$(this);
			t.find('.panel-heading-content').click(function(event) {
				
			});
		});
		
	});
</script>
