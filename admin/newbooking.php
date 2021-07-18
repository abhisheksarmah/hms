<?php 
include('include/header.php');

// confim
if(isset($_POST["confirm"]))
{
    $sql = "UPDATE `reservation` SET `status`= 1 WHERE `Rev_id`= '{$_POST["id"]}'";
    $conn->query($sql);

    $sql2 = "UPDATE `rooms` SET `Room_status`= 1 WHERE `RoomNo` = '{$_POST["rno"]}'";
    $conn->query($sql2);


    echo '
    <script>
    alert("Booking Completed");
    window.location.href = "bookings.php";
    </script>';

    // Disable room
   
}



?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Customer Details</h1>


            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-home mr-1"></i>
                    Info
                </div>
                <div class="card-body">



                    <?php
                        if(isset($_POST["View"]))
                        {
                            $sql = "SELECT * FROM `reservation` WHERE `Rev_id` = '{$_POST["id"]}'";
                            $result = $conn->query($sql);
                            $row = $result->fetch_assoc();
                            echo '
                            <div class="form-group row">
                                <label for="RoomNumber" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <div class="text-dark" style="font-size: 24px !important;">'.$row["Rev_name"].'</div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="RoomNumber" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <div class="text-dark" style="font-size: 24px !important;">'.$row["Rev_email"].'</div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="RoomNumber" class="col-sm-2 col-form-label">Phone</label>
                                <div class="col-sm-10">
                                    <div class="text-dark" style="font-size: 24px !important;">'.$row["Rev_phone"].'</div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="RoomNumber" class="col-sm-2 col-form-label">PAN</label>
                                <div class="col-sm-10">
                                    <div class="text-dark" style="font-size: 24px !important; text-transform:uppercase;">'.$row["Rev_IdnPan"].'</div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="RoomNumber" class="col-sm-2 col-form-label">Address</label>
                                <div class="col-sm-10">
                                    <div class="text-dark" style="font-size: 24px !important; text-transform: capitalize;">'.$row["Rev_Add"].'</div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="RoomNumber" class="col-sm-2 col-form-label">CheckIN</label>
                                <div class="col-sm-10">
                                    <div class="text-success" style="font-size: 24px !important;">'.$row["Rev_Sdate"].'</div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="RoomNumber" class="col-sm-2 col-form-label">CheckOUT</label>
                                <div class="col-sm-10">
                                    <div class="text-danger" style="font-size: 24px !important;">'.$row["Rev_Edate"].'</div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="RoomNumber" class="col-sm-2 col-form-label">Adults</label>
                                <div class="col-sm-10">
                                    <div class="text-dark" style="font-size: 24px !important;">'.$row["rev_adults"].'</div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="RoomNumber" class="col-sm-2 col-form-label">Children</label>
                                <div class="col-sm-10">
                                    <div class="text-dark" style="font-size: 24px !important;">'.$row["rev_child"].'</div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="RoomNumber" class="col-sm-2 col-form-label">Room NO</label>
                                <div class="col-sm-10">
                                    <div class="text-dark" style="font-size: 24px !important;">'.$row["Rev_roomno"].'</div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="RoomNumber" class="col-sm-2 col-form-label">Type</label>
                                <div class="col-sm-10">
                                    <div class="text-dark" style="font-size: 24px !important;">'.$row["Rev_roomtype"].'</div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="RoomNumber" class="col-sm-2 col-form-label">Total Price</label>
                                <div class="col-sm-10">
                                    <div class="text-dark" style="font-size: 24px !important;">'.$row["Room_total"].'</div>
                                </div>
                            </div>

                            <div class="text-center"> 
                            <form action="" method="post" class="d-inline">
                                <input type="hidden" name="id" value='.$row["Rev_id"].'>
                                <input type="hidden" name="rno" value='.$row["Rev_roomno"].'>
                                <button class="btn btn-success" name="confirm" type="submit">
                                <i class="fas fa-check-double"></i> Confirm
                                </button>
                            </form>
                                <a href="BookRequest.php" class="btn btn-primary m-2" >BACK</a>
                            </div>';
                        }
                        
                        ?>
                </div>
            </div>
        </div>
    </main>

    <?php include('include/footer.php') ?>