<?php get_header(); ?>
<main role="main" id="main">
   <!-- Banner -->
   <div id="banner_0" class="section banner  padding-md-bottom padding-md-top dark-bg" style="background: url('/wp-content/uploads/2016/02/press-banner.jpg') center center no-repeat;  background-size:cover;">
      <div class="overlay"></div>
      <div class="container">
         <div class="row">
            <div class="content col-xs-12">
               <h1 style="text-align: center;">Search Results</h1>
            </div>
         </div>
      </div> <!-- end .container-->
   </div>
   <!-- /Banner-->
   <?php
   global $wp_query;
         
   $args = array(
      'post_type' => array('post'),
      'posts_per_page' => 10,
      'paged' => $paged
   );

   $search_results_return = 'No Search Results were found for:';
		$search_results = $wp_query->found_posts;
		if($search_results > 0) {
			$search_results_return = 'Search Results:';
		}

      query_posts( $args );?>
   <?php get_template_part( 'part', 'posts' ); ?>

   
</main>

<?php get_footer(); ?>
