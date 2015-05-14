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
JLoader::register('K2Plugin', JPATH_ADMINISTRATOR . '/components/com_k2/lib/k2plugin.php');

class plgK2Extrafieldtab extends K2Plugin {

    public $pluginName = 'extrafieldtab';
    public $pluginNameHumanReadable;

    public function plgK2Extrafieldtab(&$subject, $params) {
        parent::__construct($subject, $params);
        $this->loadLanguage();
        $this->pluginNameHumanReadable = JText::_('PLG_EXTRAFIELDTAB_LEGEND');
    }

    private function getHTMLTab($extraField, $content = '', $params) {
        $version = (int) substr(JVERSION, 0, 1);
        $core = $this->params->get('core', 'bootstrap');
        $html = '';
        $contentTab = '';
        if ($core == 'bootstrap') {
            if ($version == 2) {

                $document = & JFactory::getDocument();
                $jquery = (string) $this->params->get('jquery', '0');
                if ($jquery <> '0') {
                    JHtml::_('behavior.framework');
                    $document->addScript("http://ajax.googleapis.com/ajax/libs/jquery/$jquery/jquery.min.js");
                }
                $rootUrl = JUri::base();
                $document->addStyleSheet($rootUrl . '/plugins/k2/extrafieldtab/assets/extrafieldtab_bootstrap.css');
                $document->addScript($rootUrl . '/plugins/k2/extrafieldtab/assets/extrafieldtab_bootstrap.min.js');
                $html .= '<div class="extrafieldtab"><ul class="nav nav-tabs">';
                $contentTab .= '<div class="tab-content">';
                if (!empty($content)) {
                    $html .= '<li><a href="#ExtraFieldTab0" data-toggle="tab">' . $params->get('itemtexttitle') . '</a></li>';
                    $contentTab .= '<div class="fade active in tab-pane" id="ExtraFieldTab0">' . $content . '</div>';
                }
                foreach ($extraField AS $key => $field) {
                    $html .= '<li><a href="#ExtraFieldTab' . ($key + 1) . '" data-toggle="tab">' . $field->name . '</a></li>';
                    $contentTab .= ' <div class="fade tab-pane" id="ExtraFieldTab' . ($key + 1) . '">' . $field->value . '</div>';
                }
                return $html . '</ul>' . $contentTab . '</div></div>';
            }
            if ($version == 3) {

                jimport('joomla.html.html.bootstrap');
                $html = '<ul class="tab-content-content" role="tablist" aria-multiselectable="true">';

                // $html = '<div class="extrafieldtab">';
                // if (!empty($content)) {
                //     $html .= JHtml::_('bootstrap.startTabSet', 'ExtraFieldTabId', array('active' => 'ExtraFieldTab0'));
                //     $html .= JHtml::_('bootstrap.addTab', 'ExtraFieldTabId', 'ExtraFieldTab0', $params->get('itemtexttitle'));
                //     $html .= $content;
                //     $html .= JHtml::_('bootstrap.endTab');
                // } else {
                //     $html .= JHtml::_('bootstrap.startTabSet', 'ExtraFieldTabId', array('active' => 'ExtraFieldTab1'));
                // }
                foreach ($extraField AS $key => $field) {
                    $html .= ' <li class="tab-content-product">
                                  <div class="panel-heading-content" role="tab">
                                    <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">';
                    $html .= $field->name;   
                        $html .=  ' </a>
                                    </h4>
                                  </div>
                               
                              <div class="panel-body-product" attribute="false">';            
                    $html .= $field->value;
                    $html .= '</div>
                                
                                </li>
                                ';
                     }
                // foreach ($extraField AS $key => $field) {
                //     $html .= JHtml::_('bootstrap.addTab', 'ExtraFieldTabId', 'ExtraFieldTab' . ($key + 1), $field->name);
                //     $html .= $field->value;
                //     $html .= JHtml::_('bootstrap.endTab');
                // }
                return $html . '</ul>';
            }
        } else {
            jimport('joomla.html.html.tabs');
            $html = '<div class="extrafieldtab">';
            $html .= JHtml::_('tabs.start', 'ExtraFieldTab', array());
            if (!empty($content)) {
                $html .= JHtml::_('tabs.panel', $params->get('itemtexttitle'), 'ExtraFieldTab0') . $content;
            }
            foreach ($extraField AS $key => $field) {
                $html .= JHtml::_('tabs.panel', $field->name, 'ExtraFieldTab' . ($key + 1)) . $field->value;
            }
            $html .= JHtml::_('tabs.end');
            return $html . '</div>';
        }
        return '';
    }

