<?php
	$test = 1;
	if(isset($_GET['test']))
		$test = $_GET['test'];
    include "./module/test-{$test}.php";
?>
<!DOCTYPE html>
<html lang="ro">

<head>
    <meta charset="utf-8">
    <title>Test</title>
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.min.css">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <link rel="icon" href="./images/icon.png">
    <style>
        .aligning {
            display: flex;
            justify-content: center;
        }

        .back {
            background: url("images/quiz.png");
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
            background-position: center;
        }

        div.separator {
            padding: 10px 0;
        }

        .corect {
            color: green;
        }

        .gresit {
            color: red;
        }

        .corect1 {
            color: #00ff00;
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
                        <a href="quiz.php" class="navbar-item" style="color:#00d1b2">Test</a>
                        <a href="doc/bac.pdf" class="navbar-item">Subiect bac</a>
                    </div>
                </div>
                <a href="contact.php" class="navbar-item">Contact</a>
                <a href="despre.php" class="navbar-item">Despre</a>
            </div>
        </div>
    </nav>
    <div class="back">
        <div class="separator"></div>
        <main class="bd-main-container">
            <div class="content">
                <?php
                    if(! isset($_POST['formular']))
                    {
                ?>
                <h2 style="text-align:center;">Evaluează-ți cunostințele</h2>
                <form action="quiz.php" method="post">
                    <input type="hidden" name="formular" value="1">
                    <ol>
                        <?php
                            foreach($intrebari as $index => $intrebare)
                            {
                                ?>
                        <li>
                            <p>
                                <?=$intrebare['enunt']?>
                            </p>
                            <blockquote>
                                <?php
                                            if(!empty($intrebare['text']))
                                            {
                                                ?>
                                <p><?=$intrebare['text']?></p>
                                <?php
                                            }
                                            if($intrebare['tip'] == 'radio')
                                            {
                                                ?>

                                <?php
                                                        foreach($intrebare['variante'] as $iv => $varianta)
                                                        {
                                                            ?>

                                <label><input type="radio" name="intrebare_<?=$index?>" value="<?=$iv?>">
                                    <?=$varianta['raspuns']?> </label><br>

                                <?php
                                                        }
                                                    ?>
                                <?php
                                            }
                                            if($intrebare['tip'] == 'select')
                                            {
                                                ?>
                                <div>
                                    <select name="intrebare_<?=$index?>">
                                        <option disabled selected value="-1"></option>
                                        <?php
                                                            foreach($intrebare['variante'] as $iv => $varianta)
                                                            {
                                                                ?>
                                        <option value="<?=$iv?>"><?=$varianta['raspuns']?></option>
                                        <?php
                                                            }
                                                        ?>
                                    </select>
                                </div>
                                <?php
                                                
                                            }
                                        ?>
                            </blockquote>
                        </li>
                        <?php
                            }
                        ?>
                    </ol>
                    <div class="aligning">
                        <div class="buttons">
                            <input type="submit" class="button is-outlined is-success is-medium" value="Trimite"
                                id="buton" /> <input type="reset" class="button is-outlined is-danger is-medium"
                                value="Reset" id="buton" />
                        </div>
                    </div>
                </form>
                <?php
                    }
                    else
                    {
                        $rezultate = [];
                        foreach($intrebari as $index => $intrebare)
                        {
                            $rezultate[$index] = [
                                'raspuns' => 0,
                                'corect' => false
                            ];
                            if(isset($_POST["intrebare_{$index}"]))
                            {
                                $rezultate[$index]['raspuns'] = intval($_POST["intrebare_{$index}"]);
								if($intrebare['variante'][$rezultate[$index]['raspuns']]['corect'])
                                    $rezultate[$index]['corect'] = true;
                            }
                            
                        }
                        
                        $nr_raspunsuri = count($rezultate); 
                        $nr_raspunsuri_corecte = 0;
                        
                        foreach($rezultate as $r)
                        {
                            if($r['corect'])
                                $nr_raspunsuri_corecte ++;
                        }
                            
                        ?>
                <div style="text-align:center;" class="content">
                    <h2>Răspunsuri corecte</h2>
                    <div style="font-size:5em;">
                        <?=$nr_raspunsuri_corecte?>/<?=$nr_raspunsuri?>
                    </div>
                    <p>
                        <a href="quiz.php" class="button is-primary is-outlined" id="buton"
                            style="margin:0;text-decoration:none;">Încearcă din nou</a>
                    </p>
                    <div class="content has-text-centered">
                        <a class="button is-link bmail">Trimite rezultatul pe e-mail</a>
                    </div>
                </div>
                <ol>
                    <?php
							foreach($intrebari as $index => $intrebare)
                            {
                                ?>
                    <li>
                        <p>
                            <?=$intrebare['enunt']?>
                        </p>
                        <blockquote>
                            <?php
                                            if(!empty($intrebare['text']))
                                            {
                                                ?>
                            <p><?=$intrebare['text']?></p>
                            <?php
                                            }
											
                                            if($intrebare['tip'] == 'radio')
                                            {
                                                ?>
                            <ul type="a">
                                <?php
                                                        foreach($intrebare['variante'] as $iv => $varianta)
                                                        {
															$class= "";
															if(!isset($_POST["intrebare_{$index}"]))
															{
																if($varianta['corect'])
																		$class = "corect1";
															}
															else
															{
																if($rezultate[$index]['corect'])
																{
																	if($varianta['corect'])
																		$class = "corect";
																}
																else
																{
																	if($varianta['corect'])
																		$class = "corect";
																	else
																		if($rezultate[$index]['raspuns'] == $iv)
																		{
																			$class = "gresit";
																		}
																}
															}
                                                            ?>
                                <li class="<?=$class?>">
                                    <?=$varianta['raspuns']?>
                                </li>
                                <?php
                                                        }
                                                    ?>
                            </ul>
                            <?php
                                            }
                                            if($intrebare['tip'] == 'select')
                                            {
                                                ?>
                            <div>
                                <ul>
                                    <?php
														foreach($intrebare['variante'] as $iv => $varianta)
														{
															$class= "";
															if(!isset($_POST["intrebare_{$index}"]))
															{
																if($varianta['corect'])
																		$class = "corect1";
															}
															else
															{
																if($rezultate[$index]['corect'])
																{
																	if($varianta['corect'])
																		$class = "corect";
																}
																else
																{
																	if($varianta['corect'])
																		$class = "corect";
																	else
																		if($rezultate[$index]['raspuns'] == $iv)
																		{
																			$class = "gresit";
																		}
																}
															}
															?>
                                    <li class="<?=$class?>">
                                        <?=$varianta['raspuns']?>
                                    </li>
                                    <?php
														}
													?>
                                </ul>
                            </div>
                            <?php
                                                
                                            }
                                        ?>
                        </blockquote>
                    </li>
                    <?php
                            }
							?>
                </ol>
                <?php
                    }
                ?>
            </div>
        </main>
        <section class="is-medium">
            <div class="content aligning" style="padding:20px;">
                <a href="doc/test.pdf" class="button is-link">Versiunea offline <i class="fas fa-download"></i></a>
            </div>
        </section>
    </div>
    <script>
        $(document).on('click', '.navbar-burger', function () {
            $(".navbar-burger").toggleClass("is-active");
            $(".navbar-menu").toggleClass("is-active");
        });
        $(document).on('click', '.bmail', function (e) {
            e.preventDefault;
            $(".mail").addClass("is-active");
        });
        $(document).on('click', '.close_modal', function (e) {
            e.preventDefault;
            $(".modal").removeClass("is-active");
        });
    </script>
    <?php
        include "module/mail.php";
    ?>
    <?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

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
    $mail->From = "contact.memorie@gmail.com";
    $mail->FromName = "Memoria";
    $mail->addAddress($_POST['email']);
    $mail->isHTML(true);
    $mail->Subject = "Rezultat evaluare";
    $mail->Body = "<h2>Răspunsuri corecte</h2><p><?php echo $nr_raspunsuri_corecte; ?>/<?php echo $nr_raspunsuri; ?></p>";
    if(!$mail->send()) 
    {
        echo "Mailer Error: " . $mail->ErrorInfo;
    } 
    else 
    {
        echo $nr_raspunsuri_corecte;
    }
}
?>
</body>

</html>