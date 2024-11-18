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

                <a href="<?= admin_uri('/categories') ?>">دسته بندی ها</a>
            </li>
            <li class="active">

                <strong>همه</strong>
            </li>
        </ol>

        <div style="display: flex;align-items: center;justify-content: space-between">
            <h2>لیست دسته بندی ها</h2>

            <a href="<?= admin_uri('/categories/create') ?>" class="btn btn-success btn-sm btn-icon icon-left">
                <i class="entypo-plus"></i>
                دسته بندی جدید
            </a>
        </div>

        <script type="text/javascript">
            jQuery(window).load(function () {
                var $table2 = jQuery("#table-2");

                // Initialize DataTable
                $table2.DataTable({
                    "sDom": "tip",
                    "bStateSave": false,
                    "iDisplayLength": 8,
                    "aoColumns": [
                        {"bSortable": false},
                        null,
                        null,
                        null,
                        null
                    ],
                    "bStateSave": true
                });

                // Highlighted rows
                $table2.find("tbody input[type=checkbox]").each(function (i, el) {
                    var $this = $(el),
                        $p = $this.closest('tr');

                    $(el).on('change', function () {
                        var is_checked = $this.is(':checked');

                        $p[is_checked ? 'addClass' : 'removeClass']('highlight');
                    });
                });

                // Replace Checboxes
                $table2.find(".pagination a").click(function (ev) {
                    replaceCheckboxes();
                });
            });

            // Sample Function to add new row
            var giCount = 1;

            function fnClickAddRow() {
                jQuery('#table-2').dataTable().fnAddData(['<div class="checkbox checkbox-replace"><input type="checkbox" /></div>', giCount + ".1", giCount + ".2", giCount + ".3", giCount + ".4"]);
                replaceCheckboxes(); // because there is checkbox, replace it
                giCount++;
            }
        </script>

        <table class="table table-bordered table-striped datatable" id="table-2">
            <thead>
            <tr>
                <th>
                    <div class="checkbox checkbox-replace">
                        <input type="checkbox" id="chk-1">
                    </div>
                </th>
                <th>عنوان</th>
                <th>شناسه یکتا</th>
                <th>تاریخ ایجاد</th>
                <th>عملیات</th>
            </tr>
            </thead>

            <tbody>

            <?php foreach ($data['categories'] as $category) {
                ?>
                <tr>
                    <td>
                        <div class="checkbox checkbox-replace">
                            <input type="checkbox" id="<?= $category->id ?>">
                        </div>
                    </td>
                    <td><?= $category->name ?></td>
                    <td><?= $category->slug ?></td>
                    <td><?= date('Y-m-d', strtotime($category->created_at)) ?></td>
                    <td>
                        <a href="<?= admin_uri('/categories/edit/' . $category->id) ?>"
                           class="btn btn-default btn-sm btn-icon icon-left">
                            <i class="entypo-pencil"></i>
                            ویرایش
                        </a>

                        <a href="<?= admin_uri('/categories/delete/' . $category->id) ?>"
                           class="btn btn-danger btn-sm btn-icon icon-left">
                            <i class="entypo-cancel"></i>
                            حذف
                        </a>
                    </td>
                </tr>
            <?php } ?>

            </tbody>
        </table>

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