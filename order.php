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
            $rodzajnadwozia = $_POST['nadwozie'];
	        $silnik = $_POST['silnik'];
            $auto = $_POST['auto'];
            $wyposazeniesamochodu = $_POST['wyposazenie'];
            $choinkizapachowe = $_POST['choinka'];
            $datadostawy = $_POST['dzien'];
            $czasdostawy = $_POST['czas'];
            $ilekluczykow = $_POST['kluczyk'];
            $komentarz = $_POST['komentarz'];
            $faktura = $_POST['faktura'];
            $twojnick = $_POST['niczek'];
            $cena = $ilekluczykow*5;
            $q = "UPDATE uzytkownicy SET nadwozie='$rodzajnadwozia',auto='$auto',silnik='$silnik',wyp='$wyposazeniesamochodu',choinka='$choinkizapachowe',kluczyk='$ilekluczykow',dzien='$datadostawy',czas='$czasdostawy',komentarz='$komentarz',faktora='$faktura',cena='$cena' WHERE user='$twojnick'";
            mysqli_query($conn, $q) or die("Problemy z odczytem danych");
            mysqli_close($conn);

        }
        
    }
    
    
       if($_POST){
            if($_POST['nadwozie'] == "SUV"){
                $rodzajnadwozia = SUV;
            }
            if($_POST['nadwozie'] == "CUV"){
                $rodzajnadwozia = CUV;
            }
            if($_POST['nadwozie'] == "Sedan"){
                $rodzajnadwozia = Sedan;
            }
            if($_POST['nadwozie'] == "Hatchback"){
                $rodzajnadwozia = Hatchback;
            }
            if($_POST['nadwozie'] == "Cabriolet"){
                $rodzajnadwozia = Cabriolet;
            }
            if($_POST['nadwozie'] == "Coupe"){
                $rodzajnadwozia = Coupe;
            }
        }
        
        if($_POST){
            if($_POST['silnik'] == "wysokoprężny(DIESEL)"){
                $silnik = wysokoprężny(DIESEL);
            }
            if($_POST['silnik'] == "benzynowy"){
                $silnik = benzynowy;
            }
            if($_POST['silnik'] == "elektryczny"){
                $silnik = elektryczny;
            }
            if($_POST['silnik'] == "hybrydowy"){
                $silnik = hybrydowy;
            }
        }
    
        if($_POST){
            if($_POST['choinka'] == "kokosowa"){
                $choinkizapachowe = kokosowa;
            }
            if($_POST['choinka'] == "cytrynowa"){
                $choinkizapachowe = cytrynowa;
            }
            if($_POST['choinka'] == "truskawkowa"){
                $choinkizapachowe = truskawkowa;
            }
            if($_POST['choinka'] == "brzoskwiniowa"){
                $choinkizapachowe = brzoskwiniowa;
            }
            if($_POST['choinka'] == "mięta"){
                $choinkizapachowe = mięta;
            }
            if($_POST['choinka'] == "porzeczka"){
                $choinkizapachowe = porzeczka;
            }
        }

       /* if($_POST){
            if($_POST['auto'] == "AudiA6"){
                $auto = Audi A6;
            }
            if($_POST['auto'] == "ChevroletAveo"){
                $auto = Chevrolet;
            }
            if($_POST['auto'] == "Citroen"){
                $auto = Citroen;
            }
            if($_POST['auto'] == "FiatTipo"){
                $auto = Fiat;
            }
            if($_POST['auto'] == "RenaultTalisman"){
                $auto = Renault;
            }
            if($_POST['auto'] == "Saab"){
                $auto = Saab;
            }
            if($_POST['auto'] == "JaguarXJ"){
                $auto = JaguarXJ;
            }
            if($_POST['auto'] == "NissanQashqai"){
                $auto = Nissan;
            }
            if($_POST['auto'] == "DaciaSpring"){
                $auto = Dacia;
            }
            if($_POST['auto'] == "HyundaiBayon"){
                $auto = Hyundai;
            }
            if($_POST['auto'] == "MercedesBenzGLA"){
                $auto = MercedesBenzGLA;
            }
            if($_POST['auto'] == "CupraFormentor"){
                $auto = Cupra;
            }
            if($_POST['auto'] == "ToyotaYaris"){
                $auto = Toyota;
            }
            if($_POST['auto'] == "OpelVectra"){
                $auto = Opel Vectra;
            }
            if($_POST['auto'] == "BMW120dCabriolet"){
                $auto = BMW;
            }
            if($_POST['auto'] == "AudiCabriolet"){
                $auto = Audi Cabriolet;
            }
            if($_POST['auto'] == "VolkswagenEos"){
                $auto = Volkswagen;
            }
            if($_POST['auto'] == "Peugeot406Coupe"){
                $auto = Peugeot;
            }
        }*/

        if(isset($_POST['faktura']) == checked){
            $faktura = TAK;
        }else{
            $faktura = NIE;
        }
                                                /* AudiA6">Audi A6</option>
                                            <option value="ChevroletAveo">Chevrolet</option>
                                            <option value="Citroen">Citroen</option>
                                            <option value="FiatTipo">Fiat</option>
                                            <option value="RenaultTalisman">Renault</option>
                                            <option value="Saab">Saab</option>
                                            <option value="JaguarXJ">JaguarXJ</option>    
                                            <option value="NissanQashqai">Nissan</option>
                                            <option value="DaciaSpring">Dacia</option>
                                            <option value="HyundaiBayon">Hyundai</option>
                                            <option value="MercedesBenzGLA">MercGLA</option>
                                            <option value="CupraFormentor">Cupra</option>
                                            <option value="ToyotaYaris">Toyota</option>
                                            <option value="OpelVectra">Opel Vectra</option>
                                            <option value="BMW120dCabriolet">BMW</option>
                                            <option value="AudiCabriolet">Audi Cabriolet</option>
                                            <option value="VolkswagenEos">Volkswagen</option>
                                            <option value="Peugeot406Coupe">Peugeot</option>
                              
                                    */
                                   /* name="nazwa">
                                    <optgroup label="nazwa grupy">
	                                    <option value="1">Tu wpisz pierwszą możliwość</option>
	                                    <option value="2">Tu wpisz drugą możliwość</option>
                                    </optgroup>
                                    <optgroup label="nazwa grupy dwa">
                                        <option value="3">Tu wpisz trzecią możliwość</option>
	                                    <option value="4">Tu wpisz czwartą możliwość</option>
                                    </optgroup>*/

        /*if($_POST){
            if($_POST['wyposazenie'] == "tylny spojler dachowy"){
                $wyposazeniesamochodu = tylny spojler dachowy ;   
            }
            if($_POST['wyposazenie'] == "tapicerka skórzana"){
                $wyposazeniesamochodu = tapicerka skórzana ;   
            }
        }*/


	    
       // $cena = $auto*$ilekluczykow;




        
