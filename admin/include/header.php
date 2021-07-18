<?php
session_start();
if(!isset($_SESSION["aid"]))
{
    header("Location: /admin/");
}
include('Database.php');
?>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>DASHBOARD | RR</title>
    <link href="css/styles.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet"
        crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous">
    </script>
    <script src="https://raw.githack.com/eKoopmans/html2pdf/master/dist/html2pdf.bundle.js"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand" href="/admin/">RIVERWAYS RETREAT</a>
        <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i
                class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <div class="d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
            <h6 class="text-light">Date: <?php echo date("Y-m-d") ?></h6>
        </div>
        <!-- Navbar-->
        <ul class="navbar-nav ml-auto ml-md-0">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">

                    <a class="dropdown-item" href="logout.php">Logout</a>
                </div>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Management</div>
                        <a class="nav-link" href="dashboard.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>

                        <div class="sb-sidenav-menu-heading">manage</div>
                        <a class="nav-link" href="rooms.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-hotel"></i></div>
                            All Room
                        </a>
                        <a class="nav-link" href="addroom.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-plus-circle"></i></div>
                            Add Room
                        </a>
                        <a class="nav-link" href="BookRequest.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-calendar-alt"></i></div>
                            New Booking
                        </a>
                        <a class="nav-link" href="bookings.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tasks"></i></div>
                            Checkin 
                        </a>
                        <a class="nav-link" href="Allbooking.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-bars"></i></div>
                            All Bookings
                        </a>
                        </a>
                        <a class="nav-link" href="staff.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-concierge-bell"></i></div>
                            Staff
                        </a>
                        </a>
                        <a class="nav-link" href="admin.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-users-cog"></i></div>
                            Admin
                        </a>
                        <a class="nav-link" href="messages.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-comment-alt"></i></div>
                            Feedback
                        </a>
                    </div>
                </div>

            </nav>
        </div>