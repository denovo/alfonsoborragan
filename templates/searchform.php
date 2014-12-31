<form role="search" method="get" class="search" action="<?php echo esc_url(home_url('/')); ?>">
  <div class="row">
    <div class="small-16 columns no-pad-l">
      <div class="row collapse">
        <div class="small-12 columns">
          <input type="text" value="<?php echo get_search_query(); ?>" name="s" placeholder="<?php _e('Search', 'roots'); ?> <?php bloginfo('name'); ?>">
        </div>
        <div class="small-4 columns no-pad-l no-pad-r">
          <button type="submit" class="button expand postfix"><?php _e('Search', 'roots'); ?></button>
        </div>
      </div>
    </div>
  </div>
</form>


