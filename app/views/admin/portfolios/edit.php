<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta name="description" content="Neon Admin Panel"/>
    <meta name="author" content=""/>

    <link rel="icon" href="<?= asset('/admin/images/favicon.ico') ?>">

    <title><?= APP_NAME ?></title>

    <link rel="stylesheet" href="<?= asset('/admin/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css') ?>">
    <link rel="stylesheet" href="<?= asset('/admin/css/font-icons/entypo/css/entypo.css') ?>">
    <link rel="stylesheet" href="<?= asset('/admin/css/bootstrap.css') ?>">
    <link rel="stylesheet" href="<?= asset('/admin/css/neon-core.css') ?>">
    <link rel="stylesheet" href="<?= asset('/admin/css/neon-theme.css') ?>">
    <link rel="stylesheet" href="<?= asset('/admin/css/neon-forms.css') ?>">
    <link rel="stylesheet" href="<?= asset('/admin/css/neon-rtl.css') ?>">
    <link rel="stylesheet" href="<?= asset('/admin/css/custom.css') ?>">

    <script src="<?= asset('/admin/js/jquery-1.11.3.min.js') ?>"></script>

</head>
<body class="page-body page-fade">

<div class="page-container">
    <!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->

    <?php include_once APP_ROOT . '/views/admin/layouts/sidebar.php' ?>

    <div class="main-content">

        <?php include_once APP_ROOT . '/views/admin/layouts/navbar.php' ?>

        <ol class="breadcrumb bc-3">
            <li>
                <a href="<?= admin_uri('/') ?>"><i class="fa-home"></i>داشبورد</a>
            </li>
            <li>

                <a href="<?= admin_uri('/portfolios') ?>">نمونه کارها</a>
            </li>
            <li class="active">

                <strong>ویرایش</strong>
            </li>
        </ol>

        <div>
            <h2>ویرایش نمونه کار</h2>
        </div>

        <div class="row">
            <div class="col-md-12">

                <div class="panel panel-primary" data-collapsed="0">

                    <div class="panel-heading">
                        <div class="panel-title">
                            ویرایش نمونه کار
                        </div>
                    </div>

                    <div class="panel-body">

                        <div class="row">

                            <form action="<?= admin_uri('/portfolios/edit/' . $data['portfolio']->id) ?>" method="post"
                                  enctype="multipart/form-data">

                                <div class="col-md-6">
                                    <label for="title">عنوان</label>
                                    <input type="text" class="form-control" placeholder="عنوان" name="title" id="title"
                                           value="<?= $data['portfolio']->title ?>" required>
                                    <?= error('title') ?>
                                </div>

                                <div class="col-md-6">
                                    <label for="slug">اسلاگ</label>
                                    <input type="text" class="form-control" placeholder="شناسه یکتا" name="slug"
                                           id="slug"
                                           value="<?= $data['portfolio']->slug ?>" required>
                                    <?= error('slug') ?>
                                </div>

                                <div class="clear"></div>
                                <br/>

                                <div class="col-md-6">
                                    <label for="cover">تصویر</label>
                                    <input type="file" class="form-control"
                                           name="cover" id="cover">
                                    <?= error('cover') ?>
                                </div>

                                <div class="col-md-6">
                                    <label for="date">تاریخ</label>
                                    <input type="date" class="form-control" placeholder="تاریخ" name="date"
                                           id="date"
                                           value="<?= $data['portfolio']->date ?>" required>
                                    <?= error('date') ?>
                                </div>

                                <div class="clear"></div>
                                <br/>

                                <div class="col-md-6">
                                    <label for="client_name">نام مشتری</label>
                                    <input type="text" class="form-control" placeholder="نام مشتری"
                                           name="client_name" id="client_name"
                                           value="<?= $data['portfolio']->client_name ?>" required>
                                    <?= error('client_name') ?>
                                </div>

                                <div class="col-md-6">
                                    <label for="website">وبسایت</label>
                                    <input type="url" class="form-control" placeholder="وبسایت"
                                           name="website"
                                           id="website"
                                           value="<?= $data['portfolio']->website ?>" required>
                                    <?= error('website') ?>
                                </div>

                                <div class="clear"></div>
                                <br/>

                                <div class="col-md-12">
                                    <label for="location">لوکیشن</label>
                                    <input type="text" class="form-control" placeholder="آدرس"
                                           name="location"
                                           id="location"
                                           value="<?= $data['portfolio']->location ?>" required>
                                    <?= error('location') ?>
                                </div>

                                <div class="clear"></div>
                                <br/>

                                <div class="col-md-12">
                                    <label for="description">توضیحات</label>
                                    <textarea cols="10" rows="5" class="form-control" placeholder="توضیحات"
                                              name="description"
                                              id="description"
                                              required><?= $data['portfolio']->description ?></textarea>
                                    <?= error('description') ?>
                                </div>

                                <div class="clear"></div>
                                <br/>

                                <div class="col-md-1"
                                     style="display: flex;align-items: center;justify-content: start; gap: 5px;">
                                    <input type="submit" value="ویرایش" class="btn btn-info">
                                    <a href="<?= admin_uri('/portfolios') ?>" class="btn btn-danger">بازگشت</a>
                                </div>

                            </form>
                        </div>

                    </div>

                </div>

            </div>
        </div>

        <!-- Footer -->
        <?php include_once APP_ROOT . '/views/admin/layouts/footer.php' ?>
    </div>

</div>

<!-- Imported styles on this page -->
<link rel="stylesheet" href="<?= asset('/admin/js/jvectormap/jquery-jvectormap-1.2.2.css') ?>">
<link rel="stylesheet" href="<?= asset('/admin/js/rickshaw/rickshaw.min.css') ?>">

<!-- Bottom scripts (common) -->
<script src="<?= asset('/admin/js/gsap/TweenMax.min.js') ?>"></script>
<script src="<?= asset('/admin/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js') ?>"></script>
<script src="<?= asset('/admin/js/bootstrap.js') ?>"></script>
<script src="<?= asset('/admin/js/joinable.js') ?>"></script>
<script src="<?= asset('/admin/js/resizeable.js') ?>"></script>
<script src="<?= asset('/admin/js/neon-api.js') ?>"></script>
<script src="<?= asset('/admin/js/jvectormap/jquery-jvectormap-1.2.2.min.js') ?>"></script>


<!-- Imported scripts on this page -->
<script src="<?= asset('/admin/js/jvectormap/jquery-jvectormap-europe-merc-en.js') ?>"></script>
<script src="<?= asset('/admin/js/jquery.sparkline.min.js') ?>"></script>
<script src="<?= asset('/admin/js/rickshaw/vendor/d3.v3.js') ?>"></script>
<script src="<?= asset('/admin/js/rickshaw/rickshaw.min.js') ?>"></script>
<script src="<?= asset('/admin/js/raphael-min.js') ?>"></script>
<script src="<?= asset('/admin/js/morris.min.js') ?>"></script>


<!-- JavaScripts initializations and stuff -->
<script src="<?= asset('/admin/js/neon-custom.js') ?>"></script>

</body>
</html>