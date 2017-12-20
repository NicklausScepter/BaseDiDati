<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML//EN">

<html>
    
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
        <title>Sito di Appunti</title>
        <link rel="stylesheet" type="text/css" href="cssstyles.css">
    </head>
    
    <body>

		<div class="container" style = "background-color: #ffffff">
            <center><h1><b>SITO_APPUNTI</b></h1></center>
            
            <!-- stampa gli eventuali messaggi di errore, se necessari -->
            <?php  if ($_GET['errore'] == 'invalide') {
                echo "<p><font color=red>Le credenziali che hai fornito non sono valide!</font></p>";
            } elseif ($_GET['errore'] == 'noinput') {
                echo "<p><font color=red>manca username o/e password!</font></p>";
            }
            ?>
            
            <!-- login -->
            <form action="login.php" method="post">
                <label><b>Username</b></label>
                <input type="text" placeholder="Enter Username" name="uname">

                <label><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="pwd">

                <button type="submit"><b>Login</b></button>
            </form>
            
            <!-- Register -->
            <p><b>Se non sei registrato fallo adesso:</b></p>
			<a href="register.php"><button style="background-color: #ffcc00"><b>Register</b></button></a>
            
		</div>
        
    </body>
    
</html>
