<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<!--[if IE]>
	<meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=edge" /><![endif]-->
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

	<?php wp_head(); ?>
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<title>Phòng Khám Đa Khoa Uy Tín TPHCM</title>
	<link rel="icon" href="/wp-content/uploads/2021/01/dktv-icon.jpg" type="image/jpg" sizes="20x20">
	<link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script
  src="https://code.jquery.com/jquery-1.12.4.min.js"
  integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ="
  crossorigin="anonymous"></script>
</head>
<body <?php body_class(); ?>>
<div class="wrapper clearfix">

	<?php if ( function_exists('wp_body_open') ) { wp_body_open(); } ?>

	<?php do_action( 'basic_before_header' ); ?>
	<!-- BEGIN header -->
	<header id="header" class="<?php echo apply_filters( 'basic_header_class', 'clearfix' ); ?>">
					<?php do_action( 'basic_header_top_wrap_begin' ); ?>
					<?php do_action( 'basic_before_sitetitle' ); ?>
					<div class="header-top-wrap">
						<table>
							<tr>
								<td class="icon-menu-mb">
									<div class="open-button" onclick="openMenu()">
										<img src="/wp-content/uploads/2021/01/humbutton.png" />
									</div>
								</td>
								<td class="logo-mb-wrapper">
									<div class="logo-mb">
										<a href='/'><img src="/wp-content/uploads/2021/01/logo5-scaled.jpg" /></a>
									</div>
								</td>
							</tr>
						</table>
					<div class="top-control-mb">
						<table>
							<tr>
								<td class="wrap-search-td">
									<div class="form-search-mb">
										<div class="wrapper-inner">
											<!-- <form method="get" action="/"> -->
												<table>
														<tr>
															<td>
																<input type="text" name="s" placeholder="Nhập SĐT để được tư vấn" />
															</td>
															<td>
																<button type="submit" class="button-search-mb">Gửi</button>
															</td>
														</tr>
												</table>
											<!-- </form> -->
										</div>
									</div>
								</td>
							</tr>
						</table>
					</div>
					<!-- menu mpbile -->
					<div class="menu-mb-wrap">
						<?php require_once('part/menu-mb.php'); ?>
					</div>
					<!-- overlay -->
					<div class="black-overlay"></div>
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
	
