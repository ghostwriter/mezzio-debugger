#!/usr/bin/env php
<?php

declare(strict_types=1);

namespace Ghostwriter\MezzioDebugger;

use ErrorException;
use Ghostwriter\Container\Container;
use Ghostwriter\MezzioDebugger\Console\Application;

use const DIRECTORY_SEPARATOR;
use const STDERR;

use function dirname;
use function file_exists;
use function fwrite;
use function implode;
use function restore_error_handler;
use function set_error_handler;
use function sprintf;

/** @var ?string $_composer_autoload_path */
(static function (string $autoloader): void {
    if (! file_exists($autoloader)) {
        fwrite(STDERR, sprintf(
            '[ERROR]Cannot locate "%s"\n please run "composer install"\n',
            $autoloader
        ));
        exit;
    }

    set_error_handler(static function (int $severity, string $message, string $file, int $line): never {
        throw new ErrorException($message, 255, $severity, $file, $line);
    });

    require $autoloader;

    restore_error_handler();

    /**
     * #BlackLivesMatter.
     */
    $container = Container::getInstance();
    $application = $container->get(Application::class);
    $exitCode = $application->run();
    exit($exitCode);
})(
    $_composer_autoload_path ?? implode(DIRECTORY_SEPARATOR, [
        dirname(__DIR__),
        'vendor',
        'autoload.php',
    ])
);
