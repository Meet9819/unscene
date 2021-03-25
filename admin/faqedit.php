<?php
session_start();
if(!isset($_SESSION["username"])){
header("Location: login.php");
exit(); }
?>

<?php include "allcss.php" ?>

<body>

<?php include "header.php" ?>


<div id="wrapper">
	<div class="main-content">
		
		<div class="col-lg-12 col-xs-12">
				<div class="box-content card white">
					<h4 class="box-title">Edit FAQ</h4>
					<!-- /.box-title -->
					<div class="card-content">






<?php

    error_reporting( ~E_NOTICE );
    
    require_once 'dbconfig.php';
    
    if(isset($_GET['edit_id']) && !empty($_GET['edit_id']))
    {
        $id = $_GET['edit_id'];
        $stmt_edit = $DB_con->prepare('SELECT * FROM faq WHERE id =:id');
        $stmt_edit->execute(array(':id'=>$id));
        $edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
        extract($edit_row);
    }
    else
    {
        header("Location: banner.php");
    }
    
    
    
    if(isset($_POST['btn_save_updates']))
    {
       
  
     $question = $_POST['question'];  
     $answer = $_POST['answer'];
 
        // if no error occured, continue ....
        if(!isset($errMSG))
        {
$stmt = $DB_con->prepare('UPDATE faq SET  question=:question,  answer=:answer
    WHERE id=:id');
           
            $stmt->bindParam(':question',$question); 
            $stmt->bindParam(':answer',$answer);
            
            $stmt->bindParam(':id',$id);
                
            if($stmt->execute()){
                ?>
                <script>
                alert('Successfully Updated ...');
                window.location.href='faq.php';
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
                                <label for="text" class="col-sm-3 control-label">Question</label>
                                <div class="col-sm-6">
                                        <input type="text" name="question" class="form-control" id="" placeholder="Enter question"  value="<?php echo $question; ?>">

                                </div>
                            </div>
                         
                            <div class="form-group">
                                <label for="text" class="col-sm-3 control-label">Answer</label>
                                <div class="col-sm-6"> 
<textarea  type="text" name="answer" class="form-control" id="" placeholder="Enter answer" ><?php echo $answer; ?></textarea>
                                </div>
                            </div>




							<div class="form-group margin-bottom-0">
									<label for="inp-type-5" class="col-sm-3 control-label"></label> 

									<div class="col-sm-6">
										 <input class="btn btn-primary btn-sm waves-effect waves-light" type="submit" name="btn_save_updates" value="Update" />
   							
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
