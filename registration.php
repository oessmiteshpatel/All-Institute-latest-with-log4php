
<?php 
include("admin/connect.php");

		session_start();
		$MODE=MODE;

		
$FROMNAME=FROMNAME;
 $USERNAME=USERNAME;
 $USERPASSWORD=USERPASSWORD;
 $SETFROM=SETFROM;
 $SETTO=SETTO;
?>

<script type='text/javascript'  src="js/jquery-2.1.1.min.js"></script>
<script src="js_new/bootstrap.min.js" type="text/javascript"></script>

<!-- <script>
$(document).ready(function () {
    if(window.location.href.indexOf("check=0") > -1) {
        $('#register_success2').css('display','block');
   
     setTimeout(function() {
        $('#register_success2').css('display','none');

				var my_variable_name = window.location.href;
        
        var success = my_variable_name.replace("?check=0", '');
        
        window.location.replace(success);

    }, 10000);
}
});
</script> -->

<script>
									<?php
					if(isset($_GET['cid']))
					{

						?>
					var check = <?php echo $_SESSION['check'];?> 
						
						<?php
						unset($_SESSION['check']);
					}
					?>
					$(document).ready(function () {
						if(check==7) {
							//if(cid){
							$('#register_success2').css('display','block');
					
						setTimeout(function() {
							$('#register_success2').css('display','none');

									var my_variable_name = window.location.href;
							
							var success = my_variable_name.replace("?check=0", '');
							
							//window.location.replace(success);

						}, 10000);
					}
					});
					</script>




<?php
 include("log4php/Logger.php");
include("Lib_log.php");


Logger::configure('multiple.xml');
 $log;
 $log=Logger::getLogger('dberror');

 $vars = new Lib_log(); 
//  $severity="";
//  $message="";
//  $filepath="";
//  $line="";
//  $val = $vars->error_handler($severity, $message, $filepath, $line);

$res=mysql_query("SELECT * FROM tblcourse Where CourseID = '".$_REQUEST['cid']."'");


$data=mysql_fetch_array($res);
if($data['CourseID']=='')
{
	echo "<script>window.location='404.php';</script>";
}
$cid=$_REQUEST['cid'];


//print_r($data);
?>







<!doctype html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
<title>ALL-Institute | Register page</title>
<link rel="apple-touch-icon" href="image/favicon-apple.png">
<link rel="icon" href="image/favicon.png">
<link rel="pingback" href="http://tritraining.edu.au/xmlrpc.php">
<!-- 1 <link rel="stylesheet" href="css/font-awesome.min.css">
<link type="text/css" media="screen" rel="stylesheet" href="css/awwwards.css" />
<link type="text/css" media="screen" rel="stylesheet" href="css/fastfonts.css" /> -->


<link rel="stylesheet" href="css_new/all_ins.css">	
<!-- Normalize CSS -->
<!-- <link rel="stylesheet" href="css_new/normalize.css"> -->
<!-- Main CSS -->
<!-- <link rel="stylesheet" href="css_new/main.css"> -->
<!-- Bootstrap CSS -->
<!-- <link rel="stylesheet" href="css_new/bootstrap.min.css"> -->
<!-- Animate CSS -->
<!-- <link rel="stylesheet" href="css_new/animate.min.css"> -->
<!-- Font-awesome CSS-->
<link rel="stylesheet" href="css_new/font-awesome.min.css">
<!-- Owl Caousel CSS -->
    <link rel="stylesheet" href="vendor/OwlCarousel/owl.carousel.min.css">
    <link rel="stylesheet" href="vendor/OwlCarousel/owl.theme.default.min.css">
    <!-- Main Menu CSS -->
<!-- <link rel="stylesheet" href="css_new/meanmenu.min.css"> -->
<!-- nivo slider CSS -->
<!-- <link rel="stylesheet" href="vendor/slider/css/nivo-slider.css" type="text/css" /> -->
<!-- <link rel="stylesheet" href="vendor/slider/css/preview.css" type="text/css" media="screen" /> -->
<!-- Datetime Picker Style CSS -->
<link rel="stylesheet" href="css_new/jquery.datetimepicker.css">
<!-- Magic popup CSS -->
<!-- <link rel="stylesheet" href="css_new/magnific-popup.css"> -->
<!-- Switch Style CSS -->
<link rel="stylesheet" href="css_new/hover-min.css">
<!-- Custom CSS -->
<link rel="stylesheet" href="css_new/style.css">
<!-- Modernizr Js -->
<!-- <script src="js_new/modernizr-2.8.3.min.js"></script>
<script src="js/jquery-2.1.1.min.js"></script> -->
<!-- <script src="js/bootstrap.min.js"></script> -->
<script>
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>	
<style>
[data-tip] {
	position:relative;
	
}
[data-tip]:before {
	content:'';
	/* hides the tooltip when not hovered */
	display:none;
	content:'';
	border-left: 5px solid transparent;
	border-right: 5px solid transparent;
	border-bottom: 5px solid #1a1a1a;	
	position:absolute;
	top:40px;
	left:35px;
	z-index:8;
	font-size:0;
	line-height:0;
	width:0;
	height:0;
}
[data-tip]:after {
	display:none;
	content:attr(data-tip);
	position:absolute;
	top:45px;
	left:0px;
	padding:5px 8px;
	background:#fff;
	color:#000;
	z-index:9;
	font-size: 13px;
	line-height:18px;
	-webkit-border-radius: 3px;
	-moz-border-radius: 3px;
	border-radius: 3px;
	white-space:normal; border:1px solid #000;
	word-wrap:normal; width:90%; height:45px; box-shadow:5px 5px 7px rgba(0,0,0,0.3); font-family:arial; text-align:left;
}
[data-tip]:hover:before,
[data-tip]:hover:after {
	display:block;
}

