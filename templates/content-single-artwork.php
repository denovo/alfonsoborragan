<?php echo '<h2 class="heading__page-title"><a class="homepage-link" href=" ' . get_option('home') . '">Calendar, News or Gestures</a></h2>'; ?>

<?php
  // get artwork type from custom field and handle output accordingly
  $artwork_type = get_field('artwork_type');
  // current post pun-tastic variable
  $cunt_post = get_the_ID();
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

    <div class="relatedposts medium-3 small-12">
      <h3>Related</h3>
      <?php
        /* $artwork_tags is a variable you can change to something more suitable throughout */
        /* project_id is the name of the custom taxonomy */
        $artwork_tags = get_the_terms( $post->ID, "artwork_tags" );

        if ( ! is_wp_error( $artwork_tags ) && is_array( $artwork_tags ) ) {
        $term = array_shift( $artwork_tags );
        /* $artwork_tag is a variable you can change to something more suitable throughout */
        $artwork_tag = null;
        if ( isset( $term->slug ) && isset( $term->taxonomy ) ) {
        $artwork_tag = get_posts( array(
            'term' => $term->slug,
            'taxonomy' => $term->taxonomy,
            'post_type' => 'artworks',
            'orderby' => 'menu_order',
            'order' => 'asc',
            'numberposts' => '0', // 0 will show all results
            'post_status' => 'publish',
        ) );
        }

        // Loop over all posts of the CPT and display them
        if ( $artwork_tag ) {
            $_post = $post;
            print '<ul>';
                foreach ( (array) $artwork_tag as $post ) {
                  if ($post->ID != $cunt_post){
                    setup_postdata( $post );
                    the_title( '<li><a href="' . esc_url( get_permalink() ) . "#post-content" .'">', '</a></li>' );
                  }
                }
            print '<ul>';
            $post = $_post;
        }
        }
        ?>


    </div> <!-- // end related posts ?> -->

  </article>

  <nav class="other-awks-in-section medium-4 medium-offset-11 small-16 ">
        <!-- <h3> other artworks in this section </h3> -->
        <?php



          $args = array(
            'post_type' => 'artworks',
            'posts_per_page' => '-1',
            'post_parent' => $parent,
            'orderby' => 'menu_order',
            'order' => 'ASC'
          );

          $these_artworks = new WP_Query( $args );


          if ( $these_artworks->have_posts() ) {

          ?>

          <ul class="other-artworks">
          <?php
            // start to loop through all artworks in this section

          while ( $these_artworks->have_posts() ) : $these_artworks->the_post();

          if( ($post->post_parent == $parent) && (get_post_status ( $post ) == 'publish' )) {

        ?>
        <!-- output the parent artwork title and link-->
        <li <?php if ($post->ID == $cunt_post) { echo 'class="current-post"'; }?> >
          <a href="<?php the_permalink(); ?>#post-content"><?php echo the_title() ;?></a>
        </li>
        <?php }
        endwhile; ?>
        </ul> <!-- end ul.other-artworks -->
        <?php } ?>
  </nav>


<?php endwhile; ?>

