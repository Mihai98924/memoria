<!DOCTYPE html>
<html lang="ro">

<head>
    <meta charset="utf-8">
    <title>Memoria</title>
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.min.css">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
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

        .heyo:hover {
            fill: #CC2929;
            +transition(0.3s);
        }

        .enabled {
            fill: #21669E;
            cursor: pointer;
        }
        .description {
            position: absolute;
            font-size: 1rem;
            text-align: center;
            background: white;
            padding: 10px 15px;
            z-index: 3;
            height: 40px;
            line-height: 20px;
            margin: 0 auto;
            color: #051e3e;
            border-radius: 5px;
            box-shadow: 0 0 0 1px #eee;
            transform: translateX(-50%);
            display: none;
        }

        .description.active {
            display: block;
        }

        .description:after {
            content: "";
            position: absolute;
            left: 50%;
            top: 100%;
            width: 0;
            height: 0;
            margin-left: -10px;
            border-left: 10px solid transparent;
            border-right: 10px solid transparent;
            border-top: 10px solid white;
        }

        svg{
            height: 100%;
            width:100%;
        }
        div.separator {
            padding: 10px 0;
        }
        hero-body{
            padding:0!important;
        }
    </style>
</head>

<body>
    <div style="height:100vh">
        <nav class="navbar" role="navigation" aria-label="main navigation">
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
                            <a href="doc/bac.pdf" class="navbar-item">Model subiect bacalaureat</a>
                        </div>
                    </div>
                    <a href="contact.php" class="navbar-item">Contact</a>
                    <a href="despre.php" class="navbar-item">Despre</a>
                </div>
            </div>
        </nav>
        <section class="hero is-fullheight-with-navbar">
           <div class="hero-body">
            <?php
                include "module/svg.html";
            ?>
            </div>
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
    <div class="description"></div>
    <script>
        $(document).on('click', '.navbar-burger', function() {
            $(".navbar-burger").toggleClass("is-active");
            $(".navbar-menu").toggleClass("is-active");
        });
        $(document).on('click', '.close_modal', function(e) {
            e.preventDefault;
            $(".modal").removeClass("is-active");
        });
        $(document).on('click', '.modal_1', function(e) {
            e.preventDefault;
            $(".modal1").addClass("is-active");
        });
        $(document).on('click', '.modal_2', function(e) {
            e.preventDefault;
            $(".modal2").addClass("is-active");
        });
        $(document).on('click', '.modal_3', function(e) {
            e.preventDefault;
            $(".modal3").addClass("is-active");
        });
        $(document).on('click', '.modal_4', function(e) {
            e.preventDefault;
            $(".modal4").addClass("is-active");
        });
        $(document).on('click', '.modal_5', function(e) {
            e.preventDefault;
            $(".modal5").addClass("is-active");
        });
        $(document).on('click', '.modal_6', function(e) {
            e.preventDefault;
            $(".modal6").addClass("is-active");
        });
        $(document).on('click', '.modal_7', function(e) {
            e.preventDefault;
            $(".modal7").addClass("is-active");
        });
        $(document).on('click', '.modal_8', function(e) {
            e.preventDefault;
            $(".modal8").addClass("is-active");
        });
        var $description = $(".description");
        $('.enabled').hover(function() {
            $(this).addClass("enabled heyo");
            $description.addClass("active");
            $description.html($(this).attr('id'));
        }, function() {
            $description.removeClass("active");
        });
        $(document).on('mousemove', function(e) {

            $description.css({
                left: e.pageX,
                top: e.pageY - 70
            });
        });
        
    </script>
</body>

</html>
