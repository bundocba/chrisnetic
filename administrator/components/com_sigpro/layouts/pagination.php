<?php
/**
 * @version		$Id$
 * @package		Simple Image Gallery Pro
 * @author		JoomlaWorks - http://www.joomlaworks.net
 * @copyright	Copyright (c) 2006 - 2013 JoomlaWorks Ltd. All rights reserved.
 * @license		http://www.joomlaworks.net/license
 */

// no direct access
defined('_JEXEC') or die ;
?>
<div class="sigProPaginationPages">
	<div class="sigFloatRight sigProPageItem hide-on-tablet">
		<?php if($pagination->total): ?>
		<?php echo JText::_('COM_SIGPRO_PAGE'); ?> <b><?php echo $pagination->active; ?></b>
		<?php echo JText::_('COM_SIGPRO_OF'); ?> <b><?php echo $pagination->total; ?></b>
		<?php endif; ?>
	</div>

	<ul class="sigFloatRight">
		<li class="pagination-start"><a href="#" onclick="document.adminForm.limitstart.value = 0; Joomla.submitform(); return false;" class="sig-icon-to-start"><i class="hidden"><?php echo JText::_('COM_SIGPRO_START'); ?></i></a></li>
		<li class="pagination-prev"><a href="#" onclick="document.adminForm.limitstart.value = <?php echo $pagination->previousOffset; ?>; Joomla.submitform(); return false;" class="sig-icon-left-dir"><i class="hidden"><?php echo JText::_('COM_SIGPRO_PREVIOUS'); ?></i></a></li>
		<?php foreach($pagination->pages as $page) : ?>
		<li class="pagination-page"><a <?php if($page->active): ?> class="sigActive" <?php endif; ?> href="#" onclick="document.adminForm.limitstart.value = <?php echo $page->offset; ?>; Joomla.submitform(); return false;"><?php echo $page->number; ?></a></li>
		<?php endforeach; ?>
		<li class="pagination-next"><a href="#" onclick="document.adminForm.limitstart.value = <?php echo $pagination->nextOffset; ?>; Joomla.submitform(); return false;" class="sig-icon-right-dir"><i class="hidden"><?php echo JText::_('COM_SIGPRO_NEXT'); ?></i></a></li>
		<li class="pagination-end"><a href="#" onclick="document.adminForm.limitstart.value = <?php echo $pagination->endOffset; ?>; Joomla.submitform(); return false;" class="sig-icon-to-end"><i class="hidden"><?php echo JText::_('COM_SIGPRO_END'); ?></i></a></li>
	</ul>
	<div class="limit sigFloatLeft">
		<label><?php echo JText::_('COM_SIGPRO_DISPLAY'); ?></label><?php echo $pagination->limitbox; ?>
	</div>
	<input type="hidden" name="limitstart" value="<?php echo $pagination->limitstart; ?>" />
</div>

