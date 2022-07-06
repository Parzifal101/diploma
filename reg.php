<?php
    session_start();
    require 'config.php';
    if(!empty($_SESSION['user'])){
        header('Location: /cabinet.php');
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="https://api-maps.yandex.ru/2.1/?apikey=c3a643c9-1dd5-4622-8d9c-3d43b7507924&lang=ru_RU" type="text/javascript"></script>

    <title>Document</title>
</head>

<body>
    <main>
        <div class="container">
            <div class="right-row">
                <div class="map" id="map"></div>
                <img src="img/Group 139.png" alt="">
                <script>
                    let map = document.getElementById('map');

                    function showMustGoOn() {
                        map.style.display = "block";
                    }
                </script>
            </div>
            <div class="left-row">
                <div class="left-wrap">
                    <div class="top">
                        <a onclick="showMustGoOn()" class="map-link" href="#">Карта</a>
                        <img src="" alt="">
                        <div class="reg">
                            <a href="">Регистрация</a>
                        </div>
                    </div>
                    <div class="form-wrapper">
                        <div class="quest">
                            <h2>Уже зарегистрированы? <a href="auth.php">Войти!</a></h2>
                        </div>
                        <div class="welcome">
                            <h1>Добро пожаловать!</h1>
                        </div>
                        <div class="form-wrap">
                            <form action="scripts/registr.php" method="post">
                                <input placeholder="Имя" type="text" name="name">
                                <input placeholder="Фамилия" type="text" name="surname">
                                <input placeholder="Логин" type="text" name="login">
                                <input placeholder="Пароль" type="password" name="password">
                                <input placeholder="Подтвердите пароль" type="password" name="confirm_password">
                                
                                <a href="">Забыли пароль?</a>
                                <div class="err-msg">
                                <?php
                                if (!empty($_SESSION['message'])) {
                                    echo $_SESSION['message'];
                                }
                                ?>
                            </div>
                                <button>Войти</button>
                            </form>
                        </div>
                    </div>
                    <div class="fed-low">
                        <p>Я даю свое согласие на обработку, хранение и использование своих персональных данных на основании <a href="">ФЗ № 152-ФЗ «О персональных данных» от 27.07.2006 г.</a></p>
                    </div>
                </div>
            </div>
        </div>
        <script src="map.js"></script>
    </main>
</body>

</html>