<?php

declare(strict_types = 1);

namespace drupol\launcher;

use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;
use Tivie\OS\Detector;

/**
 * Class Launcher.
 */
class Launcher
{
    /**
     * @param string ...$resources
     *
     * @throws \Exception
     */
    public static function open(string ...$resources): void
    {
        if (null === $baseCommand = self::getCommand()) {
            throw new \Exception('Unable to find the proper command for your operating system.');
        }

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
     * @return null|array
     */
    protected static function getCommand(): ?array
    {
        $os = new Detector();

        if ($os->isOSX()) {
            return ['open'];
        }

        if ($os->isUnixLike()) {
            return ['xdg-open'];
        }

        if ($os->isWindowsLike()) {
            return ['start'];
        }

        return null;
    }
}
