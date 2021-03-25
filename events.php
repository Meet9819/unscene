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
                                <h3><a href="blog.php" class="ajax">Events</a></h3>
                            </li>
                        </ul>
                    </div>
                    <div class="content">
					<!--=============== blog header ===============-->
                        <div class="blog-header" >
                            <div class="bg bg-parallax" style="background-image:url(images/blog.jpg)"> </div>
                            <div class="top-title-text">
                                <h2>Events</h2> 
                            </div>
                        </div>
						<!--=============== blog holder ===============-->
                        <div class="blog-holder">
                            <div class="grid-4">
                                <div class="posts-wrapper" id="sec1">
                                    <div class="grid-full">


                                           <?php include('admin/db.php');
 
                                        $result = mysqli_query($con,"SELECT * FROM events order by id desc"); 
                                        $tmpCount = 1;
                                        while($row = mysqli_fetch_array($result))
                                        {

                                    echo '   

                                        <div class="grid-8"> 
                                            <article  data-sr="enter top over 1s wait 0.2s">
                                              <div class="post-date">'.$row['datee'].'</div>

                                                <div class="post-img">
                                                    <a href="eventsdetail.php?q='.$row['id'].'" class="ajax">
                                                   
                                                    <span class="overlay transition2"></span>
                                                    <img style="height:300px" src="admin/media/events/'.$row['img'].'" alt="" class="respimg">
                                                    </a>
                                                </div>
                                                <div class="post-info">
                                                    <h3><a href="eventsdetail.php?q='.$row['id'].'" class="ajax">'.$row['title'].'</a></h3>
                                                    <p> '.substr($row['description'],0,200).'.. </p>
                                                </div>
                                            </article>
                                        </div> 

                                        ';} ?>

                                      
                                    </div>
                                   
                                </div>
                            </div>
                            <!-- Begin Sidebar -->
                            <div class="grid-2">
                                <div class="sidebar">
                                    <div class="widgets-holder">
                                        <!-- categories widget -->
                                        <div class="widgets">
                                            <h4>Related Events</h4>
                                            <ul>
                                                   <?php include('admin/db.php');
 
                                        $result = mysqli_query($con,"SELECT * FROM events order by id desc"); 
                                        $tmpCount = 1;
                                        while($row = mysqli_fetch_array($result))
                                        {

                                         echo '<li class="cat-item"><a  href="blogdetail.php?q='.$row['id'].'">'.$row['title'].'</a>  <p> '.substr($row['description'],0,100).'...</p></li> '; } ?>

                                            </ul>
                                        </div>
                                       
                                    </div>
                                </div>
                            </div>
                            <!-- End Sidebar -->
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

<!-- Mirrored from montage.kwst.net/site/blog.php by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 13 Mar 2021 09:08:48 GMT -->
</html>