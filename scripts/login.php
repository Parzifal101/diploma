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
            "id" => $user['id'],
            "login" => $user['login'],
            "name" => $user['name'],
            "surname" => $user['surname']
        ];

        $statement = $pdo->prepare("SELECT users.id, users.name, company.id as c_id, company.name as c_name
                     FROM personalcom
                     LEFT JOIN users on users.id = personalcom.user_id
                     LEFT JOIN company on company.id = personalcom.company_id
                     WHERE personalcom.user_id = :user_id");
        $statement->execute([':user_id' => $_SESSION['user']['id']]);
        $company = $statement->fetch();

        $_SESSION['user'] = [
            "id" => $user['id'],
            "login" => $user['login'],
            "name" => $user['name'],
            "surname" => $user['surname'],
            "company_id" => $company['c_id'],
            "company_name" => $company['c_name']
        ];
        print_r($_SESSION['user']);
        print_r($company);
        header('Location: /cabinet.php');
        unset($_SESSION['message']);
    }else {
        $_SESSION['message'] = 'Логин или пароль не верный';
        header('Location: /auth.php');
    }
?>