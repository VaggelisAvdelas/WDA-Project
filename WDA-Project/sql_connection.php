<?php
$servername="localhost";
$username="wda-project";
$password="wda-project";
$dbname="wda-project";

//Create Connection
$conn = mysqli_connect($servername,$username,$password,$dbname);

//Check Connection
if (!$conn){
    die("Connection failed: ".mysqli_connect_error());
}
?>