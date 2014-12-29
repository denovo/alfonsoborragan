<header>
  <nav class="top-bar" data-topbar>
    <ul class="title-area">
      <li class="name"> <h1><a href="<?php echo esc_url(home_url()); ?>"><?php bloginfo('name'); ?></a></h1> </li>
      <li class="toggle-topbar menu-icon"><a href="#"><span></span></a></li>
    </ul>

    <section class="top-bar-section">
      <?php if (has_nav_menu('primary_navigation')) :
        wp_nav_menu(array('menu' => 'mobile_menu','theme_location' => 'primary_navigation', 'menu_class' => 'right'));
      endif; ?>

    </section>
  </nav>
</header>

