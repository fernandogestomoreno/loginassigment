<?php session_start(); ?><!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Untitled Document</title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>

<body>

<?php
	
	if (!empty($_SESSION['uid'])){
		echo 'Logged in as user '.$_SESSION['un'];
		echo '<br> HERE YOU CAN SEE THE SECRET INFO, THANK YOU FOR LOGGING IN';
		echo '<a class="logoutbutton" href="logout.php"> LOG OUT </a>';
	}
	else {
		echo 'Not logged in...';
	}
	
?>
</body>
</html>