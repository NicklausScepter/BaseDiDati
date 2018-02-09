<?php
require "lib.php";
controllo_accesso();
?>
<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML//EN">
<html>
	<head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<title>aggungi appunti</title>
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

		<br><br><br>
		<?php 
        /*
            error_reporting(E_ALL & ~E_NOTICE); 
            try { 
                $dbconn = connessione() ; 
                echo "<center><table> <tr><th><h4>Data inserimento</h4></th> <th><h4>Autome</h4></th> <th><h4>Data lezione</h4></th> <th><h4>Argomento</h4></th></tr>"; 
                $stat = $dbconn->prepare('select a.data as data_inserimento, a.autore, l.data as data_lezione, l.argomento from appunti a, lezioni l where l.id=a.idlezione order by l.id desc limit 10');
                foreach($stat as $appunto) { 
                    echo "<tr>"; 
                    echo "<td>$appunto[data_inserimento]</td> " ; 
                    echo "<td>$appunto[autore]</td> " ; 
                    echo "<td>$appunto[data_lezione]</td> " ; 
                    echo "<td>$appunto[argomento]</td> " ;
                    echo "</tr>"; 
                } 
                    echo "</table></center>"; 
                } 
            catch (PDOException $e) { echo $e -> getMessage(); } 
            */
        ?>
        
	</body>
</html>
