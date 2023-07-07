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
$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$post = filter_input(INPUT_POST, 'post', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$mobile = filter_input(INPUT_POST, 'mobile', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$image = select_input_file('image', '../upload/');

if (isset($_POST['submit'])) {
    if ($name != '' && $post != '' && $mobile != '' && $image != '') {
        $query = "INSERT INTO `teachers` (`name`,`post`,`mobile`,`image`) VALUES ('$name', '$post','$mobile','$image')";
        mysqli_query($connection, $query);
        header("location: teachers.php");
    }
}

if (isset($_POST['update'])) {
    $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $new_name = filter_input(INPUT_POST, 'new-name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $new_post = filter_input(INPUT_POST, 'new-post', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $new_mobile = filter_input(INPUT_POST, 'new-mobile', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $new_image = select_input_file('new-image', '../upload/');
    $old_image = filter_input(INPUT_POST, 'old-image', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    if ($new_name != '' && $new_post != '' && $new_mobile != '') {
        $query = "UPDATE `teachers` SET `name`='$new_name',`post`='$new_post',`mobile`='$new_mobile',`image`='$old_image' WHERE `id`='$id'";
        mysqli_query($connection, $query);
    }
    if (!empty($new_image) && $new_image !== '') {
        $query = "UPDATE `teachers` SET `image` = '$new_image' WHERE `id`='$id'";
        mysqli_query($connection, $query);
        // $teacher = select_data_from_id($connection, 'teachers', $id);
        delete_image($teacher, 'teachers', $id ,'image', '../upload/', $connection);
    }
}

if (!empty($delete) && $delete !== '') {
    $id = $_GET['delete'];
    $teacher = select_data_from_id($connection, 'teachers', $id);
    delete_image($teacher, 'teachers', $id ,'image', '../upload/', $connection);
    $query = "DELETE FROM `teachers` WHERE `id`='$id'";
    mysqli_query($connection, $query);
}
?>
<?php include('inc/header.php'); ?>


<div class="modal fade" id="teachers">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
                <h4 class="custom-color-one m-0">তথ্য প্রদান করুন</h4>
            </div>
            <div class="modal-body">
                <form action="#" method="post" enctype="multipart/form-data">
                    <label class="form-label mt-2" for="fname">সম্পূর্ণ নাম</label>
                    <input class="form-control" type="text" name="name" id="fname" required>
                    <label class="form-label mt-2" for="post">পদবী</label>
                    <input class="form-control" type="text" name="post" id="post" required>
                    <label class="form-label mt-2" for="mobile">মোবাইল</label>
                    <input class="form-control" type="text" name="mobile" id="mobile" required>
                    <label class="form-label mt-2" for="image">ছবি</label>
                    <input class="form-control" type="file" name="image" id="image" required>
                    <button type="submit" name="submit" class="custom-btn custom-btn-success mt-2">সংরক্ষন</button>
                    <button class="custom-btn custom-btn-danger mt-2" data-bs-dismiss="modal">বাতিল</button>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- start top content section -->
<div class="top-content pb-4">
    <div class="d-flex align-items-center justify-content-between border-bottom py-2">
        <h4 class="custom-color-1">সকল শিক্ষক</h4>
        <button class="custom-btn custom-btn-success" data-bs-toggle="modal" data-bs-target="#teachers">নতুন যুক্ত করুন</button>
    </div>
    <ul class="nav">
        <li class="nav-item">
            <a class="px-1 custom-link" href="index.php">ড্যাশবোর্ড</a>
        </li>
        <li class="nav-item">
            <a class="nav-link px-1 disabled" href="">/</a>
        </li>
        <li class="nav-item">
            <a class="nav-link disabled px-1" href="">শিক্ষক</a>
        </li>
    </ul>
</div>

<!-- start teachers section -->
<?php if ($edit == '') { ?>
    <div class="row">
        <div class="col-12">
            <div class="table-responsive-lg">
                <?php
                $query = "SELECT * FROM `teachers`";
                $result = mysqli_query($connection, $query);
                if (mysqli_num_rows($result) == 0) {
                ?>
                    <div class="">
                        <p class="alert alert-warning text-center">দুঃখিত কোনো শিক্ষক নেই।</p>
                    </div>
                <?php
                } else {
                ?>
                    <table class="table table-striped table-bordered">
                        <thead class="table_head">
                            <tr>
                                <th>ফটো</th>
                                <th>নাম ও পদবী</th>
                                <th>মোবাইল</th>
                                <th>এডিট/ডিলিট</th>
                            </tr>
                        </thead>
                        <tbody class="table_body">
                            <?php while ($data = mysqli_fetch_assoc($result)) { ?>
                                <tr>
                                    <td>
                                        <div class="teacher_img"><img src="../upload/<?php echo $data['image']; ?>" class="img-thumbnail" alt="Teachers"></div>
                                    </td>
                                    <td>
                                        <div class="d-flex flex-column align-items-center justify-content-center">
                                            <h5><?php echo $data['name']; ?></h5>
                                            <span class="custom-color-2"><?php echo $data['post']; ?></span>
                                        </div>
                                    </td>
                                    <td><?php echo $data['mobile']; ?></td>
                                    <td>
                                        <div class="d-flex justify-content-center align-items-center">
                                            <div class="d-flex justify-content-center align-items-center">
                                                <a href="teachers.php?edit=<?php echo $data['id']; ?>" class="custom-btn custom-btn-success"><i class="fa-solid fa-edit"></i></a>
                                                <a href="teachers.php?delete=<?php echo $data['id']; ?>" class="custom-btn custom-btn-danger ms-2 delete"><i class="fa-solid fa-trash-alt"></i></a>
                                            </div>
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
    $edit_data = select_data_from_id($connection, 'teachers', $edit);
?>
    <div class="row justify-content-center">
        <div class="col-12 col-md-6">
            <h5 class="custom-danger mb-3">তথ্য পরিবর্তন করুন</h5>
            <form action="teachers.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $edit_data['id']; ?>">
                <input type="hidden" name="old-image" value="<?php echo $edit_data['image']; ?>">
                <label class="form-label mt-2" for="fname">সম্পূর্ণ নাম</label>
                <input class="form-control" type="text" name="new-name" id="fname" value="<?php echo $edit_data['name']; ?>">
                <label class="form-label mt-2" for="post">পদবী</label>
                <input class="form-control" type="text" name="new-post" id="post" value="<?php echo $edit_data['post']; ?>">
                <label class="form-label mt-2" for="mobile">মোবাইল</label>
                <input class="form-control" type="text" name="new-mobile" id="mobile" value="<?php echo $edit_data['mobile']; ?>">
                <label class="form-label mt-2" for="image">ছবি</label>
                <input class="form-control" type="file" name="new-image" id="image">
                <button type="submit" name="update" class="custom-btn custom-btn-success mt-2">সংরক্ষন</button>
                <a href="teachers.php" class="custom-btn custom-btn-danger mt-2">বাতিল</a>
            </form>
        </div>
    </div>
<?php } ?>

<?php include('inc/footer.php'); ?>