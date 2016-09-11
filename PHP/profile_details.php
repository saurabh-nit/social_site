
<?php
			
			$pemail=$_SESSION['lemail'];
			include("connection.php");
			
		    $checklogin= "select * from users where Email_id='$pemail' ";
   			$run=$conn->query($checklogin); 	
			$row=mysqli_fetch_array($run, MYSQLI_ASSOC);
  			$pfname=$row['First_name'];
			$plname=$row['Last_name'];
			$pDOB=$row['DOB'];
			$pmobile=$row['mobile'];
						
											
			
		?>
<?php
if(isset($_GET['u']))
{
		$username=$_GET['u'];
		include("connection.php");
		$check=$conn->query("Select * From users where username='$username'");
		if(mysqli_num_rows($check)==1){
			$row=mysqli_fetch_array($check, MYSQLI_ASSOC);
  			$pfname=$row['First_name'];
			$plname=$row['Last_name'];
			$pDOB=$row['DOB'];
			$pmobile=$row['mobile'];
			$pemail=$row['Email_id'];
		 }
		else
		{
			
			echo "<meta http-equiv=\"refresh\" content=\"0; url=http://localhost/Mypro/php/profile.php\">";
		}
}
?>
<?php include("getprofilepic.php");?>
<div class="panel panel-default">
                	<div class="panel-body">
                  			
            			  		<img src="<?php echo $profile_pic;?>"	 alt="" height="250px" width="200px" class="img-thumbnail img-responsive">
            				   <br><?php
						if($_SESSION['lemail']==$pemail)
						 {
					?>
						<form action ="<?php echo $username;?>" method="POST" enctype="multipart/form-data">
							<input type="file" name="profilepic"/>
							<input type="submit" name="uploadpic" value="Upload Image">
						</form>
						
					<?php
						include("addprofilepic.php");
						 } 
						else 
						 include("sendfriendrequest.php"); ?>         
                    		<div class="col-sm-12">
                            	<h2><?php echo $pfname.' '.$plname;?></h2>
                          
                            	
                            	<p><strong>DOB: </strong> <?php echo $pDOB;?> </p>
                            	<p><strong>Contact No: </strong> <?php echo $pmobile;?> </p>
                            	<p><strong>E-mail: </strong> <?php echo $pemail;?> </p>
                            	<p><strong>DOB: </strong> <?php echo $pDOB;?> </p>
                            	<p><strong>Contact No: </strong> <?php echo $pmobile;?> </p>
                            	<p><strong>E-mail: </strong> <?php echo $pemail;?> </p>

                     		</div>


                     </div><!--Panel Body-->
</div><!--Panel-->  