<?php
session_start();
require('inc/config.php');
include_once('inc/function.php');
$msg = '';
if (!isset($_SESSION['loggedin'])) {
    header('location: login.php');
}
?>
<?php include('inc/header.php'); ?>
<?php
$query = 'SELECT * FROM `teachers`';
$teachers = mysqli_query($connection, $query);
$query = 'SELECT * FROM `home_sliders`';
$sliders = mysqli_query($connection, $query);
$query = 'SELECT * FROM `notice`';
$notice = mysqli_query($connection, $query);

?>
<div class="row">
    <div class="col-md-6 mt-2 col-lg-4">
        <div class="card p-2 p-md-4 custom-bg">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-start">
                    <div class="dash-icon">
                        <i class="fa-solid fa-users"></i>
                    </div>
                    <div class="text ms-3">
                        <div class="d-flex align-items-start justify-content-center flex-column">
                            <a href="teachers.php" class="mb-0 h4 text-decoration-none custom-color-2">সর্বমোট শিক্ষক</a>
                            <h1 class="mb-0 custom-primary"><?php echo mysqli_num_rows($teachers); ?></h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 mt-2 col-lg-4">
        <div class="card p-2 p-md-4 custom-bg">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-start">
                    <div class="dash-icon">
                        <i class="fa-solid fa-bell"></i>
                    </div>
                    <div class="text ms-3">
                        <div class="d-flex align-items-start justify-content-center flex-column">
                            <a href="notice.php" class="mb-0 h4 text-decoration-none custom-color-2">সর্বমোট নোটিশ</a>
                            <h1 class="mb-0 custom-primary"><?php echo mysqli_num_rows($notice); ?></h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 mt-2 col-lg-4">
        <div class="card p-2 p-md-4 custom-bg">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-start">
                    <div class="dash-icon">
                        <i class="fa-solid fa-sliders"></i>
                    </div>
                    <div class="text ms-3">
                        <div class="d-flex align-items-start justify-content-center flex-column">
                            <a href="sliders.php" class="mb-0 h4 text-decoration-none custom-color-2">সর্বমোট স্লাইড</a>
                            <h1 class="mb-0 custom-primary"><?php echo mysqli_num_rows($sliders); ?></h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col mt-4">
        <div class="card p-2 custom-bg">
            <div class="card-header">
                <h5 class="mb-0">প্রাপ্ত বার্তা</h5>
            </div>
            <div class="card-body table-responsive-md">
                <?php
                $query = "SELECT * FROM `massage` ORDER BY `id` DESC LIMIT 5";
                $result = mysqli_query($connection, $query);
                if (mysqli_num_rows($result) == 0) {
                ?>
                    <div>
                        <p class="alert alert-warning text-center">দুঃখিত কিছু খোঁজে পাওয়া যায়নি।</p>
                    </div>
                <?php
                } else {
                ?>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>নাম</th>
                                <th>সময়</th>
                                <th>বার্তা</th>
                                <th>ইমেইল</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($data = mysqli_fetch_assoc($result)) {
                                $strdate = strtotime($data['date']);
                                $date = date("jS M Y",$strdate);
                                $time = date("h:i a",$strdate);
                            ?>
                                <tr>
                                    <td class="small"><?php echo $data['name']; ?></td>
                                    <td class="small"><?php echo $date. "</br>" .$time; ?></td>
                                    <td class="small w-50"><?php echo $data['massage']; ?></td>
                                    <td class="small"><?php echo $data['email']; ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <a href="inbox.php" class="custom-btn custom-btn-success">সবগুলো দেখুন</a>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>

<?php include('inc/footer.php'); ?>