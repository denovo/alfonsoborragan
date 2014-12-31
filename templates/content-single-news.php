<?php echo '<h2 class="heading__page-title"><a class="homepage-link active" href=" ' . get_option('home') . '">Calendar, News or Gestures</a></h2>'; ?>

<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class(); ?>>
    <header class="entry-content small-16 medium-12 medium-offset-3 columns no-pad-l no-pad-r">
      <div class="page-category-label"> Post category </div>
        <h1 class="entry-title"><?php the_title(); ?></h1>
    </header>
    <div class="entry-content small-16 medium-12 medium-offset-3 columns no-pad-l no-pad-r">

      <?php the_content(); ?>
    </div> <!-- end .entry-content -->

    <footer>
      <?php wp_link_pages(array('before' => '<nav class="page-nav"><p>' . __('Pages:', 'roots'), 'after' => '</p></nav>')); ?>
    </footer>

    <div class="relatedposts medium-3 small-12">
      <h3>Related</h3>
     <?php

        $backup = $post;
        $current = $post->ID; //current page ID

        global $post;
        $thisPost = get_post_type(); //current custom post
        $myposts = get_posts('numberposts=3&order=DESC&orderby=ID&post_type=' . $thisPost .
        '&exclude=' . $current);

        $check = count($myposts);

        if ($check > 1 ) { ?>
        <div id="related" class="group">
            <ul class="group">
            <?php
                foreach($myposts as $post) :
                    setup_postdata($post);
            ?>
                <li>
                    <a href="<?php the_permalink() ?>" title="<?php the_title() ?>" rel="bookmark">
                      <?php the_title() ?>
                    </a>
                </li>

            <?php endforeach; ?>
            </ul>
        <?php
            $post = $backup;
            wp_reset_query();
        ?>

    </div><!-- #related -->
<?php } ?>
    </div> <!-- // end related posts ?> -->

  </article>

<?php endwhile; ?>

