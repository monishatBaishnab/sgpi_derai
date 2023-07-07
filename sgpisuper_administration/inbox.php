<?php
session_start();
require('inc/config.php');
include_once('inc/function.php');
if (!isset($_SESSION['loggedin'])) {
    header('location: login.php');
}
$answer = $_GET['answer'] ?? '';
$delete = $_GET['delete'] ?? '';
if($delete != ''){
    $select_data = select_data_from_id($connection,'massage',$delete);
    $query = "DELETE FROM `massage` WHERE `id`=$delete";
    mysqli_query($connection,$query);
}
?>
<?php include('inc/header.php');?>

<div class="top-content pb-4">
    <div class="d-flex align-items-center border-bottom py-2">
        <h4 class="custom-color-1">সকল বার্তা</h4>
    </div>
    <ul class="nav">
        <li class="nav-item">
            <a class="px-1 custom-link" href="index.php">ড্যাশবোর্ড</a>
        </li>
        <li class="nav-item">
            <a class="nav-link px-1 disabled" href="">/</a>
        </li>
        <li class="nav-item">
            <a class="nav-link disabled px-1" href="">বার্তা</a>
        </li>
    </ul>
</div>
<div class="row">
    <div class="col mt-4">
        <?php 
        if($answer==''){
            ?>
            <div class="card p-2 custom-bg">
                <div class="card-header">
                    <h5 class="mb-0">প্রাপ্ত বার্তা</h5>
                </div>
                <div class="card-body table-responsive-md">
                    <?php
                    $query = "SELECT * FROM `massage` ORDER BY `id` DESC";
                    $result = mysqli_query($connection, $query);
                    if (mysqli_num_rows($result) == 0) {
                    ?>
                        <div>
                            <p class="alert alert-warning text-center">দুঃখিত কিছু খোঁজে পাওয়া যায়নি।</p>
                        </div>
                    <?php
                    }
                    else{
                        ?>
                        <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>নাম</th>
                                <th>সময়</th>
                                <th>বার্তা</th>
                                <th>ইমেইল</th>
                                <th>উত্তর প্রদান/ডিলিট</th>
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
                                <td class="small"><?php echo $data['name'];?></td>
                                <td class="small"><?php echo $date. "</br>" .$time;?></td>
                                <td class="small w-50"><?php echo $data['massage'];?></td>
                                <td class="small"><?php echo $data['email'];?></td>
    
                                <td>
                                    <div class="d-flex justify-content-center align-items-center">
                                        <a href="inbox.php?answer=<?php echo $data['id'];?>" class="custom-btn custom-btn-success"><i class="fa-solid fa-arrow-up-right-from-square"></i></a>
                                        <a href="inbox.php?delete=<?php echo $data['id'];?>" class="custom-btn custom-btn-danger ms-2 delete"><i class="fa-solid fa-trash-alt"></i></a>
                                    </div>
                                </td>
                            </tr>
                            <?php }?>
                        </tbody>
                    </table>
                        <?php
                    }
                    ?>
                </div>
            </div>
            <?php
        }
        else{
            $answer_data = select_data_from_id($connection,'massage',$answer);
            // print_r($answer_data);

        ?>
        <form action="inbox.php" method="POST">
            <label class="form-label mt-2" for="from">প্রেরক</label>
            <input class="form-control" type="email" value="sgpi@gmail.com" disabled id="from">
            <label class="form-label mt-2" for="to">প্রাপক</label>
            <input class="form-control" type="email" value="<?php echo $answer_data['email']; ?>" id="to" disabled>
            <label class="form-label mt-2" for="massage">বার্তা</label>
            <textarea class="form-control" name="massage" id="massage" required></textarea>
            <input type="submit" name="answer" class="custom-btn custom-btn-success mt-2" value="পাঠান">
            <a href="inbox.php" class="custom-btn custom-btn-danger">বাতিল</a>
        </form>
        <?php 
        }
        ?>
    </div>
</div>

<?php include('inc/footer.php');?>