<?php 
include('include/header.php');

// add
if(isset($_POST["addadmin"]))
{
    $name = $_POST["aname"];
    $mail = $_POST["amail"];
    $Pass = $_POST["apass"];

    $sql = "INSERT INTO `admin`( `Aname`, `Aemail`, `Apass`) VALUES ('$name','$mail','$Pass')";
    $conn->query($sql);
    echo '
    <script>
    alert("Details Updated");
    window.location.href = "admin.php";
    </script>';
    
}

// delete

if(isset($_POST["delete"]))
{
    $sql = "DELETE FROM `admin` WHERE `Aid` = {$_POST["id"]}";
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
            <h1 class="mt-4">Admin</h1>


            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-plus-circle mr-1"></i>
                    Add admin
                </div>
                <div class="card-body">
                    <form method="POST" action="">
                        <div class="form-group row">
                            <label for="Name" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input type="text" name="aname" class="form-control" placeholder="Employee Name"
                                    required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="mail" class="col-sm-2 col-form-label">email</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" name="amail" placeholder="email" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                                <input type="text" name="apass" class="form-control" placeholder="password" required>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary m-2 " name="addadmin">Add Admin</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-users-cog mr-1"></i>
                    Available Admin
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <th>Name</th>
                                <th>email</th>
                                <th>Action</th>
                            </thead>
                            <span></span>
                            <tbody>
                                <?php
                                    $sql = "SELECT * FROM `admin` ORDER BY `Aid` asc";
                                    $result = $conn->query($sql);
                                    while($row = $result->fetch_assoc())
                                    {
                                        echo '
                                            <tr>
                                                <td>'.$row["Aname"].'</td>
                                                <td>'.$row["Aemail"].'</td>
                                                <td>';
                                                if(($_SESSION["aid"]) == $row["Aid"])
                                                {
                                                    echo '
                                                    <form action="editadmin.php" method="POST" class="d-inline"> 
                                                        <input type="hidden" name="id" value='. $row["Aid"] .'>
                                                        <button type="submit" class="btn btn-info" name="Edit" value="edit">
                                                        <i class="fas fa-pen"></i>
                                                        </button>
                                                    </form>';

                                                }
                                                else
                                                {
                                                    echo '
                                                    <form action="" method="post" class="d-inline">
                                                        <input type="hidden" name="id" value='.$row["Aid"].'>
                                                        <button class="btn btn-danger" name="delete" type="submit">
                                                        <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>

                                                    <form action="editadmin.php" method="POST" class="d-inline"> 
                                                        <input type="hidden" name="id" value='. $row["Aid"] .'>
                                                        <button type="submit" class="btn btn-info" name="Edit" value="edit">
                                                        <i class="fas fa-pen"></i>
                                                        </button>
                                                    </form>';
                                                }
                                               
                                                echo '</td>
                                            </tr>';
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