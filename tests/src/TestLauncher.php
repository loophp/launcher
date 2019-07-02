<?php

declare(strict_types = 1);

namespace drupol\launcher\tests;

use drupol\launcher\Launcher;
use Symfony\Component\Process\Process;

/**
 * Class Launcher.
 */
class TestLauncher extends Launcher
{
    /**
     * @var array
     */
    private static $commands;

    public static function getCommands()
    {
        return self::$commands;
    }

    /**
     * @param string ...$resources
     *
     * @throws \Exception
     */
    public static function open(string ...$resources): void
    {
        $baseCommand = self::getCommand();

        $commands = [];

        foreach ($resources as $resource) {
            $command = $baseCommand;

            $command[] = $resource;

            $process = new Process($command);

            $commands[] = $process->getCommandLine();
        }

        self::$commands = $commands;
    }
}
