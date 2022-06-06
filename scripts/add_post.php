<?php
    session_start();
    require '../config.php';

    $comment_text = $_GET['comment_text'];
    $post_id = $_GET['id'];

   
    print_r($_GET);
  
    $sql = 'INSERT INTO comments (user_id, user_name, post_id, text) VALUES(:user_id, :user_name, :post_id, :text)';
    $query = $pdo->prepare($sql);
    $query -> bindParam(":user_id",$_SESSION['user']['id'],PDO::PARAM_STR);
    $query -> bindParam(":user_name",$_SESSION['user']['name'],PDO::PARAM_STR);
    $query -> bindParam(":post_id",$post_id,PDO::PARAM_STR);
    $query -> bindParam(":text",$comment_text,PDO::PARAM_STR);
 
    
    $query->execute();

    header('Location: ../post.php?id='.$post_id);

?>