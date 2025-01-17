<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package the-blank
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Phòng Khám Đa Khoa Uy Tín TPHCM</title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="icon" href="/wp-content/uploads/2021/01/dktv-icon.jpg" type="image/jpg" sizes="20x20">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'the-blank' ); ?></a>
	<header id="masthead" class="site-header" style="background-image: url('<?php header_image(); ?>')">
		<div class="wrap">
			<div class="site-branding">
				<?php the_custom_logo(); ?>
				<?php if ( is_front_page() && is_home() ) : ?>
					<div class="siteinfo-on">
						<h1 class="site-title">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
						</h1>
						<?php
						$blank_description = get_bloginfo( 'description', 'display' );
						if ( $blank_description || is_customize_preview() ) :
							?>
							<p class="site-description"><?php echo $blank_description; /* WPCS: xss ok. */ ?></p>
						<?php endif; ?>
					</div>
				<?php else : ?>
					<div class="siteinfo-on">
						<p class="site-title">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
						</p>
						<?php
						$blank_description = get_bloginfo( 'description', 'display' );
						if ( $blank_description || is_customize_preview() ) :
							?>
							<p class="site-description"><?php echo $blank_description; /* WPCS: xss ok. */ ?></p>
						<?php endif; ?>
					</div>
				<?php endif; ?>
			</div><!-- .site-branding -->

			<table>
					<tr>
							<td>
								<nav id="site-navigation" class="main-navigation">
									<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Menu', 'the-blank' ); ?></button>
									<?php
									if ( has_nav_menu( 'menu-1' ) ) {
										wp_nav_menu(
											array(
												'theme_location' => 'menu-1',
												'menu_id'        => 'primary-menu',
											)
										);
									} else if ( current_user_can( 'edit_theme_options' ) ) {
										echo '<p class="assign-menu">';
										echo esc_html_e( 'Please Assign Menu', 'the-blank' );
										echo '</p>';
									}
									?>
								</nav><!-- #site-navigation -->
							</td>
							<td style='width: 80px;'>
									<div class="search-pc-form">
										<form method='get'>
											<table>
												<tr>
													<td style="width: 68%;"><input name="s" type="text" placeholder="Tìm kiếm ...." style="width: 100%"></td>
													<td><button type='submit'>Gửi</button>
												</tr>
											</table>
										</form>
									</div>
							</td>
					</tr>
			</table>
		</div>
	</header><!-- #masthead -->

	<?php
		$args  = array(
			'post_type' => 'post',
			'meta_key'  => 'special_box_check',
		);
		$query = new WP_Query( $args );
		if ( null != $query ) {
			if ( is_home() || is_front_page() ) {
				echo '<div class="featured-content wrap">';
					get_template_part( 'template-parts/featured-posts', 'posts' );
				echo '</div>';
			}
		}
		?>

	<div id="content" class="site-content">
		<?php if (!is_front_page()) { ?>
		<div class="wrap-direction">
					<div class="direction-top">
				<table>
					<tr>
						<td class="icon-drct">
							<i class="fa fa-home" aria-hidden="true"></i>
						</td>
						<td class="content-drct">
							<p class="topColItemTitle">Địa Chỉ Khám</p>
							<p class="topColItemSmallText"><?php echo ADDRESS; ?></p></div>
						</td>
						<td class="icon-drct">
							<i class="fa fa-volume-control-phone" aria-hidden="true"></i>
						</td>
						<td class="content-drct">
							<p class="topColItemTitle">Tư vấn khám</p>
							<div class="detail-drct"><?php echo PHONE; ?></div>
						</td>
						<td class="icon-drct">
							<i class="fa fa-calendar" aria-hidden="true"></i>
						</td>
						<td class="content-drct">
							<p class="topColItemTitle">Đặt hẹn khám</p>
							<div class="detail-drct">Đặt hẹn trực tuyến</div>
						</td>
						<td class="icon-drct">
							<i class="fa fa-clock-o" aria-hidden="true"></i>
						</td>
						<td class="content-drct">
								<div class="elementor-text-editor elementor-clearfix"><p class="topColItemTitle">Thời Gian Làm Việc</p>
								<p class="detail-drct"><?php echo WORKING_HOUR; ?></p>
								<p class="topColItemSmallText">Tất cả các ngày trong tuần, kể cả ngày nghỉ lễ</p></div>
						</td>
					</tr>
				</table>
			</div>
		<?php } ?>
		</div>
		<div class="wrap">
