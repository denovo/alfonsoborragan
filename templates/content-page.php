<div class="small-16 medium-12 medium-offset-2 columns no-pad-r">
	<h1 class="page__title"><?php echo roots_title(); ?></h1>
	<?php the_content(); ?>
</div>


<?php wp_link_pages(array('before' => '<nav class="pagination">', 'after' => '</nav>')); ?>