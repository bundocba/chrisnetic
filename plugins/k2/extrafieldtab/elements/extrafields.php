<?php

/**
 * @version		1.0
 * @package		plg_extrafieldtab K2 Plugin (K2 plugin)
 * @author		Global Technology Team - http://www.extensions.taotrangweb.org/
 * @copyright	Copyright (c) 2006 - 2013 Vcontact. All rights reserved.
 * @license		GNU/GPL license: http://www.gnu.org/copyleft/gpl.html
 */
// no direct access
defined('_JEXEC') or die('Restricted access');
JText::script('PLG_EXTRAFIELD_TAB_SELECT_ALL');
class JFormFieldExtrafields extends JFormField{
    protected $type = 'extrafields';
    public function getInput() {
        $document = & JFactory::getDocument();
        $document->addScript(JUri::root(true).'/plugins/k2/extrafieldtab/elements/extrafields.js');
        return '<input type="hidden" name="'.$this->name.'" id="valueLoad" value="'.$this->value.'" /><div class="clearfix" id="ExtraFieldTab"></div>';
    }

}
