<?php

namespace spec\DrupalMngr;

use PHPSpec2\ObjectBehavior;
use Symfony\Component\Filesystem\Filesystem;

class VersionFinder extends ObjectBehavior
{

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
        $path = 'some/path';

        $filesystem->exists($path)->shouldBeCalled();

        $this->getCurrentVersion($path);
    }
}
