<?php

    session_start();

    if(isset($_POST['email']))
    {
        //udana walidacja? tak
        $wszystko_OK=true;

        //Spr nick
        $nick=$_POST['nick'];

        //Spr dł nicka
        if((strlen($nick)<3)|| (strlen($nick)>20))
        {
            $wszystko_OK=false;
            $_SESSION['e_nick']="Błąd, nick musi posiadać od 3 do 20 znaków";
        }

        if(ctype_alnum($nick)==false)
        {
            $wszystko_OK=false;
            $_SESSION['e_nick']="Błąd, nick może składać się tylko z liter i cyfr (bez polskich znaków)";
        }

        //Sprawdz poprawnosc email
       $email= $_POST['email'];
       $emailB= filter_var($email, FILTER_SANITIZE_EMAIL);

        if((filter_var($emailB, FILTER_VALIDATE_EMAIL)==false) || ($emailB!=$email))
        {
            $wszystko_OK=false;
            $_SESSION['e_email']="Błąd, wpisz poprawny email"; 
        }

        //Sprawdz poprawnosc hasla
        $haslo1 = $_POST['haslo1'];
        $haslo2 = $_POST['haslo2'];

        if((strlen($haslo1)<8) || (strlen($haslo1)>20))
        {
            $wszystko_OK=false;
            $_SESSION['e_haslo']="Błąd, hasło musi posiadać od 8 do 20 znaków"; 
        }

        if($haslo1!=$haslo2)
        {
            $wszystko_OK=false;
            $_SESSION['e_haslo']="Błąd, oba hasła nie są takie same";
        }

        $haslo_hash=password_hash($haslo1, PASSWORD_DEFAULT);

        // Czy zaakceptowano regulamin?
        if(!isset($_POST['regulamin']))
        {
            $wszystko_OK=false;
            $_SESSION['e_regulamin']="Błąd, potwierdź regulamin"; 
        }

        //Bot or Not
        $sekret = "6LciFUQgAAAAAPTLs_KYzJhpN6fipIyUPUAwHvVw";

        $sprawdz = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$sekret.'&response='.$_POST['g-recaptcha-response']);

        $odpowiedz = json_decode($sprawdz);

        if($odpowiedz->success==false)
        {
            $wszystko_OK=false;
            $_SESSION['e_bot']="Błąd, potwierdź, że nie jesteś botem"; 
        }

        //Zapamietaj wprowadzone dane
        $_SESSION['fr_nick']=$nick;
        $_SESSION['fr_email']=$email;
        $_SESSION['fr_haslo1']=$haslo1;
        $_SESSION['fr_haslo2']=$haslo2;
        if(isset($_POST['regulamin'])) $_SESSION['fr_regulamin'] = true;

        require_once "connect.php";

        mysqli_report(MYSQLI_REPORT_STRICT);

        try
        {
            $polaczenie = new mysqli($host,$db_user,$db_password,$db_name);
            if($polaczenie->connect_errno!=0)
            {
                throw new Exception(mysqli_connect_errno());
            }
            else
            {
                //Czy email juz istnieje?
                $rezultat = $polaczenie->query("SELECT id FROM uzytkownicy WHERE email='$email'");
                if(!$rezultat) throw new Exception($polaczenie->error);
                $ile_takich_maili=$rezultat->num_rows;
                if($ile_takich_maili>0)
                {
                      $wszystko_OK=false;
                      $_SESSION['e_email']="Błąd, istnieje już konto o takim adresie";  
                }
                $polaczenie->close();
            }

             //Czy nick juz istnieje?
                $rezultat = $polaczenie->query("SELECT id FROM uzytkownicy WHERE user='$nick'");
                if(!$rezultat) throw new Exception($polaczenie->error);
                $ile_takich_nickow = $rezultat->num_rows;
                if($ile_takich_nickow>0)
                {
                      $wszystko_OK=false;
                      $_SESSION['e_nick']="Błąd, istnieje już konto o takim nicku";  
                }

                if($wszystko_OK==true)
                {
                    //Dodajemy do bazy uzytkownika
                    if($polaczenie->query("INSERT INTO uzytkownicy VALUES (NULL, '$nick', '$haslo_hash', '$email')"))
                    {
                        $_SESSION['udanarejestracja']=true;
                        header('Location: witamy.php');
                    }
                    else
                    {
                        throw new Exception($polaczenie->error);
                    }
                }
                $polaczenie->close();
            
        }
       catch(Exception $e)
        {
            echo '<span style="color:red;">Błąd serwera</span>';
            echo '<br />Informacja dev: '.$e;
        }

    }

?>

