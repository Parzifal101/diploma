<?php
    session_start();
    require '../config.php';

    
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $login = $_POST['login'];
    $company_name = $_POST['company_name'];
    $company_link = $_POST['company_link'];
    $company_desc = $_POST['company_desc'];
    $user_id = $_SESSION['user']['id'];
    $company_id = $_SESSION['user']['company_id'];
    $pictmp = $_FILES['icon']['tmp_name'];
    $picname = $_FILES['icon']['name'];
    $path = "../img/avatars/";
    $picdir = $path.$picname;

    
    $sql = 'UPDATE `users` SET `name` = :name, `surname` = :surname,`login` = :login,`icon` = :icon WHERE `users`.`id` = :user_id ';
    $query = $pdo->prepare($sql);
    $query->bindParam(":user_id",$_SESSION['user']['id'],PDO::PARAM_STR);
    $query->bindParam(":name",$name,PDO::PARAM_STR);
    $query->bindParam(":surname",$surname,PDO::PARAM_STR);
    $query->bindParam(":login",$login,PDO::PARAM_STR);
    $query->bindParam(":icon",$picname,PDO::PARAM_STR);

    $query->execute();
    move_uploaded_file($pictmp,$picdir);


    $sql = 'UPDATE `company` SET `name` = :company_name, `link` = :link ,`description` = :description WHERE `company`.`id` = :company_id';
    $query = $pdo->prepare($sql);
    $query->bindParam(":company_id",$_SESSION['user']['company_id'],PDO::PARAM_STR);
    $query->bindParam(":company_name",$company_name,PDO::PARAM_STR);
    $query->bindParam(":link",$company_link,PDO::PARAM_STR);
    $query->bindParam(":description",$company_desc,PDO::PARAM_STR);
    
    $query->execute();
    $_SESSION['user'] = [
        "id" => $user_id,
        "login" => $login,
        "name" => $name,
        "surname" => $surname,
        "company_name" => $company_name,
        "company_id" => $company_id,
        "icon" => $picname
    ];

    header('Location: /settings.php')
?>