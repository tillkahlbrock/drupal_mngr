<?php

namespace spec\DrupalMngr;

use PHPSpec2\ObjectBehavior;
use DrupalMngr;

class Updater extends ObjectBehavior
{
    const SOME_PATH = 'some/path';

    function let($versionFinder)
    {
        $versionFinder->beAMockOf('DrupalMngr\VersionFinder');
        $this->beConstructedWith($versionFinder);
    }

    /**
     * @param $versionFinder VersionFinder
     */
    function it_should_use_the_version_finder_to_find_the_actual_version($versionFinder)
    {
        $somePath = self::SOME_PATH;

        $versionFinder->getLocalVersion($somePath)->shouldBeCalled();

        $this->update($somePath);
    }

    /**
     * @param $versionFinder VersionFinder
     */
    function it_should_use_the_version_finder_to_find_the_newest_version($versionFinder)
    {
        $versionFinder->getRemoteVersion()->shouldBeCalled();

        $this->update(self::SOME_PATH);
    }

    /**
     * @param $versionFinder VersionFinder
     */
    function it_should_return_an_abort_message_if_the_local_version_is_equal_to_the_newest_version($versionFinder)
    {
        $versionNumber = 10;

        $versionFinder->getLocalVersion(self::SOME_PATH)->willReturn($versionNumber);
        $versionFinder->getRemoteVersion()->willReturn($versionNumber);

        $this->update(self::SOME_PATH)->shouldReturn('No newer version available. Aborting...');
    }
}