<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta name="keywords" content="samochód, katalog, salon, wypożyczalnia aut, pancar sharing studio">

        <link rel="stylesheet" href="css/strona_logowania.css">
        <script src="https://www.google.com/recaptcha/api.js"></script>
        
        <h1><title>Strona rejestracji</title><h1>

        <style>
            .error
            {
                color:blue;
                margin-top: 10px;
                margin-bottom: 10px;
                font-size: 10px;
            }
        </style>
    </head>

    <body>

    <header>
        <div class="logo"><h1>Strona rejestracji</h1></div>
        <div class="logo"><img src="img/logo.png" alt="logo"></div>
        <div class="firma">PanCar Sharing Studio</div>
        <div style="clear: both;"></div>
    </header>

    <main>
        <div class="container">
                	
                <article>
                    <form method="post">
                        <div class="content">
                            Nickname: <br /><input type="text" value="<?php
                                if(isset($_SESSION['fr_nick']))
                                {
                                    echo $_SESSION['fr_nick'];
                                    unset($_SESSION['fr_nick']);
                                }

                            ?>" name="nick" /><br />

                            <?php
                                if(isset($_SESSION['e_nick']))
                                {
                                    echo '<div class="error">'.$_SESSION['e_nick'].'</div>';
                                    unset($_SESSION['e_nick']);
                                }
                            ?>
                            
                            E-mail: <br /><input type="text" value="<?php
                                if(isset($_SESSION['fr_email']))
                                {
                                    echo $_SESSION['fr_email'];
                                    unset($_SESSION['fr_email']);
                                }

                            ?>" name="email" /><br />

                            <?php
                                if(isset($_SESSION['e_email']))
                                {
                                    echo '<div class="error">'.$_SESSION['e_email'].'</div>';
                                    unset($_SESSION['e_email']);
                                }
                            ?>

                            Twoje hasło: <br /><input type="password" value="<?php
                                if(isset($_SESSION['fr_haslo1']))
                                {
                                    echo $_SESSION['fr_haslo1'];
                                    unset($_SESSION['fr_haslo1']);
                                }

                            ?>" name="haslo1" /><br />

                            <?php
                                if(isset($_SESSION['e_haslo']))
                                {
                                    echo '<div class="error">'.$_SESSION['e_haslo'].'</div>';
                                    unset($_SESSION['e_haslo']);
                                }
                            ?>

                            Powtórz hasło: <br /><input type="password" value="<?php
                                if(isset($_SESSION['fr_haslo2']))
                                {
                                    echo $_SESSION['fr_haslo2'];
                                    unset($_SESSION['fr_haslo2']);
                                }

                            ?>" name="haslo2" /><br /> 
                            <input type="checkbox" name="regulamin" <?php
                                if(isset($_SESSION['fr_regulamin']))
                                {
                                    echo "checked";
                                    unset($_SESSION['fr_regulamin']);
                                }

                            ?>  /> <a href="regulamin_strony.html">Akceptuję regulamin</a>
                            <?php
                                if(isset($_SESSION['e_regulamin']))
                                {
                                    echo '<div class="error">'.$_SESSION['e_regulamin'].'</div>';
                                    unset($_SESSION['e_regulamin']);
                                }
                            ?>   
                            <div class="g-recaptcha" data-sitekey="6LciFUQgAAAAAMNvVBWLBXZUQRVtR-ZIF7w6FTWu"></div>
                             <?php
                                if(isset($_SESSION['e_bot']))
                                {
                                    echo '<div class="error">'.$_SESSION['e_bot'].'</div>';
                                    unset($_SESSION['e_bot']);
                                }
                            ?>
                            
                            <input type="submit" value="Zarejestruj się" />
                        </div>
                    </form>
                </article>
                
                 <footer>	
                    <ul class="footer2">
                        <li><img src="img/Dacia_Duster.jpg"></li>
                        <li><img src="img/JAGUARXJ.jpg"></li>
                        <li><img src="img/ChevroletAveo.jpg"></li>
                    </ul>
                    		
                    <div class="footer">
                        Najlepsze auta tylko u nas ! &copy; Wszelkie prawa zastrzeżone    
                    </div>
                                        
                    <ul class="footer1">
                            <li><i class="icon-direction">Radom ul.Czerwca 53</i></li>
                            <li><i class="icon-phone">48 76 453 43</i></li>
                            <li><i class="icon-mail-alt">pancarsharingstudio@gmail.com</i></li>
                    </ul>
                 </footer>
        </div>
    </main>

<?php
    if(isset($_SESSION['blad'])) echo $_SESSION['blad'];
?>

    </body>

</html>