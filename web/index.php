<?php

$filename = __DIR__.preg_replace('#(\?.*)$#', '', $_SERVER['REQUEST_URI']);
if (php_sapi_name() === 'cli-server' && is_file($filename)) {
    return false;
}

require_once(__DIR__ . '/../vendor/autoload.php');

date_default_timezone_set('UTC');

\Dotenv::load(__DIR__ . '/../');

$theses = new theses\Theses([
    'root_dir' => realpath(__DIR__ . '/..'),
    'data_dir' => realpath(__DIR__ . '/../_data'),
    'upload_dir' => __DIR__ . '/uploads',
    'config_file' => realpath(__DIR__ . '/../_config.php'),
]);

$theses->run();
