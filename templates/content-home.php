  
<?php
  $mypost = array( 'post_type' => 'homepage-image','posts_per_page'=>1, );
  $loop = new WP_Query( $mypost );
  while ($loop->have_posts()) {
    $loop->the_post();  
    $meta = get_post_meta($post->ID);
    $button_text = $meta["homepage_image_button_text"][0];
    $button_url = $meta["homepage_image_button_url"][0];
    $button_new = $meta["homepage_image_button_url_new"][0];
    if($button_new == 1){$button_new = true;}else{$button_new = false;}
    $image_url = wp_get_attachment_url( get_post_thumbnail_id($loop->ID) );
  }
?>
<div class="row">
  <div class="col-sm-12">
    <?php 
      if ($button_url != ''){
        echo "<a href=\"$button_url\"";
        if($button_new){echo "target=\"_blank\" ";}
        echo " title=\"\"$button_text>";
      }
    ?>
    <img src="<?php echo $image_url; ?>" alt="<?php the_title(); ?>" class="home-image"></a>
    <?php 
//      if(get_the_content() != ''){
//        the_content();
//      }
    ?>
  </a>
  </div>
</div>
<div class="col-sm-6">
  <div class="events">
    <h3 class="play"><a href="/events/">Events</a></h3>
    <?php
      $current_date = date('j M Y');
      $get_posts = tribe_get_events(array('start_date'=>$current_date,'posts_per_page'=>3) );
      foreach($get_posts as $post) { 
        setup_postdata($post); 
    ?>
    <div class="media">
      <a href="<?php the_permalink(); ?>" class="pull-left"><?php the_post_thumbnail(array(125,125), array('class'=>'media-object')); ?></a>
      <div class="media-body">
        <h4 class="media-heading text-uppercase"><a href="<?php the_permalink(); ?>" id="post-<?php the_ID(); ?>"><?php the_title(); ?></a></h4>
        <p class="date">
        <?php 
          if(tribe_is_multiday()) {
            echo tribe_get_start_date($post->ID, true, 'l, F j, Y');
            echo " - ";
            echo tribe_get_end_date($post->ID, true, 'l, F j, Y');
          }else{
            echo tribe_get_start_date($post->ID, true, 'l, F j, Y @ g:ia');
          }
          echo " - " .tribe_get_venue($post->ID, false);
        ?>
        </p>
        
      </div>
    </div>
    <?php } //endforeach ?>
    <?php wp_reset_query(); ?>
    <p class="text-right" ><a href="/events/">View Full Calendar  &gt;&gt;</a></p>
  </div>
</div>
<div class="col-sm-6 news">
    <?php 
     //news
      $args = array(
      'posts_per_page' => 4,
      'post_type' => 'post'


      );
      $the_query = new WP_Query($args);
      $weekThreeHtml = '';
      // The Loop
      if( $the_query->have_posts() ){
        while ( $the_query->have_posts() ) : $the_query->the_post();
          echo "<div class=\"news-item\">";
          echo "<h2 class=\"text-uppercase\"><a href=\"" . get_permalink() . "\">" . get_the_title() . "</a></h2>";
          if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
            the_post_thumbnail('thumbnail', array( 'class' => 'alignright' ));
          } 
          the_excerpt();
          echo "</div>";  
        endwhile;
      }else{
        echo "<p class=\"alert alert-info\">No current news stories</p>";
      }
      // Reset Post Data
      wp_reset_postdata();  
    ?>
    <div class="clearfix"></div>
    <p class="text-right"><a href="/news/">View Blog &gt;&gt;</a></p>
  </div>
