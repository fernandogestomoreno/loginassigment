<?php
/*$DB_HOST = 'localhost';
$DB_USER = 'root';
$DB_PASS = 'root';
$DB_NAME = 'mil';
// $DB_PORT = '8889';*/

$DB_HOST = 'localhost'; // server
$DB_USER = 'fernandogestomoreno_dk'; // database user
$DB_PASS = 'ujWdRNsH'; // database password
$DB_NAME = 'fernandogestomoreno_dk'; // database name */

$link = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
//$link = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME, $DB_PORT);
if ($link->connect_error) { 
   die('Connect Error ('.$link->connect_errno.') '.$link->connect_error);
}
$link->set_charset('utf8'); 
?>
