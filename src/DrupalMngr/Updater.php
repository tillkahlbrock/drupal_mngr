<?php

namespace DrupalMngr;

class Updater
{
    /**
     * @var VersionFinder
     */
    private $versionFinder;

    public function __construct(VersionFinder $versionFinder)
    {
        $this->versionFinder = $versionFinder;
    }

    public function update($path)
    {
        $this->versionFinder->getLocalVersion($path);
    }
}
