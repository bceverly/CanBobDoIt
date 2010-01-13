<?php
	require('db.php');
	
	function doLogin($user_id, $user_pass) {
		$connect = getDatabaseConnection();
		
		// See if the user is in the database
		$query = sprintf("SELECT * from user_access where lower(user_id) = lower('%s') and user_pass = '%s'",
						mysql_real_escape_string($user_id),
						mysql_real_escape_string($user_pass));

		$result = mysql_query($query);
		$num = mysql_num_rows($result);

		if ($num > 0) {
			// Generate a GUID
			$result = mysql_query("select uuid() as unique_id");
			$retVal = mysql_result($result, 0, "unique_id");
			mysql_query("update user_access set user_session_uuid='" . $retVal . "'");
		} else {
			$retVal = null;
		}

		closeDatabaseConnection($connect);
		return $retVal;
	}
?>