h3.sidebar-title {
	font-size: 22px;
	color: #002147;
	text-transform: capitalize;
	margin-bottom: 35px;
	position: relative;
	font-weight: 500;
	text-align: left;
}

.fontnone
{
	text-transform: none !important;
}

/* .fa {
    margin-top: 13px;
} */
#scrollUp{padding:13px 0;}
.title-default-left {
	text-transform: capitalize;
	text-align: left;
	font-weight: 700;
	font-size: 28px;
	margin-bottom: 45px;
	color: #002147;
}
.course-details-inner .course-details-tab-area ul.course-details-tab-btn > li a {
	font-weight: 700;
}
.related-courses-title-area h3 {
	text-align: left;
	font-size: 22px;
	font-weight: 700;
}
.owl-nav {
	padding-top: 15px;
}
.enroll-btn {
	color: #002147;
	padding: 18px 0;
	background: #ffffff;
	text-transform: uppercase;
	font-size: 14px;
	font-weight: 700;
	display: inline-block;
	border: #C4161C;
	width: 100%;
	border: 2px solid #C4161C;
	text-align: center;
	-webkit-transition: all 0.5s ease-out;
	-moz-transition: all 0.5s ease-out;
	-ms-transition: all 0.5s ease-out;
	-o-transition: all 0.5s ease-out;
	transition: all 0.5s ease-out;
}
.enroll-btn:hover {
	background-color: #C4161C;
	color: #ffffff !important;
}
h3.sidebar-title:before {
	content: "";
	height: 3px;
	width: 40px;
	position: absolute;
	left: 0;
	bottom: -15px;
	z-index: 1;
	background: #C4161C !important;
}
.courses-box1 .single-item-wrapper .courses-img-wrapper:before {
	background-color: rgba(250, 0, 0, 0.8) !important;
}
ol, ul {
	padding: 0;
	list-style-type: none;
	text-align: left !important;
}
#accordion .panel-default .panel-heading a {
	outline: none;
	display: block;
	padding: 1px !important;
	text-align: center;
}
.curriculum-wrapper .panel-default .panel-heading .panel-title a ul li:nth-child(3n) {
	font-size: 16px;
	color: #002147;
	font-weight: 700;
}
dl, menu, ol, ul {
}
h4 {
	font-family: 'Roboto', sans-serif;
	line-height: 1.5 !important;
	font-weight: 300 !important;
	margin: 0 0 20px 0;
	color: #212121;
}
h3 {
	text-align: left !important;
	font-family: 'Roboto', sans-serif;
	line-height: 1.5;
	font-weight: 600 !important;
	color: #212121;
}
</style>
<style type="text/css">
img.wp-smiley, img.emoji {
	display: inline !important;
	border: none !important;
	box-shadow: none !important;
	height: 1em !important;
	width: 1em !important;
	margin: 0 .07em !important;
	vertical-align: -0.1em !important;
	background: none !important;
	padding: 0 !important;
}
.btn-t{
	margin-top:10px;
}
a:hover, a:visited:hover {
    text-decoration: none;
    color: #ffffff;
}
.areview
{
  margin-top:8px !important;
}
.courses-box1 .single-item-wrapper .courses-content-wrapper .item-title a:hover
{
	 color: #C4161C !important;
}
.courses-box1 .single-item-wrapper .courses-content-wrapper .courses-info li
{
	padding-right: 10px !important;
}


h3.sidebar-title
{
	font-size: 16px !important;

}

.registration-form .btn
 {
    width: 51% !important;
}
.courses-box1 .single-item-wrapper .courses-img-wrapper a
{
	height:70px !important;
	width:70px !important;
}
.courses-page-area5 
{
    padding: 30px 0 70px !important;
}
.hentry header, .homepage-article header, .blog-article header
 {
     padding: 0em 0em !important; 
}
.courses-content-wrapper ul
{
	margin: 1em -10px !important;
}

.course-details-tab-btn{margin: 1em 5px !important;}
.course-details-skilled-lecturers{margin: 0 !important;}
/*ul 
{
    margin: 1em -15px !important;
}*/
</style>
<!-- <link rel='stylesheet' id='ajax-load-more-css'  href='css/ajax-load-more.css' type='text/css' media='all' />
<link rel='stylesheet' id='rs-plugin-settings-css'  href='css/settings.css' type='text/css' media='all' /> -->
<style id='rs-plugin-settings-inline-css' type='text/css'>
.tp-caption a {
	color: #ff7302;
	text-shadow: none;
	-webkit-transition: all 0.2s ease-out;
	-moz-transition: all 0.2s ease-out;
	-o-transition: all 0.2s ease-out;
	-ms-transition: all 0.2s ease-out
}
.tp-caption a:hover {
	color: #ffa902
}

.add
{
	margin-top: 22px !important;
}
input.address
{
  max-width: 100% !important;
}

.none{display:none !important;}
.smallfonts li
{
	font-size:12px!important;
}
	.registration-form .btn {
    width: 100%!important;  max-width: 400px!important;
}
</style>
<!-- <link rel='stylesheet' id='cpsh-shortcodes-css'  href='css/shortcodes.css' type='text/css' media='all' /> -->
<link rel='stylesheet' id='bones-boot-css'  href='css/bootstrap.min.css' type='text/css' media='all' />
<!-- <link rel='stylesheet' id='bones-magnafic-css'  href='css/magnific-popup.css' type='text/css' media='all' /> -->
<!-- <link rel='stylesheet' id='bones-animate-css'  href='css/animate.css' type='text/css' media='all' /> -->
<link rel='stylesheet' id='bones-stylesheet-css'  href='css/style.css' type='text/css' media='all' />
<!-- <link rel='stylesheet' id='bones-icons-css'  href='css/icons.css' type='text/css' media='all' /> -->
<!-- <link rel='stylesheet' id='googleFonts-css'  href='http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic' type='text/css' media='all' /> -->
</head>

