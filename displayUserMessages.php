<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbName = "chatlog";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbName", $username, $password);

    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //get username and lookup userID
    $sql = "SELECT userID FROM users WHERE username = '" . $_POST["username"] . "'";
    
    $statement = $conn -> query( $sql );

    $row = $statement->fetch();
    $userID = $row["userID"];
    
    $sql = "SELECT messageID FROM messageRecipients WHERE toUserID = " . $userID;
    
    $statement = $conn -> query( $sql );
    
    //now we need to loop over all message ids and look up the message details
    foreach($statement as $row) {
        //create sql to lookup message details
        $messSQL = "SELECT * FROM messages WHERE messageID = " . $row["messageID"];
        $messStatement = $conn -> query( $messSQL );
        
        //grab first row of results from message detail query
        $messRow = $messStatement -> fetch();
        
        //output message details with a bit of HTML to format the results
        echo "Message from " . $messRow["fromUserID"] . "<br>" .
                "Subject: " . $messRow["subject"] . "<br>" . 
                "Body: " . $messRow["body"] . "<br><br>";
        
    }
    

}
catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

?>