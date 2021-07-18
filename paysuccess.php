<?php
session_start();
include "database.php";
$reservationId = $_GET["reservationId"];
// $phone = '91' . $_GET["phone"];

// Account details
// $apiKey = urlencode('Nzg0NDcyMzA3NzM4NDk2YjZiNDEzNDQ5NGU3OTY2NjY=');
// // Message details
// $numbers = array(918486941128, 91970665354);
// $sender = urlencode('TXTLCL');
// $message = rawurlencode('this is a test message');

// $numbers = implode(',', $numbers);

// // Prepare data for POST request
// $data = array('apikey' => $apiKey, 'numbers' => $numbers, 'sender' => $sender, 'message' => $message);
// // Send the POST request with cURL
// $ch = curl_init('https://api.textlocal.in/send/');
// curl_setopt($ch, CURLOPT_POST, true);
// curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// $response = curl_exec($ch);
// curl_close($ch);
// // Process your response here
// echo $response;

// Authorisation details.
// $username = "kakulborah21@gmail.com";
// $hash = "e90dfb175c65433c6bbcc5075e6266adc3bf98127cb7b05ba86edb731565b2f7";

// // Config variables. Consult http://api.textlocal.in/docs for more info.
// $test = "0";

// // Data for text message. This is the text message data.
// $sender = "TXTLCL"; // This is who the message appears to be from.
// $numbers = $phone; // A single number or a comma-seperated list of numbers
// $message = "Thank you for booking a hotel with Assam Hotel. Your booking id is " . $bid . ". Somebody from the hotel may contact you for verification...";
// // 612 chars or less
// // A single number or a comma-seperated list of numbers
// $message = urlencode($message);
// $data = "username=" . $username . "&hash=" . $hash . "&message=" . $message . "&sender=" . $sender . "&numbers=" . $numbers . "&test=" . $test;
// $ch = curl_init('http://api.textlocal.in/send/?');
// curl_setopt($ch, CURLOPT_POST, true);
// curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// $result = curl_exec($ch); // This is the result from the API
// curl_close($ch);

// $result = mysqli_query($con, "SELECT * from reservation where bid = '$bid'");
// $orderExist = mysqli_num_rows($result);

// if ($orderExist > 0) {
// 	$orderRow = mysqli_fetch_assoc($result);
// 	$cartid = $orderRow['cartid'];
// 	mysqli_query($con, "UPDATE cart set status = 'bought' where cartid='$cartid'");
// }

// $cartid = rand(000000, 999999);
// $_SESSION["cartid"] = $cartid;
?>

<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<title>Payment Successfull</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/style.css">
	<link rel="shortcut icon" type="image/x-png" href="favicon/icon.png">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
	<style>
		body,
		h1,
		h2,
		h3,
		h4,
		h5,
		h6 {
			font-family: "Raleway", sans-serif
		}
	</style>
</head>

<body>
	<table width="500" height="374" border="0" align="center" cellpadding="0" cellspacing="2">
		<tr>
			<td align="center"><img src="images/Payment+successful.png" alt="" /></td>
		</tr>
	</table>
	<table width="500" border="0" align="center" cellpadding="0" cellspacing="2">
		<tr>
			<td align="center"><img src="images/payment_loading.gif" width="300" alt="" /></td>
		</tr>
		<tr>
			<td align="center">Redirecting you to the main site ...</td>
		</tr>
	</table>
</body>

</html>
<?php
header("refresh:5;url=printbill.php?reservationId=" . $reservationId);
?>