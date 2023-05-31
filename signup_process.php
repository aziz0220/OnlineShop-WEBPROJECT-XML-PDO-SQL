<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Creation</title>
    

</head>
<body style="background-color:#210440; color:white;font-weight:500;">
<?php
include "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $address = $_POST['address'];

    $sql = "SELECT * FROM users WHERE User_Name = :name";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':name', $name);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        echo "Username already taken, try another one..";
    } else {
        $sql = "INSERT INTO users (User_Name, Email, Password, Adress) VALUES (:name, :email, :password, :address)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':address', $address);
        
        if ($stmt->execute()) {
            echo "Account added successfully, go back to the login page to connect to your account.";
        } else {
            echo "Error occurred while trying to sign up, reload your browser or check your internet connection. " . $stmt->errorInfo()[2];
        }
    }
}
$conn = null;
?>

</body>
</html>