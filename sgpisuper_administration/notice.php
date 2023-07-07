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
$date = date('Y-m-d',strtotime('now'));
$details = filter_input(INPUT_POST, 'dtails', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$image = select_input_notice('image', '../upload/notice/');

if (isset($_POST['submit'])) {
    if ($date != '' && $details != '' && $image != '') {
        $query = "INSERT INTO `notice` (`date`,`details`,`notice`) VALUES ('$date', '$details','$image')";
        mysqli_query($connection, $query);
        header("location: notice.php");
    }
}

if (isset($_POST['update'])) {
    $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $new_date = date('Y-m-d',strtotime('now'));
    $new_details = filter_input(INPUT_POST, 'new-details', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $new_image = select_input_notice('new-image', '../upload/notice/');
    $old_image = filter_input(INPUT_POST, 'old-image', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    if ($new_date != '' && $new_details != '' && $old_image != '') {
        $query = "UPDATE `notice` SET `date`='$new_date',`details`='$new_details',`notice`='$old_image' WHERE `id`='$id'";
        mysqli_query($connection, $query);
    }
    if (!empty($new_image) && $new_image !== '') {
        $query = "UPDATE `notice` SET `notice` = '$new_image' WHERE `id`='$id'";
        mysqli_query($connection, $query);
        delete_image($teacher, 'maneging', $id, 'image', '../upload/', $connection);
    }
}

if (!empty($delete) && $delete !== '') {
    $id = $_GET['delete'];
    $teacher = select_data_from_id($connection, 'notice', $id);
    delete_image($teacher, 'notice', $id, 'notice', '../upload/notice/', $connection);
}
?>
<?php include('inc/header.php'); ?>


<div class="modal fade" id="notice">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
                <h4 class="custom-color-one m-0">তথ্য প্রদান করুন</h4>
            </div>
            <div class="modal-body">
                <form action="notice.php" method="post" enctype="multipart/form-data">
                    <label class="form-label mt-2" for="name">শিরোনাম</label>
                    <input class="form-control" type="text" name="dtails" id="name">
                    <label class="form-label mt-2" for="image">নোটিশ</label>
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
        <h4 class="custom-color-1">সকল নোটিশ</h4>
        <button class="custom-btn custom-btn-success" data-bs-toggle="modal" data-bs-target="#notice">নতুন যুক্ত করুন</button>
    </div>
    <ul class="nav">
        <li class="nav-item">
            <a class="px-1 custom-link" href="index.php">ড্যাশবোর্ড</a>
        </li>
        <li class="nav-item">
            <a class="nav-link px-1 disabled" href="">/</a>
        </li>
        <li class="nav-item">
            <a class="nav-link disabled px-1" href="">নোটিশ</a>
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
                $query = "SELECT * FROM `notice`";
                $result = mysqli_query($connection, $query);
                if (mysqli_num_rows($result) == 0) {
                ?>
                    <div>
                        <p class="alert alert-warning text-center">দুঃখিত কিছু খোঁজে পাওয়া যায়নি।</p>
                    </div>
                <?php
                } else {
                ?>
                    <table id="table" class="table table-striped table-bordered my-2">
                        <thead class="table_head">
                            <tr>
                                <th>ক্রমিক</th>
                                <th>শিরোনাম</th>
                                <th>প্রকাশের তারিখ</th>
                                <th>দেখুন</th>
                                <th>এডিট/ডিলিট</th>
                            </tr>
                        </thead>
                        <tbody class="table_body">
                            <?php
                            while ($data = mysqli_fetch_assoc($result)) {
                                $timestamp = strtotime($data['date']);
                                $date = date("jS M Y", $timestamp);
                            ?>
                                <tr>
                                    <td><?php echo $data['id']; ?></td>
                                    <td class="small"><?php echo $data['details']; ?></td>
                                    <td><?php echo $date; ?></td>
                                    <td><a href="../upload/notice/<?php echo $data['notice']; ?>" target="blank" class="custom-btn custom-btn-success"><i class="fa-solid fa-eye"></i></a></td>
                                    <td>
                                        <div class="d-flex justify-content-center align-items-center">
                                            <a href="notice.php?edit=<?php echo $data['id']; ?>" class="custom-btn custom-btn-success"><i class="fa-solid fa-edit"></i></a>
                                            <a href="notice.php?delete=<?php echo $data['id']; ?>" class="custom-btn custom-btn-danger ms-2 delete"><i class="fa-solid fa-trash-alt"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>ক্রমিক</th>
                                <th>শিরোনাম</th>
                                <th>প্রকাশের তারিখ</th>
                                <th>দেখুন</th>
                                <th>এডিট/ডিলিট</th>
                            </tr>
                        </tfoot>
                    </table>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
<?php
} else {
    $edit_data = select_data_from_id($connection, 'notice', $edit);
?>
    <div class="row justify-content-center">
        <div class="col-12 col-md-6">
            <h5 class="custom-danger mb-3">তথ্য পরিবর্তন করুন</h5>
            <form action="notice.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $edit_data['id']; ?>">
                <input type="hidden" name="old-image" value="<?php echo $edit_data['notice']; ?>">
                <label class="form-label mt-2" for="name">শিরোনাম</label>
                <input class="form-control" type="text" name="new-details" id="name" value="<?php echo $edit_data['details']; ?>">
                <label class="form-label mt-2" for="image">ছবি</label>
                <input class="form-control" type="file" name="new-image" id="image">
                <button type="submit" name="update" class="custom-btn custom-btn-success mt-2">সংরক্ষন</button>
                <a href="notice.php" class="custom-btn custom-btn-danger mt-2">বাতিল</a>
            </form>
        </div>
    </div>
<?php } ?>

<?php include('inc/footer.php'); ?>