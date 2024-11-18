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
            <h1>بلاگ ما<span>آخرین مقالات آموزشی</span></h1>
        </div>
        <div class="breadcrumb-box">
            <div class="row row-0">
                <div class="col-12 col-sm-8">
                    <ol class="breadcrumb text-light">
                        <li>
                            <a href="blog-left-sidebar.html" class="breadcrumb-icon">
                                <i class="fa fa-home"></i>
                            </a>
                        </li>
                        <li>
                            <a href="blog-left-sidebar.html#">صفحات</a>
                        </li>
                        <li class="active">بلاگ</li>
                    </ol>
                </div>
                <div class="col-12 col-sm-4">
                    <div class="breadcrumb-search text-right">
                        <button class="button button-circle">
                            <i class="fa fa-search"></i>
                        </button>
                        <form action="" style="display: flex;align-items: center;justify-content: end;">
                            <input name="search" type="text" placeholder="جستجو ...">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section section-posts section-posts-2 section-posts-4">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-8 order-lg-2 order-xl-2">
                <div class="row">
                    <?php foreach($data['articles'] as $article): ?>
                        <div class="col-sm-6">
                        <div class="post-item">
                            <div class="post-image">
                                <a href="blog-single.html">
                                    <img src="<?= asset('/images/blog/' . $article->cover) ?>"
                                         alt="Relevant textual alternative to the post-6 image">
                                </a>
                            </div>
                            <div class="post-info">
                                <h3>
                                    <a href="blog-single.html"><?= $article->title ?></a>
                                </h3>
                                <p><?= substr($article->description,0,300) . '...' ?></p>
                                <a href="<?= uri('/pages/blog/' . $article->slug) ?>" class="button-read-more">
                                    مطالعه بیشتر
                                    <i class="fa fa-long-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="col-12 col-lg-4">
                <aside class="site-sidebar">
                    <div class="widget widget-search">
                        <div class="widget-body">
                            <div class="form form-simple">
                                <div class="form-item">
                                    <input type="text" placeholder="جستجوی چیزی ...">
                                </div>
                                <button class="btn-search">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="widget widget-categories">
                        <div class="widget-head">
                            <h3 class="widget-title">دسته بندی ها</h3>
                            <div class="divider divider-line"></div>
                        </div>
                        <div class="widget-body" style="display: flex;flex-wrap: wrap;align-items: center; justify-content: start; gap: 1rem;">
                            <?php foreach($data['categories'] as $category): ?>
                                <a href="blog-left-sidebar.html#" style="background-color: #2563EB; color: white;border-radius: 5px; padding: 5px 15px;display: flex;align-items: center;justify-content: center;gap: .5rem;" rel="tag">
                                    <i class="fa fa-folder-open"></i>
                                    <?= $category->name ?>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </aside>
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