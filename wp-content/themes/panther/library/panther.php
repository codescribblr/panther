<?php
/*
==========================================================================
Company: panther
Developers: Jonathan Wadsworth
File: panther.php
==========================================================================
*/

add_action( 'after_setup_theme', 'post_setup', 16 );

function post_setup() {
	// launching operation cleanup
	add_action( 'init', 'panther_head_cleanup' );
	// remove WP version from RSS
	add_filter( 'the_generator', 'panther_rss_version' );
	// remove pesky injected css for recent comments widget
	add_filter( 'wp_head', 'panther_remove_wp_widget_recent_comments_style', 1 );
	// clean up comment styles in the head
	add_action( 'wp_head', 'panther_remove_recent_comments_style', 1 );
	// clean up gallery output in wp
	add_filter( 'gallery_style', 'panther_gallery_style' );

	// enqueue base scripts and styles
	add_action( 'wp_enqueue_scripts', 'panther_scripts_and_styles', 999 );
	// ie conditional wrapper

	// launching this stuff after theme setup
	panther_theme_support();

	// adding sidebars to Wordpress (these are created in functions.php)
	add_action( 'widgets_init', 'panther_register_sidebars' );
	// adding the panther search form (created in functions.php)
	//add_filter( 'get_search_form', 'panther_wpsearch' ); //this will override searchform.php

	// cleaning up excerpt
	add_filter( 'excerpt_more', 'panther_excerpt_more' );

	add_image_size('blog-thumb', 767, 500);

}   /* end post_setup */


function panther_head_cleanup() {
	// EditURI link
	remove_action( 'wp_head', 'rsd_link' );
	// windows live writer
	remove_action( 'wp_head', 'wlwmanifest_link' );
	// index link
	remove_action( 'wp_head', 'index_rel_link' );
	// previous link
	remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );
	// start link
	remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
	// links for adjacent posts
	remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
	// WP version
	remove_action( 'wp_head', 'wp_generator' );

	add_filter( 'show_admin_bar', '__return_false' );
	// remove WP version from css
	// add_filter( 'style_loader_src', 'panther_remove_wp_ver_css_js', 9999 );
	// remove Wp version from scripts
	// add_filter( 'script_loader_src', 'panther_remove_wp_ver_css_js', 9999 );

}   /* end panther head cleanup */


add_filter('upload_mimes', 'custom_upload_mimes');

function custom_upload_mimes ( $existing_mimes=array() ) {
	$existing_mimes['svg'] = 'mime/type';
	return $existing_mimes;
}

function panther_rss_version() { return ''; }  // remove WP version from RSS

function panther_remove_wp_ver_css_js( $src ) {    // remove WP version from scripts
	if ( strpos( $src, 'ver=' ) )
					$src = remove_query_arg( 'ver', $src );
	return $src;
}

function panther_remove_wp_widget_recent_comments_style() {    // remove injected CSS for recent comments widget
	 if ( has_filter( 'wp_head', 'wp_widget_recent_comments_style' ) ) {
					remove_filter( 'wp_head', 'wp_widget_recent_comments_style' );
	 }
}

