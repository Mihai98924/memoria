<!DOCTYPE html>
<html lang="ro">

<head>
    <meta charset="utf-8">
    <title>Memoria</title>
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.min.css">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <link rel="icon" href="./images/icon.png">
    <style>
        .btns {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            align-content: center;
        }

        g[onclick] {
            fill: #A01127;
        }

        g[onclick]:hover {
            fill: rgb(40, 92, 63);
            transition-duration: 0.5s;
            cursor: pointer;
        }

        #poze1 {
            float: right;
            margin-left: 15px;
            width: 30%;
        }

        #poze2 {
            float: left;
            margin-right: 30px;
            margin-bottom: 15px;
            width: 30%;
        }
    </style>
</head>

<body>
    <div>
        <nav class="navbar" role="navigation" aria-label="main navigation">
            <div class="navbar-brand">
            </div>
            <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="Nav">
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
            </a>
            <div id="Nav" class="navbar-menu">
                <div class="navbar-start">
                    <a class="navbar-item" href="index.php" style="color:#00d1b2">Acasă</a>
                    <div class="navbar-item has-dropdown is-hoverable">
                        <a href="" class="navbar-link">Evaluare</a>
                        <div class="navbar-dropdown">
                            <a href="quiz.php" class="navbar-item">Test</a>
                            <a href="doc/bac.pdf" class="navbar-item">Subiect bac</a>
                        </div>
                    </div>
                    <a href="contact.php" class="navbar-item">Contact</a>
                    <a href="despre.php" class="navbar-item">Despre</a>
                </div>
            </div>
        </nav>

        <section>
            <?php
                include "module/svg.html";
            ?>
        </section>
    </div>
    <?php
        include "module/modal1.php";
        include "module/modal2.php";
        include "module/modal3.php";
        include "module/modal4.php";
        include "module/modal5.php";
        include "module/modal6.php";
        include "module/modal7.php";
        include "module/modal8.php";
    ?>
    <script>
        $(document).on('click', '.navbar-burger', function () {
            $(".navbar-burger").toggleClass("is-active");
            $(".navbar-menu").toggleClass("is-active");
        });
        $(document).on('click', '.close_modal', function (e) {
            e.preventDefault;
            $(".modal").removeClass("is-active");
        });
        $(document).on('click', '.modal_1', function (e) {
            e.preventDefault;
            $(".modal1").addClass("is-active");
        });
        $(document).on('click', '.modal_2', function (e) {
            e.preventDefault;
            $(".modal2").addClass("is-active");
        });
        $(document).on('click', '.modal_3', function (e) {
            e.preventDefault;
            $(".modal3").addClass("is-active");
        });
        $(document).on('click', '.modal_4', function (e) {
            e.preventDefault;
            $(".modal4").addClass("is-active");
        });
        $(document).on('click', '.modal_5', function (e) {
            e.preventDefault;
            $(".modal5").addClass("is-active");
        });
        $(document).on('click', '.modal_6', function (e) {
            e.preventDefault;
            $(".modal6").addClass("is-active");
        });
        $(document).on('click', '.modal_7', function (e) {
            e.preventDefault;
            $(".modal7").addClass("is-active");
        });
        $(document).on('click', '.modal_8', function (e) {
            e.preventDefault;
            $(".modal8").addClass("is-active");
        });
    </script>
</body>

</html>