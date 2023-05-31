<?php
$xml = simplexml_load_file('config.xml');
$servername = $xml->servername;
$username = $xml->username;
$password = $xml->password;
$dbname = $xml->dbname;

try {
    $dsn = "mysql:host=$servername;dbname=$dbname";
    $conn = new PDO($dsn, $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error occurred when trying to connect to the database: " . $e->getMessage());
}
?>
