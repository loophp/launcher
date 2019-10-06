<?php

declare(strict_types=1);

namespace spec\drupol\launcher;

use drupol\launcher\Launcher;
use drupol\phposinfo\OsInfo;
use PhpSpec\ObjectBehavior;
use Symfony\Component\Process\Exception\ProcessFailedException;

class LauncherSpec extends ObjectBehavior
{
    public function it_can_launch()
    {
        $this::open('https://google.com')
            ->shouldBeNull();

        if (!OsInfo::isWindows()) {
            $this
                ->shouldThrow(ProcessFailedException::class)
                ->during('open', [' lè!&k//\\jds\lkjf- /sdlkj +SD:glskgj ']);
        }
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(Launcher::class);
    }
}
