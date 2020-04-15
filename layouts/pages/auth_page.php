<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Авторизация</title>
    <link rel="stylesheet" href="/css/main.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
</head>
<body class="auth">
    <div class="modal-wrapper">
        <div class="modal-inner">
            <h1 class="modal-title">Авторизация</h1>
            <form name="auth" id="auth_form" action="">
                <label for="auth_login">Логин
                    <input type="text" name="login" id="auth_login" required></label>
                <label for="auth_password">Пароль
                    <input type="password" name="password" id="auth_password" required></label>
                <label for="auth_remember">Запомнить меня
                    <input type="checkbox" name="remember" id="auth_remember"></label>
                <input type="submit" class="submit" value="Войти">
            </form>
            <a href="/index.php?register">Регистрация</a>
        </div>
    </div>
    <script>
        $('#auth_form').on('submit', (e) => {
            e.preventDefault();
            const data = $('#auth_form').serialize();
            $.ajax({
                url: '/handle/auth_handle.php',
                data: data,
                type: 'POST',
                success: function(result) {
                    if(result == 1) {
                        location.reload();
                    }
                }
            })   
        })
    </script>
</body>
</html>