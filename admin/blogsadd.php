 
<?php
session_start();
if(!isset($_SESSION["username"])){
header("Location: login.php");
exit(); }
?>

<?php include "allcss.php" ?>

<script src="//cdn.ckeditor.com/4.5.9/standard/ckeditor.js"></script>


<body>

<?php include "header.php" ?>


<div id="wrapper">
	<div class="main-content">
		
		<div class="col-lg-12 col-xs-12">
				<div class="box-content card white">
					<h4 class="box-title">Add Blog</h4>
					<!-- /.box-title -->
					<div class="card-content">
						
<?php
include('db.php');
if (!isset($_FILES['image']['tmp_name'])) {
    echo "";
    }else{
    $file=$_FILES['image']['tmp_name'];
    
   
    $image= addslashes(file_get_contents($_FILES['image']['tmp_name']));
    $image_name= addslashes($_FILES['image']['name']);

            move_uploaded_file($_FILES["image"]["tmp_name"],"media/blogs/" . $_FILES["image"]["name"]);

            $img="" . $_FILES["image"]["name"];
			$name = $_POST['name'];

   			$description = $_POST['description'];
   			
		   	$title = $_POST['title'];
		   
   			$detail = $_POST['detail'];
   			$long_description = $_POST['long_description'];

   			
            $save=mysqli_query($con,"INSERT INTO blogs (img,name,description,title,detail,long_description) VALUES 
            	('$img','$name','$description','$long_description','$title','$detail')");
          


           ?>
                <script>
                alert('Successfully Inserted ...');
               window.location.href='blogsview.php';
                </script>
                <?php

                             
    }
?>
  <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
 
 								


 								<div class="form-group">
								<label for="inp-type-1" class="col-sm-3 control-label"> Image</label>
								<div class="col-sm-6">
									<input type="file" id="" name="image" required="">
								<p class="help-block">Image should be 3527 x 2372 in pixels</p>
								</div>

								</div> 





							<div class="form-group">
								<label for="inp-type-1" class="col-sm-3 control-label"> Blog Written by</label>
								<div class="col-sm-6">
									<input type="text" name="name" class="form-control" id="" placeholder="Enter Name" required="">
								</div>
							</div>
	<div class="form-group">
								<label for="inp-type-1" class="col-sm-3 control-label">Title of blogs</label>
								<div class="col-sm-6">
									<input type="text" name="title" class="form-control" id="" placeholder="Enter Title" required="">
								</div>
							</div>
							<div class="form-group">
								<label for="inp-type-1" class="col-sm-3 control-label">Short Detail</label>
								<div class="col-sm-6"> 
								<textarea class="form-control" name="detail" id="detail" placeholder="Enter detail"></textarea>  

									    <script>
									        CKEDITOR.replace('detail');
									    </script>
									</div>
							</div>

						

						<div class="form-group">
								<label for="text" class="col-sm-3 control-label">Description</label>
								<div class="col-sm-6">
									<textarea class="form-control" name="description" id="text" placeholder="Enter Description"></textarea>  

									    <script>
									        CKEDITOR.replace('text');
									    </script>

								</div>
							</div>
							<div class="form-group">
								<label for="text" class="col-sm-3 control-label">Long Description</label>
								<div class="col-sm-6">
									<textarea class="form-control" name="long_description" id="long_description" placeholder="Enter Long Description"></textarea>  

									    <script>
									        CKEDITOR.replace('long_description');
									    </script>

								</div>
							</div>

 
						
 
														<div class="form-group margin-bottom-0">
									<label for="inp-type-5" class="col-sm-3 control-label"></label> 

									<div class="col-sm-6">
										 <input class="btn btn-primary btn-sm waves-effect waves-light" type="submit" name="Submit" value="Submit" />

								</div>
							</div>


						</form>
					</div>
					<!-- /.card-content -->
				</div>
				<!-- /.box-content card white -->
			</div>




	</div>
	<!-- /.main-content -->
</div><!--/#wrapper -->
	
	
<?php include "allscripts.php"; ?>
