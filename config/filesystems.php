<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default filesystem disk that should be used
    | by the framework. The "local" disk, as well as a variety of cloud
    | based disks are available to your application. Just store away!
    |
    */

    'default' => env('FILESYSTEM_DRIVER', 'local'),

    /*
    |--------------------------------------------------------------------------
    | Default Cloud Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Many applications store files both locally and in the cloud. For this
    | reason, you may specify a default "cloud" driver here. This driver
    | will be bound as the Cloud disk implementation in the container.
    |
    */

    'cloud' => env('FILESYSTEM_CLOUD', 's3'),

    /*
    |--------------------------------------------------------------------------
    | Filesystem Disks
    |--------------------------------------------------------------------------
    |
    | Here you may configure as many filesystem "disks" as you wish, and you
    | may even configure multiple disks of the same driver. Defaults have
    | been setup for each driver as an example of the required options.
    |
    | Supported Drivers: "local", "ftp", "sftp", "s3"
    |
    */

    'disks' => [

        'local' => [
            'driver' => 'local',
            'root' => storage_path('app'),
        ],

        'public' => [
            'driver' => 'local',
            'root' => storage_path('app/public'),
            'url' => env('APP_URL') . '/storage',
            'visibility' => 'public',
        ],

        's3' => [
            'driver' => 's3',
            'key' => env('AWS_ACCESS_KEY_ID'),
            'secret' => env('AWS_SECRET_ACCESS_KEY'),
            'region' => env('AWS_DEFAULT_REGION'),
            'bucket' => env('AWS_BUCKET'),
            'url' => env('AWS_URL'),
        ],

        'frontImage' => [
            'driver' => 'local',
            'root' => storage_path('app/public/product/front_images'),
            'url' => env('APP_URL') . 'storage/product/front_images',
            'visibility' => 'public',
        ],

        'backImage' => [
            'driver' => 'local',
            'root' => storage_path('app/public/product/back_image'),
            'url' => env('APP_URL') . 'storage/product/back_image',
            'visibility' => 'public',
        ],
        'applicantImage' => [
            'driver' => 'local',
            'root' => storage_path('app/public/applicant_image'),
            'url' => env('APP_URL') . 'storage/applicant_image',
            'visibility' => 'public',
        ],
        'blogImage' => [
            'driver' => 'local',
            'root' => storage_path('app/public/blog_image'),
            'url' => env('APP_URL') . 'storage/blog_image',
            'visibility' => 'public',
        ],
        'ourCustomerProfileImage' => [
            'driver' => 'local',
            'root' => storage_path('app/public/ourCustomerProfile_image'),
            'url' => env('APP_URL') . 'storage/ourCustomerProfile_image',
            'visibility' => 'public',
        ],
        'cmsImage' => [
            'driver' => 'local',
            'root' => storage_path('app/public/cms_image'),
            'url' => env('APP_URL') . 'storage/cms_image',
            'visibility' => 'public',
        ],
        'userImage' => [
            'driver' => 'local',
            'root' => storage_path('app/public/user_image'),
            'url' => env('APP_URL') . 'storage/user_image',
            'visibility' => 'public',
        ],
        'userResume' => [
            'driver' => 'local',
            'root' => storage_path('app/public/user_resume'),
            'url' => env('APP_URL') . 'storage/user_resume',
            'visibility' => 'public',
        ],
        'ourTeams' => [
            'driver' => 'local',
            'root' => storage_path('app/public/our_teams'),
            'url' => env('APP_URL') . 'storage/our_teams',
            'visibility' => 'public',
        ],
        'policyImages' => [
            'driver' => 'local',
            'root' => storage_path('app/public/policy_images'),
            'url' => env('APP_URL') . 'storage/policy_images',
            'visibility' => 'public',
        ],
        'partnerImages' => [
            'driver' => 'local',
            'root' => storage_path('app/public/partner_images'),
            'url' => env('APP_URL') . 'storage/partner_images',
            'visibility' => 'public',
        ],
        'newlyLaunchedImages' => [
            'driver' => 'local',
            'root' => storage_path('app/public/product/newly_launched_images'),
            'url' => env('APP_URL') . 'storage/product/newly_launched_images',
            'visibility' => 'public',
        ],
        'categoryImages' => [
            'driver' => 'local',
            'root' => storage_path('app/public/category_images'),
            'url' => env('APP_URL') . 'storage/category_images',
            'visibility' => 'public',
        ],
        'productGallaryImages' => [
            'driver' => 'local',
            'root' => storage_path('app/public/product_gallary_images'),
            'url' => env('APP_URL') . 'storage/product_gallary_images',
            'visibility' => 'public',
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Symbolic Links
    |--------------------------------------------------------------------------
    |
    | Here you may configure the symbolic links that will be created when the
    | `storage:link` Artisan command is executed. The array keys should be
    | the locations of the links and the values should be their targets.
    |
    */

    'links' => [
        public_path('storage') => storage_path('app/public'),
    ],

];
