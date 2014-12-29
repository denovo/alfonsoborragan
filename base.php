<?php get_template_part('templates/head'); ?>


<!-- if viewing a single artworks post,
      check what type of artwork it is,
      and add black background class for
      videos or gallery types     -->
<?php
  if ( is_singular( 'artworks' ) ) {
    // get artworks type (custom field)
    $aw_type = get_field( "artwork_type" );

    switch ($aw_type) {
      case 'video_artwork':
      case 'image_gallery_artwork':
      case 'text_only_artwork':
        $body_class = "bg-black";
        break;
      default:
        $body_class = "regular-artwork";
        break;
    }
  }
?>


<body <?php if (isset($body_class)) {body_class($body_class);} else { body_class(); }; ?>>



  <!--[if lt IE 8]>
    <div class="alert-box warning">
      <?php _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.', 'roots'); ?>
    </div>
  <![endif]-->




<?php
  do_action('get_header');
  get_template_part('templates/header');
?>

  <div class="content row <?php echo isset($bg_class) ? $bg_class: '';?>" id="post-content" role="document">

    <main class="main <?php echo roots_main_class(); ?> columns" role="main">
      <?php include roots_template_path(); ?>
    </main><!-- /.main -->
    <?php if (roots_display_sidebar()) : ?>
      <aside class="sidebar <?php echo roots_sidebar_class(); ?> columns" role="complementary">
        <?php include roots_sidebar_path(); ?>
      </aside><!-- /.sidebar -->
    <?php endif; ?>
  </div><!-- /.content -->


  <?php get_template_part('templates/footer'); ?>





</body>
</html>
