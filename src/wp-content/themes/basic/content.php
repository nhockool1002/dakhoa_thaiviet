<?php

$markup_opt = basic_get_theme_option( 'schema_mark' ); // false or 0
$markup = ( is_single() && ( $markup_opt || false === $markup_opt ) ) ? true : false;

?>

<?php do_action( 'basic_before_post_article' ); ?>
<div class="<?php echo (! is_single()) ? 'articleCat' : 'articleSingle'; ?>">
<article <?php post_class(); ?><?php echo ( $markup ) ? ' itemscope itemtype="http://schema.org/Article"' : ''; ?>><?php

	do_action( 'basic_before_post_title' );
	if ( is_single() ) :

		do_action( 'basic_single_before_title' ); ?>
		<h1<?php echo ( $markup ) ? ' itemprop="headline"' : ''; ?>><?php the_title(); ?></h1>
		<?php do_action( 'basic_single_after_title' );

	else: ?>
		<?php //do_action( 'basic_postexcerpt_after_title' );

	endif;
	// do_action( 'basic_after_post_title' );

	/**
	 * @hooked basic_get_postmeta() - 10
	 */
	//do_action( 'basic_before_content' ); ?>
	<div class="entry-box clearfix" <?php if ( $markup ) { echo "itemprop='articleBody'"; } ?>>

		<?php
		if ( ! is_single() ) {

			$thumbnail_size = apply_filters( 'basic_singular_thumbnail_size', 'thumbnail' );
			$attributes     = apply_filters( 'basic_singular_thumbnail_attr', array('class'=>'thumbnail') );
			echo "<div class='itemPostInCategory'><table><tr><td class='thumb-cat-td'>";
			if ( has_post_thumbnail() ) {
				$show_thumb = 'show'; //( get_theme_mod('show_mobile_thumb') ) ? ' show' : ''
				do_action( 'basic_before_post_thumbnail' ); ?>
				<a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>" class="anons-thumbnail<?php echo $show_thumb; ?> imagesThumbCat">
					<?php the_post_thumbnail( $thumbnail_size, $attributes ); ?>
				</a>
				<?php do_action( 'basic_after_post_thumbnail' );
			}
			echo "</td><td class='cont-cat-td'>";
			do_action( 'basic_postexcerpt_before_title' );
			?>
			<h5><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h5>
			<?php
			// do_action( 'basic_before_post_excerpt' );
			echo "<div class='excerptWrapper'>";
			the_excerpt();
			echo "</div>";
			// do_action( 'basic_after_post_excerpt' );
			echo "</td>";
			echo "</tr></table></div>";
			/* @since 1.1.7 more link html code located in /inc/html-blocks.php and @hooked to `basic_after_post_excerpt` */

		} else {

			// do_action( 'basic_before_single_content' );
			the_content( '' );
			echo "<hr />";
			// slider khuyến mãi
			echo do_shortcode('[smartslider3 slider="8"]');
			// do_action( 'basic_after_single_content' );
		?>
		<!-- Bài viết liên quan-->
		<?php require_once('part/relative-post.php'); ?>
		<br />
		<!-- Tin tức nổi bật-->
		<?php require_once('part/tintucnoibat.php'); ?>
		<!-- Phương pháp DHA-->
		<?php require_once('part/phuongphapdha.php'); ?>
		<!-- Feedback-->
		<?php require_once('part/feedback.php'); ?>
		<!-- Môi trường phòng khám -->
		<?php require_once('part/moitruongphongkham.php'); ?>
		<!-- Footer Direction -->
		<?php require_once('part/footer-direction.php'); ?>
		<?php } ?>

	</div> <?php
	// do_action( 'basic_after_content' );


	if ( is_single() ) { ?>
		<aside class="meta"><?php the_tags(); ?></aside>
	<?php }

	if ( $markup ) {
		// basic_markup_schemaorg();
	} ?>

	<?php //do_action( 'basic_before_close_post_article' ); ?>
</article>
</div>
<?php //do_action( 'basic_after_post_article' ); ?>

