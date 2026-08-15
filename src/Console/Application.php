<?php

declare(strict_types=1);

namespace Ghostwriter\MezzioDebugger\Console;

use Composer\InstalledVersions;

final class Application extends \Symfony\Component\Console\Application
{
    public const NAME = 'Mezzio Debugger';

    public const PACKAGE = 'ghostwriter/mezzio-debugger';

    public function __construct()
    {
        parent::__construct(
            self::NAME,
            InstalledVersions::getPrettyVersion(self::PACKAGE) ?? 'UNKNOWN'
        );

        $this->addCommands([
            new Command\TestCommand(),
        ]);
    }
}
