<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/db/db_conn.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/classes/user_class.php';

$user = new User($pdo);

$email = $_POST['email'];
$login = $_POST['login'];
$fio = $_POST['fio'];
$password = $_POST['password'];

$result = $user->Register($email, $login, $fio, $password);

if ($result != 0) {
    echo 1;
}
else {
    echo 0;
}