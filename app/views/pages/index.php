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

<section class="section-hero section-hero-1">
    <div class="owl-carousel carousel-style-3" data-nav="true" data-loop="true" data-autoplay="true"
         data-autoplayTimeout="9000">
        <div class="item">
            <span class="hero-parallax paroller" data-paroller-factor="0.3"
                  style="background-image: url(<?= asset('/images/home-image-1-1.jpg') ?>)"></span>
            <div class="container">
                <div class="hero-item">
                    <div class="max-w-576 div-center text-center">
                        <h1><span>ما خلاقیت را</span> <span>ایجاد میکنیم.</span></h1>
                        <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک
                            است.</p>
                        <a href="index-3.html#" class="button button-md button-radius button-primary">
                            <i class="fa fa-long-arrow-right"></i>
                            شروع کنید
                        </a>
                        <a href="https://youtu.be/l-epKcOA7RQ" class="button button-md button-radius button-secondary">
                            <i class="fa fa-play"></i>
                            نمایش ویدیو
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="item">
            <span class="hero-parallax paroller" data-paroller-factor="0.3"
                  style="background-image: url(<?= asset('/images/home-image-1-2.jpg') ?>)"></span>
            <div class="container">
                <div class="hero-item">
                    <div class="max-w-576 div-center text-center">
                        <h2><span>رشد خود را </span> <span>با شرکت ما شروع کنید.</span></h2>
                        <p>ما به توسعه تجارت خود کمک می کنیم. ما بهترین خدمات را با بهترین نتایج ارائه می دهیم. با پروژه
                            من شروع کنید</p>
                        <a href="index-3.html#" class="button button-md button-radius button-primary">
                            <i class="fa fa-long-arrow-right"></i>
                            با پروژه من شروع کنید
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section section-features section-features-3 section-divider">
    <div class="container">
        <div class="section-title section-title-2 div-center text-center max-w-576">
            <h2>خدمات پایه</h2>
            <h3>بهترین خدمات ما برای کسب و کار موفق شما.</h3>
            <p>
                <span class="divider divider-line"></span>
            </p>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <?php foreach ($data['services'] as $service): ?>
                <div class="col-12 col-sm-12 col-md-6 col-lg-4">
                    <div class="feature-item">
                        <div class="row">
                            <div class="col-3">
                                <i class="fa fa-snowflake-o"></i>
                            </div>
                            <div class="col-9">
                                <h4><?= $service->title ?></h4>
                                <p><?= $service->description ?></p>
                            </div>
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
                                 style="background-image: url(<?= asset('/images/about/about-us-2-2.jpg') ?>)"></div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                        <div class="inner text-left">
                            <h2>
                                <span>ما چه کاری انجام میدهیم</span>
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
                                        <p>طراحی و توسعه انواع سایت در کوتاه ترین زمان</p>
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
                                 style="background-image: url(<?= asset('/images/about/about-us-2-1.jpg') ?>)"></div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                        <div class="inner text-left">
                            <h2>
                                <span>کاری که ما انجام می دهیم</span>
                                طراحی، توسعه، پردازش و ارائه
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
                                        <b>ماموریت و چشم انداز ما</b>
                                        <p>طراحی و توسعه انواع سایت در کوتاه ترین زمان</p>
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

<section class="section section-portfolio section-portfolio-1 portfolio-gallery section-divider">
    <div class="container">
        <div class="section-title section-title-2 div-center text-center max-w-576">
            <h2>نمونه کار ما</h2>
            <h3>ما جهانی هستیم</h3>
            <p>
                <span class="divider divider-line"></span>

            </p>
        </div>
    </div>
    <div class="container">
        <div class="data-filters">
            <ul class="data-filters-items row row-sm justify-content-md-center">
                <?php foreach($data['portfolios'] as $portfolio): ?>
                    <li class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-3" data-filter="1">
                        <div class="portfolio-item bg-gradient-180">
                            <img src="<?= asset('/images/portfolio/' . $portfolio->cover) ?>"
                                alt="Relevant textual alternative to the portfolio-1 image">
                            <div class="portfolio-info">
                                <div class="portfolio-link">
                                    <a href="<?= uri('/pages/portfolios/' . $portfolio->slug) ?>"
                                    class="button button-circle button-circle-md button-secondary"
                                    title="portfolio detail">
                                        <i class="fa fa-link"></i>
                                    </a>
                                </div>
                                <div class="portfolio-link portfolio-zoom">
                                    <a href="<?= asset('/images/portfolio/' . $portfolio->cover) ?>"
                                    class="button button-circle button-circle-md button-primary"
                                    title="<?= $portfolio->title ?>">
                                        <i class="fa fa-search"></i>
                                    </a>
                                </div>
                                <h4><?= $portfolio->title ?></h4>
                                <p><?= $portfolio->description ?></p>
                            </div>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</section>

