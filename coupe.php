<!DOCTYPE html>
<html lang="pl">
<head>

	<meta charset="utf-8">
	<title>Dostępne auta - Coupe</title>
	<meta name="description" content="Wypożycz swój wymarzony model samochodu! - Coupe">
	<meta name="keywords" content="samochód, katalog, salon, wypożyczalnia aut, pancar sharing studio, coupe">
	<meta name="author" content="Cezary Figurski">
	
	<meta http-equiv="X-Ua-Compatible" content="IE=edge">
	
	<link rel="stylesheet" href="css/style.css">

	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700&amp;subset=latin-ext" rel="stylesheet">
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

	<script src="jquery.scrollTo.min.js"></script>
	
	<script>
		jQuery(function($)
		{
			//zresetuj scrolla
			$.scrollTo(0);
			$('#link1').click(function() {$.scrollTo($('#rodzajnadwozia'), 500);});
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

<body>

	<header>
	
		<h1>Dostępne marki aut - Coupe</h1>

	</header>
	
	<main>
	
		<article>
		
			<form action="order.php" method="post">
			
			<div class="row">
			
				<fieldset>
				<legend>Ze względu na wielkość</legend>
					<div id="container" class="container">
					
						<a href="#" class="scrollup"></a>
						
						<div id="content" class="content">
							<h1><div id="logo"><label> 1. Autosegment B </label></div></h1>
							<div class="rectangle">

                                    <div style="float:left;">
										<h2><div >Peugeot 406 Coupe</div><img src="img/Peugeot_406_Coupe.jpg" alt="Peugeot 406 Coupe"  /><h2> 
									</div>
									<div style="float:left;">
										<div class="cena">Cena</div>
									    <div class="dane">
                                                <ul><div>Opłata startowa</div>  
                                                    <li>
                                                        <div>5 PLN</div>
                                                    </li>
                                                </ul>
                                                <ul><div>Minuta jazdy</div>  
                                                    <li>
                                                        <div>0,49 PLN</div>
                                                    </li>
                                                </ul>
                                                <ul><div>Kilometr</div>  
                                                    <li>
                                                        <div>0,89 PLN</div>
                                                    </li>
                                                </ul>    
                                        </div>
									</div> 
									<div style="clear:both;"></div>
                                    <div style="float:left;">
										<h2><div >Volkswagen Eos</div><img src="img/Volkswagen-Eos.JPG" alt="Volkswagen Eos"  /><h2> 
									</div>
									<div style="float:left;">
										<div class="cena">Cena</div>
									    <div class="dane">
                                                <ul><div>Opłata startowa</div>  
                                                    <li>
                                                        <div>5 PLN</div>
                                                    </li>
                                                </ul>
                                                <ul><div>Minuta jazdy</div>  
                                                    <li>
                                                        <div>0,49 PLN</div>
                                                    </li>
                                                </ul>
                                                <ul><div>Kilometr</div>  
                                                    <li>
                                                        <div>0,89 PLN</div>
                                                    </li>
                                                </ul>    
                                        </div>
									</div> 
									<div style="clear:both;"></div>
							</div>
									
						</div>
							
					</div>
				</fieldset>
			
			</div>
			
			
			
			</form>		
			
		</article>
		
	</main>

</body>
</html>