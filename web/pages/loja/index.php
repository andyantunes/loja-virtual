<?php

error_reporting(-1);
error_reporting(E_ALL);
ini_set("display_errors", 1);

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Projetos </title>

    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">

    <!-- Local CSS -->
    <link rel="stylesheet" href="./style/global.css" />
    <link rel="stylesheet" href="./pages/loja/style.css" />
    <link rel="stylesheet" href="./components/menu/style.css" />
    <link rel="stylesheet" href="./components/header/style.css" />
    <link rel="stylesheet" href="./components/modal-login/style.css" />
    <link rel="stylesheet" href="./components/modal-cadastro/style.css" />
</head>

<body>
    <?php require_once('./components/menu/index.php'); ?>
    <?php require_once('./components/header/index.php'); ?>

    <main class="container">
        <aside class="slider-wrapper">
            <div class="center">
                <div class="wrapper">
                    <div class="inner"></div>
                </div>

                <div class="map">
                    <button class="active first"></button>
                    <button class="second"></button>
                    <button class="third"></button>
                </div>
            </div>
        </aside>

        <article class="product-card-wrapper"></article>

        <aside class="comments-wrapper">
            <div class="comment-wrapper-header">
                <h2> Comentários </h2>
                <i class="fas fa-times"></i>
            </div>

            <div class="comment">
                <div class="comment-header">
                    <div class="comment-user">
                        <p>Anderson Antunes</p>
                    </div>

                    <div class="comment-date">
                        <p>07/12/2020</p>
                    </div>
                </div>

                <div class="comment-content">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora praesentium dolor asperiores dolorum, velit repellendus! Fugit voluptate quidem, saepe tempora hic maxime nam, alias perferendis nisi ut velit doloribus ex!</p>
                </div>
            </div>

            <div class="comment">
                <div class="comment-header">
                    <div class="comment-user">
                        <p>Anderson Antunes</p>
                    </div>

                    <div class="comment-date">
                        <p>07/12/2020</p>
                    </div>
                </div>

                <div class="comment-content">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora praesentium dolor asperiores dolorum, velit repellendus! Fugit voluptate quidem, saepe tempora hic maxime nam, alias perferendis nisi ut velit doloribus ex!</p>
                </div>
            </div>

            <div class="comment">
                <div class="comment-header">
                    <div class="comment-user">
                        <p>Anderson Antunes</p>
                    </div>

                    <div class="comment-date">
                        <p>07/12/2020</p>
                    </div>
                </div>

                <div class="comment-content">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora praesentium dolor asperiores dolorum, velit repellendus! Fugit voluptate quidem, saepe tempora hic maxime nam, alias perferendis nisi ut velit doloribus ex!</p>
                </div>
            </div>

            <div class="comment">
                <div class="comment-header">
                    <div class="comment-user">
                        <p>Anderson Antunes</p>
                    </div>

                    <div class="comment-date">
                        <p>07/12/2020</p>
                    </div>
                </div>

                <div class="comment-content">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora praesentium dolor asperiores dolorum, velit repellendus! Fugit voluptate quidem, saepe tempora hic maxime nam, alias perferendis nisi ut velit doloribus ex!</p>
                </div>
            </div>

            <div class="comment">
                <div class="comment-header">
                    <div class="comment-user">
                        <p>Anderson Antunes</p>
                    </div>

                    <div class="comment-date">
                        <p>07/12/2020</p>
                    </div>
                </div>

                <div class="comment-content">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora praesentium dolor asperiores dolorum, velit repellendus! Fugit voluptate quidem, saepe tempora hic maxime nam, alias perferendis nisi ut velit doloribus ex!</p>
                </div>
            </div>

            <div class="comment">
                <div class="comment-header">
                    <div class="comment-user">
                        <p>Anderson Antunes</p>
                    </div>

                    <div class="comment-date">
                        <p>07/12/2020</p>
                    </div>
                </div>

                <div class="comment-content">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora praesentium dolor asperiores dolorum, velit repellendus! Fugit voluptate quidem, saepe tempora hic maxime nam, alias perferendis nisi ut velit doloribus ex!</p>
                </div>
            </div>
        </aside>
    </main>

    <?php require_once('./components/modal-login/index.php'); ?>
    <?php require_once('./components/modal-cadastro/index.php'); ?>

    <script src="./components/header/script.js"></script>
    <script src="./components/menu/script.js"></script>
    <script src="./pages/loja/register.js"></script>
    <script src="./pages/loja/script.js"></script>
    <script src="./pages/loja/login.js"></script>
</body>

</html>