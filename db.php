<?php
// Form Validation

	   $name = $_POST["name"];

	   $email = $_POST["email"];
  
	   $pass = $_POST["pass"];
   
	   $mob = $_POST["mob"];

      $add = $_POST["add"];



//Database Connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sql_traning";

// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO tuser (Name, Email_id,Password,Address,Phone)
VALUES ('$name', '$email', '$pass','$add','$mob');";
if ($conn->multi_query($sql) === TRUE) {
    echo "New records created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>