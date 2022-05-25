<?php
    session_start();
    require '../config.php';
    $statement_3 = $pdo->prepare("SELECT * FROM `post` WHERE company_id = :company_id");
    $statement_3->execute([':company_id' => $_SESSION['user']['company_id']]);
    $company_posts = $statement_3->fetch();

    $statement_3 = $pdo->prepare("DELETE FROM `post` WHERE `post`.`id` = :company_id");
    $statement_3->execute([':company_id' => $company_posts['id']]);
    $deleted = $statement_3->fetch();

    header('Location: ../cabinet.php')
?>