<?php
include('inc/config.php');
include('inc/header.php');
?>
<!-- start top title section -->
<section class="top_content" style="overflow:hidden;">
    <div class="row py-4 border-bottom text-center">
        <div class="col-12">
            <h2>সকল নোটিশ</h2>
        </div>
    </div>
</section>
<!-- end top title section -->
<section class="py-5" id="notice">
    <div class="container">
        <div class="table-responsive-md">
            <table id="table" class="table table-striped table-bordered table-hover my-2">
            <thead>
                <tr>
                    <th>ক্রমিক</th>
                    <th>শিরোনাম</th>
                    <th>প্রকাশের তারিখ</th>
                    <th>দেখুন</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $nquery = "SELECT * FROM `notice`";
                $notice = mysqli_query($connection, $nquery);
                if (mysqli_num_rows($notice) > 0) :
                    while ($ndata = mysqli_fetch_assoc($notice)) :
                        $timestamp = strtotime($ndata['date']);
                        $date = date("jS M Y", $timestamp);
                ?>
                        <tr>
                            <td><?php echo $ndata['id']; ?></td>
                            <td class="small"><?php echo $ndata['details']; ?></td>
                            <td><?php echo $date; ?></td>
                            <td><a target="_blank" href="upload/notice/<?php echo $ndata['notice']; ?>" class="notice-open-icon custom-btn custom-btn-success fa-solid fa-eye"></a></td>
                        </tr>
                <?php
                    endwhile;
                endif;
                ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>ক্রমিক</th>
                    <th>শিরোনাম</th>
                    <th>প্রকাশের তারিখ</th>
                    <th>দেখুন</th>
                </tr>
            </tfoot>
        </table>
        </div>
    </div>
</section>
<?php include('inc/footer.php'); ?>