<body class="home page page-id-2 page-template page-template-page-home single single-team page-template-page-home-php desktop">
<div class="<?php echo $MODE; ?>"></div>
<div id="container">
<div id="custom-content-popup" class="white-popup mfp-hide"> </div>
<header id="header_new">
			<div class="container">
				<div class="row">
					<!-- Logo -->
					<div class="col-md-3 col-sm-3 col-xs-3">
						<div class="logo post_animation3"> <a id="logo" href="index.php" rel="nofollow"><img src="image/logo.png" ></a> </div>
					</div>
					<!-- End Logo -->

					<!-- Navigation -->
					<div class="col-md-9 col-sm-9 col-xs-9">
						<div class="center align-right pull-right"><a href="http://www.aerexperts.com/" target="_blank" title="Opens in a new window" class="aere-button">Visit AERE</a> </div>
						<div class="clearfix"></div>
						<nav>
							<div role="navigation" class="navbar navigation post_animation3">
								<div class="navbar-header">
									<button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button"> <span class="sr-only"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
									<div class="navbar-collapse collapse">
										<ul class="nav navbar-nav">
											<li id="menu-item-75" class="mega menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-75"><a href="index.php">Home</a>
											</li>

											<li id="menu-item-126" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-126"><a href="allcourses.php">Courses</a>
											</li>
											<li id="menu-item-125" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-125"><a href="index.php#footer">Contact</a>
											</li>
										</ul>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
							<div class="clearfix"></div>
						</nav>
					</div>
					<!-- End Navigation -->
					<div class="clearfix"></div>
				</div>
			</div>
		</header>
<div id="content">
<div id="inner-content" class="cf">
<div id="main" class="m-all t-all d-all cf" role="main"> 
  <!--<div class="section-white page-slider home-page-slider hom inner_banner_height">
                  <div class="parallax1" > </div>
								</div>-->
								
	

  <div class="section-white section-one">
    <article class="cf wrap post-410 team type-team status-publish has-post-thumbnail hentry profile-category-manager" role="article">
    <br>
    <header class="article-header wow fadeInUp">
			<h1 class="page-title" >Course Registration</h1>
			
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

		

</div>
    </header>
  </div>
	
  <div class="courses-page-area5">
    <div class="container">
      <div class="row">
	  
	  
        <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
          <div class="course-details-inner">
            <h2 class="title-default-left title-bar-high"><?php echo $data['Title'];?></h2>
            <img src="admin/upload/<?php echo $data['Image'];?>" class="img-responsive" alt="course">
            <div class="course-details-tab-area">
              <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                  <ul class="course-details-tab-btn">
                    <li class="active" id="signin_li"><a href="#description" data-toggle="tab" aria-expanded="false">Sign In</a></li>
                    <li id="signup_li"><a href="#curriculum" data-toggle="tab" aria-expanded="false">Sign Up</a></li>
                    <li id="forgotpassword_li"><a href="#lecturer" data-toggle="tab" aria-expanded="false">Forgot Password</a></li>
                  </ul>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12">
                  <div class="tab-content">

									<div class="alert alert-danger" id="answer_sign" style="width:100%; margin:0px 0px 10px 0px;display:none"> <strong>Your Email ID or Password is wrong.</strong> <br>
            Please try again to login. </div>

						<div class="alert alert-warning" id="user_not_active" style="width:100%;margin:0px 0px 10px 0px;display:none"> <b>Please contact to Admin.</b> <br>
            You are currently not activated.</div>

			<div class="alert alert-danger" id="mail_wrong" style="width:100%; margin:0px 0px 10px 0px;display:none"><strong>Your Email ID is not existing.</strong></div>	 

			<div class="alert alert-success" id="register_success2" style="display:none; margin:0px 0px 10px 0px"> <strong>You are register successfully.</strong> <br>
            Please make sure to login...! </div>
			<div class="alert alert-success" id="check_mail" style="width:100%; margin:0px 0px 10px 0px;display:none;">
												<b>Your Password is sent to your Email ID. Please check your Email.</b>
											</div>
		
			
  <div class="alert alert-danger" id="already_exist" style="width:100%;margin:15px 0px 10px 0px;display:none"> <strong>Your Email ID is already exist.</strong>
           </div>

                    <div class="tab-pane fade active in" id="description">
                      <div class="form-top signIn">
                        <div class="form-top-left">
                          <h3>Sign In <i class="fa fa-pencil pull-right"></i></h3>
                        </div>
                        <p class="clearfix">Login to register for this course:</p>
                        <div class="form-top-divider"></div>
                      </div>
                      <div class="form-bottom signIn">

                        <form name="signinbtn" method="post" class="registration-form">
                          <div class="form-group">
                            <label class="sr-only" for="email1">Type your email address</label>
                            <br>
                       
                          <input name="email1" placeholder="What's your email address?" class="form-control" type="text"  required oninvalid="this.setCustomValidity('Please enter your email')" oninput="setCustomValidity('')" maxlength="50">
						  </div>

							

						<div class="form-group">
                            <label class="sr-only"  for="form-password">Type your password</label>
								
							  <input name="pass1" placeholder="Type your password" id="pass1" class="form-control" required
							   type="password" oninvalid="this.setCustomValidity('Please enter your password')" oninput="setCustomValidity('')" maxlength="50">
							
                        </div>

  
                          <div class="form-group">
                            <button type="submit" class="btn" name="signinbtn">Sign In</button>
                          </div>
                        </form>
                      </div>
                    </div>
                    
                    <!-- Sign In --> 
                    
                    <!-- Sign Up -->
                    <div class="tab-pane fade" id="curriculum">
                      <div class="panel-group curriculum-wrapper" id="accordion">
                        <div class="form-top signUp" >
                          <div class="form-top-left">
                            <h3>Sign Up <i class="fa fa-pencil pull-right"></i></h3>
                          </div>
                          <p class="clearfix">Share you detail:</p>
                          <div class="form-top-divider"></div>
                        </div>
                        <div class="form-bottom signUp">
