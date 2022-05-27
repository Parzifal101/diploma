<?php
    session_start();
    require '../config.php';

    $id = $_POST['id'];

    $statement_3 = $pdo->prepare("SELECT * FROM `post` WHERE company_id = :company_id AND id = :id ");
    $statement_3->bindParam(":company_id",$_SESSION['user']['company_id'],PDO::PARAM_STR);
    $statement_3->bindParam(":id",$id,PDO::PARAM_STR);
    $statement_3->execute();

    $statement_3 = $pdo->prepare("DELETE FROM `post` WHERE `company_id` = :company_id AND id = :id ");
    $statement_3->bindParam(":company_id",$_SESSION['user']['company_id'],PDO::PARAM_STR);
    $statement_3->bindParam(":id",$id,PDO::PARAM_STR);
    $statement_3->execute();
    

    
    header('Location: ../cabinet.php')
?>