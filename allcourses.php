<?php 


error_reporting(0);
include("admin/connect.php");
session_start();
$reid=$_SESSION['RegisterId'];
$MODE=MODE;


include("log4php/Logger.php");
include("Lib_log.php");

 
Logger::configure('multiple.xml');
 $log;
 $log=Logger::getLogger('dberror');

 $vars = new Lib_log(); 

?>
<html class="no-js" lang="">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
<title>ALL-Institute | Courses</title>
        <link rel="apple-touch-icon" href="image/favicon-apple.png">
        <link rel="icon" href="image/favicon.png">
        <!--<link rel="pingback" href="http://tritraining.edu.au/xmlrpc.php">-->
        <!--<link rel="stylesheet" href="css/font-awesome.min.css">-->
    	<!-- <link type="text/css" media="screen" rel="stylesheet" href="css/awwwards.css" />-->
        <!--<link type="text/css" media="screen" rel="stylesheet" href="css/fastfonts.css" />-->
		
		
		
		 <!-- Normalize CSS -->
		 <!--<link rel="stylesheet" href="css_new/all_ins.css">	-->

    <!--<link rel="stylesheet" href="css_new/normalize.css">-->
    <!-- Main CSS -->
    <!--<link rel="stylesheet" href="css_new/main.css">-->
    <!-- Bootstrap CSS -->
    <!--<link rel="stylesheet" href="css_new/bootstrap.min.css">-->
    <!-- Animate CSS -->
    <!--<link rel="stylesheet" href="css_new/animate.min.css">-->
    <!-- Font-awesome CSS-->
    <link rel="stylesheet" href="css_new/font-awesome.min.css">
    <!-- Owl Caousel CSS -->
    <!--<link rel="stylesheet" href="vendor/OwlCarousel/owl.carousel.min.css">-->
    <!--<link rel="stylesheet" href="vendor/OwlCarousel/owl.theme.default.min.css">-->
    <!-- Main Menu CSS -->
    <!--<link rel="stylesheet" href="css_new/meanmenu.min.css">-->
    <!-- nivo slider CSS -->
    <!--<link rel="stylesheet" href="vendor/slider/css/nivo-slider.css" type="text/css" />-->
    <!--<link rel="stylesheet" href="vendor/slider/css/preview.css" type="text/css" media="screen" />-->
    <!-- Datetime Picker Style CSS -->
    <!--<link rel="stylesheet" href="css_new/jquery.datetimepicker.css">-->
    <!-- Magic popup CSS -->
    <!--<link rel="stylesheet" href="css_new/magnific-popup.css">-->
    <!-- Switch Style CSS -->
    <link rel="stylesheet" href="css_new/hover-min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css_new/style.css">
    <!-- Modernizr Js -->
    <!--<script src="js_new/modernizr-2.8.3.min.js"></script>-->
		
	<script src="js_new/main.js" type="text/javascript" defer></script>
      
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

.fa
{
	margin-top:13px; 
}
</style>
        <!--<link rel='stylesheet' id='ajax-load-more-css'  href='css/ajax-load-more.css' type='text/css' media='all' />-->
        <!--<link rel='stylesheet' id='rs-plugin-settings-css'  href='css/settings.css' type='text/css' media='all' />-->
        <style id='rs-plugin-settings-inline-css' type='text/css'>

