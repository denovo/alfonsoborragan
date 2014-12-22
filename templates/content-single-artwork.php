<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class(); ?>>
    <header>
      <div class="page-category-label"> Post category </div>
      <h1 class="entry-title"><?php the_title(); ?></h1>
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
  </article>
<?php endwhile; ?>

