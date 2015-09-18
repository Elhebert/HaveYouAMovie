<?php

namespace Lib;

class Config {

    private $settings = [];
    private static $_instance;

    /**
     * @return Config
     */
    public static function getInstance($file) {
        if (self::$_instance === null)
            self::$_instance = new Config($file);

        return self::$_instance;
    }

    public function __construct($file) {
        $this->settings = require $file;
    }

    public function get($key) {
        if (!isset($this->settings[$key]))
            return null;

        return $this->settings[$key];
    }
}