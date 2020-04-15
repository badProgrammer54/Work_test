<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/db/db_conn.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/classes/user_class.php';


$user = new User($pdo); // pdo из подключения в db_conn.php

if (isset($_COOKIE['login']) && isset($_COOKIE['SSID'])) {
    $ssid_in_db = $user->getSSID($_COOKIE['login']);
    if ( $ssid_in_db['ssid'] === $_COOKIE['SSID']) {
        $_SESSION['user_id'] = $ssid_in_db['id'];
        if ($_SESSION['user_id'] != '') {
            require $_SERVER['DOCUMENT_ROOT'] . '/layouts/pages/account_page.php';
        }
        else {
            
        }
    }
    
}
else if (isset($_GET['policy'])){
    require $_SERVER['DOCUMENT_ROOT'] . '/layouts/pages/policy_page.php';
}
else if (isset($_GET['register'])){
    require $_SERVER['DOCUMENT_ROOT'] . '/layouts/pages/register_page.php';
}
else {
    require $_SERVER['DOCUMENT_ROOT'] . '/layouts/pages/auth_page.php';
}