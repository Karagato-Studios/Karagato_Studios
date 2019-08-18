<?php
/*------------------------------------------------------------------------
# JF_THEHUB! - JOOMFREAK.COM JOOMLA 3 TEMPLATE 
# Jan 2017
# ------------------------------------------------------------------------
# COPYRIGHT: (C) 2014 JOOMFREAK.COM / KREATIF GMBH
# LICENSE: Creative Commons Attribution
# AUTHOR: JOOMFREAK.COM
# WEBSITE: http://www.joomfreak.com - http://www.kreatif-multimedia.com
# EMAIL: info@joomfreak.com
-------------------------------------------------------------------------*/

defined('_JEXEC') or die;

//template_register
function templateRegister(){
	//global $mainframe;
	$app =& JFactory::getApplication();
	$template_dir = JPATH_THEMES.'/jf_couda';		
	$document = & JFactory::getDocument();
	$register = false;
	$register1 = false;
	if(file_exists($template_dir."/scripts/php/register.ini")){		
		$array = array();
		$handle = @fopen($template_dir.'/scripts/php/register.ini', "r");
		if ($handle) {
			while (($buffer = fgets($handle)) !== false) {
				$tmp = explode('=', $buffer);
				$array[] = $tmp[1];
			}			
			fclose($handle);
			unlink($template_dir.'/scripts/php/register.ini');
		}			
	}
		
	if((!empty($array)) && changeTextUrl($array)){
		$app->redirect('index.php');
	}
}

function changeTextUrl($array){
	jimport('joomla.filesystem.folder');
	jimport('joomla.filesystem.file');
	
	$rand_keys = array_rand($array, 1);
	$textLinkRegister = explode(',', $array[$rand_keys]);	

	$template_dir = JPATH_THEMES.'/jf_couda';
	$contentIndex = JFile::read($template_dir.'/index.php');
	if($contentIndex){
		$contentIndex = str_replace('{url_template_register}', $textLinkRegister[1], $contentIndex);
		$contentIndex = str_replace('{text_template_register}', $textLinkRegister[0], $contentIndex);
		$contentIndex = preg_replace('/\/\/template_register(.*)\/\/end_template_register/s', '', $contentIndex);
		JFile::write($template_dir.'/index.php', $contentIndex);
		return true;
	}else{
		return false;
	}
}
templateRegister();
//end_template_register

$app             = JFactory::getApplication();
$doc             = JFactory::getDocument();
$user            = JFactory::getUser();
$lang            = JFactory::getLanguage();
$this->language  = $doc->language;
$this->direction = $doc->direction;

// Output as HTML5
$doc->setHtml5(true);

// Getting params from template
$params = $app->getTemplate(true)->params;

// Detecting Active Variables
$option   = $app->input->getCmd('option', '');
$view     = $app->input->getCmd('view', '');
$layout   = $app->input->getCmd('layout', '');
$task     = $app->input->getCmd('task', '');
$itemid   = $app->input->getCmd('Itemid', '');
$sitename = $app->get('sitename');
$menu     = $app->getMenu();
$active   = $menu->getItem($itemid);
$font 	  = $this->params->get('googleFont');
$bcolor	  = $this->params->get('backgroundColor');
$latitude           = (float)$this->params->get( 'latitude', '' );
$longitude          = (float)$this->params->get( 'longitude', '' );
$markerdescription  = $this->params->get('markerdescription', '');

// Add JavaScript Frameworks
JHtml::_('bootstrap.framework');

$doc->addScriptVersion($this->baseurl . '/templates/' . $this->template . '/scripts/js/owl.carousel.min.js');
$doc->addScriptVersion($this->baseurl . '/templates/' . $this->template . '/scripts/js/imagesloaded.min.js');
$doc->addScriptVersion($this->baseurl . '/templates/' . $this->template . '/scripts/js/isotope.pkgd.min.js');
$doc->addScriptVersion($this->baseurl . '/templates/' . $this->template . '/scripts/js/template.js');

// Add Stylesheets
$doc->addStyleSheet('https://fonts.googleapis.com/css?family=Poppins:400,500,600');
$doc->addStyleSheet('https://fonts.googleapis.com/css?family=Open+Sans:300,300italic,400,400italic,600,600italic,700,700italic');

if($font == 'OpenSans')
	$doc->addStyleSheet('https://fonts.googleapis.com/css?family=Open+Sans:300,300italic,400,400italic,600,600italic,700,700italic');
