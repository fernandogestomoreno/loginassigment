<?php session_start(); ?>
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
	/* with 'filter_inout' we make sure that the name and the password are valid parameters*/
	$un = filter_input(INPUT_POST, 'un') 
		or die('Missing/illegal name parameter');
	$pw = filter_input(INPUT_POST, 'pw') 
		or die('Missing/illegal password parameter');
	$sql = 'SELECT id, pwhash FROM users WHERE username=?';
	/* a prepare statement is ususally a featured usefull to execute the same database repeatedly*/
	$stmt = $link->prepare($sql);
	/* bind_param put variables together in order to prepare a statement as a parameter.*/
	$stmt->bind_param('s', $un);
	$stmt->execute();
	$stmt->bind_result($uid, $pwhash);
	while ($stmt->fetch()) {} /*fill result variables */
	
	/* 'pwhash' is the method that we use in order to protect the passwords. This creates an automatic code in the database that stands for the password chosen by the user*/
	
	if (password_verify($pw, $pwhash)){
		echo 'logged in as user '.$uid;
		$_SESSION['uid'] = $uid;
	    echo("<script>location.href = 'http://fernandogestomoreno.dk/loginassigment/secretinfo.php';</script>");
		
	/* when the log in works, the echo '<script>location.href is supposed to work as a link to the secret info page*/ 
		
		$_SESSION['un'] = $un;
	}
	else {
		echo 'illegal username/password combination';
	
	/* if the log in isn't correct, the echo is 'illegal username/password combination' */	
		
	}
}
?>

<p>
<form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
	<fieldset>
    	<legend>Login</legend>
   <!-- the imputs define where is the user able to upload data. In this case the relevant fields where the user name and the password -->
    	<input name="un" type="text" placeholder="Username" required />
    	<input name="pw" type="password" placeholder="Password"  required/>
    	<input type="submit" name="submit" value="Login" />
	</fieldset>
</form>
</p>

</body>
</html>