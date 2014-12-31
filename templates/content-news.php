<?php echo '<h2 class="heading__page-title"><a class="homepage-link" href=" ' . get_option('home') . '">Calendar, News or Gestures</a></h2>'; ?>

<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class(); ?>>
    <header>
      <?php echo '<a class="homepage-link" href=" ' . get_option('home') . '">Calendar, News or Gestures</a>'; ?>
      <h1 class="entry-title"><?php the_title(); ?></h1>
    </header>
    <div class="entry-content">
      <?php the_content(); ?>
    </div>
    <footer>
      <?php wp_link_pages(array('before' => '<nav class="page-nav"><p>' . __('Pages:', 'roots'), 'after' => '</p></nav>')); ?>
    </footer>
  </article>
<?php endwhile; ?>
