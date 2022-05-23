<?php
    session_start();
    require "../config.php";

    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $login = $_POST['login'];
    $password = $_POST['password'];
    $confirmPSW = $_POST['confirm_password'];

    $check_login = $pdo->query("SELECT * FROM `users` WHERE 'login' = '$login'")->fetch(PDO::FETCH_ASSOC);
    if(!empty($check_login) > 0){
        echo "Аккаунт уже зарегистрован";
        exit();
    }
    if(!empty($name) && !empty($surname) && !empty($login) && !empty($password) && !empty($confirmPSW)){
    if($password === $confirmPSW){
    $password = md5($password."4kljhwe93sdkl");

    $sql = 'INSERT INTO `users` (`name`, `surname`, `login`, `password`) VALUES (:name, :surname, :login, :password)';
    $query = $pdo->prepare($sql);
    $query->bindParam(":name",$name,PDO::PARAM_STR);
    $query->bindParam(":surname",$surname,PDO::PARAM_STR);
    $query->bindParam(":login",$login,PDO::PARAM_STR);
    $query->bindParam(":password",$password);

    $query->execute();
    $_SESSION['user'] = [
        "login" => $login,
        "name" => $name,
        "surname" => $surname
    ];
    header('Location: /cabinet.php');
}else{
    $_SESSION['message'] = "Пароли не совпадают";
    header('Location: /reg.php');
}
}else{
    echo "Поле не заполнено";
}
?>