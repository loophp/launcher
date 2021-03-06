<?php

declare(strict_types=1);

namespace spec\loophp\launcher;

use loophp\launcher\Launcher;
use PhpSpec\ObjectBehavior;
use Symfony\Component\Process\Exception\ProcessFailedException;

class LauncherSpec extends ObjectBehavior
{
    /**
     * @requires OSFAMILY Darwin
     */
    public function it_can_open_resources_on_apple()
    {
        $this::open('https://google.com', '/')
            ->shouldBeNull();

        $this
            ->shouldThrow(ProcessFailedException::class)
            ->during('open', [' lè!&k//\\jds\lkjf- /sdlkj +SD:glskgj ']);
    }

    /**
     * @requires OSFAMILY Linux
     */
    public function it_can_open_resources_on_linux()
    {
        $this::open('https://google.com', '/')
            ->shouldBeNull();

        $this
            ->shouldThrow(ProcessFailedException::class)
            ->during('open', [' lè!&k//\\jds\lkjf- /sdlkj +SD:glskgj ']);
    }

    /**
     * @requires OSFAMILY Windows
     */
    public function it_can_open_resources_on_windows()
    {
        $this::open('https://google.com', 'C:\\')
            ->shouldBeNull();
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(Launcher::class);
    }
}
