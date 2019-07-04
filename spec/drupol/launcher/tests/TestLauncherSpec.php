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
                $template = "'%s' '%s'";

                break;

            case 'Darwin':
                $command = 'open';
                $template = "%s '%s'";

                break;

            case 'Windows':
                $command = 'start';
                $template = '%s "%s"';

                break;

            default:
                throw new \Exception('Unable to find the operating system.');

                break;
        }

        $this::open('https://google.com', 'https://github.com');

        $this::getCommands()
            ->shouldReturn([\sprintf($template, $command, 'https://google.com'), \sprintf($template, $command, 'https://github.com')]);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(TestLauncher::class);
    }
}
