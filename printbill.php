<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<title>Print Bill</title>
	<link href="css/style.css" type="text/css" rel="stylesheet">
	<link href="css/w3.css" type="text/css" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="shortcut icon" type="image/x-png" href="favicon/icon.png">
	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Cute+Font" rel="stylesheet">
	<style>
		body {
			font-family: 'Montserrat', sans-serif;
		}
	</style>
</head>
<?php
include "connect.php";
$bid = $_GET["bid"];
$str = "SELECT A.*,B.* from orders as A,delivery as B where A.bid='$bid' and A.orderid=B.orderid";

$result = mysqli_query($con, $str);
$row = mysqli_fetch_array($result);
$name = $row["name"];
$email = $row["email"];
$address = $row["address"];
$city = $row["city"];
$state = $row["state"];
$pin = $row["pin"];
$phone = $row["phone"];
$amount = $row["amount"];
// $date = $row["date"];
$date = date("d-m-Y", strtotime($row['date']));
$oid = $row['orderid'];
?>

<body>
	<div class="container" style="max-width:1000px; margin-top:24px;">
		<div class="containercenter bottombar light-gray">
			<div class="container">

				<span class="p-4">
					<div class="bg-dark p-4">
						<h4 class="text-center text-warning font-italic">Food delivery Acknowledgement</h4><br>
						<h1 class="text-center text-primary">#FOOD STATION#</h1>
					</div>
				</span>
			</div>
		</div>
		<div class="container p-5">
			<div class="text-danger" style="padding-right:42px; float:right; line-height:2.0;">
				<strong>Booking Date:</strong> <?php echo $date; ?><br>
				<strong>Amount Paid:</strong> Rs. <?php echo $amount; ?>.00
			</div>
			<div class="left left-align" style="padding-left:32px; line-height:2.0;">
				<strong>Booking ID: </strong> <?php echo $bid; ?><br>
				<strong>Customer Name: </strong> <?php echo $name; ?><br>
				<strong>Email: </strong> <?php echo $email; ?><br>
				<strong>Address: </strong> <?php echo $address . ', ' . $city . ', ' . $pin . ', ' . $state; ?><br>
				<strong>Phone No: </strong><?php echo $phone; ?>
			</div>

		</div><br><br>
		<?php
		$total = 0;
		$sql = "Select A.*,B.* from orderitems as A,items as B where A.orderid='$oid' and A.itemid=B.itemid";
		$result = mysqli_query($con, $sql);
		while ($row = mysqli_fetch_assoc($result)) {
			$row['rate'] = $row['price'] * $row['qty'];
			echo '<div class="w3-container w3-center w3-border-bottom p-3" style="width:90%;padding:8px;">
								<div class="w3-left w3-center" style="width:25%">
									<img src="' . $row["image"] . '" style="width:50%;">
								</div>
								<div class="w3-left w3-center w3-small" style="padding-left:5px; width:25%;">
									<strong>Product Name</strong><br>
									<span style="text-align:left;">' . $row["name"] . '</span><br>
								</div>
								<div class="w3-left w3-center w3-small" style="padding-left:5px; width:25%;">
									<strong>Quantity</strong><br>
									<input type="text" class="w3-border-0" name="pqty" size="5" value="' . $row["qty"] . '">
								</div>
								<div class="w3-left w3-center w3-small" style="padding-left:5px; width:25%;">
									<strong>Amount</strong><br>
									<span style="text-align:left; color:Red;">Rs. ' . $row["rate"] . '</span>
								</div>
							</div>';
			$total = $total + $row["rate"];
		}
		echo '<div class="w3-container w3-center" style="padding-top:8px">
						<p class="w3-large w3-text-deep-orange"><strong>Total Amount: Rs. ' . $total . '</strong></p>
						</div>';
		?>
		<div class="container text-center">
			Thank you for choosing Food Station....................... <img src="images/smile.gif" style="width: 30px; height:30px;" alt="smile">
		</div>
	</div>

	<p class="text-center mt-3">
		<a href="#" onClick="window.print();" class="btn btn-outline-warning">Print Now <i class="fa fa-print" aria-hidden="true"></i></a>
		<a href="index.php" class="btn btn-outline-danger">Go Back <i class="fa fa-chevron-circle-left" aria-hidden="true"></i></a>
	</p>

</body>

</html>