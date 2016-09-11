<?php
   
		
   $check_pic= $conn->query("SELECT profilepic FROM users WHERE username='$username'");
   $get_pic_row= mysqli_fetch_array($check_pic,MYSQLI_ASSOC);
   $profile_pic_db=$get_pic_row["profilepic"];
   if($profile_pic_db=="")
   {
	$profile_pic="../IMAGES/default.png";
   }
   else
   {
	$profile_pic="../USERDATA/PROFILE_PHOTO/".$profile_pic_db;
   }
?>