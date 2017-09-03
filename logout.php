<?php
session_start();
if(session_destroy())
	/* the function of this page is to end the session and to redirect you back to the log in*/
{
header("Location: login.php");
}
?>