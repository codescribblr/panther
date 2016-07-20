<!doctype html>

<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

<head>
	<meta charset="utf-8">

	<!-- Google Chrome Frame for IE -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<title><?php wp_title(''); ?></title>

	<!-- mobile meta (hooray!) -->
	<meta name="HandheldFriendly" content="True">
	<meta name="MobileOptimized" content="320">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">

	<!--[if lt IE 9]><script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->

	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

	<?php if(is_search()) echo '<meta name="robots" content="noindex, nofollow"> '; ?>


	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,400italic,200,600,700,300,300italic|Roboto:300,400,400i,500' rel='stylesheet' type='text/css'>

	<!-- wordpress head functions -->
	<?php wp_head(); ?>
	<!-- end of wordpress head -->
</head>

<body <?php body_class(); ?>>
	<div class="wrapper">
		<div id="mobile-navigation" role="mobile-navigation">
			<?php if(is_front_page()):?>
			<?php panther_home_nav(); ?>
			<?php else:?>
			<?php panther_main_nav(); ?>
			<?php endif;?>
		</div>

		<header class="header" role="banner">

			<nav id="main-navigation" role="navigation">
				<div class="navbar navbar-main">
					<div class="container">
						<a class="navbar-brand" href="<?php bloginfo( 'url' ) ?>/" title="<?php bloginfo( 'name' ) ?>" rel="homepage"><?php bloginfo( 'name' ) ?><img src="<?php the_field('logo', 'options');?>" /></a>
						<?php if(is_front_page()):?>
						<?php panther_home_nav(); ?>
						<?php else:?>
						<?php panther_main_nav(); ?>
						<?php endif;?>
					</div>
				</div>
			</nav>
			<a class="navbar-brand mobile-brand" href="<?php bloginfo( 'url' ) ?>/" title="<?php bloginfo( 'name' ) ?>" rel="homepage"><?php bloginfo( 'name' ) ?><img src="<?php the_field('mobile_logo', 'options');?>" /></a>
			<a href="#mobile-navigation" id="mobile-menu-toggle" class="clearfix navbar-default">
				<button type="button" class="navbar-toggle">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</a>

		</header> <!-- end header -->
		<div class="page-body clearfix" <?php if(function_exists("live_edit")){ live_edit('page_modules'); }?>>