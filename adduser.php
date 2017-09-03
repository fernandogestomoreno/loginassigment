<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Untitled Document</title>
</head>

<body>

<?php
if(!empty(filter_input(INPUT_POST, 'submit'))) {
	
	require_once('dbcon.php');
/* require_once('dbcon.php'); is necessary in order to conect correctly to the database*/
	
	$un = filter_input(INPUT_POST, 'un') 
		or die('Missing/illegal name parameter');
	$pw = filter_input(INPUT_POST, 'pw') 
		or die('Missing/illegal password parameter');
	// hash and salt the password
	$pw = password_hash($pw, PASSWORD_DEFAULT); 
	/* hashing the password is necessary to protect such.*/ 
	
//	echo 'Creating user: '.$un.' => '.$pw;
	
	$sql = 'INSERT INTO users (username, pwhash) VALUES (?,?)';
	$stmt = $link->prepare($sql);
	/* a prepare statement is ususally a featured usefull to execute the same database repeatedly*/
	$stmt->bind_param('ss', $un, $pw);
	/* bind_param put variables together in order to prepare a statement as a parameter.*/
	$stmt->execute();
	
	if ($stmt->affected_rows >0){
		header('location: loginwithuser.php');
		echo 'user ['.$un.'] is added :-)';
		echo("<script>location.href = 'http://fernandogestomoreno.dk/loginassigment/login.php';</script>");
	}
	/* The echo '<script>location.href> is used here to redirect you to the log in page*/
	else {
		echo 'Error adding user ['.$un.'] does this user already exist?';
	}
}
?>

<p>
<form action="<?= $_SERVER['../PHP_SELF'] ?>" method="post">
	<fieldset>
    	<legend>Add new user</legend>
    	<input name="un" type="text" placeholder="Username" required />
    	<input name="pw" type="password" placeholder="Password"  required/>
    	<input type="submit" name="submit" value="Create user" />
	</fieldset>
</form>
</p>



</body>
</html>