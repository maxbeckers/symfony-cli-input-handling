<?php

require_once __DIR__.'/vendor/autoload.php';

use Symfony\Component\Console\Application;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\Question;
use Symfony\Component\Console\Style\SymfonyStyle;

$command = new class() extends Command {
    protected static $defaultName = 'Test';

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $section = $output->section();

        $section->writeln("Test");
        $io = new SymfonyStyle($input, $output);

        $io->ask('Test the input behavior');

        return self::SUCCESS;
    }
};

$app = new Application();
$app->add($command);
$app->setDefaultCommand($command->getName(), true);
$app->run();