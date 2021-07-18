<?php
include('Database.php');
session_start();

$sql = mysqli_query($conn, "SELECT * from rooms");

$result = mysqli_fetch_all($sql, MYSQLI_ASSOC);

exit(json_encode($result)); 