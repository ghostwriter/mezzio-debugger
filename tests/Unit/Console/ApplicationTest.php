<?php

declare(strict_types=1);

namespace Tests\Unit\Console;

use Ghostwriter\MezzioDebugger\Console\Application;
use Ghostwriter\PHPUnitAssertions\Trait\AssertionsTrait;
use Override;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;
use Throwable;

#[CoversClass(Application::class)]
final class ApplicationTest extends AbstractTestCase
{
    use AssertionsTrait;
    
    /**
    * @throws Throwable
    */
    public function testExtendsSymfonyComponentConsoleApplication(): void
    {
        self::assertClassExtendsClass(\Ghostwriter\MezzioDebugger\Console\Application::class,\Symfony\Component\Console\Application::class);
    }

    /**
    * @throws Throwable
    */
    public function testImplementsSymfonyContractsServiceResetInterface(): void
    {
        self::assertClassImplementsInterface(\Ghostwriter\MezzioDebugger\Console\Application::class,\Symfony\Contracts\Service\ResetInterface::class);
    }
}
