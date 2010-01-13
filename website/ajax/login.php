<?php
	require('api/user.php');
	
	// Variables
	$user_id   = $_GET['user_id'];
	$user_pass = $_GET['user_pass'];    

	$retVal['session_uuid'] = doLogin($user_id, $user_pass);
	
	echo json_encode($retVal);
?>