<?php

declare(strict_types=1);

namespace Tests\Unit\Exception;

use Ghostwriter\MezzioDebugger\Exception\ShouldNotHappenException;
use Ghostwriter\PHPUnitAssertions\Trait\AssertionsTrait;
use Override;
use PHPUnit\Framework\Attributes\CoversClass;
use Tests\Unit\AbstractTestCase;
use Throwable;

#[CoversClass(ShouldNotHappenException::class)]
final class ShouldNotHappenExceptionTest extends AbstractTestCase
{
    use AssertionsTrait;
    
    /**
    * @throws Throwable
    */
    public function testExtendsException(): void
    {
        self::assertClassExtendsClass(\Ghostwriter\MezzioDebugger\Exception\ShouldNotHappenException::class,\Exception::class);
    }

    /**
    * @throws Throwable
    */
    public function testExtendsLogicException(): void
    {
        self::assertClassExtendsClass(\Ghostwriter\MezzioDebugger\Exception\ShouldNotHappenException::class,\LogicException::class);
    }

    /**
    * @throws Throwable
    */
    public function testImplementsGhostwriterMezzioDebuggerInterfaceExceptionInterface(): void
    {
        self::assertClassImplementsInterface(\Ghostwriter\MezzioDebugger\Exception\ShouldNotHappenException::class,\Ghostwriter\MezzioDebugger\Interface\ExceptionInterface::class);
    }

    /**
    * @throws Throwable
    */
    public function testImplementsStringable(): void
    {
        self::assertClassImplementsInterface(\Ghostwriter\MezzioDebugger\Exception\ShouldNotHappenException::class,\Stringable::class);
    }

    /**
    * @throws Throwable
    */
    public function testImplementsThrowable(): void
    {
        self::assertClassImplementsInterface(\Ghostwriter\MezzioDebugger\Exception\ShouldNotHappenException::class,\Throwable::class);
    }
}
