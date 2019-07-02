<?php

declare(strict_types = 1);

namespace drupol\launcher;

use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

/**
 * Class Launcher.
 */
class Launcher
{
    /**
     * Open a resource on your operating system.
     *
     * @param string ...$resources
     *   The resource. (URL, filepath, etc etc)
     *
     * @throws \Exception
     */
    public static function open(string ...$resources): void
    {
        $baseCommand = self::getCommand();

        foreach ($resources as $resource) {
            $command = $baseCommand;

            $command[] = $resource;

            $process = new Process($command);

            $process->run();

            if (!$process->isSuccessful()) {
                throw new ProcessFailedException($process);
            }
        }
    }

    /**
     * Get the command to run.
     *
     * @throws \Exception
     *
     * @return null|array
     */
    protected static function getCommand(): ?array
    {
        $command = null;

        switch (PHP_OS_FAMILY) {
            case 'BSD':
            case 'Linux':
            case 'Solaris':
                $command = 'xdg-open';

                break;

            case 'Darwin':
                $command = 'open';

                break;

            case 'Windows':
                $command = 'start';

                break;
        }

        if (null === $command) {
            throw new \Exception('Unable to find the operating system.');
        }

        return [$command];
    }
}
