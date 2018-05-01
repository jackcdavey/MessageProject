<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbName = "chatlog";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbName", $username, $password);

    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "Connected successfully"; 
}
catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

$sql = "INSERT INTO users (username, password, email, firstname, lastname);
	VALUES ('".$_POST["username"]."','".$_POST["password"]."','".$_POST["email"]."','".$_POST["firstName"]"','".$_POST["lastName"]."');
// use exec() because no results are returned
$conn->exec($sql);

?>

 