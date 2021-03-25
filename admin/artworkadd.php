 
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
					<h4 class="box-title">Add Artwork</h4>
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

            move_uploaded_file($_FILES["image"]["tmp_name"],"media/artwork/" . $_FILES["image"]["name"]);

            $img="" . $_FILES["image"]["name"]; 
   			$description = $_POST['description'];   			
		   	$title = $_POST['title'];		   
   			$price = $_POST['price'];
   			$link = $_POST['link'];
   			$category = $_POST['category'];
   			$subcategory = $_POST['subcategory'];
   			$type = $_POST['type'];
   			
            $save=mysqli_query($con,"INSERT INTO artwork (img,description,title,price,link,category,subcategory,type) VALUES 
            	('$img','$description','$link','$title','$price','$category','$subcategory','$type')");
          


           ?>
                <script>
                alert('Successfully Inserted ...');
               window.location.href='artworkview.php';
                </script>
                <?php

                             
    }
?>
  <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
  
 							<div class="form-group">
								<label for="inp-type-1" class="col-sm-3 control-label"> Image</label>
								<div class="col-sm-6">
									<input type="file" id="" name="image" >
								<p class="help-block">Image should be 3527 x 2372 in pixels</p>
								</div>

							</div> 
 
							<div class="form-group">
								<label for="inp-type-1" class="col-sm-3 control-label">Title of artwork</label>
								<div class="col-sm-6">
									<input type="text" name="title" class="form-control" id="" placeholder="Enter Title" >
								</div>
							</div>
							<div class="form-group">
								<label for="text" class="col-sm-3 control-label">Type</label>
								<div class="col-sm-6">
									<select type="text" name="type" class="form-control" id="" placeholder="Enter type" >
										<?php
										$result = mysqli_query($con,"SELECT * FROM type"); 
										 $tmpCount = 1;
										while($row = mysqli_fetch_array($result))
										{

										echo '<option value="'.$row['title'].'">'.$row['title'].'</option> '; } ?>

									</select>
									 
								</div>
							</div>

							<div class="form-group">
								<label for="text" class="col-sm-3 control-label">Category</label>
								<div class="col-sm-6">
									<select type="text" name="category" class="form-control" id="" placeholder="Enter category" >
										<?php
										$result = mysqli_query($con,"SELECT * FROM category"); 
										 $tmpCount = 1;
										while($row = mysqli_fetch_array($result))
										{

										echo '<option value="'.$row['title'].'">'.$row['title'].'</option> '; } ?>

									</select>
									 
								</div>
							</div>
							<div class="form-group">
								<label for="text" class="col-sm-3 control-label">Sub Category</label>
								<div class="col-sm-6">
									<select type="text" name="subcategory" class="form-control" id="" placeholder="Enter subcategory" >
										<?php
										$result = mysqli_query($con,"SELECT * FROM subcategory"); 
										 $tmpCount = 1;
										while($row = mysqli_fetch_array($result))
										{

										echo '<option value="'.$row['title'].'">'.$row['title'].'</option> '; } ?>

									</select>




								</div>
							</div>

							<div class="form-group">
								<label for="inp-type-1" class="col-sm-3 control-label">  price</label>
								<div class="col-sm-6"> 
								<input type="text" name="price" class="form-control" id="" placeholder="Enter price" >


									</div>
							</div>
							<div class="form-group">
								<label for="text" class="col-sm-3 control-label">link</label>
								<div class="col-sm-6">
									<input type="text" name="link" class="form-control" id="" placeholder="Enter link" >
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
