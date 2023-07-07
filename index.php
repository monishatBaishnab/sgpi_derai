<?php
// include("inc/config.php");
$connection = mysqli_connect('localhost', 'root', '', 'sgpi-derai');
mysqli_query($connection,'SET CHARACTER SET utf8'); 
$query = "SELECT * FROM `home_sliders`";
$sliders = mysqli_query($connection, $query);
?>
<?php include('inc/header.php'); ?>
<!-- start home sectio -->
<section class="home" id="home">
    <div class="home_container container">
        <div class="swiper sgpiSwiperhome">
            <div class="swiper-wrapper">
                <?php
                if (mysqli_num_rows($sliders) > 0) :
                    while ($sdata = mysqli_fetch_assoc($sliders)) :
                ?>
                        <div class="swiper-slide sp-home">
                            <div class="swipper-caption">
                                <h1><?php echo $sdata['title']; ?></h1>
                                <p><?php echo $sdata['details']; ?></p>
                            </div>
                            <img src="upload/home-slider/<?php echo $sdata['image']; ?>" alt="SGPI images">
                        </div>
                <?php
                    endwhile;
                endif;
                ?>

            </div>
            <div class="swiper-pagination"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>
    </div>
    <div class="container pt-4">
        <div class="row pt-4">
            <div class="col-12">
                <h2> <img src="images/notice.png" class="notice_img" alt="Notice"> নোটিশ বোর্ড</h2>
            </div>
            <div class="col-lg-8">
                <div class="list-group list-group-flush">
                    <?php
                    $nquery = "SELECT * FROM `notice` ORDER BY `id` DESC LIMIT 4";
                    $notice = mysqli_query($connection, $nquery);
                    if (mysqli_num_rows($notice) > 0) :
                        while ($ndata = mysqli_fetch_assoc($notice)) :
                    ?>
                            <a target="_blank" href="upload/notice/<?php echo $ndata['notice']; ?>" class="list-group-item custom-link custom-link-blue"><?php echo $ndata['details']; ?></a>
                    <?php
                        endwhile;
                    endif;
                    ?>
                </div>
                <a href="notice.php" class="custom-btn custom-btn-success mt-3">সব দেখুন</a>
            </div>
        </div>
    </div>
</section>
<!-- end home section -->
<!-- start course section -->

<section id="course" class="course bg-white py-4">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="sgpi_red">আমাদের কোর্স সমূহ</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 mt-2">
                <div class="card">
                    <div class="d-flex justify-content-center py-3">
                        <img src="images/data-science.png" class="card-img-top course_img" alt="Computer">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title text-center custom-primary">ডিপ্লোমা ইন কম্পিউটার ইঞ্জিনিয়ারিং</h5>
                        <p class="">একমাত্র কম্পিউটার টেকনোলজিই পারে বহুমুখি কর্মসংস্থানের সুযোগ করে দিতে।
                            অর্থনৈতিকভাবে সমৃদ্ধ দেশ হিসাবে ডিজিটাল বাংলাদেশ গড়ার ক্ষেত্রে কম্পিউটার টেকনোলজি
                            অপরিহার্য। ২০১১ সালে প্রতিটি কোর্সে কম্পিউটার বাধ্যতামুলক করা হয়েছে।</p>
                        <a href="computer.php" class="custom-btn">আরো পড়ুন..</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mt-2">
                <div class="card">
                    <div class="d-flex justify-content-center py-3">
                        <img src="images/engineer(1).png" class="card-img-top course_img" alt="Civil">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title text-center custom-success">ডিপ্লোমা ইন সিভিল ইঞ্জিনিয়ারিং</h5>
                        <p class="">পৃথিবীতে উন্নত রাষ্ট্রগুলো ক্রমেই উন্নত হচ্ছে এবং উন্নয়নশীর রাষ্ট্রগুলো
                            উন্নতির দিকে ধাবিত হচ্ছে। রাষ্ট্র উন্নয়ন বলতে বুঝায় সে দেশের অর্থনৈতিক অবকাঠামো, যাতায়াত
                            ব্যবস্থা উন্নয়ন এব ইমারতগুলোর উন্নয়ন। ব্যবস্থা উন্নয়ন এব ইমারতগুলোর উন্নয়ন।</p>
                        <a href="civil.php" class="custom-btn custom-btn-success">আরো পড়ুন..</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mt-2">
                <div class="card">
                    <div class="d-flex justify-content-center py-3">
                        <img src="images/engineering.png" class="card-img-top course_img" alt="Electrical">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title text-center custom-blue">ডিপ্লোমা ইন ইলেক্ট্রিক্যাল ইঞ্জিনিয়ারিং</h5>
                        <p class="">বিজ্ঞানী ভোল্টা কর্তৃক Electricity আবিস্কারের পর থেকেই মূলতঃ আধুনিক
                            সভ্যতার যাত্রা শুরু। Electricity ছাড়া আমাদের জীবন যেমন অচল, Electrical Technology ছাড়াও
                            পৃথিবী তেমনি অচল। কৃষি নির্ভর এবং শিল্পনির্ভর অর্থনীতি।</p>
                        <a href="electrical.php" class="custom-btn custom-btn-blue">আরো পড়ুন..</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end course section -->

