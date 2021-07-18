<?php
error_reporting(0);
$servername = "localhost";
$Server_username = "root";
$password = "root";
$dbname = "hms";

$conn = new mysqli($servername,$Server_username,$password,$dbname);

if($conn->connect_error){
    die("con failed");
}
