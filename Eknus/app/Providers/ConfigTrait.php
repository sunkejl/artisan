<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/5/15
 * Time: 10:35
 */

namespace App\Providers;

use Symfony\Component\Yaml\Exception\ParseException;
use Symfony\Component\Yaml\Yaml;

trait ConfigTrait
{
    public function parseYaml()
    {
        try {
            $value = Yaml::parse(file_get_contents('/opt/www/artisan/Eknus/app/Config/config.yml'));
        } catch (ParseException $e) {
            printf("Unable to parse the YAML string: %s", $e->getMessage());
        }
        return $value;
    }

    public function getDoctrineYaml()
    {
        $yaml = $this->parseYaml();
        return $yaml['doctrine']['dbal'];
    }

    public function getSwiftMailYaml()
    {
        $yaml = $this->parseYaml();
        return $yaml['swiftmailer'];
    }
    public function getRedisYaml(){
        $yaml=$this->parseYaml();
        return $yaml['redis'];
    }
}