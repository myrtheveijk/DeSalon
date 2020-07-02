<?php
    require "components/navigation.php";
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta name=viewport content="width=device-width, initial-scale=1">
        <title>Inloggen</title>
    </head>
    <body>
        <h1>Inloggen</h1>

        <div class="container">
            <div class="row justify-content-center">
            <form action="includes/login.inc.php" method="POST">
                <div class="form-group">
                    <label for="emailusername">Gebruikersnaam/E-mail</label>
                    <input class="form-control" type="text" name="emailusername" placeholder="Naam/E-mail">
                </div>
                <div class="form-group">
                    <label for="password">Wachtwoord</label>
                    <input class="form-control" type="password" name="password" placeholder="Wachtwoord">
                </div>
                <div class="form-group">
                    <a href="signup.php?" id="signup-btn" class="btn-link">Nog geen account?</a>
                </div>
                <button class="btn btn-primary" type="submit" name="login-submit">Inloggen</button>
            </form>
            </div>
        </div>
    </body>
</html>