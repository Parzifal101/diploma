<?php
    require 'config.php';

    $title = $_POST['title'];
    $text = $_POST['text'];
    $pictmp = $_FILES['pic']['tmp_name'];
    $picname = $_FILES['pic']['name'];
    $path = "img/post-img/";
    $picdir = $path.$picname;
    
    
    $sql = 'INSERT INTO post (title, text, post_img) VALUES(:title, :text, :post_img)';
    $query = $pdo->prepare($sql);
    $query -> bindParam(":title",$title,PDO::PARAM_STR);
    $query -> bindParam(":text",$text,PDO::PARAM_STR);
    $query -> bindParam(":post_img",$picname,PDO::PARAM_STR);

    $query->execute();
    move_uploaded_file($pictmp, $picdir);
    
    header('Location: ../cabinet.html');

?>