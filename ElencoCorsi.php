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
			<li id="logout"><a href="index.php">Logout</a></li>
		</ul>
        
		<div class="container" style = "background-color: #ffffff">
            <?php
            try{
                $dbconn = connessione();
                $corsi = $dbconn->prepare('lista_corsi');
                foreach ($corsi as $corso){
                    echo "<a href='#'>
			<button style='background-color: #ffcc00'><b>$corso</b></button></a>";
                }
            }
            catch(PDOException $e) { echo $e->getMessage();}
            ?>
		
		</div>
	</body>
</html>