</style>
        <!--<link rel='stylesheet' id='cpsh-shortcodes-css'  href='css/shortcodes.css' type='text/css' media='all' />-->
        <link rel='stylesheet' id='bones-boot-css'  href='css/bootstrap.min.css' type='text/css' media='all' />
        <!--<link rel='stylesheet' id='bones-magnafic-css'  href='css/magnific-popup.css' type='text/css' media='all' />
        <link rel='stylesheet' id='bones-animate-css'  href='css/animate.css' type='text/css' media='all' />-->
        <link rel='stylesheet' id='bones-stylesheet-css'  href='css/style.css' type='text/css' media='all' />
        <!--<link rel='stylesheet' id='bones-icons-css'  href='css/icons.css' type='text/css' media='all' />-->
		<!--<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">-->
        <!--<link rel='stylesheet' id='googleFonts-css'  href='http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic' type='text/css' media='all' />-->
        </head>

        <body class="home page page-id-2 page-template page-template-page-home single single-team page-template-page-home-php desktop">
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
						<div class="center align-right pull-right"><a href="http://www.aerexperts.com/" target="_blank" title="Opens in a new window" class="aere-button">Visit AERE</a> </div>
						<div class="clearfix"></div>
						<nav>
							<div role="navigation" class="navbar navigation post_animation3">
								<div class="navbar-header">
									<button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button"> <span class="sr-only"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
									<div class="navbar-collapse collapse">
										<ul class="nav navbar-nav">
											<li id="menu-item-75" class="mega menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-75"><a href="index.php">Home</a></li>
                
				  <li id="menu-item-126" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-has-children menu-item-126 active"><a href="allcourses.php">Courses</a></li>
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
          <div id="custom-content-popup" class="white-popup mfp-hide"> </div>
	
        
          <div id="content">
    <div id="inner-content" class="cf">
              <div id="main" class="m-all t-all d-all cf" role="main">
        <!--<div class="section-white page-slider home-page-slider hom inner_banner_height">
                  <div class="parallax1" > </div>
				</div>-->
				<div class="inner-page-banner-area" style="background-image: url('image/Course_banner.jpg');">
            <div class="container">
                <div class="pagination-area">
                  
                    
                </div>
            </div>
        </div>			
	
				
	  <div class="section-white section-one">
								<article class="cf wrap post-410 team type-team status-publish has-post-thumbnail hentry profile-category-manager" role="article">
									<br>
									<header class="article-header wow fadeInUp">
										<h1 class="page-title">Courses</h1>
									</header>

									<div class="alert alert-success" id="register_success" style="display:none; margin:0px 0px 10px 0px;width:100%"> <strong>You are register successfully.</strong> <br>
            Please make sure to login...! </div>
									
	</div>								
	<!-- NEW CODE HERE  -->								
	
									
        <!-- Inner Page Banner Area Start Here -->
      
		
        <!-- Inner Page Banner Area End Here -->
        <!-- Courses Page 2 Area Start Here -->
		
		
        <div class="courses-page-area2 course_blocks">
            <div class="container" id="inner-isotope">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="isotop-classes-tab isotop-btn">
                            <a href="#" data-filter=".all" class="current">All</a>
                            <a href="#" data-filter=".curnt">Current</a>
                            <a href="#" data-filter=".dea">Upcoming</a>
                            <a href="#" data-filter=".pre">Previous</a>
							<!--<a href="#" data-filter=".onde">OnDemand</a>-->
							<?php
							if(isset($_SESSION['RegisterId']))
								{
								?><a href="#" data-filter=".user">My Courses</a>
								<?php }?>
                        </div>
                    </div>
                </div>
				<div class="row featuredContainer">
                
				<!--All cource -->
				
				<?php
			$cnd= " AND  1=1 ";
			$date=date('Y-m-d');
		//	and (EnrStartDate > '$date')
			$res=mysql_query("SELECT * FROM tblcourse where IsStatus = 1 and (AnnDate IS NULL or AnnDate <= '$date') ORDER BY StartDate ASC ")	;
			$noofrec=mysql_num_rows($res);
			if($noofrec>0)
			{	 
				while($data=mysql_fetch_array($res))
				{
											//print_r($data);
											//exit;
				?>										


										
				
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 all">
                        <div class="courses-box1">
                            <div class="single-item-wrapper">
                                
								
								
								<div class="courses-img-wrapper hvr-bounce-to-bottom">
								  
                                    <img src="admin/upload/<?php echo $data['Image'];?>" class="wrapperimg" 
									alt="">
									
									<div class="wrapperdiv">
                                     <h class="wrapperh">
								 <center class="wrapperi"></center> </h>
									</div>
						<div class="wrapperj">
								<?php //echo $data['Title'];?>
						</div>
									<a href="detail.php?cid=<?php echo $data['CourseID'];?>"><i class="logo" aria-hidden="true"></i>
										<div class="wrapperk">Click for</div>
										<div class="wrapperl">detail</div>
									</a>
										
                                </div>
								
                                <div class="courses-content-wrapper">
                                    
								   <ul class="courses-info hit">
									   
                                       <li>
											
                                           
											<?php echo $data['Title'];?><br>
											
											</li>
                                       
										</ul>
                                   
										<ul class="courses-info smallfonts four_block">

										<li class="smfont"><?php
													if($data['EnrStartDate']!='')
												 {
														 //  echo $data['StartDate'];
														 
									   $endDate = date('m/d/Y', strtotime($data['EnrStartDate']));  
									   
									   echo  $endDate. '&nbsp;&nbsp;-&nbsp;';
												 }else{echo "N/A";}
													?>
												
												<?php
													if($data['EnrEndDate']!='')
												 {
														 //  echo $data['StartDate'];
														 
									   $endDate = date('m/d/Y', strtotime($data['EnrEndDate']));  
									   
									   echo  $endDate;
												 }
													?>
												<br><span> <b> Enrollment Duration</b></span></li>
	
										   <li class="smfont">
										   <?php
										 // echo $endDate = date('m/d/Y', strtotime($data['StartDate']));  
										   
										   ?>
										   <?php
													if($data['StartDate']!='')
												 {
														 //  echo $data['StartDate'];
														 
									   $endDate = date('m/d/Y', strtotime($data['StartDate']));  
									   
									   echo  $endDate;
												 }else{echo "N/A";}
													?>
												<br><span> <b> Course Date </b></span></li>
																					</ul>
	
											
	
											<ul class="courses-info smallfonts four_block">
											<li class="smfont"><?php $D=date("h:i a", strtotime($data['StartTime']));echo $D; ?> - <?php $E=date("h:i a", strtotime($data['EndTime']));echo $E; ?>
												<br><span> <b>Time</b></span></li>
											
											<li class="smfont"><?php  $noofuserreg=$data['NoofUserRegistered'];	
																$totcap=$data['TotalCapacity'];
																$setave=$totcap-$noofuserreg; 
																if($setave!=''){ echo $setave;}else{echo  "N/A";}?>
												<br><span>  <b> Seats </b></span></li>
										
											
											</ul>
                                </div>
                            </div>
                        </div>
                    </div>  						
											
												
											
		<?php
			}
		}
		
		else
		{
			?>
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 all">
                        <div class="courses-box1">
                            <div class="single-item-wrapper">
                            	<div class="nocourse" >
                                    <center class="nocourse2">   No Courses are available.</center>
									</div>
                                
                            </div>
                        </div>
                    </div> 
		<?php	
		}	
		?>
		<!--end  All cource -->
        
		<!--Curent cource -->
        
			<?php
			$date=date('Y-m-d');
			//$cnd= " AND '$date' BETWEEN  EnrStartDate AND EndDate ";
												
			$res=mysql_query("SELECT * FROM tblcourse Where IsStatus = 1 AND ((EnrStartDate IS NULL and '$date' < EndDate) or ('$date' BETWEEN EnrStartDate AND EndDate)) order by StartDate ASC");
				$noofrec=mysql_num_rows($res);
				if($noofrec>0)
				{	 
					while($data=mysql_fetch_array($res))
					{
				//print_r($data);
				//exit;
?>										


										
				
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 curnt">
                        <div class="courses-box1">
                            <div class="single-item-wrapper">
                               	<div class="courses-img-wrapper hvr-bounce-to-bottom">
								  
                                    <img src="admin/upload/<?php echo $data['Image'];?>" class="wrapperimg" 
									alt="">
									
									<div class="wrapperdiv">
                                     <h class="wrapperh">
									 <center class="wrapperi"></center> </h>
									</div>
						<div class="wrapperj">
								<?php //echo $data['Title'];?>
						</div>
									<a href="detail.php?cid=<?php echo $data['CourseID'];?>"><i class="logo" aria-hidden="true"></i>
										<div class="wrapperk">Click for</div>
										<div class="wrapperl">detail</div>
									</a>
										
                                </div>
								
                                <div class="courses-content-wrapper">
                                    
								   <ul class="courses-info hit">
									   
                                       <li>
											
                                           
											<?php echo $data['Title'];?><br>
											
											</li>
                                       
										</ul>
                                   
										<ul class="courses-info smallfonts four_block">

										<li class="smfont"><?php
													if($data['EnrStartDate']!='')
												 {
														 //  echo $data['StartDate'];
														 
									   $endDate = date('m/d/Y', strtotime($data['EnrStartDate']));  
									   
									   echo  $endDate. '&nbsp;&nbsp;-&nbsp;';
												 }else{echo "N/A";}
													?>
												
												<?php
													if($data['EnrEndDate']!='')
												 {
														 //  echo $data['StartDate'];
														 
									   $endDate = date('m/d/Y', strtotime($data['EnrEndDate']));  
									   
									   echo  $endDate;
												 }
													?>
												<br><span> <b> Enrollment Duration</b></span></li>
	
										   <li class="smfont">
										   <?php
										 // echo $endDate = date('m/d/Y', strtotime($data['StartDate']));  
										   
										   ?>
										   <?php
													if($data['StartDate']!='')
												 {
														 //  echo $data['StartDate'];
														 
									   $endDate = date('m/d/Y', strtotime($data['StartDate']));  
									   
									   echo  $endDate;
												 }else{echo "N/A";}
													?>
												<br><span> <b> Course Date </b></span></li>
																					</ul>

										

										<ul class="courses-info smallfonts four_block">
										<li class="smfont"><?php $D=date("h:i a", strtotime($data['StartTime']));echo $D; ?> - <?php $E=date("h:i a", strtotime($data['EndTime']));echo $E; ?>
                                            <br><span> <b>Time</b></span></li>
										
                                        <li class="smfont"><?php  $noofuserreg=$data['NoofUserRegistered'];	
															$totcap=$data['TotalCapacity'];
															$setave=$totcap-$noofuserreg; 
															if($setave!=''){ echo $setave;}else{echo  "N/A";}?>
                                            <br><span>  <b> Seats </b></span></li>
									
                                        
										</ul>

                                </div>
								
                            </div>
                        </div>
                    </div>  						
											
												
											
		<?php
			}
		}
		
		else
		{
			
		?>
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 curnt">
                        <div class="courses-box1">
                            <div class="single-item-wrapper">
                            	<div class="nocourse">
                                    <center class="nocourse2">   No Courses are available.</center>
									</div>
                                
                            </div>
                        </div>
                    </div> 
		<?php
			
		}	
		?>
		<!--end Curent course -->
        
        <!--upcoming course -->
        
		<?php
			$date=date('Y-m-d');											
			$cnd=" and AnnDate <= '$date' and (EnrStartDate > '$date') ";
			
                        
			$res=mysql_query("SELECT * FROM tblcourse where IsStatus = 1 $cnd order by AnnDate ASC");
				$noofrec=mysql_num_rows($res);
			if($noofrec>0)
			{	 
				while($data=mysql_fetch_array($res))
												{
											//print_r($data);
											//exit;
				?>										


										
				
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 dea">
                        <div class="courses-box1">
                            <div class="single-item-wrapper">
                               	<div class="courses-img-wrapper hvr-bounce-to-bottom">
								  
                                    <img src="admin/upload/<?php echo $data['Image'];?>" class="wrapperimg" 
									alt="">
									
									<div class="wrapperdiv">
                                     <h class="wrapperh">
									 <center class="wrapperi"></center> </h>
									</div>
						<div class="wrapperj">
								<?php //echo $data['Title'];?>
						</div>
									<a href="detail.php?cid=<?php echo $data['CourseID'];?>"><i class="logo" aria-hidden="true"></i>
										<div class="wrapperk">Click for</div>
										<div class="wrapperl">detail</div>
									</a>
										
                                </div>
								
                                <div class="courses-content-wrapper">
                                    
								   <ul class="courses-info hit">
									   
                                       <li>
											
                                           
											<?php echo $data['Title'];?><br>
											
											</li>
                                       
										</ul>
                                   
										<ul class="courses-info smallfonts four_block">

										<li class="smfont"><?php
													if($data['EnrStartDate']!='')
												 {
														 //  echo $data['StartDate'];
														 
									   $endDate = date('m/d/Y', strtotime($data['EnrStartDate']));  
									   
									   echo  $endDate. '&nbsp;&nbsp;-&nbsp;';
												 }else{echo "N/A";}
													?>
												
												<?php
													if($data['EnrEndDate']!='')
												 {
														 //  echo $data['StartDate'];
														 
									   $endDate = date('m/d/Y', strtotime($data['EnrEndDate']));  
									   
									   echo  $endDate;
												 }
													?>
												<br><span> <b> Enrollment Duration</b></span></li>
	
										   <li class="smfont">
										   <?php
										 // echo $endDate = date('m/d/Y', strtotime($data['StartDate']));  
										   
										   ?>
										   <?php
													if($data['StartDate']!='')
												 {
														 //  echo $data['StartDate'];
														 
									   $endDate = date('m/d/Y', strtotime($data['StartDate']));  
									   
									   echo  $endDate;
												 }else{echo "N/A";}
													?>
												<br><span> <b> Course Date </b></span></li>
																					</ul>
	
											
	
											<ul class="courses-info smallfonts four_block">
											<li class="smfont"><?php $D=date("h:i a", strtotime($data['StartTime']));echo $D; ?> - <?php $E=date("h:i a", strtotime($data['EndTime']));echo $E; ?>
												<br><span> <b>Time</b></span></li>
											
											<li class="smfont"><?php  $noofuserreg=$data['NoofUserRegistered'];	
																$totcap=$data['TotalCapacity'];
																$setave=$totcap-$noofuserreg; 
																if($setave!=''){ echo $setave;}else{echo  "N/A";}?>
												<br><span>  <b> Seats </b></span></li>
										
											
											</ul>

                                </div>
                            </div>
                        </div>
                    </div>  						
											
												
											
		<?php
			}
		}
		
		else
		{
			?>
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 dea">
                        <div class="courses-box1">
                            <div class="single-item-wrapper">
                            	<div class="nocourse">
                                    <center class="nocourse2">   No Courses are available.</center>
									</div>
                                
                            </div>
                        </div>
                    </div> 
		<?php
		}	
		?>
              <!--end upcoming course --> 
              
                 <!--Pervious course -->
		<?php
		
			
		$date=date('Y-m-d');
		$cnd=" and (EndDate < '$date' ) ";
		$res=mysql_query("SELECT * FROM tblcourse Where  IsStatus = 1 $cnd  order by StartDate ASC");
		
		$noofrec=mysql_num_rows($res);
			if($noofrec>0)
			{	 
				while($data=mysql_fetch_array($res))
				{
											//print_r($data);
											//exit;
				?>										


										
				
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 pre">
                        <div class="courses-box1">
                            <div class="single-item-wrapper">
                               	<div class="courses-img-wrapper hvr-bounce-to-bottom">
								  
                                    <img src="admin/upload/<?php echo $data['Image'];?>" class="wrapperimg" 
									alt="">
									
									<div class="wrapperdiv">
                                     <h >
									 <center class="wrapperi"></center> </h>
									</div>
						<div class="wrapperj">
								<?php //echo $data['Title'];?>
						</div>
									<a href="detail.php?cid=<?php echo $data['CourseID'];?>"><i class="logo" aria-hidden="true"></i>
										<div class="wrapperk">Click for</div>
										<div class="wrapperl">detail</div>
									</a>
										
                                </div>
								
                               <div class="courses-content-wrapper">
                                    
								  <ul class="courses-info hit">
									   
                                       <li>
											
                                           
									   <?php if($data['Title']!='')
												 {
													 echo $data['Title'];
													 } else{echo  "N/A";}?><br>
											
											</li>
                                       
										</ul>
                                   
										
										<ul class="courses-info smallfonts four_block">

										<li class="smfont"><?php
													if($data['EnrStartDate']!='')
												 {
														 //  echo $data['StartDate'];
														 
									   $endDate = date('m/d/Y', strtotime($data['EnrStartDate']));  
									   
									   echo  $endDate. '&nbsp;&nbsp;-&nbsp;';
												 }else{echo "N/A";}
													?>
												
												<?php
													if($data['EnrEndDate']!='')
												 {
														 //  echo $data['StartDate'];
														 
									   $endDate = date('m/d/Y', strtotime($data['EnrEndDate']));  
									   
									   echo  $endDate;
												 }
													?>
												<br><span> <b> Enrollment Duration</b></span></li>
	
										   <li class="smfont">
										   <?php
										 // echo $endDate = date('m/d/Y', strtotime($data['StartDate']));  
										   
										   ?>
										   <?php
													if($data['StartDate']!='')
												 {
														 //  echo $data['StartDate'];
														 
									   $endDate = date('m/d/Y', strtotime($data['StartDate']));  
									   
									   echo  $endDate;
												 }else{echo "N/A";}
													?>
												<br><span> <b> Course Date </b></span></li>
																					</ul>
	
											
	
											<ul class="courses-info smallfonts four_block">
											<li class="smfont"><?php if($data['StartTime']!=''){$D=date("h:i a", strtotime($data['StartTime']));echo $D; }else{echo "N/A";}?> - <?php if($data['EndTime']!=''){ $E=date("h:i a", strtotime($data['EndTime']));echo $E; }else{echo "N/A";}?>
												<br><span> <b>Time</b></span></li>
											
											<li class="smfont"><?php  $noofuserreg=$data['NoofUserRegistered'];	
																$totcap=$data['TotalCapacity'];
																$setave=$totcap-$noofuserreg; 
																if($setave!=''){ echo $setave;}else{echo  "N/A";}?>
												<br><span>  <b> Seats </b></span></li>
										
											
											</ul>
                                </div>
                            </div>
                        </div>
                    </div>  						
											
												
											
		<?php
			}
		}
		else
		{
			?>
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pre">
                        <div class="courses-box1">
                            <div class="single-item-wrapper">
                            	<div class="nocourse" >
                                    <center class="nocourse2" >   No Courses are available.</center>
									</div>
                                
                            </div>
                        </div>
                    </div> 
		<?php	
		}	
		?>	
        <!--end Pervious course -->
		
		
		
		
		
		
		<!-- user Profile -->
		<?php
