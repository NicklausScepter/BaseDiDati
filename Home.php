<?php
require "lib.php";
controllo_accesso();
?>
<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML//EN">
<html>
	<head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<title>Sito appunti</title>
		<link rel="stylesheet" type="text/css" href="cssstyles.css">
	</head>
	<body>
		
		<!-- menu bar -->
		<ul>	
			<li><a href="Home.php">HOME</a></li>
            <li>Benvenuto <b><?php echo $_SESSION['user']?></b>!</li>
			<li><a href="index.php">Logout</a></li>
		</ul>

		<div class="container" style = "background-color: #ffffff">
			<a href="#">
			<button style="background-color: #ffcc00"><b>CERCA APPUNTI</b></button></a>
			<a href="#">
			<button style="background-color: #ffcc00"><b>AGGIUNGI CORSI/APPUNTI</b></button></a>
		</div>
	</body>
</html>
