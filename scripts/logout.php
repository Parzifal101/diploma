<?php
    session_start();
    require "../config.php";

    unset($_SESSION['user']);
    header('Location: ../auth.php')
?>