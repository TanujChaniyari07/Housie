<?php
session_start();
include('includes/config.php');
error_reporting(0);
if(strlen($_SESSION['login'])==0)
  { 
header('location:LoginSignUp.php');
}
else{
    $UserEmailId = $_SESSION['login'];
    $sql =mysqli_query($con,"SELECT SocietyPin FROM tbluser1 WHERE UserEmailId='$UserEmailId'");
$sql_result = mysqli_fetch_assoc($sql);
$SocietyPin= $sql_result['SocietyPin'];
$sql1 =mysqli_query($con,"SELECT id FROM tbluser1 WHERE UserEmailId='$UserEmailId'");
$sql_result1 = mysqli_fetch_assoc($sql1);
$id= $sql_result['id'];
 $UserEmailId = $_SESSION['login'];
    $sql =mysqli_query($con,"SELECT SocietyPin,UserName,house_no FROM tbluser1 WHERE UserEmailId='$UserEmailId'");
$sql_result = mysqli_fetch_assoc($sql);
$SocietyPin= $sql_result['SocietyPin'];
$UserName = $sql_result['UserName'];
$house_no = $sql_result['house_no'];
$sql1 =mysqli_query($con,"SELECT SocietyName FROM tbladmin1 WHERE SocietyPin='$SocietyPin'");
$sql_result1 = mysqli_fetch_assoc($sql1);
$SocietyName= $sql_result1['SocietyName'];
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title>Society Managment System</title>

    <!-- Favicon -->
    <!-- <link rel="icon" href="./img/core-img/favicon.png">
 -->
    <!-- Stylesheet -->
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <!-- Preloader -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- /Preloader -->

    <!-- Top Search Form Area -->
<!--     <div class="top-search-area">
        <div class="modal fade" id="searchModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        Close 
                        <button type="button" class="btn close-btn" data-dismiss="modal"><i class="ti-close"></i></button>
                        Form 
                        <form action="index.html" method="post">
                            <input type="search" name="top-search-bar" class="form-control" placeholder="Search and hit enter...">
                            <button type="submit">Search</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> -->

    <!-- Header Area Start -->
    <header class="header-area">
        <!-- Main Header Start -->
        <div class="main-header-area">
            <div class="classy-nav-container breakpoint-off">
                <div class="container">
                    <!-- Classy Menu -->
                    <nav class="classy-navbar justify-content-between" id="alimeNav">

                        <!-- Logo -->
                        <!-- <a class="nav-brand" href="./index.html"><img src="./img/core-img/logo.png" alt=""></a> -->

                        <!-- Navbar Toggler -->
                        <div class="classy-navbar-toggler">
                            <span class="navbarToggler"><span></span><span></span><span></span></span>
                        </div>

                        <!-- Menu -->
                        <div class="classy-menu">
                            <!-- Menu Close Button -->
                            <div class="classycloseIcon">
                                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                            </div>
                            <!-- Nav Start -->
                            <div class="classynav">
                                <ul id="nav">
                                         <li ><a href="" class="active">&nbsp;<?php echo htmlentities($UserName);?></a>
                                        <ul class="dropdown">
                                            <li><a><?php echo htmlentities($house_no);?>, <?php echo htmlentities($SocietyName);?></a></li>
                                            <li><a href="./edit-profile1.php">Edit Profile</a></li>
                                            <li><a href="./change-pass.php">Change Password</a></li>
                                            <li ><a href="./logout.php">Logout</a></li> 

                                            
                                           <!--  <li><a href="#">- Dropdown</a>
                                                <ul class="dropdown">
                                                    <li><a href="#">- Dropdown Item</a></li>
                                                    <li><a href="#">- Dropdown Item</a></li>
                                                    <li><a href="#">- Dropdown Item</a></li>
                                                    <li><a href="#">- Dropdown Item</a></li>
                                                </ul>
                                            </li> -->
                                        </ul>
                                    </li>
                                    <li ><a href="./index.php">Home</a></li>    
                                     
                                    <li ><a href="" class="active">Our&nbsp;Services</a>
                                        <ul class="dropdown">
                                            <li><a href="./Helpline.php">- Helpline Numbers</a></li>
                                            <li><a href="./Announcements.php">- Announcements</a></li>
                                            <li><a href="./maint.php">- Maintenance</a></li>
                                           <li><a href="chats.php">- Chat</a></li>
                                            <li><a href="Documents.php">- Documents</a></li>
                                             <li><a href="polls.php">- Polls</a></li>
                                             <li><a href="visitor.php">- Visitor</a></li>
                                             <li><a href="./complaint.php">- Complaints</a></li>
                                                                                       <li><a href="./Clubhouse.php">- Club House Booking</a></li>
                                           <!--  <li><a href="#">- Dropdown</a>
                                                <ul class="dropdown">
                                                    <li><a href="#">- Dropdown Item</a></li>
                                                    <li><a href="#">- Dropdown Item</a></li>
                                                    <li><a href="#">- Dropdown Item</a></li>
                                                    <li><a href="#">- Dropdown Item</a></li>
                                                </ul>
                                            </li> -->
                                        </ul>
                                    </li>
                                    <li><a href="./about.html">About Us</a></li>
                                    <!-- <li><a href="./gallery.html">Our Team</a></li> -->
                                    <!-- <li><a href="./blog.html">Blog</a></li> -->
                                    
                             
                                </ul>

                                <!-- Search Icon -->
                                
                            </div>
                            <!-- Nav End -->
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- Header Area End -->

    <!-- 
    <section class="welcome-area">
        <div class="welcome-slides owl-carousel">
                       <div class="single-welcome-slide bg-img bg-overlay" style="background-image: url(img/bg-img/Home_bg.jpg);">
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                                                <div class="col-12 col-lg-8 col-xl-6">
                            <div class="welcome-text">
                                <h2 data-animation="bounceInDown" data-delay="600ms">Hello <br>I'm Jackson</h2>
                                <p data-animation="bounceInDown" data-delay="500ms">I photograph very instinctively. I see how it is taken like that. I do not follow certain styles, philosophies or teachers.</p>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            
            <div class="single-welcome-slide bg-img bg-overlay" style="background-image: url(img/bg-img/Home_2_bg.jpg);">
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        
                        <div class="col-12 col-lg-8 col-xl-6">
                            <div class="welcome-text">
                                <h2 data-animation="bounceInUp" data-delay="100ms">Hello <br>I'm Alime</h2>
                                <p data-animation="bounceInUp" data-delay="300ms">I photograph very instinctively. I see how it is taken like that. I do not follow certain styles, philosophies or teachers.</p>
                                                           </div>
                        </div>
                    </div>
                </div>
    
            </div>
        </div>
    </section> -->
    <!-- Welcome Area End -->

    <!-- Gallery Area Start -->
<!--     <div class="alime-portfolio-area section-padding-80 clearfix">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                     Projects Menu 
                    <div class="alime-projects-menu">
                        <div class="portfolio-menu text-center">
                            <button class="btn active" data-filter="*">All</button>
                            <button class="btn" data-filter=".human">Human</button>
                            <button class="btn" data-filter=".nature">Nature</button>
                            <button class="btn" data-filter=".country">Country</button>
                            <button class="btn" data-filter=".video">Video</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row alime-portfolio">
                Single Gallery Item
                <div class="col-12 col-sm-6 col-lg-3 single_gallery_item nature mb-30 wow fadeInUp" data-wow-delay="100ms">
                    <div class="single-portfolio-content">
                        <img src="img/bg-img/3.jpg" alt="">
                        <div class="hover-content">
                            <a href="img/bg-img/3.jpg" class="portfolio-img">+</a>
                        </div>
                    </div>
                </div>

                Single Gallery Item
                <div class="col-12 col-sm-6 col-lg-3 single_gallery_item video human mb-30 wow fadeInUp" data-wow-delay="300ms">
                    <div class="single-portfolio-content">
                        <img src="img/bg-img/4.jpg" alt="">
                        <div class="hover-content">
                            <a href="img/bg-img/4.jpg" class="portfolio-img">+</a>
                        </div>
                    </div>
                </div>

               
                <div class="col-12 col-sm-6 col-lg-3 single_gallery_item country mb-30 wow fadeInUp" data-wow-delay="500ms">
                    <div class="single-portfolio-content">
                        <img src="img/bg-img/5.jpg" alt="">
                        <div class="hover-content">
                            <a href="img/bg-img/5.jpg" class="portfolio-img">+</a>
                        </div>
                    </div>
                </div>

                Single Gallery Item
                <div class="col-12 col-sm-6 col-lg-3 single_gallery_item human mb-30 wow fadeInUp" data-wow-delay="700ms">
                    <div class="single-portfolio-content">
                        <img src="img/bg-img/6.jpg" alt="">
                        <div class="hover-content">
                            <a href="img/bg-img/6.jpg" class="portfolio-img">+</a>
                        </div>
                    </div>
                </div>

                
                <div class="col-12 col-sm-6 col-lg-3 single_gallery_item nature mb-30 wow fadeInUp" data-wow-delay="100ms">
                    <div class="single-portfolio-content">
                        <img src="img/bg-img/7.jpg" alt="">
                        <div class="hover-content">
                            <a href="img/bg-img/7.jpg" class="portfolio-img">+</a>
                        </div>
                    </div>
                </div>

                
                <div class="col-12 col-sm-6 col-lg-3 single_gallery_item video country mb-30 wow fadeInUp" data-wow-delay="300ms">
                    <div class="single-portfolio-content">
                        <img src="img/bg-img/8.jpg" alt="">
                        <div class="hover-content">
                            <a href="img/bg-img/8.jpg" class="portfolio-img">+</a>
                        </div>
                    </div>
                </div>

                
                <div class="col-12 col-sm-6 col-lg-3 single_gallery_item human mb-30 wow fadeInUp" data-wow-delay="500ms">
                    <div class="single-portfolio-content">
                        <img src="img/bg-img/10.jpg" alt="">
                        <div class="hover-content">
                            <a href="img/bg-img/10.jpg" class="portfolio-img">+</a>
                        </div>
                    </div>
                </div>

              
                <div class="col-12 col-sm-6 col-lg-3 single_gallery_item nature mb-30 wow fadeInUp" data-wow-delay="700ms">
                    <div class="single-portfolio-content">
                        <img src="img/bg-img/9.jpg" alt="">
                        <div class="hover-content">
                            <a href="img/bg-img/9.jpg" class="portfolio-img">+</a>
                        </div>
                    </div>
                </div>

                
                <div class="col-12 col-sm-6 col-lg-6 single_gallery_item video country mb-30 wow fadeInUp" data-wow-delay="100ms">
                    <div class="single-portfolio-content">
                        <img src="img/bg-img/36.jpg" alt="">
                        <div class="hover-content">
                            <a href="img/bg-img/36.jpg" class="portfolio-img">+</a>
                        </div>
                    </div>
                </div>

                
                <div class="col-12 col-sm-6 col-lg-3 single_gallery_item human mb-30 wow fadeInUp" data-wow-delay="300ms">
                    <div class="single-portfolio-content">
                        <img src="img/bg-img/37.jpg" alt="">
                        <div class="hover-content">
                            <a href="img/bg-img/37.jpg" class="portfolio-img">+</a>
                        </div>
                    </div>
                </div>

                
                <div class="col-12 col-sm-6 col-lg-3 single_gallery_item country mb-30 wow fadeInUp" data-wow-delay="500ms">
                    <div class="single-portfolio-content">
                        <img src="img/bg-img/5.jpg" alt="">
                        <div class="hover-content">
                            <a href="img/bg-img/5.jpg" class="portfolio-img">+</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 text-center wow fadeInUp" data-wow-delay="700ms">
                    <a href="#" class="btn alime-btn btn-2 mt-15">View More</a>
                </div>
            </div>
        </div>
    </div>
    -->

    <section class="breadcrumb-area bg-img bg-overlay jarallax" style="background-image: url(img/bg-img/About_bg.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcrumb-content text-center">
                        <h2 class="page-title">Our Services</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href=""><i></i>Our Services</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Clubhouse Booking</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>


      <div class="site-section">
        
      <div class="container">
        <div class="row justify-content-center text-center">
          <div class="col-md-7 mb-5">
            <h2 style="padding-top: 50px;">HELPLINE NUMBERS</h2>
      
          </div>
        </div>

        <div class="row">
                              <?php 
$query=mysqli_query($con,"Select id,HelplineName,HelplineCategory,HelplineNumber from  tblhelpline where Is_Active=1 AND SocietyPin='$SocietyPin'");
$cnt=1;
while($row=mysqli_fetch_array($query))
{
?> 
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
            <div class="feature-1">
              <span class="wrap-icon">
                <span class="icon-face"></span>
              </span>
              <h3><?php echo htmlentities($row['HelplineName']);?></h3>
              <p>Profession: <?php echo htmlentities($row['HelplineCategory']);?><br>Contact: <?php echo htmlentities($row['HelplineNumber']);?></p>
            </div>
          </div>
          <?php
$cnt++;
 } ?>
        </div>

       
   <!--  <section class="follow-area clearfix">
        <div class="container" style="padding-top: 20px;">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading text-center">
                        <h2>Follow Instagram</h2>
                        <p>@Alime_photographer</p>
                    </div>
                </div>
            </div>
        </div> -->

        <!-- Instagram Feed Area -->
  <!--       <div class="instragram-feed-area owl-carousel">
            
            <div class="single-instagram-item">
                <img src="img/bg-img/11.jpg" alt="">
                <div class="instagram-hover-content text-center d-flex align-items-center justify-content-center">
                    <a href="#">
                        <i class="ti-instagram" aria-hidden="true"></i>
                        <span>Alime_photographer</span>
                    </a>
                </div>
            </div>
       
            <div class="single-instagram-item">
                <img src="img/bg-img/12.jpg" alt="">
                <div class="instagram-hover-content text-center d-flex align-items-center justify-content-center">
                    <a href="#">
                        <i class="ti-instagram" aria-hidden="true"></i>
                        <span>Alime_photographer</span>
                    </a>
                </div>
            </div>
           
            <div class="single-instagram-item">
                <img src="img/bg-img/13.jpg" alt="">
                <div class="instagram-hover-content text-center d-flex align-items-center justify-content-center">
                    <a href="#">
                        <i class="ti-instagram" aria-hidden="true"></i>
                        <span>Alime_photographer</span>
                    </a>
                </div>
            </div>
            
            <div class="single-instagram-item">
                <img src="img/bg-img/14.jpg" alt="">
                <div class="instagram-hover-content text-center d-flex align-items-center justify-content-center">
                    <a href="#">
                        <i class="ti-instagram" aria-hidden="true"></i>
                        <span>Alime_photographer</span>
                    </a>
                </div>
            </div>
            
            <div class="single-instagram-item">
                <img src="img/bg-img/15.jpg" alt="">
                <div class="instagram-hover-content text-center d-flex align-items-center justify-content-center">
                    <a href="#">
                        <i class="ti-instagram" aria-hidden="true"></i>
                        <span>Alime_photographer</span>
                    </a>
                </div>
            </div>
           
            <div class="single-instagram-item">
                <img src="img/bg-img/16.jpg" alt="">
                <div class="instagram-hover-content text-center d-flex align-items-center justify-content-center">
                    <a href="#">
                        <i class="ti-instagram" aria-hidden="true"></i>
                        <span>Alime_photographer</span>
                    </a>
                </div>
            </div>
        </div>
    </section>
  -->

    <!-- Footer Area Start -->
    <footer class="footer-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="footer-content d-flex align-items-center justify-content-between">
                       
                        <!-- Footer Logo -->
                        <!-- <div class="footer-logo">
                            <a href="#"><img src="img/core-img/logo2.png" alt=""></a>
                        </div> -->
                        <!-- 
                        <div class="social-info">
                            <a href="#"><i class="ti-facebook" aria-hidden="true"></i></a>
                            <a href="#"><i class="ti-twitter-alt" aria-hidden="true"></i></a>
                            <a href="#"><i class="ti-linkedin" aria-hidden="true"></i></a>
                            <a href="#"><i class="ti-pinterest" aria-hidden="true"></i></a>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Area End -->

    <!-- **** All JS Files ***** -->
    <!-- jQuery 2.2.4 -->
    <script src="js/jquery.min.js"></script>
    <!-- Popper -->
    <script src="js/popper.min.js"></script>
    <!-- Bootstrap -->
    <script src="js/bootstrap.min.js"></script>
    <!-- All Plugins -->
    <script src="js/alime.bundle.js"></script>
    <!-- Active -->
    <script src="js/default-assets/active.js"></script>

</body>

</html>
<?php } ?>