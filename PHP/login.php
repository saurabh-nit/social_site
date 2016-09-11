<?php
  if(isset($_POST["lemail"]))
							{
								$conn= new mysqli("localhost","root","","mss") or die ("An error has occurred. Please try agin later.");
								$Email=$_POST["lemail"];
								$Pass=$_POST["lpass"];
								$checklogin= "select * from users where Email_id='$Email' AND Password='$Pass'";
								$run = $conn->query($checklogin);
								echo $Email.$Pass;
								if($run->num_rows>0)
								{
									    $_SESSION['lemail']=$Email;
									   header("Location:PHP/index.php");
								}
								else
								{
										echo '<div class="alert alert-danger">Email or Password Invalid.</div>';
								}
							}

  ?>