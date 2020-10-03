<?php

    return [
        'dir' => base_path(). '/nuxt',
        'mode' => env('NUXT_MODE', 'spa'),
        'url' => env('NUXT_URL', 'http://localhost:3000'),
        'base' => env('NUXT_BASE', '/nuxt/'),
        'debug' => env('NUXT_DEBUG', false),
    ];
