<?php
//See original: https://www.w3schools.com/php/php_mysql_connect.asp
$servername = "localhost";
$username = "root";
$password = "";
$dbName = "chatlog";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbName", $username, $password);

    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT userID FROM users WHERE username ='" . $_POST["user"]."'";

    //echo $sql;

    $statement = $conn -> query($sql);

    echo $statement -> rowCount();

    $userID = -1;
    foreach($statement as $row){
    	$userID = $row["userID"];
    	break;
    }
    $sql = "SELECT messageID FROM messageRecipients WHERE toUserID = " . $userID;
    $statement = $conn -> query($sql);

    foreach($statement as $row){
    	
    }
}
catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
