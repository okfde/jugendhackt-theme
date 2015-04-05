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
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

	<!-- icons & favicons (for more: http://www.jonathantneal.com/blog/understand-the-favicon/) -->
	<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">

	<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,200,200italic' rel='stylesheet' type='text/css'>
	<link href='<?php echo get_template_directory_uri(); ?>/library/css/ebisu.css' rel='stylesheet' type='text/css'>
	<link href='<?php echo get_template_directory_uri(); ?>/library/css/slick.css' rel='stylesheet' type='text/css'>


	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

	<!-- wordpress head functions -->
	<?php wp_head(); ?>
	<!-- end of wordpress head -->

	<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/library/js/libs/jquery.fitvids.js"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/library/js/libs/slick.js"></script>

</head>

<body <?php body_class(); ?>  >

	<div id="container">

		<header class="header" role="banner">

			<div id="inner-header" class="wrap clearfix">
				<div id="logo" class="clearfix">
					<a href="<?php echo home_url(); ?>" rel="nofollow">
						<img src="<?php echo get_template_directory_uri(); ?>/library/images/logo.svg" alt="Jugend hackt" width="488" height="100"/>
					</a>
					<div id="description">
						<?php  bloginfo('description'); ?>
					</div>
				</div>

				<div id="metawrapper" class="clearfix">
					<? if ( has_nav_menu('cta-links') ) { ?> 
					<div class="cta-wrap uppercase ">
						<?php bones_cta_links(); ?>								
					</div>
					<? } ?>

					<nav role="navigation" class="social-nav-wrap" >
						<?php bones_meta_links(); ?>
					</nav>
				</div>



				<nav role="navigation">
					<?php bones_main_nav(); ?>
				</nav>

			</div> <!-- end #inner-header -->

		</header> <!-- end header -->
