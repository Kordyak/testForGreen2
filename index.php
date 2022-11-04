<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Авторизация</title>
    <script src="https://code.jquery.com/jquery-3.3.1.js"
            integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
          rel="stylesheet"
          integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <form id="loginform" method="post">
        <h1><span class="badge bg-secondary">Авторизация</span></h1>
        <div><input type="text" name="firstname" id="firstname" placeholder="Имя"/></div>
        <div><input type="text" name="secondname" id="secondname" placeholder="Фамилия"/></div>
        <div><input type="text" name="email" id="email" placeholder="email"/></div>
        <div><input type="password" name="password" id="password" placeholder="Пароль"/></div>
        <div><input type="password" name="password2" id="password2" placeholder="Подтвердите пароль"/></div>
        <div><input class="btn btn-primary" type="submit" name="loginBtn" id="loginBtn" value="Login"/></div>
    </form>
</div>
</body>
</html>

<script type="text/javascript">
    $(document).ready(function () {
        $('#loginform').submit(function (e) {
            e.preventDefault();

            $.ajax({
                type: "POST",
                url: 'login.php',
                data: $(this).serialize(),

                success: function (response) {
                    var jsonData = JSON.parse(response);

                    if (jsonData.success == "1") {
                        location.href = 'my_profile.php';
                    } else if (jsonData.success == "2") {
                        alert('Не все ячейки заполнены!');
                    } else if (jsonData.success == "3") {
                        alert('Пароли не совпадают!');
                    } else if (jsonData.success == "4") {
                        alert('Email введен не корректный!');
                    }
                }
            });

        });
    });
</script>
