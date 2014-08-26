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

			
			<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

			<!-- wordpress head functions -->
			<?php wp_head(); ?>
			<!-- end of wordpress head -->

			<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>

			<!-- drop Google Analytics Here -->
			<!-- end analytics -->


		</head>

		<body <?php body_class(); ?>  >

			<div id="container">

				<header class="header" role="banner">

					<div id="inner-header" class="wrap clearfix">
						<div id="logo" class="h1 clearfix">
							<div id="logowrapper">
								<a href="<?php echo home_url(); ?>" rel="nofollow">
									<img src="<?php echo get_template_directory_uri(); ?>/library/images/logo.png" alt="Jugend hackt" width="369" height="78"/>
								</a>
							</div>
							<span id="eventdate" class="uppercase" style="letter-spacing: -3px;"><?php echo get_theme_mod('tagline_date'); ?></span><br />
							<span id="description">
								<?php  bloginfo('description'); ?>
							</span>
						</div>


								<div id="metawrapper">
									<nav role="navigation">
										<?php bones_meta_links(); ?>
									</nav>
								</div>

								<? if ( has_nav_menu('cta-links') ) { ?> 
									<div class="uppercase anmelden">
										<!--<a href="https://youngrewiredstate.org/yrs-everywhere/yrs-berlin/apply/de" target="_blank" >Anmelden</a>-->
										<?php bones_cta_links(); ?>								
									</div>
								<? } ?>

								<nav role="navigation">
									<?php bones_main_nav(); ?>
								</nav>

							</div> <!-- end #inner-header -->

						</header> <!-- end header -->
