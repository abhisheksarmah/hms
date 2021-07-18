<?php
session_start();
include "database.php";
if (isset($_POST["submit"])) {
	$oid = $_POST["orderid"];
	$cid = $_POST["cartid"];
	$phone = $_POST["phone"];
	$date = $_POST["date"];
	$amount = $_POST["amount"];
	$date = date("d-m-y");

	// $date1=date_create($cin);
	// $date2=date_create($cout);
	// $diff=date_diff($date1,$date2);
	// $days=intval($diff->format("%a"));

	$str = "insert into orders values(null,'$oid','$cid','$phone','$date','$amount','Pending')";
	$result = mysqli_query($con, $str);
	if ($result) {
		$sql = "Select last_insert_id()";
		$rec = mysqli_query($con, $sql);
		$row = mysqli_fetch_array($rec);
		$bid = $row[0];
		for ($i = 0; $i <= $days; $i++) {
			$bdate = date_format($date1, "d-m-y");
			for ($j = 0; $j < $nor; $j++) {
				mysqli_query($con, "insert into ordered values(null,'$oid','$date','$cid')");
			}
			date_add($date1, date_interval_create_from_date_string("1 days"));
		}
		header("location:payment.php?bid=" . $bid . "&amount=" . $amount . "&phone=" . $contact);
	} else {
		echo mysqli_error($con);
	}
}
