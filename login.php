<?php 

require "lib.php";
// se c'e' almeno un campo vuoto, si ritorna subito all'index.php
if (empty($_POST['login']) || empty($_POST['password'])) {
  header('Location:index.php?errore=noinput');
} else
try {
  // si controlla la validita' delle credenziali con la funzione definita nel database
  $dbconn = connessione();
  $statement = $dbconn->prepare('select credenziali_valide(?, ?)');
  $statement->execute(array($_POST['login'],$_POST['password']));
  $rec = $statement->fetch();
  // il risultato di creadenziali_valiede e' un booleano postgres, che corrisponde ad 
  // un booleano php
  if ($rec[0]==1) {
    header('Location:home.php');
    session_start();                            // si crea una nuova sessione
    $_SESSION['nome_utente'] = $_POST['login']; // si inserisce il nome utente
  } else {
    header('Location:index.php?errore=invalide');
  }
} catch (PDOException $e) { echo $e->getMessage(); }

?>
