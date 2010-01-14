<!DOCTYPE html>
<html>
<head>
<?php
	require('ajax/api/security.php');
	writeHtmlHeader();
?>
</head>
<body>
<?php
	if (isValidCookie()) {
?>
hello
<?php
	}
?>
</body>
</html>