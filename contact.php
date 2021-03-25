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
                                <h3><a href="contact.php" class="ajax">Contacts</a></h3>
                            </li>
                        </ul>
                    </div>
					<!--=============== left colum ===============-->
                    <div class="left-colum vis-colum transition">
                        <div class="bg bg-parallax" style="background-image:url(images/contact.jpg)"> </div>
                    </div>
					<!--=============== right colum ===============-->
                    <div class="content right-colum  transition vis-colum2 ">
                        <div class="right-colum-wrapper" style="
    padding-right: 40px;
">
						<!--=============== contact info ===============-->
                            <section id="sec1">
                                <div class="container ">
                                    <h2>Contact info</h2>
                                    <div class="clearfix"></div>
                                    <p>You can get in touch with us for more information regarding Unseen.Art. Our contact information is given below. Feel free to contact us</p>
                                    <ul class="contact-info">
                                        <li>
                                            <a href="#" class="transition"><span>+91 6361366542 / +91 7045127770 / +91 9769727057</span></a>
                                        </li>
                                        <li>
                                            <a href="#" class="transition"><span>info@unscene.art / dipti@unscene.art /
cephas@unscene.art /
saurabh@unscene.art</span></a>
                                        </li>
                                       
                                    </ul>
                                    <a href="#sec2" class="scroll-link link-content">Write to Us</a>
                                </div>
                            </section>
                        </div>
                        <div class="right-colum-wrapper">
						<!--=============== contact form ===============-->
                            <section id="sec2">
                                <div class="container ">
                                    <h2>Get in Touch</h2>
                                    <div id="contact-form">
                                        

                                        <?php
include('admin/db.php');
 if(isset($_POST['save'])) {

            $name = $_POST['name']; 
            $email = $_POST['email'];   
            $subject = $_POST['subject'];   
            $message = $_POST['message'];   
            
            $save=mysqli_query($con,"INSERT INTO contactform (name,email,subject,message) VALUES ('$name','$email','$subject','$message')");
           ?>
                <script>
                alert('Thank You For Your Feedback ...');
               window.location.href='index.php';
                </script>
                <?php
        }                    
?> 
 

                                        <form method="post" action=""   enctype="multipart/form-data">
                                            <input name="name" type="text" id="name"  class="inputForm2"   value="Name" >
                                            
                                            <input name="subject" type="text" id="subject"   value="Subject" >          
                                            <textarea name="message"  id="message"  >Message</textarea>            										           											
                                           
                                 <input type="submit"  name="save" class="send_message transition" id="submit" value="Send Message" />
                                        </form>
                                    </div>
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
        </div><!-- Main end -->
        <!--=============== footer  ===============-->	
      <?php include "footer.php" ?>
        <!--=============== share  ===============-->	
    
      <?php include "allscript.php" ?>
    </body>

<!-- Mirrored from montage.kwst.net/site/contact.php by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 13 Mar 2021 09:08:48 GMT -->
</html>