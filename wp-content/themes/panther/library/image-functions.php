<?php
//Thumbnail functions using timthumb (sized.php)

// http://www.binarymoon.co.uk/2012/02/complete-timthumb-parameters-guide/
function get_thumb_src($src, $width="100", $height="100", $quality="85", $alignment="", $zoomcrop="", $filters="", $sharpen="", $canvascolor="", $transparency=""){
	
	if($src=="") return FALSE;

	$src 			= "src=".$src;
	$width			= "&w=".$width;
	$height			= "&h=".$height;
	$quality		= "&q=".$quality;
	$alignment		= (!empty($alignment)) ? "&a=".$alignment : "";
	$zoomcrop		= (!empty($zoomcrop)) ? "&zc=".$zoomcrop : "";
	$filters		= (!empty($filters)) ? "&f=".$filters : "";
	$sharpen		= (!empty($sharpen)) ? "&s=".$sharpen : "";
	$canvascolor	= (!empty($canvascolor)) ? "&cc=".$canvascolor : "";
	$transparency	= (!empty($transparency)) ? "&ct=".$transparency : "";

	return get_template_directory_uri()."/sized.php?".$src.$width.$height.$quality.$alignment.$zoomcrop.$filters.$sharpen.$canvascolor.$transparency;
}
function the_thumb_src($src, $width="100", $height="100", $quality="85", $alignment="", $zoomcrop="", $filters="", $sharpen="", $canvascolor="", $transparency=""){
	if($thumb = get_thumb_src($src, $width, $height, $quality, $alignment, $zoomcrop, $filters, $sharpen, $canvascolor, $transparency)){
		echo $thumb;
	}
}
function get_thumb($src, $alt="", $classes="", $id=""){
	return "<img class='".$classes."' id='".$id."' src='".$src."' alt='".$alt."' />";
}
function the_thumb($src, $alt="", $classes="", $id=""){
	echo get_thumb($src, $alt, $classes, $id);
}
function get_main_thumb($post_id, $alt="", $classes="", $id="", $width="", $height=""){
	$src = wp_get_attachment_image_src( get_post_thumbnail_id($post_id), "full", false);
	if($src[0]=="") return FALSE;
	$width = ($width!="") ? $width : "555";
	$height = ($height!="") ? $height : "380";
    $src = get_thumb_src($src[0], $width, $height);
	return "<img class='".$classes."' id='".$id."' src='".$src."' alt='".$alt."' />";
}
function the_main_thumb($post_id, $alt="", $classes="", $id="", $width="", $height=""){
	if($thumb = get_main_thumb($post_id, $alt, $classes, $id, $width, $height)){
		echo $thumb;
	}
}

function get_image($imgbg = false, $lzy = false, $bg = false, $addClass = '') {
    if($imgbg) {
        $lazyString = '';
        $bgString = '';
        $classString = '';
        if($lzy) $lazyString = "lazy";
        if($bg) $bgString = "data-type='background'";
        if($addClass !== '') $classString = $addClass;
        if($lzy) {
            return "<img class='" . $lazyString . ' ' . $classString . "' src='" . get_bloginfo('stylesheet_directory') . "/images/lazy.gif' alt='" . $imgbg['alt'] . "' border='0' data-src='" . $imgbg['url'] . "' " . $bgString . " />";
        } else {
            return "<img class='" . $lazyString . ' ' . $classString . "' src='" . $imgbg['url'] . "' alt='" . $imgbg['alt'] . "' border='0' data-src='' " . $bgString . " />";
        }
    }
}