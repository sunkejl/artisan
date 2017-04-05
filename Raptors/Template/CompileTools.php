<?php

    /**
     * Created by PhpStorm.
     * User: sunke
     * Date: 2016/7/19
     * Time: 11:21
     */
    class CompileTools
    {
        public $value;

        /**
         * Compile constructor.
         */
        public function __construct()
        {
        }

        public function complieFile($source, $file)
        {
            $content=file_get_contents($source);
            $content=preg_replace('/<\?php echo \$name;\?>/i',$this->value['name'],$content);
            return file_put_contents($file, $content);
        }
    }
