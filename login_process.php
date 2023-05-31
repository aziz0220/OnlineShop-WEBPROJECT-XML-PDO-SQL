<?php
session_start();
include "config.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $sql = "SELECT * FROM users WHERE User_Name = :username AND Password = :password";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password);
    $stmt->execute();

    if ($stmt->rowCount() == 1) {
        $_SESSION["username"] = $username;
        header("Location: dashboard.php"); 
        exit();
    } else {
        header("Location: signin.php?error=invalid_credentials"); 
        exit();
    }
}
$conn = null;
?>
