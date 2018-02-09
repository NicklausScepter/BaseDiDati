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
		<ul id="navbar">	
            <li><a href="Home.php">HOME</a></li>
            <li><a href="ElencoCorsi.php">Corsi</a></li>
            <li><a href="#">Ricerca</a></li>
			<li id="logout"><a href="index.php">Logout</a></li>
		</ul>
        
		<div class="container" style = "background-color: #ffffff">
            <?php
                try{
                    $dbconn = connessione() ; 
                    $stat = $dbconn->prepare('select * from corsi order by corsi.nome');
                    $stat->execute(); 
                    foreach($stat as $corso) { 
                        echo"<a href='pagina_corso.php?corso=$corso[nome]'><button style='background-color: green'><b>$corso[nome]</b></button></a>";
                    }
            }
                catch(PDOException $e) { echo $e->getMessage();}
            ?>
            <hr>
            <h3>Inserimento di un nuovo corso</h3>
            <!-- stampa gli eventuali messaggi di errore, se necessari -->
            <?php  
                if ($_GET['errore'] == 'invalide') {
                    echo "<p><font color=red> Questo corso esiste già !</font></p>";
                } elseif ($_GET['errore'] == 'noinput') {
                    echo "<p><font color=red>manca nome corso o/e descrizione!</font></p>";
                }
            ?>
            <form action="aggiungi_corso.php" method="post">
                <input type="text" placeholder="Inserisci il nome del corso" name="nome">
                <input type="text" placeholder="Inserisci una descrizione del corso" name="descrizione">
                <button type="submit" style="background-color: yellow; color: black;"><b>Aggiungi Corso</b></button>
            </form>
		</div>
	</body>
</html>