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





<?php

    error_reporting(0);
    
    require_once 'dbconfig.php';
    
     $_GET['id'] = 2;
    if(isset($_GET['id']) && !empty($_GET['id']))
    {
        $id = $_GET['id'];
        $stmt_edit = $DB_con->prepare('SELECT content FROM terms WHERE id =:id');
        $stmt_edit->execute(array(':id'=>$id));
        $edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
        extract($edit_row);
    }
    else
    {
        header("Location: terms.php");
    }
    
    
    
    if(isset($_POST['about_btn_save_updates']))
    {
      
      $content = $_POST['content'];

        // if no error occured, continue ....
        if(!isset($errMSG))
        {
            $stmt = $DB_con->prepare('UPDATE terms SET content=:content WHERE id=:id');
            $stmt->bindParam(':content',$content);
            $stmt->bindParam(':id',$id);
                
            if($stmt->execute()){
                ?>
                <script>
                alert('Successfully Updated ...');
                window.location.href='terms.php';
                </script>
                <?php
            }
            else{
                $errMSG = "Sorry Data Could Not Updated !";
            }        
        }                         
    }    
?>




                      
                           

                           
                     




    <div class="row small-spacing">
            <div class="col-xs-12">
                <div class="box-content">
                    <h4 class="box-title"> About us Contents</h4>
                    
                    <!-- /.dropdown js__dropdown --> 
 <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                        <textarea class="form-control" name="content" id="abouttext" placeholder="Write your Product Description"><?php echo $content; ?></textarea>  

    <script>
        CKEDITOR.replace('abouttext');
        CKEDITOR.config.extraPlugins = 'colorbutton';
    </script> 
  

                
 
                            <div class="form-group margin-bottom-0"> 

                                <br>  <input class="btn btn-danger btn-sm waves-effect waves-light" type="submit" name="about_btn_save_updates"  value="Update" /> 


                            </div>
     



                           </form>
                </div>
                <!-- /.box-content -->
            </div>
            <!-- /.col-xs-12 -->

        </div>



















	
	</div>
	<!-- /.main-content -->
</div><!--/#wrapper -->
	
	
<?php include "allscripts.php"; ?>
