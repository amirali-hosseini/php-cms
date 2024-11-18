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
            <h1>قیمت های ما<span>پلن های ما</span></h1>
        </div>
        <div class="breadcrumb-box">
            <div class="row row-0">
                <div class="col-12 col-sm-8">
                    <ol class="breadcrumb text-light">
                        <li>
                            <a href="price-table-1.html#" class="breadcrumb-icon">
                                <i class="fa fa-home"></i>
                            </a>
                        </li>
                        <li>
                            <a href="price-table-1.html#">صفحات</a>
                        </li>
                        <li class="active">پلن ها</li>
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

<section class="section section-pricing section-pricing-1">
    <div class="container">
        <div class="section-title section-title-2 div-center text-center max-w-576">
            <h2>پلن های ما</h2>
            <h3>قیمت و برنامه عالی.</h3>
            <p>
                <span class="divider divider-line"></span>
                ما می توانیم به توسعه تجارت خود کمک کنیم. ما بهترین خدمات را با بهترین نتایج ارائه می دهیم.
            </p>
        </div>
    </div>
    <div class="container">
        <div class="row row-0">
            <?php foreach($data['plans'] as $plan): ?>
                <div class="col-sm-12 col-md-6 col-lg-4">
                    <div class="pricing-item overlay-color overlay-image"
                        style="background-image: url(<?= asset('/images/plans/plan-2.jpg') ?>);">
                        <span class="bg-color bg-dark-50"></span>
                        <div class="pricing-item-head">
                            <h4><?= $plan->title ?></h4>
                            <div class="pricing-item-price">
                                <strong><?= number_format($plan->price) ?></strong>
                                <span>تومان</span>
                                <span>/ماه</span>
                            </div>
                        </div>
                        <div class="pricing-item-body">
                            <ul>
                                <?php foreach(explode('/',$plan->items) as $option): ?>
                                    <li>
                                        <i class="fa fa-check" aria-hidden="true"></i>
                                        <?= $option ?>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                            <a href="price-table-1.html#" class="button button-md button-radius button-primary">انتخاب
                                پلن</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
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