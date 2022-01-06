<?php

namespace William\SchoonerCommand;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use William\Schooner;
use William\Schooner\Exception;

class TopCategoryCommand extends Command {

    /**
     * Name of the command
     *
     * @var string
     */
    protected static $defaultName = 'schooner:top-category';

    /**
     * Configure the command
     */
    protected function configure() : void {
        $this
            ->addArgument('diceRoll', InputArgument::IS_ARRAY, 'The dice roll')
            ->setDescription('Determine the category based on a roll');
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
        $diceRoll = $input->getArgument('diceRoll');

        // run score method
        $schooner = new Schooner();

        // write output
        try {
            $output->writeln($schooner->topCategories($diceRoll));
        } catch (Exception $e) {
            $output->writeln($e->getMessage());
        }

        // return
        return Command::SUCCESS;
    }
}