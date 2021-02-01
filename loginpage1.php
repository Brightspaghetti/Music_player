<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "employee";

$user=$_POST["user"];
$pass=$_POST["pass"];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO users (user,pass)
VALUES ('$user', '$pass')";

if ($conn->query($sql) === TRUE)
 {
    //alert('success');
    echo "New record created successfully";
    header('Location: http://localhost/phpfiles/projectfiles/templateupdate.html');
   
} 
else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$sql = "SELECT user, pass FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
	
    while($row = $result->fetch_assoc()) {
        echo "user: " . $row["user"]. " - pass: " . $row["pass"];
    }
} else {
    echo "0 results";
}

$conn->close();

?>
