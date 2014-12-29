<?php echo '<h2 class="heading__page-title"><a class="homepage-link" href=" ' . get_option('home') . '">Calendar, News or Gestures</a></h2>'; ?>

<?php
  // get artwork type from custom field and handle output accordingly
  $artwork_type = get_field('artwork_type');
  // if ($artwork_type == "image_gallery_artwork") {
  //   echo "<h1>Image gallery post </h1>";
  // }
?>



<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class(); ?>>
    <header>
      <div class="page-category-label"> Post category </div>
      <?php if (($artwork_type == "regular_artwork")) {?>
        <h1 class="entry-title"><?php the_title(); ?></h1>
      <?php } // end if ?>
    </header>
    <div class="entry-content">
      <?php the_content(); ?>
      <?php
        global $wp_query;
        $self = $wp_query->post->ID;
        if( empty($wp_query->post->post_parent) ) {
            $parent = $wp_query->post->ID;

        } else {
            $parent = $wp_query->post->post_parent;
        } ?>

        <?php
            if(wp_list_pages("title_li=&child_of=$parent&echo=0&exclude=$self" )): ?>
                <?php if ( $title ) echo $before_title . $title . $after_title; ?>
                    <div id="submenu">
                        <ul>
                          <?php wp_list_pages("title_li=&child_of=$parent&exclude=$self" ); ?>
                        </ul>
                    </div>
        <?php endif; ?>

    </div> <!-- end .entry-content -->

    <footer>
      <?php wp_link_pages(array('before' => '<nav class="page-nav"><p>' . __('Pages:', 'roots'), 'after' => '</p></nav>')); ?>
    </footer>

    <div class="relatedposts medium-2">
      <h3>Related posts</h3>
      <?php
          $orig_post = $post;
          global $post;
          $tags = wp_get_post_tags($post->ID);

          if ($tags) {
              $tag_ids = array();
          foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;
              $args=array(
                  'tag__in' => $tag_ids,
                  'post__not_in' => array($post->ID),
                  'posts_per_page'=>4, // Number of related posts to display.
                  'caller_get_posts'=>1
              );

          $my_query = new wp_query( $args );

          while( $my_query->have_posts() ) {
              $my_query->the_post();
          ?>

          <div class="relatedthumb">
              <a rel="external" href="<? the_permalink()?>">
              <?php the_title(); ?>
              </a>
          </div>

          <?php }
          }
          $post = $orig_post;
          wp_reset_query();
          ?>
    </div> <!-- // end related posts ?> -->
  </article>


<?php endwhile; ?>

