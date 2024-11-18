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
            <h1>تماس با ما<span>و ما می توانیم زندگی شما را تغییر دهیم</span></h1>
        </div>
        <div class="breadcrumb-box">
            <div class="row row-0">
                <div class="col-12 col-sm-8">
                    <ol class="breadcrumb text-light">
                        <li>
                            <a href="contact-us.html#" class="breadcrumb-icon">
                                <i class="fa fa-home"></i>
                            </a>
                        </li>
                        <li>
                            <a href="contact-us.html#">صفحات</a>
                        </li>
                        <li class="active">تماس با ما</li>
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

<section class="section section-contact-us section-contact-us-1">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-8">
                <h3 class="mb-30">نیاز به کمک دارید؟ در تماس باشید.</h3>
                <form class="form form-simple" method="post">
                    <div class="row row-sm">
                        <div class="form-item col-12 col-sm-6">
                            <input name="name" type="text" placeholder="نام" required>
                            <?= error('name') ?>
                        </div>
                        <div class="form-item col-12 col-sm-6">
                            <input name="email" type="email" placeholder="ایمیل" required>
                            <?= error('email') ?>
                        </div>
                        <div class="form-item col-12 col-sm-12">
                            <textarea name="message" placeholder="پیام" required></textarea>
                            <?= error('message') ?>
                        </div>
                        <div class="col-12 col-sm-12">
                            <button type="submit" class="button button-md button-primary">ارسال پیام</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-12 col-md-12 col-lg-4">
                <div class="contact-us-info">
                    <div class="contact-us-info-inner">
                        <h4>
                            اینجا<br/>
                            <span>ما هستیم</span>
                        </h4>
                        <p>
                            <i class="fa fa-map-marker"></i>
                            ایران، ارومیه، شاهین دژ
                        </p>
                        <p>
                            <i class="fa fa-phone"></i>
                            <span dir="ltr">
                            0919 919 9199
                                </span>
                        </p>
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