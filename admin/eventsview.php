<?php
session_start();
if(!isset($_SESSION["username"])){
header("Location: login.php");
exit(); }
?>

<?php include "allcss.php" ?>
 <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
 <script language="JavaScript" type="text/javascript">
            $(document).ready(function() {
                $("a.btn").click(function(e) {
                    if (!confirm('Are you sure?')) {
                        e.preventDefault();
                        return false;
                    }
                    return true;
                });
            });
        </script>
<body>

<?php include "header.php" ?>


<div id="wrapper">
	<div class="main-content">
		
		

			<div class="col-xs-12">
				<div class="box-content">
					<h4 class="box-title">View events</h4>
				
					<!-- /.dropdown js__dropdown -->
					<table id="example" class="table table-striped table-bordered display" style="width:100%">
						<thead>
								<tr>
									<th>Id</th>							
									<th>Image</th>
									<th>Title</th> 
									<th>Description</th>											
								 							
									<th>Location</th>
									<th>Date</th>
									<th>Edit</th>
									<th>Action</th>							
								</tr>
						</thead>
	

	<?php include('db.php');
/* code for data delete */
if(isset($_GET['del']))
{
    $SQL = mysqli_query($con,"DELETE FROM events WHERE id=".$_GET['del']);
 ?>
                <script>
                alert('Successfully Deleted ...');
                window.location.href='eventsview.php';
                </script>
                <?php

}
/* code for data delete */

$result = mysqli_query($con,"SELECT * FROM events order by id desc"); 
 $tmpCount = 1;
while($row = mysqli_fetch_array($result))
{

echo '	<tbody>
			<tr>
			 ';?>
                                                    <td>
                                                        <?php echo $tmpCount++ ?>
                                                    </td>
                                                    <?php echo '
								<td><img style="width:50px" src="media/events/'.$row['img'].'"></td>
   							    <td> '.$row['title'].'</td>
								<td> '.substr($row['description'],0,100).'...</td>
								 
								<td> '.$row['location'].'</td>
								<td> '.$row['datee'].'</td>


<td>

<a  href="eventsedit.php?edit_id='.$row['id'].'" style="font-size: 12px;
    line-height: 22px;
    padding: 5px 15px;" class="btn-success btn-xs waves-effect waves-light"><b style="color:white">Edit</b></a> 
</td>
<td>
								 <a class="btn btn-danger btn-xs waves-effect waves-light" href="?del='.$row['id'].'"> <i class="fa fa-trash-o"></i></a></td>

							</tr>
						
						</tbody>

                                   

';
}
?>



					</table>
				</div>
				<!-- /.box-content -->
			</div>


	</div>
	<!-- /.main-content -->
</div><!--/#wrapper -->
	
	
<?php include "allscripts.php"; ?>
