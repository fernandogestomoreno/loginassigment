<?php session_start(); ?><!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Untitled Document</title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>

<body>

<?php
	/* the sessions are used in the page to make it secret, you can not access to it by the url without being logged in */
	if (!empty($_SESSION['uid'])){
		echo 'Logged in as user '.$_SESSION['un'];
		echo '<br> HERE YOU CAN SEE THE SECRET INFO, THANK YOU FOR LOGGING IN';
		echo '<a class="logoutbutton" href="logout.php"> LOG OUT </a>';
	}
	/* one of the echoes is a log out button that takes you to the log in page again*/
	
	else {
		echo 'Not logged in...';
	}
	
?>
</body>
</html>
