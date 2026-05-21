<?php

// Arahkan storage ke /tmp karena Vercel hanya /tmp yang bisa ditulis
$app_storage = '/tmp/storage';
if (!is_dir($app_storage)) {
    mkdir($app_storage, 0775, true);
    mkdir($app_storage . '/app', 0775, true);
    mkdir($app_storage . '/framework', 0775, true);
    mkdir($app_storage . '/framework/cache', 0775, true);
    mkdir($app_storage . '/framework/sessions', 0775, true);
    mkdir($app_storage . '/framework/views', 0775, true);
    mkdir($app_storage . '/logs', 0775, true);
}

$_ENV['APP_STORAGE'] = $app_storage;

define('LARAVEL_START', microtime(true));
require __DIR__ . '/../public/index.php';

