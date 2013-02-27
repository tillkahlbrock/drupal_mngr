<?php

namespace spec\DrupalMngr;

use PHPSpec2\ObjectBehavior;

class VersionFinder extends ObjectBehavior
{
    function it_should_be_initializable()
    {
        $this->shouldHaveType('DrupalMngr\VersionFinder');
    }
}
