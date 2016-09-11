<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
 	<title>Home</title>

    <!-- Bootstrap core CSS -->
    



    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/c.css" rel="stylesheet">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  
      <script src="../js/jquery.min.js"></script>

    <?php	
			date_default_timezone_set("Asia/Kolkata");			
			
	?> 
    

    
</head>
<body>

<?php 
if(!$_SESSION['lemail'])
 header('Location: ../index.php');
if($_SESSION['lemail']) 
{
	   			include('chatting.php');
}
?>
  	<div  style=" padding-left: 10px; width:100%; background-color:#000;  top: 0; position:fixed; left: 0; right: 0;  z-index:10000000;" class="fixed-top">    			
    	 <div class="row"> 
		<div class="col-md-3" style="margin:10px; padding-top:10px; padding-left:10px; padding-right:10px;">
	       		<strong style="padding-top:10px; color:#CCC" class="h3">Friends Book </strong>
			
		</div>
		<div class="col-md-5">
			<table class="table"><tr><td style="padding-top:10px;">
			<form action="search.php" method="POST">
			 	<input type="text" placeholder="Search Your Friends" name="searchuser" class="form form-control input-sm"></td>
			<td style="padding-top:10px;"><span class="h3" > <input type="submit" class="btn btn-default" value="Search"/> </span> 
			</form></td>
			</tr></table>
		</div>

		<div class="col-md-3 pull-right" style="padding-top:10px;" >
		
		
           		<span  style="color:white;">	 
		

		<?php
			$pnb="Post";
			$pemail=$_SESSION['lemail'];
			include("connection.php");
			
		    $checklogin= "select * from users where Email_id='$pemail' ";
   			$run=$conn->query($checklogin); 	
									
									      
										$row=mysqli_fetch_array($run, MYSQLI_ASSOC);
  											$pfname=$row['First_name'];
											$plname=$row['Last_name'];
											$user=$row['username'];
											$pDOB=$row['DOB'];
											
											
											echo '<div style="font-size:20px">'. $pfname.' '.$plname.' <a href="logout.php" class="btn btn-default btn-lg">logout</a></div>';
				$pnb=$pfname."'s- Timeline";							
			
		?></span> 
		</div>
	
	
        	</div>
				<?php
        		if($menu=="Y")
				{
					echo '<nav>
          				  <ul class="nav nav-tabs h4">';
					if($page_name=="Home")
					{
						echo '<li class="active">';
					}
					else
						echo '<li>';
			?>		
								<a href="../PHP">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Home&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
						  	  </li>
   			 <?php
				if($page_name=="profile")
				{
						echo '<li class="active">';
				}
				else
						echo '<li>';
			?>
								<a href="<?php echo $user;?>"><?php echo $pnb;?></a>
						  	  </li>
            
			<?php 
				if(isset($_SESSION['lemail']))
				{
						if($page_name=="signup")
						{
							echo '<li class="active">';
						}
						else
							echo '<li>';
			?>
        								<a href="tiAmeline.php"><?php echo $pfname."'S- Profile";?> </a>
								  </li>
			<?php
			}
				if($page_name=="myprofile")
				{
								echo '<li class="active">';
				}
				else
								echo '<li>';
			?>
										<a href="about.php">About us</a>
						  			 </li>
									 <li>
										<a href="friendrequests.php"><span class="glyphicon glyphicon-"></span>Friend Requests</a>
						 			</li>
		</ul>
       					</nav>
<?php
				}
?>
	</div> 

 		
        


      <!-- The justified navigation menu is meant for single line per list item.
           Multiple lines will require custom code not provided by Bootstrap. -->
     <!-- For masthead -->
   