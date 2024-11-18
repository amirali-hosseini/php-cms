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

    <section class="section-breadcrumb overlay-color" style="background-image:url(<?= asset('/images/breadcrumb/1.jpg') ?>)">
        <span class="bg-color bg-dark-60"></span>
        <div class="container pt-90 pb-90 vertical-wrap">
            <div class="vertical-inner text-center">
                <h1><?= $data['portfolio']->title ?></h1>
            </div>
            <div class="breadcrumb-box">
                <div class="row row-0">
                    <div class="col-12 col-sm-8">
                        <ol class="breadcrumb text-light">
                            <li>
                                <a href="portfolio-detail.html#" class="breadcrumb-icon">
                                    <i class="fa fa-home"></i>
                                </a>
                            </li>
                            <li>
                                <a href="portfolio-detail.html#">صفحات</a>
                            </li>
                            <li>
                                <a href="portfolio-detail.html#">بلاگ</a>
                            </li>
                            <li class="active"><?= $data['portfolio']->title ?></li>
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
    <section class="section section-portfolio portfolio-gallery">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-9 div-center">
                    <div class="section-title section-title-1 text-left">
                        <h3><?= $data['portfolio']->title ?></h3>
                        <div class="divider divider-line"></div>
                    </div>
                    <div class="portfolio-content">
                        <div class="portfolio-link portfolio-zoom mb-30">
                            <a href="../../public/assets/images/portfolio/portfolio-detail.jpg">
                                <img src="<?= asset('/images/portfolio/' . $data['portfolio']->cover) ?>" alt="<?= $data['portfolio']->title ?>" class="rounded">
                            </a>
                        </div>
                        <h4>اطلاعات پروژه</h4>
                        <p><?= $data['portfolio']->description ?></p>
                        <ul class="portfolio-box row row-0">
                            <li class="col">
                                <span>مشتری</span>
                                <?= $data['portfolio']->client_name ?>
                            </li>
                            <li class="col">
                                <span>محل</span>
                                <?= $data['portfolio']->location ?>
                            </li>
                            <li class="col">
                                <span>تاریخ</span>
                                <?= $data['portfolio']->date ?>
                            </li>
                            <li class="col">
                                <span>وب سایت</span>
                                <a target="_blank" href="<?= $data['portfolio']->website ?>"><?= $data['portfolio']->website ?></a>
                            </li>
                        </ul>
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