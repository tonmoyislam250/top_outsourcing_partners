<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Cloudinary Configuration
    |--------------------------------------------------------------------------
    |
    | Here you may configure your settings for Cloudinary, a cloud service
    | that offers a solution to web applications' entire image management
    | pipeline.
    |
    */

    'cloud_name' => env('CLOUDINARY_CLOUD_NAME'),
    'api_key' => env('CLOUDINARY_API_KEY'),
    'api_secret' => env('CLOUDINARY_API_SECRET'),
    'secure' => true,

    /*
    |--------------------------------------------------------------------------
    | Upload Presets
    |--------------------------------------------------------------------------
    |
    | Define upload presets for different types of uploads
    |
    */

    'upload_presets' => [
        'team_members' => [
            'folder' => 'team_members',
            'transformation' => [
                'quality' => 'auto:good',
                'fetch_format' => 'auto',
            ],
        ],
        'blog_posts' => [
            'folder' => 'blog_posts',
            'transformation' => [
                'quality' => 'auto:good',
                'fetch_format' => 'auto',
            ],
        ],
        'case_studies' => [
            'folder' => 'case_studies',
            'transformation' => [
                'quality' => 'auto:good',
                'fetch_format' => 'auto',
            ],
        ],
        'tinymce_images' => [
            'folder' => 'tinymce_images',
            'transformation' => [
                'quality' => 'auto:good',
                'fetch_format' => 'auto',
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Image Transformations
    |--------------------------------------------------------------------------
    |
    | Define common image transformations
    |
    */

    'transformations' => [
        'thumbnail' => [
            'width' => 150,
            'height' => 150,
            'crop' => 'fill',
            'quality' => 'auto:good',
        ],
        'medium' => [
            'width' => 500,
            'height' => 500,
            'crop' => 'limit',
            'quality' => 'auto:good',
        ],
        'large' => [
            'width' => 1200,
            'height' => 800,
            'crop' => 'limit',
            'quality' => 'auto:good',
        ],
    ],
];
