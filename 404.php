<?php
include("admin/connect.php" );
session_start();
$MODE=MODE;
include_once "allfunction.php";
?>

<!doctype html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"/>
	<title>ALL-Institute | Error page</title>
	<link rel="apple-touch-icon" href="image/favicon-apple.png">
	<link rel="icon" href="image/favicon.png">
	<link rel="pingback" href="http://tritraining.edu.au/xmlrpc.php">
	<!-- <link rel="stylesheet" href="css/font-awesome.min.css">
	<link type="text/css" media="screen" rel="stylesheet" href="css/awwwards.css"/>
	<link type="text/css" media="screen" rel="stylesheet" href="css/fastfonts.css"/> -->
	<link rel="stylesheet" href="css_new/style.css">
	<link rel="stylesheet" href="css_new/hover-min.css">
	<link rel="stylesheet" href="css_new/all_ins.css">
	<link rel="stylesheet" href="css_new/font-awesome.min.css">
	<!-- <link rel="stylesheet" href="css/jquery.bxslider.css" type="text/css"/>
	<script src="js_new/main.js" type="text/javascript"></script>
	<script src="js/jquery-1.12.4-jquery.min.js"></script> -->

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
	<!-- <link rel='stylesheet' id='ajax-load-more-css' href='css/ajax-load-more.css' type='text/css' media='all'/>
	<link rel='stylesheet' id='rs-plugin-settings-css' href='css/settings.css' type='text/css' media='all'/> -->
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
	</style>
	<!-- <link rel='stylesheet' id='cpsh-shortcodes-css' href='css/shortcodes.css' type='text/css' media='all'/> -->
	<link rel='stylesheet' id='bones-boot-css' href='css/bootstrap.min.css' type='text/css' media='all'/>
	<!-- <link rel='stylesheet' id='bones-magnafic-css' href='css/magnific-popup.css' type='text/css' media='all'/> -->
	<!-- <link rel='stylesheet' id='bones-animate-css' href='css/animate.css' type='text/css' media='all'/> -->
	<link rel='stylesheet' id='bones-stylesheet-css' href='css/style.css' type='text/css' media='all'/>
	<!-- <link rel='stylesheet' id='bones-icons-css' href='css/icons.css' type='text/css' media='all'/> -->
	<link rel='stylesheet' id='googleFonts-css' href='http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic' type='text/css' media='all'/>
	
</head>

<body class="home page page-id-2 page-template page-template-page-home page-template-page-home-php desktop">
<div class="<?php echo $MODE; ?>"></div>
	<div id="container">
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
								<div class="navbar-header" style="margin-left: 648px">
									<button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button"> <span class="sr-only"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
									<div class="navbar-collapse collapse">
										<ul class="nav navbar-nav">
											<li id="menu-item-75" class="mega menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-75"><a href="index.php" class="">Home</a>
											</li>
											<li id="menu-item-89" class="mega menu-item menu-item-type-post_type"><a href="allcourses.php">Courses</a>
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


		<div id="custom-content-popup" class="white-popup mfp-hide"> </div>

		<div id="content">
			<div id="inner-content" class="cf">
				<div id="main" class="m-all t-all d-all cf" role="main">
					


				<div class="container error-page">
				<div class="row">
					<div class="col-lg-12">
						<h1 class="error-code">Oops!</h1>
						<h2 class="error-text">We can't seem to find the page you're looking for.</h2>
						<div class="error-subtext">Error Code: 400</div>
						 <ul class="list-unstyled">
							<li class="extra-text">Sorry, but the page you are looking for was either not found or does not exist.<br>
							Try refreshing the page or visit our <a href="index.php"><b>Homepage</b></a></li>
							<!-- <li><a href="index.php"><b>Home</b></a></li>
							<li><a href="index.php#footer"><b>Contact Us</b></a></li> -->
						  </ul>
					</div>
				
				</div>	
				
			</div>
					

<div class="clearfix"></div>
<div class="copyright">
	<div class="container">
		<div class="row">
		<div class="col-md-12 col-sm-12 design">Provided by <a href="http://www.aerexperts.com/" target="_blank"> Assessment, Education & Research Experts</a>
			</div>
			<div class="col-md-12 col-sm-12 design "> Powered by <a style="color:white" ; href="http://www.theopeneyes.com/" target="_blank">OpenEyes Technologies, Inc.</a>
			</div>
		</div>
	</div>
</div>

<style>
   
#main{ min-height:auto; padding:5% 0 0 0;}
	.copyright {
		background: #444442; margin-top:-1px!important;
		color: #fff;
		font-size: 13px;
		margin: 0;
		padding: 5px 0;
		position: fixed;
		bottom:0;
		width:100%;
		text-align: center; line-height:26px;

	}
	
	.copyright .design a {
		color: #fff;
	}
	
	.Provided-by .design a,
	.Provided-by {
		font-size: 14px;
		line-height: 16px;
	}
	.pull-sm-right{float: right;}
</style>




				</div>
				
				<!-- <link rel='stylesheet' id='gforms_reset_css-css' href='css/formreset.min.css' type='text/css' media='all'/> -->
				<link rel='stylesheet' id='gforms_formsmain_css-css' href='css/formsmain.min.css' type='text/css' media='all'/>
				<!-- <link rel='stylesheet' id='gforms_ready_class_css-css' href='css/readyclass.min.css' type='text/css' media='all'/> -->
				<!-- <link rel='stylesheet' id='gforms_browsers_css-css' href='css/browsers.min.css' type='text/css' media='all'/> -->


				<!-- <script src="js/bootstrap.min.js"></script> -->

				<script type="text/javascript">
					$( document ).ready( function () {
						if ( window.location.href.indexOf( "#footer" ) > -1 ) {
							$( '#menu-main li a' ).removeClass( "active" );
							$( '#menu-item-125 a' ).addClass( "active" );
						}
					} );
				</script>

				<script>
					$( function () {
						$( '.arrow-down' ).click( function () {
							$( 'html, body' ).animate( {
								scrollTop: $( 'div#ALLInstitute' ).offset().top
							}, 'slow' );
							return false;
						} );
					} );
				</script>

				<script>
					$( "#menu-item-125" ).click( function () {
						$( '.navigation li' ).removeClass( "active" );
						$( '#menu-item-125' ).addClass( "active" );
					} );

					$(document).ready(function () {
						if(window.location.href.indexOf("#footer") > -1) {
						   $( '.navigation li' ).removeClass( "active" );
						$( '#menu-item-125' ).addClass( "active" );
						}
					});
					
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

					// $( document ).ready( function () {
					// 	$( '.bxslider' ).bxSlider();
					// } );
				</script>
				<!-- <script type='text/javascript' src="js/jquery.bxslider.js"></script>
				<script type='text/javascript' src='js/magnific-popup.js'></script>
				<script type='text/javascript' src='js/wow.min.js'></script>
				<script type='text/javascript' src='js/scripts.min.js'></script> -->

				<script src='https://www.google.com/recaptcha/api.js'></script>
				<script src="js_new/wow.min.js"></script>
				<script src="//code.jquery.com/jquery-1.12.4.js"></script>
				<script src="js_new/bootstrap.min.js" type="text/javascript"></script>
				<script src="js_new/jquery.meanmenu.min.js" type="text/javascript"></script>
				<script src="js_new/jquery.scrollUp.min.js" type="text/javascript"></script>
				<script src="js_new/isotope.pkgd.min.js" type="text/javascript"></script> 



</body>
</html>