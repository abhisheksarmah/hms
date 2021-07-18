<!DOCTYPE html>
<?php
error_reporting(0);
include('Database.php');

session_start();

if(isset($_POST["sendmsg"]))
{
  $name = $_POST["name"];
  $email = $_POST["email"];
  $subject = $_POST["subject"];
  $msg = $_POST["message"];
  
  $msg = $conn->real_escape_string($_POST["message"]);

  $sql = "INSERT INTO `feedback`(`msg_name`, `msg_mail`, `msg_sub`, `msg_body`) VALUES ('$name','$email','$subject','$msg')";
  $conn->query($sql);
  echo '
  <script>
  alert("Message Sent");
  window.location.href = "/";
  </script>
  ';

}
?>
<html lang="en">

<head>
  <title>HR Resort
  </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" >
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous">
  </script>
</head>

<body>

  <!--Nevbar-->

  <nav class="navbar navbar-expand-lg navbar-light fixed-top">
    <div class="container">
      <a class="navbar-brand text-dark" href="#">The RIVERWAYS RETREAT</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#about">About Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#room">Rooms</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#contactus">Contact Us</a>
          </li>
          <?php
          if(!$_SESSION["uid"])
          {
            echo '
            <li class="nav-item">
            <a class="nav-link" href="Login.php">Login</a>
             </li>';
          }
          else
          {
            echo '
            <li class="nav-item">
            <a class="nav-link" href="account.php">'.$_SESSION["uname"].'</a>
            </li>';
          }
          ?>
         
        </ul>

      </div>
    </div>
  </nav>

  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="image/a (4).jpg" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="image/a (5).jpg" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="image/a (7).jpg" class="d-block w-100" alt="...">
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>

  <!-- about -->

  <div class="image-aboutus-banner" style="margin-top:70px" id="about">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1 class="lg-text">About Us</h1>
          <p class="image-aboutus-para">Riverside vibe<br>Homely environment<br>The management WELCOMES you to your
            happy days..
            <br>The Riverways represents a collection of sophisticated upscale stay. The retreat, promises to deliver
            experiences that are dynamic,
            spirited and unique with a dash of uniqueness and an unexpected twist – a perfect fit for contemporary
            travellers.</p>
        </div>
      </div>
    </div>
  </div>

  <!--cards-->

  <div class="cards" id="room">
    <div class="container">
      <div class="row justify-content-center">

        <div class="col-md-4">
          <div class="card" style="width: 18rem;">
            <img src="image/x1.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Single Bed Room</h5>
              <p class="card-text"><i class="fas fa-bed"></i>1 Single bed</p>
              <a href="single.php" class="btn btn-primary">BOOK NOW</a>
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="card" style="width: 18rem;">
            <img src="image/x2.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Double Bed Room</h5>
              <p class="card-text"><i class="fas fa-bed"></i> 2 Single bed</p>
              <a href="double.php" class="btn btn-primary">BOOK NOW</a>
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="card" style="width: 18rem;">
            <img src="image/x3.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Triple Bed Room</h5>
              <p class="card-text"><i class="fas fa-bed"></i> 1 King Size bed</p>
              <a href="king.php" class="btn btn-primary">BOOK NOW</a>
            </div>
          </div>
        </div>



      </div>
    </div>
  </div>


  <!-- contact form -->
  <!-- Contact Us Section -->

  <section class="Material-contact-section section-padding section-dark" id="contactus">
    <div class="container">
      <div class="row">
        <!-- Section Titile -->
        <div class="col-md-12 wow animated fadeInLeft" data-wow-delay=".2s">
          <h1 class="section-title">Love to Hear From You</h1>
        </div>
      </div>
      <div class="row">
        <!-- Section Titile -->
        
        <!-- contact form -->
        <div class="col-md-6 wow animated fadeInRight" data-wow-delay=".2s">
          <form class="shake" role="form" method="post" id="contactForm" name="contact-form" data-toggle="validator">
            <!-- Name -->
            <div class="form-group label-floating">
              <label class="control-label" for="name">Name</label>
              <input class="form-control" id="name" type="text" name="name" required
                data-error="Please enter your name">
              <div class="help-block with-errors"></div>
            </div>
            <!-- email -->
            <div class="form-group label-floating">
              <label class="control-label" for="email">Email</label>
              <input class="form-control" id="email" type="email" name="email" required
                data-error="Please enter your Email">
              <div class="help-block with-errors"></div>
            </div>
            <!-- Subject -->
            <div class="form-group label-floating">
              <label class="control-label">Subject</label>
              <input class="form-control" id="msg_subject" type="text" name="subject" required
                data-error="Please enter your message subject">
              <div class="help-block with-errors"></div>
            </div>
            <!-- Message -->
            <div class="form-group label-floating">
              <label for="message" class="control-label">Message</label>
              <textarea class="form-control" rows="3" maxlength="500" id="message" name="message" required
                data-error="Write your message"></textarea>
              <div class="help-block with-errors"></div>
            </div>
            <!-- Form Submit -->
            <div class="form-submit mt-5">
              <button class="btn btn-succes" type="submit" name="sendmsg"> Send Message</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>

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
            <p>Please follow us on our<br> social media profile</p>
            <a href="https://www.facebook.com/upasana.sarmah.92"><i class="fab fa-facebook"
                style="font-size: 150%;"></i></a>
            <a href="https://twitter.com/RKrishnatra"><i class="fab fa-twitter" style="font-size: 150%;"></i></a>
            <a href="https://www.instagram.com/rabinasharma_/"><i class="fab fa-instagram"
                style="font-size: 150%;"></i></a>
          </div>
          <div class="col-md-3 col-sm-6 col-xs-12 segment-three">
          <div class="copyright-text">
            <p><br>Copyright &copy; 2021 <br>Hemanga Bora & Rabina Krishnatra
              <br><br>Login as Admin: <a href="/admin/">Login</a></p>
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