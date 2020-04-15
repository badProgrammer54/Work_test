<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/db/db_conn.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/classes/store_class.php';

$store = new Store($pdo);

if (isset ($_POST['change_login'])) {
    $user_id = $_POST['user_id'];
    $login = $_POST['login'];
    $store->UpdateLogin($user_id, $login);
}

else if (isset ($_POST['change_password'])) {
    $user_id = $_POST['user_id'];
    $password = $_POST['password'];
    $store->UpdatePassword($user_id, $password);
}

else if (isset ($_POST['exit'])) {
    $store->Exit();
}