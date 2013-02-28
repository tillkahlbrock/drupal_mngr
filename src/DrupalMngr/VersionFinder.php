<?php

namespace DrupalMngr;
use Symfony\Component\Filesystem\Filesystem;

class VersionFinder
{
    private $filesystem;

    public function __construct(Filesystem $filesystem)
    {
        $this->filesystem = $filesystem;
    }

    public function getCurrentVersion($path)
    {
        $this->filesystem->exists($path);
    }
}
