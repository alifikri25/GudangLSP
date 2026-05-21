<?php

// Setup direktori storage di /tmp (Vercel filesystem read-only)
$app_storage = '/tmp/storage';
$dirs = [
    $app_storage,
    $app_storage . '/app',
    $app_storage . '/app/public',
    $app_storage . '/framework',
    $app_storage . '/framework/cache',
    $app_storage . '/framework/cache/data',
    $app_storage . '/framework/sessions',
    $app_storage . '/framework/views',
    $app_storage . '/framework/testing',
    $app_storage . '/logs',
];
foreach ($dirs as $dir) {
    if (!is_dir($dir)) mkdir($dir, 0775, true);
}

// Override storage path ke /tmp
putenv('APP_STORAGE=' . $app_storage);

// Pastikan APP_KEY terbaca dari env Vercel
if (!getenv('APP_KEY')) {
    putenv('APP_KEY=base64:Hm8H8q1vSlC/iMnGcJdAfNYFZOzh3DYx0W7QSsE4HOs=');
}

define('LARAVEL_START', microtime(true));
require __DIR__ . '/../public/index.php';


