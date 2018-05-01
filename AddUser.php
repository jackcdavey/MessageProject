<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbName = "chatlaw";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbName", $username, $password);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "User Added"; 
}
catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

$sql = "INSERT INTO users (username, password, email, firstname, lastname) ".
    "VALUES ('".$_POST["username"]."','".$_POST["password"]."','".
    $_POST["email"]."','".$_POST["firstName"]."','".$_POST["lastName"]."')";
$conn->exec($sql);


?>