<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/db/db_conn.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/classes/store_class.php';

$store = new Store($pdo);