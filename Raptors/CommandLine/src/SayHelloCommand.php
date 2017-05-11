<?php
    /**
     * Created by PhpStorm.
     * User: sunke
     * Date: 2016/7/15
     * Time: 18:37
     */

    namespace Acme;


    use Symfony\Component\Console\Command\Command;
    use Symfony\Component\Console\Input\InputArgument;
    use Symfony\Component\Console\Input\InputInterface;
    use Symfony\Component\Console\Input\InputOption;
    use Symfony\Component\Console\Output\OutputInterface;

    class SayHelloCommand extends Command
    {

        public function configure()
        {
            $this->setName('sayHello')
                ->setDescription("description app")
                ->addArgument('name', InputArgument::REQUIRED, 'your name')
                ->addOption('greeting', null, InputOption::VALUE_OPTIONAL, 'o', 'h');#./apphome sayHello aaa --greeting abc
        }

        public function execute(InputInterface $input, OutputInterface $output)
        {
            # $name = $input->getArgument('name');
            $name = sprintf('%s,%s', $input->getOption('greeting'), $input->getArgument('name'));
            $output->writeln("$name");
        }

    }