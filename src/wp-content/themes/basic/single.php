<?php get_header('home-mb'); ?>
	<main id="content" class="content">
	<!-- direction -->
	<?php require_once('part/direction.php'); ?>
	<!-- slider -->
	<?php require_once('part/slider-home-mb.php'); ?>
	<?php while (have_posts()) : the_post(); 

			get_template_part( 'content',  get_post_format() );		

			// if ( comments_open() || get_comments_number() ) {
			// 	do_action( 'basic_before_post_comments_area' );
			// 	comments_template();
			// 	do_action( 'basic_after_post_comments_area' );
			// }

	endwhile; ?>

	</main> <!-- #content -->
	<?php //get_sidebar(); ?>
<?php get_footer('home-mb'); ?>