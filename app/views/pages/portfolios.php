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
            <h1>نمونه کارها<span>مشاهده نمونه کارهای ما</span></h1>
        </div>
        <div class="breadcrumb-box">
            <div class="row row-0">
                <div class="col-12 col-sm-8">
                    <ol class="breadcrumb text-light">
                        <li>
                            <a href="portfolio-6.html#" class="breadcrumb-icon">
                                <i class="fa fa-home"></i>
                            </a>
                        </li>
                        <li>
                            <a href="portfolio-6.html#">صفحات</a>
                        </li>
                        <li class="active">طراحی</li>
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

<section class="section section-portfolio section-portfolio-6 portfolio-gallery">
    <div class="container">
        <div class="section-title section-title-2 div-center text-center max-w-576">
            <h2>نمونه کار ما</h2>
            <h3>کلاس جهانی ما کار می کند</h3>
            <p>
                <span class="divider divider-line"></span>
                استراتژی های ما در محل کار ابزاری است که با استفاده از آن می توانید به اهداف مورد نظر خود برسید و در
                اینجا به اهداف و رویاهای خود برسید.
            </p>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row justify-content-md-center">
            <?php foreach($data['portfolios'] as $portfolio): ?>
                <div class="col-6 col-sm-6 col-md-3">
                    <div class="portfolio-item ">
                        <img src="<?= asset('/images/portfolio/' . $portfolio->cover) ?>"
                            alt="Relevant textual alternative to the portfolio-1 image">
                        <div class="portfolio-info">
                            <div class="portfolio-link">
                                <a href="<?= uri('/pages/portfolios/' . $portfolio->slug) ?>"
                                class="button button-circle button-circle-md button-secondary"
                                title="جزئیات نمونه کارها">
                                    <i class="fa fa-link"></i>
                                </a>
                            </div>
                            <div class="portfolio-link portfolio-zoom">
                                <a href="<?= asset('/images/portfolio/' . $portfolio->cover) ?>"
                                class="button button-circle button-circle-md button-primary" title="<?= $portfolio->title ?>">
                                    <i class="fa fa-search"></i>
                                </a>
                            </div>
                            <h4><?= $portfolio->title ?></h4>
                            <p><?= substr($portfolio->description,0,200) . '...' ?></p>
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