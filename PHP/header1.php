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

    <title>NIT DURGAPUR-Social Site</title>

    <link href="css/style.css" rel="stylesheet">
    <link href="css/c.css" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="JS/js.js"></script>
    <?php	
	date_default_timezone_set("Asia/Kolkata");					
    ?> 
</head>

<body>


  	<div  style=" padding-left: 10px;;width:100%; background-color:#000;  top: 0; left: 0; right: 0;  z-index:10000000;">    			
       		          <form role="form" method="post" acton="">
		<table class="table" > 
		    <tr> <td><h1><strong><span style="color:#b3b3b3;"> Friends</span> <span style="color:white;"> Book</span> </strong> </h1></td>
		        <td style="padding:20px; width:50px">       		
		             	<h4 style="color:white;">Email</h4>
		        </td>
		        <td  style="padding:20px;">
              			<input type="text" class="form-control input-sm" id="usrname" placeholder="Enter email" name="lemail">
				
				
			</td>
			<td style="padding:20px; width:50px">            
             			<h4 style="color:white;">Password</h4>
			</td>
			<td style="padding:20px;">
				<input type="password" class="form-control input-sm" id="psw" placeholder="Enter password" name="lpass">
	  		</td>
	   		<td style="padding:20px;">
				<button type="submit" class="btn btn-default" name="login" ><span class="glyphicon glyphicon-off"></span> Login</button>
	   		</td>
		    </tr>
		   
		</table>
<?php include("PHP/login.php");?>
            	
              
          </form>
		 
        	</div>
				
	</div> 

 		
        


      <!-- The justified navigation menu is meant for single line per list item.
           Multiple lines will require custom code not provided by Bootstrap. -->
     <!-- For masthead -->
   