<?php
	global $post;     // if outside the loop
	$page_object = get_queried_object();
	$post_id  = get_queried_object_id(); // Get current page id


	$curnt_post = $post_id;
	$is_artwork = false;
	$is_curnt_post = false;
	if ($post->post_type == "artworks") { $is_artwork = true; }
?>

<a class="left work-link <?php if ($is_artwork) {echo "active";}?>">Work</a>

<!-- primary menu items for sidebar  -->
<?php if (has_nav_menu('sidebar_navigation')) :
  wp_nav_menu(array('theme_location' => 'sidebar_navigation', 'menu_class' => 'sidebar-nav right'));
endif; ?>

<div class="clear"></div>

<!-- website pages tree view style output for posts in the portfolio items section -->

<?php

	// select only top level parent posts (parent = 0)
	$args = array(
	    'post_type' => 'artworks',
	    'posts_per_page' => '-1',
	    'post_parent' => 0,
	   	'orderby' => 'menu_order',
	   	'order' => 'ASC'
	);
	$parent_artworks = new WP_Query( $args );


	if ( $parent_artworks->have_posts() )
	{
    	echo '<ul class="list__sidebar_artworks">';

    	// start the loop of top level parent artworks
        while ( $parent_artworks->have_posts() ) : $parent_artworks->the_post(); ?>

			<!-- output the parent artwork title and link-->
	        <li class="list__sidebar__artworks__parent-item <?php if ($post->ID == $curnt_post) { echo "active";} ?>" id="post-<?php the_ID(); ?>">

	        	<?php if (get_field('title_page_only')) {
	        		the_title();
	        	}
	        	else { ?>
	          	<a href="<?php the_permalink(); ?>#post-content">
	          		<?php the_title(); ?>
	          	</a>
	          	<?php } ?>
		        <!-- get any subposts of this artwork post-->

				<?php
					$child_args = array(
						'post_type' => 'artworks',
						'posts_per_page' => -1,
						'post_parent' => $post->ID,
						'order'=> 'ASC',
						'orderby' => 'menu_order'
					);

					$subposts = get_posts( $child_args );

					if (count($subposts) > 0) {
						echo '<ul class="list__sidebar__artworks__children">';

						foreach ( $subposts as $post ) :
					  	setup_postdata( $post ); ?>
					  			<li>
								<a href="<?php the_permalink(); ?>#post-content">
									<?php the_title(); ?>
								</a>
								</li>

						<?php
						endforeach;
						echo '</ul>';
					}

					wp_reset_postdata();
				?>



	        </li>



        <?php endwhile;

    	echo '</ul>';

	}

    wp_reset_postdata();

?>


<!-- Side bar widget area -->
<?php dynamic_sidebar('sidebar-primary'); ?>
