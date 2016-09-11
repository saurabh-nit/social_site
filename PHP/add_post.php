<!-- this page is for adding content and images on time line-->
<?php
   if(isset($_POST["post"]))
   {	
	$postcontent=$_POST['postcontent'];

	if(("" == trim($_POST['postcontent']))&&(empty($_FILES['postpic']['name'])))
	{
		echo "please post something";	
		
	}
	else if(($postcontent) && (empty($_FILES['postpic']['name'])))
	{
		echo "image no	 content yes";
		$postquery= $conn->query("INSERT INTO posts VALUES ('','$postcontent',NOW(),'$user','$username','')");
		
   	}
	else
	{
		if(((@$_FILES["postpic"]["type"]="image/jpeg") || (@$_FILES["postpic"]["type"]=="image/png") || (@$_FILES["postpic"]["type"]=="image/gif")) && (@$_FILES["postpic"]["size"]<1048576))
		{
			
			$chars= "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
			$rand_dir_name= substr(str_shuffle($chars),0,15);
			mkdir("../USERDATA/PROFILE_PHOTO/$rand_dir_name");
			$post_pic_name=$_FILES["postpic"]["name"];
			if(file_exists("../USERDATA/PROFILE_PHOTO/$rand_dir_name/".@$_FILES["postpic"]["name"]))
			{
				@$_FILES["profilepic"]["name"]." Already exists";
			}
			else
			{
			
				move_uploaded_file(@$_FILES["postpic"]["tmp_name"],"../USERDATA/PROFILE_PHOTO/$rand_dir_name/".$_FILES["postpic"]["name"]);

				$post_pic_query = $conn->query("INSERT INTO posts VALUES ('','$postcontent',NOW(),'$user','$username','$rand_dir_name/$post_pic_name')");
				echo "uploaded and stored";
			}	
		}
		else
		{
			echo "Invalid File! your image must be no larger then 1MB and it must be either a .jpg, .jpeg, .png or .gif";
		}
	}
   }
?>