<?php
session_start();
require('inc/config.php');
include_once('inc/function.php');
if (!isset($_SESSION['loggedin'])) {
    header('location: login.php');
}
$massage = '';
$edit = $_GET['edit'] ?? '';
$delete = $_GET['delete'] ?? '';
$title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$details = filter_input(INPUT_POST, 'details', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$image = select_input_file('image', '../upload/home-slider/');

if (isset($_POST['submit'])) {
    if ($title != '' && $details != '' && $image != '') {
        $query = "INSERT INTO `home_sliders` (`title`,`details`,`image`) VALUES ('$title', '$details','$image')";
        mysqli_query($connection, $query);
        header("location: sliders.php");
    }
}

if (isset($_POST['update'])) {
    $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $new_title = filter_input(INPUT_POST, 'new-title', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $new_details = filter_input(INPUT_POST, 'new-details', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $new_image = select_input_file('new-image', '../upload/home-slider/');
    $old_image = filter_input(INPUT_POST, 'old-image', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    if ($new_title != '' && $new_details != '' && $old_image != '') {
        $query = "UPDATE `home_sliders` SET `title`='$new_title',`details`='$new_details',`image`='$old_image' WHERE `id`='$id'";
        mysqli_query($connection, $query);
    }
    if (!empty($new_image) && $new_image !== '') {
        $query = "UPDATE `home_sliders` SET `image` = '$new_image' WHERE `id`='$id'";
        mysqli_query($connection, $query);
        unlink('../upload/home-slider/' . $old_image);
    }
}

if (!empty($delete) && $delete !== '') {
    $id = $_GET['delete'];
    $teacher = select_data_from_id($connection, 'home_sliders', $id);
    delete_image($teacher, 'home_sliders', $id, 'image', '../upload/home-slider/', $connection);
}
?>
<?php include('inc/header.php'); ?>


<div class="modal fade" id="home_sliders">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
                <h4 class="custom-color-one m-0">তথ্য প্রদান করুন</h4>
            </div>
            <div class="modal-body">
                <form action="#" method="post" enctype="multipart/form-data">
                    <label class="form-label mt-2" for="title">টাইটেল</label>
                    <input class="form-control" type="text" name="title" id="title" required>
                    <label class="form-label mt-2" for="detail">শিরোনাম</label>
                    <textarea class="form-control" name="details" id="detail" required></textarea>
                    <label class="form-label mt-2" for="image">ছবি</label>
                    <input class="form-control" type="file" name="image" id="image" required>
                    <button type="submit" name="submit" class="custom-btn custom-btn-success mt-2">সংরক্ষন</button>
                    <button class="custom-btn custom-btn-danger mt-2" data-bs-dismiss="modal">বাতিল</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="top-content pb-4">
    <div class="d-flex align-items-center justify-content-between border-bottom py-2">
        <h4 class="custom-color-1">সকল স্লাইড</h4>
        <button class="custom-btn custom-btn-success" data-bs-toggle="modal" data-bs-target="#home_sliders">নতুন যুক্ত করুন</button>
    </div>
    <ul class="nav">
        <li class="nav-item">
            <a class="px-1 custom-link" href="index.php">ড্যাশবোর্ড</a>
        </li>
        <li class="nav-item">
            <a class="nav-link px-1 disabled" href="">/</a>
        </li>
        <li class="nav-item">
            <a class="nav-link disabled px-1" href="">স্লাইডার</a>
        </li>
    </ul>
</div>
<?php
// echo $query;
?>
<?php if ($edit == '') { ?>
    <div class="row">
        <div class="col-12">
            <div class="table-responsive-lg">
                <?php
                $query = "SELECT * FROM `home_sliders`";
                $result = mysqli_query($connection, $query);
                if (mysqli_num_rows($result) == 0) {
                ?>
                    <div class="">
                        <p class="alert alert-warning text-center">দুঃখিত কিছু খোঁজে পাওয়া যায়নি।</p>
                    </div>
                <?php
                } else {
                ?>
                    <table class="table table-striped table-bordered">
                        <thead class="table_head">
                            <tr>
                                <th>ফটো</th>
                                <th>হেডিং ও শিরোনাম</th>
                                <th>এডিট/ডিলিট</th>
                            </tr>
                        </thead>
                        <tbody class="table_body">
                            <?php while ($data = mysqli_fetch_assoc($result)) { ?>
                                <tr>
                                    <td>
                                        <div class="teacher_img"><img src="../upload/home-slider/<?php echo $data['image']; ?>" class="img-thumbnail" alt="Teachers"></div>
                                    </td>
                                    <td>
                                        <div class="d-flex flex-column">
                                            <h6><?php echo $data['title']; ?></h6>
                                            <span class="small"><?php echo $data['details']; ?></span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-center align-items-center">
                                            <a href="sliders.php?edit=<?php echo $data['id']; ?>" class="custom-btn custom-btn-success"><i class="fa-solid fa-edit"></i></a>
                                            <a href="sliders.php?delete=<?php echo $data['id']; ?>" class="custom-btn custom-btn-danger ms-2 delete"><i class="fa-solid fa-trash-alt"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
<?php
} else {
    $edit_data = select_data_from_id($connection, 'home_sliders', $edit);
?>
    <div class="row justify-content-center">
        <div class="col-12 col-md-6">
            <h5 class="custom-danger mb-3">তথ্য পরিবর্তন করুন</h5>
            <form action="sliders.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $edit_data['id']; ?>">
                <input type="hidden" name="old-image" value="<?php echo $edit_data['image']; ?>">
                <label class="form-label mt-2" for="fname">টাইটেল</label>
                <input class="form-control" type="text" name="new-title" id="fname" value="<?php echo $edit_data['title']; ?>">
                <label class="form-label mt-2" for="post">শিরোনাম</label>
                <textarea class="form-control" name="new-details" id="fname"><?php echo $edit_data['details']; ?></textarea>
                <label class="form-label mt-2" for="image">ছবি</label>
                <input class="form-control" type="file" name="new-image" id="image">
                <button type="submit" name="update" class="custom-btn custom-btn-success mt-2">সংরক্ষন</button>
                <a href="sliders.php" class="custom-btn custom-btn-danger mt-2">বাতিল</a>
            </form>
        </div>
    </div>
<?php } ?>

<?php include('inc/footer.php'); ?>