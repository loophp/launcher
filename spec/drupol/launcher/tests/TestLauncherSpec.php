<?php

declare(strict_types = 1);

namespace spec\drupol\launcher\tests;

use drupol\launcher\tests\TestLauncher;
use PhpSpec\ObjectBehavior;

class TestLauncherSpec extends ObjectBehavior
{
    public function it_can_launch()
    {
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

            default:
                throw new \Exception('Unable to find the operating system.');

                break;
        }

        $this::open('https://google.com', 'https://github.com');

        $this::getCommands()
            ->shouldReturn(["{$command} 'https://google.com'", "{$command} 'https://github.com'"]);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(TestLauncher::class);
    }
}
