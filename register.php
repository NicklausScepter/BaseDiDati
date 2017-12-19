<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML//EN">
<html>
	<head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<title>Registrazione al Sito di Appunti</title>
		<link rel="stylesheet" type="text/css" href="styles.css">
	</head>
	<body>
		<!-- Register -->
		<div class="container" style = "background-color: #ffffff">
            
            <?php 
            if ($_GET['errore'] == 'utenteesistente') {
                  echo "<font color=red>Nome utente inserito &egrave; gi&agrave; in uso, riprova con un altro nome utente </font>";
            } elseif ($_GET['errore'] == 'mancainput') {
                  echo "<font color=red>Devi dare un <b><u>username</u></b> e ripetere la password ripetuta due volte!</font>";
            } elseif ($_GET['errore'] == 'passworddiverse') {
                    echo "<font color=red>Le due password non coincidono!";
            }; 
            ?>
            
            <form action="check_registration.php" method="post">
                <p>Per iscriversi &egrave; necessario fornire un <u>Username</u> e una <u>Password</u>.</p>
                <label><b>Username</b></label>
                <input type="text" placeholder="Enter Username" name="uname" required>
                <label><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="psw" required>
                <label><b>Repeat Password</b></label>
                <input type="password" placeholder="Enter Password" name="rpsw" required>
                <button type="submit" value="iscrivimi">Register</button>
            </form>
		</div>
        
	</body>
</html>

