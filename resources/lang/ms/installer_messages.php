<?php

return [

    /**
     *
     * Shared translations.
     *
     */
    'title' => 'FlexiblePos Installer',
    'next' => 'Langkah seterusnya',
    'back' => 'Sebelumnya',
    'finish' => 'Pasang',
    'forms' => [
        'errorTitle' => 'Ralat berikut berlaku:',
    ],

    /**
     *
     * Home page translations.
     *
     */
    'welcome' => [
        'templateTitle' => 'selamat datang',
        'title'   => 'FlexiblePos Installer',
        'message' => 'Wizard Pemasangan dan Persediaan Mudah.',
        'next'    => 'Semak Keperluan',
    ],

    /**
     *
     * Requirements page translations.
     *
     */
    'requirements' => [
        'templateTitle' => 'Langkah 1 | Keperluan Pelayan',
        'title' => 'Keperluan Pelayan',
        'next'    => 'Semak Kebenaran',
    ],

    /**
     *
     * Permissions page translations.
     *
     */
    'permissions' => [
        'templateTitle' => 'Langkah 2 | kebenaran',
        'title' => 'kebenaran',
        'next' => 'Konfigurasi Persekitaran',
    ],

    /**
     *
     * Environment page translations.
     *
     */
    'environment' => [
        'menu' => [
            'templateTitle' => 'Langkah 3 | Tetapan Persekitaran',
            'title' => 'Tetapan Persekitaran',
            'desc' => 'Sila pilih cara anda mahu mengkonfigurasi fail <code>.env</code> apl.',
            'wizard-button' => 'Persediaan Wizard Borang',
            'classic-button' => 'Editor Teks Klasik',
        ],
        'wizard' => [
            'templateTitle' => 'Langkah 3 | Tetapan Persekitaran | Wizard Berpandu',
            'title' => 'Panduan <code>.env</code> Wizard',
            'tabs' => [
                'environment' => 'Persekitaran',
                'database' => 'Pangkalan data',
                'application' => 'Permohonan'
            ],
            'form' => [
                'name_required' => 'Nama persekitaran diperlukan.',
                'app_name_label' => 'Nama Apl',
                'app_name_placeholder' => 'Nama Apl',
                'app_environment_label' => 'Persekitaran Apl',
                'app_environment_label_local' => 'Tempatan',
                'app_environment_label_developement' => 'Pembangunan',
                'app_environment_label_qa' => 'Qa',
                'app_environment_label_production' => 'Pengeluaran',
                'app_environment_label_other' => 'Lain-lain',
                'app_environment_placeholder_other' => 'Masukkan persekitaran anda...',
                'app_debug_label' => 'App Nyahpepijat',
                'app_debug_label_true' => 'betul',
                'app_debug_label_false' => 'Salah',
                'app_log_level_label' => 'App Log Level',
                'app_log_level_label_debug' => 'Nyahpepijat',
                'app_log_level_label_info' => 'info',
                'app_log_level_label_notice' => 'notis',
                'app_log_level_label_warning' => 'amaran',
                'app_log_level_label_error' => 'kesilapan',
                'app_log_level_label_critical' => 'kritikal',
                'app_log_level_label_alert' => 'amaran',
                'app_log_level_label_emergency' => 'kecemasan',
                'app_url_label' => 'App Url',
                'app_url_placeholder' => 'App Url',
                'db_connection_label' => 'Sambungan Pangkalan Data',
                'db_connection_label_mysql' => 'mysql',
                'db_connection_label_sqlite' => 'sqlite',
                'db_connection_label_pgsql' => 'pgsql',
                'db_connection_label_sqlsrv' => 'sqlsrv',
                'db_host_label' => 'Database Host',
                'db_host_placeholder' => 'Database Host',
                'db_port_label' => 'Database Port',
                'db_port_placeholder' => 'Database Port',
                'db_name_label' => 'Nama Pangkalan Data',
                'db_name_placeholder' => 'Nama Pangkalan Data',
                'db_username_label' => 'Nama Pengguna Pangkalan Data',
                'db_username_placeholder' => 'Nama Pengguna Pangkalan Data',
                'db_password_label' => 'Kata Laluan Pangkalan Data',
                'db_password_placeholder' => 'Kata Laluan Pangkalan Data',

                'app_tabs' => [
                    'more_info' => 'Maklumat Lanjut',
                    'broadcasting_title' => 'Penyiaran, Caching, Sesi, &amp; Beratur',
                    'broadcasting_label' => 'Pemacu Siaran',
                    'broadcasting_placeholder' => 'Pemacu Siaran',
                    'cache_label' => 'Pemandu Cache',
                    'cache_placeholder' => 'Pemandu Cache',
                    'session_label' => 'Session Driver',
                    'session_placeholder' => 'Session Driver',
                    'queue_label' => 'Queue Driver',
                    'queue_placeholder' => 'Queue Driver',
                    'redis_label' => 'Redis Driver',
                    'redis_host' => 'Redis Host',
                    'redis_password' => 'Redis Password',
                    'redis_port' => 'Redis Port',

                    'mail_label' => 'Mail',
                    'mail_driver_label' => 'Mail Driver',
                    'mail_driver_placeholder' => 'Mail Driver',
                    'mail_host_label' => 'Mail Host',
                    'mail_host_placeholder' => 'Mail Host',
                    'mail_port_label' => 'Mail Port',
                    'mail_port_placeholder' => 'Mail Port',
                    'mail_username_label' => 'Mail Nama pengguna',
                    'mail_username_placeholder' => 'Mail Nama pengguna',
                    'mail_password_label' => 'Mail Kata laluan',
                    'mail_password_placeholder' => 'Mail Kata laluan',
                    'mail_encryption_label' => 'Mail Penyulitan',
                    'mail_encryption_placeholder' => 'Mail Penyulitan',

                    'pusher_label' => 'Pusher',
                    'pusher_app_id_label' => 'Pusher App Id',
                    'pusher_app_id_palceholder' => 'Pusher App Id',
                    'pusher_app_key_label' => 'Pusher App Key',
                    'pusher_app_key_palceholder' => 'Pusher App Key',
                    'pusher_app_secret_label' => 'Pusher App Secret',
                    'pusher_app_secret_palceholder' => 'Pusher App Secret',
                ],
                'buttons' => [
                    'setup_database' => 'Setup Database',
                    'setup_application' => 'Setup Application',
                    'install' => 'Install',
                ],
            ],
        ],
        'classic' => [
            'templateTitle' => 'Langkah 3 | Tetapan Persekitaran | Editor Klasik',
            'title' => 'Editor Persekitaran Klasik',
            'save' => 'Jimat .env',
            'back' => 'Gunakan Borang Wizard',
            'install' => 'Save and Install',
        ],
        'success' => 'Your .env file settings have been saved.',
        'errors' => 'Unable to save the .env file, Please create it manually.',
    ],

    'install' => 'Install',

    /**
     *
     * Installed Log translations.
     *
     */
    'installed' => [
        'success_log_message' => 'FlexiblePos Installer successfully INSTALLED on ',
    ],

    /**
     *
     * Final page translations.
     *
     */
    'final' => [
        'title' => 'Installation Finished',
        'templateTitle' => 'Installation Finished',
        'finished' => 'Application has been successfully installed.',
        'migration' => 'Migration &amp; Seed Console Output:',
        'console' => 'Application Console Output:',
        'log' => 'Installation Log Entry:',
        'env' => 'Final .env File:',
        'exit' => 'Click here to exit',
    ],

    /**
     *
     * Update specific translations
     *
     */
    'updater' => [
        /**
         *
         * Shared translations.
         *
         */
        'title' => 'FlexiblePos Updater',

        /**
         *
         * Welcome page translations for update feature.
         *
         */
        'welcome' => [
            'title'   => 'Welcome To The Updater',
            'message' => 'Welcome to the update wizard.',
        ],

        /**
         *
         * Welcome page translations for update feature.
         *
         */
        'overview' => [
            'title'   => 'Overview',
            'message' => 'There is 1 update.|There are :number updates.',
            'install_updates' => "Install Updates"
        ],

        /**
         *
         * Final page translations.
         *
         */
        'final' => [
            'title' => 'Finished',
            'finished' => 'Application\'s database has been successfully updated.',
            'exit' => 'Click here to exit',
        ],

        'log' => [
            'success_message' => 'FlexiblePos Installer successfully UPDATED on ',
        ],
    ],
];
