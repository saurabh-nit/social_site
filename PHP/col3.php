
<?php
  $p=0;
   $conn= new mysqli("localhost","root","","mss") or die ("An error has occurred. Please try agin later.");
   $checklogin= "select * from users where Online='1' ";
   $run=$conn->query($checklogin); 	
									
	$count=mysqli_num_rows($run);	
				      
		while($row=mysqli_fetch_array($run, MYSQLI_ASSOC))
		{
				$fname=$row['First_name'];
					$lname=$row['Last_name'];
				$name=$fname.$lname;

				echo ' <div class="sidebar-name">
                		<!-- Pass username and display name to register popup -->
                		<a href="javascript:register_popup(\''.$name.'\',\''.$fname.' '.$lname.'\');">
                    		<img width="30" height="30" src="" />
                    			<span>'.$fname.' '.$lname.'</span>
                		</a>
            			</div>'; 	
		}
		
									
   
?>
