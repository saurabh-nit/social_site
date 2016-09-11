<form action="<?php echo $username; ?>" method="POST">
<?php

// friend request sent then cancel friend request

$friendrequestsent =$conn->query("select * from friend_requests where userfrom='$user' and userto='$username'");
if(mysqli_num_rows($friendrequestsent)>0)
{
     $Friendbutton= '<input type="submit" name="deleterequest'.$username.'" value="Cancel friend request">';
}
else
{
// friend request not sent 

	$friendArray="";
	$countFriends="";
	$friendsArray12="";
	$selectFriendsQuery= $conn->query("SELECT friend_array FROM users where username='$username'");
	$friendRow= mysqli_fetch_array($selectFriendsQuery, MYSQLI_ASSOC);
	$friendArray = $friendRow['friend_array'];
	if($friendArray!="")
	{
		$friendArray = explode(",",$friendArray);
		$countFriends = count($friendArray);
		$friendArray12 = array_slice($friendArray, 0, 12);
		$i=0;
		if(in_array($user, $friendArray))
		{
			$Friendbutton= '<input type="submit" name="removefriend" value="Remove Friend">';
		}
		else
		{
			$Friendbutton= '<input type="submit" name="addfriend" value="Add Friend">';
		}
	}
}
echo $Friendbutton;
?>
</form>
<?php
include("connection.php");
if(isset($_POST['addfriend']))
{

  $friend_request= $_POST['addfriend'];
  $user_to= $user;
  $user_from= $username;
  $create_request= $conn->query("INSERT INTO friend_requests VALUES ('','$user_to','$user_from')");
  
}
else
{
}
?>
<?php
		  $user_to= $user;
  		$user_from= $username;
	if(isset($_POST['deleterequest'.$user_from]))
	{
		echo "bhalo";

		$delete_request= $conn->query("DELETE FROM friend_requests WHERE userto='$user_from' && userfrom='$user_to'");

	}
?>