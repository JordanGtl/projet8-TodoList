<?php
// src/Command/CreateUserCommand.php
namespace AppBundle\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class TestCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('app:test')
            ->setDescription('Run tests.')
            ->setHelp('Use this command for run custom tests')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        ##################################################################################
        ## Drop database
        ##################################################################################
        $command = $this->getApplication()->find('doctrine:database:drop');
        $arguments = array(
            'command' => 'doctrine:database:drop',
            '--force'  => true,
        );

        $greetInput = new ArrayInput($arguments);
        $returnCode = $command->run($greetInput, $output);

        ##################################################################################
        ## Create database
        ##################################################################################
        $command = $this->getApplication()->find('doctrine:database:create');
        $arguments = array(
            'command' => 'doctrine:database:create'
        );

        $greetInput = new ArrayInput($arguments);
        $returnCode = $command->run($greetInput, $output);

        ##################################################################################
        ## Add database tables
        ##################################################################################
        $command = $this->getApplication()->find('doctrine:schema:update');
        $arguments = array(
            'command' => 'doctrine:migration:migrate',
            '--force'  => true,
        );

        $greetInput = new ArrayInput($arguments);
        $returnCode = $command->run($greetInput, $output);


        ##################################################################################
        ## load fixture
        ##################################################################################
        $command = $this->getApplication()->find('doctrine:fixtures:load');
        $arguments = array(
            'command' => 'doctrine:fixtures:load',
            '--append'  => true,
        );

        $greetInput = new ArrayInput($arguments);
        $returnCode = $command->run($greetInput, $output);

        $output->writeln('Load test, please wait few minutes');

        ##################################################################################
        ## run phpunit test
        ##################################################################################
        $shell = shell_exec('php bin/phpunit --coverage-html=cover');
        $output->write($shell);
    }
}