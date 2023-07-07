<?php
include("inc/config.php");
include('inc/header.php');

if (isset($_POST['msg'])) {
    $name = filter_input(INPUT_POST, 'fname', FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $massage = filter_input(INPUT_POST, 'massage', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    if ($name != '' && $email != '' && $massage != '') {
        $date = date('Y-m-d h:i:s', strtotime('now'));
        $query = "INSERT INTO `massage`(`name`,`email`,`massage`,`date`) VALUES('$name','$email','$massage','$date')";
        mysqli_query($connection, $query);
        $success = 'সফলভাবে বার্তা প্রেরন করা হয়েছে।';
        // header("location: contact.php");
    } else {
        $error = 'দয়া করে সঠিক তথ্য প্রদান করুন।';
        // header('location: contact.php');
    }
}
?>
<?php if (isset($success) || isset($error)) : ?>
    <div class="massage position-absolute <?php echo (isset($success) ? 'success' : 'danger') ?> acive" style="z-index: 11111;">
        <div class="d-flex align-items-center">
            <i class="fa-solid fa-check-circle left"></i>
            <span><?php echo (isset($success) ? $success : $error) ?></span>
            <i onclick="this.parentElement.parentElement.remove();" class="fa-solid fa-close"></i>
        </div>
    </div>
<?php endif; ?>
<!-- start top title section -->
<section class="top_content" style="overflow:hidden;">
    <div class="row py-4 border-bottom text-center">
        <div class="col-12">
            <h2>যোগাযোগ করুন</h2>
        </div>
    </div>
</section>
<!-- end top title section -->
<section class="overflow-hidden">
    <div class="container">
        <div class="row py-4">
            <div class="col-md-6">
                <form action="" method="post">
                    <h4 class="custom-success">আমাদের কাছে বার্তা পাঠান</h4>
                    <label class="form-label mt-2" for="fname">আপনার নাম</label>
                    <input class="form-control" type="text" id="fname" name="fname" placeholder="আপনার নাম">
                    <label class="form-label mt-2" for="email">আপনার ইমেইল</label>
                    <input class="form-control" type="email" id="email" name="email" placeholder="আপনার ইমেইলনেম@gmail.com">
                    <label class="form-label mt-2" for="massage">আপনার বার্তা</label>
                    <textarea name="massage" id="massage" class="form-control" placeholder="বার্তা"></textarea>
                    <input type="submit" name="msg" value="বার্তা পাঠান" class="custom-btn custom-btn-success mt-2">
                </form>
            </div>
            <div class="col-md-6 mt-3 mt-md-0">
                <div class="map p-3 border">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14489.351372902205!2d91.357711!3d24.7838825!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x37512f486e581053%3A0x81ab986a9a6cfb61!2sSuranjit%20Sengupta%20Polytechnic%20Institute%20(SGPI)!5e0!3m2!1sbn!2sbd!4v1668077378305!5m2!1sbn!2sbd" style="border:0;min-height: 300px; width: 100%;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include('inc/footer.php'); ?>