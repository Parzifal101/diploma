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
                <h3><?= $_SESSION['user']['name']?> <?= $_SESSION['user']['surname']?></h3>
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
                        <div class="menu-point">
                            <div class="menu-img-wrapper">
                                <img class="lighted" src="img/icons/gg_feed.svg" alt="">
                            </div>
                            <a href="feed.php">Лента</a>
                        </div>
                    </li>
                    <li>
                        <div style="border-left:2px solid #2B3FFF ;" class="menu-point">
                            <div class="menu-img-wrapper">

                                <img src="img/icons/bx_bxs-cabinet-1.svg" alt="">
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
                            <a href="settings.html">Настройки</a>
                        </div>
                    </li>
                    <div class="logout">
                        <a href="scripts/logout.php">Выход</a>
                    </div>
                </ul>
            </nav>
            <div class="cabinet-area">
                <div class="cabinet-header">
                    <img src="img/cast_page-0001.jpg" alt="">
                </div>
                <div class="company-info">
                    <div class="company-info-head">
                        <div class="company-icon">
                            <img src="img/cast_page-0001.jpg" alt="">
                        </div>
                        <h2>Name</h2>
                    </div>
                    <div class="company-info-left">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas obcaecati aspernatur quisquam.</p>
                    </div>
                    <hr>
                    <div class="company-info-right">
                        <div class="adress">
                            <img src="" alt="">
                            <span>Москва</span>
                        </div>
                        <div class="phone">
                            <img src="" alt="">
                            <span>+7(977)768-32-12</span>
                        </div>
                        <div class="site-link">
                            <img src="" alt="">
                            <span><a href="https://avasystems.ru">avasystems.ru</a></span>
                        </div>
                    </div>
                </div>
                <div class="info-area">
                    <h1>Company</h1>
                    <div class="status-menu">
                        <h3><a href="">Все новости</a></h3>
                        <hr class="hr-1">
                        <h3>Новинки</h3>
                        <hr class="hr-2">
                        <h3>Топ</h3>
                        <hr class="hr-3">
                    </div>
                    <div class="info-filter">
                        <form action="scripts/add.php" method="post" enctype="multipart/form-data">
                            <input name="pic" type="file">
                            <input name="title" type="text">
                            <textarea name="text" id="" cols="30" rows="10"></textarea>
                            <button type="submit">Создать</button>
                        </form>
                    </div>
                </div>
            </div>
        </main>
        <footer>

        </footer>
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