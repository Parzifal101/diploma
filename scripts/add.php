<?php
    session_start();
    require '../config.php';

    $title = $_POST['title'];
    $text = $_POST['text'];
    $pictmp = $_FILES['pic']['tmp_name'];
    $picname = $_FILES['pic']['name'];
    $path = "../img/post-img/";
    $picdir = $path.$picname;
    
  
    $sql = 'INSERT INTO post (head_title,company_id, title, text, post_img) VALUES(:head_title,:company_id, :title, :text, :post_img)';
    $query = $pdo->prepare($sql);
    $query -> bindParam(":head_title",$_SESSION['user']['company_name'],PDO::PARAM_STR);
    $query -> bindParam(":company_id",$_SESSION['user']['company_id'],PDO::PARAM_STR);
    $query -> bindParam(":title",$title,PDO::PARAM_STR);
    $query -> bindParam(":text",$text,PDO::PARAM_STR);
    $query -> bindParam(":post_img",$picname,PDO::PARAM_STR);

    $query->execute();
    move_uploaded_file($pictmp, $picdir);
    
    echo ($pictmp);
    echo ($picname);
    echo ($picdir);
    header('Location: ../cabinet.php');

?>