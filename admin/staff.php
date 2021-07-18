<?php 
include('include/header.php');

// add
if(isset($_POST["addstaff"]))
{
    $name = $_POST["empname"];
    $pos = $_POST["position"];
    $contact = $_POST["contact"];

    $sql = "INSERT INTO `staff`( `s_name`, `s_position`, `s_contact`) VALUES ('$name','$pos','$contact')";
    $conn->query($sql);
    echo '
    <script>
    window.location.href = "staff.php";
    </script>';
    
}

// delete

if(isset($_POST["delete"]))
{
    $sql = "DELETE FROM `staff` WHERE `id` = {$_POST["id"]}";
    $conn->query($sql);
    echo '
    <script>
    alert("Staff Deleted");
    window.location.href = "staff.php";
    </script>';
    
}

?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Staff</h1>


            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-plus-circle mr-1"></i>
                    Add Staff
                </div>
                <div class="card-body">
                    <form method="POST" action="">
                        <div class="form-group row">
                            <label for="Name" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input type="text" name="empname" class="form-control" placeholder="Employee Name"
                                    required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="position" class="col-sm-2 col-form-label">Position</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="position" list="designation" required>
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
                                    required>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary m-2 " name="addstaff">Add Staff</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-concierge-bell mr-1"></i>
                    All Staff
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <th>Name</th>
                                <th>Contact</th>
                                <th>Position</th>
                                <th>Action</th>
                            </thead>
                            <span></span>
                            <tbody>
                                <?php
                                    $sql = "SELECT * FROM `staff` ORDER BY `id` asc";
                                    $result = $conn->query($sql);
                                    while($row = $result->fetch_assoc())
                                    {
                                        echo '
                                            <tr>
                                                <td>'.$row["s_name"].'</td>
                                                <td>'.$row["s_contact"].'</td>
                                                <td>'.$row["s_position"].'</td>
                                                <td>
                                                <form action="" method="post" class="d-inline">
                                                    <input type="hidden" name="id" value='.$row["id"].'>
                                                    <button class="btn btn-danger" name="delete" type="submit">
                                                    <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>

                                                <form action="editstaff.php" method="POST" class="d-inline"> 
                                                    <input type="hidden" name="id" value='. $row["id"] .'>
                                                    <button type="submit" class="btn btn-info" name="Edit" value="edit">
                                                    <i class="fas fa-pen"></i>
                                                    </button>
                                                </form>
                                                </td>
                                            </tr>
                                        ';
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <?php include('include/footer.php') ?>