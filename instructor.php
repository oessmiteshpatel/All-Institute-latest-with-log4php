<script src="js/jquery-1.12.4-jquery.min.js"></script> 
<?php 
include("admin/connect.php");
session_start();
$MODE=MODE;

$InsId=$_REQUEST['InsId']; 
$res=mysql_query("SELECT * FROM tblmstinstructor Where InsId = '".$_REQUEST['InsId']."'");
$data=mysql_fetch_array($res);




//print_r($data);
?>
<!doctype html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
<title>ALL-Institute | Instructor detail</title>
<link rel="apple-touch-icon" href="image/favicon-apple.png">
<link rel="icon" href="image/favicon.png">
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
<link rel="stylesheet" href="vendor/slider/css/nivo-slider.css" type="text/css" />
<link rel="stylesheet" href="vendor/slider/css/preview.css" type="text/css" media="screen" />
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

.courses-box1 .single-item-wrapper
{
	width:286px !important;
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
	margin: 1em -15px !important;
}
/*ul 
{
    margin: 1em -15px !important;
}*/
</style>
<link rel='stylesheet' id='ajax-load-more-css'  href='css/ajax-load-more.css' type='text/css' media='all' />
<link rel='stylesheet' id='rs-plugin-settings-css'  href='css/settings.css' type='text/css' media='all' />
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

.title-bar-big-left-close:before
{
	background:#C4161C;
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
						<div class="center align-right pull-right"><a href="http://www.aerexperts.com/" title="Opens in a new window" target="_blank" class="aere-button">Visit AERE</a> </div>
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
      <h1 class="page-title">Instructor's Detail</h1>
    </header>
  </div>
  <style>
	.lecturers-page-area {
    padding: 30px;
    background: #f5f5f5;
}
.lecturers-page-area > .container{padding:30px 30px;background: #fff;}
  </style>
  
  
 
		 <div class="lecturers-page-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="lecturers-contact-info">
                            <img src="admin/upload/instructor/<?php  echo $data['InsImg'];?>" class="img-responsive" alt="team">
                            <h2><?php  //echo $data['InsName'];?></h2>
                            
                            
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12">
                        <h3 class="title-default-left title-bar-big-left-close"><?php  echo $data['InsName'];?></h3>
                        <p style="text-align:justify"><p><?php if($data['About']!=''){ echo $data['About'];}else{echo  "There is no content available.";}?></p> </p>
                        
						
						
                        
						
						
                    </div>
                </div>
            </div>
        </div>
        <!-- Courses Page 3 Area End Here -->
 
  
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
<<!-- <script type='text/javascript' src='js/magnific-popup.js'></script>  -->
<!-- <script type='text/javascript' src='js/wow.min.js'></script>  -->
<!-- <script type='text/javascript' src='js/scripts.min.js'></script> 
<script type='text/javascript' src='js/jquery.sticky-kit.js'></script>  -->
<script>
$(".about-the-quickfacts").stick_in_parent({
    offset_top: 70
});

</script> 

<!-- Preloader Start Here -->
<div id="preloader"></div>
<!-- Preloader End Here --> 
<!-- jquery--> 
<!-- <script src="js_new/jquery-2.2.4.min.js" type="text/javascript"></script>  -->
<!-- Plugins js --> 
<!-- <script src="js_new/plugins.js" type="text/javascript"></script>  -->
<!-- Bootstrap js --> 
<script src="js_new/bootstrap.min.js" type="text/javascript"></script> 
<!-- WOW JS --> 
<script src="js_new/wow.min.js"></script> 
<!-- Nivo slider js --> 
<script src="vendor/slider/js/jquery.nivo.slider.js" type="text/javascript"></script> 
<script src="vendor/slider/home.js" type="text/javascript"></script> 
<!-- Owl Cauosel JS --> 
<script src="vendor/OwlCarousel/owl.carousel.min.js" type="text/javascript"></script> 
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
    confpass.setCustomValidity("Passwords Don't Match");
  } else {
    confpass.setCustomValidity('');
  }
}
pass.onchange = validatePassword;
confpass.onkeyup = validatePassword;
</script>
</body>
</html>