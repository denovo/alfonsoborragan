<?php echo '<h2 class="heading__page-title"><a class="homepage-link active" href=" ' . get_option('home') . '#post-content">Calendar, News or Gestures</a></h2>'; ?>

<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class(); ?>>
    <header class="entry-content small-16 medium-12 medium-offset-2 columns  no-pad-r">
      <div class="page-category-label"> Post category </div>
        <h1 class="entry-title"><?php the_title(); ?></h1>
    </header>
    <div class="entry-content small-16 medium-12 medium-offset-2 columns  no-pad-r">

      <?php the_content(); ?>
    </div> <!-- end .entry-content -->

    <footer>
      <?php wp_link_pages(array('before' => '<nav class="page-nav"><p>' . __('Pages:', 'roots'), 'after' => '</p></nav>')); ?>
    </footer>

    <?php if( have_rows('news_related_links') ): ?>
      <div class="relatedposts medium-3 small-12">
          <h3>Related</h3>

          <ul class="list__related-links">

          <?php while( have_rows('news_related_links') ): the_row();

            // vars
            $the_related_link = get_sub_field('related_link');
            $link_url = $the_related_link['url'];
            $link_title = $the_related_link['title'];

            ?>

            <li class="related-link">

              <?php if( $link_url ): ?>
                <a href="<?php echo $link_url; ?>">
              <?php endif; ?>

               <?php echo $the_related_link['title']; ?>

              <?php if( $link_url ): ?>
                </a>
              <?php endif; ?>

                <!-- <?php echo $content; ?> -->

            </li>

          <?php endwhile; ?>

          </ul>
      </div> <!-- // end related posts ?> -->
    <?php endif; ?>


  </article>

<?php endwhile; ?>

