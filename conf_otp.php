<?php
     include("admin/connect.php");
     session_start();
     $email=$_SESSION['email'];
 
     $MODE=MODE;

?>
<!-- <script src="js_new/jquery-2.2.4.min.js" type="text/javascript"></script> -->
<script type='text/javascript'  src="js/jquery-2.1.1.min.js"></script>
<script src="js_new/bootstrap.min.js" type="text/javascript"></script>
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
						if(check==1) {
							//if(cid){
							$('#otp_email').css('display','block');
					
						setTimeout(function() {
							$('#otp_email').css('display','none');

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
 
 include_once "allfunction.php";
$res=mysql_query("SELECT * FROM tblcourse Where CourseID = '".$_REQUEST['cid']."'");
$data=mysql_fetch_array($res);

?>
<html class="no-js" lang="">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
<title>ALL-Institute | Conform otp page</title>
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

.wrapper {
 //padding-top: 20px;
	padding-top: 50px;
}

.tp-caption a:hover {
	color: #ffa902
}
.none{display:none !important;}
.pageshow{
	border-top-right-radius: 6px;
	border-bottom-right-radius: 6px;
	padding: 0;
	margin: 0;
	float: left;
	display: inline;
	text-align: center;
	color: #337ab7;
	padding: 10px 16px;
font-size: 18px;
line-height: 1.3333333;

}
.fa
{
	margin-top:13px; 
}
.courses-box1 .single-item-wrapper .courses-content-wrapper .item-title a:hover
{
	color: #C4161C;
}
 

.courses-box1 .single-item-wrapper .courses-content-wrapper .courses-info li 
{
    
    padding-right: 0px !important;
    margin-right: 2px;
}

.courses-box1 .single-item-wrapper .courses-img-wrapper a
{
	height:70px !important;
	width:70px !important;
}
.hentry header, .homepage-article header, .blog-article header
 {
     padding: 0em 0em !important; 
}
.courses-page-area2 {
    padding: 50px 0 70px;
    background: #f5f5f5;
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
						<div class="center align-right pull-right"><a href="http://www.aerexperts.com/" title="Opens in a new window" target="_blank" class="aere-button">Visit AERE</a> </div>
						<div class="clearfix"></div>
						<nav>
							<div role="navigation" class="navbar navigation post_animation3">
								<div class="navbar-header">
									<button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button"> <span class="sr-only"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
									<div class="navbar-collapse collapse">
										<ul class="nav navbar-nav">
											<li id="menu-item-75" class="mega menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-75"><a href="index.php">Home</a></li>
                
				  <li id="menu-item-126" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-126"><a href="allcourses.php">Courses</a></li>
                  <li id="menu-item-125" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-125"><a href="index.php#footer">Contact</a></li>
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
                                        <h1 class="page-title">Verification Code</h1>
                                        
                                      


                                       
									</header>
									
	</div>								
								
	
									
      
        <div class="inner-page-banner-area" style="background-image: url('image/image1.jpg');">
           
        </div>
	
       
		
		<?php

// $email=$_SESSION['email'];

// include("admin/connect.php"); 


if(isset($_REQUEST['otpbtn']))
{
	$otp=$_REQUEST['otp'];
	
	
	 $sql="select * from tblregister where otp='$otp' and Email='".$_SESSION['email']."'";

	$res=mysql_query($sql);
	$count=mysql_num_rows($res);
	$row=mysql_fetch_array($res);
	
	if($count>0)
	{
		
		$upd=mysql_query("update tblregister set IsActive='1' where Email='$email'");

		if($upd)
		{		
		    $cid=$_REQUEST['cid'];
			$_SESSION['check']=7;
	      echo "<script> window.location.href='registration.php?cid=$cid';</script>"; 
	
		}
	}
	else
	{
		?>
		<script>

                     $( document ).ready(function() {
        $('#mail_wrong').attr('style','display:block;');  
		setTimeout(function() {
    
		$('#mail_wrong').fadeOut('hide');
		}, 10000);
});

        </script>

        <div class="container">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="alert alert-danger" id="mail_wrong" style="width:100%;display:none">
        <strong>Your verification code is wrong.</strong>
   </div>
   </div>
</div>				

 <script>



$(document).ready(function () {
    if(window.location.href.indexOf("check=0") > -1) {
        $('#otp_true').css('display','block');
   
     setTimeout(function() {
        $('#otp_true').css('display','none');

				var my_variable_name = window.location.href;
        
        var success = my_variable_name.replace("?check=0", '".$_REQUEST['cid']."');
        
        window.location.replace(success);

    }, 10000);
}
});

     
	</script>
<?php
		
	}
}
?>
        <div class="courses-page-area2">
            <div class="container" id="inner-isotope">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                       
                                    <div class="alert alert-success" style="width:100%;display:none;" id="otp_email">
				                	    <b> Please check your Email Id for verification code.</b>
								    </div>
								
					                <div class="form-top">
                                        <div class="form-top-left">
                                            <h3>Verification code  <i class="fa fa-pencil pull-right"></i></h3>
                                        </div>
												
                                                <p class="clearfix">Please enter code for verification:</p>
                                                <div class="form-top-divider"></div>
												
									</div>
					   							
										
												
                                    <div class="form-bottom">
                                        <form name="f1" id="signupbtn"  method="post" class="registration-form">
                                                                                
                                            <input type="hidden" name="action" value="signUp" />
                                                                                    
                                                <div class="form-group">
                                                    <label class="sr-only" for="firstname">Password</label>
                                                                                        <br>
                                                    <input name="otp" placeholder="Enter verification code" class="firstname form-control"  type="text" required oninvalid="this.setCustomValidity('Please enter the confirmation code you received')" oninput="setCustomValidity('')" minlength="4"  maxlength="5" pattern="[0-9]+"/>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <button type="submit" class="btn" name="otpbtn">Verify</button>
                                                                                                                                                    
                                                </div>                                                                                                             
                                        </form>
                                    </div>
					
					   
                    </div>
                </div>
				
                
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


$('#mega-menu ul li a').on('click',function(){
   $('.menu-main').addClass('none');
   $('.mobile-nav').addClass('menu-open1');
   $('.menu-main').removeClass('menu-open');
});

$('#mobile-nav-button').on('click',function(){
   $('.menu-main').addClass('menu-open');
   $('.menu-main').removeClass('none');
});
</script>
<!-- <script type='text/javascript' src='js/magnific-popup.js'></script> 
<script type='text/javascript' src='js/wow.min.js'></script> 
<script type='text/javascript' src='js/scripts.min.js'></script> 
<script type='text/javascript' src='js/jquery.sticky-kit.js'></script>  -->
<script src="//code.jquery.com/jquery-1.12.4.js"></script>
<script src='https://www.google.com/recaptcha/api.js'></script>
<script type="text/javascript" src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
 

<script>
		setTimeout(function() {
		$('#otp_true').fadeOut('hide');
		}, 10000);
	</script>
<script class="init" type="text/javascript">
$(document).ready(function() {
     $('#example').dataTable( {
    "oLanguage": {
      "sLengthMenu": "Show _MENU_ of Course",
      "sInfo": "Showing _START_ to _END_ of _TOTAL_ Course"
    }
});
} );

</script>
<script>
/*
$(document).ready(function() {
    $('#example').DataTable( {
        "order": [[ 3, "desc" ]]
    } );
} );
*/
$(".about-the-quickfacts").stick_in_parent({
    offset_top: 70
});
</script>

<!-- Preloader Start Here -->
    <div id="preloader"></div>
    <!-- Preloader End Here -->
    <!-- jquery-->
    
   
    <!-- Plugins js -->
    <!-- <script src="js_new/plugins.js" type="text/javascript"></script> -->
    <!-- Bootstrap js -->
    <!-- <script src="js_new/bootstrap.min.js" type="text/javascript"></script> -->
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
    <script src="js/waypoints.min.js"></script>
    <!-- Countdown js -->
    <script src="js_new/jquery.countdown.min.js" type="text/javascript"></script>
    <!-- Isotope js -->
    <script src="js_new/isotope.pkgd.min.js" type="text/javascript"></script>
    <!-- Magic Popup js -->
    <!-- <script src="js_new/jquery.magnific-popup.min.js" type="text/javascript"></script> -->
    <!-- Custom Js -->
    <script src="js_new/main.js" type="text/javascript"></script>

</body>
</html>