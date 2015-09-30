<?php
   require_once("functions.php");
   if(!isset($_SESSION["logged_in_user_id"])){
		header("Location: login.php");
		
	}
	//kasutaja tahab välja logida
	if(isset($_GET["logout"])){
		//addressireal on olemas muutuja logout
		//kustutame kõik sessioonimuutujad
		session_destroy();
		header("Location: login.php");
	}
   
 ?> 
 <p>Tere, <?=$_SESSION["logged_in_user_email"];?>
	<a href="?logout=1"> Logi välja <a>