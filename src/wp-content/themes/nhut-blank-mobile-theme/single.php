<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
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
					<div class="elementor-text-editor elementor-clearfix"><p class="topColItemTitle"> Gian Làm Việc</p>
					<p>8:00 – 20:00</p>
					<p class="topColItemSmallText">Tất cả các ngày trong tuần, kể cả ngày nghỉ lễ</p></div>
			</td>
		</tr>
	</table>
</div>
<?php
echo do_shortcode('[smartslider3 slider="2"]');
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
		<table>
			<tr>
				<td width="25%" class="category-td">
				<?php
					echo do_shortcode('[contact-form-7 id="132" title="Form Đăng Kí"]');
				?>
				<div class="kmm31">
					<a href="#">
						<img src="../wp-content/uploads/2020/12/km331.jpg" />
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
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', get_post_type() );

			// If comments are open or we have at least one comment, load up the comment template.
			// if ( comments_open() || get_comments_number() ) :
			// 	comments_template();
			// endif;

		endwhile; // End of the loop.
		?>
				</td>
			</tr>
			</table>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer('category');
