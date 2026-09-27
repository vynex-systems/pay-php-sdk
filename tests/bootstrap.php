<?php

declare(strict_types=1);

// Roda tanto dentro do app Laravel (vendor/ do projeto, 3 niveis acima) quanto standalone (composer install em sdk/php).
foreach ([__DIR__.'/../vendor/autoload.php', dirname(__DIR__, 3).'/vendor/autoload.php'] as $autoload) {
    if (is_file($autoload)) {
        require $autoload;
        break;
    }
}

spl_autoload_register(static function (string $class): void {
    foreach (['Vynex\\Pay\\Tests\\' => __DIR__.'/', 'Vynex\\Pay\\' => dirname(__DIR__).'/src/'] as $prefix => $dir) {
        if (str_starts_with($class, $prefix)) {
            $file = $dir.str_replace('\\', '/', substr($class, strlen($prefix))).'.php';
            if (is_file($file)) {
                require $file;
            }

            return;
        }
    }
});
