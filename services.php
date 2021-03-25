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
					 <!--=============== page title ===============-->
                    <div class="page-title">
                        <ul>
                            <li>
                                <h3><a href="about.php" class="ajax">About Us</a></h3>
                            </li>
                        </ul>
                    </div>
					 <!--=============== left colum ===============-->
                    <div class="left-colum  transition">
                        <div class="top-title-text">
                            
                        </div>
                        <div class="bg bg-parallax" style="background-image:url(images/services.jpg)"> </div>
                    </div>
					 <!--=============== right colum ===============-->
                    <div class="content right-colum  transition vis-colum2 ">
                       
                        <div class="right-colum-wrapper">
                            <section id="sec2">
                                <div class="container ">
                                    <h2>Services</h2>
                                    <div class="clearfix"></div>
									 <!--=============== 1 ===============-->

                                     <?php include('admin/db.php');
 
                                        $result = mysqli_query($con,"SELECT * FROM services order by id desc"); 
                                        $tmpCount = 1;
                                        while($row = mysqli_fetch_array($result))
                                        {

                                    echo '  

                                    <div class="services-box">
                                        <div class="services-img">
                                            <a href="servicesdetail.php?q='.$row['id'].'"><img src="admin/media/services/'.$row['img'].'" alt="" class="respimg"></a>
                                        </div>
                                        <div class="services-info">
                                            <a href="servicesdetail.php?q='.$row['id'].'"> <h4><b>'.$row['experience'].'</b></h4> </a>
                                            <p> '.substr($row['description'],0,340).'..   </p> 
                                        </div>
                                    </div>
                                    '; } ?>

									 
                                   
                                     
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div><!-- wrapper end -->
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