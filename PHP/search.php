<?php
   session_start();
   	$menu="Y";
	$js_name='';
	$js_name1='';
	$page_name='search';
	$tab_name="add";
	$css_name='';
	$last_login='';
require_once("header2.php");
?>

	<div  style="margin-top:140px;">
		
        	<div class="row">
 
<div class="col-md-3" style="padding:10px 10px;">
</div>
<div class="col-md-6" style="padding:10px 10px; margin:0 auto;">
<div style="margin:0 auto; width:100%;">
<h2 align="center" style="color:black;">Search Results for "<?php echo $_POST['searchuser']; ?>" </h2>		
<?php
if(isset($_POST['searchuser']))
{
	$searchvalue= $_POST['searchuser'];
	$searchuser= $conn->query("SELECT * FROM users where username='$searchvalue' OR First_name='$searchvalue' OR Email_id='$searchvalue'");
echo '<div style="margin:0 auto; width:100%;">';
echo '<table class="table">';

     while($row= mysqli_fetch_array($searchuser,MYSQLI_ASSOC))
	{
		     $Name= $row['First_name'].' '.$row['Last_name'];
		     $uName= $row['username'];
		     $email= $row['Email_id'];
		     $DOB= $row['DOB'];
		     $imagethumb = $row['profilepic'];

			$imagethumburl="<img src=\"../IMAGES/default.png\" class=\"img-thumbnail img-responsive\"  width=\"200px\" height=\"200px\">";
		     if($imagethumb!="")
		     	$imagethumburl= "<img style=\"float: left\" src=\"../USERDATA/PROFILE_PHOTO/".$imagethumb."\"  class=\"img-thumbnail img-responsive\"  width=\"200px\" height=\"200px\">";
// query for getting user details (who post something on timeline or updated profile picture) through username

	     
		     echo '<tr style="background-color:#eff; border: 2px solid black;">
                   	<td>
			'.$imagethumburl.'
                        </td> 
			<td> <h2>&nbsp;&nbsp;<a href='.$uName.'>'.$Name.'</a></h2>&nbsp;&nbsp;'.$uName.'<br>&nbsp;&nbsp;'.$email.'<br>&nbsp;&nbsp;'.$DOB.'<br>&nbsp;&nbsp;&nbsp;&nbsp; <form> <input type="button" class="btn btn-lg btn-info" value="Add Friend"></form>
			</td>                           
                    </tr>';
	}
echo '</table>';
echo '</div>';

}
?>
		</div>	
     		</div>

  
	</div>
</div>
</html>




