<?php
session_start();
include "database.php";
$reservationId = $_GET['rev_id'];
$totalPrice = $_GET['room_total'];
?>
<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<title>FoodStation</title>
	<!-- <link href="css/w3.css" type="text/css" rel="stylesheet"> -->
	<link rel="shortcut icon" type="image/x-png" href="favicon/assamhotel.png">
	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Cute+Font" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="js/jquery-3.2.1.min.js" type="text/javascript"></script>
	<script src="js/jquery.maskedinput.js" type="text/javascript"></script>
	<style>
		body {
			/* font-family: "Lucida Console", "Courier New", monospace; */
			/*background-color:#DD4544;*/
		}

		.title {
			background-image: url(images/tbg.jpg);
			background-repeat: repeat-x;
		}

		label.error {
			color: #F00;
			font-size: x-small;
		}

		.menu {
			background-image: url(images/mbg.jpg);
			background-repeat: repeat-x;
		}

		.cute {
			font-family: 'Cute Font', cursive;
		}

		.sbg {
			background-image: url(images/sg.jpg);
			background-position: left;
			background-repeat: no-repeat;
			padding-left: 55px;
		}

		.r1 {
			border-top-left-radius: 20px;
			border-bottom-left-radius: 20px;
		}

		.r2 {
			border-top-right-radius: 20px;
			border-bottom-right-radius: 20px;
		}
	</style>
	<script type="text/javascript">
		function myFunction() {
			var x = document.getElementById("vmenu");
			if (x.className.indexOf("show") == -1) {
				x.className += " show";
			} else {
				x.className = x.className.replace(" show", "");
			}
		}

		$(document).ready(function() {
			jQuery(function($) {
				//$("#regno").mask("aa-99-a-9999"); ,{placeholder:" "});
				$("#cardno").mask("9999-9999-9999-9999", {
					placeholder: "_"
				});
				$("#valid").mask("99/99", {
					placeholder: "_"
				});
				$("#cvv").mask("999", {
					placeholder: "_"
				});
			});
		});
	</script>
</head>

<body class="indigo">
	<div class="container" id="welcome">
		<div class="card-4 " style="max-width:600px; margin:24px auto;">
			<div class="container rounded-top bg-primary p-4">
				<span class="text-light">Powered By</span><br>
				<img src="images/instamojo.png" style="width:60%; margin-left:100px;">
			</div>
			<div class="container p-4 bg-info">
				<h4 class="text-center" style="font-family: 'Courier New', Courier, monospace;"><b>HMS Payment</b></h4><br>
				<h4 class="text-center" style="font-family: 'Courier New', Courier, monospace;"> <b> Amount: Rs. <?php echo $totalPrice; ?></b></h4>
			</div>

			<form class="container white bg-info" id="form1" name="form1" method="post" action="savepayment.php">

				<p>
					<strong>Payment Method: <a style="text-decoration:none" class="text-info"> Credit/Debit Card</a></strong><br>
				</p>
				<input name="reservationId" type="hidden" class="input border" value="<?php echo $reservationId; ?>">
				<input name="phone" type="hidden" class="input border" value="<?php echo $_GET["phone"]; ?>">
				<p class="text-center">
					<label>Enter 16 digit Card No:</label>
					<input class="form-control" type="text" name="cardno" id="cardno" required>
				</p>
				<p class="text-center">
					<label>Card Holder Name:</label>
					<input name="cname" type="text" class="form-control" id="cname" required>
				</p>
				<p class="text-center">
					<label>Valid Upto:</label>
					<input name="valid" type="text" class="form-control" id="valid" required>
				</p>
				<p class="text-center">
					<label>CVV:</label>
					<input name="cvv" type="text" class="form-control" id="cvv" required>
				</p>
				<p align="center">
					<i class="fa fa-credit-card-alt" aria-hidden="true"></i> <input class="btn btn-outline-success text-dark" type="submit" name="submit" id="submit" value="Make Payment">
				</p>
				<div>
					<h5 style="text-decoration: none;" class="text-center p-2 text-dark"> Please do not refresh the page or click the back button!! <i class="fa fa-exclamation-triangle" aria-hidden="true"></i></h5>
				</div>
			</form>

		</div>
	</div>
	<!-- <div>
		<a href="placeOrder.php?cartid=' . $cartid . '" class=" btn btn-outline-dark" style="float: right; margin-right:200px"> <b> Back <i class="fa fa-undo" aria-hidden="true"></i></b></a>
	</div> -->
</body>

</html>