<!-- <div class="alert alert-danger" id="already_exist" style="width:100%;margin:0px 0px 10px 0px;display:none;"> <strong>Your emailid are alredy existing.</strong> <br>
            Please enter new emailid...! </div> -->
							<div class="row">
                          <form name="f1" id="signupbtn"  method="post" class="registration-form">
                            <input type="hidden" name="action" value="signUp" />
                            <div class="form-group col-md-6">
                              <label class="sr-only" for="firstname">First name</label>
                              <br>
                              <input maxlength="100" pattern="[a-zA-Z\-\s]+" name="firstname" placeholder="What's your first name?" class="firstname form-control" 
							  id="firstname" type="text" required oninvalid="this.setCustomValidity('Please enter your first name')" oninput="setCustomValidity('')">
                            </div>
                            <div class="form-group col-md-6">
                              <label class="sr-only" for="lastname">Last name</label>
                              <input maxlength="100" pattern="[a-zA-Z\-\s]+"  name="lastname" placeholder="What's your last name?" class="lastname form-control add" id="lastname" type="text" required oninvalid="this.setCustomValidity('Please enter your last name')" oninput="setCustomValidity('')">
                            </div>
                            <div class="form-group col-md-6">
                              <label class="sr-only" for="email">Email</label>
                              <input name="email" placeholder="What's your email address?" class="email form-control" id="email" type="email" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$" maxlength="50" required oninvalid="this.setCustomValidity('Please enter your valid email')" oninput="setCustomValidity('')">
                            </div>
							 <div class="form-group col-md-6">
                              <label class="sr-only" for="Phone">Phone</label>
                              <input name="Phone" placeholder="What's your contact number?" class="Phone form-control" id="Phone" type="text" minlength="10" maxlength="14" pattern="[0-9\-\s]+" required oninvalid="this.setCustomValidity('Please enter your phone number in xxx-xxx-xxxx format')" oninput="setCustomValidity('')">
                            </div>
							 <div class="form-group col-md-12">
                              <label class="sr-only" for="address">Address</label>
                              <input name="address" maxlength="250" pattern="[a-zA-Z0-9`~!@#$%^&*()',./?|\-\s]+" placeholder="What's your address?" class="address form-control" id="address" type="text" required oninvalid="this.setCustomValidity('Please enter your address')" oninput="setCustomValidity('')">
                            </div>
                            <div class="form-group col-md-6">
                              <label class="sr-only" for="pass">Password</label>
							    <div data-toggle="tooltip" data-placement="top" data-html="true" title="Minimum 8 character password, Must contain at least one number, uppercase, lowercase letter and special characters like @#$%">
								  <input name="pass" placeholder="Type secure password" class="form-control"
								  id="pass" type="password" required oninvalid="this.setCustomValidity('Please enter your valid password')" pattern="((?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[@#$%]).{8,30})" maxlength="30" oninput="setCustomValidity('')">
								</div>
                            </div>
                            <div class="form-group col-md-6">
                              <label class="sr-only" for="confpass">Confirm password</label>
                              <input name="confpass" placeholder="Confirm your password" id="confpass" class="confpass form-control" 
								type="password"  required oninvalid="this.setCustomValidity('Those passwords didn't match. Try again.')" oninput="setCustomValidity('')" maxlength="30"  
								  pattern="((?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[@#$%]).{8,30})" >
                            </div>
                            
                            <!--<div class="form-group">
																<label class="sr-only" for="address">Address</label>
																<textarea name="address" placeholder="Your address..." class="form-about-yourself form-control" id="address"></textarea>
															</div>-->
                           
                            <div class="form-group">
                              <button type="submit" class="btn" name="signupbtn">Sign Up</button>
                            </div>
                          </form>
								</div>
                        </div>
                        
                        <!--End Sign Up --> 
                        
                      </div>
                    </div>
                    <div class="tab-pane fade" id="lecturer">
                      <div class="course-details-skilled-lecturers">
                        <div class="form-top forgot" >
                          <div class="form-top-left">
                            <h3>Forgot Password? <i class="fa fa-pencil pull-right"></i></h3>
                          </div>
                          <p class="clearfix">Type your email id to get your password:</p>
                          <div class="form-top-divider"></div>
                        </div>
                        <div class="form-bottom forgot"  >
                          <form id="forgotbtn" name="forgotbtn" role="form" method="post" class="registration-form">
                            <br>
                            
                            <input type="hidden" name="course" value="<?php echo $data['Title']; ?>" />
                            <input type="hidden" name="action" value="forgot" />
                            <div class="form-group">
                              <label class="sr-only" for="email3">Email</label>
                              <input name="email1" placeholder="What's your email address?" class="email form-control"  type="text" required oninvalid="this.setCustomValidity('Please enter your email')" oninput="setCustomValidity('')" maxlength="50">
                            </div>
                           
                            <div class="form-group">
                              <button name="remail"  type="submit" class="btn">Send Recovery Email!</button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="related-courses-title-area">
            <h3>Other Courses You Might Be Interested</h3>
          </div>

				<div id="shadow-carousel" class="related-courses-carousel">
						<?php
							$date=date('Y-m-d');											
							$cnd=" AND EnrStartDate > '$date' ";

							$cnd2= " AND '$date' BETWEEN  EnrStartDate AND EndDate ";
											
							//   $res=mysql_query("SELECT * FROM tblcourse Where CourseID!='$cid' and IsStatus = 1 AND (EnrStartDate <= '$date' OR ('$date' BETWEEN  EnrStartDate AND EndDate)) order by StartDate ");
							$res=mysql_query("SELECT * FROM tblcourse Where CourseID!='$cid' and IsStatus = 1 AND ((EnrStartDate IS NULL and '$date' < EndDate) or ('$date' BETWEEN EnrStartDate AND EndDate)) order by StartDate ");
							$noofrec=mysql_num_rows($res);
							
						?>
					<div class="owl-carousel owl-theme rc-carousel" data-loop="false" data-items="3" data-margin="8" data-autoplay="false" data-autoplay-timeout="10000" data-smart-speed="2000" data-dots="false" data-nav="true" data-nav-speed="false" data-r-x-small="1" data-r-x-small-nav="true" data-r-x-small-dots="false" data-r-x-medium="2" data-r-x-medium-nav="true" data-r-x-medium-dots="false" data-r-small="1" data-r-small-nav="true" data-r-small-dots="false" data-r-medium="2" data-r-medium-nav="true" data-r-medium-dots="false" data-r-large="3" data-r-large-nav="true" data-r-large-dots="false">
                            
							
								
							<?php
							if($noofrec>0)
							{	
								while($data1=mysql_fetch_array($res))
								{
//print_r($data);
?>
                                <div class="item courses-box1">
                                    <div class="single-item-wrapper">
                                       	<div class="courses-img-wrapper hvr-bounce-to-bottom">
								  
                                    <img src="admin/upload/<?php echo $data1['Image'];?>" class="wrapperimg" 
									alt="">
									
									<div class="wrapperdiv">
                                     <h class="wrapperh">
									 <center class="wrapperi"></center> </h>
									</div>
						<div class="wrapperj">
								<?php //echo $data['Title'];?>
						</div>
									<a href="detail.php?cid=<?php echo $data1['CourseID'];?>"><i class="logo" aria-hidden="true"></i>
										<div class="wrapperk">Click for</div>
										<div class="wrapperl">detail</div>
									</a>
										
                                </div>
                                        <div class="courses-content-wrapper">
                                            
                                    <ul class="courses-info">
									   
                                       <li>
											
                                           
											<?php echo $data1['Title'];?><br>
											
											</li>
                                       
										</ul>
										<ul class="courses-info smallfonts four_block">

										<li class="smfont"><?php
													if($data1['EnrStartDate']!='')
												 {
														 //  echo $data['StartDate'];
														 
									   $strDate = date('m/d/Y', strtotime($data1['EnrStartDate']));  
									   
									   echo  $strDate. '&nbsp;&nbsp;-&nbsp;';
												 }else{echo "N/A";}
													?>
												
												<?php
													if($data1['EnrEndDate']!='')
												 {
														 //  echo $data['StartDate'];
														 
									   $endDate = date('m/d/Y', strtotime($data1['EnrEndDate']));  
									   
									   echo  $endDate;
												 }
													?>
												<br><span> <b> Enrollment Duration</b></span></li>
	
										   <li class="smfont">
										   <?php
										 // echo $endDate = date('m/d/Y', strtotime($data['StartDate']));  
										   
										   ?>
										   <?php
													if($data1['StartDate']!='')
												 {
														 //  echo $data['StartDate'];
														 
									   $endDate = date('m/d/Y', strtotime($data1['StartDate']));  
									   
									   echo  $endDate;
												 }else{echo "N/A";}
													?>
												<br><span> <b> Course Date </b></span></li>
																					</ul>

	

	<ul class="courses-info smallfonts four_block">
	<li class="smfont"><?php $D=date("h:i a", strtotime($data1['StartTime']));echo $D; ?> - <?php $E=date("h:i a", strtotime($data1['EndTime']));echo $E; ?>
		<br><span> <b>Time</b></span></li>
	
	<li class="smfont"><?php  $noofuserreg=$data1['NoofUserRegistered'];	
						$totcap=$data1['TotalCapacity'];
						$setave=$totcap-$noofuserreg; 
						if($setave!=''){ echo $setave;}else{echo  "N/A";}?>
		<br><span>  <b> Seats </b></span></li>

	
	</ul>
                                            
                                        </div>
                                    </div>
                                </div>
                               
                        <?php
							}
						}else
						{?>
					
							 <div class="container">
									<div class="row">
											<div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
												<div class="courses-box1">
													<div class="single-item-wrapper">
														<div class="nocourse" >
															<center class="nocourse2">No courses are available.</center>
														</div>
													</div>
												</div>
											</div>
									</div>
							</div>
                      
                    
                        <?php 
						}
						?>						
							   
							   
                            </div>
                        </div>	

		  
        </div>
		
		
        <?php 