<section class="py-4">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2 class="custom-primary">কেন আমাদের পলিটেকনিকেই?</h2>
                <ul class="list-group list-group-numbered">
                    <li class="list-group-item border-0 py-1">আমাদের রয়েছে মানসম্মত নিজস্ব ক্যাম্পাস।</li>
                    <li class="list-group-item border-0 py-1">বিশেষ ছাড়: A+ প্রাপ্তদের ৫০% এবং A প্রাপ্তদের ৩০%।</li>
                    <li class="list-group-item border-0 py-1">মান সম্পন্ন শিক্ষক দ্বারা পাঠদান করানো হয়।</li>
                    <li class="list-group-item border-0 py-1">মান সম্মত বিষয় ভিত্তিক ল্যাব থাকার কারণে হাতে কলমে কাজ শেখার সুযোগ।</li>
                    <li class="list-group-item border-0 py-1">নিজস্ব আবাসিক ব্যবস্থা।</li>
                    <li class="list-group-item border-0 py-1">সম্পূর্ণ ধুমপান ও ছাত্র রাজনীতি মুক্ত ক্যাম্পাস।</li>
                    <li class="list-group-item border-0 py-1">কোন সেশন জট নাই।</li>
                    <li class="list-group-item border-0 py-1">পড়াশোনার পাশাপাশি মানসিক বিকাশের জন্য খেলাধুলার ব্যাবস্থা রয়েছে।</li>
                    <li class="list-group-item border-0 py-1">রুটিন মাফিক ক্লাস হওয়ার প্রাইভেট পড়ার প্রয়োজন নেই।</li>
                </ul>
            </div>
            <div class="col-md-6">
                <img src="images/wh.jpg" class="img-fluid why" alt="Why?" style="max-height: 400px">
            </div>
        </div>
    </div>
</section>

<!-- start extra curicolum section -->
<section class="extrac py-4">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="custom-success">কো-কারিকুলার একটিভিটিস</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mt-4 mt-md-0">
                <img src="images/curriculum.png" class="img-fluid" alt="Extracurricular" style="max-height: 400px">
            </div>
            <div class="col-md-6">
                <div class="mt-4 mt-md-2">
                    <div class="ms-2">
                        <h3>শারিরিক বিকাশ</h3>
                        <p class="custom-text-justify">এটি সাধারণত খেলাধুলার সাথে সম্পর্কিত এবং এতে শারীরিক ব্যায়াম জড়িত থাকে । আমাদের
                            শিক্ষার্থীরা খেলাধুলা বা অন্যান্য শারীরিক কার্যক্রমে সক্রিয়ভাবে অংশগ্রহণ করে থাকে ।</p>
                    </div>
                </div>
                <div class="mt-2">
                    <div class="ms-2">
                        <h3>কালচারাল ডেভেলপমেন্ট </h3>
                        <p class="custom-text-justify">এছাড়া আমাদের শিক্ষার্থীরা পিকনিক, শিক্ষামূলক ট্যুর, শিল্প পরিদর্শন, সামাজিক কাজ,
                            স্বেচ্ছাসেবক, স্কাউটিং, উৎসব পরিচালনা, সাংস্কৃতিক অনুষ্ঠানের আয়োজন করা ইত্যাদি
                            কার্যক্রমে সক্রিয়ভাবে অংশগ্রহণ করে থাকে । </p>
                    </div>
                </div>
                <div class="mt-2">
                    <div class="ms-2">
                        <h3>একাডেমিক রিলেটেড </h3>
                        <p class="custom-text-justify">খেলাধুলা বা নাচ যেমন কারো জন্য শখ হতে পারে, তেমনি একদল ছাত্র আছে যারা সত্যিই জ্ঞান সংগ্রহ
                            করতে উপভোগ করে। আমাদের শিক্ষার্থীরা বই ক্লাব, প্রদর্শনীর আয়োজন, কবিতা আবৃত্তি, বিতর্ক,
                            গল্প-লেখা, চার্ট প্রস্তুত করা, ইনস্টিটিউট ম্যাগাজিন পত্রিকার সম্পাদনা ইত্যাদি কার্যক্রমে
                            সক্রিয়ভাবে অংশগ্রহণ করে থাকে । </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end extra section -->
<?php include('inc/footer.php'); ?>