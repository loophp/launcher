<?php

declare(strict_types = 1);

namespace drupol\launcher;

use drupol\phposinfo\Enum\Family;
use drupol\phposinfo\Enum\FamilyName;
use drupol\phposinfo\OsInfo;
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
            $process = new Process([
                $baseCommand,
                $resource,
            ]);

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
     * @return string
     */
    protected static function getCommand(): string
    {
        switch (OsInfo::family()) {
            case FamilyName::BSD:
            case FamilyName::LINUX:
                $command = 'xdg-open';

                break;

            case FamilyName::DARWIN:
                $command = 'open';

                break;

            case FamilyName::WINDOWS:
                $command = 'start';

                break;

            default:
                throw new \Exception('Unable to find the operating system.');

                break;
        }

        return $command;
    }
}
