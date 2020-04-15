<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/db/db_conn.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/classes/user_class.php';

$user = new User($pdo);

$login = $_POST['login'];
$password = $_POST['password'];
if ($_POST['remember'] == 1) {
    $remember = 30;
}
else {
    $remember = 1;
}

$hash = $user->getPassword($login);
$user_id = $hash['id'];
$hash = $hash['password'];

if(password_verify($password, $hash)) {
    $user->Auth($user_id, $login, $password, $remember);
    echo 1;
}
else {
    echo 0;
}