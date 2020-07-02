<?php require "components/navigation.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
</head>
<body>
    <h1>Contact</h1>

    <div class="container">
        <?php
            require_once 'vendor/fzaninotto/faker/src/autoload.php';
            $faker = Faker\Factory::create();
        ?>
        <ul>
            <li>De Salon</li>
            <li><?php echo $faker->name; ?></li>
            <li><?php echo $faker->phoneNumber; ?></li>
            <li><?php echo $faker->address; ?></li>
            <li><?php echo $faker->countryCode; ?></li>
        </ul>
    </div>
</body>
</html>