<?php
define('DB_SERVER','localhost');
define('DB_USER','u489595468_kissania');
define('DB_PASS' ,'Kissania123');
define('DB_NAME', 'u489595468_kissania');
$con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
// Check connection
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>