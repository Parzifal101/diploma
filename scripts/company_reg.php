<?php
    session_start();
    require "../config.php";

    $company_name = $_POST['company_name'];
    $company_phone = $_POST['company_phone'];
    $company_location = $_POST['company_location'];
    $company_inn = $_POST['company_inn'];

    $check_company = $pdo->query("SELECT * FROM `company` WHERE 'name' = '$company_name'")->fetch(PDO::FETCH_ASSOC);
    if(!empty($check_login) > 0){
        echo "Компания уже зарегистрована";
        exit();
    }
    if(!empty($company_name) && !empty($company_phone) && !empty($company_location) && !empty($company_inn)){
    

    $sql = 'INSERT INTO `company` (`name`, `phone`, `location`, `inn`) VALUES (:name, :phone, :location, :inn)';
    $query = $pdo->prepare($sql);
    $query->bindParam(":name",$company_name,PDO::PARAM_STR);
    $query->bindParam(":phone",$company_phone,PDO::PARAM_STR);
    $query->bindParam(":location",$company_location,PDO::PARAM_STR);
    $query->bindParam(":inn",$company_inn);

    $query->execute();

    $statement = $pdo->prepare("SELECT * FROM `company` WHERE name = :name");
    $statement->execute([':name' => $company_name]);
    $company = $statement->fetch();

    $query = $pdo->prepare("INSERT INTO `personalcom` (`user_id`, `company_id`) VALUES (:user_id, :company_id)");
    $query->bindParam(":user_id",$_SESSION['user']['id'],PDO::PARAM_STR);
    $query->bindParam(":company_id",$company['id'],PDO::PARAM_STR);

    $query->execute();
    $_SESSION['user']['company_id'] = $company['id'];
    $_SESSION['user']['company_name'] = $company_name;
        
    print_r ($_SESSION['user']);
    header('Location: /cabinet.php');
}else{
    echo "Поле не заполнено";
}
?>