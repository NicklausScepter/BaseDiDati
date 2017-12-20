<?php
error_reporting(E_ALL & ~E_NOTICE);

function controllo_accesso(){
    session_start();
    if (empty($_SESSION['user'])) {
        header('Location:index.php');
    }
}

function connessione() {
    $dbconn = new PDO('pgsql:host=dblab.dsi.unive.it;port=5432;dbname=a2016u23','a2016u23','nAcOCg0D');
    $dbconn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $dbconn;
}

?>