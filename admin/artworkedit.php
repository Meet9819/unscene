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
					<h4 class="box-title">Edit artwork</h4>
					<!-- /.box-title -->
					<div class="card-content">
						




<?php

    error_reporting( ~E_NOTICE );
    
    require_once 'dbconfig.php';
    
    if(isset($_GET['edit_id']) && !empty($_GET['edit_id']))
    {
        $id = $_GET['edit_id'];
        $stmt_edit = $DB_con->prepare('SELECT * FROM artwork WHERE id =:id');
        $stmt_edit->execute(array(':id'=>$id));
        $edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
        extract($edit_row);
    }
    else
    {
        header("Location: artworkview.php");
    }
    
    
    
    if(isset($_POST['btn_save_updates']))
    { 
            $description = $_POST['description'];
            $link = $_POST['link'];
            $title = $_POST['title'];
            $price = $_POST['price'];
            $category = $_POST['category'];
            $subcategory = $_POST['subcategory'];
            $type = $_POST['type'];

        $imgFile = $_FILES['user_image']['name'];
        $tmp_dir = $_FILES['user_image']['tmp_name'];
        $imgSize = $_FILES['user_image']['size'];
                    
        if($imgFile)
        {
            $upload_dir = 'media/artwork/'; // upload directory 
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
             $stmt = $DB_con->prepare('UPDATE artwork SET  img=:img,description=:description,
             link=:link, title=:title,price=:price,category=:category,subcategory=:subcategory,type=:type WHERE id=:id');    
            $stmt->bindParam(':img',$img);
            $stmt->bindParam(':description',$description);
            $stmt->bindParam(':link',$link);
            $stmt->bindParam(':title',$title);            
            $stmt->bindParam(':price',$price);
            $stmt->bindParam(':category',$category);            
            $stmt->bindParam(':subcategory',$subcategory);       
            $stmt->bindParam(':type',$type);
             
            $stmt->bindParam(':id',$id);
                
            if($stmt->execute()){
                ?>
                <script>
                alert('Successfully Updated ...');
                window.location.href='artworkview.php';
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
								<img src="media/artwork/<?php echo $img; ?>" height="70" width="150" />
                                <input type="file" name="user_image" accept="image/*" />
								<p class="help-block">Image should be 3527 x 2372 in pixels</p>
								</div>
							</div> 

                            <div class="form-group">
                                <label for="inp-type-1" class="col-sm-3 control-label">Title of artwork</label>
                                <div class="col-sm-6">
                                    <input type="text" name="title" class="form-control" id="" placeholder="Enter Title"  value="<?php echo $title; ?>">
                                </div>
                            </div>



                            <div class="form-group">
                                <label for="text" class="col-sm-3 control-label">Type</label>
                                <div class="col-sm-6">
                                    <select type="text" name="type" class="form-control" id="" placeholder="Enter type" >
                                        <option value="<?php echo $type; ?>"><?php echo $type; ?></option>
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
                                        <option value="<?php echo $category; ?>"><?php echo $category; ?></option>
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
                                        <option value="<?php echo $subcategory; ?>"><?php echo $subcategory; ?></option>
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
                                    <input type="text" name="price" class="form-control" id="" placeholder="Enter price"  value="<?php echo $price; ?>">  
                             </div>  
                             </div>

                             <div class="form-group">
                                <label for="text" class="col-sm-3 control-label">link</label>
                                <div class="col-sm-6">
                                  <input type="text" name="link" class="form-control" id="" placeholder="Enter link"  value="<?php echo $link; ?>">  
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
