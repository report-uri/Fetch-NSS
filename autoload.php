<?php
declare(strict_types=1);

$requireDir = function (string $dir) use (&$requireDir) {
    foreach (\scandir($dir) as $item) {
        if ($item === '.' || $item === '..') { continue; }

        $path = "$dir/$item";

        if (\is_dir($path)) { $requireDir($path); }
        elseif (\is_file($path) || \substr($path, -4) === '.php') {
            require_once $path;
        }
    }
};

$requireDir(__DIR__.'/src');
unset($requireDir);
