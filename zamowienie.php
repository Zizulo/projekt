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

    <h1>Twoje zamówienie<h1>

        <h2>Podumowanie zamówienia</h2>
<?php
    echo "<p><b>Twoje zamówienie: </b> ".$_SESSION['user'];

    echo "<p><b>Ilość kluczyków</b>: ".$_SESSION['kluczyk']."<p>";
    echo "<b>Komentarz:</b> ".$_SESSION['komentarz']."<p>";  
    echo "<b>Nadwozie:</b> ".$_SESSION['nadwozie'];
    echo " | <b>Silnik:</b> ".$_SESSION['silnik'];
    echo " | <b>Auto:</b> ".$_SESSION['auto']."<p>";
    echo "<b>Wyposażenie:</b> ".$_SESSION['wyposazenie'];
    echo " | <b>Choinka zapachowa:</b> ".$_SESSION['choinka']."<p>";
    echo "<b>Dzień dostawy:</b> ".$_SESSION['dzien'];
    echo " | <b>Czas dostawy:</b> ".$_SESSION['czas'];
    echo " | <b>Faktura:</b> ".$_SESSION['faktura'];
    echo " | <b>Cena:</b> ".$_SESSION['cena'];
    
?>

<form action="usuwanie.php" method="post">	   
					<div id="content" class="content">
                        <fieldset>
								<legend><div id="niczek" name="niczek"><label>11. Wpisz swój nick(obowiązkowe)</label></div></legend>
								<input type="text" name="niczek"/>
							</fieldset>
                    </div>
                    <input type="submit" value="Usuń">
                    </form>

        <br ><button><a href="strona_logowania.php">Wstecz</a></button>
</div>
</body>
</html>