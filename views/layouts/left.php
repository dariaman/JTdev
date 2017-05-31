<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
<!--        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p>Alexander Pierce</p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>-->

        <!-- search form -->
<!--        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>-->
        <!-- /.search form -->

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => [
                    ['label' => 'Gallery', 'url' => ['/m-gallery'], "icon" => "files-o"],
                    ['label' => 'Event', 'url' => ['/m-events'], "icon" => "files-o"],
                    ['label' => 'Promo', 'url' => ['/m-promo'], "icon" => "files-o"],
//                    ['label' => 'InternetBanking', 'url' => ['/m-internet-banking'], "icon" => "files-o"],
//                    ['label' => 'KartuDebit', 'url' => ['/m-kartu-debit'], "icon" => "files-o"],
                    ['label' => 'Rekan JagoTukang', 'url' => ['/m-rekan-jt'], "icon" => "files-o"],
                    ['label' => 'Order', 'url' => ['/t-order'], "icon" => "files-o"],
                    ['label' => 'Work Order', 'url' => ['/t-order/wo'], "icon" => "files-o"],
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
//                    ['label' => 'Menu Yii2', 'options' => ['class' => 'header']],
//                    ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii']],
//                    ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug']],
//                    ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
//                    [
//                        'label' => 'Same tools',
//                        'icon' => 'share',
//                        'url' => '#',
//                        'items' => [
//                            ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii'],],
//                            ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug'],],
//                            [
//                                'label' => 'Level One',
//                                'icon' => 'circle-o',
//                                'url' => '#',
//                                'items' => [
//                                    ['label' => 'Level Two', 'icon' => 'circle-o', 'url' => '#',],
//                                    [
//                                        'label' => 'Level Two',
//                                        'icon' => 'circle-o',
//                                        'url' => '#',
//                                        'items' => [
//                                            ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
//                                            ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
//                                        ],
//                                    ],
//                                ],
//                            ],
//                        ],
//                    ],
                ],
            ]
        ) ?>

    </section>

</aside>
