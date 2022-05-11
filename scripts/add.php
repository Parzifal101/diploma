<?php
    require '../config.php';

    // $photo = $_FILES['post_img'];
    $title = $_GET['title'];
    $text = $_GET['text'];

    $sql = 'INSERT INTO post (title) VALUES(:title)';
    $query = $pdo->prepare($sql);
    $query->execute(['title'=>$title]);
?>