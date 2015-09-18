<?php

use \Lib\Config;
use \Lib\Database\MysqlDatabase;

class App {

    private static $_instance;
    private static $_slim;
    private $db_instance;

    public static function getInstance() {
        if (self::$_instance === null)
            self::$_instance = new App();

        return self::$_instance;
    }

    public static function getSlim() {
        if (self::$_slim === null) {
            self::$_slim = new \Slim\Slim();
        }

        return self::$_slim;
    }

    public static function load() {
        session_start();

        require ROOT . '/vendor/autoload.php';
    }

    public function getDb() {
        $config = Config::getInstance(ROOT . '/config/config.php');;
        if ($this->db_instance === null) {
            $this->db_instance = new MysqlDatabase(
                $config->get('db_name'),
                $config->get('db_user'),
                $config->get('db_pass'),
                $config->get('db_host')
            );
        }

        return $this->db_instance;
    }
}