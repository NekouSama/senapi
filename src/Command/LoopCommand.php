<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use App\SenapiClass\ConsoleClass;

class LoopCommand extends Command
{
    protected static $defaultName = 'app:loop';

    protected function configure()
    {
        $this
            ->setDescription('Add a short description for your command')
            ->addArgument('arg1', InputArgument::OPTIONAL, 'Argument description')
            ->addOption('option1', null, InputOption::VALUE_NONE, 'Option description');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $io = new ConsoleClass($input, $output);
        $io->title('Lancement du programme');

        $last_run = 0;
        while (true) {
            if (time() > $last_run + (60 * 60)) {
                $last_run = time();
                system('php bin/console app:scrap-reddit');
            }
        }
    }
}
