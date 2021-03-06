<?php echo '<h2 class="heading__page-title"><a class="homepage-link" href=" ' . get_option('home') . '#post-content">Calendar, News or Gestures</a></h2>'; ?>

<?php while (have_posts()) : the_post(); ?>

  <article <?php post_class(); ?>>
    <header>
      <div class="page-category-label"> Post category </div>
      <h1 class="entry-title"><?php the_title(); ?></h1>
      <?php get_template_part('templates/entry-meta'); ?>
    </header>
    <div class="entry-content">
      <?php the_content(); ?>
    </div>
    <footer>
      <?php wp_link_pages(array('before' => '<nav class="page-nav"><p>' . __('Pages:', 'roots'), 'after' => '</p></nav>')); ?>
    </footer>
  </article>
<?php endwhile; ?>
