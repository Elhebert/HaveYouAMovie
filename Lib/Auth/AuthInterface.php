<?php

namespace Lib\Auth;
interface AuthInterface {

    /**
     * @param $username
     * @param $password
     * @return mixed
     */
    public function login($username, $password);

    /**
     * @param $username
     * @param $email
     * @param array $method
     * @return array|bool
     */
    public function register($username, $email, $method = []);

    /**
     * @return mixed
     */
    public function getUserId();

    /**
     * @return mixed
     */
    public function getUserName();

    /**
     * @return mixed
     */
    public function isLogged();

}