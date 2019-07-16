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
                        <a href="" class="navbar-item">Subiect bac</a>
                    </div>
                </div>
                <a href="contact.php" class="navbar-item" style="color:#00d1b2">Contact</a>
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
            <!-- <div class="column is-half">
                <div class="content">
                </div>
            </div> -->
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
                            </span>
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
                    <div class="content">
                    <?php
                        use PHPMailer\PHPMailer\PHPMailer;
                        use PHPMailer\PHPMailer\Exception;

                        if(isset($_POST['submit']))
                        {
                            require 'phpmail/src/Exception.php';
                            require 'phpmail/src/PHPMailer.php';
                            require 'phpmail/src/SMTP.php';

                            $mail = new PHPMailer;                         
                            //Set PHPMailer to use SMTP.
                            $mail->isSMTP();            
                            //Set SMTP host name                          
                            $mail->Host = "smtp.gmail.com";
                            //Set this to true if SMTP host requires authentication to send email
                            $mail->SMTPAuth = true;                          
                            //Provide username and password     
                            $mail->Username = "contact.memorie@gmail.com";                 
                            $mail->Password = "Memoria2410";                           
                            //If SMTP requires TLS encryption then set it
                            $mail->SMTPSecure = "tls";                           
                            //Set TCP port to connect to 
                            $mail->Port = 587;                                   

                            $mail->From = "contact.memorie@gmail.com";
                            $mail->FromName = "Contact Memoria";

                            $mail->addAddress($_POST['email'], $_POST['nume']);

                            $mail->isHTML(true);

                            $mail->Subject = "Subject Text";
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
</body>
</html>