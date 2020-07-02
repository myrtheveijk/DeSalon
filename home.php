<?php
    require "components/navigation.php";

    if (isset($_SESSION['userId'])) {
        echo '
        <div class="container">
                <p class="row justify-content-center login-status mt-4"><i>U bent ingelogd</i></p>
        </div>';
    } else {
        echo '<p class="row justify-content-center login-status">You are currently logged out!</p>';

        header("Location:index.php");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>De Salon ingelogd</title>
</head>
<body>
    <?php   
        require_once 'includes/appointment.inc.php'; 
        require_once 'includes/db.inc.php';
        $result = $conn->query("SELECT * FROM appointments") or die($conn->error);
    ?>
    
    <h1>Welkom kapper <?php echo $_SESSION['username'];?></h1>
    
    <div class="container">
        <div class="row">
            <div class="col-sm">
                <?php require "quickstart.php";?>
            </div>

            <div class="col-sm">
                <?php
                    if (isset($_GET['error'])) {
                        if ($_GET['error'] == "emptyfields") {
                            echo '<p class="error row">Vul alle velden in!</p>';
                        }
                    } else if (isset($_GET['save']) == "succes") {
                        echo '<p class=" succes row">Succesvol opgeslagen!</p>';
                    } else if (isset($_GET['update']) == "succes") {
                        echo '<p class=" succes row">Succesvol bijgewerkt!</p>';
                    }
                ?>

                <div class="row ">
                    <form action="includes/appointment.inc.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">
                        <div class="form-group">
                            <label for="name">Naam</label>
                            <input type="text" name="name" class="form-control" value="<?php echo htmlspecialchars($name); ?>" placeholder="Vul je naam in">
                        </div>
                        <div class="form-group">
                            <label for="date">Datum</label>
                            <input type="date" name="date" class="form-control" value="<?php echo htmlspecialchars($date); ?>" placeholder="Kies een datum">
                        </div>
                        <div class="form-group">
                            <label for="time">Tijd</label>
                            <input type="time" name="time" class="form-control" value="<?php echo htmlspecialchars($time); ?>" placeholder="Kies de tijd">
                        </div>
                        <div class="form-group">
                        <?php if ($update == true): ?>
                            <button type="submit" name="update" class="btn btn-info">Bewerken</button>
                        <?php else: ?>
                            <button type="submit" name="save" class="btn btn-primary">Opslaan</button>
                        <?php endif; ?> 
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <table class="table">
                <thead>
                    <tr>
                        <th>Naam</th>
                        <th>Datum</th>
                        <th>Tijd</th>
                        <th colspan="2">Bewerken/verwijderen</th>
                    </tr>
                </thead>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['name']); ?></td>
                        <td><?php echo htmlspecialchars($row['date']); ?></td>
                        <td><?php echo htmlspecialchars($row['time']); ?></td>
                        <td>
                            <a href="home.php?edit=<?php echo $row['id']; ?>" class="btn btn-info">Bewerken </a>
                            <a href="includes/appointment.inc.php?delete=<?php echo $row['id']; ?>" class="btn btn-danger">Verwijderen</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </table>
        </div>
    </div>

    <?php require"components/footer.php" ?>
</body>
</html>