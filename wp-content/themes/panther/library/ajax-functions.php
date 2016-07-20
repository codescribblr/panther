<?php

// add_action("wp_ajax_my_action", "my_function");
//add this only if you want the user to be able to peform the functions while logged out
// add_action("wp_ajax_nopriv_my_action", "my_function");
function my_panther_function() {

	if ( !wp_verify_nonce( $_REQUEST['nonce'], "update_notifications_nonce")) {
		exit("Hmm....Something must've gone wrong. Try that again.");
	}   

	//Do stuff

	if($update === false) {
		$result['type'] = "error";
	}
	else {
		$result['type'] = "success";
	}

	if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
		$result = json_encode($result);
		echo $result;
	} else {
		header("Location: ".$_SERVER["HTTP_REFERER"]);
	}

	die();

}

