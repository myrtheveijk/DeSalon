<?php

if (isset($_POST['login-submit'])) {
    require 'db.inc.php';

    $emailusername = mysqli_real_escape_string($conn, $_POST['emailusername']);
    $pwd = mysqli_real_escape_string($conn, $_POST['password']);

    if (empty($emailusername) || empty($pwd)) {
        header("Location: ../login.php?error=emptyfields");
        exit();
    } else {
        $sql = "SELECT * FROM users WHERE username=? OR email=?;";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt,$sql)) {
            header("Location: ../login.php?error=sqlerror");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "ss", $emailusername, $emailusername);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if ($row = mysqli_fetch_assoc($result)) {
                $pwdCheck = password_verify($pwd, $row['password']);
                $test = 1;
                if ($pwdCheck == null) {
                    session_start();
                    $_SESSION['userId'] = $row['id'];
                    $_SESSION['username'] = $row['username'];

                    header("Location: ../home.php?login=success");
                    exit(); 
                } else if($pwdCheck == true) {
                    session_start();
                    $_SESSION['userId'] = $row['id'];
                    $_SESSION['username'] = $row['username'];

                    header("Location: ../home.php?login=success");
                    exit(); 
                } else {
                    header("Location: ../login.php?error=wrongpwd1");
                    exit(); 
                }
            }
        }
    }
}
else {
    header("Location: ../login.php");
    exit();
}