<?php
session_start();
if(!isset($_SESSION["username"])){
header("Location: login.php");
exit(); }
?>


<?php include "allcss.php" ?>


<body>

<?php include "header.php" ?>




<!-- /#message-popup -->
<div id="wrapper">
	<div class="main-content">
		<div class="row small-spacing">


		
			<div class="col-lg-3 col-md-6 col-xs-12">
				<div class="box-content">
					<h4 class="box-title">Admin Login</h4>
					
					<!-- /.dropdown js__dropdown -->
					<div class="content widget-stat">
						<div class="percent bg-warning"><i class="fa fa-line-chart"></i>53%</div>
						<!-- /.percent -->
						<div class="right-content"> 


                              <?php
include"db.php";

$result = mysqli_query($con,"select count(1) FROM adminlogin");
$row = mysqli_fetch_array($result);

$total = $row[0];

       echo'  
	<h2 class="counter"> '. $total.'</h2>
                            
      '
?>
	
						
							<!-- /.counter -->
							<p class="text">No of Admin User</p>
							<!-- /.text -->
						</div>
						<!-- /.right-content -->
						<div class="clear"></div>
						<!-- /.clear -->
						<div class="process-bar">
							<div class="bar-bg bg-warning"></div>
							<div class="bar js__width bg-warning" data-width="70%"></div>
							<!-- /.bar js__width bg-success -->
						</div>
						<!-- /.process-bar -->
					</div>
					<!-- /.content widget-stat -->
				</div>
				<!-- /.box-content -->
			</div>
		
		</div>
	
	</div>
	<!-- /.main-content -->
</div><!--/#wrapper -->



<?php include "allscripts.php" ?>