$res=mysql_query("SELECT * FROM tblcourse Where CourseID = '".$_REQUEST['cid']."'");
$data=mysql_fetch_array($res);
//print_r($data);
?>
        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
          <?php
														  if(isset($_POST['signupbtn']))
														  {
															$fnm=$_POST['firstname'];
															$lnm=$_POST['lastname'];
															$email=$_POST['email'];
															$upass=$_POST['pass'];
															$confpass=$_POST['confpass'];
															$address=$_POST['address'];
															$Phone=$_POST['Phone'];
															$CreatedBy=0;
			                                                $IsActive=0;
															$otp=rand(5000,25000);
										$select=mysql_query("select * from tblregister where Email='$email'");
										$r1=mysql_fetch_array($select);
										$emailalredy=$r1['Email'];
											
										if($emailalredy==$email)
										{
											?>
          
<script>
$("#already_exist").css({ display: "block" });

	$('#curriculum').addClass('active in');
    $('#description').removeClass('active in');
	$('#signup_li').addClass('active');
    $('#signin_li').removeClass('active');
	$('#signup_li a').attr('aria-expanded','true');
    $('#signli_li a').attr('aria-expanded','false');
</script>
<script>
setTimeout(function() {
  $('#already_exist').fadeOut('hide');
}, 10000);
				</script>
          
          <?php
										}
										else
										{
															$ins=mysql_query("insert into  tblregister(`UserName`,`Password` ,`FirstName` ,`LastName` ,`Email`,`Address`,`Phone`,`ConfirmationCode`, `IsActive`,`CreatedBy`,`otp` ) VALUES('$email','$upass', '$fnm', '$lnm', '$email', '$address', '$Phone', '$confpass', '$IsActive', '$CreatedBy','$otp')");
		//session_start();
		$_SESSION['email']=$email;
		
		$email=trim($email);
		//$imglog=dirname(__FILE__).'/image/logo.png';
		require_once('email/class.phpmailer.php');
		$mail = new PHPMailer(); // create a new object
		$mail->IsSMTP(); // enable SMTP
		$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
		$mail->SMTPAuth = true; // authentication enabled
		$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
		$mail->Host = "smtp.gmail.com";
		$mail->Port = 465; // or 587
		$mail->IsHTML(true);
		$mail->FromName=FROMNAME;
		$mail->Username=USERNAME;
		$mail->Password=USERPASSWORD;
		$mail->SetFrom=SETFROM;
		$mail->Subject = "AERE Registration Verification Code: $otp";
		$mail->Body = "<img src='http://allinstitute-dev.demobyopeneyes.com/email/emailimage/emaillogo.jpg' style='height:80px; width:180px;' > <br><br><br>
		Hello $fnm, <br/><br/>
		
				 Here is your AERE Registration Verification Code: <b>$otp</b><br><br>
			
				 If you need to make any changes to this, please do not hesitate to contact us at Manny@AERExperts.com. 
			<br><br>
			Thank you,<br>
			<b>AERE Team</b>";
		$mail->AddAddress($email);
		//$msg="";
		if(!$mail->Send())
		{
			echo "Mailer Error: " . $mail->ErrorInfo;
		}
		else
		{
			$cid=$_REQUEST['cid'];
			//echo "Message has been sent";
			$_SESSION['check']=1;
			echo"<script>window.location='conf_otp.php?cid=$cid';</script>";
			
			
			
			
		}
		
		
	
											if($ins)
											{	?>
          <div class="alert alert-success" id="register_success" style="display:none; margin:0px 0px 10px 0px"> <strong>You are register successfully.</strong> <br>
            Please make sure to login...! </div>






       
          <?php
											}
										}				
								 }

	?>
          <?php
								
								$cid=$data['CourseID'];
								
								if(isset($_POST['signinbtn']))
								{
															
									$Email=$_POST['email1'];
									$Password=$_POST['pass1'];
															
															
							$select=mysql_query("select * from tblregister where Email='$Email' and Password=BINARY'$Password'");
							
							$result=mysql_fetch_array($select);
							$emailpass=$result['Email'];
							$regid=$result['RegisterId'];
							$isactive=$result['IsActive'];
							
							if($isactive=='1')
							{
								//session_start();
								$_SESSION['Email']=$emailpass;
								$_SESSION['RegisterId']=$regid;
								$_SESSION['check']=1;
									echo "<script> 
								
										window.location.href='detail.php?cid=$cid';
															</script>";
							}
							else if($isactive=='0')
							{
							?>
								<script>
										$( document ).ready(function() {
											$('#user_not_active').attr('style','display:block;');  
											setTimeout(function() {
										
											$('#user_not_active').fadeOut('hide');
											}, 10000);
										});
								</script>
          					<?php	
							}	
							else							
							{
								
								
								//trigger_error(E_USER_ERROR);
							?>
								<script>
									$("#answer_sign").css({ display: "block" });
									</script>
									<script>
									setTimeout(function() {
									$('#answer_sign').fadeOut('hide');
									}, 10000);

																					
								</script>
								
							<?php	
							// $log->info("Email Id or Password is wrong");															
							}
					}
					if(isset($_POST['remail']))
	       			{
						$email=$_REQUEST['email1'];
						$sql=mysql_query("SELECT * FROM tblregister WHERE Email='$email'");
						//var_dump($sql);
						//exit;
						
						$row = mysql_fetch_array($sql);
						$pass=$row['Password'];
						$email=$row['Email'];
						$fnam=$row['FirstName'];
						//session_start();
						//$_SESSION['ema']=$emm;
			
						$emai=trim($email);
		
						require_once('email/class.phpmailer.php');
						$mail = new PHPMailer(); // create a new object
						$mail->IsSMTP(); // enable SMTP
						$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
						$mail->SMTPAuth = true; // authentication enabled
						$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
						$mail->Host = "smtp.gmail.com";
						$mail->Port = 465; // or 587
						$mail->IsHTML(true);
						$mail->FromName=FROMNAME; 
						$mail->Username=USERNAME;
						$mail->Password=USERPASSWORD;
						$mail->SetFrom=SETFROM;
						$mail->Subject = "AERE Password for Email ID";
						$mail->Body = "<img src='http://allinstitute-dev.demobyopeneyes.com/email/emailimage/emaillogo.jpg' style='height:80px; width:180px;' > <br><br><br>
							Hello $fnam, <br/><br/>
							
						
							Your Password for Email ID $emai of AERE account is $pass<br/><br/>
							
							Thank You,<br/>
							<b>AERE Team </b><br/>";
						$mail->AddAddress($emai);
						//$msg="";
						if(!$mail->Send())
						{
							//echo "Mailer Error: " . $mail->ErrorInfo;
							$log->info("Your Emailid is wrong");
						?>
							<script>

								$( document ).ready(function() {
									$('#mail_wrong').attr('style','display:block;');  
									setTimeout(function() {
								
									$('#mail_wrong').fadeOut('hide');
									}, 10000);
								});
							</script>
						<?php

						}
						else
						{
		
							// echo "<script>window.location='forgotpass.php?check=0';</script>";
							// echo "<script>window.location='registration.php?check=0';</script>";
							?>
								<script>
									$( document ).ready(function() {
										$('#check_mail').attr('style','display:block;');  
										setTimeout(function() {
								//		window.location.href="allcourses.php";
										$('#check_mail').fadeOut('hide');
										}, 10000);
									});				
								</script>
							<?php
						}
		
		
					}
				?>
														  
		 
								   

          <div class="sidebar">
            <div class="sidebar-box" style="margin-top:-30px;">
              <div class="sidebar-box-inner">
                <h3 class="sidebar-title">Fees</h3>
                <div class="sidebar-course-price">
									<p><?php  if($data['CourseFees']!='')
									{
										echo "$";
										 echo $data['CourseFees'];
									}
									else
									{
										echo  "Not Available";
									}?></p>
                </div>
              </div>
            </div>
            
          
            
            <?php 
