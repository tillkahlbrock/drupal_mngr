<?php

namespace DrupalMngr\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class UpgradeCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('upgrade')
            ->setDescription('Upgrade your current drupal application')
            ->addArgument(
                'path',
                InputArgument::OPTIONAL,
                'The relativ path to the drupal application you want to upgrade'
            )
            ->addOption(
               'dry',
               null,
               InputOption::VALUE_NONE,
               'If set, the task will only produce some output but no real changes'
            )
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $path = $input->getArgument('path');
        if (!$path) {
            $path = '.';
        }

        if ($input->getOption('dry')) {
            $output->write('[DRY MODE] ');
        }

        $output->writeln('working in path \'' . $path . '\'');
    }
}
