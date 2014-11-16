
<!-- only show the slider on the homepage -->
<?php
  if ( is_page('homepage') ) {  echo get_new_royalslider(1); ?>

<?php
    }
?>

<div class="contain-to-grid sticky-nav header-wrap">
  <header >
    <nav class="top-bar" data-topbar>
      <ul class="title-area">
        <li class="name"> <h1><a href="<?php echo esc_url(home_url()); ?>"><?php bloginfo('name'); ?></a></h1> </li>
        <li class="toggle-topbar menu-icon"><a href="#"><span></span></a></li>
      </ul>

      <section class="top-bar-section">
        <?php if (has_nav_menu('primary_navigation')) :
          wp_nav_menu(array('theme_location' => 'primary_navigation', 'menu_class' => 'right'));
        endif; ?>
      </section>
    </nav>
    <div class="green-decoration"></div>
  </header>
</div> <!-- contain-to-grid -->




