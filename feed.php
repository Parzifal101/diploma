<?php
    require 'config.php';
    session_start();
    if(empty($_SESSION['user'])){
        header('Location: /cabinet.php');
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="scripts/chiefslider.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Document</title>
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
               
                <img src="img/avatars/<?= $_SESSION['user']['icon'] ?>" alt="">
            </div>
            <h3><?= $_SESSION['user']['name'] ?> <?= $_SESSION['user']['surname'] ?></h3>
            <p>Должность</p>
        </div>
    </header>
    <main>
        <nav class="left-side-menu">
            <div class="change-arrows">
                <button onclick="showDrop('drop-menu')" id="drop-btn"><img src="img/arrows.svg" alt=""></a></button>
            </div>
            <div class="change-company">
                <div class="change-img-wrapper">
                    <img src="img/avatars/<?= $_SESSION['user']['icon'] ?>" alt="">
                </div>
                <h3><?php echo ($_SESSION['user']['company_name']) ?></h3>

            </div>
            <div id="drop-menu" class="dropdown ">
                <div class="dropdown-wrapper">
                    <div class="change-company drop-company">
                        <div class="change-img-wrapper ">
                            <img src="img/avatars/jorik.jpg " alt=" ">
                        </div>
                        <h3>Yandex</h3>
                    </div>
                    <div class="change-company drop-company">
                        <div class="change-img-wrapper ">
                            <img src="img/avatars/jorik.jpg " alt=" ">
                        </div>
                        <h3>Company Name</h3>
                    </div>
                </div>
            </div>
            <hr>
            <ul class="left-menu">
                <li>
                    <div style="border-left:2px solid #2B3FFF ;" class="menu-point">
                        <div class="menu-img-wrapper">
                            <img class="lighted" src="img/icons/gg_feed-1.svg" alt="">
                        </div>
                        <a href="feed.php">Лента</a>
                    </div>
                </li>
                <li>
                    <div class="menu-point">
                        <div class="menu-img-wrapper">
                            <img class="dark" src="img/icons/bx_bxs-cabinet.svg" alt="">
                            <img style="display: none;" class="lighted" src="img/icons/bx_bxs-cabinet-1.svg" alt="">
                        </div>
                        <a href="cabinet.php">Кабинет</a>
                    </div>
                </li>
                <li>
                    <div class="menu-point">
                        <div class="menu-img-wrapper">
                            <img class="dark" src="img/icons/bx_bx-map.svg" alt="">
                            <img style="display: none;" class="lighted" src="img/icons/bx_bx-map-1.svg" alt="">
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
                        <a href="settings.php">Настройки</a>
                    </div>
                </li>
                <div class="logout">
                    <a href="scripts/logout.php">Выход</a>
                </div>
            </ul>
        </nav>
        <div class="feed-area">

            <div class="feed-settings">
                <h3><a href="">Все новости</a></h3>
                <hr class="hr-1">
                <h3>Новинки</h3>
                <hr class="hr-2">
                <h3>Топ</h3>
                <hr class="hr-3">
                <select>
                    <option value="1">По популярности</option>
                    <option value="2">Набирают популярность</option>
                </select>
            </div>
            <div class="hide-ninja">
            </div>

            <?php
            $query = $pdo->query('SELECT * FROM `post` ORDER BY `post`.`date` DESC');
            while ($row = $query->fetch(PDO::FETCH_OBJ)) {

            ?>
                <div class="feed-post">
                    <div class="post-head">
                        <div class="post-head-wrapper">
                            <div class="post-icon-wrapper">
                                <img src="img/post-img/icon/<?php echo $row->head_img ?>" alt="">
                            </div>
                            <h3><a href=""><?php echo $row->head_title ?></a></h3>
                            <button class="dots"><img src="img/icons/dots-icon.svg" alt=""></button>
                        </div>
                    </div>
                    <div id="post-drop" class="post-dropdown">
                        <div class="post-dropdown-wrapper">
                            <div class="post-set">
                                <p><a href="">Пожаловаться</a></p>
                                <img src="" alt="">
                                <hr>
                            </div>
                            <div class="post-set">
                                <p>Пожаловаться</p>
                                <img src="" alt="">
                                <hr>
                            </div>
                            <div class="post-set">
                                <p>Пожаловаться</p>
                                <img src="" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="post-img">
                        <a href=""><img src="img/post-img/<?php echo $row->post_img ?>" alt=""></a>
                    </div>

                    <div class="post-text">
                        <a id="linkView"  href="post.php?id=<?= $row->id?>">
                        <div class="view" data-id="<?php echo $row->id ?>">
                            <h1><?php echo $row->title ?></h1>
                            <span class="date"><?php echo $row->date ?></span>
                            <p><?php echo $row->text ?></p>
                            </div>
                        </a>
                        <div class="post-views">
                            <div class="views-icon">
                                <img src="img/icons/view-icon.svg" alt="">
                            </div>
                            <div class="views-count">
                                <p><span class="counter"><?php echo $row->views ?></span> посмотрели эту запись</p>
                            </div>
                            <div class="post-likes">
                                <div class="like" data-id="<?php echo $row->id ?>">
                                    
                                    <span class="counter"><?php echo $row->likes ?></span>
                                </div>
                                
                            </div>

                        </div>
                        <h3 style="margin-top: 4%;">Комментарии</h3>
                        <?php
                            $stmt = $pdo->prepare('SELECT * FROM comments WHERE post_id = ? ORDER BY id DESC LIMIT 1');
                            $stmt->execute([$row->id]);
                           while ($comments = $stmt->fetch(PDO::FETCH_ASSOC)){
                            
                           
                        ?>
                        <div id="comment" class="comment">
                            <div class="comment-head">
                                <div class="avatar-wrapper">
                                    <img src="img/avatars/<?= $_SESSION['user']['icon'] ?>" alt="">
                                </div>
                                <div class="user-info">
                                    <p><?php print_r($comments['user_name'])?></p>
                                    <span><?php print_r($comments['date'])?></span>
                                </div>
                            </div>
                            <div class="comment-text">
                                <p><?php print_r($comments['text'])?></p>
                            </div>
                        </div>
                        <?php
                        }
                        ?>
                        <div class="hide-btn">
                            <button type="button" class="btn btn-outline-success" data-toggle="collapse" data-target="#services" id="show"><span><a id="linkView" href="post.php?id=<?= $row->id?>">Показать всё</a></span></button>
                        </div>
                        <div class="post-comments">
                            <form style="width: 100%;" action="scripts/add_post.php" method="post">
                                <input name="comment_text" placeholder="Напишите, что вы думаете об этом" type="text">
                                <button><img src="img/icons/paper-airplane.svg" alt=""></button>
                            </form>
                        </div>
                    </div>
                  
                </div>
            <?php
            }
            ?>

        </div>
    </main>
    <footer>

    </footer>
    <script src="scripts/chiefslider.min.js"></script>
    <script>

        function showDrop(element) {
            if (document.getElementById(element)) {
                let dropMenu = document.getElementById(element);
                if (dropMenu.style.display != 'block') {
                    dropMenu.style.display = 'block';
                } else {
                    dropMenu.style.display = 'none'
                }
            } else alert('Error')
        }

        const btn = document.querySelectorAll('.btn > span');
        for (let i = 0; i < btn.length; i++) {

            btn[i].addEventListener('click', function() {
                this.innerHTML =
                    (this.innerHTML === 'Показать всё') ? this.innerHTML = 'Скрыть всё' : this.innerHTML = 'Показать всё';
            })

        }


        // let count = document.getElementById('count');
        // const link = document.getElementById('linkView');

        // link.forEach(linkItem => {
        //     linkItem.addEventListener("click", counter)
        // })

        // function counter(event) {
        //     if (event.type == "click") {
        //         count.innerHTML += 1;
        //     }
        // }


        $(document).ready(function() {
        $(".like").bind("click", function() {
            var link = $(this);
            var id = link.data('id');
            $.ajax({
                url: "scripts/like.php",
                type: "POST",
                data: {id:id}, 
                dataType: "json",
                success: function(result) {
                    if (!result.error){ 
                        link.addClass('active'); 
                        $('.counter',link).html(result.count);
                    }else{
                        alert(result.message);
                    }
                }
            });
        });
    });

    $(document).ready(function() {
        $(".view").bind("click", function() {
            var link = $(this);
            var id = link.data('id');
            $.ajax({
                url: "scripts/view.php",
                type: "POST",
                data: {id:id}, 
                dataType: "json",
                success: function(result) {
                    if (!result.error){ 
                        $('.counter',link).html(result.count);
                    }else{
                        alert(result.message);
                    }
                }
            });
        });
    });
    </script>
</body>

</html>