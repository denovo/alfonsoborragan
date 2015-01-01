<?php the_content(); ?>

<?php  // get theme options
  $theme_options = get_option( 'pu_theme_options' );
  $num_of_events = $theme_options['num_of_events'];
  // if integer value not set show 30 events by default
  if (!is_numeric( $num_of_events )) {
     $num_of_events = 30;
  }
?>

<div class="snap-to-this">

  <!-- display news/events lists in two cols -->
  <?php

    // heading for news and events
    echo '<h2 class="heading__page-title"><a class="homepage-link active" href=" ' . get_option('home') . '">Calendar, News or Gestures</a></h2>';

    echo '<div class="panel__news-events">';

    // get News/Events
  	$args = array(
  	    'post_type' => 'news',
        'meta_key' => 'news_date', // name of custom field
  		  'orderby' => 'meta_value_num',
  		  'order' => 'DESC',
  	    'posts_per_page' => $num_of_events
  	);
  	$query = new WP_Query( $args );


  	if ( $query->have_posts() )
  	{

      // newsevents list
      // echo '<ul class="list__news_events medium-6 columns no-pad-l">';
      echo '<ul class="list__news_events medium-offset-1">';
      $year_check = ''; // set blank year check at beginning - this will be filled with current year after each news post iteration

          // loop through left news posts
          while ( $query->have_posts() ) : $query->the_post();
          ?>

          	<?php
            // format post date into readable format and set variable to compare with the year_check variable.
            // will add an horiz rule to separate years
          		$date = DateTime::createFromFormat('Ymd', get_field('news_date'));
      				$p_date = $date->format('M Y');
      				$p_year = $date->format('Y');
      			?>


            <?php
              //  add class to put a top border rule between posts if they are in different years
            	if ($p_year != $year_check) {
            		if ($year_check != '') {
                  $new_year = true;
            		}
                else {
                  $new_year = false;
                }
                // update current year
            		$year_check = $p_year;
            	}
            ?>


              <?php
                if($new_year) { ?>
                  <li class="list_item__news new_year" id="post-<?php the_ID(); ?>">

              <?php
                   // reset end of section after outputting a divider line
                   $new_year = false;
                } else {
              ?>
                  <li class="list_item__news" id="post-<?php the_ID(); ?>">
              <?php
                } // END if($new_year)

                $chosen_post_type = get_field('type_of_post');

                $news_title = get_field('short_news_title');

                if (empty($news_title)) {
                  $news_title = get_the_title();
                }

                $news_title = $p_date . ": " . $news_title;

                switch ( $chosen_post_type) {
                  case 'Title Only':
                    ?>
                        <span><?php echo $news_title; ?></span>
                    <?php
                    break;

                  case 'Link Only':
                    $the_content_link = get_field('content_link');
                    ?>
                        <a href="<?php echo $the_content_link['url'] ?>" target="<?php echo $the_content_link['target'] ?>"><?php echo $news_title; ?></a>
                    <?php
                    break;

                  case 'Regular Post':
                    ?>
                        <a href="<?php the_permalink(); ?>#post-content"><?php echo $news_title; ?>  </a>
                    <?php
                  break;

                  default:
                  ?>
                    <a href="<?php the_permalink(); ?>#post-content"> <?php echo $news_title; ?> </a>
                  <?php
                  break;
                }
                // display edit post link if user is logged in
                edit_post_link('Edit', '<p>', '</p>');
              ?>
          </li>



          <?php endwhile;
          echo '</ul>'; // close .list__news_events.__left-col
  	}

      wp_reset_postdata();

    ?>


    <div class="news__view-all-link medium-15">
      <a href="<?php echo get_page_link(214); ?>#post-content">old entries</a>
    </div>

   </div> <!-- end .panel__news-events -->



  <hr class="hr__large-margin"/>

  <div class="panel__bio medium-12 medium-offset-1 columns no-pad-l">

    <?php $bioPageID = 176; ?>

      <h2>Bio</h2>
      <div class="homepage__bio-content ">
        <?php
          // Output Bio Page content
          echo apply_filters('the_content', get_post_field('post_content', $bioPageID));
        ?>
      </div>
  </div>

</div> <!-- END .snap-to-this -->
