	<?php 
		
											//Database Connection
												$servername = "localhost";
												$username = "root";
												$password = "";
												$dbname = "sql_traning";
						
											//Create Connection
												$conn = new mysqli($servername,$username,$password,$dbname);
		
												if($conn->connect_error){
													die("Connection failed: ".$conn->connect_error);

												}
										$var2 = $_SESSION['name'];
										$var =  $_SESSION['email'];
										$sql = "SELECT * FROM tuser WHERE Email_id <>'$var'";
										$result = $conn->query($sql);

										if($result->num_rows > 0){
											while($row = $result->fetch_assoc() ){
//													print_r($row);
												$user_id=$row['User_id'];
												$name=$row['Name'];
//												echo $user_id.'-'.$name.'<br>';
												echo "<a href='valid.php?mod=show_wall&user_id=$user_id'>$name</a><br/>" ;
											}
										}
							

							?>