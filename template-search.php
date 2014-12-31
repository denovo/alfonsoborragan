<?php
/*
Template Name: Search Template
*/
?>
<?php echo '<h2 class="heading__page-title"><a class="homepage-link active" href=" ' . get_option('home') . '">Calendar, News or Gestures</a></h2>'; ?>
<?php while (have_posts()) : the_post(); ?>
	<?php get_template_part('templates/page', 'homepage-header'); ?>
	<div class="small-16 medium-12 medium-offset-2 columns no-pad-l no-pad-r">
		<h1 class="page__title"> Search Alfonsoborragan.com </h1>
		<?php get_search_form(); ?>
	</div>
<?php endwhile; ?>


