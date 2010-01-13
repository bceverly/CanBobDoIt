<?php
	function getDatabaseConnection() {
		$connect = mysql_connect('127.0.0.1:3306', 'webuser', 'web123');
		if (!$connect) {
		    die('Could not connect: ' . mysql_error());
		}

		$db_selected = mysql_select_db( 'webdb', $connect );
		if (!$db_selected)
		{
			die('Could not select db: ' . mysql_error());
		}
		
		return $connect;
	}
	
	function closeDatabaseConnection($connect) {
		mysql_close($connect);
	}
?>