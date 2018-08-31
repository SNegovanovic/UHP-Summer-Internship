<?php

spl_autoload_register(function ($className) {

    $targetFile = __DIR__ . '/' . $className . '.php';

    $targetFile = str_replace('\\', '/', $targetFile);
    $targetFile = str_replace('core', 'src', $targetFile);

    if (file_exists($targetFile)) {
        require_once($targetFile);
    }
});