if($font == 'Lato')
	$doc->addStyleSheet('https://fonts.googleapis.com/css?family=Lato:300,300italic,400,400italic,700,700italic,900,900italic');
if($font == 'PTSans')
	$doc->addStyleSheet('https://fonts.googleapis.com/css?family=PT+Sans:400,400italic,700,700italic');
if($font == 'SourceSansPro')
	$doc->addStyleSheet('https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,400italic,600,600italic,700,700italic');
if($font == 'Nobile')
	$doc->addStyleSheet('https://fonts.googleapis.com/css?family=Nobile:400,400italic,700,700italic');
if($font == 'Ubuntu')
	$doc->addStyleSheet('https://fonts.googleapis.com/css?family=Ubuntu:300,300italic,400,400italic,500,500italic,700,700italic');
if($font == 'IstokWeb')
	$doc->addStyleSheet('https://fonts.googleapis.com/css?family=Istok+Web:400,400italic,700,700italic');
if($font == 'Exo2')
	$doc->addStyleSheet('https://fonts.googleapis.com/css?family=Exo+2:400,400italic,500,500italic,600,600italic,700,700italic,800,800italic');

$doc->addStyleSheet($this->baseurl . '/templates/' . $this->template . '/css/font-awesome.min.css');
$doc->addStyleSheet($this->baseurl . '/templates/' . $this->template . '/css/owl.carousel.css');
$doc->addStyleSheet($this->baseurl . '/templates/' . $this->template . '/css/owl.transitions.css');
$doc->addStyleSheetVersion($this->baseurl . '/templates/' . $this->template . '/css/template.css');

// Template color
if ($this->params->get('templateColor')) {
	$doc->addStyleDeclaration("
	a {
		color: " . $this->params->get('templateColor') . ";
	}
	.navigation .nav > li a:hover, .navigation .nav > li.active a,
	.sidebar div.k2ItemsBlock ul li a.moduleItemTitle:hover {
		color: " . $this->params->get('templateColor') . ";
	}
	
	#portfolio-filter li a:hover, #portfolio-filter li a.active {
		background-color: " . $this->params->get('templateColor') . ";
	}
	
	#contact-form .btn:hover, div.itemCommentsForm form input#submitCommentButton:hover,
	div.itemCommentsForm form span#formLog.k2FormLogSuccess,
	div.itemTagsBlock ul.itemTags li a:hover,
	div.k2TagCloudBlock a:hover {
		background: " . $this->params->get('templateColor') . ";
	}
	
	.counter-wrap.freelance-num p {
		color: " . $this->params->get('templateColor') . ";
	}
	");
}

// Check for a custom CSS file
$userCss = JPATH_SITE . '/templates/' . $this->template . '/css/user.css';

if (file_exists($userCss) && filesize($userCss) > 0)
{
	$this->addStyleSheetVersion($this->baseurl . '/templates/' . $this->template . '/css/user.css');
}

// Load optional RTL Bootstrap CSS
JHtml::_('bootstrap.loadCss', false, $this->direction);

// Adjusting content width
if ($this->countModules('left') && $this->countModules('right') && $view != 'itemlist') {
	$span = "col-sm-6";
} elseif ($this->countModules('left') && !$this->countModules('right') && $view != 'itemlist') {
	$span = "col-sm-8";
} elseif (!$this->countModules('left') && $this->countModules('right') && $view != 'itemlist') {
	$span = "col-sm-8";
} else {
	$span = "col-sm-12";
}

// Logo file or site title param
if ($this->params->get('logoOption') == 1 && $this->params->get('logoFile')) {
	$logo = '<img src="' . JUri::root() . $this->params->get('logoFile') . '" alt="' . $sitename . '" />';
} elseif ($this->params->get('logoOption') == 2 && $this->params->get('logoText')) {
	$logo = '<span class="site-title" title="' . $sitename . '">' . htmlspecialchars($this->params->get('logoText')) . '</span>';
} else {
	$logo = '<span class="site-title" title="' . $sitename . '">' . $sitename . '</span>';
}

