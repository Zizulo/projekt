<?php
    session_start();

	if(!isset($_SESSION['zalogowany']))
	{
		header('Location: strona_logowania.php');
		exit();
	}
?>

<!DOCTYPE html>
<html lang="pl">
<head>

	<meta charset="utf-8">
	<title>Wypożyczalnia samochodowa</title>
	<meta name="description" content="Wypożycz swój wymarzony model samochodu!">
	<meta name="keywords" content="samochód, katalog, salon, wypożyczalnia aut, pancar sharing studio">
	<meta name="author" content="Cezary Figurski">
	
	<meta http-equiv="X-Ua-Compatible" content="IE=edge">
	
	<link rel="stylesheet" href="css/main.css" type="text/css" />
	<link rel="stylesheet" href="css/fontello.css" />

	<link href="https://coin-birds.com/?en=Ziczko" target="_blank">

	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700&amp;subset=latin-ext" rel="stylesheet">
	
	<script src="timer.js"></script>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

	<script src="jquery.scrollTo.min.js"></script>
	
	<script>
		jQuery(function($)
		{
			//zresetuj scrolla
			$.scrollTo(0);
			$('#link1').click(function() {$.scrollTo($('#rodzajnadwozia'), 500);});
			$('#link2').click(function() {$.scrollTo($('#katalog'), 500);});
			$('#link3').click(function() {$.scrollTo($('#rodzajsilnika'), 500);});
			$('#link4').click(function() {$.scrollTo($('#wyposazeniesamochodu'), 500);});
			$('#link5').click(function() {$.scrollTo($('#choinkizapachowe'), 500);});
			$('#link6').click(function() {$.scrollTo($('#ilekluczykow'), 500);});
			$('#link7').click(function() {$.scrollTo($('#datadostawy'), 500);});
			$('#link8').click(function() {$.scrollTo($('#czasdostawy'), 500);});
			$('#link9').click(function() {$.scrollTo($('#uwagi'), 500);});
			$('#link10').click(function() {$.scrollTo($('#footer1'), 500);});
			$('.scrollup').click(function() {$.scrollTo($('body'), 1000);});
		}
		);
		
		//pokaz podczas przewijania
		
		$(window).scroll(function()
		{
			if($(this).scrollTop()>300) $('.scrollup').fadeIn();
			else $('.scrollup').fadeOut();
		}
		);
	</script>
	<!--[if lt IE 9]>
	<script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
	<![endif]-->
	
</head>

<body onload="odliczanie();">

	<header>
		<div class="rectangle">
			<div id="logo" ><a href="wypożyczalnia-aut" class="logolink" alt="wypożyczalnia-aut">Wybierz konfigurację samochodu</a></div>
			<div id="miejscelogo" ><img src="img/logo.png" alt="logo"></div>
			<div id="zegar" >12:00:00</div>
			<div style="clear: both;"></div>
		</div>
		<nav>
            <ul class="menu">
               <li><a href="#">
<?php

		echo $_SESSION['email'];

?>

                </a></li>
               <li><a href="#">
<?php

		echo "Witaj ".$_SESSION['user'];

