<!--this page for  post status to time line & get post from post table and display it into current username timeline-->
<?php include("add_post.php");?>
<table class="table">										
   <form action="<?php echo $username;?>" method="POST" enctype="multipart/form-data">																	
	<tr>
	<td>											
		<textarea class="form form-control" name="postcontent" rows="3"> </textarea>
		<span class="btn btn-info" style="position: relative; overflow: hidden; margin: 10px;">
			Add Image			
			<input type="file" class="" value="Add Image" name="postpic" style="position: absolute;top: 0;right: 0;margin:0;padding: 0;font-size: 20px;cursor: pointer; opacity: 0; filter: alpha(opacity=0);">
		</span>
		<input type="submit" name="post" class="btn btn-info"  value="Post" >		
	</td>												
	</tr>												
   </form>	
											



<?php

// getting current user post from posts table 

$getposts= $conn->query("SELECT * FROM posts WHERE user_post_to='$username' ORDER BY id DESC");
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



                            <tr >
                   	<td class="row" style="padding-top:30px">
			</td>
		    </tr>

                    
                   </table>


        			
	