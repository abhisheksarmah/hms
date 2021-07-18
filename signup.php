<?php
error_reporting(0);
session_start();
$msg = "";
if(isset($_SESSION["uid"]))
{
    header("Location: account.php");
}
else{
    
    include('Database.php');

    $csql = "SELECT `uemail` FROM `users` WHERE `uemail` = '{$_POST["email"]}'";
    $dta = $conn->query($csql);

    if(mysqli_num_rows($dta) > 0)
    {
        $conn->close();
        echo '
        <script>
        alert("Account Already Exists please Login");
        window.location.href = "login.php";
        </script>
        ';

    }
    else
    {
        if(isset($_POST["Createac"]))
      {
        $name = $_POST["name"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        $password = $_POST["password"];
    
        $query = "INSERT INTO `users`(`uname`, `uemail`, `uphone`, `upassword`) 
        VALUES ('$name','$email','$phone','$password')";
        $conn->query($query);
        echo '
        <script>
        alert("Account Created");
        window.location.href = "login.php";
        </script>
        ';
      }
    }

}

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The RIVERWAYS RETREAT</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <style>
        .send-button{
background: #54C7C3;
width:100%;
font-weight: 600;
color:#fff;
padding: 8px 25px;
}
input[type=number]::-webkit-inner-spin-button, 
input[type=number]::-webkit-outer-spin-button { 
  -webkit-appearance: none; 
  margin: 0; 
}
.g-button{
color: #fff !important;
border: 1px solid #EA4335;
background: #ea4335 !important;
width:100%;
font-weight: 600;
color:#fff;
padding: 8px 25px;
}
.my-input{
box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.1);
cursor: text;
padding: 8px 10px;
transition: border .1s linear;
}
.header-title{
margin: 5rem 0;
}
h1{
font-size: 31px;
line-height: 40px;
font-weight: 600;
color:#4c5357;
}
h2{
color: #5e8396;
font-size: 21px;
line-height: 32px;
font-weight: 400;
}
.login-or {
position: relative;
color: #aaa;
margin-top: 10px;
margin-bottom: 10px;
padding-top: 10px;
padding-bottom: 10px;
}
.span-or {
display: block;
position: absolute;
left: 50%;
top: -2px;
margin-left: -25px;
background-color: #fff;
width: 50px;
text-align: center;
}
.hr-or {
height: 1px;
margin-top: 0px !important;
margin-bottom: 0px !important;
}
@media screen and (max-width:480px){
h1{
font-size: 26px;
}
h2{
font-size: 20px;
}
}
    </style>
    </head>
<body>
<div class="container">
      <div class="col-md-6 mx-auto text-center">
         <div class="header-title">
            <h1 class="wv-heading--title">
            THE RIVERWAYS RETREAT
            </h1>
            <h2 class="wv-heading--subtitle">
              
            </h2>
         </div>
      </div>
      <div class="row">
         <div class="col-md-4 mx-auto">
            <div class="myform form ">
               <form action="" method="post" name="login">
                  <div class="form-group">
                     <input type="text" name="name"  class="form-control my-input" id="name" placeholder="Name" required>
                  </div>
                  <div class="form-group">
                     <input type="email" name="email"  class="form-control my-input" id="email" placeholder="Email" required>
                  </div>
                  <div class="form-group">
                     <input type="tel" name="phone" id="phone"  class="form-control my-input" pattern="[789][0-9]{9}" placeholder="e.g : +919876543210" required>
                  </div>
                  <div class="form-group">
                     <input type="text" name="password" class="form-control my-input" placeholder="password" required>
                  </div>
                  <div class="text-center ">
                     <button type="submit" class=" btn btn-block send-button tx-tfm" name="Createac">Create Account</button>
                  </div>
                  <div class="col-md-12 ">
                     <div class="login-or">
                        <hr class="hr-or">
                        <span class="span-or">or</span>
                     </div>
                  </div>
                  <div class="form-group">
                     <a class="btn btn-block g-button" href="login.php">
                     <i class="fa fa-sign-in-alt"></i>Sign iN
                     </a>
                  </div>
                  
               </form>
            </div>
         </div>
      </div>
   </div>
</body>
</html>