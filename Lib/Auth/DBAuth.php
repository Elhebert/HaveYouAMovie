<?php

namespace Lib\Auth;

use Lib\Database;

class DBAuth implements AuthInterface{

    private $db;

    public function __construct(Database $db) {
        $this->db = $db;
    }

    /**
     * @return int|bool
     */
    public function getUserId() {
        if ($this->isLogged())
            return $_SESSION['Auth']['id'];

        return false;
    }

    /**
     * @return string|bool
     */
    public function getUserName() {
        if ($this->isLogged())
            return $_SESSION['Auth']['username'];

        return false;
    }

    /**
     * @param $username
     * @param $password
     * @return bool
     */
    public function login($username, $password) {
        $user = $this->db->prepare('SELECT * FROM users WHERE username = ?', [$username], null, true);

        if ($user) {
            if (password_verify($password , $user->passwd) === true) {
                $_SESSION['Auth']['id'] = $user->id;
                $_SESSION['Auth']['role'] = $user->role;
                $_SESSION['Auth']['username'] = $username;
                return true;
            }
        }

        return false;
    }

    /**
     * @return bool
     */
    public function isLogged() {
        return isset($_SESSION['Auth']);
    }

    /**
     * @param $username
     * @param $email
     * @param array $method
     * @return array|bool
     */
    public function register($username, $email, $method = []) {
        $errors = [];

        $user = $this->db->prepare('SELECT * FROM users WHERE username = ? OR email = ?', [$username, $email], null, true);

        if ($user) {
            if ($username == $user->username)
                $errors['username'] = "Nom d'utilisateur déjà utilisé";
            if ($email == $user->email)
                $errors['email'] = "Adresse mail déjà utilisé";
        } else {
            if ($method['password'] !== $method['password_check']) {
                $errors['password'] = "Les mots de passe sont différents";
            } else {
                $password = password_hash($method['password'], PASSWORD_DEFAULT);

                if ($this->db->prepare('INSERT INTO users SET username = ?, email = ?, passwd = ?', [$username, $email, $password]))
                    return true;
                else
                    $errors['database'] = "Une erreur s'est produite lors de l'insertion en base de donnée";
            }
        }

        return $errors;
    }
}