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
                                <h3><a href="index.php" class="ajax">Home</a></h3>
                            </li>
                        </ul>
                    </div>

                    <style type="text/css">
                     /*  @media screen and (max-width: 900px) {
                      .webslider { display: none;
                      }
                    }*/
                    </style>
                    <div class="webslider content full-height">

                        <div class=" swiper-container" id="vertical-slider">
                            <div class="swiper-wrapper">
						        <!--=============== 1 ===============-->	

                                   <?php include('admin/db.php');
 
                                        $result = mysqli_query($con,"SELECT * FROM slider  where md = 1"); 
                                        $tmpCount = 1;
                                        while($row = mysqli_fetch_array($result))
                                        {

                                    echo '  


                                <div class="swiper-slide bg" style="background-image:url(admin/media/slider/'.$row['img'].')">
                                    <div class="overlay"></div>
                                    <div class="slide-title-holder">
                                        <div class="slide-title">
                                            <h3 class="transition">  <span class="title-text">Unscene</span>  </h3>
                                           
                                            <span class="clearfix"></span>
                                         
                                        </div>
                                    </div>
                                </div> '; } ?>

							  
                            </div>
                            <div class="swiper-nav-holder ver">
                                <a class="swiper-nav arrow-left transition" href="#"><i class="fa fa-chevron-up"></i></a>
                                <a class="swiper-nav  arrow-right transition" href="#"><i class="fa fa-chevron-down"></i></a>
                            </div>
                            <div class="slides-counter">
                                <ul>
                                    <li><span class="presSlidesActive"></span></li>
                                    <li><span class="presSlidesFrom"></span></li>
                                </ul>
                            </div>
                        </div>
                        <div class="pagination"></div>

                    </div>


                    <!-- <style type="text/css">
                       @media screen and (min-width: 900px) {
                      .appslider { display: none;
                      }
                    }
                    </style>
                    <div class="appslider content full-height">

                        <div class=" swiper-container" id="vertical-slider">
                            <div class="swiper-wrapper">  

                                   <?php include('admin/db.php');
 
                                        $result = mysqli_query($con,"SELECT * FROM slider  where md = 2"); 
                                        $tmpCount = 1;
                                        while($row = mysqli_fetch_array($result))
                                        {

                                    echo '  


                                <div class="swiper-slide bg" style="background-image:url(admin/media/slider/'.$row['img'].')">
                                    <div class="overlay"></div>
                                    <div class="slide-title-holder">
                                        <div class="slide-title">
                                            <h3 class="transition">  <span class="title-text">Unscene</span>  </h3>
                                           
                                            <span class="clearfix"></span>
                                         
                                        </div>
                                    </div>
                                </div> '; } ?>

                              
                            </div>
                            <div class="swiper-nav-holder ver">
                                <a class="swiper-nav arrow-left transition" href="#"><i class="fa fa-chevron-up"></i></a>
                                <a class="swiper-nav  arrow-right transition" href="#"><i class="fa fa-chevron-down"></i></a>
                            </div>
                            <div class="slides-counter">
                                <ul>
                                    <li><span class="presSlidesActive"></span></li>
                                    <li><span class="presSlidesFrom"></span></li>
                                </ul>
                            </div>
                        </div>
                        <div class="pagination"></div>

                    </div> -->
 
                </div>
            </div> <!-- wrapper end -->
			<!--=============== Quick view  ===============-->	
            <div id="project-page-holder">
                <div id="project-page-data"></div>
            </div>
        </div> <!-- Main end -->
		<!--=============== footer  ===============-->	
      <?php include "footer.php" ?>
		<!--=============== scripts  ===============-->
      <?php include "allscript.php" ?>
    </body>

<!-- Mirrored from montage.kwst.net/site/index.php by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 13 Mar 2021 09:04:38 GMT -->
</html>