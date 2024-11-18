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

                <a href="<?= admin_uri('/articles') ?>">مقالات</a>
            </li>
            <li class="active">

                <strong>ویرایش</strong>
            </li>
        </ol>

        <div>
            <h2>ویرایش مقاله</h2>
        </div>

        <div class="row">
            <div class="col-md-12">

                <div class="panel panel-primary" data-collapsed="0">

                    <div class="panel-heading">
                        <div class="panel-title">
                            ویرایش مقاله
                        </div>
                    </div>

                    <div class="panel-body">

                        <div class="row">

                            <form action="<?= admin_uri('/articles/edit/' . $data['article']->id) ?>" method="post"
                                  enctype="multipart/form-data">
                                <div class="col-md-12">
                                    <label for="category_id">دسته بندی</label>
                                    <select class="form-control" name="category_id" id="category_id">
                                        <?php foreach ($data['categories'] as $category): ?>
                                            <option value="<?= $category->id ?>" <?= $data['article']->category_id === $category->id ? 'selected' : '' ?>><?= $category->name ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="clear"></div>
                                <br/>

                                <div class="col-md-6">
                                    <label for="title">عنوان</label>
                                    <input type="text" class="form-control" placeholder="عنوان" name="title" id="title"
                                           value="<?= $data['article']->title ?>" required>
                                    <?= error('title') ?>
                                </div>

                                <div class="col-md-6">
                                    <label for="slug">شناسه یکتا</label>
                                    <input type="text" class="form-control" placeholder="اسلاگ" name="slug" id="slug"
                                           value="<?= $data['article']->slug ?>" required>
                                    <?= error('slug') ?>
                                </div>

                                <div class="clear"></div>
                                <br/>

                                <div class="col-md-12">
                                    <label for="cover">کاور</label>
                                    <input type="file" class="form-control" placeholder="کاور" name="cover" id="cover">
                                    <?= error('cover') ?>
                                </div>

                                <div class="clear"></div>
                                <br/>

                                <div class="col-md-12">
                                    <label for="description">متن مقاله</label>
                                    <textarea name="description" id="description" cols="30" rows="10"
                                              class="form-control"
                                              required><?= $data['article']->description ?></textarea>
                                    <?= error('description') ?>
                                </div>

                                <div class="clear"></div>
                                <br/>

                                <div class="col-md-1">
                                    <input type="checkbox" class="form-check-input" id="is_publish"
                                           name="is_publish" <?= $data['article']->is_publish ? 'checked' : '' ?>/>
                                    <label for="is_publish"
                                           class="form-check-label">انتشار</label>
                                </div>

                                <div class="clear"></div>
                                <br/>

                                <div class="col-md-1"
                                     style="display: flex;align-items: center;justify-content: start; gap: 5px;">
                                    <input type="submit" value="ویرایش" class="btn btn-info">
                                    <a href="<?= admin_uri('/articles') ?>" class="btn btn-danger">بازگشت</a>
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