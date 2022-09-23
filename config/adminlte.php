<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Title
    |--------------------------------------------------------------------------
    |
    | Here you can change the default title of your admin panel.
    |
    | For detailed instructions you can look the title section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/6.-Basic-Configuration
    |
    */

    'title' => 'AdminLTE 3',
    'title_prefix' => '',
    'title_postfix' => '',

    /*
    |--------------------------------------------------------------------------
    | Favicon
    |--------------------------------------------------------------------------
    |
    | Here you can activate the favicon.
    |
    | For detailed instructions you can look the favicon section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/6.-Basic-Configuration
    |
    */

    'use_ico_only' => false,
    'use_full_favicon' => false,

    /*
    |--------------------------------------------------------------------------
    | Logo
    |--------------------------------------------------------------------------
    |
    | Here you can change the logo of your admin panel.
    |
    | For detailed instructions you can look the logo section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/6.-Basic-Configuration
    |
    */

    'logo' => '',
    'logo_img' => 'img/admin/logo_img.svg',
    'logo_img_class' => 'brand-image elevation-3',
    'logo_img_xl' => null,
    'logo_img_xl_class' => 'brand-image-xs',
    'logo_img_alt' => 'CSFM',

    /*
    |--------------------------------------------------------------------------
    | User Menu
    |--------------------------------------------------------------------------
    |
    | Here you can activate and change the user menu.
    |
    | For detailed instructions you can look the user menu section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/6.-Basic-Configuration
    |
    */

    'usermenu_enabled' => true,
    'usermenu_header' => false,
    'usermenu_header_class' => 'bg-primary',
    'usermenu_image' => false,
    'usermenu_desc' => false,
    'usermenu_profile_url' => false,

    /*
    |--------------------------------------------------------------------------
    | Layout
    |--------------------------------------------------------------------------
    |
    | Here we change the layout of your admin panel.
    |
    | For detailed instructions you can look the layout section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/7.-Layout-and-Styling-Configuration
    |
    */

    'layout_topnav' => null,
    'layout_boxed' => null,
    'layout_fixed_sidebar' => null,
    'layout_fixed_navbar' => null,
    'layout_fixed_footer' => null,

    /*
    |--------------------------------------------------------------------------
    | Authentication Views Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the authentication views.
    |
    | For detailed instructions you can look the auth classes section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/7.-Layout-and-Styling-Configuration
    |
    */

    'classes_auth_card' => 'card-outline card-primary',
    'classes_auth_header' => '',
    'classes_auth_body' => '',
    'classes_auth_footer' => '',
    'classes_auth_icon' => '',
    'classes_auth_btn' => 'btn-flat btn-primary',

    /*
    |--------------------------------------------------------------------------
    | Admin Panel Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the admin panel.
    |
    | For detailed instructions you can look the admin panel classes here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/7.-Layout-and-Styling-Configuration
    |
    */

    'classes_body' => '',
    'classes_brand' => '',
    'classes_brand_text' => '',
    'classes_content_wrapper' => '',
    'classes_content_header' => '',
    'classes_content' => '',
    'classes_sidebar' => 'sidebar-dark-primary elevation-4',
    'classes_sidebar_nav' => '',
    'classes_topnav' => 'navbar-white navbar-light',
    'classes_topnav_nav' => 'navbar-expand',
    'classes_topnav_container' => 'container',

    /*
    |--------------------------------------------------------------------------
    | Sidebar
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar of the admin panel.
    |
    | For detailed instructions you can look the sidebar section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/7.-Layout-and-Styling-Configuration
    |
    */

    'sidebar_mini' => true,
    'sidebar_collapse' => false,
    'sidebar_collapse_auto_size' => false,
    'sidebar_collapse_remember' => false,
    'sidebar_collapse_remember_no_transition' => true,
    'sidebar_scrollbar_theme' => 'os-theme-light',
    'sidebar_scrollbar_auto_hide' => 'l',
    'sidebar_nav_accordion' => true,
    'sidebar_nav_animation_speed' => 300,

    /*
    |--------------------------------------------------------------------------
    | Control Sidebar (Right Sidebar)
    |--------------------------------------------------------------------------
    |
    | Here we can modify the right sidebar aka control sidebar of the admin panel.
    |
    | For detailed instructions you can look the right sidebar section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/7.-Layout-and-Styling-Configuration
    |
    */

    'right_sidebar' => false,
    'right_sidebar_icon' => 'fas fa-cogs',
    'right_sidebar_theme' => 'dark',
    'right_sidebar_slide' => true,
    'right_sidebar_push' => true,
    'right_sidebar_scrollbar_theme' => 'os-theme-light',
    'right_sidebar_scrollbar_auto_hide' => 'l',

    /*
    |--------------------------------------------------------------------------
    | URLs
    |--------------------------------------------------------------------------
    |
    | Here we can modify the url settings of the admin panel.
    |
    | For detailed instructions you can look the urls section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/6.-Basic-Configuration
    |
    */

    'use_route_url' => false,
    'dashboard_url' => '/',
    'logout_url' => 'logout',
    'login_url' => 'login',
    'register_url' => 'register',
    'password_reset_url' => 'password/reset',
    'password_email_url' => 'password/email',
    'profile_url' => false,

    /*
    |--------------------------------------------------------------------------
    | Laravel Mix
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Laravel Mix option for the admin panel.
    |
    | For detailed instructions you can look the laravel mix section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/9.-Other-Configuration
    |
    */

    'enabled_laravel_mix' => false,
    'laravel_mix_css_path' => 'css/app.css',
    'laravel_mix_js_path' => 'js/app.js',

    /*
    |--------------------------------------------------------------------------
    | Menu Items
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar/top navigation of the admin panel.
    |
    | For detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/8.-Menu-Configuration
    |
    */

    'menu' => [
        [
            'text' => 'search',
            'search' => false,
            'topnav' => true,
        ],
        [
            'text' => 'blog',
            'url'  => 'admin/blog',
            'can'  => 'manage-blog',
        ],
        ['header' => 'ЗАПИСИ'],
        [
            'text'        => 'Блог',
//            'url'         => 'admin/modules',
            'icon'        => '/img/admin/blog.svg',
//            'label'       => 3,
            'label_color' => 'success',
            'submenu' => [
                [
                    'text' => 'Список Записей ',
                    'url'  => '/admin/modules/items/list/36',
                ],
                [
                    'text' => 'Рубрики записей',
                    'url'  => '/admin/taxonomy/items/list/16',
                ],
            ],
        ],
        [
            'text'        => 'Шаблоны',
//            'url'         => 'admin/modules',
            'icon'        => '/img/admin/blog.svg',
//            'label'       => 3,
            'label_color' => 'success',
            'submenu' => [
                [
                    'text' => 'Список шаблонов ',
                    'url'  => '/admin/modules/items/list/30',
                ],
                [
                    'text' => 'Категории шаблонов',
                    'url'  => '/admin/taxonomy/items/list/7',
                ],
            ],
        ],
        [
            'text'        => 'Клиенты',
//            'url'         => 'admin/modules',
            'icon'        => '/img/admin/clients.svg',
//            'label'       => 3,
            'label_color' => 'success',
            'submenu' => [
                [
                    'text' => 'Список клиентов ',
                    'url'  => '/admin/modules/items/list/25',
                ],
                [
                    'text' => 'Отзывы ',
                    'url'  => '/admin/modules/items/list/28',
                ],
                [
                    'text' => 'Комментарии ',
                    'url'  => '/admin/comment',
                ],
            ],

        ],
        [
            'text'        => 'Тарифы',
//            'url'         => 'admin/modules',
            'icon'        => '/img/admin/subscribe.svg',
//            'label'       => 3,
            'label_color' => 'success',
            'submenu' => [
                [
                    'text' => 'Виды тарифов',
                    'url'  => '/admin/modules/items/list/26',
                ],
            ],

        ],
        [
            'text'        => 'FAQ',
//            'url'         => 'admin/modules',
            'icon'        => '/img/admin/faq.svg',
//            'label'       => 3,
            'label_color' => 'success',
            'submenu' => [
                [
                    'text' => 'Записи',
                    'url'  => '/admin/modules/items/list/38',
                ],
            ],

        ],
        ['header' => 'СТРУКТУРА'],
        [
            'text'        => 'Доступы',
//            'url'         => 'admin/modules',
            'icon'        => '/img/admin/secure.svg',
//            'label'       => 3,
            'label_color' => 'success',
            'submenu' => [
                [
                    'text' => 'Пользователи',
                    'url'  => '/admin/user',
                ],
                [
                    'text' => 'Роли',
                    'url'  => '/admin/role',
                ],
                [
                    'text' => 'Группы прав',
                    'url'  => '/admin/permission_group',
                ],
                [
                    'text' => 'Права',
                    'url'  => '/admin/permission',
                ],
            ]
        ],
        [
            'text'        => 'templates',
//            'url'         => 'admin/block_templates',
            'icon'        => '/img/admin/templates.svg',
//            'label'       => 3,
            'label_color' => 'success',
            'submenu' => [
                [
                    'text' => 'templates',
                    'url'  => 'admin/block_templates',
                ],
                [
                    'text' => 'Группы',
                    'url'  => '/admin/block_template_groups',
                ],
            ]
        ],
        [
            'text'        => 'pages',
            'url'         => 'admin/pages',
            'icon'        => 'fas fa-copy',
//            'label'       => 4,
            'label_color' => 'success',
        ],
        [
            'text'        => 'Меню',
            'url'         => 'admin/menu',
//            'icon'        => '/img/admin/menu.svg',
            'icon'        => 'far fa-fw fa-address-card',
//            'label'       => 3,
            'label_color' => 'success',
        ],
        [
            'text'        => 'Модули',
            'url'         => 'admin/modules',
            'icon'        => 'fa fa-tasks',
//            'label'       => 3,
            'label_color' => 'success',
        ],
        [
            'text'        => 'Таксономии',
            'url'         => 'admin/taxonomy',
            'icon'        => 'fa fa-solid fa-tags',
//            'label'       => 3,
            'label_color' => 'success',
        ],
        [
            'text'        => 'Виджеты',
            'url'         => 'admin/widget',
            'icon'        => 'fas fa-th',
//            'label'       => 3,
            'label_color' => 'success',
        ],
        [
            'text'        => 'Рассылка',
            'url'         => '/admin/modules/items/list/27',
            'icon'        => 'fa fa-solid fa-envelope',
//            'label'       => 3,
            'label_color' => 'success',
        ],
        [
            'text'        => 'Галереи',
            'url'         => '/admin/galleries',
            'icon'        => 'fa fa-solid fa-images',
//            'label'       => 3,
            'label_color' => 'success',
        ],
        [
            'text'        => 'Формы',
            'url'         => '/admin/forms',
            'icon'        => 'fa fa-solid fa-images',
//            'label'       => 3,
            'label_color' => 'success',
        ],
        ['header' => 'ПАРАМЕТРЫ'],
        [
            'text'        => 'languages',
            'url'         => 'admin/language',
            'icon'        => 'fa fa-globe',
//            'label'       => 3,
            'label_color' => 'success',
        ],
        [
            'text'        => 'Настройки',
            'url'         => 'admin/variables',
            'icon'        => 'fas fa-cog',
//            'label'       => 3,
            'label_color' => 'success',
        ],
        [
            'text'        => 'Контакты',
            'url'         => 'admin/contacts',
            'icon'        => 'fas fa-cog',
//            'label'       => 3,
            'label_color' => 'success',
        ],

//        ['header' => 'account_settings'],
//        [
//            'text' => 'profile',
//            'url'  => 'admin/settings',
//            'icon' => 'fas fa-fw fa-user',
//        ],
//        [
//            'text' => 'change_password',
//            'url'  => 'admin/settings',
//            'icon' => 'fas fa-fw fa-lock',
//        ],
////        [
////            'text'    => 'Картины',
////            'icon'    => 'fas fa-fw fa-share',
////            'submenu' => [
////                [
////                    'text' => 'Список',
////                    'url'  => '/admin/picture',
////                ],
////                [
////                    'text' => 'Создать',
////                    'url'  => '/admin/picture/create',
////                ],
////            ]
////        ],
//        [
//            'text'    => 'multilevel',
//            'icon'    => 'fas fa-fw fa-share',
//            'submenu' => [
//                [
//                    'text' => 'level_one',
//                    'url'  => '#',
//                ],
//                [
//                    'text'    => 'level_one',
//                    'url'     => '#',
//                    'submenu' => [
//                        [
//                            'text' => 'level_two',
//                            'url'  => '#',
//                        ],
//                        [
//                            'text'    => 'level_two',
//                            'url'     => '#',
//                            'submenu' => [
//                                [
//                                    'text' => 'level_three',
//                                    'url'  => '#',
//                                ],
//                                [
//                                    'text' => 'level_three',
//                                    'url'  => '#',
//                                ],
//                            ],
//                        ],
//                    ],
//                ],
//                [
//                    'text' => 'level_one',
//                    'url'  => '#',
//                ],
//            ],
//        ],
//        ['header' => 'labels'],
//        [
//            'text'       => 'important',
//            'icon_color' => 'red',
//            'url'        => '#',
//        ],
//        [
//            'text'       => 'warning',
//            'icon_color' => 'yellow',
//            'url'        => '#',
//        ],
//        [
//            'text'       => 'information',
//            'icon_color' => 'cyan',
//            'url'        => '#',
//        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Menu Filters
    |--------------------------------------------------------------------------
    |
    | Here we can modify the menu filters of the admin panel.
    |
    | For detailed instructions you can look the menu filters section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/8.-Menu-Configuration
    |
    */

    'filters' => [
        JeroenNoten\LaravelAdminLte\Menu\Filters\GateFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\HrefFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\SearchFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ActiveFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ClassesFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\LangFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\DataFilter::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Plugins Initialization
    |--------------------------------------------------------------------------
    |
    | Here we can modify the plugins used inside the admin panel.
    |
    | For detailed instructions you can look the plugins section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/9.-Other-Configuration
    |
    */

    'plugins' => [
        'Datatables' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css',
                ],
            ],
        ],
        'Select2' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.css',
                ],
            ],
        ],
        'Chartjs' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.bundle.min.js',
                ],
            ],
        ],
        'Sweetalert2' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.jsdelivr.net/npm/sweetalert2@8',
                ],
            ],
        ],
        'Pace' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/themes/blue/pace-theme-center-radar.min.css',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js',
                ],
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Livewire
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Livewire support.
    |
    | For detailed instructions you can look the livewire here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/9.-Other-Configuration
    */

    'livewire' => false,
];
