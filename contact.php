<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
?>
<!DOCTYPE html>
<html lang="ro">

<head>
    <meta charset="utf-8">
    <title>Contact</title>
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
    <nav class="navbar" role="navigation" aria-label="main navigation">
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
                        <a href="doc/bac.pdf" class="navbar-item">Model subiect bacalaureat</a>
                    </div>
                </div>
                <a href="contact.php" class="navbar-item" style="color:#00d1b2">Contact</a>
                <a href="despre.php" class="navbar-item">Despre</a>
            </div>
        </div>
    </nav>
    <main>
        <div class="hero is-primary">
            <div class="hero-body">
                <div class="container">
                    <h1 class="title is-1 has-text-centered">Contactează-ne</h1>
                </div>
            </div>
        </div>
        <div class="separator"></div>
        <div class="columns is-centered">
            <div class="column is-half">
                <div class="box">
                <form action="contact.php" method="post">
                    <div class="field">
                        <label class="label">Nume</label>
                        <div class="control has-icons-left">
                            <input class="input" name="nume" type="text" required>
                            <span class="icon is-small is-left">
                                <i class="fas fa-user"></i>
                            </span>
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">E-mail</label>
                        <div class="control has-icons-left">
                            <input class="input" name="email" type="email" required>
                            <span class="icon is-small is-left">
                                <i class="fas fa-envelope"></i>
                            </span>
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Subiect</label>
                        <div class="control">
                            <input class="input" name="subject" type="text">
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Mesaj</label>
                        <div class="control">
                            <textarea class="textarea" name="text" placeholder="Scrie aici..." required></textarea>
                        </div>
                    </div>
                    <div class="field">
                        <div class="control">
                            <button name="submit" class="button is-link">Trimite</button>
                        </div>
                    </div>
                    </form>
                    <div class="separator"></div>
                    <div class="content">
                    <?php
                        if(isset($_POST['submit']))
                        {
                            require 'phpmail/src/Exception.php';
                            require 'phpmail/src/PHPMailer.php';
                            require 'phpmail/src/SMTP.php';

                            $mail = new PHPMailer;         
                            $mail->isSMTP();                    
                            $mail->Host = "smtp.gmail.com";
                            $mail->SMTPAuth = true;               
                            $mail->Username = "contact.memorie@gmail.com";                 
                            $mail->Password = "Memoria2410";                 
                            $mail->SMTPSecure = "tls";       
                            $mail->Port = 587;                                   
                            $mail->From = $_POST['email'];
                            $mail->FromName = $_POST['nume'];
                            $mail->addReplyTo($_POST['email'], "Reply");
                            $mail->addAddress("contact.memorie@gmail.com");
                            $mail->isHTML(true);
                            $mail->Subject = $_POST['subject'];
                            $mail->Body = $_POST['text'];

                            if(!$mail->send()) 
                            {
                                echo '<h3 class="has-text-centered" style="color:red">Încearcă mai târziu!</h3>';
                            }
                            else echo '<h3 class="has-text-centered" style="color:#00d1b2">Mulțumim pentru feedback!</h3>';
                        }
                    ?>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script>
        $(document).on('click', '.navbar-burger', function () {
            $(".navbar-burger").toggleClass("is-active");
            $(".navbar-menu").toggleClass("is-active");
        });
    </script>
</body>
</html>