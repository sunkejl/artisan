<?php
    /**
     * Created by PhpStorm.
     * User: sunke
     * Date: 2016/7/15
     * Time: 18:37
     */

    namespace Acme;


    use Symfony\Component\Console\Command\Command;
    use Symfony\Component\Console\Helper\Table;
    use Symfony\Component\Console\Input\InputArgument;
    use Symfony\Component\Console\Input\InputInterface;
    use Symfony\Component\Console\Input\InputOption;
    use Symfony\Component\Console\Output\OutputInterface;

    class RenderCommand extends Command
    {

        public function configure()
        {
            $this->setName('render')
                ->setDescription("table data");
        }

        public function execute(InputInterface $input, OutputInterface $output)
        {
            $table=new Table($output);
            $table->setHeaders(["name","age"])->setRows([[2,1],[3,2]])->render();
        }

    }