$res=mysql_query("SELECT * FROM tblcourse Where CourseID = '".$_REQUEST['cid']."'");

$data=mysql_fetch_array($res);
if($data['InsId']!=NULL)
{
	$ins = mysql_query("SELECT GROUP_CONCAT(InsName SEPARATOR ',')  AS Instructor FROM tblmstinstructor WHERE InsId IN (".$data['InsId'].")");
$insres=mysql_fetch_array($ins);
}



$CourseID=$data['CourseID'];	
$noofuserreg=$data['NoofUserRegistered'];	
$totcap=$data['TotalCapacity'];
$setave=$totcap-$noofuserreg;
//print_r($data);
?>
            <div class="sidebar-box">
              <div class="sidebar-box-inner">
							<h3 class="sidebar-title sidebar-title2">Enrollment Duration</h3>
							<div class="sidebar-course-price">
							<p><?php
													if($data['EnrStartDate']!='')
												 {
														 //  echo $data['StartDate'];
														 
									   $strDate = date('m/d/Y', strtotime($data['EnrStartDate']));  
									   
										 echo  $strDate. '&nbsp;&nbsp;-&nbsp;';
												 }else{echo "Not Available";}
													?>
												<?php
													if($data['EnrEndDate']!='')
												 {
														 //  echo $data['StartDate'];
														 
									   $endDate = date('m/d/Y', strtotime($data['EnrEndDate']));  
									   
									   echo  $endDate;
												 	}	//  }else{echo "Not Available";}
													?>
													</p>
                </div>
                <h3 class="sidebar-title">Course Date <span class="fontnone">and</span> Time</h3>
                <div class="sidebar-course-price">
                  <p><?php  $endDate = date('m/d/Y', strtotime($data['StartDate']));  
									   
										 echo  $endDate; ?>&nbsp;/&nbsp;<?php //echo $data['StartTime'];
										 $stimes=date("h:i a", strtotime($data['StartTime']));
													echo $stimes;
										 
										 ?></p>
                </div>
                <h3 class="sidebar-title">Location</h3>
                <div class="sidebar-course-price">
                  <p><?php  if($data['Location']!=''){ echo $data['Location'];}else{echo  "Not Available";}?></p>
                </div>
                <h3 class="sidebar-title">Intended Audience</h3>
                <div class="sidebar-course-price">
                  <p><?php  if($data['IntendedAudience']!=''){ echo $data['IntendedAudience'];}else{echo  "Not Available";}?></p>
                </div>
                <h3 class="sidebar-title" style="text-transform:none;">Instructor(s)</h3>
                <div class="sidebar-course-price">
                  <p><?php  if(isset($insres)&&$insres['Instructor']!=''){ echo $insres['Instructor'];}else{echo  "Not Available";}?></p>
                </div>
                <h3 class="sidebar-title" style="text-transform:none;">Discussant / Moderator(s)</h3>
                <div class="sidebar-course-price">
                  <p><?php  if($data['Instigator']!=''){ echo $data['Instigator'];}else{echo  "Not Available";}?></p>
                </div>
                <h3 class="sidebar-title">Seats Available</h3>
                <div class="sidebar-course-price">
                  <p><?php if($setave!=''){ echo $setave;}else{echo  "Not Available";}?></p>
                </div>
              </div>
            </div>
					</div>
			
					<br>
					
							<?php
		$date=date('Y-m-d');
		$cnd=" and (EndDate < '$date' ) ";
		$res=mysql_query("SELECT * FROM tblcourse Where CourseID='$CourseID' $cnd");
		$data3=mysql_fetch_array($res);
		$Video=$data3['Video'];
		$noofrec=mysql_num_rows($res);
		if($noofrec>0)
		{
	?>
						<br>
						<div class="sidebar-box">
              <div class="sidebar-box-inner">
						<div class="sidebar" style="margin:0px 0px 10px 0px">
                           
                                    <h3 class="sidebar-title">Video</h3>
                                   <?php 
								   if($data3['Video']!='')
								   {
									 ?>
									  <div class="youtube-popup">
                                       <iframe width="100%" height="150" src="<?php echo 'http://www.youtube.com/embed/'.$data3['Video'];?>" frameborder="0" allowfullscreen></iframe>
									   
									</div>
								<!--	<object width="' . $width . '" height="' . $height . '"><param name="movie" value="http://www.youtube.com/embed/' . $Video . '&amp;hl=en_US&amp;fs=1?rel=0"></param><param name="allowFullScreen" value="true"></param><param name="allowscriptaccess" value="always"></param><embed src="http://www.youtube.com/embed/' . $id . '&amp;hl=en_US&amp;fs=1?rel=0" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true" width="' . $width . '" height="' . $height . '"></embed></object>-->
									<?php 
								   }
								   else
								   {
									   echo  " Not Available";
								   }
								   ?>
                                      <?php //echo $data['Video']; ?>
                                         
																			</div>
                            </div>
									<script>
											$('.youtube-popup > div').click(function()
											{
												window.open($(this).parent().children('iframe').attr("src"));
											});
									</script>
                              
                        </div>
		<?php
		}
		?>
							</div>
					</div>



        </div>
			</div>
			

      <!-- Courses Page 5 Area End Here --> 
      <!-- Footer Area Start Here --> 
      
      <!-- Footer Area End Here --> 
    </div>
  </div>
 <?php
		 include('footer.php');
		 ?>
