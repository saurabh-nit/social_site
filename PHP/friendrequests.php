
<div style="margin-top:200px">
<div style="col-md-3">
</div>
<div style="col-md-6">
<?php
 session_start();
$menu='Y';
$page_name="";
include("header2.php");
$user_from="";
$user_to="";
 echo '<h1 style="color:black;" align="center"> Friend Requests </h1>';
 echo '<div  style="margin:0 auto; width:50%; border-radius:20px; border:5px solid black;">';
$findrequests= $conn->query("SELECT * FROM friend_requests WHERE userto ='$user'");
$numrows= mysqli_num_rows($findrequests);
if($numrows==0)
{
	echo "<h1 style='color:black'>You have no friend requests</h1>";
}
else
{
  echo '<table class="table">';
    while($get_row= mysqli_fetch_array($findrequests, MYSQLI_ASSOC))
   {
	echo '<tr>';
	echo '<td>';
	//echo '<div style="padding:0px; background-color:eff; border-radius:20px; border:2px solid black; border-radius:20px;">';
	$id=$get_row['id'];
	$user_to=$get_row['userto'];
	$user_from=$get_row['userfrom'];
	$findthumb= $conn->query("SELECT profilepic FROM users WHERE username ='$user_from'");
	$get_row1= mysqli_fetch_array($findthumb, MYSQLI_ASSOC);
	$imagethumb= $get_row1['profilepic'];
	$imagethumburl="<img src=\"../IMAGES/default.png\"  class=\"img-thumbnail img-responsive\" width=\"120px\" height=\"120px\">";
	if($imagethumb!="")
	  	$imagethumburl= "<img src=\"../USERDATA/PROFILE_PHOTO/".$imagethumb."\"  class=\"img-thumbnail img-responsive\" width=\"120px\" height=\"120px\">";
	echo $imagethumburl;	     
	echo '</td>';
	echo '<td>';
	echo "<a href='$user_from'>".$user_from."</a> wants to be friends!";
	echo '<form action="friendrequests.php" method="POST">
<input type="submit" class="btn btn-info" value="Accept" name="acceptrequest'.$user_from.'">
<input type="submit" class="btn btn-danger" value="Ignore" name="ignorerequest'.$user_from.'">
</form>';
echo '</td>';
echo '</tr>';
   }
echo '</table>';


}
   echo '</div>';
?>
</div>
<div style="col-md-3">
</div>
</div>
<?php 
	$add_friend_check="";
	$get_friend_row="";
	if(isset($_POST['acceptrequest'.$user_from])){
	$get_friend_check= $conn->query("SELECT friend_array FROM users WHERE username='$user'");
	$get_friend_row=mysqli_fetch_array($get_friend_check, MYSQLI_ASSOC);
	$friend_array= $get_friend_row['friend_array'];
	$friendArray_explode= explode(",",$friend_array);
	$friendArray_count= count($friendArray_explode);
	
	
	$get_friend_check2= $conn->query("SELECT friend_array FROM users WHERE username='$user_from'");
	$get_friend_row2=mysqli_fetch_array($get_friend_check2, MYSQLI_ASSOC);
	$friend_array2= $get_friend_row2['friend_array'];
	$friendArray_explode2= explode(",",$friend_array2);
	$friendArray_count2= count($friendArray_explode2);

	if($friend_array=="")
	{
		$friendArray_count = count(NULL);
	}	
	if($friend_array2=="")
	{
		$friendArray_count2 = count(NULL);
	}
	
	if($friendArray_count==NULL)
	{
		$add_friend_query= $conn->query("UPDATE users SET friend_array=CONCAT(friend_array,'$user_from') WHERE username='$user'");
	}
	if($friendArray_count2==NULL)
	{
		$add_friend_query2= $conn->query("UPDATE users SET friend_array=CONCAT(friend_array,'$user_to') WHERE username='$user_from'");
	}
	if($friendArray_count>=1)
	{
		$add_friend_query= $conn->query("UPDATE users SET friend_array=CONCAT(friend_array,',$user_from') WHERE username='$user'");
	}
	if($friendArray_count2>=1)
	{
		$add_friend_query2= $conn->query("UPDATE users SET friend_array=CONCAT(friend_array,',$user_to') WHERE username='$user_from'");
	}

	$delete_request= $conn->query("DELETE FROM friend_requests WHERE userto='$user_to' && userfrom='$user_from'");
	echo "<script>location.reload();</script>";
	
	
}
if(isset($_POST['ignorerequest'.$user_from])){
	$delete_request= $conn->query("DELETE FROM friend_requests WHERE userto='$user_to' && userfrom='$user_from'");
	echo "<script>location.reload();</script>";
}
?>
