<!DOCTYPE html>
<?php
session_start();
$msg = "";
if(isset($_SESSION["aid"]))
{
    header("Location: dashboard.php");
}
else
{
    if(isset($_POST["loginbtn"]))
    {
        include('include/Database.php');

        $aemail = $_POST["aemail"];
        $apass = $_POST["apass"];

        $sql = "SELECT `Aid`, `Aemail`, `Apass` FROM `admin` WHERE `Aemail` = '{$aemail}' AND `Apass` = '{$apass}'";
        // echo $sql; die();
        $result = $conn->query($sql);
        if(mysqli_num_rows($result) > 0)
        {
            while($row = $result->fetch_assoc())
            {
                $_SESSION["aid"] = $row["Aid"];
                header("Location: index.php");
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
    <title>Admin Panel | The RIVERWAYS RETREAT</title>
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous">
    </script>
</head>

<body class="bg-primary">
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
                                            <label class="small mb-1" for="inputEmailAddress">Admin Email</label>
                                            <input class="form-control py-4" name="aemail" type="email"
                                                placeholder="Enter Admin email address" />
                                        </div>
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputPassword">Password</label>
                                            <input class="form-control py-4" name="apass" type="password"
                                                placeholder="Enter password" />
                                        </div>
                                        <p class="text-danger"><?php echo $msg;?></p>
                                        <div
                                            class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">

                                            <button type="submit" name="loginbtn" class="btn btn-primary">Login</button>
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