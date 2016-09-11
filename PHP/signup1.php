

<h3 class="text-center" style="margin-top:0px"><span style="color:#000"> Registration for new users</span></h3>	

<form name="frmHome" id="frmHome" class="form-group" action="" method="post"  enctype="multipart/form-data"> 
							<table class="table borderless" style="border:none;">
          
                		<tr>				
    					 		<td colspan="2"><input type="text" class="form-control" placeholder="Email ID" id="eid" name="emailid" ></td>
							<td colspan="2"><input type="text" class="form-control" placeholder="Username example - mizan" id="username" name="username" ></td>
                    		</tr>
                    		<tr class="text-danger h5 text-center">
                    			<td colspan="2" id="eeid"></td><td colspan="2" id="eusername"> </td>
                    		</tr>
                    		
                    		<tr  >
                     			<td colspan="2"><input type="text" class="form-control " placeholder="First Name" id="rname" name="user"></td>
                       			<td colspan="2"><input type="text" class="form-control " placeholder="Last Name" id="rlname" name="userlast"></td>
                        	</tr>
                            <tr class="text-danger h5 text-center">
                    			<td colspan="2" id="ername"></td><td colspan="2" id="erlname"></td>
                    		</tr>
                            <tr>
                     			<td colspan="2"><input type="text" class="form-control " placeholder="Mobile Number" id="Mno" name="Mno"></td>
					 <td colspan="2">Male&nbsp;&nbsp;&nbsp;<input type="radio" id="MALE" name="gender" value="MALE">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        Female&nbsp;&nbsp;&nbsp;<input type="radio" name="gender" id="FEMALE" value="FEMALE"></td>
                       			
                        	</tr>
                            <tr class="text-danger h5 text-center">
                    			<td  id="eMno" colspan="2"></td><td colspan="2" id="errorgender"></td>
                    		</tr>	
                         	<tr>
                     			<td colspan="2"><input type="password" class="form-control " placeholder="Password" name="pass" id="pass"></td>
                       			<td colspan="2"><input type="password" class="form-control " placeholder="Confirm Your Password" id="cpass"></td>
                        	</tr>
                    		<tr class="text-danger h5 text-center"><td colspan="4" align="center" id="epass"></td></tr>
                        	<tr>
                                <td>Date Of Birth</td>
                               
                                
                                
                    				<td colspan="3"><input type="date" class="form-control input-lg" id="dob" name="DOB"></td>
                    			</tr><tr class="text-danger h5 text-center">
                    			<td  id="edob" colspan="4"></td>
                    		</tr>
                               

	 <tr class="text-center">
                                		<td></td>
	<td ><input class="btn btn-block" style="background-color:#000; color:#fff;" type="submit" value="Sign-up" name="signin" id="signin"></td>
</tr>	
</table>              
</form>
<?php 
  
  if(isset($_POST["signin"]))
{
	$conn= new mysqli("localhost","root","","mss") or die ("An error has occurred. Please try again later.");
	$FirstName=$_POST["user"];
	$LastName=$_POST["userlast"];
	$Email=$_POST["emailid"];
	$Password=$_POST["pass"];
	$DOB=$_POST["DOB"];
	$Mobile=$_POST["Mno"];
	$Gender=$_POST["gender"];
	$UserName=$_POST["username"];
   
	echo $FirstName.$LastName.$Email.$Password.$DOB.$Mobile.$Gender;
	$query="Select Regid from users where Regid like 'FB%' order by Regid desc limit 1";
			$result=$conn->query($query);
			
			$id="";
			if($result->num_rows==0)
			{
				
				$id="FB-"."000001";
			}
			else
			{
				$row=$result->fetch_row();	
				$temp= substr($row[0],3)+1;
				$id="FB-".str_repeat("0",6-strlen($temp)).$temp;		
		
			}
	$checkemail= "select * from users where Email_id='$Email'";
	$run = $conn->query($checkemail);	
	if(mysqli_num_rows($run)>0){
		echo '<div class="alert alert-danger text-center">Email already exists please try another</div>';
	}
	else{
		$q="insert into users (Regid,First_name,Last_name,Email_id,Password,DOB,mobile,Gender,username) 
		values ('$id','$FirstName','$LastName','$Email','$Password','$DOB','$Mobile','$Gender','$UserName')";
		echo '<div class="alert alert-success text-center">Congratulations! Successfully Data Submitted</div>';

	$conn->query($q);
	if($conn->affected_rows==1)
	{
		 echo "";
	}
	else
	{
		echo "unsuccessfull";
		echo $conn->errno;
	}
	}
	  
}

  ?>