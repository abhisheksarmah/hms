<?php include('Database.php');
session_start();

if (!$_SESSION["uid"]) {
  header("Location: /");
}

$query = "SELECT * FROM `users` WHERE `uid` = '{$_SESSION["uid"]}' ";
$ret = $conn->query($query);
$data = $ret->fetch_assoc();
?>

<html lang="en">


<head>
  <title>HR Resort
  </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.0/css/font-awesome.css" integrity="sha512-72McA95q/YhjwmWFMGe8RI3aZIMCTJWPBbV8iQY3jy1z9+bi6+jHnERuNrDPo/WGYEzzNs4WdHNyyEr/yXJ9pA==" crossorigin="anonymous" />
  </script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

  <!--Nevbar-->

  <nav class="navbar navbar-expand-lg navbar-light fixed-top">
    <div class="container">
      <a class="navbar-brand text-dark" href="#">The RIVERWAYS RETREAT</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse " id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/#about">About Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/#room">Rooms</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/#contactus">Contact Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="account.php"><?php echo $_SESSION["uname"] ?></a>
          </li>
        </ul>

      </div>
    </div>
  </nav>

  <div class="container m-5">
    <div class="row">
      <div class="col p-5">
        <div class="d-flex align-items-start">
          <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <button class=" btn my-2 nav-link " id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="true">Profile</buttona>
              <button class=" btn my-2 nav-link active" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">Bookings</button>
              <a href="logout.php" class="btn  "><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a>
          </div>
          <div class="tab-content" id="v-pills-tabContent">
            <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
              <div class="row m-3 p-5">
                <div class="col">
                  <p class="text-secondary">Name</p>
                  <p class="text-secondary">Email</p>
                  <p class="text-secondary">Phone</p>
                </div>
                <div class="col">
                  <p class="text-dark"><?php echo $data["uname"] ?></p>
                  <p class="text-dark"><?php echo $data["uemail"] ?></p>
                  <p class="text-dark"><?php echo $data["uphone"] ?></p>
                </div>
              </div>
            </div>
            <div class="tab-pane fade show active " id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
              <div class="table-responsive m-4">
                <table class="table">
                  <thead>
                    <tr>
                      <th>Reservation</th>
                      <th>Name</th>
                      <th>Room</th>
                      <th>Bed</th>
                      <th>Check In</th>
                      <th>Check Out</th>
                      <th>Total</th>
                      <th>Payment</th>
                      <th>Checked In</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?Php
                    $query = "SELECT * FROM `reservation` Where `Acid` = '$_SESSION[uid]' order by `Rev_id` asc";
                    $ret = $conn->query($query);
                    while ($row = $ret->fetch_assoc()) {
                      echo '
                                        <tr>
                                          <td>' . $row["Rev_id"] . '</td>
                                          <td>' . $row["Rev_name"] . '</td>
                                          <td>' . $row["Rev_roomno"] . '</td>
                                          <td>' . $row["Rev_roomtype"] . '</td>
                                          <td>' . date("d-m-Y", strtotime($row['Rev_Sdate'])) . '</td>
                                          <td>' . date("d-m-Y", strtotime($row['Rev_Edate'])) . '</td>

                                          <td>' . $row["Room_total"] . '</td>';
                      if ($row["acnf"] < 1) {
                        echo '<td><a href="payment.php?rev_id='.$row["Rev_id"].'&room_total='.$row["Room_total"].'" class="btn btn-outline-primary">Pay Now</a></td>';
                      }else if ($row["acnf"] == 0) {
                        echo '<td class="text-info">waiting for confirmation</td>';
                      } else if ($row["acnf"] == 1) {
                        echo '<td class="text-success">Approved</td>';
                      } else if ($row["acnf"] == 2) {
                        echo '<td class="text-danger">Rejected</td>';
                      }

                      if ($row["status"] == 0) {
                        echo '<td class="text-secondary">Pending</td>';
                      } else if ($row["status"] == 1) {
                        echo '<td class="text-success">Chekin</td>';
                      } else if ($row["status"] == 2) {
                        echo '<td class="text-danger">Rejected</td>';
                      } else if ($row["status"] == 3) {
                        echo '<td class="text-success">Checkedout</td>';
                      }
                      echo '</tr>
                                        ';
                    }
                    ?>

                  </tbody>
                </table>
                <p class="text-danger">For Cancel The Booking Please Contact This Number 0373-2367549</p>
              </div>
            </div>
            <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">...</div>
          </div>
        </div>
      </div>
    </div>

  </div>




  <!--footer-->

  <footer>
    <div class="footer-bottom">
      <div class="container">
        <div class="row">
          <div class="col-md-3 col-sm-6 col-xs-12 segment-one">
            <h2>Find Us</h2>
            Jorhat<br>
            Assam<br>
            India 785001
          </div>
          <div class="col-md-3 col-sm-6 col-xs-12 segment-two">
            <h2>Contact Us</h2>
            <ul>
              <li><a href="#"></a>Email us at theriverways@gmail.com</li>
              <li><a href="#"></a>call us at 0373-2367549</li>
            </ul>
          </div>
          <div class="col-md-3 col-sm-6 col-xs-12 segment-three">
            <h2>Follow Us </h2>
            <p>Plese follow us on our<br> social media profile</p>
            <a href="https://www.facebook.com/upasana.sarmah.92"><i class="fa fa-facebook" style="font-size: 150%;"></i></a>
            <a href="https://twitter.com/RKrishnatra"><i class="fa fa-twitter" style="font-size: 150%;"></i></a>
            <a href="https://www.instagram.com/rabinasharma_/"><i class="fa fa-instagram" style="font-size: 150%;"></i></a>
          </div>
          <div class="col-md-3 col-sm-6">
            <div class="copyright-text">
              <p><br>Copyright &copy; 2021 <br>Hemanga Bora & Rabina Krishnatra
                <br><br>Login as Admin: <a href="/admin/">Login</a>
              </p>
            </div>
          </div>

        </div>

      </div>

    </div>
  </footer>


  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>