<?php
ini_set('display_errors', '1');
$servername = "192.168.10.109:3630"; //"mandovi.creativecapsule.local";
$username = "for_hackteam7";
$password = "hack123";
$dbname = "hackteam7";

// Create connection
$conn = mysql_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
} 

if (!mysql_select_db($dbname)) {
    echo "Unable to select " +	$dbname + ": " . mysql_error();
    exit;
}
?>