//	session_start();
	
	
	if(isset($_SESSION['RegisterId']))
	{
		$res=mysql_query("SELECT  tblcourseregistered.createdOn,tblcourse.Title,tblcourse.CourseID,tblcourse.EnrStartDate,tblcourse.EnrEndDate,tblcourse.StartDate,tblcourse.StartTime,tblcourse.EndTime,tblcourse.TotalCapacity,tblcourse.NoofUserRegistered,tblcourse.Image from tblcourseregistered INNER JOIN tblcourse on tblcourseregistered.CourseID=tblcourse.CourseID where tblcourseregistered.RegisterId='$reid'  ");
		
		$noofrec=mysql_num_rows($res);
			if($noofrec>0)
			{	 
				while($data=mysql_fetch_array($res))
				{
											//print_r($data);
											//exit;
				?>										


										
				
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 user">
                        <div class="courses-box1">
                            <div class="single-item-wrapper">
                               	<div class="courses-img-wrapper hvr-bounce-to-bottom">
								  
                                     <img src="admin/upload/<?php echo $data['Image'];?>" class="wrapperimg" 
									alt="">
									
									<div class="wrapperdiv">
                                     <h class="wrapperh">
									 <center class="wrapperi"></center> </h>
									</div>
						<div class="wrapperj">
								<?php //echo $data['Title'];?>
						</div>
									<a href="detail.php?cid=<?php echo $data['CourseID'];?>"><i class="logo" aria-hidden="true"></i>
										<div class="wrapperk">Click for</div>
										<div class="wrapperl">detail</div>
									</a>
										
                                </div>
								
                               <div class="courses-content-wrapper">
                                    
								   <ul class="courses-info hit">
									   
                                       <li>
											
                                           
											<?php echo $data['Title'];?><br>
											
											</li>
                                       
										</ul>
                                   
										<ul class="courses-info smallfonts four_block">

										<li class="smfont"><?php
										   $endDate = date('m/d/Y', strtotime($data['EnrStartDate']));
										 echo  $endDate. '&nbsp;&nbsp;-&nbsp;';  
										  ?>
										
										  <?php
										  echo $endDate = date('m/d/Y', strtotime($data['EnrEndDate']));
										   ?>
												<br><span> <b> Enrollment Duration</b></span></li>
	
										   <li class="smfont">
										   <?php
										  echo $endDate = date('m/d/Y', strtotime($data['StartDate']));  
										   
										   ?>
												<br><span> <b> Course Date </b></span></li>
																					</ul>
	
											
	
											<ul class="courses-info smallfonts four_block">
											<li class="smfont"><?php $D=date("h:i a", strtotime($data['StartTime']));echo $D; ?> - <?php $E=date("h:i a", strtotime($data['EndTime']));echo $E; ?>
												<br><span> <b>Time</b></span></li>
											
											<li class="smfont"><?php  $noofuserreg=$data['NoofUserRegistered'];	
																$totcap=$data['TotalCapacity'];
																$setave=$totcap-$noofuserreg; 
																if($setave!=''){ echo $setave;}else{echo  "N/A";}?>
												<br><span>  <b> Seats </b></span></li>
										
											
											</ul>
                                </div>
                            </div>
                        </div>
                     </div>  						
											
												
											
		<?php
			}
		}
		
		else
		{
			?>
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 user">
			<div class="courses-box1">
				<div class="single-item-wrapper">
					<div class="nocourse" >
						<center class="nocourse2" >   No Courses are available.</center>
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
             
									
									
									
									
									
									
									
									
									
									
									
									
									
	
</div></div>
         
		 <?php
		 include('footer.php');
		 ?>
		 
        </div>
		
		
<!--<link rel='stylesheet' id='gforms_reset_css-css'  href='css/formreset.min.css' type='text/css' media='all' />-->
<link rel='stylesheet' id='gforms_formsmain_css-css'  href='css/formsmain.min.css' type='text/css' media='all' />
<!--<link rel='stylesheet' id='gforms_ready_class_css-css'  href='css/readyclass.min.css' type='text/css' media='all' />-->
<!--<link rel='stylesheet' id='gforms_browsers_css-css'  href='css/browsers.min.css' type='text/css' media='all' />-->


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
<!--<script type='text/javascript' src='js/magnific-popup.js'></script> -->
<!--<script type='text/javascript' src='js/wow.min.js'></script> -->
<!--<script type='text/javascript' src='js/scripts.min.js'></script> -->
<!--<script type='text/javascript' src='js/jquery.sticky-kit.js'></script> -->
<script src="//code.jquery.com/jquery-1.12.4.js"></script>
<script src="js_new/bootstrap.min.js" type="text/javascript"></script> 
<!--<script src='https://www.google.com/recaptcha/api.js'></script>-->
<!--<script type="text/javascript" src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>-->
 

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
// $(".about-the-quickfacts").stick_in_parent({
//     offset_top: 70
// });
</script>

<!-- Preloader Start Here -->
<div id="preloader"></div>
<!-- Preloader End Here --> 
<!-- jquery--> 
<!--<script src="js_new/jquery-2.2.4.min.js" type="text/javascript"></script> -->
<!-- Plugins js --> 
<!--<script src="js_new/plugins.js" type="text/javascript"></script> -->
<!-- Bootstrap js --> 

<!-- WOW JS --> 
<script src="js_new/wow.min.js"></script> 
<!-- Nivo slider js --> 
<!--<script src="vendor/slider/js/jquery.nivo.slider.js" type="text/javascript"></script> -->
<!--<script src="vendor/slider/home.js" type="text/javascript"></script> -->
<!-- Owl Cauosel JS --> 
<!--<script src="vendor/OwlCarousel/owl.carousel.min.js" type="text/javascript"></script> -->
<!-- Meanmenu Js --> 
<script src="js_new/jquery.meanmenu.min.js" type="text/javascript"></script> 
<!-- Srollup js --> 
<script src="js_new/jquery.scrollUp.min.js" type="text/javascript"></script> 
<!-- jquery.counterup js --> 
<!--<script src="js_new/jquery.counterup.min.js"></script> -->
<!--<script src="js_new/waypoints.min.js"></script> -->
<!-- Countdown js --> 
<!--<script src="js_new/jquery.countdown.min.js" type="text/javascript"></script> -->
<!-- Isotope js --> 
<script src="js_new/isotope.pkgd.min.js" type="text/javascript"></script> 
<!-- Select2 Js --> 
<!--<script src="js_new/select2.min.js" type="text/javascript"></script> -->
<!-- Nouislider Js --> 
<!--<script src="vendor/noUiSlider/nouislider.min.js" type="text/javascript"></script> -->
<!-- Validator js --> 
<!--<script src="js_new/validator.min.js" type="text/javascript"></script> -->
<!-- Magic Popup js --> 
<!--<script src="js_new/jquery.magnific-popup.min.js" type="text/javascript"></script> -->
<!-- Custom Js --> 

 
<!--<script src="js/jquery-1.12.4-jquery.min.js"></script>-->

</body>
</html>