    public function onK2BeforeDisplay(&$item, &$params, $limitstart) {
        $pluginParams = new K2Parameter($item->plugins, '', $this->pluginName);
        $tab = (int) $pluginParams->get('istab', 0);
        $view = strtolower(JRequest::getCmd('view'));
        $extraField = $item->extra_fields;
        if (!$tab || !count($extraField) || is_string($extraField) || empty($extraField)) {
            return '';
        }
        $extraFieldLoad = $pluginParams->get('extrafields', array());
        if ($view == 'itemlist') {
            if (!in_array(0, $extraFieldLoad)) {
                $tmp = array();
                $new = array();
                foreach ($extraField AS $ext) {
                    if (in_array($ext->id, $extraFieldLoad)) {
                        $tmp[] = $ext;
                    } else {
                        $new[] = $ext;
                    }
                }
                $extraField = $tmp;
                $item->extra_fields = $new;
                unset($tmp, $new);
            } else {
                unset($item->extra_fields);
            }
            return '';
        }
        $display = (int) $pluginParams->get('display', 0);
        if (!$display) {
            $display = (int) $this->params->get('display');
        }
        $text = $item->text;
        if (count($extraFieldLoad)) {
            if (!in_array(0, $extraFieldLoad)) {
                $tmp = array();
                $new = array();
                foreach ($extraField AS $ext) {
                    if (in_array($ext->id, $extraFieldLoad)) {
                        $tmp[] = $ext;
                    } else {
                        $new[] = $ext;
                    }
                }
                $extraField = $tmp;
                $item->extra_fields = $new;
                unset($tmp, $new);
            } else {
                unset($item->extra_fields);
            }
        } else {
            unset($item->extra_fields);
        }
        $item->extraFieldTab = $extraField;
        switch ($display) {
            case 1:
                $text = explode('{K2Splitter}', $text, 2);
                $text = (!empty($text[1])) ? '<div class="itemIntroText">' . $text[0] . '</div>' . $text[1] : $text[0];
                $item->text = $this->getHTMLTab($extraField, $text, $pluginParams);
                break;
            case 2:
                $contentTab = $this->getHTMLTab($extraField, '', $pluginParams);
                $item->text = $contentTab.$item->text;
                break;
            case 3:
                $contentTab = $this->getHTMLTab($extraField, '', $pluginParams);
                if (empty($item->fulltext)) {
                    $item->text = str_replace('{K2Splitter}', '', $item->text) . $contentTab . '{K2Splitter}';
                } else {
                    $item->text .= $contentTab;
                }
                break;
            case 4:
                $subText = explode('{K2Splitter}', $text, 2);
                if (empty($subText[1])) {
                    $item->text = $subText[0] . $this->getHTMLTab($extraField, '', $pluginParams) . '{K2Splitter}';
                } else {
                    $item->text = $subText[0] . '{K2Splitter}' . $this->getHTMLTab($extraField, '', $pluginParams) . $subText[1];
                }
                break;
            case 5:
                $item->text = preg_replace('/{extrafieldtab\s*\/}/i', $this->getHTMLTab($extraField, '', $pluginParams), $item->text);
                break;
        }

        return '';
    }


}

