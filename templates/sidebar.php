<span class="left work-link">Work</span>

<!-- primary menu items for sidebar  -->
<?php if (has_nav_menu('sidebar_navigation')) :
  wp_nav_menu(array('theme_location' => 'sidebar_navigation', 'menu_class' => 'sidebar-nav right'));
endif; ?>

<div class="clear"></div>

<!-- website pages tree view style output for posts in the portfolio items section -->


<!-- Side bar widget area -->
<?php dynamic_sidebar('sidebar-primary'); ?>
