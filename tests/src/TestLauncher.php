<?php

declare(strict_types=1);

namespace drupol\launcher\tests;

use drupol\launcher\Launcher;
use Exception;
use Symfony\Component\Process\Process;

/**
 * Class Launcher.
 */
class TestLauncher extends Launcher
{
    /**
     * @var string[]
     */
    private static $commands;

    /**
     * @return string[]
     */
    public static function getCommands(): array
    {
        return self::$commands;
    }

    /**
     * @param string ...$resources
     *
     * @throws Exception
     */
    public static function open(string ...$resources): void
    {
        $baseCommand = self::getCommand();

        $commands = [];

        foreach ($resources as $resource) {
            $process = new Process([
                $baseCommand,
                $resource,
            ]);

            $commands[] = $process->getCommandLine();
        }

        self::$commands = $commands;
    }
}
