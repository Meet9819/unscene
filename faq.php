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
                                <h3><a href="about.php" class="ajax">FAQ</a></h3>
                            </li>
                        </ul>
                    </div>
					 <!--=============== left colum ===============-->
                   
					 <!--=============== right colum ===============-->
                    <div style="width: 100%" class="content right-colum  transition vis-colum2 ">
                       
                        <div class="right-colum-wrapper"> 
                            <section id="sec2">
                                <div class="container-fluid ">
                                    <h2>Frequently Asked Question</h2>
                                    <div class="clearfix"></div>
									 <!--=============== 1 ===============-->  


                                      <?php include('admin/db.php');
 
                                        $result = mysqli_query($con,"SELECT * FROM faq order by id desc"); 
                                        $tmpCount = 1;
                                        while($row = mysqli_fetch_array($result))
                                        {

                                    echo '  



                                    <div class="services-box" style="">
                                        
                                        <div class="services-info" style="width:80%">
                                            <h4><b>'.$row['question'].'</b></h4>
                                            <p style="line-height: 20px;"> '.$row['answer'].'  </p>
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