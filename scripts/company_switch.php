<?php
    session_start();
    require "../config.php";
    require_once "../cabinet.php";

    echo ("Смена компании");
    $_SESSION['user']['company_name'] = "Uber";

?>