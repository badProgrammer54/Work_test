<?php 

class User {

    private $store;

    public function __construct($store)
    {
        $this->store = $store;
    }

    ////////////////////////  Вход   //////////////////////
    // Авторизация пользователя (Проверка логина и пароля)
    public function Auth (string $id, string $login, string $password, int $time = 1) {
        // 
        $ssid = password_hash($password . time(), PASSWORD_DEFAULT);
        $this->UpdateSSID($id, $ssid);
        setcookie('login', $login, time() + (60 * 60 * 24 * $time), '/');
        setcookie('SSID', $ssid, time() + (60 * 60 * 24 * $time), '/');
    }
    // Проверка существует ли пользователь с таким логином
    public function checkLogin (string $login) {
        $sql = "SELECT `id` FROM `users` WHERE `deleted` = 0 AND `login` = :login ";
        $query = $this->store->prepare($sql);
        // Отправляем запрос
        $query->execute(array(
            "login" => $login
        ));
        // Проверка есть ли такие данные в БД
        if ($query->fetch(PDO::FETCH_NUM)) {
            return 1;
        }
        else {
            return 0;
        }
    }
    // Получить SSID из БД
    public function getSSID (string $login) {
        $sql = "SELECT `id`,`ssid` FROM `users` WHERE `deleted` = 0 AND `login` = :login ";
        $query = $this->store->prepare($sql);
        // Отправляем запрос
        $query->execute(array(
            "login" => $login
        ));
        return $query->fetch(PDO::FETCH_ASSOC);
    }
    // Обновления SSID в базе
    public function UpdateSSID (string $id, string $ssid) {
        $sql = "UPDATE `users` SET `ssid` = :ssid WHERE `id` = :id";
        $query = $this->store->prepare($sql);
        // Отправляем запрос
        $query->execute(array(
            "id" => $id,
            "ssid" => $ssid,
        ));
        return 1;
    }
    public function Exit () {
        setcookie('login', '', time() - (60 * 60 * 24 * 30), '/');
        setcookie('SSID', '', time() - (60 * 60 * 24 * 30), '/');
    }
     ////////////////////////  Вход   //////////////////////

    //////////////////////// Регистрация ///////////////////////////////
    public function Register (string $email, string $login, string $fio, string $password) {
        $password = password_hash($password, PASSWORD_DEFAULT);
        if ( $this->checkLogin($login) == 0) {
            $sql = "INSERT INTO `users` ( `email`, `fio`,`login`, `password`) VALUES (:email, :fio, :login, :password)";
            $query = $this->store->prepare($sql);
            // Отправляем запрос
            $query->execute(array(
                "email" => $email,
                "fio" => $fio,
                "login" => $login,
                "password" => $password
            ));
        }
        if ($query->fetch(PDO::FETCH_NUM)) {
            return 1;
        }
        else {
            return 0;
        }
    }

    //////////////////////// Регистрация ///////////////////////////////
}