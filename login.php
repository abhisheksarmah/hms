<!DOCTYPE html>
<?php
error_reporting(0);
session_start();
$msg = "";
if(isset($_SESSION["uid"]))
{
    header("Location: account.php");
}

else
{
    if(isset($_POST["loginbtn"]))
    {
        include('Database.php');

        $email = $_POST["uemail"];
        $pass = $_POST["upass"];

        $sql = "SELECT `uid`, `uname`, `uemail`  FROM `users` WHERE `uemail` = '{$email}' AND `upassword` = '{$pass}'";
        // echo $sql; die();
        $result = $conn->query($sql);
        if(mysqli_num_rows($result) > 0)
        {
            while($row = $result->fetch_assoc())
            {
                $_SESSION["uid"] = $row["uid"];
                $_SESSION["uname"] = $row["uname"];
                $_SESSION["uemail"] = $row["uemail"];
                header("Location: Account.php");
            }
        }
        else
        {
            $msg = "wrong email/password";
        }
    }
    
}
?>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>User Login |The RIVERWAYS RETREAT</title>
    <link href="admin/css/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous">
    </script>
    <style>
        a{
            text-decoration: none;
            color: #fff;
        }
        a:hover{
            text-decoration: none;
            color: black;
        }
    </style>
</head>

<body class="bg-primary">
<div class="col-md-6 mt-5 mx-auto text-center">
         <div class="header-title">
            <h1 class="wv-heading--title">
            <a href="/">THE RIVERWAYS RETREAT</a>
            </h1>
            <h2 class="wv-heading--subtitle">
              
            </h2>
         </div>
      </div>
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Login</h3>
                                </div>
                                <div class="card-body">
                                    <form method="POST" action="">
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputEmailAddress">Email</label>
                                            <input class="form-control py-4" name="uemail" type="email"
                                                placeholder="Enter email address" />
                                        </div>
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputPassword">Password</label>
                                            <input class="form-control py-4" name="upass" type="password"
                                                placeholder="Enter password" />
                                        </div>
                                        <p class="text-danger"><?php echo $msg;?></p>
                                        <div
                                            class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">

                                            <button type="submit" name="loginbtn" class="btn btn-primary">Login</button>
                                            <a href="signup.php" class="btn btn-primary">Signup</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>

    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="js/scripts.js"></script>
</body>

</html>