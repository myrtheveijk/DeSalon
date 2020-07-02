<?php   

require 'db.inc.php';

$id = 0;
$update = false;
$name = '';
$date = '';
$time = '';

if (isset($_POST['save'])) {

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $date = mysqli_real_escape_string($conn, $_POST['date']);
    $time = mysqli_real_escape_string($conn, $_POST['time']);

    if(empty($name) || empty($date) || empty($time)) {
        header("Location: ../home.php?error=emptyfields");
        exit();
    }
    else {
        $conn->query("INSERT INTO appointments (name, date, time) VALUES('$name', '$date', '$time')") or 
            die($conn->error);
    
        header("location: ../home.php?save=succes");
        exit();
    }

}

if (isset($_GET['delete'])) {

    $id = $_GET['delete'];
    $conn->query("DELETE FROM appointments WHERE id=$id") or die($conn->error);

    header("location: ../home.php");
}

if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $update = true;
    $result = $conn->query("SELECT * FROM appointments WHERE id=$id") or die($conn->error);
    $arrayValues = array( $result );
    if (count($arrayValues) == 1) {
        $row = $result->fetch_array();
        $name = $row['name'];
        $date = $row['date'];
        $time = $row['time'];
    }   
}

if (isset($_POST['update'])) {
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $date = mysqli_real_escape_string($conn, $_POST['date']);
    $time = mysqli_real_escape_string($conn, $_POST['time']);

    if(empty($name) || empty($date) || empty($time)) {
        header("Location: ../home.php?error=emptyfields");
        exit();
    }
    else {
        $conn->query("UPDATE appointments SET name='$name', date='$date', time='$time' WHERE id=$id") or
            die($conn->error);
    
        header("location: ../home.php?update=succes");
        exit();
    }

}