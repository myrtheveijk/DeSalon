<?php
    require "components/navigation.php";
?>

    <main>
        <div class="container">
            <h1>Registreren</h1>

            <?php
            if (isset($_GET['error'])) {
                if ($_GET['error'] == "emptyfields") {
                    echo '<p class="signuperror">Vul alle velden in!</p>';
                }
                else if ($_GET['error'] == "invaliduidmail") {
                    echo '<p class="signuperror">Ongeldige gebruikersnaam en email!</p>';
                }
                else if ($_GET['error'] == "invaliduid") {
                    echo '<p class="signuperror">Ongeldige gebruikersnaam!</p>';
                }
                else if ($_GET['error'] == "invaliduidmail") {
                    echo '<p class="signuperror">ongeldige email!</p>';
                }
                else if ($_GET['error'] == "passwordcheck") {
                    echo '<p class="signuperror">Wachtwoorden komen niet overeen!</p>';
                }
                else if ($_GET['error'] == "usertaken") {
                    echo '<p class="signuperror">Gebruikersnaam bestaat al!</p>';
                }
            }
            else if (isset($_GET['signup']) == "succes") {
                    echo '<p class="signupsuccess">Succesvol aangemeld!</p>';
            }
            ?>
            
            <div class="row justify-content-center">
                <form action="includes/signup.inc.php" method="POST">
                    <div class="form-group">
                        <label for="username">Gebruikersnaam</label>
                        <input type="text" name="username" class="form-control" placeholder="Gebruikersnaam">
                    </div>
                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input type="text" name="email" class="form-control" placeholder="E-mail">
                    </div>
                    <div class="form-group">
                        <label for="password">Wachtwoord</label>
                        <input type="password" name="password" class="form-control" placeholder="Wachtwoord">
                    </div>
                    <div class="form-group">
                        <label for="passwordrepeat">Herhaal wachtwoord</label>
                        <input type="password" name="password-repeat" class="form-control" placeholder="Herhaal wachtwoord">
                    </div>

                    <button type="submit" name="signup-submit" class="btn btn-primary">Aanmelden</button>
                </form>
            </div>
        </div>
    </main>