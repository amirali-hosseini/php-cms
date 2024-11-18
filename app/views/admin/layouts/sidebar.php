<div class="sidebar-menu">

    <div class="sidebar-menu-inner">

        <header class="logo-env">

            <!-- logo -->
            <div class="logo">
                <a href="<?= admin_uri('/') ?>">
                    <img src="<?= asset('/images/logo/logo-light.png') ?>" width="120" alt=""/>
                </a>
            </div>

            <!-- logo collapse icon -->
            <div class="sidebar-collapse">
                <a href="#" class="sidebar-collapse-icon">
                    <!-- add class "with-animation" if you want sidebar to have animation during expanding/collapsing transition -->
                    <i class="entypo-menu"></i>
                </a>
            </div>


            <!-- open/close menu icon (do not remove if you want to enable menu on mobile devices) -->
            <div class="sidebar-mobile-menu visible-xs">
                <a href="#" class="with-animation"><!-- add class "with-animation" to support animation -->
                    <i class="entypo-menu"></i>
                </a>
            </div>

        </header>


        <ul id="main-menu" class="main-menu">
            <!-- add class "multiple-expanded" to allow multiple submenus to open -->
            <!-- class "auto-inherit-active-class" will automatically add "active" class for parent elements who are marked already with class "active" -->
            <li>
                <a href="<?= admin_uri('/') ?>">
                    <i class="entypo-gauge"></i>
                    <span class="title">داشبورد</span>
                </a>
            </li>
            <li>
                <a href="<?= admin_uri('/articles/') ?>">
                    <i class="entypo-pencil"></i>
                    <span class="title">مقالات</span>
                </a>
            </li>
            <li>
                <a href="<?= admin_uri('/categories/') ?>">
                    <i class="entypo-box"></i>
                    <span class="title">دسته بندی ها</span>
                </a>
            </li>
            <li>
                <a href="<?= admin_uri('/comments/') ?>">
                    <i class="entypo-chat"></i>
                    <span class="title">کامنت ها</span>
                </a>
            </li>
            <li>
                <a href="<?= admin_uri('/members/') ?>">
                    <i class="entypo-users"></i>
                    <span class="title">اعضای تیم</span>
                </a>
            </li>
            <li>
                <a href="<?= admin_uri('/messages/') ?>">
                    <i class="entypo-doc-text"></i>
                    <span class="title">پیام ها</span>
                </a>
            </li>
            <li>
                <a href="<?= admin_uri('/plans/') ?>">
                    <i class="entypo-tag"></i>
                    <span class="title">پلن ها</span>
                </a>
            </li>
            <li>
                <a href="<?= admin_uri('/portfolios/') ?>">
                    <i class="entypo-docs"></i>
                    <span class="title">نمونه کارها</span>
                </a>
            </li>
            <li>
                <a href="<?= admin_uri('/services/') ?>">
                    <i class="entypo-doc-text-inv"></i>
                    <span class="title">خدمات</span>
                </a>
            </li>
            <li>
                <a href="<?= admin_uri('/settings/') ?>">
                    <i class="entypo-cog"></i>
                    <span class="title">تنظیمات</span>
                </a>
            </li>
            <li>
                <a href="<?= admin_uri('/subscribers/') ?>">
                    <i class="entypo-mail"></i>
                    <span class="title">مشترکین</span>
                </a>
            </li>
            <li>
                <a href="<?= admin_uri('/testimonials/') ?>">
                    <i class="entypo-comment"></i>
                    <span class="title">نظرات مشتریان</span>
                </a>
            </li>
            <li>
                <a href="<?= admin_uri('/users/') ?>">
                    <i class="entypo-users"></i>
                    <span class="title">کاربران</span>
                </a>
            </li>
            <!--<li class="has-sub">
                <a href="ui-panels.html">
                    <i class="entypo-newspaper"></i>
                    <span class="title">UI Elements</span>
                </a>
                <ul>
                    <li>
                        <a href="ui-panels.html">
                            <span class="title">Panels</span>
                        </a>
                    </li>
                    <li>
                        <a href="ui-tiles.html">
                            <span class="title">Tiles</span>
                        </a>
                    </li>
                    <li>
                        <a href="forms-buttons.html">
                            <span class="title">Buttons</span>
                        </a>
                    </li>
                    <li>
                        <a href="ui-typography.html">
                            <span class="title">Typography</span>
                        </a>
                    </li>
                    <li>
                        <a href="ui-tabs-accordions.html">
                            <span class="title">Tabs &amp; Accordions</span>
                        </a>
                    </li>
                    <li>
                        <a href="ui-tooltips-popovers.html">
                            <span class="title">Tooltips &amp; Popovers</span>
                        </a>
                    </li>
                    <li>
                        <a href="ui-navbars.html">
                            <span class="title">Navbars</span>
                        </a>
                    </li>
                    <li>
                        <a href="ui-breadcrumbs.html">
                            <span class="title">Breadcrumbs</span>
                        </a>
                    </li>
                    <li>
                        <a href="ui-badges-labels.html">
                            <span class="title">Badges &amp; Labels</span>
                        </a>
                    </li>
                    <li>
                        <a href="ui-progress-bars.html">
                            <span class="title">Progress Bars</span>
                        </a>
                    </li>
                    <li>
                        <a href="ui-modals.html">
                            <span class="title">Modals</span>
                        </a>
                    </li>
                    <li>
                        <a href="ui-blockquotes.html">
                            <span class="title">Blockquotes</span>
                        </a>
                    </li>
                    <li>
                        <a href="ui-alerts.html">
                            <span class="title">Alerts</span>
                        </a>
                    </li>
                    <li>
                        <a href="ui-pagination.html">
                            <span class="title">Pagination</span>
                        </a>
                    </li>
                </ul>
            </li>-->
        </ul>

    </div>

</div>