echo<<<END

        <h2>Podumowanie zamówienia</h2>
        
        <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <td>Twoj nick</td> <td>$twojnick</td>
        </tr>
        <tr>
            <td>Rodzaj nadwozia</td> <td>$rodzajnadwozia</td>
        </tr>
        <tr>
            <td>Rodzaj auta</td> <td>$auto</td>
        </tr>
        <tr>
            <td>Silnik</td> <td>$silnik</td>
        </tr>
        <tr>
            <td>Wyposażenie samochodu</td> <td>$wyposazeniesamochodu</td>
        </tr>
        <tr>
            <td>Choinki Zapachowe</td> <td>$choinkizapachowe</td>
        </tr>
        <tr>
            <td>Kluczyki</td> <td>$ilekluczykow</td>
        </tr>
        <tr>
            <td>Data dostawy</td> <td>$datadostawy</td>
        </tr>
        <tr>
            <td>Czas dostawy</td> <td>$czasdostawy</td>
        </tr>
        <tr>
            <td>Komentarz</td> <td>$komentarz</td>
        </tr>
        <tr>
            <td>Faktura</td> <td>$faktura</td>
        </tr>
        <tr>
            <td>Cena startowa</td> <td>$cena PLN</td>
        </tr>
        
        </table>
        <br > <button><a href="dziekujemy.php">Wyślij zamówienie</a></button></button> <button><a href="edytuj.php">Edytuj</a></button>
END;

?>
</div>
</body>
</html>