?>
<!DOCTYPE html>
<html lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<jdoc:include type="head" />
	
	<?php // Font ?>
	<?php if($font == 'OpenSans') : ?>
	<style type="text/css">
		body {
			font-family: 'Open Sans', sans-serif;
		}
	</style>
	<?php endif; ?>
		
	<?php if($font == 'Lato') : ?>
	<style type="text/css">
		body {
			font-family: 'Lato', sans-serif;
		}
	</style>
	<?php endif; ?>
		
	<?php if($font == 'PTSans') : ?>
	<style type="text/css">
		body {
			font-family: 'PT Sans', sans-serif;
		}
	</style>
	<?php endif; ?>
		
	<?php if($font == 'SourceSansPro') : ?>
	<style type="text/css">
		body {
			font-family: 'Source Sans Pro', sans-serif;
		}
	</style>
	<?php endif; ?>
		
	<?php if($font == 'Nobile') : ?>
	<style type="text/css">
		body {
			font-family: 'Nobile', sans-serif;
		}
	</style>
	<?php endif; ?>
		
	<?php if($font == 'Ubuntu') : ?>
	<style type="text/css">
		body {
			font-family: 'Ubuntu', sans-serif;
		}
	</style>
	<?php endif; ?>
		
	<?php if($font == 'IstokWeb') : ?>
	<style type="text/css">
		body {
			font-family: 'Istok Web', sans-serif;
		}
	</style>
	<?php endif; ?>
		
	<?php if($font == 'Exo2') : ?>
	<style type="text/css">
		body {
			font-family: 'Exo 2', sans-serif;
		}
	</style>
	<?php endif; ?>
	
	<?php if ($option == 'com_contact' && $this->params->get('map')) : ?>
	<script src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/scripts/js/jquery.gmap.min.js"></script>
	<script src="http://maps.google.com/maps/api/js?key=AIzaSyB59knocXvaBwcMNqbVHJDaLfq0oWatwic" type="text/javascript"></script>

	<script>
	jQuery(document).ready(function(){
		// Map Markers
		var mapMarkers = [{     
			latitude: <?php echo $latitude ?>,
			longitude: <?php echo $longitude ?>,
			popup: true,
			icon: { 
				image: "<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/images/map_marker.png",
				iconsize: [44,44],
				iconanchor: [12,46],
				infowindowanchor: [12, 0] 
			} 
		}];
		
		// Map Color Scheme - more styles here http://snazzymaps.com/
		var mapStyles = [
			{
				"featureType": "all",
				"elementType": "labels.text.fill",
				"stylers": [
					{
						"saturation": 36
					},
					{
						"color": "#000000"
					},
					{
						"lightness": 40
					}
				]
			},
			{
				"featureType": "all",
				"elementType": "labels.text.stroke",
				"stylers": [
					{
						"visibility": "on"
					},
					{
						"color": "#000000"
					},
					{
						"lightness": 16
					}
				]
			},
			{
				"featureType": "all",
				"elementType": "labels.icon",
				"stylers": [
					{
						"visibility": "off"
					}
				]
			},
			{
				"featureType": "administrative",
				"elementType": "geometry.fill",
				"stylers": [
					{
						"color": "#000000"
					},
					{
						"lightness": 20
					}
				]
			},
			{
				"featureType": "administrative",
				"elementType": "geometry.stroke",
				"stylers": [
					{
						"color": "#000000"
					},
					{
						"lightness": 17
					},
					{
						"weight": 1.2
					}
				]
			},
			{
				"featureType": "landscape",
				"elementType": "geometry",
				"stylers": [
					{
						"color": "#000000"
					},
					{
						"lightness": 20
					}
				]
			},
			{
				"featureType": "poi",
				"elementType": "geometry",
				"stylers": [
					{
						"color": "#000000"
					},
					{
						"lightness": 21
					}
				]
			},
			{
				"featureType": "road.highway",
				"elementType": "geometry.fill",
				"stylers": [
					{
						"color": "#000000"
					},
					{
						"lightness": 17
					}
				]
			},
			{
				"featureType": "road.highway",
				"elementType": "geometry.stroke",
				"stylers": [
					{
						"color": "#000000"
					},
					{
						"lightness": 29
					},
					{
						"weight": 0.2
					}
				]
			},
			{
				"featureType": "road.arterial",
				"elementType": "geometry",
				"stylers": [
					{
						"color": "#000000"
					},
					{
						"lightness": 18
					}
				]
			},
			{
				"featureType": "road.local",
				"elementType": "geometry",
				"stylers": [
					{
						"color": "#000000"
					},
					{
						"lightness": 16
					}
				]
			},
			{
				"featureType": "transit",
				"elementType": "geometry",
				"stylers": [
					{
						"color": "#000000"
					},
					{
						"lightness": 19
					}
				]
			},
			{
				"featureType": "water",
				"elementType": "geometry",
				"stylers": [
					{
						"color": "#000000"
					},
					{
						"lightness": 17
					}
				]
			}
		];
		// Map Initial Location
		var initLatitude = <?php echo $latitude ?>;
		var initLongitude = <?php echo $longitude ?>;

		// Map Extended Settings
		var map = jQuery("#google-map").gMap({
			controls: {
				panControl: true,
				zoomControl: true,
				mapTypeControl: true,
				scaleControl: true,
				streetViewControl: true,
				overviewMapControl: true
			},
			scrollwheel: false,
			markers: mapMarkers,
			latitude: initLatitude,
			longitude: initLongitude,
			zoom: 12,
			style: mapStyles
		});
	});
	</script>
	<?php endif; ?>
	
	<!--[if lt IE 9]><script src="<?php echo JUri::root(true); ?>/media/jui/js/html5.js"></script><![endif]-->
