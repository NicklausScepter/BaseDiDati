<?php 

require "lib.php";
$corso = $_GET['corso'];
// se c'e' almeno un campo vuoto, si ritorna subito all'index.php
if (empty($_POST['data']) || empty($_POST['argomento'])) {
    header('Location:pagina_corso.php?errore=noinput&corso='.$corso);
} else
try {
  // si controlla la validita' delle credenziali con la funzione definita nel database
    $dbconn = connessione();
    $statement = $dbconn->prepare('select nuova_lezione(?,?,?)');
    $statement->execute(array($_GET['corso'],$_POST['data'],$_POST['argomento']));
    header('Location:pagina_corso.php?corso='.$corso);
  
} catch (PDOException $e) { echo $e->getMessage(); }

?>
