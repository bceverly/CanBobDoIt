<?php
	// Variables
	$db_host = 'localhost';
	$db_user = 'webuser';
	$db_pass = 'web123';
	$db_name = 'webdb';

	$user_id   = $_POST['user_id'];
	$user_pass = $_POST['user_pass'];    

	// DB
	$connect = mysql_connect( $db_host, $db_user, $db_pass ) or die( mysql_error() );
	$connection = $connect;

	mysql_select_db( $db_name, $connect ) or die( mysql_error() );

	// See if the user is in the database
	$query = sprintf("SELECT COUNT (*) from user_access where lower(user_id) = lower('%s') and user_pass = '%s'",
					mysql_real_escape_string($user_id),
					mysql_real_escape_string($user_pass));

	$num = mysql_query($query);
	
	echo "query is " + $query;
?>