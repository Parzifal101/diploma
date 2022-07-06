<?php
try{
    $dsn = 'mysql:host=localhost;dbname=avasys';
    $pdo = new PDO($dsn,'root','');
    $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $err){
    print $err->getMessage();
}   
?>