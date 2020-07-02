<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>De Salon</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style/style.css">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="index.php"><img src="images/logo.png" alt="logo" width="150"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav mr-auto">
                    <?php 
                        if (isset($_SESSION['userId'])) {
                            echo '
                            <li class="nav-item active">
                                <a class="nav-link" href="home.php">Afspraken <span class="sr-only">(current)</span></a>
                            </li>

                            <li class="nav-item active">
                                <a class="nav-link" href="home.php">Klantenlijst</a>
                            </li>';
                        }
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="about.php">Over De Salon</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.php">Contact</a>
                    </li>       
                </ul>
                <span class="navbar-text">
                    <ul class="navbar-nav mr-auto">
                        <?php 
                            if (isset($_SESSION['userId'])) {
                                echo '
                                <form action="includes/logout.inc.php" method="post">
                                    <button class="nav-link btn-link" type="submit" name="logout-submit">Uitloggen</button>
                                </form>';
                            } else {
                                echo '
                                <li class="nav-item">
                                    <a class="nav-link" href="signup.php">Registreren</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="login.php">Inloggen</a>
                                </li> ';
                            }
                        ?>            
                    </ul>
                </span>
            </div>
        </nav>
    </header>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>