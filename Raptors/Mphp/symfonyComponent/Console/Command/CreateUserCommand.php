<?php
namespace App;

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/10/28
 * Time: 17:50
 */

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CreateUserCommand extends Command
{
    protected function configure()
    {
        $this->setName('app:create-users')
            ->setDescription('Creates new users.')
            ->setHelp("This command allows you to create users...")
            ->addArgument("username",InputArgument::REQUIRED,"the username of the user")
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln([
            'User Creator',
            '============',
            '',
        ]);
        $output->writeln('Whoa!');
        $output->write('You are about to ');
        $output->write('create a user.');
        $output->writeln('Username: '.$input->getArgument('username'));
    }
}
