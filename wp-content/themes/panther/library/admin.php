<?php
/*
This file handles the admin area and functions.
You can use this file to make changes to the
dashboard. Updates to this page are coming soon.
It's turned off by default, but you can call it
via the functions file.

Developed by: Jon Wadsworth
URL: http://codescribblr.com/

Special Thanks for code & inspiration to:
@jackmcconnell - http://www.voltronik.co.uk/
Digging into WP - http://digwp.com/2010/10/customize-wordpress-dashboard/

*/

/************* DASHBOARD WIDGETS *****************/

// disable default dashboard widgets
function disable_default_dashboard_widgets() {
	// remove_meta_box( 'dashboard_right_now', 'dashboard', 'core' );    // Right Now Widget
	remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'core' ); // Comments Widget
	remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'core' );  // Incoming Links Widget
	remove_meta_box( 'dashboard_plugins', 'dashboard', 'core' );         // Plugins Widget

	remove_meta_box('dashboard_quick_press', 'dashboard', 'core' );  // Quick Press Widget
	remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'core' );   // Recent Drafts Widget
	remove_meta_box( 'dashboard_primary', 'dashboard', 'core' );         //
	remove_meta_box( 'dashboard_secondary', 'dashboard', 'core' );       //

	// removing plugin dashboard boxes
	remove_meta_box( 'yoast_db_widget', 'dashboard', 'normal' );         // Yoast's SEO Plugin Widget

}

/*
Now let's talk about adding your own custom Dashboard widget.
Sometimes you want to show clients feeds relative to their
site's content. For example, the NBA.com feed for a sports
site.

For more information on creating Dashboard Widgets, view:
http://digwp.com/2010/10/customize-wordpress-dashboard/
*/

// calling all custom dashboard widgets
function panther_custom_dashboard_widgets() {
	/*
	Be sure to drop any other created Dashboard Widgets
	in this function and they will all load.
	*/
}


// removing the dashboard widgets
add_action( 'admin_menu', 'disable_default_dashboard_widgets' );
// adding any custom widgets
add_action( 'wp_dashboard_setup', 'panther_custom_dashboard_widgets' );


/************* CUSTOM LOGIN PAGE *****************/

// calling your own login css so you can style it

//Updated to proper 'enqueue' method
//http://codex.wordpress.org/Plugin_API/Action_Reference/login_enqueue_scripts
function panther_login_css() {
	//wp_enqueue_style( 'panther_login_css', get_template_directory_uri() . '/library/less/login.css', false );
	//wp_enqueue_script( 'panther_login_js', get_template_directory_uri() . '/library/js/login.js', array('jquery') );
}

// changing the logo link from wordpress.org to your site
function panther_login_url() {  return home_url(); }

// changing the alt text on the logo to show your site name
function panther_login_title() { return get_option( 'blogname' ); }

// calling it only on the login page
add_action( 'login_enqueue_scripts', 'panther_login_css', 10 );
add_filter( 'login_headerurl', 'panther_login_url' );
add_filter( 'login_headertitle', 'panther_login_title' );


/************* CUSTOMIZE ADMIN *******************/

/*
I don't really recommend editing the admin too much
as things may get funky if WordPress updates. Here
are a few funtions which you can choose to use if
you like.
*/

// Custom Backend Footer
function panther_custom_admin_footer() {
	_e( '<span id="footer-thankyou">Developed by <a href="http://panther.com" target="_blank">panther</a></span>.', 'panthertheme' );
}

// adding it to the admin area
add_filter( 'admin_footer_text', 'panther_custom_admin_footer' );

