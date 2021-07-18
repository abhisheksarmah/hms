<?php 
include('include/header.php');


// add room
$msg = '';
if(isset($_POST["adddroom"]))
{
    $number = $_POST["rno"];
    $Type = $_POST["rtype"];
    $Price = $_POST["rprice"];


    // check alredy exist room

    $sqlc = "SELECT * FROM `rooms` WHERE `RoomNo` = $number";
    $result = $conn->query($sqlc);
    if($result->num_rows > 0 )
    {
        $msg = 'Room Already Added';
    }else
    {
        
    $sql = "INSERT INTO `rooms`(`RoomNo`, `RoomType`, `RoomPrice`, `Room_status`) VALUES ('$number','$Type','$Price', 0)";
    $conn->query($sql);
    echo '
    <script>
    alert("Room Added");
    window.location.href = "rooms.php";
    </script>';
    }
}
?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">New Rooms</h1>


            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-plus-circle mr-1"></i>
                    Add Room
                </div>
                <div class="card-body">
                    <form method="POST" action="">
                        <div class="form-group row">
                            <label for="RoomNumber" class="col-sm-2 col-form-label">RoomNumber</label>
                            <div class="col-sm-10">
                                <input type="text" name="rno" class="form-control" placeholder="Room Number" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Roomtype" class="col-sm-2 col-form-label">Room Type</label required>
                            <div class="col-sm-10">
                                <select class="form-control" name="rtype">
                                    <option selected>Single Bed</option>
                                    <option>Double Bed</option>
                                    <option>King Size Bed</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Roomprice" class="col-sm-2 col-form-label">Room Price(per day)</label>
                            <div class="col-sm-10">
                                <input type="number" name="rprice" class="form-control" placeholder="Price ₹" required>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary m-2 " name="adddroom">Add Room</button>
                        </div>
                        <div class="text-success"><?php echo $msg; ?></div>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <?php include('include/footer.php') ?>