<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package the-blank
 */

?>
	</div><!-- .wrap -->
	</div><!-- #content -->

	<footer id="colophon" class="site-footer" style="display: none;">
		<div class="wrap">
			<div class="site-info">
				<div class="left">
					<?php
					esc_html_e( 'Copyright &copy;&nbsp;', 'the-blank' );
					echo 'Đa khoa Thái Việt'
					?>
					<?php
					if ( function_exists( 'the_privacy_policy_link' ) ) {
						the_privacy_policy_link( '<span class="privacy-policy">', '</span>' );
					}
					?>
				</div>
				<div class="right">
					<p>
						<?php
							/* translators: 1: Theme name, 2: Theme author. */
							printf( '<a href="' . esc_url( 'https://shieldthemes.com/' ) . '" target="_blank">Designed by Đa Khoa Thái Việt</a>' );
						?>
					</p>
				</div>
			</div><!-- .site-info -->
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
<script language="javascript" src="https://tuvan.dakhoathaiviet.vn/JS/LsJS.aspx?siteid=NIE56551246&float=1&lng=en"></script>
<script>
		$(function () {
			$(".shock").each(function () {
				$(this).wrap("<span class='shock_wrap'></span>");
			});
			$(".shock_wrap").append(
				'<span class="shock_block"><span>Hình ảnh có nội dung gây shock !! Cân nhắc trước khi xem <div style="clear:both;height:7%"></div><div style="text-align:center;display:block"><a class="shock_click" href="#">Click vào xem</a></div></span></span>'
			);
			$(".shock_click").click(function () {
				$(this).parent().parent().parent().animate({ opacity: 0 }, 500);
				return false;
			});
		});
	</script>
</body>
