<?php

namespace Lib\Database;

use \PDO;

class MysqlDatabase extends Database{

    private $db_name;
    private $db_user;
    private $db_pass;
    private $db_host;
    private $pdo = null;

    /**
     * @param $db_name
     * @param string $db_user
     * @param string $db_pass
     * @param string $db_host
     */
    public function __construct($db_name, $db_user = "root", $db_pass = "root", $db_host = "localhost") {
        $this->db_name = $db_name;
        $this->db_user = $db_user;
        $this->db_pass = $db_pass;
        $this->db_host = $db_host;
    }

    /**
     * @return null|PDO
     */
    private function getPDO() {
        if ($this->pdo === null) {
            $pdo = new PDO("mysql:dbname={$this->db_name};host={$this->db_host}", $this->db_user, $this->db_pass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->exec("SET CHARACTER SET utf8");

            $this->pdo = $pdo;
        }

        return $this->pdo;
    }

    /**
     * @param $statement
     * @param $class_name
     * @param bool $one
     * @return array
     */
    public function query($statement, $class_name = null, $one = false) {
        $pdo_statement = $this->getPDO()->query($statement);

        if ($class_name === null)
            $pdo_statement->setFetchMode(PDO::FETCH_ASSOC);
        else
            $pdo_statement->setFetchMode(PDO::FETCH_CLASS, $class_name);

        if ($one)
            $data = $pdo_statement->fetch();
        else
            $data = $pdo_statement->fetchAll();

        return $data;
    }

    /**
     * @param $statement
     * @param $attributes
     * @param $class_name
     * @param bool $one
     * @return array|mixed
     */
    public function prepare($statement, $attributes, $class_name = null, $one = false) {
        $pdo_statement = $this->getPDO()->prepare($statement);
        $res = $pdo_statement->execute($attributes);

        if (
            strpos($statement, 'UPDATE') === 0 ||
            strpos($statement, 'INSERT') === 0 ||
            strpos($statement, 'DELETE') === 0
        ) {
            return $res;
        }

        if ($class_name === null)
            $pdo_statement->setFetchMode(PDO::FETCH_OBJ);
        else
            $pdo_statement->setFetchMode(PDO::FETCH_CLASS, $class_name);

        if ($one)
            $data = $pdo_statement->fetch();
        else
            $data = $pdo_statement->fetchAll();

        return $data;
    }

    public function getLastInsertId() {
        return $this->getPDO()->lastInsertId();
    }
}