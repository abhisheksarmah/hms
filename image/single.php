<?php
include('Database.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>HR Resort
  </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.0/css/font-awesome.css">
</head>
<body>

  <!--Nevbar-->

  <nav class="navbar navbar-expand-lg navbar-light fixed-top">
    <div class="container">
      <a class="navbar-brand text-dark"  href="/">The RIVERWAYS RETREAT</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="index.html#about">About Us</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="index.html#room">Rooms</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="index.html#">Conference Hall</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="index.html#contactus">Contact Us</a>
      </li>
      <li class="nav-item">
         <a class="nav-link" href="/admin/login.php">LOG IN</a>
      </li>
      </ul>
    
  </div>
    </div>
  </nav>

<div class="cards" id="room">
    <div class="container">
    <h2>Single Bed</h2>    
    <div class="row">
          <?php
        $sql2 = "SELECT * FROM `rooms` where `Room_status` = 0 AND `RoomType` = 'single' ORDER BY `rooms`.`RoomNo` ASC";
        $data2 = $conn->query($sql2);
				while($row = $data2->fetch_assoc()){
           echo ' <div class="col-md-4 mt-3 mb-2">
                <div class="card" style="width: 18rem;">
                    <img src="image/x1.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Room no : '.$row["RoomNo"].'</h5>
                        <p class="card-text">Per Night: '.$row["RoomPrice"].'</p>
                            <form action="Booking.php" method="POST">
                            <input type="hidden" name="roomno" value='.$row["RoomNo"].'>
                            <input type="hidden" name="roomid" value='.$row["Roomid"].'>
                            <input type="hidden" name="roomtype" value='.$row["RoomType"].'>
                            <input type="hidden" name="RoomPrice" value='.$row["RoomPrice"].'>
                        <button class="btn btn-primary" name="bookroom" type="submit">BOOK NOW</button>
                        </form>
                    </div>
                </div>
            </div>';
        }
            ?>
        </div>
       
       
    </div>
</div>


<footer>
    <div class="footer-bottom">
      <div class="container">
        <div class="row">
          <div class="col-md-3 col-sm-6 col-xs-12 segment-one">
            <h2>About Us</h2>
            <p>The place that gives the riverside vibe with a homely environment for everyone</p>
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
            <p>Plese follow us on our social media profile</p>
            <a href="https://www.facebook.com/upasana.sarmah.92"><i class="fa fa-facebook" style="font-size: 150%;"></i></a>
            <a href="https://twitter.com/RKrishnatra"><i class="fa fa-twitter" style="font-size: 150%;"></i></a>
            <a href="https://www.instagram.com/rabinasharma_/"><i class="fa fa-instagram" style="font-size: 150%;"></i></a>
          </div>
          
        </div>
      </div>
  
    </div>
  </footer>
  
  
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
  
  </body>
  </html>
  