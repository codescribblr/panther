<?php
/*
==========================================================================
Company: panther
Authors: Jonathan Wadsworth
File: functions.php
URL: http://codescribblr.com/

This is where you can drop your custom functions or
just edit things like thumbnail sizes, header images,
sidebars, comments, ect.
==========================================================================
*/

define('THEME_VERSION', '1.0.67');

// //Compile LESS into library/css/style.css using LESSC PHP Compiler  http://leafo.net/lessphp/ AND https://github.com/leafo/lessphp
require_once('library/less/lessc.inc.php');
$less = new lessc;
$less->checkedCompile(get_stylesheet_directory().'/library/less/style.less', get_stylesheet_directory().'/library/less/style.css');
$less->checkedCompile(get_stylesheet_directory().'/library/less/login.less', get_stylesheet_directory().'/library/less/login.css');

/************* INCLUDE NEEDED FILES ***************/

// library/Util.class.php  (basic utility functions for php)
require_once( 'library/Util.class.php' ); 

// library/navbar.php  (custom walker menu class for the Bootstrap menu)
require_once( 'library/navbar.php' ); // if you remove this the top navigation will break

/* library/builder.php (custom functions to add Bootstrap components and features)
	- numbered pagination
	- breadcrumbs
	- change tags to Bootstrap buttons
	- make read more link into Bootstrap button
	- add custom author fields to User profile page
*/
require_once( 'library/builder.php' ); // if you remove this a lot of things will break

/*
library/panther.php
	- head cleanup (remove rsd, uri links, junk css, ect)
	- enqueueing scripts & styles
	- theme support functions
	- custom menu output & fallbacks
	- related post function
	- page-navi function
	- removing <p> from around images
	- customizing the post excerpt
	- custom google+ integration
	- adding custom fields to user profiles
*/
require_once( 'library/panther.php' ); // if you remove this, panther will break

/*
includes/site-options.php
*/ 
require_once( 'includes/site-options.php' ); // if you remove this, site options section will be removed

/*
library/custom-post-type.php
	- an example custom post type
	- example custom taxonomy (like categories)
	- example custom taxonomy (like tags)
*/
require_once( 'library/custom-post-type.php' ); // you can disable this if you like

/*
library/admin.php
	- removing some default WordPress dashboard widgets
	- an example custom dashboard widget
	- adding custom login css
	- changing text in footer of admin
*/
require_once( 'library/admin.php' ); // this comes turned off by default

/*
5. library/video-functions.php
	- adding functions for videos
*/
require_once( 'library/video-functions.php' );

/*
library/image-functions.php
	- adding functions for image manipulation
*/
require_once( 'library/image-functions.php' );

/*
library/shortcodes.php
	- adding simple shortcodes to the theme
*/
require_once( 'library/shortcodes.php');

/*
library/ajax-functions.php
	- adding ajax functions to hook into for front-end ajax
*/
require_once( 'library/ajax-functions.php');

/************* ACTIVE SIDEBARS ********************/

// Sidebars & Widgetizes Areas
function panther_register_sidebars() {
	register_sidebar(array(
		'id' => 'sidebar1',
		'name' => __( 'Sidebar 1', 'panthertheme' ),
		'description' => __( 'The first (primary) sidebar.', 'panthertheme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

} // don't remove this bracket!

/************* COMMENT LAYOUT *********************/

// Comment Layout
function panther_comments( $comment, $args, $depth ) {
   $GLOBALS['comment'] = $comment; ?>
	<li <?php comment_class(); ?>>
		<article id="comment-<?php comment_ID(); ?>" class="clearfix">
			<header class="comment-author vcard">
				<?php
				/*
					this is the new responsive optimized comment image. It used the new HTML5 data-attribute to display comment gravatars on larger screens only. What this means is that on larger posts, mobile sites don't have a ton of requests for comment images. This makes load time incredibly fast! If you'd like to change it back, just replace it with the regular wordpress gravatar call:
					echo get_avatar($comment,$size='32',$default='<path_to_url>' );
				*/
				?>
				<!-- custom gravatar call -->
				<?php
					// create variable
					$bgauthemail = get_comment_author_email();
				?>
				<img data-gravatar="http://www.gravatar.com/avatar/<?php echo md5( $bgauthemail ); ?>?s=32" class="load-gravatar avatar avatar-48 photo" height="32" width="32" src="<?php echo get_template_directory_uri(); ?>/library/images/nothing.gif" />
				<!-- end custom gravatar call -->
				<?php printf(__( '<cite class="fn">%s</cite>', 'panthertheme' ), get_comment_author_link()) ?>
				<time datetime="<?php echo comment_time('Y-m-j'); ?>"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php comment_time(__( 'F jS, Y', 'panthertheme' )); ?> </a></time>
				<?php edit_comment_link(__( '(Edit)', 'panthertheme' ),'  ','') ?>
			</header>
			<?php if ($comment->comment_approved == '0') : ?>
				<div class="alert alert-info">
					<p><?php _e( 'Your comment is awaiting moderation.', 'panthertheme' ) ?></p>
				</div>
			<?php endif; ?>
			<section class="comment_content clearfix">
				<?php comment_text() ?>
			</section>
			<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
		</article>
	<!-- </li> is added by WordPress automatically -->
<?php
} // don't remove this bracket!

add_filter('frm_submit_button_class', 'large_submit_button');
function large_submit_button($class) {
	$class[] = 'btn-pink btn-lg';
	return $class;
}

add_filter('wp_generate_tag_cloud', 'xf_tag_cloud',10,3);
function xf_tag_cloud($tag_string){
   return preg_replace("/style='font-size:.+pt;'/", '', $tag_string);
}

function add_user_to_mailchimp_list($user, $listId, $beta = 0, $prerelease = 0){

	$data = [
		'email' => $user[0],
		'status' => 'subscribed',
		'firstname' => $user[1],
		// 'lastname' => $user[2]
	];

	$apiKey = '24ea7016a5b3229e8e858aeb2089a379-us12';

    $memberId = md5(strtolower($data['email']));
    $dataCenter = substr($apiKey,strpos($apiKey,'-')+1);
    $url = 'https://' . $dataCenter . '.api.mailchimp.com/3.0/lists/' . $listId . '/members/' . $memberId;

    $json = json_encode([
        'email_address' => $data['email'],
        'status'        => $data['status'], // "subscribed","unsubscribed","cleaned","pending"
        'merge_fields'  => [
            'FNAME'     => $data['firstname'],
            'LNAME'     => $data['lastname'],
            'BETA'		=> $beta,
            'PRERELEASE'=> $prerelease,
        ]
    ]);

    $ch = curl_init($url);

    curl_setopt($ch, CURLOPT_USERPWD, 'user:' . $apiKey);
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $json);                                                                                                                 

    $result = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    return $httpCode;
}

	
function user_mailchimp_list_setup( $user ) {

	$list_id = '4020d5d0a2'; // from mailchimp API playground
	
	$sent = add_user_to_mailchimp_list($user, $list_id, 0, 1);
    if($sent!='200') {
        wp_mail(get_option('admin_email'), 'Add to mailchimp failed', 'Adding user:'.$user->ID.' '.$user->first_name.' '.$user->last_name. "\r\n\r\nGot error: ". $sent);
    }

}