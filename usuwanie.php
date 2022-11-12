<?php
    session_start();
?>

<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<title>Podsumowanie</title>
    <meta name="description" content="Wypożycz swój wymarzony model samochodu!">
	<meta name="keywords" content="samochód, katalog, salon, wypożyczalnia aut, pancar sharing studio, sedan">
	<meta name="author" content="Cezary Figurski">
	
	<meta http-equiv="X-Ua-Compatible" content="IE=edge">
	
	<link rel="stylesheet" href="css/style.css">

	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700&amp;subset=latin-ext" rel="stylesheet">
</head>

<body>

<div class="container">

    <h1>Szczegóły twojego zamówienia<h1>

<?php
    if(isset($_POST['niczek']))
    {
        if(empty($_POST['niczek']))
        {
            echo '<span style="color:yellow;">Nie podałeś nicku</span>';
        }
        else
        {
            require_once "connect.php";
            $conn = mysqli_connect($host,$db_user,$db_password,$db_name) or die("Błąd połączenia");
            $twojnick = $_POST['niczek'];
            $q = "UPDATE uzytkownicy SET nadwozie='' , auto='' , silnik='' , wyp='' , choinka='' , kluczyk='' , dzien='' , czas='' , komentarz='' , faktora='' , cena='' WHERE user='$twojnick'";
            mysqli_query($conn, $q) or die("Problemy z odczytem danych");
            mysqli_close($conn);
        } 
    }


?>

TWOJE ZAMOWIENIE ZOSTAŁO USUNIĘTE

<br ><button><a href="index.php">Wstecz</a></button>

</div>
</body>
</html>
