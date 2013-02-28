<?php

namespace spec\DrupalMngr;

use PHPSpec2\ObjectBehavior;
use Symfony\Component\Filesystem\Filesystem;

class VersionFinder extends ObjectBehavior
{

    const SOME_PATH = 'some/path';

    function let($filesystem)
    {
        $filesystem->beAMockOf('Symfony\Component\Filesystem\Filesystem');
        $this->beConstructedWith($filesystem);
    }

    /**
     * @param $filesystem Filesystem
     */
    function it_should_use_filesystem_to_check_if_the_path_exists($filesystem)
    {
        $path = self::SOME_PATH;

        $filesystem->exists($path)->shouldBeCalled()->willReturn(true);

        $this->getCurrentVersion($path);
    }

    /**
     * @param $filesystem Filesystem
     */
    function EXCLUDEDit_should_throw_an_exception_if_the_path_does_not_exist($filesystem)
    {
        $nonExistingPath = self::SOME_PATH;

        $filesystem->exists($nonExistingPath)->willReturn(false);

        $this->shouldThrow(new \Exception('Some sing'))->during('getCurrentVersion', array($nonExistingPath));

        $this->getCurrentVersion($nonExistingPath);
    }
}
