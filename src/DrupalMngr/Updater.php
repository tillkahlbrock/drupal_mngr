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
        $localVersion = $this->versionFinder->getLocalVersion($path);

        $remoteVersion = $this->versionFinder->getRemoteVersion();

        if ($localVersion == $remoteVersion) {
            return 'No newer version available. Aborting...';
        }
    }
}
