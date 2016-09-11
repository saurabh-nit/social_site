<?php
   session_start();
   	$menu="Y";
	$js_name='';
	$js_name1='patients.js';
	$page_name='Home';
	$tab_name="add";
	$css_name='';
	$last_login='';
require_once("header2.php");
?>

	<div style="margin-top:125px;">
	<h1>Search Results</h1>
        	<div class="row">
 
<div class="col-md-2" style="padding:10px 30px;">
</div>
<div class="col-md-6" style="padding:10px 30px; background-color:#eff;">
		
<?php
$getposts= $conn->query("SELECT * FROM posts ORDER BY id DESC");
     while($row= mysqli_fetch_array($getposts,MYSQLI_ASSOC))
	{
		     $addby= $row['added_by'];
		     $date= $row['date_added'];
		     $postbody= $row['body'];
		     $image=$row['image'];
		     $imageurl ="";
		     if($image!="")
			$imageurl= "<img src=\"../USERDATA/PROFILE_PHOTO/".$image."\"  class=\"img-rounded img-thumbnail\"  width=\"600px\" height=\"500px\"><br><br>";

// query for getting user details (who post something on timeline or updated profile picture) through username

		     $queryaddedby = $conn->query("select * from users where username = '$addby'");
		     $rowaddedby = mysqli_fetch_array($queryaddedby, MYSQLI_ASSOC);
		     $imagethumb = $rowaddedby['profilepic'];
		     $nameaddby = $rowaddedby['First_name']." ".$rowaddedby['Last_name'];
// checking his or her
		     if($rowaddedby['Gender']=="MALE")
		       $hisorher="his";
		    else
 			$hisorher="her";
		    
			$headingofpost="";
//
		    if($row['body']=="updateprofile"){
			$headingofpost="Updated ".$hisorher." Profile Picture";
			$postbody="";
			}

			$imagethumburl="<img src=\"../IMAGES/default.png\"   width=\"50px\" height=\"50px\">";
		     if($imagethumb!="")
		     	$imagethumburl= "<img src=\"../USERDATA/PROFILE_PHOTO/".$imagethumb."\"   width=\"50px\" height=\"50px\">";
		     
		     echo '<tr>
                   	<td class="row">
				<h4>'.$imagethumburl.'
                        	
				    <b> &nbsp; '.$nameaddby.'  </b>'.$headingofpost.'
				
				</h4>
				<div>
					<h4>'.$postbody.'</h4>
					'.$imageurl.'
					<span class="glyphicon glyphicon-thumbs-up text-success">&nbsp;<b>Like</b></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<span class="glyphicon glyphicon-thumbs-down text-danger">&nbsp;<b>Unlike</b></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<span class="glyphicon glyphicon-comment text-info">&nbsp;<b>Comment</b></span>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<span class="glyphicon glyphicon-share-alt">&nbsp;<b>Share</b></span>
				</div>                          
                        </td>                            
                    </tr>';
	}


?>
			
     		</div>
		<div class="col-md-2" style="padding:10px 30px;">
		
			
     		</div>
  
	</div>
</div>
</html>




