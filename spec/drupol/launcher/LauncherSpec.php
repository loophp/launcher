<?php

declare(strict_types = 1);

namespace spec\drupol\launcher;

use drupol\launcher\Launcher;
use PhpSpec\ObjectBehavior;
use Symfony\Component\Process\Exception\ProcessFailedException;

class LauncherSpec extends ObjectBehavior
{
    public function it_can_launch()
    {
        var_dump($this->getWrappedObject()::open('https://google.com'));

        //$this::open('https://google.com')
        //    ->shouldBeNull();

        $this
            ->shouldThrow(ProcessFailedException::class)
            ->during('open', [' lkjdslkjf /sdlkj +SD:glskgj ']);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(Launcher::class);
    }
}
