<!DOCTYPE html>
<html dir="rtl" lang="fa">

<head>
    <title><?= APP_NAME ?></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,height=device-height,initial-scale=1,maximum-scale=1">
    <link rel="shortcut icon" href="<?= asset('/images/favicon.ico') ?>">
    <link rel="stylesheet" href="<?= asset('/css/icons.min.css') ?>">
    <link rel="stylesheet" href="<?= asset('/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= asset('/css/plugins.min.css') ?>">
    <link rel="stylesheet" href="<?= asset('/css/colors.css') ?>">
    <link rel="stylesheet" href="<?= asset('/css/styles.css') ?>">
</head>
<body>

<?php include_once APP_ROOT . '/views/layouts/navbar.php' ?>

<section class="section-breadcrumb overlay-color"
         style="background-image:url(<?= asset('/images/breadcrumb/1.jpg') ?>)">
    <span class="bg-color bg-dark-60"></span>
    <div class="container pt-90 pb-90 vertical-wrap">
        <div class="vertical-inner text-center">
            <h1>درباره ما<span>درباره ما</span></h1>
        </div>
        <div class="breadcrumb-box">
            <div class="row row-0">
                <div class="col-12 col-sm-8">
                    <ol class="breadcrumb text-light">
                        <li>
                            <a href="about-us-2.html#" class="breadcrumb-icon">
                                <i class="fa fa-home"></i>
                            </a>
                        </li>
                        <li>
                            <a href="about-us-2.html#">صفحات</a>
                        </li>
                        <li class="active">درباره ما</li>
                    </ol>
                </div>
                <div class="col-12 col-sm-4">
                    <div class="breadcrumb-search text-right">
                        <button class="button button-circle">
                            <i class="fa fa-search"></i>
                        </button>
                        <input type="text" placeholder="جستجو ...">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section section-users section-users-2 section-divider">
    <div class="container">
        <div class="section-title section-title-2 div-center text-center max-w-576">
            <h2>تیم ما</h2>
            <h3>ملاقات تیم ما</h3>
            <p>
                <span class="divider divider-line"></span>
                تیم حرفه ای ما بهترین خدمات و پشتیبانی عالی را به شما ارائه می دهد..
            </p>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <?php foreach($data['members'] as $member): ?>
                <div class="col-6 col-sm-6 col-md-6 col-lg-3">
                    <div class="user-item">
                        <div class="user-image"
                            style="background-image: url(<?= asset('/images/team/' . $member->profile) ?>);"></div>
                        <div class="user-details">
                            <h4 class="user-name"><?= $member->name ?></h4>
                            <p><?= $member->job_title ?></p>
                            <ul class="user-social-icons">
                                <li>
                                    <a href="<?= $member->instagram ?>">
                                        <i class="fa fa-instagram"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= $member->twitter ?>">
                                        <i class="fa fa-twitter"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= $member->facebook ?>">
                                        <i class="fa fa-facebook"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= $member->linkedin ?>">
                                        <i class="fa fa-linkedin"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="section section-about-us section-about-us-2 section-divider">
    <div class="container">
        <div class="owl-carousel" data-items="1" data-nav="true">
            <div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                        <div class="about-us-box">
                            <div class="about-us-image"
                                 style="background-image: url(<?= asset('/images/about/about-us-2-1.jpg') ?>)"></div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                        <div class="inner text-left">
                            <h2>
                                <span>کاری که ما انجام می دهیم</span>
                                استراتژی بسازید ، تجارت خود را بسازید.
                            </h2>
                            <div class="divider divider-line"></div>
                            <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک
                                است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است.</p>
                            <div class="feature-item pt-30">
                                <div class="row row-sm">
                                    <div class="col-3 col-sm-2">
                                        <i class="fa fa-flask"></i>
                                    </div>
                                    <div class="col-9 col-sm-10">
                                        <b>ما آینده می سازیم</b>
                                        <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از
                                            طراحان گرافیک است. .</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                        <div class="about-us-box">
                            <div class="about-us-image"
                                 style="background-image: url(<?= asset('/images/about/about-us-2-2.jpg') ?>)"></div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                        <div class="inner text-left">
                            <h2>
                                <span>کاری که ما انجام می دهیم</span>
                                طراحی ، ساخت و پشتیبانی وب سایتهای جهانی.
                            </h2>
                            <div class="divider divider-line"></div>
                            <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک
                                است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است.</p>
                            <div class="feature-item pt-30">
                                <div class="row row-sm">
                                    <div class="col-3 col-sm-2">
                                        <i class="fa fa-trophy"></i>
                                    </div>
                                    <div class="col-9 col-sm-10">
                                        <b>ماموریت ما</b>
                                        <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از
                                            طراحان گرافیک است. .</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include_once APP_ROOT . '/views/layouts/footer.php' ?>

<div class="scroll-up">
    <i class="fa fa-angle-up"></i>
</div>
<script src="<?= asset('/js/jquery.min.js') ?>"></script>
<script src="<?= asset('/js/bootstrap.min.js') ?>"></script>
<script src="<?= asset('/js/plugins.min.js') ?>"></script>
<script src="<?= asset('/js/main-scripts.js') ?>"></script>
</body>

</html>