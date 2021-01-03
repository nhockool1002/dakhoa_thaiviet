<div class="baivietlienquan">
  <div class="title_baivietlienquan">
    Bài viết liên quan
  </div>
</div>
<div class="relative-post-wrapper">
  <?php
    $related = get_posts( array( 'category__in' => wp_get_post_categories($post->ID), 'numberposts' => 5, 'post__not_in' => array($post->ID) ) );
    echo "<table>";
    if( $related ) foreach( $related as $post ) {
      setup_postdata($post); ?>
      <tr> 
          <td>
          <?php 
          if ( has_post_thumbnail() ) {
            $show_thumb = 'show'; //( get_theme_mod('show_mobile_thumb') ) ? ' show' : ''
            do_action( 'basic_before_post_thumbnail' ); ?>
            <a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>" class="anons-thumbnail<?php echo $show_thumb; ?> imagesThumbCat">
              <?php the_post_thumbnail( $thumbnail_size, $attributes ); ?>
            </a>
            <?php do_action( 'basic_after_post_thumbnail' );
          }
          ?>
          <a class="urlPost" href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a>
          </td>
      </tr>   
      <?php }
    echo "</table>";
    wp_reset_postdata(); 
  ?>
</div>