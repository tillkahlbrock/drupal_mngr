<?php

namespace spec\DrupalMngr;

use PHPSpec2\ObjectBehavior;
use DrupalMngr;

class Updater extends ObjectBehavior
{
    function let($versionFinder)
    {
        $versionFinder->beAMockOf('DrupalMngr\VersionFinder');
        $this->beConstructedWith($versionFinder);
    }
    /**
     * @param $versionFinder VersionFinder
     */
    function it_should_use_the_version_finder_to_find_actual_version($versionFinder)
    {
        $somePath = 'some/path';

        $versionFinder->getLocalVersion($somePath)->shouldBeCalled();

        $this->update($somePath);
    }
}
