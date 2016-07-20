<?php

/* Welcome to Builder :)
This is the file where most of the
builder functions & features reside. These
functions help integrate some Bootstrap features
into WordPress.  If you have
any custom functions, it's best to put them
in the functions.php file.

Developed by: Brad Williams
URL: http://bragthemes.com
*/

/* 
Lets get started!!!!
*/


/**
 *  Display Bootstrap numbered pagination code.
 *
 * The defaults for overwriting are:
 * 'page' - Default is null (int). The current page. This function will
 *      automatically determine the value.
 * 'pages' - Default is null (int). The total number of pages. This function will
 *      automatically determine the value.
 * 'range' - Default is 3 (int). The number of page links to show before and after
 *      the current page.
 * 'gap' - Default is 3 (int). The minimum number of pages before a gap is 
 *      replaced with ellipses (...).
 * 'anchor' - Default is 1 (int). The number of links to always show at begining
 *      and end of pagination
 * 'before' - Default is '<ul class="pagination">' (string). The html or text 
 *      to add before the pagination links.
 * 'after' - Default is '</ul>' (string). The html or text to add after the
 *      pagination links.
 * 'next_page' - Default is '__('&raquo;')' (string). The text to use for the 
 *      next page link.
 * 'previous_page' - Default is '__('&laquo')' (string). The text to use for the 
 *      previous page link.
 * 'echo' - Default is 1 (int). To return the code instead of echo'ing, set this
 *      to 0 (zero).
 *
 */

function builder_numbered_pages($args = null) {
    $defaults = array(
        'page' => null, 
        'pages' => null, 
        'range' => 3, 
        'gap' => 3, 
        'anchor' => 1,
        'before' => '<ul class="pagination">', 
        'after' => '</ul>',
        'nextpage' => __('&raquo;'), 
        'previouspage' => __('&laquo'),
        'echo' => 1
    );

    $r = wp_parse_args($args, $defaults);
    extract($r, EXTR_SKIP);

    if (!$page && !$pages) {
        global $wp_query;

        $page = get_query_var('paged');
        $page = !empty($page) ? intval($page) : 1;

        $posts_per_page = intval(get_query_var('posts_per_page'));
        $pages = intval(ceil($wp_query->found_posts / $posts_per_page));
    }
    
    $output = "";
    if ($pages > 1) {   
        $output .= "$before";
        $ellipsis = "<li>...</li>";

        if ($page > 1 && !empty($previouspage)) {
            $output .= "<li><a href='" . get_pagenum_link($page - 1) . "'>$previouspage</a></li>";
        }
        
        $min_links = $range * 2 + 1;
        $block_min = min($page - $range, $pages - $min_links);
        $block_high = max($page + $range, $min_links);
        $left_gap = (($block_min - $anchor - $gap) > 0) ? true : false;
        $right_gap = (($block_high + $anchor + $gap) < $pages) ? true : false;

        if ($left_gap && !$right_gap) {
            $output .= sprintf('%s%s%s', 
                builder_numbered_pages_loop(1, $anchor), 
                $ellipsis, 
                builder_numbered_pages_loop($block_min, $pages, $page)
            );
        }
        else if ($left_gap && $right_gap) {
            $output .= sprintf('%s%s%s%s%s', 
                builder_numbered_pages_loop(1, $anchor), 
                $ellipsis, 
                builder_numbered_pages_loop($block_min, $block_high, $page), 
                $ellipsis, 
                builder_numbered_pages_loop(($pages - $anchor + 1), $pages)
            );
        }
        else if ($right_gap && !$left_gap) {
            $output .= sprintf('%s%s%s', 
                builder_numbered_pages_loop(1, $block_high, $page),
                $ellipsis,
                builder_numbered_pages_loop(($pages - $anchor + 1), $pages)
            );
        }
        else {
            $output .= builder_numbered_pages_loop(1, $pages, $page);
        }

        if ($page < $pages && !empty($nextpage)) {
            $output .= "<li><a href='" . get_pagenum_link($page + 1) . "'>$nextpage</a></li>";
        }

        $output .= $after;
    }

    if ($echo) {
        echo $output;
    }

    return $output;
}

/**
 * Helper function for pagination which builds the page links.
 *
 */

function builder_numbered_pages_loop($start, $max, $page = 0) {
    $output = "";
    for ($i = $start; $i <= $max; $i++) {
        $output .= ($page === intval($i)) 
            ? "<li><span class='emm-page emm-current'>$i</span></li>" 
            : "<li><a href='" . get_pagenum_link($i) . "' class='emm-page'>$i</a></li>";
    }
    return $output;
}



