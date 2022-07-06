<?php
session_start();
require 'config.php';

if (empty($_SESSION['user'])) {
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
                    <img src="img/avatars/<?= $_SESSION['user']['icon'] ?>" alt="">
                </div>
                <h3>
                    <?= $_SESSION['user']['name'] ?>
                        <?= $_SESSION['user']['surname'] ?>
                </h3>
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
                    <h3>
                        <?php echo ($_SESSION['user']['company_name']) ?>
                    </h3>

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

                    while ($company = $statement->fetch()) {
                    ?>
                            <form action="scripts/company_switch.php" method="post">

                                <div class="change-company drop-company">
                                    <button class="switch-btn">
                                    <div class="change-img-wrapper ">
                                        <img src="img/avatars/jorik.jpg " alt=" ">
                                    </div>
                                    <h3><?php print_r($company['c_name']) ?></h3>
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
                                <img style="display: none;" src="img/icons/bx_bxs-cabinet-1.svg" alt="">
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
                        <div style="border-left:2px solid #2B3FFF ;" class="menu-point">
                            <div class="menu-img-wrapper">

                                <img class="lighted" src="img/icons/ci_settings-filled-1.svg" alt="">
                            </div>
                            <a href="settings.html">Настройки</a>
                        </div>
                    </li>
                    <div class="logout">
                        <a href="scripts/logout.php">Выход</a>
                    </div>
                </ul>
            </nav>
            <div class="settings">
                <div class="settings-head">
                    <h1>Настройки</h1>
                    <hr>
                </div>
                <div class="form-wrapper2">
                    <div class="settings-form">
                        <form action="scripts/change_set.php" method="post" enctype="multipart/form-data">
                            <!-- <label class="com-desc" for="company_desc">Описание компании</label> -->
                            <input class="set-icon" name="icon" type="file">

                            <input placeholder="Ваше имя" name="name" type="text">
                            <input placeholder="Ваше фамилия" name="surname" type="text">
                            <input placeholder="Логин" name="login" type="text">
                            <input placeholder="Название компании" name="company_name" type="text">
                            <input placeholder="Ссылка" name="company_link" type="text">
                            <textarea placeholder="Описание" name="company_desc" id="" cols="30" rows="10"></textarea>
                            <div class="but">
                                <button>Сохранить</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </main>
        <footer>

        </footer>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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

            function showDropFlex(element) {
                if (document.getElementById(element)) {
                    let dropMenu = document.getElementById(element);
                    if (dropMenu.style.display != 'flex') {
                        dropMenu.style.display = 'flex';
                    } else {
                        dropMenu.style.display = 'none'
                    }
                } else alert('Error')
            }

            function closeDropFlex(element) {
                if (document.getElementById(element)) {
                    let dropMenu = document.getElementById(element);
                    if (dropMenu.style.display = 'flex') {
                        dropMenu.style.display = 'none';
                    } else {
                        dropMenu.style.display = 'flex'
                    }
                } else alert('Error')
            }




            // function fTableToArray() {
            //     aTable = [...document.getElementById('vab').rows].map((tr) => {
            //         return [...tr.cells].map((td) => td.textContent);
            //     });

            //     console.log(aTable[1][3]); 
            // }

            // console.log(fTableToArray())

            let titles = [...document.querySelectorAll('.tabpost-title')].map(td => td.textContent)
            let views = [...document.querySelectorAll('.tabpost-view')].map(td => td.textContent)
            let likes = [...document.querySelectorAll('.tabpost-like')].map(td => td.textContent)
            let comments = [...document.querySelectorAll('.tabpost-comment')].map(td => td.textContent)



            const ctx = document.getElementById('myChart').getContext('2d');
            ctx.canvas.parentNode.style.height = '280px'
            ctx.canvas.parentNode.style.width = '420px'
            ctx.canvas.parentNode.style.display = 'inline-flex'

            const myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: [titles[0], titles[1], titles[2]],
                    datasets: [{
                        label: "Просмотры",
                        data: [views[0], views[1], views[2]],
                        backgroundColor: ['white'],
                        borderColor: [
                            '#424ebb',
                            '#5480d1',
                            '#54aed1',
                            '#54d1d1',
                            '#54d1b2'
                        ],

                        borderWidth: 4,
                    }]
                },
                options: {}
            })
            const ctx2 = document.getElementById('myChart2').getContext('2d');
            console.log(ctx)
            const myChart2 = new Chart(ctx2, {
                type: 'polarArea',
                data: {
                    labels: [titles[0], titles[1], titles[2]],
                    datasets: [{
                        label: "Просмотры",
                        data: [likes[0], likes[1], likes[2]],
                        backgroundColor: ['white'],
                        borderColor: [
                            '#424ebb',
                            '#5480d1',
                            '#54aed1',
                            '#54d1d1',
                            '#54d1b2'
                        ],
                        borderWidth: 4,
                    }]
                },
                options: {}
            })
            const ctx3 = document.getElementById('myChart3').getContext('2d');
            console.log(ctx)
            const myChart3 = new Chart(ctx3, {
                type: 'doughnut',
                data: {
                    labels: ["Все время", "Сегодня"],
                    datasets: [{
                        label: "Просмотры",
                        data: [comments[0], comments[1]],
                        backgroundColor: ['#ccd1ff', '#569ca1'],
                        borderColor: [
                            '#424ebb',
                            '#5480d1',
                            '#54aed1',
                            '#54d1d1',
                            '#54d1b2'
                        ],
                        borderWidth: 4,
                    }]
                },
                options: {}
            })
        </script>


    </body>

    </html>