<script src="js_new/jquery-2.2.4.min.js" type="text/javascript"></script>
<script>


$(document).ready(function () {
    if(window.location.href.indexOf("check=0") > -1) {
        $('#check_mail').css('display','block');
   
     setTimeout(function() {
        $('#check_mail').css('display','none');

				var my_variable_name = window.location.href;
        
        var success = my_variable_name.replace("?check=0", '');
        
        window.location.replace(success);

    }, 10000);
}
});
</script>

<script src="js_new/bootstrap.min.js" type="text/javascript"></script>
<?php
include( "admin/connect.php" );
include_once "allfunction.php";
$res = mysql_query( "SELECT * FROM tblcourse Where CourseID = '" . $_REQUEST[ 'cid' ] . "'" );
$data = mysql_fetch_array( $res );
$cid = $data[ 'CourseID' ];
?>
<html class="no-js" lang="">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"/>
	<title>ALL-Institute | Forgotton password</title>
	<link rel="apple-touch-icon" href="image/favicon-apple.png">
	<link rel="icon" href="image/favicon.png">
	<link rel="pingback" href="http://tritraining.edu.au/xmlrpc.php">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link type="text/css" media="screen" rel="stylesheet" href="css/awwwards.css"/>
	<link type="text/css" media="screen" rel="stylesheet" href="css/fastfonts.css"/>


	<link rel="stylesheet" href="css_new/all_ins.css">
	<!-- Normalize CSS -->
	<link rel="stylesheet" href="css_new/normalize.css">
	<!-- Main CSS -->
	<link rel="stylesheet" href="css_new/main.css">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="css_new/bootstrap.min.css">
	<!-- Animate CSS -->
	<link rel="stylesheet" href="css_new/animate.min.css">
	<!-- Font-awesome CSS-->
	<link rel="stylesheet" href="css_new/font-awesome.min.css">
	<!-- Owl Caousel CSS -->
	<link rel="stylesheet" href="vendor/OwlCarousel/owl.carousel.min.css">
	<link rel="stylesheet" href="vendor/OwlCarousel/owl.theme.default.min.css">
	<!-- Main Menu CSS -->
	<link rel="stylesheet" href="css_new/meanmenu.min.css">
	<!-- nivo slider CSS -->
	<link rel="stylesheet" href="vendor/slider/css/nivo-slider.css" type="text/css"/>
	<link rel="stylesheet" href="vendor/slider/css/preview.css" type="text/css" media="screen"/>
	<!-- Datetime Picker Style CSS -->
	<link rel="stylesheet" href="css_new/jquery.datetimepicker.css">
	<!-- Magic popup CSS -->
	<link rel="stylesheet" href="css_new/magnific-popup.css">
	<!-- Switch Style CSS -->
	<link rel="stylesheet" href="css_new/hover-min.css">
	<!-- Custom CSS -->
	<link rel="stylesheet" href="css_new/style.css">
	<!-- Modernizr Js -->
	<script src="js_new/modernizr-2.8.3.min.js"></script>
	<style type="text/css">
		.wrapper {
			//padding-top: 20px;
			padding-top: 0px;
		}
		
		input.parsley-error,
		select.parsley-error,
		textarea.parsley-error {
			border-color: #843534;
			box-shadow: none;
		}
		
		input.parsley-error:focus,
		select.parsley-error:focus,
		textarea.parsley-error:focus {
			border-color: #843534;
			box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075), 0 0 6px #ce8483
		}
		
		.parsley-errors-list {
			list-style-type: none;
			opacity: 0;
			transition: all .3s ease-in;
			color: #d16e6c;
			margin-top: 2px;
			margin-bottom: 0;
			padding-left: 400px;
		}
		
		.parsley-errors-list.filled {
			opacity: 1;
			color: #C5161D;
		}
	</style>


	<style type="text/css">
		img.wp-smiley,
		img.emoji {
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
	<link rel='stylesheet' id='ajax-load-more-css' href='css/ajax-load-more.css' type='text/css' media='all'/>
	<link rel='stylesheet' id='rs-plugin-settings-css' href='css/settings.css' type='text/css' media='all'/>
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
		
		.none {
			display: none !important;
		}
		
		.pageshow {
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
		
		.fa {
			margin-top: 13px;
		}
		
		.courses-box1 .single-item-wrapper .courses-content-wrapper .item-title a:hover {
			color: #C4161C;
		}
		
		.courses-box1 .single-item-wrapper .courses-content-wrapper .courses-info li {
			padding-right: 0px !important;
			margin-right: 2px;
		}
		
		.courses-box1 .single-item-wrapper .courses-img-wrapper a {
			height: 70px !important;
			width: 70px !important;
		}
		
		.hentry header,
		.homepage-article header,
		.blog-article header {
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
	<link rel='stylesheet' id='cpsh-shortcodes-css' href='css/shortcodes.css' type='text/css' media='all'/>
	<link rel='stylesheet' id='bones-boot-css' href='css/bootstrap.min.css' type='text/css' media='all'/>
	<link rel='stylesheet' id='bones-magnafic-css' href='css/magnific-popup.css' type='text/css' media='all'/>
	<link rel='stylesheet' id='bones-animate-css' href='css/animate.css' type='text/css' media='all'/>
	<link rel='stylesheet' id='bones-stylesheet-css' href='css/style.css' type='text/css' media='all'/>
	<link rel='stylesheet' id='bones-icons-css' href='css/icons.css' type='text/css' media='all'/>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
	<link rel='stylesheet' id='googleFonts-css' href='http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic' type='text/css' media='all'/>
</head>

<body class="home page page-id-2 page-template page-template-page-home single single-team page-template-page-home-php desktop">
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
								<h1 class="page-title">Forgot password</h1>
								
  
										
											<div class="alert alert-success" id="pass_corr" style="width:100%; margin:0px 0px 10px 0px;display:none;">
												<b>Your password is correct.</b>
											</div>
										
			



							</header>

					</div>
					<!-- NEW CODE HERE  -->


					<!-- Inner Page Banner Area Start Here -->
					<div class="inner-page-banner-area" style="background-image: url('image/image1.jpg');">
						<div class="container">
							<div class="pagination-area">


							</div>
						</div>
					</div>

					<!-- Inner Page Banner Area End Here -->
					<!-- Courses Page 2 Area Start Here -->


					<div class="courses-page-area2">
						<div class="container" id="inner-isotope">
							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

								<center>
											<div class="alert alert-success" id="check_mail" style="width:100%; margin:0px 0px 10px 0px;display:none;">
												<b>Your Password is sent to your Email ID. Please check your Email.</b>
											</div>
										</center>
									<div class="form-top ">
										<div class="form-top-left">
											<h3>Forgot Password <i class="fa fa-pencil pull-right"></i></h3>
										</div>
										<p class="clearfix">Please enter password:</p>
										<div class="form-top-divider"></div>
									</div>

									<div class="form-bottom">

										<?php 
 session_start();
$email=$_SESSION['email'];
if(isset($_POST['otpbtn']))
{
	$pass=$_REQUEST['password'];
    $sql=mysql_query("SELECT * FROM tblregister WHERE Password='$pass'");
 	$row = mysql_fetch_array($sql);
	$pas=$row['Password'];
	if($pass==$pas)
	{
		// echo"<script>
		// document.location='registration2.php?cid=$cid';
		
		// </script>";

		?>

										


										<script>
											// setTimeout( function () {
												// $( '#pass_corr' ).fadeOut( 'hide' );
											// }, 10000 );
											
											$( document ).ready(function() {
												$('#pass_corr').attr('style','display:block;');  
												setTimeout(function() {
												window.location.href="allcourses.php";
												$('#pass_corr').fadeOut('hide');
												}, 10000);
										});
											
										</script>
										<?php

										} else {
											// echo"<script>alert('your password is wrong');
											// document.location='forgotpass.php?cid=$cid';

											// </script>";

											?>

										<center>
											<div class="alert alert-danger" id="pass_wrong" style="width:100%; margin:0px 0px 10px 0px; text-align:center;">
												<b>Your password is wrong.</b>
											</div>
										</center>


										<script>
											$( document ).ready(function() {
												$('#already_exist').attr('style','display:none;');  
												setTimeout(function() {
											
												$('#pass_wrong').fadeOut('hide');
												}, 10000);
										});
										</script>
										
										<?php
										}
										}

										?>
										<form name="f1" id="signupbtn" method="post" class="registration-form">

											<input type="hidden" name="action" value="signUp"/>

											<!-- <div class="form-group">
							
                            <input maxlength="50" name="Email" placeholder="Enter your email" class="firstname form-control" type="text"  oninvalid="this.setCustomValidity('Please enter your valid email')" oninput="setCustomValidity('')" required>
                            

                           
						</div> -->

											<div class="form-group">

												<input maxlength="50" name="password" placeholder="Enter your password" class="firstname form-control" type="password" oninvalid="this.setCustomValidity('Please enter your valid password')" oninput="setCustomValidity('')" required>



											</div>


											<div class="form-group">
												<button type="submit" class="btn" name="otpbtn">Recover Password</button>
											</div>


										</form>
									</div>


								</div>
							</div>
							<div class="row featuredContainer">










								<!-- user Profile -->
								<?php
								session_start();
								$reid = $_SESSION[ 'RegisterId' ];
								if ( isset( $_SESSION[ 'RegisterId' ] ) ) {
									$res = mysql_query( "SELECT  tblcourseregistered.createdOn,tblcourse.Title,tblcourse.CourseID,tblcourse.StartDate from tblcourseregistered INNER JOIN tblcourse on tblcourseregistered.CourseID=tblcourse.CourseID where tblcourseregistered.RegisterId='$reid'  " );

									$noofrec = mysql_num_rows( $res );
									if ( $noofrec > 0 ) {
										while ( $data = mysql_fetch_array( $res ) ) {
											//print_r($data);
											//exit;
											?>




								



								<?php
								}
								} else {
									?>
								<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 user">
									<div class="courses-box1">
										<div class="single-item-wrapper" style="float:left">
											<div style="height:180px;width:1100px; background-color:lightgrey;padding:25px">
												<center style="font-size:24px;margin-top:40px;"> No Course Available..</center>
											</div>

										</div>
									</div>
								</div>
								<?php
								}
								}

								?>
								<!-- end user Profile -->
							</div>
						</div>










						<!-- NEW CODE END HERE  -->

						<!-- <section class="cf">
										<div class="m-all t-all d-all table-responsive">
											<ul class="nav nav-tabs">
												<li class="active"><a href='allcourses.php'>All</a></li>
												<li><a href='current.php'>Current</a></li>
												<li><a href='upcoming.php'>Upcoming</a></li>
												<li><a href='finished.php'>Previous</a></li>
											</ul>
											<table class="table table-bordered table-striped display" id="example" width="100%" cellspacing="0">
                                                                                        <thead class="thead-inverse">
																						<tr>
                                                                                            <th width='400'>Title</th>
                                                                                            <th>Start Enrollment Date</th>
																							<th>End Enrollment Date</th>
                                                                                            <th width='200'>Location</th>
                                                                                            <th width='150'>Time</th>
                                                                                            <th>Fees</th>
																							<th>Status</th>
                                                                                            <th>Detail</th>
                                                                                        </tr>
                                                                                        </thead>
                                                                                        <tbody>
											<?php
												
												
											/*if(isset($_GET["page"]))
												$page = (int)$_GET["page"];
											else
												$page = 1;

											$setLimit = 3;
											$pageLimit = ($page * $setLimit) - $setLimit; */
											$cnd= " AND 1=1 ";
											 $date=date('Y-m-d');
											
											//$res=mysql_query("SELECT * FROM tblcourse where IsStatus = 1 LIMIT ".$pageLimit." , ".$setLimit);
											$res=mysql_query("SELECT * FROM tblcourse where IsStatus = 1 ")	;
											$noofrec=mysql_num_rows($res);
											if($noofrec>0){	 
												while($data=mysql_fetch_array($res))
												{
												 
												echo "<tr>";    echo "<td width='400'>".$data['Title']."</td>";
												 
												
												 
												$sdate = date_create($data['StartDate']);
												$ssdate =date_format($sdate,'m/d/Y');
            									echo "<td class='text-center'>".date_format($sdate,'m/d/Y')."</td>";
												
												$edate = date_create($data['EndDate']);
												$eedate =date_format($edate,'m/d/Y');
												echo "<td class='text-center'>".date_format($edate,'m/d/Y')."</td>";
												 
												echo "<td class='text-center' width='200'>".$data['Location']."</td>";
												 
												echo "<td class='text-center' width='150'>".$data['Time']."</td>";
												$CourseFees = (is_numeric($data['CourseFees'])?"$".$data['CourseFees']:$data['CourseFees']);
												echo "<td class='text-center'>".$CourseFees."</td>";
												
												$tcapacity=$data['TotalCapacity'];
												$noofreg=$data['NoofUserRegistered'];
												$status="";
												 $cdate=date('m/d/Y');
												$ssdate=strtotime($ssdate);
												$eedate=strtotime($eedate);
												$cdate=strtotime($cdate);
												
												if($cdate>=$ssdate && $cdate<=$eedate && $tcapacity!=$noofreg ){
													$status="Current  ";
												}else if($cdate<$eedate){
													$status="Upcoming";
												}
												else if($cdate>$eedate){
													$status="Previous";
												}
												
												echo "<td class='text-center'>".$status."</td>";
												
												echo "<td class='text-center'><a href='registration.php?cid=".$data['CourseID']."' title='View'><i class='fa fa-eye'></i></a></td>";
												 
												echo "</tr>";    
												 
												}
											}else{
												echo "<tr><td colspan='7'>No Course Available</td></tr>"; 
											}	 
												
												
												 
												// receive  value(value sent  using query string )

											?>
                                                                                        </tbody>
											</table>
										</div>										
										<div><?php //displayPaginationBelow($setLimit,$page); ?></div>
									</section>
								</article>
							</div>
  </div>  -->
					</div>
				</div>
				<?php
				include( 'footer.php' );
				?>

			</div>
			<link rel='stylesheet' id='gforms_reset_css-css' href='css/formreset.min.css' type='text/css' media='all'/>
			<link rel='stylesheet' id='gforms_formsmain_css-css' href='css/formsmain.min.css' type='text/css' media='all'/>
			<link rel='stylesheet' id='gforms_ready_class_css-css' href='css/readyclass.min.css' type='text/css' media='all'/>
			<link rel='stylesheet' id='gforms_browsers_css-css' href='css/browsers.min.css' type='text/css' media='all'/>

			<script type='text/javascript' src="js/jquery-2.1.1.min.js"></script>

			<script>
setTimeout(function() {
  $('#already_exist').fadeOut('hide');
}, 10000);
				</script>
			<script type="text/javascript">
				$( '#mega-menu ul li a' ).on( 'click', function () {
					$( '.menu-main' ).addClass( 'none' );
					$( '.mobile-nav' ).addClass( 'menu-open1' );
					$( '.menu-main' ).removeClass( 'menu-open' );
				} );

				$( '#mobile-nav-button' ).on( 'click', function () {
					$( '.menu-main' ).addClass( 'menu-open' );
					$( '.menu-main' ).removeClass( 'none' );
				} );
			</script>
			<script type='text/javascript' src='js/magnific-popup.js'></script>
			<script type='text/javascript' src='js/wow.min.js'></script>
			<script type='text/javascript' src='js/scripts.min.js'></script>
			<script type='text/javascript' src='js/jquery.sticky-kit.js'></script>
			<script src="//code.jquery.com/jquery-1.12.4.js"></script>
			<script src='https://www.google.com/recaptcha/api.js'></script>
			<script type="text/javascript" src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>


			<script class="init" type="text/javascript">
				$( document ).ready( function () {
					$( '#example' ).dataTable( {
						"oLanguage": {
							"sLengthMenu": "Show _MENU_ of Course",
							"sInfo": "Showing _START_ to _END_ of _TOTAL_ Course"
						}
					} );
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
				$( ".about-the-quickfacts" ).stick_in_parent( {
					offset_top: 70
				} );
			</script>

			<!-- Preloader Start Here -->
			<div id="preloader"></div>
			<!-- Preloader End Here -->
			<!-- jquery-->
			<script src="js_new/jquery-2.2.4.min.js" type="text/javascript"></script>

			<script src="js/bootstrap.min.js"></script>
			<script src="parsleyjs/dist/parsley.min.js"></script>
			<script>
				$( document ).ready( function () {
					$( 'form' ).parsley();
				} );
			</script>
			<!-- Plugins js -->
			<script src="js_new/plugins.js" type="text/javascript"></script>
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
			<script src="js/waypoints.min.js"></script>
			<!-- Countdown js -->
			<script src="js_new/jquery.countdown.min.js" type="text/javascript"></script>
			<!-- Isotope js -->
			<script src="js_new/isotope.pkgd.min.js" type="text/javascript"></script>
			<!-- Magic Popup js -->
			<script src="js_new/jquery.magnific-popup.min.js" type="text/javascript"></script>
			<!-- Custom Js -->
			<script src="js_new/main.js" type="text/javascript"></script>

</body>
</html>