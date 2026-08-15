<?php

declare(strict_types=1);

namespace Tests\Unit\Container;

use Ghostwriter\MezzioDebugger\Container\MezzioDebuggerProvider;
use Ghostwriter\PHPUnitAssertions\Trait\AssertionsTrait;
use Override;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;
use Throwable;

#[CoversClass(MezzioDebuggerProvider::class)]
final class MezzioDebuggerProviderTest extends AbstractTestCase
{
    use AssertionsTrait;
    
    /**
    * @throws Throwable
    */
    public function testExtendsGhostwriterContainerServiceProviderAbstractProvider(): void
    {
        self::assertClassExtendsClass(\Ghostwriter\MezzioDebugger\Container\MezzioDebuggerProvider::class,\Ghostwriter\Container\Service\Provider\AbstractProvider::class);
    }

    /**
    * @throws Throwable
    */
    public function testImplementsGhostwriterContainerInterfaceServiceProviderInterface(): void
    {
        self::assertClassImplementsInterface(\Ghostwriter\MezzioDebugger\Container\MezzioDebuggerProvider::class,\Ghostwriter\Container\Interface\Service\ProviderInterface::class);
    }
}
