<?php 
	session_start(); //starting the session for user profile page
	
	/*  ################   Post Function() ###############################	*/
			function post( $post,$id){
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
											
											if($post == null){
												  echo "<script type='text/javascript'>alert('Post Is Null');</script>";
												  include('dashboard.php');
												  exit;
											}
										/* $sql = "INSERT INTO tuser (Name, Email_id,Password,Address,Phone)
										VALUES ('$name', '$email', '$pass','$add','$mob');"; */
										$sql ="INSERT INTO twall(user_id,post) VALUES ('$id','$post') ;";
										if ($conn->multi_query($sql) === TRUE) {
											echo "<script type='text/javascript'>alert('Post Save Succesfully');</script>";
										} else {
											echo "Error: " . $sql . "<br>" . $conn->error;
										}

										$conn->close();
										//include('valid.php?mod=show_wall&user_id=$user_id');
																					}
   /* ################### Function  Singin  #############################*/
function SignIn() {
	//Database Connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sql_traning";

// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

 $use = $_POST["username"];
$pass = $_POST["password"];

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 



	if(!empty($_POST["username"])) //checking the 'user' name which is from Sign-In.html, is it empty or have some text
		{ 
		$sql ="SELECT * FROM  tuser WHERE  Email_id = '$use'  AND `Password` ='$pass' ";

	$result = $conn->query($sql);
	//print_r($result);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $_SESSION['name'] = $row["Name"];
		$_SESSION['email'] = $row["Email_id"];
	//	echo $row["User_id"]."<br/>";
		$_SESSION['user_id'] = $row["User_id"];
		
    }
} else {
    echo "<script type='text/javascript'>alert('WRONG PASSWORD');</script>";
	include('php_task.html');
	exit;
}

$conn->close();

		} 
		
}
		if(isset($_POST["submit"]))
		{ 
		SignIn(); 
		}

/* function showWall($email_id) {
	
	return $wall_arr;
} */
		
	if ( count($_GET) != 0 ) {
		if ( $_GET['mod'] == 'show_wall' ) {
	    //$_SESSION['user_id']=$_GET['user_id'];
		}
	}
	
	if( isset($_GET['mod'] ) && ($_GET['mod']== 'save_wall')){
		post($_POST["text"],$_GET["user_id"]);
		
	} 
	
	include('dashboard.php');
?> 