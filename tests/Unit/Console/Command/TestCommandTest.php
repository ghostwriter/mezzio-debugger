<?php

declare(strict_types=1);

namespace Tests\Unit\Console\Command;

use Ghostwriter\MezzioDebugger\Console\Command\TestCommand;
use Ghostwriter\PHPUnitAssertions\Trait\AssertionsTrait;
use Override;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;
use Throwable;

#[CoversClass(TestCommand::class)]
final class TestCommandTest extends AbstractTestCase
{
    use AssertionsTrait;
    
    /**
    * @throws Throwable
    */
    public function testExtendsSymfonyComponentConsoleCommandCommand(): void
    {
        self::assertClassExtendsClass(\Ghostwriter\MezzioDebugger\Console\Command\TestCommand::class,\Symfony\Component\Console\Command\Command::class);
    }

    /**
    * @throws Throwable
    */
    public function testImplementsSymfonyComponentConsoleCommandSignalableCommandInterface(): void
    {
        self::assertClassImplementsInterface(\Ghostwriter\MezzioDebugger\Console\Command\TestCommand::class,\Symfony\Component\Console\Command\SignalableCommandInterface::class);
    }
}
