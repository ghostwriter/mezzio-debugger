<?php

declare(strict_types=1);

namespace Ghostwriter\MezzioDebugger\Console\Command;

use Override;
use Psy\Configuration;
use Psy\Shell;
use Psy\VersionUpdater\Checker;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Throwable;

use const PHP_VERSION;

use function getenv;
use function mb_ltrim;
use function sprintf;

/**
 * @see TestCommandTest
 */
#[AsCommand(name: 'test', description: 'Test command for development purposes.')]
final class TestCommand extends Command
{
    /** @throws Throwable */
    #[Override]
    public function execute(InputInterface $input, OutputInterface $output): int
    {
        // $output->writeln([$this->getName(), str_repeat('=', 12), $this->getDescription()]);

        $shell = new Shell($this->getConfig($input->isInteractive()));
        $shell->setScopeVariables($this->getScopeVariables());
        $shell->run($input, $output);

        return self::SUCCESS;
    }

    private function buildDefaultIncludes(): array
    {
        return [];
    }

    private function buildStartupMessage(): string
    {
        return sprintf(
            'Psy Shell v%s (PHP %s) by Justin Hileman',
            mb_ltrim(Shell::VERSION, 'vV'),
            PHP_VERSION
        );
    }

    private function getConfig(bool $isInteractive): Configuration
    {
        $config = new Configuration([
            // 'pager' => 'more',
            // 'historySize' => 0,
            // 'eraseDuplicates' => false,
            // 'usePcntl' => false,
            // 'useReadline' => false,
            // 'requireSemicolons' => false,
            'startupMessage' => $this->buildStartupMessage(),
            'colorMode' => Configuration::COLOR_MODE_FORCED,
            'updateCheck' => 'never',
            'useBracketedPaste' => true,
            'defaultIncludes' => $this->buildDefaultIncludes(),
        ]);
        $config->addCasters([
            // Crawler::class => 'RoachPHP\Shell\ShellCaster::castCrawler',
            // Link::class => 'RoachPHP\Shell\ShellCaster::castLink',
            // Response::class => 'RoachPHP\Shell\ShellCaster::castResponse',
        ]);

        $config->setColorMode(Configuration::COLOR_MODE_FORCED);
        $config->setUpdateCheck(Checker::NEVER);
        $config->setUseReadline(false);

        if (false === $isInteractive) {
            $config->setInteractiveMode(Configuration::INTERACTIVE_MODE_DISABLED);
        }

        return $config;
    }

    private function getScopeVariables(): array
    {
        $env = getenv();
        $env['PHP_REPL'] = '1';

        return [
            'env' => $env,
        ];
    }
}
