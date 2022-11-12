<?php
    session_start();
?>

<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<title>Edycja zamówienia</title>
    <meta name="description" content="Wypożycz swój wymarzony model samochodu!">
	<meta name="keywords" content="samochód, katalog, salon, wypożyczalnia aut, pancar sharing studio, sedan">
	<meta name="author" content="Cezary Figurski">
	
	<meta http-equiv="X-Ua-Compatible" content="IE=edge">
	
	<link rel="stylesheet" href="css/style.css">

	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700&amp;subset=latin-ext" rel="stylesheet">
</head>

<body>

<div class="container">

    <h1>Edycja zamówienia<h1>

        <h2>Edytuj swoje zamówienie</h2>

<form action="order.php" method="post">	   
					<div id="content" class="content">
                        <h2>Edycja zamówienia</h2>
        
                        <table border="1" cellpadding="10" cellspacing="0">
                        <tr>
                            <td>Twoj nick</td> <td><input type="text" name="niczek"/></td>
                        </tr>
                        <tr>
                            <td>Rodzaj nadwozia</td> <td><select name="nadwozie">
                                <option value="SUV">SUV</option>
                                <option value="CUV">CUV</option>
                                <option value="Sedan">Sedan</option>
                                <option value="Hatchback">Hatchback</option>
                                <option value="Cabriolet">Cabriolet</option>
                                <option value="Coupe">Coupe</option>
                            </select></td>
                        </tr>
                        <tr>
                            <td>Rodzaj auta</td> <td><select name="auto">
                                <optgroup label="Sedan">
	                                    <option value="AudiA6">Audi A6</option>
                                        <option value="ChevroletAveo">Chevrolet</option>
                                        <option value="Citroen">Citroen</option>
                                        <option value="FiatTipo">Fiat</option>
                                        <option value="RenaultTalisman">Renault</option>
                                        <option value="Saab">Saab</option>
                                        <option value="JaguarXJ">JaguarXJ</option>
                                    </optgroup>
                                    <optgroup label="CUV">
                                        <option value="NissanQashqai">Nissan</option>
                                        <option value="DaciaSpring">Dacia</option>
                                        <option value="HyundaiBayon">Hyundai</option>
                                        <option value="MercedesBenzGLA">MercGLA</option>
                                        <option value="CupraFormentor">Cupra</option>
                                    </optgroup>
                                    <optgroup label="SUV">
                                        <option value="SuzukiJimny">Suzuki</option>
                                        <option value="LadaNivaTravel">Lada</option>
                                        <option value="DaciaDuster">DaciaDuster</option>
                                        <option value="ToyotaRAV4">Toyota RAV4</option>
                                    </optgroup>
                                    <optgroup label="Hatchback">
                                        <option value="ToyotaYaris">Toyota</option>
                                        <option value="OpelVectra">Opel Vectra</option>
                                    </optgroup>
                                    <optgroup label="Cabriolet">
                                        <option value="BMW120dCabriolet">BMW</option>
                                        <option value="AudiCabriolet">Audi Cabriolet</option>
                                    </optgroup>
                                    <optgroup label="Coupe">
                                        <option value="VolkswagenEos">Volkswagen</option>
                                        <option value="Peugeot406Coupe">Peugeot</option>
                                    </optgroup>
                            </select></td>
                        </tr>
                        <tr>
                            <td>Silnik</td> <td><select type="select" name="silnik">
                                <option value="wysokoprężny(DIESEL)">wysokoprężny(DIESEL)</option>
                                <option value="benzynowy">benzynowy</option>
                                <option value="elektryczny">elektryczny</option>
                                <option value="hybrydowy">hybrydowy</option>
                            </select></td>
                        </tr>
                        <tr>
                            <td>Wyposażenie samochodu</td> <td><select type="select" name="wyposazenie">
                                <option value="tylny spojler dachowy">tylny spojler dachowy</option>
                                <option value="tapicerka skórzana">tapicerka skórzana</option>
                                <option value="tempomat">tempomat</option>
                                <option value="radio z bluetooth">radio z bluetooth</option>
                                <option value="reflektory przeciwmłgowe">reflektory przeciwmłgowe</option>
                                <option value="przyciemniane tylne szyby">przyciemniane tylne szyby</option>
                                <option value="czujniki parkowania">czujniki parkowania</option>
                                <option value="podgrzewane fotele">podgrzewane fotele</option>
                                <option value="składane lusterka">składane lusterka</option>
                                <option value="światła LED do jazdy dziennej">światła LED do jazdy dziennej</option>
                            </select></td>
                        </tr>
                        <tr>
                            <td>Choinki Zapachowe</td> <td><select type="select" name="choinka">
                                <option value="kokosowa">kokosowa</option>
                                <option value="cytrynowa">cytrynowa</option>
                                <option value="truskawkowa">truskawkowa</option>
                                <option value="brzoskwiniowa">brzoskwiniowa</option>
                                <option value="mięta">mięta</option>
                                <option value="porzeczka">porzeczka</option>
                            </select></td>
                        </tr>
                        <tr>
                            <td>Kluczyki</td> <td><input type="number" name="kluczyk" step="1" min="0" max"2" placeholder="ile kluczykow"></td>
                        </tr>
                        <tr>
                            <td>Data dostawy</td> <td><input type="date" name="dzien" placeholder="podaj date"></td>
                        </tr>
                        <tr>
                            <td>Czas dostawy</td> <td><input type="time" name="czas" min="7:00" max="18:00" placeholder="podaj godzinę dostawy"></td>
                        </tr>
                        <tr>
                            <td>Komentarz</td> <td><textarea placeholder="Tutaj dodaj swoje uwagi..." name="komentarz" rows="4" cols="70" maxlength="25"></textarea></td>
                        </tr>
                        <tr>
                            <td>Faktura</td> <td><input type="checkbox" name="faktura"/></td>
                        </tr>
                        </table>
                    </div>
                    <input type="submit" value="Zamów">
                    </form>

        <br ><button><a href="order.php">Wstecz</a></button>
</div>
</body>
</html>