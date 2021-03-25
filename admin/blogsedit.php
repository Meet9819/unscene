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
					<h4 class="box-title">Edit Blogs</h4>
					<!-- /.box-title -->
					<div class="card-content">
						




<?php

    error_reporting( ~E_NOTICE );
    
    require_once 'dbconfig.php';
    
    if(isset($_GET['edit_id']) && !empty($_GET['edit_id']))
    {
        $id = $_GET['edit_id'];
        $stmt_edit = $DB_con->prepare('SELECT * FROM blogs WHERE id =:id');
        $stmt_edit->execute(array(':id'=>$id));
        $edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
        extract($edit_row);
    }
    else
    {
        header("Location: blogsview.php");
    }
    
    
    
    if(isset($_POST['btn_save_updates']))
    {
            $name = $_POST['name'];
            $description = $_POST['description'];
           $long_description = $_POST['long_description'];
            $title = $_POST['title'];
            
            $detail = $_POST['detail'];
           

        $imgFile = $_FILES['user_image']['name'];
        $tmp_dir = $_FILES['user_image']['tmp_name'];
        $imgSize = $_FILES['user_image']['size'];
                    
        if($imgFile)
        {
            $upload_dir = 'media/blogs/'; // upload directory 
            $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
            $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
            $img = rand(1000,1000000).".".$imgExt;
            if(in_array($imgExt, $valid_extensions))
            {           
                if($imgSize < 5000000)
                {
                    unlink($upload_dir.$edit_row['img']);
                    move_uploaded_file($tmp_dir,$upload_dir.$img);
                }
                else
                {
                    $errMSG = "Sorry, your file is too large it should be less then 5MB";
                }
            }
            else
            {
                $errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";        
            }   
        }
        else
        {
            // if no image selected the old image remain as it is.
            $img = $edit_row['img']; // old image from database
        }   




        
        // if no error occured, continue ....
        if(!isset($errMSG))
        {
             $stmt = $DB_con->prepare('UPDATE blogs SET name=:name,img=:img,description=:description,
             long_description=:long_description, title=:title,detail=:detail WHERE id=:id');
            $stmt->bindParam(':name',$name);    
            $stmt->bindParam(':img',$img);
            $stmt->bindParam(':description',$description);
            $stmt->bindParam(':long_description',$long_description);
            $stmt->bindParam(':title',$title);            
            $stmt->bindParam(':detail',$detail);
             
            $stmt->bindParam(':id',$id);
                
            if($stmt->execute()){
                ?>
                <script>
                alert('Successfully Updated ...');
                window.location.href='blogsview.php';
                </script>
                <?php
            }
            else{
                $errMSG = "Sorry Data Could Not Updated !";
            }
        
        }
        
                        
    }
    
?>




  <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
 
 		                   

                              <div class="form-group">
								<label for="inp-type-1" class="col-sm-3 control-label"> Image</label>
								<div class="col-sm-6"> 

									  <img src="media/blogs/<?php echo $img; ?>" height="70" width="150" />

                                <input type="file" name="user_image" accept="image/*" />

								<p class="help-block">Image should be 3527 x 2372 in pixels</p>
								</div>

							</div>


							<div class="form-group">
								<label for="inp-type-1" class="col-sm-3 control-label">blog Written by</label>
								<div class="col-sm-6">
									<input type="text" name="name" class="form-control" id="" placeholder="Enter Title"  value="<?php echo $name; ?>">
								</div>
							</div>
<div class="form-group">
                                <label for="inp-type-1" class="col-sm-3 control-label">Title of blogs</label>
                                <div class="col-sm-6">
                                    <input type="text" name="title" class="form-control" id="" placeholder="Enter Title" required="" value="<?php echo $title; ?>">
                                </div>
                            </div>

                                
                            <div class="form-group">
                                <label for="inp-type-1" class="col-sm-3 control-label">Short Detail</label>
                                <div class="col-sm-6">
                                    
                                <textarea class="form-control" name="detail" id="detail" placeholder="Enter Short Description"> <?php echo $detail; ?></textarea>  

                           <script>
                             CKEDITOR.replace( 'detail', {
                              height: 300,
                              filebrowserUploadUrl: "upload.php"
                             });
                            </script>
                             </div>
                            </div>

                            
	                       <div class="form-group">
								<label for="text" class="col-sm-3 control-label">Description</label>
								<div class="col-sm-6">
									<textarea class="form-control" name="description" id="text" placeholder="Enter Short Description"> <?php echo $description; ?></textarea>  

                           <script>
                             CKEDITOR.replace( 'text', {
                              height: 300,
                              filebrowserUploadUrl: "upload.php"
                             });
                            </script>


                                

								</div>
							</div>
                               <div class="form-group">
                                <label for="text" class="col-sm-3 control-label">Long Description</label>
                                <div class="col-sm-6">
                                    <textarea class="form-control" name="long_description" id="long_description" placeholder="Enter Long Description"> <?php echo $description; ?></textarea>  

                           <script>
                             CKEDITOR.replace( 'long_description', {
                              height: 300,
                              filebrowserUploadUrl: "upload.php"
                             });
                            </script>

 
                                </div>
                            </div>
 

							<div class="form-group margin-bottom-0">
									<label for="inp-type-5" class="col-sm-3 control-label"></label> 

									<div class="col-sm-6">
									   <input class="btn btn-primary btn-sm waves-effect waves-light" type="submit"  name="btn_save_updates" value="Update" /> 

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
