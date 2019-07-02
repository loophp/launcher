<?php

declare(strict_types = 1);

namespace spec\drupol\launcher\tests;

use drupol\launcher\tests\TestLauncher;
use PhpSpec\ObjectBehavior;

class TestLauncherSpec extends ObjectBehavior
{
    public function it_can_launch()
    {
        $this::open('https://google.com', 'https://github.com');

        $this::getCommands()
            ->shouldReturn(["'xdg-open' 'https://google.com'", "'xdg-open' 'https://github.com'"]);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(TestLauncher::class);
    }
}
