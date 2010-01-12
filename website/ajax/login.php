<?php
	// Variables
	$user_id   = $_GET['user_id'];
	$user_pass = $_GET['user_pass'];    
	$num = 0;
	
	// DB
	$connect = mysql_connect('127.0.0.1:3306', 'webuser', 'web123');
	if (!$connect) {
	    die('Could not connect: ' . mysql_error());
	}
	
	$db_selected = mysql_select_db( 'webdb', $connect );
	if (!$db_selected)
	{
		die('Could not select db: ' . mysql_error());
	}

	// See if the user is in the database
	$query = sprintf("SELECT * from user_access where lower(user_id) = lower('%s') and user_pass = '%s'",
					mysql_real_escape_string($user_id),
					mysql_real_escape_string($user_pass));

	$result = mysql_query($query) or die('boom!');
	$num = mysql_num_rows($result);
	
	mysql_close($connect);
	
	if ($num > 0)
	{
		$result['valid'] = true;
	} else {
		$result['valid'] = false;
	}
	
	echo json_encode($result);
?>