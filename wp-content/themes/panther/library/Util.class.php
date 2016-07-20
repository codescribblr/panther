<?php
class Util {
	function __construct(){

	}
	/*
	 * Usage Util::log('error', 'Check out this sweet error!');
	 *
	*/
	public static function log($action, $message="", $logfile=false) {
	    $logfile = ($logfile) ? $logfile : $_SERVER['DOCUMENT_ROOT'].'/logs/'.date("Y-m-d").'.log';
	    $new = file_exists($logfile) ? false : true;
	    if($handle = fopen($logfile, 'a')) { // append
	        $timestamp = strftime("%Y-%m-%d %H:%M:%S", time());
	        $content = "{$timestamp} | {$action}: {$message}\n";
	        fwrite($handle, $content);
	        fclose($handle);
	        if($new) { chmod($logfile, 0755); }
	    } else {
	        return false;
	    }
	}

	public static function pprint_r($var){
		echo "<pre>";
		print_r($var);
		echo "</pre>";
	}

	public static function file_get_contents_curl($url) {
	    $ch = curl_init();

	    curl_setopt($ch, CURLOPT_HEADER, 0);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	    curl_setopt($ch, CURLOPT_URL, $url);

	    $data = curl_exec($ch);
	    
	    // echo curl_getinfo($ch) . '<br/>';
	    // echo curl_errno($ch) . '<br/>';
	    // echo curl_error($ch) . '<br/>';
	    curl_close($ch);
	    return $data;
	}

	public static function my_array_unique($array, $keep_key_assoc = false) {
	    $duplicate_keys = array();
	    $tmp         = array();       

	    foreach ($array as $key=>$val) {
	        // convert objects to arrays, in_array() does not support objects
	        if (is_object($val))
	            $val = (array)$val;

	        if (!in_array($val, $tmp))
	            $tmp[] = $val;
	        else
	            $duplicate_keys[] = $key;
	    }

	    foreach ($duplicate_keys as $key)
	        unset($array[$key]);

	    return $keep_key_assoc ? $array : array_values($array);
	}

	public static function sortByDueDate($a, $b) {
	    return $b['Due_Date'] - $a['Due_Date'];
	}

	public static function sortByDistance($a, $b) {
	    return $a->distance - $b->distance;
	}

	public static function datetime_to_text($datetime="") {
		$unixdatetime = strtotime($datetime);
		return strftime("%B %d, %Y at %I:%M %p", $unixdatetime);
	}

	public static function base64_url_encode($input) {
		return strtr(base64_encode($input), '+/=', '-_,');
	}

	public static function base64_url_decode($input) {
		return base64_decode(strtr($input, '-_,', '+/='));
	}

	public static function dollars($number){
	    return ($number >= 0) ? "$".number_format($number, 2) : "<em class='red'>$".number_format($number, 2)."</em>";
	}

	public static function nodollars($money){
		return floatval(preg_replace('/[^\d\.]/', '', $money));
	}

	public static function format_tel_number($tel, $visual_format = false) {
		$linkFormat = '$1$2$3';
		$visualFormat = '$1-$2-$3';
		$telFormat = $linkFormat;
		if($visual_format) $telFormat = $visualFormat;

		return preg_replace('~.*(\d{3})[^\d]{0,7}(\d{3})[^\d]{0,7}(\d{4}).*~', $telFormat, $tel);
	}

	
	public static function clickable_phone_number($number){
		return '<a href="tel:+1'.preg_replace('~.*(\d{3})[^\d]*(\d{3})[^\d]*(\d{4}).*~', '($1) $2-$3', $number).'">'.$number.'</a>';
	}

	public static function bit_debug($setting = E_ALL) {
		error_reporting($setting);
		ini_set('display_errors',1);
	}

	public static function strip_zeros_from_date( $marked_string="" ) {
		// first remove the marked zeros
		$no_zeros = str_replace('*0', '', $marked_string);
		// then remove any remaining marks
		$cleaned_string = str_replace('*', '', $no_zeros);
		return $cleaned_string;
	}

	public static function redirect_to( $location = NULL ) {
		if ($location != NULL) {
			header("Location: {$location}");
			exit;
		}
	}

	public static function reload_cache($cache_file, $cache_data) {
		file_put_contents($cache_file, serialize($cache_data));
		return $cache_data;
	}

	public static function read_cache($cache_file) {
		return unserialize(file_get_contents($cache_file));
	}

	public static function check_cache($cache_file, $cache_lifetime=600) {
	  if (file_exists($cache_file)) {
	  	$modification_time = filemtime($cache_file);
	  	if (time() - $modification_time > $cache_lifetime) {
	  		return false;
	  	} else {
	  		$cache_data = self::read_cache($cache_file);
	  		return $cache_data;
	  	}
	  } else {
	  	$cache_data = self::reload_cache($cache_file, $cache_data);
	  }
	  return false;
	}

	public static function increase_memory($mem="256M"){
		ini_set('memory_limit', $mem);
	}

	public static function output_message() {
		if($_GET['message']):?>
		<div class="alert alert-<?php echo $_GET['message_type'];?> alert-dismissable">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<?php echo stripslashes(urldecode($_GET['message_text']));?>
		</div>
		<?php endif;
	}

	public static function hex2rgb($hex) {
		$hex = str_replace("#", "", $hex);

		if(strlen($hex) == 3) {
		$r = hexdec(substr($hex,0,1).substr($hex,0,1));
		$g = hexdec(substr($hex,1,1).substr($hex,1,1));
		$b = hexdec(substr($hex,2,1).substr($hex,2,1));
		} else {
		$r = hexdec(substr($hex,0,2));
		$g = hexdec(substr($hex,2,2));
		$b = hexdec(substr($hex,4,2));
		}
		$rgb = array($r, $g, $b);

		return implode(", ", $rgb);
	}


}