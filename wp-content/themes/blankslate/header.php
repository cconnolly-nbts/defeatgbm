<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>" />
	<meta name="viewport" content="width=device-width" />
	<title><?php wp_title(' | ', true, 'right'); ?></title>
	<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri(); ?>" />
	<script type="text/javascript" src="http://cdn.gigya.com/js/socialize.js?apiKey=2_0rh_PIXKeng_rY4zI3RdUFGuQYvvCztwvAL85O8vhHLW2sC_7Gvh3zbzcgtYZmFo"></script>
	<?php wp_head(); ?>
	<script type='text/javascript'>
	(function (d, t) {
	  var bh = d.createElement(t), s = d.getElementsByTagName(t)[0];
	  bh.type = 'text/javascript';
	  bh.src = '//www.bugherd.com/sidebarv2.js?apikey=sgopoiiawqplky9oj1liza';
	  s.parentNode.insertBefore(bh, s);
	  })(document, 'script');
	</script>
	<link rel="icon" type="image/ico" href="<?php echo get_template_directory_uri() ?>/favicon.ico"/>
	<meta name="google-site-verification" content="PEnc031yprIlsYtohzzSs0osgVWy-yfQBibllmuGxrY" />
        <meta name="msvalidate.01" content="A1294E3D345ACCB1D7FA4E73263ECA84" />
</head>
<body <?php body_class(); ?>>
	<div class="wrapper hfeed">
		<header id="header" role="banner">
			<div class="inner-wrapper">
				<section id="branding">
					<a href="<?php echo esc_url(home_url('/')); ?>" title="<?php esc_attr_e( get_bloginfo('name'), 'blankslate' ); ?>" rel="home">
						<img src="<?php echo get_template_directory_uri() ?>/img/logo.jpg" alt="Defeat GBM logo" />
					</a>
				</section>
			</div>
			<nav id="menu" role="navigation">
				<div class="inner-wrapper">
					<?php wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?>
				</div>
			</nav>
		</header>
	</div>
		<div id="container">