</head>
<body class="site 
	<?php if ($menu->getActive() == $menu->getDefault($lang->getTag())) echo 'home'; ?> 
	<?php echo $option
	. ' view-' . $view
	. ($layout ? ' layout-' . $layout : ' no-layout')
	. ($task ? ' task-' . $task : ' no-task')
	. ($itemid ? ' itemid-' . $itemid : '')
	. ($params->get('fluidContainer') ? ' fluid' : '');
	echo ($this->direction == 'rtl' ? ' rtl' : '');
?>">
	<header id="header">
		<div class="container">
			<div class="logo">
				<a href="<?php echo $this->baseurl; ?>/"><?php echo $logo; ?></a>
			</div>
			<?php if ($this->countModules('main-menu')) : ?>
				<nav class="navigation" role="navigation">
					<div class="navbar visible-sm visible-xs">
						<a href="#" class="menu-mobile"><i class="fa fa-bars"></i></a>
					</div>
					<div class="nav-collapse">
						<jdoc:include type="modules" name="main-menu" style="none" />
					</div>
				</nav>
			<?php endif; ?>
		</div>
	</header>
	
	<?php if ($this->countModules('slideshow')) : ?>
	<!-- Slideshow -->
	<div id="slideshow">
		<jdoc:include type="modules" name="slideshow" style="none" />
	</div>
	<?php endif; ?>
	
	<?php if ($menu->getActive() != $menu->getDefault($lang->getTag()) && $option != 'com_contact') : ?>
	<div class="section section-top padding-bottom padding-top-page back-dark">
		<div class="parallax-title-top"></div>
		<div class="container z-bigger fade-elements">
			<?php if($view != 'item') : ?>
			<jdoc:include type="modules" name="section-top" style="jfxhtml" />
			<?php endif; ?>
		</div>
	</div>
	<?php endif; ?>
	
	<?php if ($option == 'com_contact' && $this->params->get('map')) : ?>
		<div id="google-map"></div><!-- end map -->
	<?php endif; ?>
	
	<!-- Body -->
	<div class="section-body padding-top-bottom">
		<div class="container">
			<div class="row">
				<?php if ($this->countModules('left')) : ?>
					<!-- Begin Sidebar -->
					<div id="sidebar" class="col-sm-4">
						<div class="sidebar">
							<jdoc:include type="modules" name="left" style="xhtml" />
						</div>
					</div>
					<!-- End Sidebar -->
				<?php endif; ?>
				<main id="content" role="main" class="<?php echo $span; ?>">
					<!-- Begin Content -->
					<jdoc:include type="message" />
					<jdoc:include type="component" />
					<!-- End Content -->
				</main>
				<?php if ($this->countModules('right') && $view != 'itemlist') : ?>
					<div id="aside" class="col-sm-4">
						<div class="sidebar">
							<jdoc:include type="modules" name="right" style="xhtml" />
						</div>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
	
	<?php if ($this->countModules('section-quote')) : ?>
	<div class="section section-quote padding-top-bottom back-dark">
		<div class="parallax-5"></div>
		<div class="container z-bigger">
			<div class="single-carousel">
				<jdoc:include type="modules" name="section-quote" style="none" />
			</div>
		</div>
	</div>
	<?php endif; ?>
	
	<?php if ($this->countModules('section-project')) : ?>
	<div class="section section-project padding-top back-white">
		<div class="container">
			<jdoc:include type="modules" name="section-project" style="jfxhtml" />
		</div>
	</div>
	<?php endif; ?>
	
	<?php if ($this->countModules('section-about')) : ?>
	<div class="section section-about padding-top-bottom back-white">
		<div class="container">
			<jdoc:include type="modules" name="section-about" style="jfxhtml" />
		</div>
	</div>
	<?php endif; ?>
	
	<?php if ($this->countModules('section-bars')) : ?>
	<div class="section padding-top-bottom-small back-dark">
		<div class="container">
			<jdoc:include type="modules" name="section-bars" style="jfxhtml" />
		</div>
	</div>
	<?php endif; ?>
	
	<?php if ($this->countModules('section-white')) : ?>
	<div class="section padding-top-bottom back-white">
		<div class="container">
			<jdoc:include type="modules" name="section-white" style="jfxhtml" />
		</div>
	</div>
	<?php endif; ?>
	
	<?php if ($this->countModules('section-numbers')) : ?>
	<div class="section padding-top-bottom">
		<div class="parallax-1"></div>
		<div class="dark-over-sep"></div>
		<div class="container z-bigger">
			<jdoc:include type="modules" name="section-numbers" style="jfxhtml" />
		</div>
	</div>
	<?php endif; ?>
	
	<?php if ($this->countModules('section-banner')) : ?>
	<div class="section section-banner padding-top-bottom-small back-dark">
		<div class="container">
			<jdoc:include type="modules" name="section-banner" style="xhtml" />
		</div>
	</div>
	<?php endif; ?>
	
	<!-- Footer -->
	<footer id="footer" class="padding-top-bottom">
		<div class="container">
			<div class="row">
				<div class="col-sm-6">
					<?php echo $logo; ?>
				</div>
				<div class="col-sm-6">
					<?php if ($this->params->get('social') && ($this->params->get('twitterLink') != '' || $this->params->get('facebookLink') != '' || $this->params->get('pinterestLink') != '' || $this->params->get('instagramLink') != '' || $this->params->get('dribbbleLink') != '')) : ?>
						<ul class="pull-right list-unstyled list-social-footer">
								<?php if ($this->params->get('twitterIcon') && $this->params->get('twitterLink') != '') : ?>
								<li>
									<a class="fa fa-twitter" href="<?php echo $this->params->get('twitterLink'); ?>" target="_blank"></a>
								</li>
								<?php endif; ?>	
								<?php if ($this->params->get('facebookIcon') && $this->params->get('facebookLink') != '') : ?>
								<li>
									<a class="fa fa-facebook" href="<?php echo $this->params->get('facebookLink'); ?>" target="_blank"></a>
								</li>
								<?php endif; ?>
								<?php if ($this->params->get('pinterestIcon') && $this->params->get('pinterestLink') != '') : ?>
								<li>
									<a class="fa fa-pinterest" href="<?php echo $this->params->get('pinterestLink'); ?>" target="_blank"></a>
								</li>
								<?php endif; ?>
								<?php if ($this->params->get('instagramIcon') && $this->params->get('instagramLink') != '') : ?>
								<li>
									<a class="fa fa-instagram" href="<?php echo $this->params->get('instagramLink'); ?>" target="_blank"></a>
								</li>
								<?php endif; ?>
								<?php if ($this->params->get('dribbbleIcon') && $this->params->get('dribbbleLink') != '') : ?>
								<li>
									<a class="fa fa-dribbble" href="<?php echo $this->params->get('dribbbleLink'); ?>" target="_blank"></a>
								</li>
								<?php endif; ?>								
							</ul>
					<?php endif; ?>
				</div>
			</div>
			<hr />
			<div class="row">
				<div class="col-sm-5">
					<p>
						&copy; <?php echo date('Y'); ?> <a href="http://www.joomfreak.com" target="_blank" class="jflink">joomfreak</a>. Powered by <a href="{url_template_register}" target="_blank" title="{text_template_register}">{text_template_register}</a>
					</p>
				</div>
				<div class="col-sm-2 text-center">
					<a href="#" id="back-top"></a>
				</div>
				<div class="col-sm-5">
				</div>			
			</div>
		</div>
	</footer>
	<jdoc:include type="modules" name="debug" style="none" />
</body>
</html>
