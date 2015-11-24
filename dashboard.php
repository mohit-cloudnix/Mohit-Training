<!DOCTYPE html>
<html>
		<head>
			<title> Dashbord </title>
			<!-- Tab Icon --><link rel="shortcut icon" href="code.ico"/>
<!-- All Bootstrap file  -->          <link rel="stylesheet" href="bootstrap-3.3.5-dist\css\bootstrap.min.css"/>
<!-- Jquery File -->             <script src="bootstrap-3.3.5-dist\js\jquery.js"></script>
<!-- Bootstrap JS File -->      <script src="bootstrap-3.3.5-dist\js\bootstrap.min.js"></script>
		</head>
		<body>
		
		<!--  Navigation Bar  -->
			 <nav class="navbar navbar-inverse" id="my_nav">
					<div class="container">
						<div class="navbar-header">
							<a href="" class="navbar-brand">CS53</a>
						</div>
							<ul class="nav navbar-nav pull-right">
							  <li class="active ">
							 <?php
						//	 print_r($_SESSION);
							// if($_SESSION['name'] != NULL){
								$user_id = $_SESSION['user_id'];
							echo "<a href='valid.php?mod=show_wall&user_id=$user_id'>Welcome ".$_SESSION['name']."</a>";
							// } else {
							//echo "<a href='#'>Welcome ".$var2."</a>";
							// }
							 ?>
							  </li>
							  <li>
							  <form method="Post" action="php_task.html">
							  <button type="submit" class="btn btn-danger navbar-btn">Sign Out</button>
							  </form>
							  </li>
							</ul>
					</div>
				</nav> 
				
				<!--  Jumbotron -->
				<div class="jumbotron">
					<div class="container">
						<div class="row">
                                    <!-- Friend List -->
                                    <div class="col-sm-4 col-md-4" > 
									<h3> Friend List </h3>
										<?php 
											include('friend.php');
									?>
									</div>
									<!-- Wall -->
									<div class="col-sm-8 col-md-8" > 
									<h1> Wall </h1>
									
							<form method="Post" action="valid.php?mod=save_wall&user_id=<?php echo $_SESSION['user_id']; ?>">
									<textarea  name = "text"class="form-control" rows="5" id="comment" style = "resize: none"></textarea>
									
									<button type="submit" name = "post"class="btn btn-primary pull-right ">Post</button>
								</form>
									</div>
						</div>
				</div> 
				</div>
				
				<!-- Post -->
				<div class="container">
				<?php
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
										if(isset($_GET["user_id"])){
										$p = $_GET["user_id"];
										} else {
											$p = $_SESSION["user_id"];
										}
										//echo $p;
										//exit;
										
										$sql = "SELECT * FROM twall WHERE user_id='$p' ORDER BY posting_date DESC";
										
										
											$result = $conn->query($sql);
											//print_r($result);
										if ($result->num_rows > 0) {
											// output data of each row
											//print_r($row["post"]);
											$count = 0;
											while($row = $result->fetch_assoc()) {
												if($row["post"] != null){
													echo "Date: ".$row["posting_date"]." -> ".$row["post"]."<br/>";
													$count++;
												}
												
											//	$_SESSION['user_id'] = $row["User_id"];
											}
											
											if($count == 0)
												echo "No Post<br/>";
										} 
					?>
				</div>
				
				
		</body>

</html>

