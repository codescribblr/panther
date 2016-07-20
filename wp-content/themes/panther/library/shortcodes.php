<?php

/*
Adds a padded separator between custom list items
Accepts any html element as a separator (defaults to bullet)
Useage:
	basic:	[separator]
	advanced: [separator separator="&pipe;"]
*/
add_shortcode('separator', 'panther_padded_separator');
function panther_padded_separator($atts) {
	extract(shortcode_atts(array(
		'separator' => '&bull;'
		), $atts));

	return '<span style="padding:0 20px">'.$separator.'</span>';
}

/*
Adds a standalone button using primary-btn styles
Useage:
	[button link="http://google.com" color="blue" new_window="yes"]Button Text[/button]
*/
add_shortcode('button', 'panther_standalone_button');
function panther_standalone_button($atts, $content) {
	extract(shortcode_atts(array(
		'link' => '#',
		'new_window' => 'no',
		'color' => 'blue'
		), $atts));
	$new_window = (strtolower($new_window) == 'false' || strtolower($new_window) == 'no' || $new_window == false) ? '_self' : '_blank';

	return '<a class="btn btn-lg btn-'.$color.'" target="'.$new_window.'" href="'.$link.'">'.$content.'</a>';
}

/*
Adds a simple iframe
Useage:
	[iframe src="http://google.com" width="800" height="600"]
*/
add_shortcode('iframe', 'iframe');
function iframe($atts) {
   extract(shortcode_atts(array(
      'src' => "",
      'width' => "800",
      'height' => "600"
   ), $atts));

   $iframe = '<iframe src="'.$src.'" width="'.$width.'" height="'.$height.'" scrolling="no" allowtransparency="yes" frameborder="0" ></iframe>';
   
   return $iframe;
}

/*
Adds the title of the current archive
Useage:
	[archive_title]
*/
add_shortcode('archive_title', 'panther_archive_title');
function panther_archive_title($atts, $content) {
	global $wp_query;
	if($wp_query->is_main_query()) {
		if($wp_query->is_tag()) {
			$title = $wp_query->get( 'tag' );
		} elseif($wp_query->is_category()) {
			$title = $wp_query->get( 'category_name' );
		} else {
			$title = 'Blog Archives';
		}
	} else {
		$title = 'Blog Archives';
	}
	return $title;
}


/*
Adds the title of the current archive
Useage:
	[external_referer]
*/
add_shortcode('external_referer', 'panther_external_referrer');
function panther_external_referrer($atts, $content) {
	return urlencode($_SERVER["HTTP_REFERER"]);
}