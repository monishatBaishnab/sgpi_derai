<?php
// error_reporting(0);
date_default_timezone_set('Asia/Dhaka');
$activePage = basename($_SERVER['PHP_SELF'], ".php");
?>

<!DOCTYPE html>
<html lang="bn">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SGPI</title>
    <!-- link fontawesome css files -->
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <!-- link dataTable css file -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"> -->
    <link rel="stylesheet" href="css/swiper-bundle.min.css">
    <!-- link dataTable css file -->
    <link rel="stylesheet" href="css/jquery.dataTables.min.css">
    <!-- link bootstrap css file -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- link custom css file -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body class="">

    <header class="header shadow-sm bg-white py-2 fixed-top">
        <div class="container">
            <div class="nav justify-content-between larg-nav">
                <div class="nav">
                    <div class="logo">
                        <a href="index.php"><img src="images/sgpi_logo.png" class="sgpi_logo" alt="SGPI logo"></a>
                    </div>
                </div>
                <div class="nav">
                    <div class="d-flex align-items-center d-none d-md-flex">
                        <a href="index.php" class="py-2 mx-2 sgpi_link text-decoration-none py-2 <?php echo ($activePage == 'index') ? 'sgpi_active' : '' ?>">হোম</a>
                        <a href="about.php" class="py-2 mx-2 sgpi_link text-decoration-none py-2 <?php echo ($activePage == 'about') ? 'sgpi_active' : '' ?>">আমাদের সম্পর্কে</a>
                        <div class="dropdown drop">
                            <a href="javascript:void()" class="py-2 mx-2 sgpi_link text-decoration-none py-2 dropdown-toggle <?php echo ($activePage == 'computer' || $activePage == 'civil' || $activePage == 'electrical') ? 'sgpi_active' : '' ?>" id="dropdownMenuButton1" data-bs-toggle="dropdown">কোর্স সমুহ</a>
                            <ul class="dropdown-menu border-0 drop-menu" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item drop-item custom-color-3" href="computer.php">কম্পিউটার
                                        ডিপার্টমেন্ট</a>
                                </li>
                                <li><a class="dropdown-item drop-item custom-color-3" href="civil.php">সিভিল
                                        ডিপার্টমেন্ট</a></li>
                                <li><a class="dropdown-item drop-item custom-color-3" href="electrical.php">ইলেক্ট্রিক্যাল
                                        ডিপার্টমেন্ট</a></li>
                            </ul>
                        </div>
                        <a href="notice.php" class="py-2 mx-2 sgpi_link text-decoration-none py-2 <?php echo ($activePage == 'notice') ? 'sgpi_active' : '' ?>">নোটিশ</a>
                        <a href="contact.php" class="py-2 mx-2 sgpi_link text-decoration-none py-2 <?php echo ($activePage == 'contact') ? 'sgpi_active' : '' ?>">যোগাযোগ</a>
                    </div>
                    <div class="d-flex align-items-center d-md-none">
                        <a class="border-0 text-white custom-btn nav-btn" data-bs-toggle="offcanvas" href="#side_nav" aria-controls="side_nav">
                            <i class="fa-solid fa-bars-staggered"></i>
                            <!-- <i class="fa-solid fa-arrow-right-from-bracket"></i> -->
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="offcanvas offcanvas-start p-4 small-nav d-md-none" tabindex="-1" id="side_nav">
            <div class="offcanvas-header mb-3 justify-content-center border-bottom">
                <a href="index.php"><img src="images/sgpi_logo.png" class="sgpi_logo" alt="SGPI logo"></a>
                <button type="button" class="btn-close text-reset close-small-nav border" data-bs-dismiss="offcanvas"></button>
            </div>
            <div class="offcanvas-body">
                <div class="d-flex flex-column align-items-start">
                    <a href="index.php" class="w-100 sgpi_link text-decoration-none py-2 <?php echo ($activePage == 'index') ? 'sgpi_active' : '' ?>">হোম</a>
                    <a href="about.php" class="w-100 sgpi_link text-decoration-none py-2 <?php echo ($activePage == 'about') ? 'sgpi_active' : '' ?>">আমাদের সম্পর্কে</a>
                    <div class="dropdown drop">
                        <a href="javascript:void()" class="py-2 sgpi_link text-decoration-none py-2 dropdown-toggle <?php echo ($activePage == 'computer' || $activePage == 'civil' || $activePage == 'electrical') ? 'sgpi_active' : '' ?>" id="dropdownMenuButton1" data-bs-toggle="dropdown">কোর্স সমুহ</a>
                        <ul class="dropdown-menu border-0 drop-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item drop-item custom-color-3" href="computer.php">কম্পিউটার
                                    ডিপার্টমেন্ট</a></li>
                            <li><a class="dropdown-item drop-item custom-color-3" href="civil.php">সিভিল
                                    ডিপার্টমেন্ট</a></li>
                            <li><a class="dropdown-item drop-item custom-color-3" href="electrical.php">ইলেক্ট্রিক্যাল
                                    ডিপার্টমেন্ট</a></li>
                        </ul>
                    </div>
                    <a href="notice.php" class="w-100 sgpi_link text-decoration-none py-2 <?php echo ($activePage == 'notice') ? 'sgpi_active' : '' ?>">নোটিশ</a>
                    <a href="contact.php" class="w-100 sgpi_link text-decoration-none py-2 <?php echo ($activePage == 'contact') ? 'sgpi_active' : '' ?>">যোগাযোগ</a>
                </div>
            </div>
        </div>
    </header>
    <!-- end header_nav section -->