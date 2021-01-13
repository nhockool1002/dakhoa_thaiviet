<?php do_action( 'basic_main_wrap_inner_end' ); ?>
</div>
<!-- #main -->

<?php do_action( 'basic_before_footer' ); ?>

<footer id="footer" class="<?php echo apply_filters( 'basic_footer_class', '' );?> footer-home-mb">

	<?php do_action( 'basic_before_footer_menu' ); ?>

	<?php if (has_nav_menu('bottom')) : ?>
	<div class="<?php echo apply_filters( 'basic_footer_menu_class', 'footer-menu maxwidth' );?>">
		<?php 
		wp_nav_menu( array(
				'theme_location' => 'bottom',
				'menu_id' => 'footer-menu',
				'depth' => 1,
				'container' => false,
				'items_wrap' => '<ul class="footmenu clearfix">%3$s</ul>'
			)); 
		?>
	</div>
	<?php endif; ?>

	<?php do_action( 'basic_before_footer_copyrights' ); ?>
	<div class="footer-box">
			<table>
				<tr>
					<td>
						<a href="tel:<?php echo PHONE; ?>">
							<img src="/wp-content/uploads/2021/01/dien-thoai.gif	" />
						</a>
					</td>
					<td>
						<a href="<?php echo LIVECHAT; ?>">
							<img src="/wp-content/uploads/2021/01/dat-hen-kham.png" />
						</a>
					</td>
					<td>
						<a href="<?php echo LIVECHAT; ?>">
							<img src="/wp-content/uploads/2021/01/tu-van-online.png" />
						</a>
					</td>
				</tr>
			</table>
	</div>
	<?php do_action( 'basic_after_footer_copyrights' ); ?>

</footer>
<?php do_action( 'basic_after_footer' ); ?>


</div> 
<!-- .wrapper -->

<a id="toTop">&#10148;</a>

<?php wp_footer(); ?>
	<script>
		// Get the element with id="defaultOpen" and click on it
	document.getElementById("defaultOpen").click();
	</script>
</body>
</html>