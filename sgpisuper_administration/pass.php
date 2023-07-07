<?php
session_start();
require('inc/config.php');
include_once('inc/function.php');
if (!isset($_SESSION['loggedin'])) {
    header('location: login.php');
}
if (isset($_POST['chpass'])) {
    $old_pass = filter_input(INPUT_POST, 'old-pass', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $new_pass = filter_input(INPUT_POST, 'new-pass', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $cnew_pass = filter_input(INPUT_POST, 'cnew-pass', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    if ($new_pass == $cnew_pass) {
        $query = "SELECT `pass` FROM `admin`";
        $result = mysqli_fetch_assoc(mysqli_query($connection, $query));
        $pass = $result['pass'];
        $n_pass = md5($new_pass);
        if ($pass == md5($old_pass)) {
            $query = "UPDATE `admin` SET `pass`='$n_pass'";
            mysqli_query($connection, $query);
            // $error = "Password change successfully";
            $error = 1;
        } else {
            // $msg = "New password not match";
            $error = 2;
        }
    } else {
        // $msg = "Confirm password not match";
        $error = 3;
    }
}
?>
<?php include('inc/header.php'); ?>
<div class="msg alert <?php echo ($error == 3 || $error == 2) ? "alert-danger" : "alert-success"; ?> <?php echo (isset($error) && $error != '') ? 'active' : ''; ?>" style="z-index: 11111;">
    <div class="d-flex align-items-center justify-content-around">
        <span><?php 
        if($error == 1){
            echo "Password change successfully";
        }elseif($error == 2){
            echo "New password not match";
        }elseif($error == 3){
            echo "Confirm password not match";
        }
        ?></span>
        <i class="fa-solid fa-close" onclick="this.parentElement.parentElement.remove();" id="close_msg"></i>
    </div>
</div>

<div class="top-content pb-4">
    <div class="d-flex align-items-center justify-content-between border-bottom py-2">
        <h4 class="custom-color-1">পাসওয়ার্ড পরিবর্তন করুন</h4>
    </div>
    <ul class="nav">
        <li class="nav-item">
            <a class="px-1 custom-link" href="index.html">ড্যাশবোর্ড</a>
        </li>
        <li class="nav-item">
            <a class="nav-link px-1 disabled" href="">/</a>
        </li>
        <li class="nav-item">
            <a class="nav-link disabled px-1" href="">পাস</a>
        </li>
    </ul>
</div>
<?php print_r(isset($msg) ? $msg : ''); ?>
<form action="" method="POST">
    <label class="form-label mt-2" for="oldpass">পূর্বের পাসওয়ার্ড লিখুন</label>
    <input class="form-control" type="password" name="old-pass" id="oldpass" placeholder="পুরাতন পাসওয়ার্ড" required>
    <label class="form-label mt-2" for="newpass">নতুন পাসওয়ার্ড লিখুন</label>
    <input class="form-control" type="password" name="new-pass" id="newpass" placeholder="নতুন পাসওয়ার্ড" required>
    <label class="form-label mt-2" for="cnewpass">পাসওয়ার্ড নিশ্চিত করুন</label>
    <input class="form-control" type="password" name="cnew-pass" id="cnewpass" placeholder="পাসওয়ার্ড নিশ্চিত করুন" required>
    <input type="submit" class="custom-btn custom-btn-success mt-2" name="chpass" value="পরিবর্তন করুন">
    <a href="index.php" class="custom-btn custom-btn-danger mt-2">বাতিল করুন</a>
</form>
<?php include('inc/footer.php'); ?>