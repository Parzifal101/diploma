<?php
    session_start();
    require '../config.php';

    $id = intval($_POST['id']);
    $count = 0;
    $message = '';
    $error = true;

    if($id){
        
        
        $query = $pdo->prepare("UPDATE post SET views = views+1  WHERE id = :id");
        $query->execute(array(':id'=>$id));
        
        
        $query = $pdo->prepare("SELECT views FROM post WHERE id = :id");
        $query->execute(array(':id'=>$id));
        $result = $query->fetch(PDO::FETCH_ASSOC);
        $count = isset($result['views']) ? $result['views']  : 0;
        
        $error = false;
    }else{
        
        
        $error = true;
        $message = 'Статья не найдена';
    }
    
     
    
    $out = array(
        'error' => $error,
        'message' => $message,
        'count' => $count,
    );
     
    
    header('Content-Type: text/json; charset=utf-8');
     
    
    echo json_encode($out);

?>