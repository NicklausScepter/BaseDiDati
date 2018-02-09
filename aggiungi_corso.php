<?php 

require "lib.php";
// se c'e' almeno un campo vuoto, si ritorna subito all'index.php
if (empty($_POST['nome']) || empty($_POST['descrizione'])) {
  header('Location:ElencoCorsi.php?errore=noinput');
} else
try {
  // si controlla la validita' delle credenziali con la funzione definita nel database
  $dbconn = connessione();
  $statement = $dbconn->prepare('select nome_corso_valido(?)');
  $statement->execute(array($_POST['nome']));
  $rec = $statement->fetch();
  // il risultato di creadenziali_valiede e' un booleano postgres, che corrisponde ad 
  // un booleano php
  if ($rec[0]==1) {
    $statement = $dbconn->prepare('select nuovo_corso(?,?)');
      $statement->execute(array($_POST['nome'],$_POST['descrizione']));
    header('Location:ElencoCorsi.php');
  } else {
    header('Location:ElencoCorsi.php?errore=invalide');
  }
} catch (PDOException $e) { echo $e->getMessage(); }

?>
