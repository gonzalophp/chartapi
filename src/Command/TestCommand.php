<?php

namespace App\Command;

use App\Logger;
use App\Models\Chart;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class TestCommand extends Command
{
    protected static $defaultName = 'command:test';
    private $chart;

    public function __construct($name = null, Chart $chart)
    {
        parent::__construct($name);
        $this->chart = $chart;

    }

    protected function configure()
    {
        $this
            ->setDescription('Add a short description for your command')
            ->addArgument('arg1', InputArgument::OPTIONAL, 'Argument description')
            ->addOption('option1', null, InputOption::VALUE_NONE, 'Option description')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $io = new SymfonyStyle($input, $output);
        $arg1 = $input->getArgument('arg1');

        if ($arg1) {
            $io->note(sprintf('You passed an argument: %s', $arg1));
        }

        if ($input->getOption('option1')) {
            // ...
        }

        Logger::critical('aaaaaaaaaaa', ['tttt'=> [1,2,3]]);
        $io->success('You have a new command! Now make it your own! Pass --help to see your options.');

        Logger::critical('LLLLLLLLLLL'.$this->chart->returnAppClass());
    }
}
