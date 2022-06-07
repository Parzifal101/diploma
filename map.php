<?php
    session_start();
    require 'config.php';

    if(empty($_SESSION['user'])){
        header('Location: /auth.php');
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Карта</title>
</head>

<body>
    <header>
    <div class="logo">
                <div class="logo-wrapper">
                    <img src="img/avalogo(blue).svg" alt="">
                </div>
                <hr>
            </div>
            <div class="search">
                <form action="" method="get">
                    <input placeholder="Что будем искать?" type="text">
                    <button type="submit">Найти</button>
                </form>
            </div>
            <div class="small-profile">
                <div class="small-profile-img-wrap">
                    <img src="img/avatars/jorik.jpg" alt="">
                </div>
                <h3><?= $_SESSION['user']['name']?> <?= $_SESSION['user']['surname']?></h3>
                <p>Должность</p>
            </div>
    </header>
    <main>
    <div style="display:none; position:absolute; z-index: 2; margin-top: 12%;" class="posts-count" 
            <?php
                 $query = $pdo->query('SELECT count(*) FROM post');
                 $count = $query->fetch();

            ?>
            data-count=<?php print_r($count)?>
            <?php
                 $query = $pdo->query('SELECT * FROM `post`');
                 
                 while($img = $query->fetch()){
      
            ?>
            data-img=<?php print_r($img) ?>
            <?php
                 }
            ?>
            
            
    >
    </div>
    <nav class="left-side-menu">
                <div class="change-arrows">
                    <button onclick="showDrop('drop-menu')" id="drop-btn"><img src="img/arrows.svg" alt=""></a></button>
                </div>
                <div class="change-company">
                    <div class="change-img-wrapper">
                        <img src="img/avatars/jorik.jpg" alt="">
                    </div>
                    <h3><?php echo($_SESSION['user']['company_name'])?></h3>

                </div>
                <div id="drop-menu" class="dropdown ">
                
                    <div class="dropdown-wrapper">
                    <?php
                     $statement = $pdo->prepare("SELECT users.id, users.name, company.id as c_id, company.name as c_name, company.description as c_desc, company.location as c_loc, company.phone as c_phone, company.link as c_link
                     FROM personalcom
                     LEFT JOIN users on users.id = personalcom.user_id
                     LEFT JOIN company on company.id = personalcom.company_id
                     WHERE personalcom.user_id = :user_id");
                     $statement->execute([':user_id' => $_SESSION['user']['id']]);
                    
                    while($company = $statement->fetch()){
                    ?>
                    <form action="scripts/company_switch.php" method="post">
                       
                        <div class="change-company drop-company">
                        <button class="switch-btn">
                            <div class="change-img-wrapper ">
                                <img src="img/avatars/jorik.jpg " alt=" ">
                            </div>
                            <h3><?php print_r($company['c_name'])?></h3>
                            </button>
                        </div>
                        
                        </form>
                    <?php
                    }
                    ?>
                    </div>
                </div>
                <hr>
                
                <ul class="left-menu">
                    <li>
                        <div class="menu-point">
                            <div class="menu-img-wrapper">
                                <img class="lighted" src="img/icons/gg_feed.svg" alt="">
                            </div>
                            <a href="feed.php">Лента</a>
                        </div>
                    </li>
                    <li>
                        <div class="menu-point">
                            <div class="menu-img-wrapper">

                                <img src="img/icons/bx_bxs-cabinet.svg" alt="">
                            </div>
                            <a href="cabinet.php">Кабинет</a>
                        </div>
                    </li>
                    <li>
                        <div style="border-left:2px solid #2B3FFF ;" class="menu-point">
                            <div class="menu-img-wrapper">
                                
                                <img  class="lighted" src="img/icons/bx_bx-map-1.svg" alt="">
                            </div>
                            <a href="map.php">Карта</a>
                        </div>
                    </li>
                    <li>
                        <div class="menu-point">
                            <div class="menu-img-wrapper">
                                <img class="dark" src="img/icons/ci_settings-filled.svg" alt="">
                                <img style="display: none;" class="lighted" src="img/icons/ci_settings-filled-1.svg" alt="">
                            </div>
                            <a href="settings.html">Настройки</a>
                        </div>
                    </li>
                    <div class="logout">
                        <a href="scripts/logout.php">Выход</a>
                    </div>
                </ul>
            </nav>
        <div class="map-page"  id="map"></div>
        <script src="https://api-maps.yandex.ru/2.1/?apikey=c3a643c9-1dd5-4622-8d9c-3d43b7507924&lang=ru_RU" type="text/javascript"></script>
        <script src="map.js"></script>
    </main>
</body>

</html>