</div>
<!-- <link rel='stylesheet' id='gforms_reset_css-css'  href='css/formreset.min.css' type='text/css' media='all' /> -->
<link rel='stylesheet' id='gforms_formsmain_css-css'  href='css/formsmain.min.css' type='text/css' media='all' />
<!-- <link rel='stylesheet' id='gforms_ready_class_css-css'  href='css/readyclass.min.css' type='text/css' media='all' /> -->
<!-- <link rel='stylesheet' id='gforms_browsers_css-css'  href='css/browsers.min.css' type='text/css' media='all' /> -->
<!-- <script type='text/javascript'  src="js/jquery-2.1.1.min.js"></script>  -->
<script src="https://cdn.jsdelivr.net/jquery.validation/1.15.0/jquery.validate.min.js"></script> 
<script src="https://cdn.jsdelivr.net/jquery.validation/1.15.0/additional-methods.min.js"></script> 
<script type="text/javascript">






	


</script> 
<!-- <script type='text/javascript' src='js/magnific-popup.js'></script>  -->
<!-- <script type='text/javascript' src='js/wow.min.js'></script>  -->
<!-- <script type='text/javascript' src='js/scripts.min.js'></script> 
<script type='text/javascript' src='js/jquery.sticky-kit.js'></script>  -->
<!-- <script>
$(".about-the-quickfacts").stick_in_parent({
    offset_top: 70
}); -->

