<?php

/**
 * @var string $content
 * @var \yii\web\View $this
 */

use yii\helpers\Html;

$bundle = yiister\gentelella\assets\Asset::register($this);

?>
<?php $this->beginPage(); ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta charset="<?= Yii::$app->charset ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="nav-md">
<?php $this->beginBody(); ?>
<div class="container body">
    <div class="main_container">

        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">

                <div class="navbar nav_title" style="border: 0;">
                    <a href=<?= Yii::$app->homeUrl ?> class="site_title"><i class="fa fa-paw"></i> <span>Jago Tukang</span></a>
                </div>
                <div class="clearfix"></div>
                <!-- sidebar menu -->
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

                    <div class="menu_section">
                        <?=
                        \yiister\gentelella\widgets\Menu::widget(
                            [
                                "items" => [
                                    // ["label" => "Home", "url" => "/", "icon" => "home"],
                                    ['label' => 'Gallery', 'url' => ['/m-gallery'], "icon" => "files-o"],
                                    ['label' => 'InternetBanking', 'url' => ['/m-internet-banking'], "icon" => "files-o"],
                                    ['label' => 'KartuDebit', 'url' => ['/m-kartu-debit'], "icon" => "files-o"],
                                    ['label' => 'Rekan JagoTukang', 'url' => ['/m-rekan-jt'], "icon" => "files-o"],
                                    ['label' => 'Order', 'url' => ['/t-order'], "icon" => "files-o"],
                                    ['label' => 'Work Order', 'url' => ['/t-order/wo'], "icon" => "files-o"],

                                    // ["label" => "Layout", "url" => ["site/layout"], "icon" => "files-o"],
                                    // ["label" => "Error page", "url" => ["site/error-page"], "icon" => "close"],
                                    [
                                        "label" => "Service",
                                        "icon" => "th",
                                        "url" => "#",
                                        "items" => [
                                            ['label' => 'Service', 'url' => ['/m-service']],
                                            ['label' => 'Service Kategori', 'url' => ['/m-service-kategori']],
                                            ['label' => 'Service Detail', 'url' => ['/m-service-detail']],
                                            ['label' => 'Kapasitas Detail', 'url' => ['/m-kapasitas-detail']],
                                        ],
                                    ],
                                    [
                                        "label" => "Daerah",
                                        "url" => "#",
                                        "icon" => "table",
                                        "items" => [
                                            ['label' => 'Kelurahan', 'url' => ['/m-kelurahan']],
                                            ['label' => 'Kecamatan', 'url' => ['/m-kecamatan']],                    
                                            ['label' => 'Kota', 'url' => ['/m-kota']],
                                        ],
                                    ],
                                    [
                                        "label" => "Info",
                                        "url" => "#",
                                        "icon" => "table",
                                        "items" => [
                                            ['label' => 'Promo', 'url' => ['/m-promo']],
                                            ['label' => 'tips', 'url' => ['/m-tips']],
                                            ['label' => 'testimoni', 'url' => ['/m-testimoni']],
                                            ['label' => 'Faq', 'url' => ['/m-faq']]
                                        ],
                                    ],
                                ],
                            ]
                        )
                        ?>
                    </div>

                </div>
                <!-- /sidebar menu -->

                <!-- /menu footer buttons -->
                <div class="sidebar-footer hidden-small">
                    <a data-toggle="tooltip" data-placement="top" title="Settings">
                        <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                        <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="Lock">
                        <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="Logout">
                        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                    </a>
                </div>
                <!-- /menu footer buttons -->
            </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">

            <div class="nav_menu">
                <nav class="" role="navigation">
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>

                    <ul class="nav navbar-nav navbar-right">
                        <li class="">
                            <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
<img src="http://placehold.it/128x128" alt="">
<?= (Yii::$app->user->isGuest) ? '' : Yii::$app->user->identity->username ?>
<span class=" fa fa-angle-down"></span></a>
                            <ul class="dropdown-menu dropdown-usermenu pull-right">
                                <li><a href="javascript:;">  Profile</a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <span class="badge bg-red pull-right">50%</span>
                                        <span>Settings</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;">Help</a>
                                </li>
<li><?= Html::a('Logout', ['/admin/user/logout'], ['data' => ['method' => 'post']]) ?>
                                </li>
                            </ul>
                        </li>
<!-- 
    <li role="presentation" class="dropdown">
        <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
            <i class="fa fa-envelope-o"></i>
            <span class="badge bg-green">6</span>
        </a>
        <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
        <li>
                <a>
  <span class="image">
                    <img src="http://placehold.it/128x128" alt="Profile Image" />
                </span>
  <span>
                    <span>John Smith</span>
  <span class="time">3 mins ago</span>
  </span>
  <span class="message">
                    Film festivals used to be do-or-die moments for movie makers. They were where...
                </span>
                </a>
            </li>
            <li>
                <a>
  <span class="image">
                    <img src="http://placehold.it/128x128" alt="Profile Image" />
                </span>
  <span>
                    <span>John Smith</span>
  <span class="time">3 mins ago</span>
  </span>
  <span class="message">
                    Film festivals used to be do-or-die moments for movie makers. They were where...
                </span>
                </a>
            </li>
            <li>
                <a>
  <span class="image">
                    <img src="http://placehold.it/128x128" alt="Profile Image" />
                </span>
  <span>
                    <span>John Smith</span>
  <span class="time">3 mins ago</span>
  </span>
  <span class="message">
                    Film festivals used to be do-or-die moments for movie makers. They were where...
                </span>
                </a>
            </li>
            <li>
                <a>
  <span class="image">
                    <img src="http://placehold.it/128x128" alt="Profile Image" />
                </span>
  <span>
                    <span>John Smith</span>
  <span class="time">3 mins ago</span>
  </span>
  <span class="message">
                    Film festivals used to be do-or-die moments for movie makers. They were where...
                </span>
                </a>
            </li>
            <li>
                <div class="text-center">
                    <a href="/">
                        <strong>See All Alerts</strong>
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>
            </li>
        </ul>
    </li> -->

                    </ul>
                </nav>
            </div>

        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
            <?php if (isset($this->params['h1'])): ?>
                <div class="page-title">
                    <div class="title_left">
                        <h1><?= $this->params['h1'] ?></h1>
                    </div>
                    <div class="title_right">
                        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search for...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">Go!</button>
                            </span>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <div class="clearfix"></div>

            <?= $content ?>
        </div>
        <!-- /page content -->
        <!-- footer content -->
        <footer class="footer">
            <div class="container">
                <p class="pull-left">&copy; Jago Tukang <?= date('Y') ?></p>

            </div>
        </footer>
        <!-- /footer content -->
    </div>

</div>

<div id="custom_notifications" class="custom-notifications dsp_none">
    <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
    </ul>
    <div class="clearfix"></div>
    <div id="notif-group" class="tabbed_notifications"></div>
</div>
<!-- /footer content -->
<?php $this->endBody(); ?>
</body>
</html>
<?php $this->endPage(); ?>
