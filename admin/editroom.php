<?php
include('include/header.php');

// get details
if(isset($_POST["Edit"]))
{
    $sql = "SELECT * FROM `rooms` WHERE `Roomid` = {$_POST["id"]}";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}
if(isset($_POST["updroom"]))
{
    $id = $_POST["rid"];
    $number = $_POST["rno"];
    $Type = $_POST["rtype"];
    $Price = $_POST["rprice"];

    $sql = "UPDATE `rooms` SET `RoomType`='$Type',`RoomPrice`='$Price' WHERE `Roomid`='$id'";
    $conn->query($sql);
    echo '
    <script>
    window.location.href = "rooms.php";
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
                        <div class="form-group row">
                            <input type="hidden" name="rid" value="<?php echo $row["Roomid"]; ?>">
                            <label for="RoomNumber" class="col-sm-2 col-form-label">RoomNumber</label>
                            <div class="col-sm-10">
                                <input type="text" name="rno" class="form-control" placeholder="Room Number" readonly
                                    value="<?php echo $row["RoomNo"];?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Roomtype" class="col-sm-2 col-form-label">Room Type</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="rtype">
                                    <option selected><?php echo $row["RoomType"];?></option>
                                    <option>Single Bed</option>
                                    <option>Double Bed</option>
                                    <option>King Size Bed</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Roomprice" class="col-sm-2 col-form-label">Room Price(per day)</label>
                            <div class="col-sm-10">
                                <input type="number" name="rprice" class="form-control" placeholder="Price ₹"
                                    value="<?php echo $row["RoomPrice"]; ?>" required>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary m-2 " name="updroom">Update</button>
                            <a href="rooms.php" class="btn btn-primary m-2 " name="adddroom">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <?php include('include/footer.php') ?>