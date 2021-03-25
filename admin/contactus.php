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
		






			<div class="col-xs-12">
				<div class="box-content">
					<h4 class="box-title">Feedback [ Contact Form ]</h4>
				
					<!-- /.dropdown js__dropdown -->
					<table id="example" class="table table-striped table-bordered display" style="width:100%">
						<thead>
							<tr>
								<th>Id</th>
							
									<th>User Name</th>
									
									<th>Email Id</th>
									<th>Subject</th>
									<th>Message</th>
								
									
							
							</tr>
						</thead>
					
     <tbody>


<?php include "d.php"; ?>

<?php                                      

$sql=$db->query("Select * from contactform");
 $tmpCount = 1;
            foreach ($sql as $key => $user) :
 ?>
<tr>
 			<td><?php echo $tmpCount++ ?> </td>
            <td><?php echo $user['name']; ?></td>
            <td><?php echo $user['email']; ?></td>
            <td><?php echo $user['subject']; ?></td>
            <td><?php echo $user['message']; ?></td> 

      


        </tr>
       <?php endforeach; ?>
	 </tbody>



					</table>
				</div>
				<!-- /.box-content -->
			</div>




	
	</div>
	<!-- /.main-content -->
</div><!--/#wrapper -->
	
	
<?php include "allscripts.php"; ?>
<!-- TinyMCE -->
	<!-- Plugin Files DON'T INCLUDES THESES FILES IF YOU USE IN THE HOST -->
	<link rel="stylesheet" href="assets/plugin/tinymce/skins/lightgray/skin.min.css">
	<script src="assets/plugin/tinymce/plugins/advlist/plugin.min.js "></script>
	<script src="assets/plugin/tinymce/plugins/anchor/plugin.min.js "></script>
	<script src="assets/plugin/tinymce/plugins/autolink/plugin.min.js "></script>
	<script src="assets/plugin/tinymce/plugins/autoresize/plugin.min.js "></script>
	<script src="assets/plugin/tinymce/plugins/autosave/plugin.min.js "></script>
	<script src="assets/plugin/tinymce/plugins/bbcode/plugin.min.js "></script>
	<script src="assets/plugin/tinymce/plugins/charmap/plugin.min.js "></script>
	<script src="assets/plugin/tinymce/plugins/code/plugin.min.js "></script>
	<script src="assets/plugin/tinymce/plugins/codesample/plugin.min.js "></script>
	<script src="assets/plugin/tinymce/plugins/colorpicker/plugin.min.js "></script>
	<script src="assets/plugin/tinymce/plugins/contextmenu/plugin.min.js "></script>
	<script src="assets/plugin/tinymce/plugins/directionality/plugin.min.js "></script>
	<script src="assets/plugin/tinymce/plugins/emoticons/plugin.min.js "></script>
	<script src="assets/plugin/tinymce/plugins/example/plugin.min.js "></script>
	<script src="assets/plugin/tinymce/plugins/example_dependency/plugin.min.js "></script>
	<script src="assets/plugin/tinymce/plugins/fullpage/plugin.min.js "></script>
	<script src="assets/plugin/tinymce/plugins/fullscreen/plugin.min.js "></script>
	<script src="assets/plugin/tinymce/plugins/hr/plugin.min.js "></script>
	<script src="assets/plugin/tinymce/plugins/image/plugin.min.js "></script>
	<script src="assets/plugin/tinymce/plugins/imagetools/plugin.min.js "></script>
	<script src="assets/plugin/tinymce/plugins/importcss/plugin.min.js "></script>
	<script src="assets/plugin/tinymce/plugins/insertdatetime/plugin.min.js "></script>
	<script src="assets/plugin/tinymce/plugins/layer/plugin.min.js "></script>
	<script src="assets/plugin/tinymce/plugins/legacyoutput/plugin.min.js "></script>
	<script src="assets/plugin/tinymce/plugins/link/plugin.min.js "></script>
	<script src="assets/plugin/tinymce/plugins/lists/plugin.min.js "></script>
	<script src="assets/plugin/tinymce/plugins/media/plugin.min.js "></script>
	<script src="assets/plugin/tinymce/plugins/nonbreaking/plugin.min.js "></script>
	<script src="assets/plugin/tinymce/plugins/noneditable/plugin.min.js "></script>
	<script src="assets/plugin/tinymce/plugins/pagebreak/plugin.min.js "></script>
	<script src="assets/plugin/tinymce/plugins/paste/plugin.min.js "></script>
	<script src="assets/plugin/tinymce/plugins/preview/plugin.min.js "></script>
	<script src="assets/plugin/tinymce/plugins/print/plugin.min.js "></script>
	<script src="assets/plugin/tinymce/plugins/save/plugin.min.js "></script>
	<script src="assets/plugin/tinymce/plugins/searchreplace/plugin.min.js "></script>
	<script src="assets/plugin/tinymce/plugins/spellchecker/plugin.min.js "></script>
	<script src="assets/plugin/tinymce/plugins/tabfocus/plugin.min.js "></script>
	<script src="assets/plugin/tinymce/plugins/table/plugin.min.js "></script>
	<script src="assets/plugin/tinymce/plugins/template/plugin.min.js "></script>
	<script src="assets/plugin/tinymce/plugins/textcolor/plugin.min.js "></script>
	<script src="assets/plugin/tinymce/plugins/textpattern/plugin.min.js "></script>
	<script src="assets/plugin/tinymce/plugins/visualblocks/plugin.min.js "></script>
	<script src="assets/plugin/tinymce/plugins/visualchars/plugin.min.js "></script>
	<script src="assets/plugin/tinymce/plugins/wordcount/plugin.min.js "></script>
	<script src="assets/plugin/tinymce/themes/modern/theme.min.js"></script>
	<!-- Plugin Files DON'T INCLUDES THESES FILES IF YOU USE IN THE HOST -->

	<script src="assets/scripts/tinymce.init.min.js"></script>

	<script src="assets/scripts/main.min.js"></script>