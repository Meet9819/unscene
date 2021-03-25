<?php include "allcss.php" ?>
    <body>
        <!--================= main start ================-->
        <div id="main">
            <!--=============== header ===============-->   
           <?php include "header.php" ?>
             <!--=============== wrapper ===============-->
            <div id="wrapper">
                <div class="content-holder elem scale-bg2 transition3" >
                    <div class="header-overlay"></div>


     <?php include('admin/db.php');
         $id = $_GET['q'];

         $result = mysqli_query($con,"SELECT * FROM services where id = $id "); 
         $tmpCount = 1;
         while($row = mysqli_fetch_array($result))
         {

            echo '   
                    <div class="page-title">
                        <ul>
                            <li>
                                <h3><a href="services.php" class="ajax">Services</a></h3>
                            </li>
                            <li>
                                <h3><a href="services.php" class="ajax"> '.$row['experience'].'  </a></h3>
                            </li>
                        </ul>
                    </div> 


                    <div class="left-colum vis-colum transition">
                        <div class="top-title-text">
                           
                            <p><a href="#sec1" class="scroll-link">'.$row['experience'].' </a></p>
                        </div>
                        <div class="bg bg-parallax" style="background-image:url(admin/media/services/'.$row['img'].')"> </div>
                    </div>
                    <div class="content right-colum  transition vis-colum2 ">
                        
                        <div class="right-colum-wrapper">
                            <section>
                                <div class="container ">
                                    <h2>'.$row['experience'].' </h2>
                                    <div class="clearfix"></div>
                                    <p>'.$row['description'].' </p><br>
                                    <p>'.$row['long_description'].' </p>
                                   <br><br>


                                      '; } ?>

                                    <div class="clearfix"></div>
                                    <!--=============== Gallery ===============-->	


                                    

                                    <div class="gallery-items popup-gallery three-coulms st-3" id="sec1">
                                        <div class="grid-sizer grid-sizer-three"></div>
                                        <!--1-->
                                          <?php include('admin/db.php');
         $id = $_GET['q'];

         $result = mysqli_query($con,"SELECT * FROM services where id != $id "); 
         $tmpCount = 1;
         while($row = mysqli_fetch_array($result))
         {

            echo '   	
                                        <div class="gallery-item gallery-item-three">
                                            <div class="grid-item-holder">
                                                <a href="admin/media/services/'.$row['img'].'">
                                                <img  src="admin/media/services/'.$row['img'].'" class="transition" alt="">
                                                </a>

                                            </div>   <h2>'.$row['experience'].' </h2> 
                                        </div>
                                        '; } ?>

                                       
                                      
                                    </div>
                                    <!-- end gallery items -->
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
            <!-- wrapper end -->
            <!--=============== Quick view  ===============-->	
            <div id="project-page-holder">
                <div id="project-page-data"></div>
            </div>
        </div>
       <!-- Main end -->
        <!--=============== footer  ===============-->  
       <?php include "footer.php" ?>
        <!--=============== scripts  ===============-->
       <?php include "allscript.php" ?>
    </body>

<!-- Mirrored from montage.kwst.net/site/about.php by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 13 Mar 2021 09:08:34 GMT -->
</html>