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

                       <?php include('admin/db.php');
         $id = $_GET['q'];

         $result = mysqli_query($con,"SELECT * FROM blogs where id = $id "); 
         $tmpCount = 1;
         while($row = mysqli_fetch_array($result))
         {

            echo '  
                    <div class="page-title">
                        <ul>
                            <li>
                                <h3><a href="blog.php" class="ajax">Blogs</a></h3>
                            </li>
                            <li>
                                <h3><a href="blog.php" class="ajax">'.$row['title'].'</a></h3>
                            </li>
                        </ul>
                    </div>
                    <div class="content"> 
                        
						<!--=============== blog holder ===============-->
                        <div class="blog-holder">
                            <div class="grid-4">
                                <div class="posts-wrapper" id="sec1">
                                    <div class="grid-full">
                                        <div class="grid-full">
										<!--=============== post ===============-->
                                            <article>
                                               
                                                <div class="post-img">
                                                    <img src="admin/media/blogs/'.$row['img'].'" alt="" class="respimg">
                                                </div>

                                                <div class="post-title">'.$row['title'].'</div>
                                                <div class="post-info">
                                                     
                                                    <p>'.$row['detail'].'</p>
                                                    <p>'.$row['description'].'</p>
                                                    <p>'.$row['long_description'].'</p>  <div class="post-date">'.$row['name'].'</div>
                                                   <!-- <div class="post-autor">Posted : <a href="#"> Admin </a></div> -->
                                                </div>
                                            </article>
                                        </div>
                                       
                                    </div>
                                  
                                </div>
                            </div> '; } ?>

                            <!-- Begin Sidebar -->
                            <div class="grid-2">
                                <div class="sidebar">
                                    <div class="widgets-holder">
                                        <!-- categories widget -->
                                        <div class="widgets">
                                            <h4>Related Blogs</h4>
                                            <ul>
                                                   <?php include('admin/db.php');
 
                                        $result = mysqli_query($con,"SELECT * FROM blogs order by id desc"); 
                                        $tmpCount = 1;
                                        while($row = mysqli_fetch_array($result))
                                        {

                                    echo '   
                                                <li class="cat-item"><a  href="blogdetail.php?q='.$row['id'].'">'.$row['title'].'</a>

                                                    <p> '.substr($row['detail'],0,100).'...</p>
                                                </li> '; } ?>

                                            </ul>
                                        </div>
                                       
                                    </div>
                                </div>
                            </div>
                            <!-- End Sidebar -->
                        </div>
                    </div>
                </div>
            </div><!-- wrapper end -->
            <!--=============== Quick view  ===============-->	
            <div id="project-page-holder">
                <div id="project-page-data"></div>
            </div>
        </div><!-- Main end -->
        <!--=============== footer  ===============-->	
  <?php include "footer.php" ?>
        <!--=============== scripts  ===============-->
     <?php include "allscript.php" ?>
    </body>

<!-- Mirrored from montage.kwst.net/site/blog-single.php by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 13 Mar 2021 09:09:28 GMT -->
</html>