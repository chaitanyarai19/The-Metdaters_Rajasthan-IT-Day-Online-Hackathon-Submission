<?php
define('DB_SERVER','localhost');
define('DB_USER','apnakira_mood704');
define('DB_PASS' ,'kirana@12345');
define('DB_NAME', 'apnakira_mood704');
$con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
// Check connection
if (mysqli_connect_errno())
{
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>