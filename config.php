<?php

require_once __DIR__.'/vendor/autoload.php';

use vendor\symfony\yaml\Yaml;

class Config {
  static $parameters = [];
  
  public static function getDatabaseDSN(){
    return self::$parameters['database']['dsn'];
  }
}

Config::$parameters = Yaml::parse(file_get_content(__DIR__.'parameters.yml'));

?>