<?php require "components/navigation.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Over</title>
</head>
<body>
    <h1>Over De Salon</h1>

    <div class="container">
        <?php
            require_once 'vendor/fzaninotto/faker/src/autoload.php';
            $faker = Faker\Factory::create();
            echo $faker->realText;
        ?>
    </div>
</body>
</html>