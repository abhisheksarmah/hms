<?php
include('include/header.php');

// get details
if(isset($_POST["Edit"]))
{
    $sql = "SELECT * FROM `staff` WHERE `id` = {$_POST["id"]}";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}
// update

if(isset($_POST["supdate"]))
{
    $id = $_POST["empid"];
    $name = $_POST["empname"];
    $pos = $_POST["position"];
    $cont = $_POST["contact"];

    $sql = "UPDATE `staff` SET`s_name`='$name',`s_position`='$pos',`s_contact`='$cont' WHERE `id`= $id";
    $conn->query($sql);
    echo '
    <script>
    window.location.href = "staff.php";
    </script>';
   
}
?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Update Room Details</h1>


            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-home mr-1"></i>
                    update
                </div>
                <div class="card-body">
                    <form method="POST" action="">
                        <input type="hidden" name="empid" value="<?php echo $row["id"];?>">
                        <div class="form-group row">
                            <label for="Name" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input type="text" name="empname" class="form-control" placeholder="Employee Name"
                                    value="<?php echo $row["s_name"];?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="position" class="col-sm-2 col-form-label">Position</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="position" list="designation"
                                    value="<?php echo $row["s_position"];?>">
                                <datalist id="designation">
                                    <option>Manager</option>
                                    <option>Room Service</option>
                                    <option>Maintenance & Cleaning</option>
                                    <option>Housekeeping Manager</option>
                                </datalist>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="contact" class="col-sm-2 col-form-label">Contact</label>
                            <div class="col-sm-10">
                                <input type="text" name="contact" class="form-control" placeholder="Phone/Email"
                                    value="<?php echo $row["s_contact"];?>">
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary m-2 " name="supdate">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <?php include('include/footer.php') ?>