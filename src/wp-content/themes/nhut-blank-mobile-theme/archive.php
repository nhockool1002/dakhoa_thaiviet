<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package the-blank
 */

get_header();
?>
<div class="direction-top">
	<table>
		<tr>
			<td class="icon-drct">
				<i class="fa fa-home" aria-hidden="true"></i>
			</td>
			<td class="content-drct">
				<p class="topColItemTitle">Địa Chỉ Khám</p>
				<div class="detail-drct">Quận 10, TPHCM</div>
			</td>
			<td class="icon-drct">
				<i class="fa fa-volume-control-phone" aria-hidden="true"></i>
			</td>
			<td class="content-drct">
				<p class="topColItemTitle">Tư vấn khám</p>
				<div class="detail-drct">028 XXX XXXX</div>
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
					<p class="detail-drct">8:00 – 20:00</p>
					<p class="topColItemSmallText">Tất cả các ngày trong tuần, kể cả ngày nghỉ lễ</p></div>
			</td>
		</tr>
	</table>
</div>
<?php
echo do_shortcode('[smartslider3 slider="2"]');
?>
		<?php
			if ( function_exists('yoast_breadcrumb') ) {
				yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
			}
		?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
				// the_archive_title( '<h2 class="page-title">', '</h2>' );
				the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header><!-- .page-header -->

			<table>
				<tr>
					<td width="25%" class="category-td">
					<?php
						echo do_shortcode('[contact-form-7 id="132" title="Form Đăng Kí"]');
					?>
					<div class="kmm31">
						<a href="#">
							<img src="../../wp-content/uploads/2020/12/km331.jpg" />
						</a>
					</div>
					<div class="slider-bacsi">
						<table class="widget-slider-bacsi">
							<tr>
								<td class="title-slider-bacsi">
										<p>>> ĐỘI NGŨ BÁC SĨ</p>
								</td>
							</tr>
							<tr>
								<td class="slider-content-bacsi">
									<?php
										echo do_shortcode('[smartslider3 slider="7"]');
									?>
								</td>
							</tr>
						</table>
					</div>
					</td>
					<td style="vertical-align: top;">
						<?php
								/* Start the Loop */
								while ( have_posts() ) :

									the_post();

									get_template_part( 'template-parts/content', get_post_type() );

								endwhile;

								the_posts_pagination(
									array(
										'mid_size' => 2,
									)
								);

							else :

								get_template_part( 'template-parts/content', 'none' );

							endif;
						?>
					</td>
				</tr>
			</table>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer('category');
