<?php the_content(); ?>




<!-- display news/events lists in two cols -->
<?php

  // heading for news and events
  echo '<h2 class="heading__page-title">Calendar, News or Gestures</h2>';

  //  Left Col News/Events
	$args = array(
	    'post_type' => 'news',
      'meta_key' => 'news_date', // name of custom field
		  'orderby' => 'meta_value_num',
		  'order' => 'DESC',
	    'posts_per_page' => '-1',
      'meta_query' => array(
        'relation' => 'AND',
        array(
          'key' => 'show_in_column',
          'value' => 'Left',
          'compare' => '='
        )
      )
	);
	$query = new WP_Query( $args );


	if ( $query->have_posts() )
	{
	
    // start the left-col list
    echo '<ul class="list__news_events __left-col medium-6 columns no-pad-l">';

    $year_check = ''; // set blank year check at beginning - this will be filled with current year after each news post iteration

        // loop through left news posts
        while ( $query->have_posts() ) : $query->the_post(); 
        ?>

          <!-- format post date into readable format and set variable to compare with the year_check variable.
    			will add an horiz rule to separate years -->
        	<?php
        		$date = DateTime::createFromFormat('Ymd', get_field('news_date'));
    				$p_date = $date->format('M Y');
    				$p_year = $date->format('Y');
    			?>

          <!-- insert horiz rule between posts if they are in different years -->
          <?php
          	if ($p_year != $year_check) {
          		if ($year_check != '') {
          			echo '<hr class="news_separator"/>';
          		}
          		$year_check = $p_year;
          	}
          ?>

        <li class="list_item__news" id="post-<?php the_ID(); ?>">

          	<a href="<?php the_permalink(); ?>">
          		<?php
          			echo $p_date . ': '; the_title();
          		?>
          	</a>
        </li>



        <?php endwhile;
        echo '</ul>'; // close .list__news_events.__left-col
	}

    wp_reset_postdata();


     //  Right Col News/Events
  $args = array(
      'post_type' => 'news',
      'meta_key' => 'news_date', // name of custom field
      'orderby' => 'meta_value_num',
      'order' => 'DESC',
      'posts_per_page' => '-1',
      'meta_query' => array(
        'relation' => 'AND',
        array(
          'key' => 'show_in_column',
          'value' => 'Right',
          'compare' => '='
        )
      )
  );
  $query = new WP_Query( $args );


  if ( $query->have_posts() )
  {
  
    // start the left-col list
    echo '<ul class="list__news_events __right-col medium-6 columns no-pad-l">';

    $year_check = ''; // set blank year check at beginning - this will be filled with current year after each news post iteration

        // loop through left news posts
        while ( $query->have_posts() ) : $query->the_post(); 
        ?>

          <!-- format post date into readable format and set variable to compare with the year_check variable.
          will add an horiz rule to separate years -->
          <?php
            $date = DateTime::createFromFormat('Ymd', get_field('news_date'));
            $p_date = $date->format('M Y');
            $p_year = $date->format('Y');
          ?>

          <!-- insert horiz rule between posts if they are in different years -->
          <?php
            if ($p_year != $year_check) {
              if ($year_check != '') {
                echo '<hr class="news_separator"/>';
              }
              $year_check = $p_year;
            }
          ?>

        <li class="list_item__news" id="post-<?php the_ID(); ?>">

            <a href="<?php the_permalink(); ?>">
              <?php
                echo $p_date . ': '; the_title();
              ?>
            </a>
        </li>



        <?php endwhile;
        echo '</ul>'; // close .list__news_events.__right-col
  }

    wp_reset_postdata();


  ?>

  <div class="panel__bio">

    <?php

      $bioPageID = 12;

      // output Bio Page Title
    	echo "<h2>" . get_the_title( $bioPageID ) . "</h2>";

        // Output Bio Page content
      echo apply_filters('the_content', get_post_field('post_content', $bioPageID));

    ?>
  </div>

