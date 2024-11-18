<div class="row">

    <!-- Profile Info and Notifications -->
    <div class="col-md-6 col-sm-8 clearfix">

        <ul class="user-info pull-left pull-none-xsm">

            <!-- Profile Info -->
            <li class="profile-info dropdown">
                <!-- add class "pull-right" if you want to place this from right -->

                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <img src="<?= asset('/admin/images/thumb-1@2x.png') ?>" alt="" class="img-circle" width="44"/>
                    <?= \app\models\User::info('name') ?>
                </a>

                <ul class="dropdown-menu">

                    <!-- Reverse Caret -->
                    <li class="caret"></li>

                    <!-- Profile sub-links -->
                    <li>
                        <a href="#">
                            <i class="entypo-user"></i>
                            ویرایش پروفایل
                        </a>
                    </li>
                </ul>
            </li>

        </ul>
    </div>


    <!-- Raw Links -->
    <div class="col-md-6 col-sm-4 clearfix hidden-xs">

        <ul class="list-inline links-list pull-right">

            <li>
                <a href="<?= admin_uri('/settings') ?>" data-toggle="chat" data-collapse-sidebar="1">
                    <i class="entypo-cog"></i>
                    تنظیمات
                </a>
            </li>

            <li class="sep"></li>

            <li>
                <form action="<?= uri('/auth/logout') ?>" method="post">
                    <button type="submit" style="background: none;border: none;outline: none;box-shadow: none;"
                            class="text-danger">
                        <i class="entypo-logout right"></i>
                        <span>خروج</span>
                    </button>
                </form>
            </li>
        </ul>

    </div>

</div>

<hr/>