function panther_remove_recent_comments_style() {      // remove injected CSS from recent comments widget
	global $wp_widget_factory;
	if (isset($wp_widget_factory->widgets['WP_Widget_Recent_Comments'])) {
			remove_action( 'wp_head', array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style') );
	}
}

function panther_gallery_style($css) {     // remove injected CSS from gallery
	return preg_replace( "!<style type='text/css'>(.*?)</style>!s", '', $css );
}



function panther_scripts_and_styles() {
	global $wp_styles;  	//  Call global $wp_styles variable
							// - adds a conditional wrapper around ie stylesheet the WordPress way

	if(!is_admin()) {

		// comment reply script for threaded comments
		if(is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
						wp_enqueue_script( 'comment-reply' );
		}


		// modernizr (without media query polyfill)
	    wp_register_script( 'panther-modernizr', get_stylesheet_directory_uri() . '/library/js/libs/modernizr.custom.min.js', array(), '2.5.3', false );

	    // ShadowBox styles
	    wp_register_style( 'panther-shadowbox', get_stylesheet_directory_uri() . '/library/css/libs/shadowbox/shadowbox.css', array(), '3.0.3' );

	    // Colorbox styles
	    wp_register_style( 'panther-colorbox', get_stylesheet_directory_uri() . '/library/css/libs/colorbox/colorbox.css', array(), '1.5.14');

	    // MMenu styles
	    wp_register_style( 'panther-mmenu', get_stylesheet_directory_uri() . '/library/css/libs/jquery.mmenu.all.css', array(), '4.5.3' );

	    // Font-Awesome styles
	    wp_register_style( 'panther-font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css', array(), '4.2.0' );

	    // Slidebars styles
	    wp_register_style( 'panther-slidebars', get_stylesheet_directory_uri() . '/library/css/libs/slidebars.css', array(), '4.1.6' );

	    // Select2 styles
	    wp_register_style( 'panther-select2', get_stylesheet_directory_uri() . '/library/css/libs/select2.css', array(), '3.4.8' );

	    // register main stylesheet
	    wp_register_style( 'panther-stylesheet', get_stylesheet_directory_uri() . '/library/less/style.css', array(), THEME_VERSION, 'all' );

	    // ie-only style sheet
	    wp_register_style( 'panther-ie-only', get_stylesheet_directory_uri() . '/library/css/ie.css', array(), '' );

	    // jQuery UI styles
	    wp_register_style( 'jquery-ui-css', '//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/themes/ui-lightness/jquery-ui.min.css', array(), '');

	    // comment reply script for threaded comments
	    if ( is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
			wp_enqueue_script( 'comment-reply' );
	    }

	    // Add this and the enqueue function below to add jquery validate
	    wp_register_script( 'jquery-validate', '//ajax.aspnetcdn.com/ajax/jquery.validate/1.13.0/jquery.validate.min.js', array( 'jquery' ), '1.13.0', true );

	    //adding scripts file in the footer
	    // Google Map API
	    wp_register_script( 'google-map-api', '//maps.googleapis.com/maps/api/js?v=3.exp&sensor=false', array(), '3.0', true );

	    // Retina.js
	    wp_register_script( 'retina-js', '//cdnjs.cloudflare.com/ajax/libs/retina.js/1.3.0/retina.min.js', array(), '1.3.0' );

	    // jQuery easing
	    wp_register_script( 'jquery-easing', '//cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js', array( 'jquery' ), '1.3.0', true );

	    // Better jQuery easing
	    wp_register_script( 'jquery-tween', '//cdnjs.cloudflare.com/ajax/libs/gsap/1.15.0/TweenMax.min.js', array( 'jquery' ), '1.15.0', true );

	    // jQuery ddSlick select replacement
	    wp_register_script( 'ddslick', get_stylesheet_directory_uri().'/library/js/libs/jquery.ddslick.min.js', array( 'jquery' ), '2.0', true );

	    // select2 select replacement
	    wp_register_script( 'select2', get_stylesheet_directory_uri().'/library/js/libs/select2.min.js', array( 'jquery' ), '3.4.8', true );

	    // jQuery customSelect select replacement
	    wp_register_script( 'customSelect', get_stylesheet_directory_uri().'/library/js/libs/jquery.customSelect.min.js', array( 'jquery' ), '0.5.1', true );

	    // Hammer JS
	    wp_register_script( 'hammer', get_stylesheet_directory_uri().'/library/js/libs/hammer.min.js', array( 'jquery' ), '2.0.3', true );

	    // MMenu
	    wp_register_script( 'mmenu', get_stylesheet_directory_uri().'/library/js/libs/jquery.mmenu.min.all.js', array( 'jquery' ), '4.5.3', true );

	    // FitVids
	    wp_register_script( 'fitvids', get_stylesheet_directory_uri().'/library/js/libs/jquery.fitvids.js', array( 'jquery' ), '1.1', true );

	    // Slidebars
	    wp_register_script( 'slidebars', get_stylesheet_directory_uri().'/library/js/libs/slidebars.js', array( 'jquery' ), '4.1.6', true );

	    // LazyLoad
	    wp_register_script( 'lazyload', get_stylesheet_directory_uri().'/library/js/libs/jquery.lazy.min.js', array( 'jquery' ), '0.1.11', true );

	    // ShadowBox
	    wp_register_script( 'shadowbox', get_stylesheet_directory_uri().'/library/js/libs/shadowbox.js', array( 'jquery' ), '3.0.3', true );

	    // Colorbox
	    wp_register_script( 'colorbox', get_stylesheet_directory_uri().'/library/js/libs/jquery.colorbox.min.js', array('jquery'), '1.5.14', true );

	    // Cycle2
	    wp_register_script( 'cycle2', get_stylesheet_directory_uri().'/library/js/libs/jquery.cycle2.min.js', array( 'jquery' ), '2.0', true );

	    // Cycle2 Swipe Plugin
	    wp_register_script( 'cycle2-swipe', get_stylesheet_directory_uri().'/library/js/libs/jquery.cycle2.swipe.min.js', array( 'jquery', 'cycle2' ), '2.0', true );

	    // Cycle2 Carousel Plugin
	    wp_register_script( 'cycle2-carousel', get_stylesheet_directory_uri().'/library/js/libs/jquery.cycle2.carousel.min.js', array( 'jquery', 'cycle2' ), '2.0', true );

	    // ifvisible
	    wp_register_script( 'ifvisible', get_stylesheet_directory_uri().'/library/js/libs/ifvisible.js', array( 'jquery' ), '1.6.2', true );

	    // Bootstrap JS
	    wp_register_script( 'panther-bootstrap', get_stylesheet_directory_uri() . '/library/js/libs/bootstrap.min.js', array(), '3.0.0', true );

	    //adding scripts file in the footer
	    wp_register_script( 'panther-js', get_stylesheet_directory_uri() . '/library/js/scripts.js', array( 'jquery' ), THEME_VERSION, true );
	    wp_localize_script( 'panther-js', 'pantherAjax', array('ajaxurl' => admin_url( 'admin-ajax.php' )));

	    // enqueue styles and scripts
	    wp_enqueue_script( 'panther-modernizr' );
	    wp_enqueue_style( 'panther-font-awesome' );
	    //wp_enqueue_style( 'jquery-ui-css' );
	    // wp_enqueue_style( 'panther-shadowbox' );
	    // wp_enqueue_style( 'panther-colorbox' );
	    // wp_enqueue_style( 'panther-mmenu' );
	    //wp_enqueue_style( 'panther-slidebars' );
	    //wp_enqueue_style( 'panther-select2' );
	    wp_enqueue_style( 'panther-stylesheet' );
	    // wp_enqueue_style( 'panther-ie-only' );

	    $wp_styles->add_data( 'panther-ie-only', 'conditional', 'lt IE 9' ); // add conditional wrapper around ie stylesheet

	    /*
	    I recommend using a plugin to call jQuery
	    using the google cdn. That way it stays cached
	    and your site will load faster.
	    */
	    // wp_enqueue_script( 'retina-js' );
	    wp_enqueue_script( 'jquery' );
	    // wp_enqueue_script( 'jquery-validate' );
	    // wp_enqueue_script( 'google-map-api' );
	    wp_enqueue_script( 'jquery-easing' );
	    // wp_enqueue_script( 'jquery-tween' );
	    // wp_enqueue_script( 'hammer' );
	    // wp_enqueue_script( 'mmenu' );
	    wp_enqueue_script( 'fitvids' );
	    // wp_enqueue_script( 'slidebars' );
	    // wp_enqueue_script( 'lazyload' );
	    // wp_enqueue_script( 'shadowbox' );
	    wp_enqueue_script( 'colorbox' );
	    // wp_enqueue_script( 'cycle2' );
	    // wp_enqueue_script( 'cycle2-swipe' );
	    // wp_enqueue_script( 'cycle2-carousel' );
	    wp_enqueue_script( 'ifvisible' );
	    // wp_enqueue_script( 'ddslick' );
	    // wp_enqueue_script( 'select2' );
	    // wp_enqueue_script( 'customSelect' );
	    wp_enqueue_script( 'panther-js' );
	    wp_enqueue_script( 'panther-bootstrap' );
	    //get rid of anyone else's attempt to add bootstrap default styles
	    wp_deregister_style( 'bootstrap' );
	    wp_deregister_script( 'bs_bootstrap' );
	    wp_deregister_style( 'bs_bootstrap' );
	    wp_deregister_style( 'bs_shortcodes' );

	}
}



/**

				THEME SUPPORT
				==========================================================================
**/

// Adding WP 3+ Functions & Theme Support
function panther_theme_support() {

	// wp thumbnails (sizes handled in functions.php)
	add_theme_support( 'post-thumbnails' );

	// default thumb size
	//set_post_thumbnail_size(125, 125, true);

	// wp custom background (thx to @bransonwerner for update)
	add_theme_support( 'custom-background',
		array(
		'default-image' => '',  // background image default
		'default-color' => '', // background color default (dont add the #)
		'wp-head-callback' => '_custom_background_cb',
		'admin-head-callback' => '',
		'admin-preview-callback' => ''
		)
	);

	// rss thingy
	add_theme_support('automatic-feed-links');

	// to add header image support go here: http://themble.com/support/adding-header-background-image-support/

	// adding post format support
	add_theme_support( 'post-formats',
		array(
			'aside',             // title less blurb
			'gallery',           // gallery of images
			'link',              // quick link to other site
			'image',             // an image
			'quote',             // a quick quote
			'status',            // a Facebook like status update
			'video',             // video
			'audio',             // audio
			'chat'               // chat transcript
		)
	);

	// wp menus
	add_theme_support( 'menus' );

	// registering wp3+ menus
	register_nav_menus(
		array(
			'main-nav' => __( 'The Main Menu', 'panthertheme' )   // main nav in header
		)
	);
	register_nav_menus(
        array(
            'home-nav' => __( 'Home Menu', 'panthertheme' )   // top nav in header
        )
    );
    register_nav_menus(
        array(
            'about-nav' => __( 'About Menu', 'panthertheme' )   // top nav in header
        )
    );
    register_nav_menus(
        array(
            'mobile-nav' => __( 'The Mobile Menu', 'panthertheme' )   // main nav on mobile
        )
    );

} /* end panther theme support */



/*********************
MENUS & NAVIGATION
*********************/

// the main menu
function panther_main_nav() {
	// display the wp3 menu if available      

    wp_nav_menu(array(
    	'container' => false,                           // remove nav container
    	'container_class' => '',			            // class of container (should you choose to use it)
    	'menu' => __( 'The Main Menu', 'panthertheme' ),  // nav name
    	'menu_class' => 'nav navbar-nav',         			// adding custom nav class
    	'theme_location' => 'main-nav',                 // where it's located in the theme
    	'before' => '',                                 // before the menu
        'after' => '',                                  // after the menu
        'link_before' => '',                            // before each link
        'link_after' => '',                             // after each link
        'depth' => 3,                                   // limit the depth of the nav
    	'walker' => new Bootstrap_Walker_Nav_Menu()     // custom menu in navbar.php     
	));
} /* end panther main nav */
function panther_home_nav() {
    // display the wp3 menu if available      

    wp_nav_menu(array(
        'container' => false,                           // remove nav container
        'container_class' => '',                        // class of container (should you choose to use it)
        'menu' => __( 'Home Menu', 'panthertheme' ),  // nav name
        'menu_class' => 'nav navbar-nav',                   // adding custom nav class
        'theme_location' => 'home-nav',                 // where it's located in the theme
        'before' => '',                                 // before the menu
        'after' => '',                                  // after the menu
        'link_before' => '',                            // before each link
        'link_after' => '',                             // after each link
        'depth' => 2,                                   // limit the depth of the nav
        'walker' => new Bootstrap_Walker_Nav_Menu()     // custom menu in navbar.php     
    ));
} /* end panther top nav */
function panther_mobile_nav() {
    // display the wp3 menu if available      

    wp_nav_menu(array(
        'container' => false,                           // remove nav container
        'container_class' => '',                        // class of container (should you choose to use it)
        'menu' => __( 'The Mobile Menu', 'panthertheme' ),  // nav name
        'menu_class' => 'nav',                         // adding custom nav class
        'theme_location' => 'mobile-nav',                 // where it's located in the theme
        'before' => '',                                 // before the menu
        'after' => '',                                  // after the menu
        'link_before' => '',                            // before each link
        'link_after' => '',                             // after each link
        'depth' => 2,                                   // limit the depth of the nav
        'walker' => new MMenu_Walker_Nav_Menu()     // custom menu in navbar.php     
    ));
} /* end panther main nav */

// this is the fallback for header menu
function panther_main_nav_fallback() {
	wp_page_menu( array(
		'show_home' => true,
    	'menu_class' => 'nav top-nav clearfix',      // adding custom nav class
		'include'     => '',
		'exclude'     => '',
		'echo'        => true,
        'link_before' => '',                            // before each link
        'link_after' => ''                             // after each link
	) );
}

// this is the fallback for footer menu
function panther_footer_links_fallback() {
	/* you can put a default here if you like */
}




/**
	RELATED POSTS
	==========================================================================
**/

// Related Posts Function (call using panther_related_posts(); )
function panther_related_posts() {
		echo '<ul id="panther-related-posts">';
		global $post;
		$tags = wp_get_post_tags( $post->ID );
		if($tags) {
				foreach( $tags as $tag ) {
						$tag_arr .= $tag->slug . ',';
				}
								$args = array(
										'tag' => $tag_arr,
										'numberposts' => 5, /* you can change this to show more */
										'post__not_in' => array($post->ID)
						);
								$related_posts = get_posts( $args );
								if($related_posts) {
										foreach ( $related_posts as $post ) : setup_postdata( $post ); ?>
														<li class="related_post"><a class="entry-unrelated" href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></li>
										<?php endforeach; }
						else { ?>
												<?php echo '<li class="no_related_post">' . __( 'No Related Posts Yet!', 'panthertheme' ) . '</li>'; ?>
				<?php }
		}
		wp_reset_query();
		echo '</ul>';
} /* end panther related posts function */



/**
	PAGINATION
	==========================================================================
**/

// Numeric Page Navi (built into the theme by default)
function panther_page_navi() {
		global $wp_query;
		$bignum = 999999999;
		if ( $wp_query->max_num_pages <= 1 )
		return;

		echo '<nav class="pagination">';

				echo paginate_links( array(
						'base'          => str_replace( $bignum, '%#%', esc_url( get_pagenum_link($bignum) ) ),
						'format'        => '',
						'current'       => max( 1, get_query_var('paged') ),
						'total'         => $wp_query->max_num_pages,
						'prev_text'     => '&larr;',
						'next_text'     => '&rarr;',
						'type'          => 'list',
						'end_size'      => 3,
						'mid_size'      => 3
				) );

		echo '</nav>';
} /* end page navi */



/**
	ITEM CLEANUP
	==========================================================================
**/

function new_excerpt_length($length) {
	return 60;
}
// function excerpt_ellipse($text) {
// 	global $post;
//   return str_replace('[...]', '<a class="green-button" href="'. get_permalink($post->ID) . '" title="'. __( 'Read', 'panthertheme' ) . get_the_title($post->ID).'">View More</a>', $text);
// }

// add_filter('the_excerpt', 'excerpt_ellipse');
add_filter('excerpt_length', 'new_excerpt_length');

function custom_excerpt($new_length = 50, $new_more = '...') {
  add_filter('excerpt_length', function () use ($new_length) {
    return $new_length;
  }, 999);
  add_filter('excerpt_more', function () use ($new_more) {
    return $new_more;
  });
  $output = get_the_excerpt();
  $output = apply_filters('wptexturize', $output);
  $output = apply_filters('convert_chars', $output);
  $output = '<p>' . $output . '</p>';
  echo $output;
}

// This removes the annoying […] to a Read More link
function panther_excerpt_more($more) {
	global $post;
	return '... <p class="read-more align-right h5"><a href="'. get_permalink($post->ID) . '">+ READ MORE</a></p>';
}

/*
 * This is a modified the_author_posts_link() which just returns the link.
 *      - This is necessary to allow usage of the usual l10n process with printf().
 */
function panther_get_the_author_posts_link() {
		global $authordata;
		if ( !is_object( $authordata ) )
				return false;
		$link = sprintf(
				'<a href="%1$s" title="%2$s" rel="author">%3$s</a>',
				get_author_posts_url( $authordata->ID, $authordata->user_nicename ),
				esc_attr( sprintf( __( 'Posts by %s' ), get_the_author() ) ), // No further l10n needed, core will take care of this one
				get_the_author()
		);
		return $link;
}

/**
	ADD ADMIN SEPARATORS
	==========================================================================
**/

function admin_seperators() {
		 echo '<style type="text/css">
						#adminmenu li.wp-menu-separator {margin: 0;}
						.admin-color-fresh #adminmenu li.wp-menu-separator {background: #444;}
						.admin-color-midnight #adminmenu li.wp-menu-separator {background: #4a5258;}
						.admin-color-light #adminmenu li.wp-menu-separator {background: #c2c2c2;}
						.admin-color-blue #adminmenu li.wp-menu-separator {background: #3c85a0;}
						.admin-color-coffee #adminmenu li.wp-menu-separator {background: #83766d;}
						.admin-color-ectoplasm #adminmenu li.wp-menu-separator {background: #715d8d;}
						.admin-color-ocean #adminmenu li.wp-menu-separator {background: #8ca8af;}
						.admin-color-sunrise #adminmenu li.wp-menu-separator {background: #a43d39;}
								 </style>';
}
add_action('admin_head', 'admin_seperators');


/*********************
CUSTOMIZE TINY MCE EDITOR
*********************/

function panther_wp_editor_fontsize_filter( $buttons ) {
        array_shift( $buttons );
        array_unshift( $buttons, 'fontsizeselect');
        array_unshift( $buttons, 'formatselect');
        return $buttons;
}
add_filter('mce_buttons_2', 'panther_wp_editor_fontsize_filter');

function panther_customize_text_sizes($initArray){
           $initArray['fontsize_formats'] = "10px 11px 12px 13px 14px 15px 16px 18px 20px 22px 24px 26px 28px 30px 32px 36px 48px 60px";
           return $initArray;
}
add_filter('tiny_mce_before_init', 'panther_customize_text_sizes');

// Add Formats Dropdown Menu To MCE
function panther_style_select( $buttons ) {
    array_push( $buttons, 'styleselect' );
    return $buttons;
}
add_filter( 'mce_buttons', 'panther_style_select' );

// Remove Unnecessary buttons from row 2 MCE
function panther_remove_buttons( $buttons ) {
    foreach ($buttons as $key => $value) {
        if(in_array($value, array('undo','redo','wp_help'))) {
            unset($buttons[$key]);
        }
    }
    return $buttons;
}
add_filter( 'mce_buttons_2', 'panther_remove_buttons' );


// Add new styles to the TinyMCE "formats" menu dropdown
function panther_styles_dropdown( $settings ) {

    // Create array of new styles
    $new_styles = array(
        array(
            'title'     => __('Header 1 style','panther'),
            'inline'    => 'span',
            'classes'   => 'h1'
        ),
        array(
            'title'     => __('Header 2 style','panther'),
            'inline'    => 'span',
            'classes'   => 'h2'
        ),
        array(
            'title'     => __('Header 3 style','panther'),
            'inline'    => 'span',
            'classes'   => 'h3'
        ),
        array(
            'title'     => __('Header 4 style','panther'),
            'inline'    => 'span',
            'classes'   => 'h4'
        ),
        array(
            'title'     => __('Header 5 style','panther'),
            'inline'    => 'span',
            'classes'   => 'h5'
        ),
        array(
            'title'     => __('Header 6 style','panther'),
            'inline'    => 'span',
            'classes'   => 'h6'
        ),
        array(
            'title'     => __('Header underline','panther'),
            'inline'    => 'span',
            'classes'   => 'underline'
        ),
        array(
            'title'     => __('Uppercase Text','panther'),
            'inline'  => 'span',
            'classes'   => 'uppercase'
        ),
        array(
            'title'     => __('White Text','panther'),
            'inline'  => 'span',
            'classes'   => 'white-text'
        ),
        array(
            'title'     => __('Grey Text','panther'),
            'inline'  => 'span',
            'classes'   => 'grey-text'
        ),
        array(
            'title'     => __('Black Text','panther'),
            'inline'  => 'span',
            'classes'   => 'black-text'
        ),
        array(
            'title'     => __('Teal Text','panther'),
            'inline'  => 'span',
            'classes'   => 'teal-text'
        ),
        array(
            'title'     => __('Pink Text','panther'),
            'inline'  => 'span',
            'classes'   => 'pink-text'
        ),
        array(
            'title'     => __('Blue Text','panther'),
            'inline'  => 'span',
            'classes'   => 'blue-text'
        ),
        array(
            'title'     => __('Dark Blue Text','panther'),
            'inline'  => 'span',
            'classes'   => 'dark-blue-text'
        ),
        array(
            'title'     => __('Bold Text','panther'),
            'inline'  => 'strong',
            'classes'   => ''
        ),
        array(
            'title'     => __('Thin Text','panther'),
            'inline'  => 'span',
            'classes'   => 'light-text'
        ),
        array(
            'title'     => __('Teal Button','panther'),
            'inline'  => 'a',
            'classes'   => 'btn btn-primary btn-lg'
        ),
        array(
            'title'     => __('Large Teal Button','panther'),
            'inline'  => 'a',
            'classes'   => 'btn btn-primary btn-xl'
        ),
        array(
            'title'     => __('Teal Outline Button','panther'),
            'inline'  => 'a',
            'classes'   => 'btn btn-secondary btn-lg'
        ),
        array(
            'title'     => __('Large Teal Outline Button','panther'),
            'inline'  => 'a',
            'classes'   => 'btn btn-secondary btn-xl'
        ),
        array(
            'title'     => __('Pink Button','panther'),
            'inline'  => 'a',
            'classes'   => 'btn btn-lg btn-pink'
        ),
        array(
            'title'     => __('Large Pink Button','panther'),
            'inline'  => 'a',
            'classes'   => 'btn btn-xl btn-pink'
        ),
    );

    // Merge old & new styles
    $settings['style_formats_merge'] = false;

    // Add new styles
    $settings['style_formats'] = json_encode( $new_styles );

    // Return New Settings
    return $settings;

}
add_filter( 'tiny_mce_before_init', 'panther_styles_dropdown' );

/**
 * Apply theme's stylesheet to the visual editor.
 *
 * @uses add_editor_style() Links a stylesheet to visual editor
 * @uses get_stylesheet_uri() Returns URI of theme stylesheet
 */
function panther_add_editor_styles() {
    add_editor_style( get_stylesheet_directory_uri().'/library/less/style.css' );
    add_editor_style( get_stylesheet_directory_uri().'/library/css/editor-style.css' );
}
add_action( 'admin_init', 'panther_add_editor_styles' );


/**
 * Disable the emoji's
 */
function disable_emojis() {
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' );	
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );	
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
	add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
}
add_action( 'init', 'disable_emojis' );

/**
 * Filter function used to remove the tinymce emoji plugin.
 * 
 * @param    array  $plugins  
 * @return   array             Difference betwen the two arrays
 */
function disable_emojis_tinymce( $plugins ) {
	if ( is_array( $plugins ) ) {
		return array_diff( $plugins, array( 'wpemoji' ) );
	} else {
		return array();
	}
}