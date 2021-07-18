<?php 
include('include/header.php');

// delete
if(isset($_POST["Delete"]))
{
    $sql = "DELETE FROM `reservation` WHERE `Rev_id`= '{$_POST["id"]}'";
    $conn->query($sql);
    echo '
    <script>
    alert("Data Deleted");
    window.location.href = "Allbooking.php";
    </script>';
}
 ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">All Bookings</h1>

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-bars mr-1"></i>
                    All Customers
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Room No</th>
                                    <th>Name</th>
                                    <th>Book From </th>
                                    <th>End To</th>
                                    <th>Room Type </th>
                                    <th>Total</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                            $sql = "SELECT * FROM `reservation` ORDER BY `Rev_id` asc";
                                            $result = $conn->query($sql);
                                            while($row = $result->fetch_assoc())
                                            {
                                                echo '
                                                <tr>
                                                    <td>'.$row["Rev_roomno"].'</td>
                                                    <td>'.$row["Rev_name"].'</td>
                                                    <td class="text-success">'.$row["Rev_Sdate"].'</td>
                                                    <td class="text-danger font-weight-bold">'.$row["Rev_Edate"].'</td>
                                                    <td>'.$row["Rev_roomtype"].'</td>
                                                    <td>'.$row["Room_total"].'</td>
                                                    <td>';
                                                    if($row["status"] == 0){

                                                    echo '
                                                    <a href="BookRequest.php" class="btn btn-success">Accept Booking</a>

                                                    <form action="" method="post" class="d-inline">
                                                        <input type="hidden" name="id" value='.$row["Rev_id"].'>
                                                        <button class="btn btn-danger" name="Delete" type="submit">
                                                        <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>
                                                    ';

                                                    }
                                                    else if($row["status"] == 1)
                                                    {
                                                        echo '
               
                                                        <form action="viewdetails.php" method="POST" class="d-inline"> 
                                                            <input type="hidden" name="id" value='. $row["Rev_id"] .'>
                                                            <button type="submit" class="btn btn-info" name="View" value="View">
                                                            <i class="fas fa-eye"></i> View
                                                            </button>
                                                        </form>

                                                        <form action="" method="post" class="d-inline">
                                                            <input type="hidden" name="id" value='.$row["Rev_id"].'>
                                                            <button class="btn btn-danger" name="Delete" type="submit">
                                                            <i class="fas fa-trash"></i>
                                                            </button>
                                                        </form>
                                                        ';
                                                    }
                                                    else if($row["status"] == 2)
                                                    {
                                                        echo '
                                                        
                                                        <form action="viewdetails.php" method="POST" class="d-inline"> 
                                                            <input type="hidden" name="id" value='. $row["Rev_id"] .'>
                                                            <button type="submit" class="btn btn-danger" name="View" value="View">
                                                            REJECTED
                                                            </button>
                                                        </form>

                                                        <form action="" method="post" class="d-inline">
                                                            <input type="hidden" name="id" value='.$row["Rev_id"].'>
                                                            <button class="btn btn-danger" name="Delete" type="submit">
                                                            <i class="fas fa-trash"></i>
                                                            </button>
                                                        </form>';
                                                    }
                                                    else if($row["status"] == 3)
                                                    {
                                                        echo '
               
                                                        <form action="viewdetails.php" method="POST" class="d-inline"> 
                                                            <input type="hidden" name="id" value='. $row["Rev_id"] .'>
                                                            <button type="submit" class="btn btn-success" name="View" value="View">
                                                            <i class="fa fa-download"></i> Generate Bill
                                                            </button>
                                                        </form>

                                                        <form action="" method="post" class="d-inline">
                                                            <input type="hidden" name="id" value='.$row["Rev_id"].'>
                                                            <button class="btn btn-danger" name="Delete" type="submit">
                                                            <i class="fas fa-trash"></i>
                                                            </button>
                                                        </form>
                                                        ';
                                                    }
                                                echo '
                                                        
                                                    </td>
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