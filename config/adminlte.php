<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Title
    |--------------------------------------------------------------------------
    |
    | Here you can change the default title of your admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#61-title
    |
    */

    'title' => 'Raspberry Net',
    'title_prefix' => '',
    'title_postfix' => '',

    /*
    |--------------------------------------------------------------------------
    | Favicon
    |--------------------------------------------------------------------------
    |
    | Here you can activate the favicon.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#62-favicon
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
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#63-logo
    |
    */

    'logo' => 'RaspberryNet Staff',
    'logo_img' => 'https://www.raspberrypi.org/app/uploads/2020/05/Raspberry-Pi-OS-downloads-image-150x150-1.png',
    'logo_img_class' => 'brand-image img-circle elevation-3',
    'logo_img_xl' => null,
    'logo_img_xl_class' => 'brand-image-xs',
    'logo_img_alt' => 'Raspberry Network Staff Temporary Logo',

    /*
    |--------------------------------------------------------------------------
    | User Menu
    |--------------------------------------------------------------------------
    |
    | Here you can activate and change the user menu.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#64-user-menu
    |
    */

    'usermenu_enabled' => true,
    'usermenu_header' => false,
    'usermenu_header_class' => 'bg-primary',
    'usermenu_image' => false,
    'usermenu_desc' => false,

    /*
    |--------------------------------------------------------------------------
    | Layout
    |--------------------------------------------------------------------------
    |
    | Here we change the layout of your admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#65-layout
    |
    */

    'layout_topnav' => null,
    'layout_boxed' => null,
    'layout_fixed_sidebar' => null,
    'layout_fixed_navbar' => null,
    'layout_fixed_footer' => null,

    /*
    |--------------------------------------------------------------------------
    | Extra Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#66-classes
    |
    */

    'classes_body' => '',
    'classes_brand' => '',
    'classes_brand_text' => '',
    'classes_content_header' => '',
    'classes_content' => '',
    'classes_sidebar' => 'sidebar-dark-primary elevation-4',
    'classes_sidebar_nav' => '',
    'classes_topnav' => 'navbar-white navbar-light',
    'classes_topnav_nav' => 'navbar-expand-md',
    'classes_topnav_container' => 'container',

    /*
    |--------------------------------------------------------------------------
    | Sidebar
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar of the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#67-sidebar
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
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#68-control-sidebar-right-sidebar
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
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#69-urls
    |
    */

    'use_route_url' => false,

    'dashboard_url' => '/dashboard',

    'logout_url' => '/auth/logout',

    'login_url' => '/auth/login',

    'register_url' => '/auth/register',

    'password_reset_url' => '/auth/password/reset',

    'password_email_url' => '/auth/password/email',

    'profile_url' => false,

    /*
    |--------------------------------------------------------------------------
    | Laravel Mix
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Laravel Mix option for the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#610-laravel-mix
    |
    */

    'enabled_laravel_mix' => false,

    /*
    |--------------------------------------------------------------------------
    | Menu Items
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar/top navigation of the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#611-menu
    |
    */

    'menu' => [
        [
          'text' => 'Home',
          'icon' => 'fas fa-home',
          'url' => 'dashboard'
        ],
        [
          'text' => 'Directory',
          'icon' => 'fas fa-users',
          'url' => 'users/directory',
          'can' => 'profiles.view.others'
        ],
        [
            'header' => 'Applications',
            'can' => 'applications.view.own'
        ],
        [
            'text' => 'My Applications',
            'icon'  => 'fas fa-fw fa-list-ul',
            'can' => 'applications.view.own',
            'submenu' => [
                [
                    'text' => 'Current Applications',
                    'icon' => 'fas fa-fw fa-check-double',
                    'url' => '/applications/my-applications'
                ]
            ],

        ],
        'My Profile',
        [
            'text' => 'Profile Settings',
            'url' => '/profile/settings',
            'icon' => 'fas fa-fw fa-cog'
        ],
        [
            'text' => 'My Account Settings',
            'icon' => 'fas fa-user-circle',
            'url' => '/profile/settings/account'
        ],
        [
            'header' => 'Application Management',
            'can' => ['applications.view.all', 'applications.vote']
        ],
        [
          'text' => 'All applications',
          'url' => 'applications/staff/all',
          'icon' => 'fas fa-list-ol',
          'can' => 'applications.view.all'
        ],
        [
            'text' => 'Outstanding Applications',
            'url' => '/applications/staff/outstanding',
            'icon' => 'far fa-folder-open',
            'can' => 'applications.view.all'
        ],
        [
            'text' => 'Interview Queue',
            'url' => '/applications/staff/pending-interview',
            'icon' => 'fas fa-fw fa-microphone-alt',
            'can' => 'applications.view.all'
        ],
        [
            'text' => 'Peer Approval Queue',
            'url' => '/applications/staff/peer-review',
            'icon' => 'fas fa-fw fa-search',
            'can' => 'applications.view.all'
        ],
        [
            'header' => 'Administration',
            'can' => [ // may need to be modified
                'admin.hiring.*',
                'admin.userlist',
                'admin.stafflist',
                'admin.hiring.*',
                'admin.notificationsettings.*'
            ]
        ],
        [
            'text' => 'Staff Members',
            'icon' => 'fas fa-fw fa-users',
            'url' => '/hr/staff-members',
            'can' => 'admin.stafflist'
        ],
        [    // players who haven't been promoted yet
            'text' => 'Registered Players',
            'icon' => 'fas fa-fw fa-user-friends',
            'url' => '/hr/players',
            'can' => 'admin.userlist'
        ],
        [
          'text' => 'Hiring Management',
          'icon' => 'far fa-calendar-plus',
            'can' => 'admin.hiring.*',
            'submenu' => [
                [
                    'text' => 'Open Positions',
                    'icon' => 'fas fa-box-open',
                    'url' => '/admin/positions'
                ],
                [
                    'text' => 'Forms',
                    'icon' => 'fab fa-wpforms',
                    'submenu' => [
                        [
                            'text' => 'All forms',
                            'icon' => 'far fa-list-alt',
                            'url' => '/admin/forms'
                        ],
                        [
                            'text' => 'Form Builder',
                            'icon' => 'fas fa-fw fa-hammer',
                            'url' => '/admin/forms/builder'
                        ]
                    ]
                ]
            ]
        ],
        [
            'text' => 'App Settings',
            'icon' => 'fas fa-fw fa-cog',
            'can' => 'admin.notificationsettings',
            'submenu' => [
                [
                    'text' => 'Global Notification Settings',
                    'icon' => 'far fa-bell',
                    'url' => '/admin/notifications',
                    'can' => 'admin.notificationsettings.edit'
                ],
                [
                    'text' => 'Developer Tools',
                    'icon' => 'fas fa-code',
                    'url' => '/admin/devtools',
                    'can' => 'admin.developertools.use'
                 ]
            ]
        ],
        [
            'text' => 'System Logs',
            'url' => '/admin/maintenance/system-logs',
            'icon' => 'fas fa-clipboard-list',
            'can' => 'admin.maintenance.logs.view'
        ]
    ],

    /*
    |--------------------------------------------------------------------------
    | Menu Filters
    |--------------------------------------------------------------------------
    |
    | Here we can modify the menu filters of the admin panel.
    |
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#612-menu-filters
    |
    */

    'filters' => [
        JeroenNoten\LaravelAdminLte\Menu\Filters\HrefFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\SearchFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ActiveFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\SubmenuFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ClassesFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\GateFilter::class,
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
    | For more detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/#613-plugins
    |
    */

    'plugins' => [
        [
            'name' => 'Datatables',
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
        [
            'name' => 'FormBuilder',
            'active' => true,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '/js/formbuilder.js'
                ]
            ]
        ],
        [
            'name' => 'Select2',
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
        [
            'name' => 'Chartjs',
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.bundle.min.js',
                ],
            ],
        ],
        [
            'name' => 'Sweetalert2',
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.jsdelivr.net/npm/sweetalert2@8',
                ],
            ],
        ],
        [
            'name' => 'Pace',
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
        [
            'name' => 'Toastr',
            'active' => true,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => 'https://cdn.jsdelivr.net/npm/toastr@2.1.4/toastr.min.js'
                ],
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => 'https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css'
                ]
            ]
        ],
        [
            'name' => 'GlobalTooltip',
            'active' => true,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '/js/globaltooltip.js'
                ]
            ]
        ],
        [
            'name' => 'DatePickApp',
            'active' => true,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '/js/datepick.js'
                ]
            ]
        ],
        [
          'name' => 'Fullcalendar',
          'active' => true,
          'files' => [
            [
              'type' => 'js',
              'asset' => false,
              'location' => 'https://cdn.jsdelivr.net/npm/fullcalendar@5.0.1/main.min.js',
            ],
            [
              'type' => 'css',
              'asset' => false,
              'location' => 'https://cdn.jsdelivr.net/npm/fullcalendar@5.0.1/main.min.css'
            ]
          ]
        ],
        [
          'name' => 'AuthCustomisations',
          'active' => true,
          'files' => [
            [
              'type' => 'css',
              'asset' => false,
              'location' => '/css/authpages.css'
            ]
          ]
        ]
    ],
];
