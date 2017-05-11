<?php

    /**
     * Created by PhpStorm.
     * User: sunke
     * Date: 2016/7/19
     * Time: 10:38
     */
    class Template
    {

        private $config = ["compileDir" => 'cache/', 'suffix' => '.php', 'templateDir' => 'views/'];
        public $file;

        private $value;
        private $compileTools;

        /**
         * Template constructor.
         */
        public function __construct(CompileTools $compileTools, $config = [])
        {
            $this->config = $config + $this->config;
            $this->compileTools = $compileTools;
        }

        /**
         * @return array
         */
        public function getConfig()
        {
            return $this->config;
        }

        public function assign($key, $value)
        {
            $this->value[ $key ] = $value;
        }

        public function assignArray($array)
        {
            foreach ($array as $k => $v) {
                $this->value[ $k ] = $v;
            }
        }

        public function show($file)
        {
            $this->file = $file;
            if ( ! is_file($this->path())) {
                exit("无模板");
            }
            readfile($this->path());
            $compileFile = $this->config[ "compileDir" ] . '/' . uniqid().time() . '.html';
            if ( ! is_file($compileFile)) {
                mkdir($this->config[ 'compileDir' ]);
                $this->compileTools->value=$this->value;
                $this->compileTools->complieFile($this->path(),$compileFile);
            } else {
                readfile($compileFile);
            }
        }

        public function path()
        {
            return $this->config[ 'templateDir' ] . $this->file . $this->config[ 'suffix' ];
        }
    }