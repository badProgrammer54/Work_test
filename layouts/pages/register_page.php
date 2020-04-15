<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация</title>
    <link rel="stylesheet" href="/css/main.css">
</head>
<body>
    <div class="modal-wrapper">
        <div class="modal-inner">
            <h1 class="modal-title">Регистрация</h1>
            <form name="register" id="register_form" action="">
                <label for="email_register">Почта
                    <input type="email" name="email" id="email_register" required></label>
                <label for="login_register">Логин
                    <input type="text" name="login" id="login_register" required></label>
                <label for="fio_register">ФИО
                    <input type="text" name="fio" id="fio_register" required></label>
                <label for="password_register">Пароль
                    <input type="password" name="password" id="password_register"></label>
                <label for="password_repeat_register">Повторить пароль
                    <input type="password" name="password_repeat" id="password_repeat_register"></label>
                <label for="auth_remember">Я принимаю <a class="policy" href="/index.php?policy">политику конфиденциальности</a> 
                    <input type="checkbox" name="remember" id="auth_remember"></label>
                <input type="submit" class="submit" value="Войти">
            </form>
            <a href="/index.php?auth">Войти</a>
        </div>
    </div>   
    <script src="/js/script.js"></script>
</body>
</html>