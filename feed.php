<?php
    require 'config.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="scripts/chiefslider.min.css">
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
                <img src="img/avatars/jorik.jpg" alt="">
            </div>
            <h3>Имя Фамилия</h3>
            <p>Должность</p>
            <!-- <div class="change-arrows">
                <button onclick="showDrop('drop-menu')" id="drop-btn"><img src="img/arrows.svg" alt=""></a></button>
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
            </div> -->
        </div>
    </header>
    <main>
        <nav class="left-side-menu">
            <div class="change-arrows">
                <button onclick="showDrop('drop-menu')" id="drop-btn"><img src="img/arrows.svg" alt=""></a></button>
            </div>
            <div class="change-company">
                <div class="change-img-wrapper">
                    <img src="img/avatars/jorik.jpg" alt="">
                </div>
                <h3>Drake INC</h3>

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
                        <a href="map.html">Карта</a>
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
            <!-- <div class="slider">
                <div class="slider__container">
                    <div class="slider__wrapper">
                        <div class="slider__items">
                            <div class="slider__item">
                                <img src="img/5_registraciya.jpeg" alt="">
                            </div>
                            <div class="slider__item">
                                <img src="img/cast_page-0001.jpg" alt="">
                            </div>
                            <div class="slider__item">
                               
                            </div>
                        </div>
                    </div>
                </div>
                <a href="#" class="slider__control" data-slide="prev"></a>
                <a href="#" class="slider__control" data-slide="next"></a>
            </div> -->
            <?php
                $query = $pdo->query('SELECT * FROM `post`');
                while ($row = $query->fetch(PDO::FETCH_OBJ)) {
                    
             ?>  
            <div class="feed-post">
                <div class="post-head">
                    <div class="post-head-wrapper">
                        <div class="post-icon-wrapper">
                            <img src="img/post-img/icon/<?php echo $row->head_img?>" alt="">
                        </div>
                        <h3><a href=""><?php echo $row->head_title?></a></h3>
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
                    <a href=""><img src="img/post-img/<?php echo $row->post_img?>" alt=""></a>
                </div>

                <div class="post-text">
                    <a id="linkView" href="">
                        <h1><?php echo $row->title?></h1>
                        <span class="date"><?php echo $row->date?></span>
                        <p><?php echo $row->text?></p>
                    </a>
                    <div class="post-views">
                        <div class="views-icon">
                            <img src="img/icons/view-icon.svg" alt="">
                        </div>
                        <div class="views-count">
                            <p><span id="count">200 345</span> посмотрели эту запись</p>
                        </div>
                        <div class="post-likes">
                            <div class="likes-icon">
                                <img src="" alt="">
                            </div>
                            <span>1230</span>
                        </div>

                    </div>
                    <div class="post-comments">
                        <form style="width: 100%;" action="" method="post">
                            <input placeholder="Напишите, что вы думаете об этом" type="text">
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
        document.addEventListener('DOMContentLoaded', function() {
            var elms = document.querySelectorAll('.slider');
            for (var i = 0, len = elms.length; i < len; i++) {
                // инициализация elms[i] в качестве слайдера
                new ChiefSlider(elms[i]);
            }
        });

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

        let count = document.getElementById('count');
        const link = document.getElementById('linkView');

        link.forEach(linkItem => {
            linkItem.addEventListener("click", counter)
        })

        function counter(event) {
            if (event.type == "click") {
                count.innerHTML += 1;
            }
        }
        // const btn = document.querySelectorAll('.dots');
        // let menuSet = document.querySelectorAll('.post-dropdown');

        // btn.forEach(btnItem => {
        //     btnItem.addEventListener("click", showSet)
        // })

        // function showSet(event) {
        //     if(event.target.) Допилить открытие настроек поста
        // }
        // const leftMenu = document.querySelector('.left-menu');
        // const points = document.querySelectorAll('.menu-point')
        // let lighted = document.querySelectorAll('.lighted');
        // let dark = document.querySelectorAll('.dark');
        // console.log(dark)


        // function light(event) {
        //     if (event.type == "mouseenter") {
        //         dark.style.display = "none";
        //         lighted.style.display = "block";
        //         console.log("Light")
        //     }
        // }

        // function darked() {
        //     if (event.type == "mouseleave") {
        //         dark.style.display = "block";
        //         lighted.style.display = "none";
        //         console.log("Dark")
        //     }
        // }

        // points.forEach(pointItem => {
        //     pointItem.addEventListener("mouseenter", light);
        //     pointItem.addEventListener("mouseleave", darked);

        // })

        // leftMenu.addEventListener("mouseenter", function(event) {
        //         if (event.target.closest('.menu-point')) {
        //             console.log("Works")
        //         } else {
        //             console.log("LOX")
        //         }
        //     })
        // function check(event) {
        //     if (event.type == "mouseenter") {
        //         dark.style.display = "none";
        //         lighted.style.display = "block";
        //         console.log(event.target)
        //     } else if (event.type == "mouseleave") {
        //         lighted.style.display = "none";
        //         dark.style.display = "block";
        //     }
        // }

        // menPoint.forEach(pointItem => {
        //     menPoint.addEventListener("mouseenter", check);

        // })
    </script>
</body>

</html>