/**
 * Bootstrap Breadcrumb Lists
 * Allows visitors to quickly navigate back to a previous section or the root page.
 *
 */
function builder_breadcrumb_lists() {

    $chevron = '<span class="divider">/</span>';
    $name = __('Home','panthertheme'); //text for the 'Home' link
    $currentBefore = '<li class="active">';
    $currentAfter = '</li>';

    echo '<ul class="breadcrumb">';

    global $post;
    $home = home_url();
    echo '<li><a href="' . $home . '">' . $name . '</a></li>';

    if (is_category()) {
        global $wp_query;
        $cat_obj = $wp_query->get_queried_object();
        $thisCat = $cat_obj->term_id;
        $thisCat = get_category($thisCat);
        $parentCat = get_category($thisCat->parent);
        if ($thisCat->parent != 0)
            echo(get_category_parents($parentCat, TRUE, ''));
        echo $currentBefore . 'Archive by category &#39;';
        single_cat_title();
        echo '&#39;' . $currentAfter;
    } elseif (is_day()) {
        echo '<li><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a>' . $chevron . '</li>  ';
        echo '<li><a href="' . get_month_link(get_the_time('Y'), get_the_time('m')) . '">' . get_the_time('F') . '</a></li> ';
        echo $currentBefore . get_the_time('d') . $currentAfter;
    } elseif (is_month()) {
        echo '<li><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a></li> ';
        echo $currentBefore . get_the_time('F') . $currentAfter;
    } elseif (is_year()) {
        echo $currentBefore . get_the_time('Y') . $currentAfter;
    } elseif (is_single()) {
        $pid = $post->ID;
        $pdata = get_the_category($pid);
        $adata = get_post($pid);
        if(!empty($pdata)){
            echo '<li>' .get_category_parents($pdata[0]->cat_ID, TRUE, ' '). '</li> ';
            echo $currentBefore;
        }
        echo $adata->post_title;
        echo $currentAfter;
    } elseif (is_page() && !$post->post_parent) {
        echo $currentBefore;
        the_title();
        echo $currentAfter;
    } elseif (is_page() && $post->post_parent) {
        $parent_id = $post->post_parent;
        $breadcrumb_lists = array();
        while ($parent_id) {
            $page = get_page($parent_id);
            $breadcrumb_lists[] = '<li><a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a></li>';
            $parent_id = $page->post_parent;
        }
        $breadcrumb_lists = array_reverse($breadcrumb_lists);
        foreach ($breadcrumb_lists as $crumb)
            echo $crumb . ' ' . $chevron . ' ';
        echo $currentBefore;
        the_title();
        echo $currentAfter;
    } elseif (is_search()) {
        echo $currentBefore . __('Search results for &#39;','panthertheme') . get_search_query() . __('&#39;','panthertheme') . $currentAfter;
    } elseif (is_tag()) {
        echo $currentBefore . __('Posts tagged &#39;','panthertheme');
        single_tag_title();
        echo '&#39;' . $currentAfter;
    } elseif (is_author()) {
        global $author;
        $userdata = get_userdata($author);
        echo $currentBefore . __('Articles posted by ','panthertheme') . $userdata->display_name . $currentAfter;
    } elseif (is_404()) {
        echo $currentBefore . __('Error 404','panthertheme') . $currentAfter;
    }

    if (get_query_var('paged')) {
        if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author())
            echo ' (';
        echo __('Page','panthertheme') . ' ' . get_query_var('paged');
        if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author())
            echo ')';
    }

    echo '</ul>';
}


/**
 * Bootstrap Tags
 * make tags into a bootstrap button
 *
 */
function add_class_the_tags($html){
    $postid = get_the_ID();
    $html = str_replace('<a','<a class="btn btn-xs btn-primary"',$html);
    return $html;
}
add_filter('the_tags','add_class_the_tags',10,1);


/**
 * Custom Read More Button
 * Makes the read more link into a Bootstrap button
*/
function my_more_link( $more_link, $more_link_text ) {
            
    return str_replace( $more_link_text, '<p><a href="' . get_permalink() . '" class="readmore btn btn-primary ">' . __( 'Read More', 'panthertheme' ) . ' </a> </p>', $more_link );
}

add_filter( 'the_content_more_link', 'my_more_link', 10, 2 );

/*
* Adds extra author profile fields
 */

    add_filter('user_contactmethods', 'my_user_contactmethods');
             
    function my_user_contactmethods($user_contactmethods){

      $user_contactmethods['twitter'] = 'Twitter URL';
      $user_contactmethods['facebook'] = 'Facebook URL';

      // Remove old fields
        //unset($user_contactmethods['aim']);

      return $user_contactmethods;
}