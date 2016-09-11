<?php	
   if(isset($_FILES['profilepic']))
   {
	if(((@$_FILES["profilepic"]["type"]="image/jpeg") || (@$_FILES["profilepic"]["type"]=="image/png") || (@$_FILES["profilepic"]["type"]=="image/gif")) && (@$_FILES["profilepic"]["size"]<1048576))
	{
		$chars= "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
		$rand_dir_name= substr(str_shuffle($chars),0,15);
		mkdir("../USERDATA/PROFILE_PHOTO/$rand_dir_name");
		$profile_pic_name=$_FILES["profilepic"]["name"];
		if(file_exists("../USERDATA/PROFILE_PHOTO/$rand_dir_name/".@$_FILES["profilepic"]["name"]))
		{
			@$_FILES["profilepic"]["name"]." Already exists";
		}
		else
		{
			move_uploaded_file(@$_FILES["profilepic"]["tmp_name"],"../USERDATA/PROFILE_PHOTO/$rand_dir_name/".$_FILES["profilepic"]["name"]);
			echo "uploaded and stored";
			$profile_pic_query = $conn->query("UPDATE users SET profilepic='$rand_dir_name/$profile_pic_name' WHERE username='$user'");
			$post_pic_query = $conn->query("INSERT INTO posts VALUES ('','updateprofile',NOW(),'$user','$username','$rand_dir_name/$profile_pic_name')");
			echo '<META HTTP-EQUIV="Refresh" Content="0; URL='.$username.'">';
		}	
	}
	else
	{
		echo "Invalid File! your image must be no larger then 1MB and it must be either a .jpg, .jpeg, .png or .gif";
	}
   }