<section class="section section-pricing section-pricing-2 section-divider">
    <div class="container">
        <div class="section-title section-title-2 div-center text-center max-w-576">
            <h2>قیمت های ما</h2>
            <h3>پلن و قیمت های منصفانه.</h3>
            <p>
                <span class="divider divider-line"></span>
                لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.
            </p>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <?php foreach($data['plans'] as $plan): ?>
                <div class="col-sm-12 col-md-6 col-lg-4">
                    <div class="pricing-item active">
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
                                <?php foreach(explode('/',$plan->items) as $item): ?>
                                    <li>
                                    <i class="fa fa-check" aria-hidden="true"></i>
                                    <?= $item ?>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                            <a href="index-3.html#" class="button button-md button-radius button-light">انتخاب پلن</a>
                        </div>
                    </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="section section-testimonials section-testimonials-2 section-divider">
    <div class="container">
        <div class="section-title section-title-2 div-center text-center max-w-576">
            <h2>مشتریان</h2>
            <h3>حرف های مشتریان</h3>
            <p>
                <span class="divider divider-line"></span>

            </p>
        </div>
    </div>
    <span class="bg-color bg-dark-90"></span>
    <div class="owl-carousel carousel-style-1 carousel-dark" data-margin="30" data-nav="true" data-dots="true"
         data-loop="true" data-center="true" data-breakpoint="768:2,992:2,1200:3">
        <?php foreach($data['testimonials'] as $testimonial): ?>
            <div class="testimonial-item">
                <div class="testimonial-content">
                    <i class="fa fa-quote-right"></i>
                    <h5><?= $testimonial->title ?></h5>
                    <p><?= $testimonial->description ?></p>
                </div>
                <div class="testimonial-details">
                    <div class="testimonial-image">
                        <img src="<?= asset('/images/clients/' . $testimonial->client_photo) ?>"
                            alt="Relevant textual alternative to the author-1 image"/>
                    </div>
                    <h4>
                        <?= $testimonial->client_name ?>
                        <span><?= $testimonial->client_job_title ?></span>
                    </h4>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>

<section class="section section-users section-users-2">
    <div class="container">
        <div class="section-title section-title-2 div-center text-center max-w-576">
            <h2>تیم ما</h2>
            <h3>ملاقات تیم ما</h3>
            <p>
                <span class="divider divider-line"></span>
                لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و
                متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است.
            </p>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <?php foreach($data['members'] as $member): ?>
                <div class="col-6 col-lg-3">
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

<section class="call-to-action call-to-action-1 overlay-color overlay-pattern paroller"
         style="background-image: url(<?= asset('/images/call-to-action-1.jpg') ?>)">
    <span class="bg-color bg-dark-40"></span>
    <span class="bg-pattern bg-pattern-1"></span>
    <div class="container">
        <div class="div-center text-center max-w-576 box">
            <h3>بیایید با هم کار کنیم.</h3>
            <p>ما به توسعه تجارت خود کمک می کنیم. ما بهترین خدمات را با بهترین نتایج ارائه می دهیم.</p>
            <a href="index-3.html#" class="button button-md button-radius button-primary">
                <i class="fa fa-long-arrow-right"></i>
                با پروژه من شروع کنید
            </a>
        </div>
    </div>
</section>

<section class="section section-posts section-posts-3 section-divider">
    <div class="container">
        <div class="section-title section-title-2 div-center text-center max-w-576">
            <h2>بلاگ ما</h2>
            <h3>اخبار و موضوعات کسب و کار</h3>
            <p>
                <span class="divider divider-line"></span>
                ما می توانیم به توسعه تجارت خود کمک کنیم. ما بهترین خدمات را با بهترین نتایج ارائه می دهیم.
            </p>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <?php foreach($data['articles'] as $article): ?>
                <div class="col-md-6 col-lg-4">
                    <div class="post-item">
                        <div class="post-image">
                            <a href="blog-single.html">
                                <img src="<?= asset('/images/blog/' . $article->cover) ?>"
                                    alt="Relevant textual alternative to the post-1 image">
                            </a>
                            <div class="post-meta">
                                <span class="post-meta-date"><?= date('Y-m-d',strtotime($article->created_at)) ?></span>
                            </div>
                        </div>
                        <div class="post-info">
                            <h3>
                                <a href="blog-single.html"><?= $article->title ?></a>
                            </h3>
                            <div class="divider divider-line"></div>
                            <p><?= substr($article->description,0,300) . '...' ?></p>
                            <a href="blog-single.html" class="button-read-more">
                                مطالعه بیشتر
                                <i class="fa fa-long-arrow-right"></i>
                            </a>
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