document.addEventListener('DOMContentLoaded', () => {
    const formChangeLogin = document.getElementById('form_change_login');
    const formChangePassword = document.getElementById('form_change_password');
    const exitButton = document.getElementById('exit_btn');
    const url = '/handle/account_handle.php';

    formChangeLogin.addEventListener('submit', (e) => {
        e.preventDefault();
        $.ajax({
            url: url,
            type: 'POST',
            data: $('#form_change_login').serialize(),
            success: function(result) {
                location.reload()
            }
        })
    })

    formChangePassword.addEventListener('submit', (e) => {
        e.preventDefault();
        $.ajax({
            url: url,
            type: 'POST',
            data: $('#form_change_password').serialize(),
            success: function(result) {
                exitButton.click();
            }
        })
    })

    exitButton.addEventListener('click', (e) => {
        e.preventDefault();
        $.ajax({
            url: url,
            type: 'POST',
            data: {
                'exit': 1,
            },
            success: function(result) {
                location.reload()
            }
        })
    })
})