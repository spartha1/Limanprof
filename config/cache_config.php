<?php
return [
    'enabled' => true,
    'path' => __DIR__ . '/../cache',
    'lifetime' => 3600, // 1 hora
    'excluded_paths' => [
        '/admin/',
        '/dashboard/',
        '/login.php'
    ],
    'cache_types' => [
        'html' => true,
        'images' => true,
        'css' => true,
        'js' => true
    ]
];
