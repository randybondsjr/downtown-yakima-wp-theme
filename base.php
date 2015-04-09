<?php

use Roots\Sage\Config;
use Roots\Sage\Wrapper;

?>

<?php get_template_part('templates/head'); ?>
  <body <?php body_class(); ?>>
    <!--[if lt IE 9]>
      <div class="alert alert-warning">
        <?php _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.', 'sage'); ?>
      </div>
    <![endif]-->
    
    <div class="wrap container" role="document">
      <div class="row">
        <div class="col-sm-6">
          <a href="<?php echo esc_url(home_url('/')); ?>"><img src="/wordpress/wp-content/themes/downtown-yakima-wp-theme/dist/images/home.png" alt="Downtown Yakima Home" class="home-link"></a>
        </div>
        <div class="col-sm-6">
          <form role="search" method="get" class="search-form form-inline pull-right" action="/search">
            <div class="input-group">
              <input type="hidden" name="cx" value="000682829429502656071:lvopkpnabtg" />
              <input type="hidden" name="cof" value="FORID:1" />
              <input type="hidden" name="ie" value="UTF-8" />
              <input type="search" id="search-question"  value="<?php if (is_search()) { echo get_search_query(); } ?>" name="q" class="search-field form-control search-query">
              <label class="hide"><?php _e('Search for:', 'roots'); ?></label>
              <span class="input-group-btn">
                <button type="submit" class="search-submit btn btn-search"><span class="glyphicon glyphicon-search"></span></button>
              </span>
            </div>
          </form>
        </div> 
      </div>
      <div class="logo no-side-margin">
        <a href="<?php echo esc_url(home_url('/')); ?>"></a>
        <span class="hidden-xs">Organically grown. Everyday unique.</span>
      </div>
      
      <?php
        do_action('get_header');
        get_template_part('templates/header');
      ?>
      <div class="content row">
        <?php if (Config\display_sidebar()) : ?>
          <aside class="sidebar" role="complementary">
            <?php include Wrapper\sidebar_path(); ?>
          </aside><!-- /.sidebar -->
        <?php endif; ?>
        <main class="main" role="main">
          <?php include Wrapper\template_path(); ?>
        </main><!-- /.main -->
        
      </div><!-- /.content -->
      <?php
      get_template_part('templates/footer');
      wp_footer();
    ?>
    </div><!-- /.wrap -->
    
  </body>
</html>
