
<?php
$page_name="profile";
$menu='Y';
session_start();
 include("header2.php");

?>


    
<div class="row" style="padding-top:140px">
  			<div class="col-md-4 col-xs-12"  style="position:fixed"><!--Column 1 start-->           
           		<?php include("profile_details.php");?>            
   			</div><!--column 1 end-->

  			<div class="col-md-6 col-xs-12 col-md-push-4"><!--Column 2 start-->
                <?php include("profile_posts.php");?>
             </div><!--Column 2 end-->	
            	
    		
 	         </div>  		
     </div><!--row-->
   </body>
</html>
