<?php 
error_reporting(0);
include('include/header.php');

// new request
$sql = "SELECT count(`Rev_id`) FROM `reservation` WHERE `status` = 0";
$data = $conn->query($sql);
$result = mysqli_fetch_row($data);
$newreq = $result[0];

// total Room Available

$sql = "SELECT count(`Roomid`) FROM `rooms` WHERE `Room_status` = 0 AND `RoomType` = 'Single Bed'";
$data = $conn->query($sql);
$result = mysqli_fetch_row($data);
$avlSroom = $result[0];

$sql = "SELECT count(`Roomid`) FROM `rooms` WHERE `Room_status` = 0 AND `RoomType` = 'Double Bed'";
$data = $conn->query($sql);
$result = mysqli_fetch_row($data);
$avlDroom = $result[0];

$sql = "SELECT count(`Roomid`) FROM `rooms` WHERE `Room_status` = 0 AND `RoomType` = 'King Size Bed'";
$data = $conn->query($sql);
$result = mysqli_fetch_row($data);
$avlKroom = $result[0];

// total income
$sql = "SELECT sum(`Room_total`) as totalincome FROM `reservation` WHERE `status` = 3";
$data = $conn->query($sql);
$result =$data->fetch_assoc();
$totalincome = $result["totalincome"];

//total guest\

$sql = "SELECT sum(`rev_totalguest`) as totalguest FROM `reservation` WHERE `status` = 1 OR `status` = 2";
$data = $conn->query($sql);
$result =$data->fetch_assoc();
$totalguest = $result["totalguest"];

?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">Dashboard</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Hotel Status</li>
            </ol>
            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-primary text-white mb-4">
                        <div class="card-body">New Booking Requests</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <h2 class="text-white stretched-link" href="#"><?php echo $newreq; ?></h2>
                            <a class="text-white stretched-link" href="BookRequest.php">
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-dark text-white mb-4">
                        <div class="card-body">Available Single Bed</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <h2 class="text-white stretched-link" href="#"><?php echo $avlSroom; ?></h2>
                            <a class="text-white stretched-link" href="rooms.php">
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-success text-white mb-4">
                        <div class="card-body">Available Double Bed </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <h2 class="text-white stretched-link" href="#"><?php echo $avlDroom; ?></h2>
                            <a class="text-white stretched-link" href="rooms.php">
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-danger text-white mb-4">
                        <div class="card-body">Available King Bed</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <h2 class="text-white stretched-link" href="#"><?php echo $avlKroom; ?></h2>
                            <a class="text-white stretched-link" href="rooms.php">
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-6">
                    <div class="card bg-primary text-white mb-4">
                        <div class="card-body">Total Earnings</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <h2 class="text-white stretched-link" href="#"><?php echo $totalincome; ?></h2>
                            <a class="text-white stretched-link" href="Allbooking.php">
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="card bg-primary text-white mb-4">
                        <div class="card-body">Total guests</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <h2 class="text-white stretched-link" href="#"><?php echo $totalguest; ?></h2>
                            <a class="text-white stretched-link" href="Allbooking.php">
                                <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table mr-1"></i>
                    New Booking
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Room No</th>
                                    <th>Type</th>
                                    <th>From</th>
                                    <th>To</th>
                                    <th>Total</th>
                                    <th>no of guest</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                    $sql = "SELECT * FROM `reservation` WHERE `status` = '0'  ORDER BY `Rev_id` asc";
                                    $result = $conn->query($sql);
                                    while($row = $result->fetch_assoc())
                                    {
                                        echo '
                                            <tr>
                                                <td>'.$row["Rev_roomno"].'</td>
                                                <td>'.$row["Rev_roomtype"].'</td>
                                                <td class="text-success">'.$row["Rev_Sdate"].'</td>
                                                <td class="text-danger">'.$row["Rev_Edate"].'</td>
                                                <td class="text-success">'.$row["Room_total"].'</td>
                                                <td class="text-danger">'.$row["rev_totalguest"].'</td>

                                                <td>
                                                    <a href="BookRequest.php" class="btn btn-info m-2 "><i class="fas fa-eye"></i> View</a>
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