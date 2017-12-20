<?php
require "lib.php";

if (empty($_POST['uname']) || empty($_POST['psw']) || empty($_POST['rpsw'])) {
    header('Location:register.php?errore=mancainput');
} elseif($_POST['psw']!=$_POST['rpsw']){
    header('Location:register.php?errore=passworddiverse');
} else
try{  
      $dbconn = connessione();
      $statement = $dbconn->prepare('select count(*) from utenti where username = ?');
      $statement->execute(array($_POST['uname']));
      $rec = $statement->fetch();
      if ($rec[0] == 1) {
          header('Location:register.php?errore=utenteesistente');
      } else {
          session_start();
          $_SESSION['user'] = $_POST['uname'];
          $stat = $dbconn->prepare('select nuovo_utente(?,?)');
          $stat->execute(array($_POST['uname'],$_POST['psw']));
          header('Location:Home.php');
      }
} catch (PDOException $e) { echo $e->getMessage(); }
?>