<?php

    session_start();

    if (!isset($_POST['login']) || (!isset($_POST['haslo'])))
    {
        header('Location: strona_logowania.php');
        exit();
    }

    require_once "connect.php";

    $polaczenie = @new mysqli($host, $db_user, $db_password,$db_name);

    if ($polaczenie->connect_errno!=0)
    {
        echo "Error: ".$polaczenie->connect_errno;
    }
    else
    {
        $login = $_POST['login'];
        $haslo = $_POST['haslo'];

        $login = htmlentities($login, ENT_QUOTES, "UTF-8");

        if($rezultat = @$polaczenie->query(sprintf("Select * from uzytkownicy where user='%s'",
        mysqli_real_escape_string($polaczenie,$login))))
        {
            $ilu_userow = $rezultat->num_rows;
            if($ilu_userow>0)
            {   
                $wiersz = $rezultat->fetch_assoc();

                if(password_verify($haslo, $wiersz['pass']))
                {
                    $_SESSION['zalogowany'] = true;
                    
                    $_SESSION['id'] = $wiersz['id'];
                    $_SESSION['user'] = $wiersz['user'];
                    $_SESSION['email'] = $wiersz['email'];
                    $_SESSION['nadwozie'] = $wiersz['nadwozie'];
                    $_SESSION['auto'] = $wiersz['auto'];
                    $_SESSION['silnik'] = $wiersz['silnik'];
                    $_SESSION['wyposazenie'] = $wiersz['wyp'];
                    $_SESSION['choinka'] = $wiersz['choinka'];
                    $_SESSION['kluczyk'] = $wiersz['kluczyk'];
                    $_SESSION['dzien'] = $wiersz['dzien'];
                    $_SESSION['czas'] = $wiersz['czas'];
                    $_SESSION['komentarz'] = $wiersz['komentarz'];
                    $_SESSION['faktura'] = $wiersz['faktora'];
                    $_SESSION['cena'] = $wiersz['cena'];

                    unset($_SESSION['blad']);
                    $rezultat->free_result();
                    header('Location: index.php');
                }
                else
                {

                    $_SESSION['blad'] = '<span style="color:red">Nieprawidłowy login lub hasło!</span>';
                    header('Location: strona_logowania.php');

                }

            }
            else{

                $_SESSION['blad'] = '<span style="color:red">Nieprawidłowy login lub hasło!</span>';
                header('Location: strona_logowania.php');

            }
        }

        $polaczenie->close();
    }


?>