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
                <h1>
                    <?= $data['article']->title ?>
                </h1>
            </div>
            <div class="breadcrumb-box">
                <div class="row row-0">
                    <div class="col-12 col-sm-8">
                        <ol class="breadcrumb text-light">
                            <li>
                                <a href="blog-single.html#" class="breadcrumb-icon">
                                    <i class="fa fa-home"></i>
                                </a>
                            </li>
                            <li>
                                <a href="blog-single.html#">صفحات</a>
                            </li>
                            <li>
                                <a href="blog-single.html#">بلاگ</a>
                            </li>
                            <li class="active"><?= $data['article']->title ?></li>
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
    <section class="section section-single-post">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-9 div-center">
                    <div class="single-post">
                        <div class="post-details">
                            <div class="post-author-image">
                                <img src="<?= asset('/images/team/person-2.jpg') ?>" alt="<?= $data['user']->name ?>" title="Maggie Fox">
                            </div>                    
                            <div class="post-info">
                                توسط
                                <span class="post-author"><?= $data['user']->name ?></span>
                                در تاریخ
                                <span class="post-date"><?= date('Y-m-d',strtotime($data['article']->created_at)) ?></span>
                            </div>
                            <h2 class="post-title"><?= $data['article']->title ?></h2>
                        </div>
                        <div class="post-content text-justify p-2 m-2" style="line-height: 2rem;">
                            <?= $data['article']->description ?>
                        </div>
                        <div class="post-tags">
                            <span>برچسب : </span>
                            <ul>         
                                <li>
                                    <a href="blog-single.html#"><?= $data['category']->name ?></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="comments">
                        <div class="comments-form">
                            <div class="comments-head">
                                <h4 class="comments-title">ارسال نظر</h4>
                                <div class="divider divider-line"></div>
                            </div>
                            <div class="comments-body">
                                <form class="form form-simple" method="post">
                                    <div class="row row-sm">
                                        <div class="form-item col-12 col-sm-6">
                                            <input type="text" placeholder="نام" name="name">
                                        </div>
                                        <div class="form-item col-12 col-sm-6">
                                            <input type="email" placeholder="ایمیل" name="email">
                                        </div>
                                        <div class="form-item col-12 col-sm-12">
                                            <textarea placeholder="پیام" name="comment"></textarea>
                                        </div>
                                        <div class="col-12 col-sm-12">
                                            <button type="submit" class="button button-md button-primary">ارسال نظر</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="comments-list">
                            <div class="comments-head">
                                <h4 class="comments-title">نظرات</h4>
                                <div class="divider divider-line"></div>
                            </div>
                            <div class="comments-body">
                                <ul>
                                    <?php foreach($data['comments'] as $comment): ?>
                                        <li>
                                            <div class="comment">
                                                <div class="comment-head">
                                                    <div class="comment-image">
                                                        <img src="<?= asset('/images/clients/person-4.jpg') ?>" alt="Relevant textual alternative to the person-1 image" />
                                                    </div>
                                                    <h5 class="comment-author"><?= $comment->name ?></h5>
                                                    <span class="comment-date"><?= date('Y-m-d',strtotime($comment->created_at)) ?></span>
                                                </div>
                                                <div class="comment-body my-3">
                                                    <p><?= $comment->comment ?></p>
                                                </div>
                                            </div>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
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