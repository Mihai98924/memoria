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
        div.separator {
            padding: 10px 0;
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
                    <a class="navbar-item" href="index.php">Acasă</a>
                    <div class="navbar-item has-dropdown is-hoverable">
                        <a href="" class="navbar-link">Evaluare</a>
                        <div class="navbar-dropdown">
                            <a href="quiz.php" class="navbar-item">Test</a>
                            <a href="doc/bac.pdf" class="navbar-item">Subiect bac</a>
                        </div>
                    </div>
                    <a href="contact.php" class="navbar-item">Contact</a>
                    <a href="despre.php" class="navbar-item" style="color:#00d1b2">Despre</a>
                </div>
            </div>
        </nav>
        <div class="separator"></div>
        <section>
            <div class="columns is-centered">
                <div class="column is-four-fifths">
                    <div class="box">
                        <div class="content">
                            <h5 class="has-text-centered"><q>Fără memorie, nu există cultură. Fără memorie, nu ar exista nici civilizaţie, nici societate, nici viitor.</q> - Elie Wiesel</h5>
                            <p>Bibliografie:</p>
                            <ul>
                                <li>Manual de Psihologie - editura Corvin</li>
                                <li>Manual de Psihologie - editura Aramis</li>
                                <li><a href="https://www.youtube.com/user/TEDEducation">TED-Ed</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script>
        $(document).on('click', '.navbar-burger', function () {
            $(".navbar-burger").toggleClass("is-active");
            $(".navbar-menu").toggleClass("is-active");
        });
    </script>
</body>

</html>