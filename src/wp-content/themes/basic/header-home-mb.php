<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<!--[if IE]>
	<meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=edge" /><![endif]-->
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<?php wp_head(); ?>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body <?php body_class(); ?>>
<div class="wrapper clearfix">

	<?php if ( function_exists('wp_body_open') ) { wp_body_open(); } ?>

	<?php do_action( 'basic_before_header' ); ?>
	<!-- BEGIN header -->
	<header id="header" class="<?php echo apply_filters( 'basic_header_class', 'clearfix' ); ?>">

        <div class="header-top-wrap">
					<?php do_action( 'basic_header_top_wrap_begin' ); ?>
					<?php do_action( 'basic_before_sitetitle' ); ?>
					<?php do_action( 'basic_header_top_wrap_end' ); ?>
        </div>

		<?php do_action( 'basic_before_topnav' ); ?>
		<?php do_action( 'basic_after_topnav' ); ?>

	</header>
	<!-- END header -->

	<?php do_action( 'basic_after_header' ); ?>


	<div id="main" class="<?php echo apply_filters( 'basic_main_wrap_class', 'maxwidth clearfix' ); ?> main-page-363">
		<?php do_action( 'basic_main_wrap_inner_begin' ); ?>
		<!-- BEGIN content -->
	
