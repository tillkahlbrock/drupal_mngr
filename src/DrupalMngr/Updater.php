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
        $currentVersion = $this->versionFinder->getCurrentVersion($path);

        $newestVersion = $this->versionFinder->getNewestVersion();

        if ($currentVersion == $newestVersion) {
            return 'No newer version available. Aborting...';
        }
    }
}
