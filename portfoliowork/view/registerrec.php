<?php
include("./connection.php");
include("./header.php");
include("./api-user.php");

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = $_POST['firstname'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $mphone = $_POST['mphone'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if ($password != $confirm_password) {
        echo "<p>Error description: Passwords aren't the same!</p>";
        header('Refresh: 2; URL = ..\register.php');
        die();
    }

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $stmt1 = $conn->prepare("INSERT INTO user(firstname, surname, email, mphone, password) VALUES (?, ?, ?, ?, ?)");
    $stmt1->bind_param("sssss", $firstname, $surname, $email, $mphone, $hashed_password);
    $stmt1->execute();
}
?>