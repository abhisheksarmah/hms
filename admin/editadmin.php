<?php
include('include/header.php');

// get details
if(isset($_POST["Edit"]))
{
    $sql = "SELECT * FROM `admin` WHERE `Aid` = {$_POST["id"]}";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}
// update

if(isset($_POST["updateadmin"]))
{
    $id = $_POST["aid"];
    $aname = $_POST["aname"];
    $aemail = $_POST["aemail"];
    $apass = $_POST["apass"];

    $sql = "UPDATE `admin` SET`Aname`='$aname',`Aemail`='$aemail',`Apass`='$apass' WHERE `Aid`= $id";
    $conn->query($sql);
    echo '
    <script>
    window.location.href = "admin.php";
    </script>';
   
}
?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Update Admin Details</h1>


            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-home mr-1"></i>
                    update
                </div>
                <div class="card-body">
                    <form method="POST" action="">
                        <input type="hidden" name="aid" value="<?php echo $row["Aid"];?>">
                        <div class="form-group row">
                            <label for="Name" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input type="text" name="aname" class="form-control" placeholder="Employee Name"
                                    value="<?php echo $row["Aname"];?>" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="mail" class="col-sm-2 col-form-label">email</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" name="aemail" placeholder="email"
                                    value="<?php echo $row["Aemail"];?>" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                                <input type="password" name="apass" class="form-control" placeholder="password"
                                    value="<?php echo $row["Apass"];?>" required>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary m-2 " name="updateadmin">Update
                                Details</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <?php include('include/footer.php') ?>