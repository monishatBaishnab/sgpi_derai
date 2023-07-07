<?php
if (isset($_SESSION['loggedin'])) {
    if ($_SESSION['loggedin'] == true) {
        $name = $_SESSION['name'];
    }
}
date_default_timezone_set('Asia/Dhaka');
$activePage = basename($_SERVER['PHP_SELF'], ".php");
error_reporting(0);
?>

<!DOCTYPE html>
<html lang="bn">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SGPI</title>
    <!-- link bootstrap css file -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- link fontawesome css files -->
    <link rel="stylesheet" href="../css/all.min.css">
    <link rel="stylesheet" href="../css/fontawesome.min.css">
    <!-- link font css file -->
    <link rel="stylesheet" href="../css/jquery.dataTables.min.css">
    <!-- link custom css file -->
    <link rel="stylesheet" href="../css/style.css">
</head>

<body class="">
    <div class="main-wrapper">
        <div class="menu-wrapper">
            <div class="top-menu custom-bg-primary shadow-sm py-2 ">
                <div class="container-fluid">
                    <nav class="d-flex justify-content-between">
                        <ul class="nav">
                            <li class="nav-item">
                                <span class="nav-link nav-btn" id="nav_btn"><i class="fa-solid fa-bars-staggered"></i></span>
                            </li>
                            <li class="nav-item">
                                <a class="custom-link top-logo" href="index.php"><?php if (isset($name)) {
                                                                                        echo $name;
                                                                                    } ?></a>
                            </li>
                        </ul>
                        <ul class="nav">
                            <li class="nav-item">
                                <a class="logout-btn" href="logout.php"><i class="fa-solid fa-sign-out"></i> Logout</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <div class="main-body">
            <div class="left-side">
                <div class="side-menu">
                    <div class="wrapper">
                        <ul class="nav flex-column py-2">
                            <li class="nav-item">
                                <a class="nav-link side-link border-bottom border-bottom <?php echo ($activePage == 'index') ? 'active' : '' ?>" href="index.php">
                                    <i class="fa-solid fa-chart-area"></i>
                                    <span>Dashboard</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link side-link border-bottom border-bottom <?php echo ($activePage == 'notice') ? 'active' : '' ?>" href="notice.php"> <i class="fa-solid fa-circle-exclamation"></i>
                                    <span>Notice</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link side-link border-bottom border-bottom <?php echo ($activePage == 'sliders') ? 'active' : '' ?>" href="sliders.php"> <i class="fa-solid fa-sliders"></i>
                                    <span>Slides</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link side-link border-bottom border-bottom <?php echo ($activePage == 'managing') ? 'active' : '' ?>" href="managing.php"> <i class="fa-solid fa-handshake"></i>
                                    <span>Meneging</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link side-link border-bottom border-bottom <?php echo ($activePage == 'teachers') ? 'active' : '' ?>" href="teachers.php"> <i class="fa-solid fa-chalkboard-user"></i>
                                    <span>Teachers</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link side-link border-bottom border-bottom <?php echo ($activePage == 'inbox') ? 'active' : '' ?>" href="inbox.php"> <i class="fa-solid fa-envelope"></i>
                                    <span>Inbox</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link side-link border-bottom border-bottom" href="../result/admin-login.php" target="_blank"> <i class="fa-solid fa-envelope"></i>
                                    <span>Result</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link side-link border-bottom border-bottom <?php echo ($activePage == 'pass') ? 'active' : '' ?>" href="pass.php"> <i class="fa-solid fa-lock"></i>
                                    <span>Password</span></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>


            <div class="right-side">
                <div class="content p-4 mt-5">