?>

                </a></li>
				<li><a href="#"><label><a href="logout.php">Wyloguj się</a></label></a></li>
				<li><a id="link10" href="#"><label> Kontakt </label></a></li>
                <li><a id="link10" href="zamowienie.php"><label> Zamówienie </label></a></li>
				<li><label> Szukaj <input type="search" name="fraza"></label></div>
			<div style="clear: both;"></div>
			</ul>
		</nav>
	</header>
	
	<main>
	
		<article>
			
				<div id="container" class="container">
				
					<a href="#" class="scrollup"></a>
			
					<nav>	
						<div id="naw" class="naw">
							<ol>
								<li><a id="link1" href="#"><div class="naw1"><label>Rodzaj nadwozia</label></div></a></li>
								<li><a id="link2" href="#"><div class="naw1"><label>Katalog</label></div></a></li>
								<li><a id="link3" href="#"><div class="naw1"><label>Rodzaj silnika</label></div></a></li>
								<li><a id="link4" href="#"><div class="naw1"><label>Wyposażenie samochodu</label></div></a></li>
								<li><a id="link5" href="#"><div class="naw1"><label>Choinki zapachowe</label></div></a></li>
								<li><a id="link6" href="#"><div class="naw1"><label>Kluczyki do samochodu</label></div></a></li>
								<li><a id="link7" href="#"><div class="naw1"><label>Data dostawy</label></div></a></li>
								<li><a id="link8" href="#"><div class="naw1"><label>Preferowany czas dostawy</label></div></a></li>
								<li><a id="link9" href="#"><div class="naw1"><label>Uwagi do zamówienia</label></div></a></li>
							</ol>
						</div>
					</nav>	
					
			<form action="order.php" method="post">	   
					<div id="content" class="content">
					
						<div id="rodzajnadwozia" class="square_1">
							<fieldset>
								<legend>1. Rodzaj nadwozia</legend>
								
								<div><label><input type="radio" value="SUV" name="nadwozie"> SUV </label></div>
								<div><label><input type="radio" value="CUV" name="nadwozie"> CUV </label></div>
								<div><label><input type="radio" value="Sedan" name="nadwozie"> Sedan </label></div>
								<div><label><input type="radio" value="Hatchback" name="nadwozie"> Hatchback </label></div>
								<div><label><input type="radio" value="Cabriolet" name="nadwozie"> Cabriolet </label></div>
								<div class="square_11"><label><input type="radio" value="Coupe" name="nadwozie"> Coupe </label></div>
								
							</fieldset>
						</div>
						<div id="katalog" class="square_2">
						
							<fieldset>
								<legend>2. Katalog</legend>
								<div class="tile"><a href="sedan.php" target="_blank" title="Marki sedanów w naszej ofercie"><img src="img/AudiA6.jpg" width="90" height="50" alt="Sedan"></a></div>
								<div class="tile"><a href="crossower.php" target="_blank" title="Marki crossowerów w naszej ofercie"><img src="img/Nissan_Qashqai_2017.jpg" width="90" height="50" alt="Cuv"></a></div>
								<div class="tile"><a href="SUV.php" target="_blank" title="Marki suv-ów w naszej ofercie"><img src="img/Toyota_RAV4.jpg" width="90" height="50" alt="Suv"></a></div>
                                    
                                <div style="clear: both;"><div>
								
								<div class="tile"><a href="hatchback.php" target="_blank" title="Marki hatchback-ów w naszej ofercie"><img src="img/Toyota_Yaris.jpg" width="90" height="50" alt="Hatchback"></a></div>
								<div class="tile"><a href="cabriolet.php" target="_blank" title="Marki cabriolet-ów w naszej ofercie"><img src="img/BMW_120d_Cabriolet.jpg" width="90" height="50" alt="Cabriolet"></a></div>
								<div class="tile"><a href="coupe.php" target="_blank" title="Marki coupe-ów w naszej ofercie"><img src="img/Volkswagen-Eos.JPG" width="90" height="50" alt="Coupe"></a></div>

                                <div style="clear: both;"></div>

                                <select name="auto">
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
                                </select>

                                <div style="clear: both;"></div>
								
							</fieldset>
							
						</div>
						
						<div style="clear: both"></div>
						
						<div id="rodzajsilnika" class="square2">
							<fieldset>
								<legend><label for="silnik">3. Rodzaj silnika</label></legend>
								<select type="select" id="silnik" name="silnik">
								
									<option value="wysokoprężny(DIESEL)">wysokoprężny(DIESEL)</option>
									<option value="benzynowy" selected>benzynowy</option>
									<option value="elektryczny" >elektryczny</option>
									<option value="hybrydowy" >hybrydowy</option>
									
								</select>
							</fieldset>
						
							<fieldset>
								<legend><div id="wyposazeniesamochodu">4. Wyposażenie samochodu</div></legend>
								
								<div class="col">
                                    <div><label><input  type="radio" name="wyposazenie" value="tylny spojler dachowy"> tylny spojler dachowy </div></label>
									<div><label><input  type="radio" name="wyposazenie" value="tapicerka skórzana"> tapicerka skórzana </div></label>
									<div><label><input  type="radio" name="wyposazenie" value="tempomat"> tempomat </div></label>
								</div>
								<div class="col">
									<div><label><input  type="radio" name="wyposazenie" value="radio z bluetooth"> radio z bluetooth </div></label>
									<div><label><input  type="radio" name="wyposazenie" value="reflektory przeciwmgłowe"> reflektory przeciwmgłowe </div></label>
									<div><label><input  type="radio" name="wyposazenie" value="przyciemniane tylne szyby"> przyciemniane tylne szyby </div></label>
								</div>
								<div class="col">
									<div><label><input  type="radio" name="wyposazenie" value="czujniki parkowania"> czujniki parkowania </div></label>
									<div><label><input  type="radio" name="wyposazenie" value="podgrzewane fotele"> podgrzewane fotele </div></label>
									<div><label><input  type="radio" name="wyposazenie" value="składane lusterka"> składane lusterka </div></label>
									<div><label><input  type="radio" name="wyposazenie" value="światła LED do jazdy dziennej "> światła LED do jazdy dziennej </div></label>
								
							</fieldset>
						
						
							<fieldset>
								<legend><div id="choinkizapachowe"><label for="choinka">5. Choinki zapachowe</label></div></legend>
								
								<select id="choinka" name="choinka" multiple size="4">
									<option value="kokosowa">kokosowa</option>
									<option value="cytrynowa" selected>cytrynowa</option>
									<option value="truskawkowa" >truskawkowa</option>
									<option value="brzoskwiniowa" >brzoskwiniowa</option>
									<option value="mięta" >mięta</option>
									<option value="porzeczka" >porzeczka</option>
								</select> <br />
							
							</fieldset> 
							<fieldset>
								<legend><div id="ilekluczykow"><label>6. Ile kluczyków</label></div></legend>
								<input type="number" name="kluczyk" step="1" min="0" max="2">
							</fieldset>
							<fieldset>
								<legend><div id="datadostawy"><label>7. Data dostawy</label></div></legend>
								<input type="date" name="dzien">
							</fieldset>
							<fieldset>
								<legend><div id="czasdostawy"><label>8. Preferowany czas dostawy</label></div></legend>
								<input type="time" name="czas" min="7:00" max="18:00">
							</fieldset>
							<fieldset>
								<legend><div id="uwagi" name="komentarz"><label for="komentarz">9. Uwagi do zamówienia</label></div></legend>
								<textarea placeholder="Tutaj dodaj swoje uwagi..." name="komentarz" id="komentarz" rows="4" cols="70" maxlength="25"></textarea>
							</fieldset>
                            <fieldset>
								<legend><div id="faktura" name="faktura"><label>10. Proszę o fakturę (opcjonalne)?</label></div></legend>
								<input type="checkbox" name="faktura"/>
							</fieldset>
                            <fieldset>
								<legend><div id="niczek" name="niczek"><label>11. Wpisz swój nick(obowiązkowe)</label></div></legend>
								<input type="text" name="niczek"/>
							</fieldset>
						</div>
						<div style="clear: both;"></div>
											
							<input type="submit" value="Zamawiam">
							<input type="reset" value="Wyczyść formularz">
						
					</div>
			</form>
								
					<aside>
						<div class="ad">
								<a href="https://coin-birds.com/?en=Ziczko" target="_blank">
									<img src="https://coin-birds.com/images/promo/en/160x600.gif" alt="Profit every 10 minutes!">
								</a>
						</div>
					</aside>
					
					<footer>			
								<div>
									Najlepsze auta tylko u nas ! &copy; Wszelkie prawa zastrzeżone    
								</div>
								
								<ul class="footer1" id="footer1">
									<li><i class="icon-direction">Radom ul.Czerwca 53</i></li>
									<li><i class="icon-phone">48 76 453 43</i></li>
									<li><i class="icon-mail-alt">pancarsharingstudio@gmail.com</i></li>
								</ul>
					</footer>			
				</div>		
			
		</article>
		
	</main>

</body>
</html>