<?php
    session_start();
    require '../config.php';

    
    $pictmp = $_FILES['head_pic']['tmp_name'];
    $picname = $_FILES['head_pic']['name'];
    $path = "../img/header/";
    $picdir = $path.$picname;
    
  
    $sql = 'UPDATE `company` SET `header_img` = :header_img WHERE `company`.`id` = :company_id';
    $query = $pdo->prepare($sql);
    $query->bindParam(":company_id",$_SESSION['user']['company_id'],PDO::PARAM_STR);
    $query->bindParam(":header_img",$picname,PDO::PARAM_STR);
   

    $query->execute();
    move_uploaded_file($pictmp, $picdir);
    
    echo ($pictmp);
    echo ($picname);
    echo ($picdir);
    header('Location: ../cabinet.php');

?>