<?php 
	$post = $_POST['text'];
	$id = $_GET['user_id'];
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

/* $sql = "INSERT INTO tuser (Name, Email_id,Password,Address,Phone)
VALUES ('$name', '$email', '$pass','$add','$mob');"; */
$sql ="UPDATE twall SET post = '$post' WHERE user_id = '$id';";
if ($conn->multi_query($sql) === TRUE) {
    echo "<script type='text/javascript'>alert('Post Save Succesfully');</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
include('valid.php?mod=show_wall&user_id=$user_id');
?>