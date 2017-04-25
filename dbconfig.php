<?php
/*
error_reporting(0);
$host = "localhost";
$user = "root";
$password = "";
$datbase = "dbtuts";
mysql_connect($host,$user,$password);
mysql_select_db($user_CRUD);
*/

/*Now, we define some constants, as this information will never change, and it is a string.*/
 define('DBHOST', 'localhost');
 define('DBUSER', 'UnivCalifornia');
 define('DBPASS', 'certification12345');
 define('DBNAME', 'Week_5_Homework');
 
 /*Here, we define some variables*/
 $conn = mysql_connect(DBHOST,DBUSER,DBPASS);
 $dbcon = mysql_select_db(DBNAME);
 
 /*Here, we set error messages in case the user has trouble logging into MySQL/*/
 if ( !$conn ) {
  die("Connection failed : " . mysql_error());
 }
 
 if ( !$dbcon ) {
  die("Database Connection failed : " . mysql_error());
 }
?>