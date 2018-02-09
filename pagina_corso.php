<?php
require "lib.php";
controllo_accesso();
?>
<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML//EN">
<html>
	<head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<title><?php echo $_GET['corso']; ?></title>
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
            error_reporting(E_ALL & ~E_NOTICE); 
            try { 
                $dbconn = connessione() ; 
                /* si salva il nome del corso nella sessione, per permettere di riconoscere il corso nello script chiamato*/ 
                $_SESSION['corso'] = $_GET['corso'];
                $stat = $dbconn->prepare('select corsi.descrizione_corso from corsi where corsi.nome = ? '); 
                $stat->execute(array($_GET['corso']));
                echo "<center><h2>";
                echo $_GET['corso'];
                echo "</h2></center>";
                echo "<center><table><tr><th colspan='2'>Descrizione Corso</th></tr><tr><td colspan='2'>";
                foreach($stat as $descrizione){
                    echo "$descrizione[0]";
                }
                echo "</td></tr><tr><th>DATA LEZIONE</th> <th>ARGOMENTO</th></tr> ";
                $stat = $dbconn->prepare('select * from lezioni where corso = ? order by data'); 
                $stat->execute(array($_GET['corso'])); 
                foreach($stat as $lezione) { 
                    echo "<tr>"; 
                    echo "<td><a href=\"appunti.php?idlezione=$lezione[id] \"><center>$lezione[data] </center></a></td> " ; 
                    echo "<td>$lezione[argomento]</td> " ; 
                    echo "</tr>"; 
                }
                    echo "</table></center>"; 
                }
            catch (PDOException $e) { echo $e -> getMessage(); } 
        ?>
        <div class="nuovalezione" style="background-color: #ffffff">
            <?php
            $corso = $_GET['corso'];
            if ($_GET['errore'] == 'noinput') {
                echo "<p><font color=red>manca la data della lezione o/e argomento!</font></p>";
            }
            
            echo "
                <form action='aggiungi_lezione.php?corso=";echo $corso; echo "' method='post'>
                    Scegli una data: <input name='data' type='date'>
                    <input type='text' placeholder='Argomento della lezione' name='argomento'>
                    <button type='submit' style='background-color:  yellow; color: black;'><b>Aggiungi Lezione</b></button>
                </form>
                ";
            ?>
        </div>
        
	</body>
</html>
