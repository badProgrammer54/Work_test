<?php

class Store {
    private $store;

    public function __construct($store) {
        $this->store = $store;
    }

    // Получения данных пользователя
    public function GetUser (string $user_id) {
        $sql = "SELECT `login`, `email`, `fio`, `password` FROM `users` WHERE `id` = :user_id";
        $query = $this->store->prepare($sql);
        // Отправляем запрос
        $query->execute(array(
            "user_id" => $user_id,
        ));
        return $query->fetch(PDO::FETCH_ASSOC);
    }

    // Обновления логина у пользователя
    public function UpdateLogin (string $user_id, string $login) {
        $sql = "UPDATE `users` SET `login` = :login WHERE `id` = :user_id";
        $query = $this->store->prepare($sql);
        // Отправляем запрос
        $query->execute(array(
            "user_id" => $user_id,
            "login" => $login,
        ));
        return 1;
    }

    // Обновления логина у пользователя
    public function UpdatePassword (string $user_id, string $password) {
        $password = password_hash($password, PASSWORD_DEFAULT);
        $sql = "UPDATE `users` SET `password` = :password WHERE `id` = :user_id";
        $query = $this->store->prepare($sql);
        // Отправляем запрос
        $query->execute(array(
            "user_id" => $user_id,
            "password" => $password,
        ));
        return 1;
    }


        // ВЫход пользователя
        public function Exit () {
            setcookie('login', '', time() - (60 * 60 * 24 * 30), '/');
            setcookie('SSID', '', time() - (60 * 60 * 24 * 30), '/');
        }

}