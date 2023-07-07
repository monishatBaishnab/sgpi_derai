<?php
session_start();
require('inc/config.php');
include_once('inc/function.php');
$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
if (!$connection) {
    throw new \Exception("Cannot connection to database.");
}
$error = '';
$user_name = filter_input(INPUT_POST, 'user-name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$query = "SELECT * FROM `admin`";
$result = mysqli_query($connection, $query);
while ($data = mysqli_fetch_assoc($result)) {
    $name = $data['name'];
    $user = $data['user_name'];
    $pass = $data['pass'];
}
if (isset($_POST['login'])) {
    if ($user_name == $user && md5($password) == $pass) {
        $_SESSION['loggedin'] = true;
        $_SESSION['user-name'] = $user_name;
        $_SESSION['name'] = $name;
        header('location: index.php');
    } else {
        $error = "Sorry! username or password not match.";
    }
}
if(isset($_POST['register'])){
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $user_name = filter_input(INPUT_POST, 'user-name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $password = md5(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
    $query = "INSERT INTO `admin`(`name`,`user_name`,`pass`) VALUES('$name','$user_name','$password')";
    mysqli_query($connection, $query);
    header('location: login.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- link fontawesome css file -->
    <link rel="stylesheet" href="../css/all.min.css">
    <link rel="stylesheet" href="../css/fontawesome.min.css">
    <!-- link bootstrap css file -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!-- link custom css file -->
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>

    <div class="msg alert alert-danger <?php echo (isset($error) && $error != '') ? 'active' : ''; ?>">
        <div class="d-flex align-items-center justify-content-around">
            <span><?php print($error); ?></span>
            <i class="fa-solid fa-close" onclick="this.parentElement.parentElement.remove();" id="close_msg"></i>
        </div>
    </div>

    <div class="login overflow-hidden">
        <div class="row">
            <div class="col-12">
                <div class="login-page mx-auto">
                    <div class="custom-bg p-4 rounded">

                        <?php if (isset($result) && mysqli_num_rows($result) == 0) : ?>
                            <form method="POST" action="login.php">
                                <label class="form-label mt-2" for="name">নাম</label>
                                <input type="text" class="form-control" name="name" id="name">
                                <label class="form-label mt-2" for="user-name">ইউজার নেম</label>
                                <input type="text" class="form-control" name="user-name" id="user-name">
                                <label class="form-label mt-2" for="password">পাসওয়ার্ড</label>
                                <input type="password" class="form-control" name="password" id="password">
                                <input type="submit" name="register" class="custom-btn mt-3 w-100" value="রেজিস্ট্রেশন করুন">
                            </form>
                        <?php else : ?>
                            <form method="POST">
                                <label class="form-label mt-2" for="user-name">ইউজার নেম</label>
                                <input type="text" class="form-control" name="user-name" id="user-name">
                                <label class="form-label mt-2" for="password">পাসওয়ার্ড</label>
                                <input type="password" class="form-control" name="password" id="password">
                                <input type="submit" name="login" class="custom-btn mt-3 w-100" value="লগ ইন">
                            </form>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <!-- link bootstrap js file -->
    <script src="../js/bootstrap.bundle.min.js"></script>
    <!-- link custom js file -->
    <script src="../js/script.js"></script>
</body>

</html>