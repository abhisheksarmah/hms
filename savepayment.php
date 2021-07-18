<?php
session_start();
include "database.php";

if (isset($_POST["submit"])) {
	$reservationId = $_POST["reservationId"];
	$sql = "UPDATE `reservation` SET `acnf`= 1 WHERE `Rev_id` = '{$reservationId}'";
	$result = mysqli_query($conn, $sql);
	if ($result) {
		header("location:paysuccess.php?reservationId=" . $reservationId);
	} else {
		echo mysqli_error($con);
	}
}
