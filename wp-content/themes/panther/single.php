<?php get_header(); the_post();?>
<?php $page_modules = get_field('page_modules', get_option('page_for_posts')); ?>
<main id="main" role="main">
  <?php include(get_stylesheet_directory().'/includes/page-modules.php'); ?>

  <section id="posts_container" class="posts_container padding-md-top padding-md-bottom">
    <div class="post-holder">
      <div class="container">
        <div class="row">
          
          <div class="col-xs-12 col-sm-8">
            <article class="single-post">
              <h1 class="post-title h3 dark-grey-text"><?php the_title(); ?></h1>
              <div class="post-date">
                 <p class="h5"><?php echo get_the_time('F j, Y'); ?></p>
              </div>
              <p class="post-thumbnail"><?php the_post_thumbnail('large');?></p>
              <div class="single-content">
                <?php the_content(); ?>

                <?php
                  if( comments_open() || get_comments_number() ) :
                    //comments_template();
                  endif;
                ?>
              </div>
              <div class="panther-callout">
                <img src="https://static1.panther.com/20160713230511/device-icons.png" width="800" height="437" />
                <h4>panther is a membership club & marketplace for everything kids</h4>
                <a href="/" class="learn-link">Learn More!</a>
              </div>
              <footer>
                <div class="post-categories">
                  <p class="h5">Posted in: <?php echo get_the_category_list(', ');?></p>
                </div>
                <div class="post-tags">
                  <p class="h5"><?php echo get_the_tag_list(' ');?></p>
                </div>
                <div class="navigation clearfix">
                  <div class="previous-post alignleft">
                  <?php previous_post_link('<span class="previous"><i class="fa fa-long-arrow-left" aria-hidden="true"></i> Previous</span> %link'); ?>
                  </div>
                  <div class="next-post alignright">
                  <?php next_post_link('<span class="next">Next <i class="fa fa-long-arrow-right" aria-hidden="true"></i></span></span> %link'); ?>
                  </div>
                </div> <!-- end navigation -->
              </footer>
            </article>
          </div>
          <div class="col-xs-12 col-sm-4">
            <?php get_sidebar();?>
          </div>

        </div>
      </div>
    </div>
  </section>
</main>

<?php get_footer(); ?>
