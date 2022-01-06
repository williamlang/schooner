<?php

namespace William\SchoonerCommand;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use William\Schooner;
use William\Schooner\Exception;

class ScoreCommand extends Command {

    /**
     * Name of the command
     *
     * @var string
     */
    protected static $defaultName = 'schooner:score';

    /**
     * Configure the command
     */
    protected function configure() : void {
        $this
            ->addArgument('category', InputArgument::REQUIRED, 'The category to score the roll on.')
            ->addArgument('diceRoll', InputArgument::IS_ARRAY, 'The dice roll')
            ->setDescription('Determine the score based on a category and a roll');
    }

    /**
     * Execute the score command
     *
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return integer
     */
    protected function execute(InputInterface $input, OutputInterface $output) : int {
        // get arguments
        $category = $input->getArgument('category');
        $diceRoll = $input->getArgument('diceRoll');

        // run score method
        $schooner = new Schooner();

        // write output
        try {
            $output->writeln($schooner->score($category, $diceRoll));
        } catch (Exception $e) {
            $output->writeln($e->getMessage());
        }

        // return
        return Command::SUCCESS;
    }
}