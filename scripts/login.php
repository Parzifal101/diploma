<?php
    session_start();
    require "../config.php";


    $sql = "SELECT * FROM users WHERE login=:login AND password=:pass";
    $result = $pdo->prepare($sql);
    $result->bindvalue(':login', $_POST['login']);	
    $result->bindvalue(':pass', md5($_POST['password']."4kljhwe93sdkl"));	
    $result->execute( );							
    $result = $result->fetchAll();	
    

    if (count($result)>0) {
        $sql = "SELECT * FROM users WHERE login=:login";
        $result = $pdo->prepare($sql);
        $result->bindvalue(':login', $_POST['login']);	
        $result->execute( );							
        $user = $result->fetch();
        $_SESSION['user'] = [
            "login" => $user['login'],
            "name" => $user['name'],
            "surname" => $user['surname']
        ];
        print_r($_SESSION['user']);
        header('Location: /cabinet.php');
    }else {
        echo 'Логин или пароль не верный или пользователь не существует';
        header('Location: /auth.php');
    }
?>