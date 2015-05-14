<?php
/**
 * @package     Joomla.Site
 * @subpackage  Templates.protostar
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

$app             = JFactory::getApplication();
$doc             = JFactory::getDocument();
$user            = JFactory::getUser();
$this->language  = $doc->language;
$this->direction = $doc->direction;

//add js , css

$doc->addStyleSheet(JUri::base().'templates/chrisnetic/css/template.css');
$doc->addStyleSheet(JUri::base().'templates/chrisnetic/css/wellcome.css');
$doc->addStyleSheet(JUri::base().'templates/chrisnetic/css/content_item.css');
$doc->addStyleSheet(JUri::base().'templates/chrisnetic/css/contact.css');
// $doc->addStyleSheet(JUri::base() . 'templates/chrisnetic/css/bootstrap.min.css');


$doc->addStyleSheet(JUri::base() . 'templates/chrisnetic/css/overwrite_bootstrap.css');


$doc->addScript($this->baseurl . '/templates/' . $this->template . '/js/template.js', 'text/javascript');
// $doc->addScript($this->baseurl . '/templates/' . $this->template . '/js/bootstrap.js', 'text/javascript');
// $doc->addScript($this->baseurl . '/templates/' . $this->template . '/js/bootstrap.min.js', 'text/javascript');

$domainWeb="http://chrisnetic.futureworkz.com.sg/";

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
	<head>
		<jdoc:include type="head" />
<link href='http://fonts.googleapis.com/css?family=Raleway:400,300' rel='stylesheet' type='text/css'>

	</head>
	<body>
		<div id="goTop"></div>
		<header>
			<div class="header_main">
				<div class="social">
					<a href="https://www.facebook.com/sharer.php?u=<?php echo $domainWeb; ?>" target="_blank" >
						<div class="facebook">
							
						</div>
					</a>
					<a href="https://plus.google.com/share?url={<?php echo $domainWeb; ?>}" onclick="javascript:window.open(this.href,
  '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;">
						<div class="google">
							
						</div>
					</a>
					<a href="http://twitter.com/home?status=<?php echo $content; ?>.<?php echo $domainWeb; ?>" title="Click to share this post on Twitter" target="_blank">
						<div class="twiter">
							
						</div>
					</a>
					<a href="http://www.linkedin.com/shareArticle?mini=true&url=<?php echo JURI::current(); ?>" title="Click to share this post on LinkedIn" target="_blank">
						<div class="in">
						</div>
					</a>
						
				</div>
				<?php if ($this->countModules('logo')>0): ?>
				<div class="logo">
					<jdoc:include type="modules" name="logo" style="xhtml"/>
				</div>
				<?php endif ?>
				<?php if ($this->countModules('search')>0): ?>
				<div class="search">
					<jdoc:include type="modules" name="search" style="xhtml"/>
				</div>
				<?php endif ?>
			</div>
		</header>
		<div class="header_nav">
			<?php if ($this->countModules('mainmenu')>0): ?>
			<div class="menu_nav">
				<div class="menumain_nav">
					<jdoc:include type="modules" name ="mainmenu" style="xhtml"/>
				</div>
			</div>
			<?php endif ?>
		</div>
		<?php if ($this->countModules('nivo_slider')>0): ?>
			<div class="slider_menu">
				<jdoc:include type="modules" name ="nivo_slider" style="xhtml"/>
			</div>
		<?php endif ?>
		<?php if ($this->countModules('menu_left')>0): ?>
			<div class="menu_left">
				<jdoc:include type="modules" name ="menu_left" style="xhtml"/>
			</div>
		<?php endif ?>
		
			
			<?php if ($this->countModules('modules_wellcome')>0): ?>
			<div class="title_welcome">
				<jdoc:include type="modules" name ="title_welcome" style="xhtml"/>
			</div>
			<div class="boder"></div>
			<div class="wellcome">	
				<jdoc:include type="modules" name ="modules_wellcome" style="xhtml"/>
			</div>	
			<?php endif ?>
		<div class="content">	
			<?php if ($this->countModules('k2content')>0): ?>

			<div class="content_item_modules">
				<jdoc:include type="modules" name ="k2content" style="xhtml"/>
			</div>
			<?php endif ?>
		</div>
		<?php if ($this->countModules('position-2')>0): ?>
			<div class="breadcrums">
				
				<div class="main_item_title">
				<?php 
				$active=JFactory::getApplication()->getMenu()->getActive();
				echo $active->title;
				?>
				</div>
				<jdoc:include type="modules" name ="position-2" style="xhtml"/>

			</div>
		<?php endif ?>
		<div class="content_main">
			<jdoc:include type="message" />
			<jdoc:include type="component" />
		</div>	
			
		
		<footer>
			<?php if ($this->countModules('footer')): ?>
			<div class="footer_dislamer">
				<jdoc:include type="modules" name ="footer" style="xhtml"/>
			</div>
			<?php endif ?>
			<?php if ($this->countModules('footer_copy')): ?>
			<div class="footer_copy">
				<jdoc:include type="modules" name ="footer_copy" style="xhtml"/>
			</div>
			<?php endif ?>
		</footer>
		<script>
			jQuery(document).ready(function($) {
				$('ul.menu li').each(function(){
				  var t = $(this);
				  t.find('a').click(function() {
				    $('ul.menu li').removeClass('current');
				    t.addClass('current');
				  });
				});
			$(function() {

			$(window).scroll(function() {

			if ($(this).scrollTop() > 100)

			$('#goTop').fadeIn();

			else

			$('#goTop').fadeOut();

			});

			$('#goTop').click(function() {

			$('body,html').animate({scrollTop: 0}, 'slow');

			});

			});

			});
		</script>

	</body>

</html>