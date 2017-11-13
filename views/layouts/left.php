<aside class="main-sidebar">

    <section class="sidebar">
        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => [
                    ['label' => 'Banner', 'url' => ['/m-slide-show'], "icon" => "files-o"],
                    ['label' => 'Gallery', 'url' => ['/m-gallery'], "icon" => "files-o"],
                    ['label' => 'Event', 'url' => ['/m-events'], "icon" => "files-o"],
                    ['label' => 'Promo', 'url' => ['/m-promo'], "icon" => "files-o"],
                    ['label' => 'Voucher', 'url' => ['/voucher'], "icon" => "files-o"],
                    ['label' => 'Rekan Tukang', 'url' => ['/m-rekan-jt'], "icon" => "files-o"],
                    ['label' => 'Customer', 'url' => ['/m-user'], "icon" => "files-o"],
                    ['label' => 'Order', 'url' => ['/t-order'], "icon" => "files-o"],
                    [
                        "label" => "Service",
                        "icon" => "th",
                        "url" => "#",
                        "items" => [
                            ['label' => 'Service', 'url' => ['/m-service']],
                            ['label' => 'Service Kategori', 'url' => ['/m-service-kategori']],
                            ['label' => 'Service Detail', 'url' => ['/m-service-detail']],
                            ['label' => 'Service Product', 'url' => ['/m-kapasitas-detail']],
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
                            ['label' => 'tips', 'url' => ['/m-tips']],
                            ['label' => 'testimoni', 'url' => ['/m-testimoni']],
//                            ['label' => 'Faq', 'url' => ['/m-faq']]
                        ],
                    ],
                    [
                        "label" => "Report",
                        "url" => "#",
                        "icon" => "table",
                        "items" => [
                            ['label' => 'Daily Sales', 'url' => ['/daily-sales']],
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
