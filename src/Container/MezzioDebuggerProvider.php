<?php

declare(strict_types=1);

namespace Ghostwriter\MezzioDebugger\Container;

use Ghostwriter\Container\Interface\BuilderInterface;
use Ghostwriter\Container\Interface\ContainerInterface;
use Ghostwriter\Container\Service\Provider\AbstractProvider;
use Override;
use Throwable;

/**
 * @see MezzioDebuggerProviderTest
 */
final class MezzioDebuggerProvider extends AbstractProvider
{
    /**
     * [alias => service].
     *
     * @var array<class-string,class-string>
     */
    public const array ALIAS = [];

    /**
     * [concrete => [abstract => implementation]].
     *
     * @var array<class-string,array<class-string,class-string>>
     */
    public const array BIND = [];

    /**
     * [service => [extension, ...]].
     *
     * @var array<class-string,list<class-string<ExtensionInterface>>>
     */
    public const array EXTEND = [];

    /**
     * [service => factory].
     *
     * @var array<class-string,class-string<FactoryInterface>>
     */
    public const array FACTORY = [];

    /** @throws Throwable */
    #[Override]
    public function boot(ContainerInterface $container): void {}

    /** @throws Throwable */
    #[Override]
    public function register(BuilderInterface $builder): void {}
}