</script> 

<!-- Preloader Start Here -->
<div id="preloader"></div>
<!-- Preloader End Here --> 
<!-- jquery--> 
<!-- <script src="js_new/jquery-2.2.4.min.js" type="text/javascript"></script>  -->
<!-- Plugins js --> 
<!-- <script src="js_new/plugins.js" type="text/javascript"></script>  -->
<!-- Bootstrap js --> 
<!-- <script src="js_new/bootstrap.min.js" type="text/javascript"></script>  -->
<!-- WOW JS --> 
<script src="js_new/wow.min.js"></script> 
<!-- Nivo slider js --> 
<!-- <script src="vendor/slider/js/jquery.nivo.slider.js" type="text/javascript"></script>  -->
<!-- <script src="vendor/slider/home.js" type="text/javascript"></script>  -->
    <!-- Owl Cauosel JS -->
    <script src="vendor/OwlCarousel/owl.carousel.js" type="text/javascript"></script>
<!-- Meanmenu Js --> 
<script src="js_new/jquery.meanmenu.min.js" type="text/javascript"></script> 
<!-- Srollup js --> 
<script src="js_new/jquery.scrollUp.min.js" type="text/javascript"></script> 
<!-- jquery.counterup js --> 
<script src="js_new/jquery.counterup.min.js"></script> 
<script src="js_new/waypoints.min.js"></script> 
<!-- Countdown js --> 
<script src="js_new/jquery.countdown.min.js" type="text/javascript"></script> 
<!-- Isotope js --> 
<script src="js_new/isotope.pkgd.min.js" type="text/javascript"></script> 
<!-- Select2 Js --> 
<!-- <script src="js_new/select2.min.js" type="text/javascript"></script>  -->
<!-- Nouislider Js --> 
<script src="vendor/noUiSlider/nouislider.min.js" type="text/javascript"></script> 
<!-- Validator js --> 
<script src="js_new/validator.min.js" type="text/javascript"></script> 
<!-- Magic Popup js --> 
<!-- <script src="js_new/jquery.magnific-popup.min.js" type="text/javascript"></script>  -->
<!-- Custom Js --> 
<script src="js_new/main.js" type="text/javascript"></script> 

<!-- <script src="js/bootstrap.min.js"></script>  -->
<script>
var pass = document.getElementById("pass")
  , confpass = document.getElementById("confpass");

function validatePassword(){
  if(pass.value != confpass.value) {
    confpass.setCustomValidity("Password not matched");
  } else {
    confpass.setCustomValidity('');
  }
}
pass.onchange = validatePassword;
confpass.onkeyup = validatePassword;
</script>
<script>
	$('.owl-carousel').owlCarousel({
    loop:false,
    margin:10,
    responsiveClass:true,
    responsive:{
        0:{
            items:1,
            nav:true
        },
        600:{
            items:3,
            nav:false
        },
        1000:{
            items:5,
            nav:true,
            loop:false
        }
    }
})
</script>
</body>
</html>