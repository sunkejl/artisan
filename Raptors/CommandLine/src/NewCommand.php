<?php
    /**
     * Created by PhpStorm.
     * User: sunke
     * Date: 2016/7/15
     * Time: 18:37
     */

    namespace Acme;


    use GuzzleHttp\ClientInterface;
    use Symfony\Component\Console\Command\Command;
    use Symfony\Component\Console\Input\InputArgument;
    use Symfony\Component\Console\Input\InputInterface;
    use Symfony\Component\Console\Input\InputOption;
    use Symfony\Component\Console\Output\OutputInterface;

    class NewCommand extends Command
    {

        protected $client;

        public function __construct(ClientInterface $client)
        {
            $this->client = $client;
            parent::__construct();
        }



        public function configure()
        {
            $this->setName('new')
                ->setDescription("create a new application")
                ->addArgument('name', InputArgument::REQUIRED);
        }

        public function execute(InputInterface $input, OutputInterface $output)
        {
            //assert the folder not exits
            $directory = getcwd() . "/" . $input->getArgument('name');
            $output->writeln("<info>creating app...</info>");
            $this->assertNotExits($directory, $output);
            //dowload
            $this->download($zipFile = $this->makeFileName())->extract($zipFile, $directory)->cleanUpZip($zipFile);
            $output->writeln("<comment>success</comment>");
        }

        private function assertNotExits($directory, OutputInterface $output)
        {
            if (is_dir($directory)) {
                $output->writeln("<error>aleady exists</error>");
                exit();
            }
        }

        private function makeFileName()
        {
            return getcwd() . '/laravel_' . md5(time()) . uniqid() . ".zip";
        }

        private function download($zipfile)
        {
            $response = $this->client->get("http://cabinet.laravel.com/latest.zip")->getBody();
            file_put_contents($zipfile, $response);

            return $this;
        }

        private function extract($zipFile, $directory)
        {
            $archive = new \ZipArchive();
            $archive->open($zipFile);
            $archive->extractTo($directory);
            $archive->close();

            return $this;
        }

        private function cleanUpZip($zipFile)
        {
            chmod($zipFile, 777);
            unlink($zipFile);

            return $this;
        }

    }