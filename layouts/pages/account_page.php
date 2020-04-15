<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . '/db/db_conn.php';
    require_once $_SERVER['DOCUMENT_ROOT'] . '/classes/store_class.php';
    $store = new Store($pdo);
    $user = $store->GetUser($_SESSION['user_id']);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Личный кабинет</title>
    <link rel="stylesheet" href="/css/main.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
</head>
<body>
    <?php require $_SERVER['DOCUMENT_ROOT'] . '/layouts/main/header.php'; ?>
    <main class="main">
        <div class="container">
            <div class="main_left">
                <h2>Данные пользователя</h2>
                <p>Логин: <?= $user['login']; ?></p>
                <p>Почта: <?= $user['email']; ?></p>
                <p>Пароль: <?= $user['password']; ?></p>
            </div>
            <div class="main_right">
                <h2>Изменить логин</h2>
                <form name="change_login" id="form_change_login">
                    <input type="hidden" name="user_id" value="<?=$_SESSION['user_id']?>">
                    <input type="hidden" name="change_login" value="1">
                    <label for="change_login_login">Новый логин
                        <input type="text" name="login" id="change_login_login" required>
                    </label>
                    <input type="submit" value="Изменить">
                </form>

                <h2>Изменить пароль</h2>
                <form name="change_password" id="form_change_password">
                    <input type="hidden" name="user_id" value="<?=$_SESSION['user_id']?>">
                    <input type="hidden" name="change_password" value="1">
                    <label for="change_password_password">Новый пароль
                        <input type="password" name="password" id="change_password_password" required>
                    </label>
                    <input type="submit" value="Изменить">
                </form>
                <p><button id="exit_btn">Выход</button></p>
            </div>
        </div>
    </main>

    <script src="/js/script.js"></script>
</body>
</html>