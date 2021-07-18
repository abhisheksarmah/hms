<?php 
include('include/header.php');

// delete

if(isset($_POST["delete"]))
{
    $sql = "DELETE FROM `rooms` WHERE `Roomid` = {$_POST["id"]}";
    $conn->query($sql);
    echo '
    <script>
    alert("Room Deleted");
    </script>';
    
}
?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Rooms</h1>


            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-hotel mr-1"></i>
                    Available All Rooms
                    <a href="addroom.php" class="btn btn-primary m-2 " name="adddroom">Add Room</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Room No</th>
                                    <th>Status</th>
                                    <th>Room Type</th>
                                    <th>Room Price (oneday)</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                            $sql = "SELECT * FROM `rooms` ORDER BY `RoomNo` asc";
                                            $result = $conn->query($sql);
                                            while($row = $result->fetch_assoc())
                                            {
                                                echo ' <tr>
                                                <td class="font-weight-bold"><i class="fas fa-bed"></i> <span class="text-danger">'.$row["RoomNo"].'</span></td>';
                                                if($row["Room_status"] == 0)
                                                {
                                                    echo '<td class="text-success">Room Available</td>';

                                                }else if($row["Room_status"] == 1){
                                                    echo '<td class="text-danger">Room Occupied</td>';
                                                }

                                                echo '
                                                <td>'.$row["RoomType"].'</td>
                                                <td>'.$row["RoomPrice"].'</td>';

                                                if($row["Room_status"] == 0)
                                                {
                                                    echo '<td>

                                                    <form action="" method="post" class="d-inline">
                                                        <input type="hidden" name="id" value='.$row["Roomid"].'>
                                                        <button class="btn btn-danger" name="delete" type="submit">
                                                        <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>
    
                                                    <form action="editroom.php" method="POST" class="d-inline"> 
                                                        <input type="hidden" name="id" value='. $row["Roomid"] .'>
                                                        <button type="submit" class="btn btn-info" name="Edit" value="edit">
                                                        <i class="fas fa-pen"></i>
                                                        </button>
                                                    </form>
                                                    </td>';
                                                }
                                                else 

                                                if($row["Room_status"] == 1){
                                                    
                                                    echo '<td class="text-secondary">Disable</td>';
                                                }

                                               
                                                
                                            echo '</tr>';

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