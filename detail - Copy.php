<?php 

include("admin/connect.php"); 
session_start();
$emailpass=$_SESSION['Email'];
$MODE=MODE;
$cid=$_REQUEST['cid'];
error_reporting(0);

include("log4php/Logger.php");
include("Lib_log.php");

 
Logger::configure('multiple.xml');
 //$log;
 //$log=Logger::getLogger('dberror');

 $vars = new Lib_log(); 





$FROMNAME=FROMNAME;
$USERNAME=USERNAME;
 $USERPASSWORD=USERPASSWORD;
 $SETFROM=SETFROM;
 $SETTO=SETTO;
// session_start();




//$res=mysql_query("SELECT * FROM tblcourse Where CourseID = '".$_REQUEST['cid']."'");
// (SELECT GROUP_CONCAT(EmailAddress SEPARATOR ',') FROM tbluser WHERE RoleId = et.Cc && ISActive = 1) AS totalcc


$res=mysql_query("SELECT c.* FROM tblcourse as c Where CourseID = '".$_REQUEST['cid']."'");
//$res=mysql_query("SELECT c.*,i.InsName as Instructor FROM tblcourse as c  INNER JOIN tblmstinstructor as i ON c.InsId=i.InsId where c.CourseID='".$_REQUEST['cid']."'");
$data=mysql_fetch_array($res);
if($data['InsId']!=NULL)
{
	$ins = mysql_query("SELECT GROUP_CONCAT(InsName SEPARATOR ', ')  AS Instructor FROM tblmstinstructor WHERE InsId IN (".$data['InsId'].")");
$insres=mysql_fetch_array($ins);
}






//print_r($data);


$instructordata=mysql_query("SELECT tblcourse.CourseID,tblcourse.InsId, tblmstinstructor.InsName, tblmstinstructor.InsImg,tblmstinstructor.About FROM tblcourse INNER JOIN tblmstinstructor ON tblcourse.InsId=tblmstinstructor.InsId where tblcourse.CourseID='".$_REQUEST['cid']."'");

$datainstructor=mysql_fetch_array($instructordata);
	//$getIns=explode(',',$datainstructor['InsId']);
	$getIns=$datainstructor['InsId'];
   $selectId=mysql_query("select * from tblmstinstructor where InsId  IN (".$getIns.")");
  
		
		//exit;

?>

<!doctype html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
<title>ALL-Institute | Course detail</title>
<link rel="apple-touch-icon" href="image/favicon-apple.png">
<link rel="icon" href="image/favicon.png">
<link rel="pingback" href="http://tritraining.edu.au/xmlrpc.php">
<!-- <link rel="stylesheet" href="css/font-awesome.min.css">
<link type="text/css" media="screen" rel="stylesheet" href="css/awwwards.css" />
<link type="text/css" media="screen" rel="stylesheet" href="css/fastfonts.css" /> -->
<!-- <script src="js_new/bootstrap.min.js" type="text/javascript"></script> -->
<script type='text/javascript'  src="js/jquery-2.1.1.min.js"></script>

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
    <!-- <link rel="stylesheet" href="vendor/slider/css/nivo-slider.css" type="text/css" />
    <link rel="stylesheet" href="vendor/slider/css/preview.css" type="text/css" media="screen" /> -->
    <!-- Datetime Picker Style CSS -->
    <link rel="stylesheet" href="css_new/jquery.datetimepicker.css">
    <!-- Magic popup CSS -->
    <!-- <link rel="stylesheet" href="css_new/magnific-popup.css"> -->
    <!-- Switch Style CSS -->
    <link rel="stylesheet" href="css_new/hover-min.css">
    <!-- Custom CSS -->
	<link rel="stylesheet" href="css_new/style.css">
	
	<!-- <script src="js_new/jquery-2.2.4.min.js" type="text/javascript"></script> -->
    <!-- Modernizr Js -->
    <!-- <script src="js_new/modernizr-2.8.3.min.js"></script> -->

<style>

h3.sidebar-title {
  font-size: 22px;
  color: #002147;
  text-transform: capitalize;
  margin-bottom: 35px;
  position: relative;
  font-weight: 500;
  text-align:left;
  
}

.fontnone
{
	text-transform: none !important;
}

.title-default-left {
    text-transform: capitalize;
    text-align: left;
    font-weight: 700;
	font-size:28px;
    margin-bottom: 45px;
    color: #002147;
}
.course-details-inner .course-details-tab-area ul.course-details-tab-btn > li a 
{
	 font-weight: 700;
}
.related-courses-title-area h3 
{
 
  text-align:left;
  font-size:22px;
  font-weight: 700;
}
.owl-nav
{
   padding-top:15px;
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
  background-color:#C4161C;
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
.courses-box1 .single-item-wrapper .courses-img-wrapper:before
{
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
h4
{
    font-family: 'Roboto', sans-serif;
    line-height: 1.5 !important;
    font-weight: 300 !important;
    margin: 0 0 20px 0;
    color: #212121;
}
h3
{
text-align:left !important;
    font-family: 'Roboto', sans-serif;
    line-height: 1.5;
    font-weight: 600 !important;
   
    color: #212121;
}
.courses-box1 .single-item-wrapper .courses-img-wrapper a
{
	height:70px !important;
	width:70px !important;
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
.courses-box1 .single-item-wrapper .courses-content-wrapper
 {
    padding: 0px 5px !important;
}

.courses-box1 .single-item-wrapper
{
	width:100% !important;
}

.courses-page-area5 
{
    padding: 10px 0 70px !important;
}
.courses-page-area5 
{
    padding: 30px 0 70px !important;
}

h3.sidebar-title
{
	font-size: 16px !important;

}
.sidebar-title2{font-size:16px;text-transform:none;}

.skilled-lecturers-img img{width: 100px; text-align: center; position: relative; margin: auto;}

.skilled-lecturers-content h4{margin-top:40px;}

.skilled-lecturers-details a{margin-top:30px;}

.noinstructor{background: #ccc;color: #000;font-size: 20px;text-align: center;padding: 50px 20px;}

.sidtop{margin-top:-30px;}

.sidtop-enroll {margin-top:10px !important;}
/*ul 
{
    margin: 1em 0px !important;
}*/

.hentry header, .homepage-article header, .blog-article header {
    padding: 0em 0em !important;
}
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
.hentry header, .homepage-article header, .blog-article header
 {
     padding-top: 0  !important;
    margin-top:0px;	 
}
.none{display:none !important;}

.smallfonts li
{
	font-size:12px!important;
}

						.btn-danger {
    color: #fff;
    background-color: #c00808!important;
    border-color: #c00808!important;
}
.btn-danger:hover {
    color: #fff;
    background-color: #333!important;
    border-color: #333!important;
}

.courses-content-wrapper ul {
	margin: 1em 0px !important;
}
.single-detail{float:left;}
						
</style>
        <!-- <link rel='stylesheet' id='cpsh-shortcodes-css'  href='css/shortcodes.css' type='text/css' media='all' /> -->
        <link rel='stylesheet' id='bones-boot-css'  href='css/bootstrap.min.css' type='text/css' media='all' />
        <!-- <link rel='stylesheet' id='bones-magnafic-css'  href='css/magnific-popup.css' type='text/css' media='all' /> -->
        <!-- <link rel='stylesheet' id='bones-animate-css'  href='css/animate.css' type='text/css' media='all' /> -->
        <link rel='stylesheet' id='bones-stylesheet-css'  href='css/style.css' type='text/css' media='all' />
        <!-- <link rel='stylesheet' id='bones-icons-css'  href='css/icons.css' type='text/css' media='all' /> -->
        <link rel='stylesheet' id='googleFonts-css'  href='http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic' type='text/css' media='all' />
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
										<h1 class="page-title">Course Detail</h1>
									</header>
									<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
									
									 
						
											
								   <div class="alert alert-success" id="course_enroll" style="width:100%;margin:0px 0px 10px 0px;display:none">
				                	    <b> Thank you for enroll for this course.</b>
								   </div>
									
										<div class="alert alert-success" id="succes_login_id" style=" margin:0px 0px 10px 0px;display:none">
												<b>You are logged in successfully.</b> <br><?php echo $emailpass ?>
										</div>
									</div>
						</article>
					</div>						
								
									
        <div class="courses-page-area5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
					
					<?php
						
						if($data['CourseID']=='')
						{
							echo "<script>window.location='404.php';</script>";
							?>
							
							<!-- <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 all">
								<div class="courses-box1">
									<div class="single-item-wrapper">
										<div class="nocourse" >
											<center class="nocourse2">No courses are available.</center>
											
										
										</div>
									</div>
								</div> 
							</div> -->
					<br><br><br><br><br><br><br><br><br>
					<?php
						}
						else
						{
					?>					
					
                        <div class="course-details-inner">
                            <h3 class="title-default-left title-bar-high"><?php echo $data['Title'];?></h3>
                           
							
                            <img src="admin/upload/<?php echo $data['Image'];?>" class="img-responsive" alt="course">
                            <div class="course-details-tab-area">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <ul class="course-details-tab-btn">
                                            <li class="active"><a href="#description" data-toggle="tab" aria-expanded="false">Description</a></li>
                                            
							<?php

								if($selectId>0)
								{	
							?>
										<li><a href="#lecturer" data-toggle="tab" aria-expanded="false" style="text-transform: none !important;">Instructor(s)</a></li>
							<?php		
								}
								else
								{
									
								}
							?>
											
											
                                            
                                         <!--   <li><a href="#reviews" data-toggle="tab" aria-expanded="false">Reviews</a></li>  -->
                                        </ul>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12">
									
                                        <div class="tab-content">
                                             <div class="tab-pane fade active in" id="description">
                                                <h3 class="sidebar-title">Course Description</h3>
                                                
												 <p style="text-align:justify"><?php if($data['Summary']!='')
												 {
													 echo $data['Summary'];
													 } else{echo  "Not Available";}?></p>
													 	<div class="row">
												<div class="col-lg-6 col-md-6">
													<h3 class="sidebar-title sidebar-title2">Enrollment Duration</h3>
													
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
													<h3 class="sidebar-title sidebar-title2">Location</h3>
													<p><?php if($data['Location']!='')
												 { echo $data['Location'];}else{echo  "Not Available";}?></p>
													<h3 class="sidebar-title sidebar-title2">Intended Audience</h3>
													<p><?php  if($data['IntendedAudience']!=''){ echo $data['IntendedAudience'];}else{echo  "Not Available";}?></p>
													<h3 class="sidebar-title sidebar-title2">Meeting Type</h3>
													<p><?php  if($data['MeetingType']!=''){ echo $data['MeetingType'];}else{echo  "Not Available";}?></p>

												</div>
												
												<div class="col-lg-6 col-md-6">
												<h3 class="sidebar-title sidebar-title2">Course Date <span class="fontnone">and</span> Time</h3>
													
													<p><?php
													if($data['StartDate']!='')
												 {
														 //  echo $data['StartDate'];
														 
									   $endDate = date('m/d/Y', strtotime($data['StartDate']));  
									   
									   echo  $endDate;
												 }else{echo "Not Available";}
													?>&nbsp;/&nbsp;
													<?php if($data['StartTime']!='')
												 {
													$stimes=date("h:i a", strtotime($data['StartTime']));
													echo $stimes;
												 }else{echo "Not Available";}
													?>
													
													</p>

													<h3 class="sidebar-title sidebar-title2 fontnone">Instructor(s)</h3>
													<p><?php if(isset($insres)&&$insres['Instructor']!=''){ echo $insres['Instructor'];}else{echo  "Not Available";}?></p>
													<h3 class="sidebar-title sidebar-title2 fontnone">Discussant/Moderator(s)</h3>
													<p><?php  if($data['Instigator']!=''){echo $data['Instigator'];}else{echo  " Not Available";}?></p>
													<h3 class="sidebar-title sidebar-title2">Total Available Seats</h3>
													<p>

<?php
												 	
													$date=date('Y-m-d');
		$cnd=" and (EndDate < '$date' ) ";
		$res=mysql_query("SELECT c.* FROM tblcourse as c Where CourseID = '".$data['CourseID']."' and (EndDate < '$date')");
		//$data=mysql_fetch_array($res);
		$noofrecin=mysql_num_rows($res);
			if($noofrecin==0)
			{
				?>

				<div id="num"></div>
																	<script>
																	
																	var num = <?php echo $data['TotalCapacity'] - $data['NoofUserRegistered']; ?>;
																	
																	if(num==0)
																	{
																	   num="Not Available";
																		
																	}
																	document.getElementById('num').innerHTML = num;
																	
																	
																	</script>
				
								<?php
			}
			else
			{
				
				echo "Not Available";

			}		
?>









													
													<?php 
													// $noofuserreg=$data['NoofUserRegistered'];	
															// $totcap=$data['TotalCapacity'];
															// $setave=$totcap-$noofuserreg	; 
															// if($setave!=''){ echo $setave;}else{echo  "Not Available";}
															?>
													
															</p>
																									
                                                </div>
												</div>
                                            </div>
											
                                         
										 
										 
	<!--  Lecturer Code start    -->									 
	
										 
                                            <div class="tab-pane fade" id="lecturer">
                                                <div class="course-details-skilled-lecturers">
			<?php
			
   
   if($selectId>0)
   {
			while($datainstructor1=mysql_fetch_array($selectId))
			{
	?>									<br>
                                                    <ul>
                                                        <li>
                                                            <div class="skilled-lecturers-img col-md-3 col-sm-4 col-xs-4">
                                                                <a href="instructor.php?InsId=<?php echo $datainstructor1['InsId']; ?>" target="_blank"><img src="admin/upload/instructor/<?php  echo $datainstructor1['InsImg'];?>" class="img-responsive" alt="skilled"></a>
                                                            </div>
                                                            <div class="skilled-lecturers-content col-md-6 col-sm-8 col-xs-8">
                                                                <h4><a href="instructor.php?InsId=<?php echo $datainstructor1['InsId']; ?>" target="_blank"><?php  echo $datainstructor1['InsName'];?></a></h4>
                                                               
                                                            </div>
                                                            
                                                            <div class="skilled-lecturers-details col-md-3 col-sm-4 col-xs-4">
                                                        <a href="instructor.php?InsId=<?php echo $datainstructor1['InsId']; ?>" target="_blank" class="details-accent-btn btn-t">Details</a>
                                                            </div>
                                                        </li>
														
                                                        
                                                    </ul>
			<?php
			}
    }
	else
		
		{
			?>
			<div class="noinstructor">
				No Instructor are available.
			</div>
			<?php
		}
			?>			
													
                                                </div>
                                            </div>
	

											
											
											
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
						<?php
						}
						?>
						
						
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
					<!-- sidebar start -->
					 <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
						   <?php 
						   //include("admin/connect.php"); 
						
$res=mysql_query("SELECT * FROM tblcourse Where CourseID = '".$_REQUEST['cid']."'");
$data=mysql_fetch_array($res);
$ccid=$data['CourseID'];
//print_r($data);

?>
					<?php
						if($data['CourseID']=='' )
						{
								//echo "hiiiiiii";
						}
						else
						{
					?>					
						<div class="sidebar" style=" margin:0px 0px 10px 0px">
                            <div class="sidebar-box" >
                                <div class="sidebar-box-inner">
                                    <h3 class="sidebar-title">Fee</h3>
                                    <div class="sidebar-course-price">
                                        <p><?php if($data['CourseFees']!='')
								   {	echo "$";
									    echo $data['CourseFees']; } 
									else{ echo  " Not Available"; }
							   ?></p>
                                        
                                        
                                    </div>
                                </div>
                            </div>
                        </div> 
					<?php
						}
					?>
	<?php
		$date=date('Y-m-d');
		$cnd=" and (EndDate < '$date' ) ";
		$res=mysql_query("SELECT * FROM tblcourse Where CourseID='$ccid' and IsStatus = 1 $cnd");
		$data2=mysql_fetch_array($res);
		//echo $video1=$data['Video'];
		$noofrec=mysql_num_rows($res);
		if($noofrec>0)
		{
	?>
						<br>
						<div class="sidebar" style="margin:0px 0px 10px 0px">
                            <div class="sidebar-box" >
                                <div class="sidebar-box-inner">
                                    <h3 class="sidebar-title">Video</h3>
                                   <?php 
								   if($data2['Video']!='')
								   {
									 ?>
									 <a href="https://www.youtube.com/watch?v='.'$data2['Video']'">
									  <div class="youtube-popup">
										  <?php 

if(strstr($_SERVER['HTTP_USER_AGENT'],'iPhone') || strstr($_SERVER['HTTP_USER_AGENT'],'iPod') || strstr($_SERVER['HTTP_USER_AGENT'],'iPad')) {
?>

<object width="100%" height="150"><param name="movie" value="<?php echo 'https://www.youtube.com/embed/'.$data2['Video'];?>" /><param name="allowFullScreen" value="true" /><param name="allowscriptaccess" value="always" /><embed type="application/x-shockwave-flash" width="100%" height="150" src="<?php echo 'https://www.youtube.com/embed/'.$data2['Video'];?>" allowscriptaccess="always" allowfullscreen="true"></embed></object>

<?php } else {  ?>
      <iframe width="100%" height="150" src="<?php echo 'https://www.youtube.com/embed/'.$data2['Video'];?>" frameborder="0" allowfullscreen></iframe>
<?php  }  ?>
                                      
									   </div>
									</a>	   
									  
									
									<?php 
								   }
								   else
								   {
									   echo  " Not Available";
								   }
								   ?>
                                      <?php //echo $data['Video']; ?>
                                         
									
										<script>
											$('.youtube-popup > div').click(function()
											{
												window.open($(this).parent().children('iframe').attr("src"));
											});
										</script>
                                </div>
                            </div>
                        </div>
		<?php
		}
		?>
					
						
				
 <?php
	

	
	
	$select1=mysql_query("select * from tblregister where Email='$emailpass'");
	$result1=mysql_fetch_array($select1);
	$query=mysql_num_rows($select1);
	 $isactive=$result1['IsActive'];
	 $regid=$result1['RegisterId'];
	  $fnm=$result1['FirstName'];
	  $em=$result1['Email'];
	 $pno=$result1['Phone'];
	 $lnm=$result1['LastName'];
    $add=$result1['Address'];

	 $cid=$_REQUEST['cid'];
	 
	if($query>0)
	{ 
	
		
		if($isactive=="1")
		{
		?>

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
							$('#succes_login_id').css('display','block');
					
						setTimeout(function() {
							$('#succes_login_id').css('display','none');

									var my_variable_name = window.location.href;
							
							var success = my_variable_name.replace("?check=0", '');
							
							//window.location.replace(success);

						}, 10000);
					}
					});
					</script>

				<!-- <script>
setTimeout(function() {
  $('#succes_login_id').fadeOut('hide');
}, 10000);
					
				</script> -->
			
					<br>
						<div class="sidebar-box">
							<div class="sidebar-box-inner">	
								<a href="logout.php"><button type="submit" class="btn btn-danger btn-block" name="signinbtn">Logout</button></a>
							</div>
						</div>
						
		
					
			<?php
								   
				$selcourse=mysql_query("select * from tblcourse where CourseID='$cid'");
				$res1=mysql_fetch_array($selcourse);
				$cid=$res1['CourseID'];
				$totseat=$res1['TotalCapacity'];
				$noofseat=$res1['NoofUserRegistered'];
				$date1=date('Y-m-d');
				$edate =$res1['EndDate'];

				
				if(isset($_POST['enroll']))
				{
					$enr=mysql_query("select * from tblcourseregistered where CourseID='$cid' && RegisterId='$regid' ");
					$enrol=mysql_fetch_array($enr);
					$reid=$enrol['$RegisterId'];
					$cid=$enrol['$CourseID'];

					$Instructor= $insres['Instructor'];

					$date=date('Y-m-d');
					 $cnd=" and (EndDate < '$date' ) ";
					 $res=mysql_query("SELECT * FROM tblcourse Where CourseID='$cid' $cnd order by StartDate");

					 $rec=mysql_num_rows($res);
					
					if($edate < $date1 &&  $rec>0)
					{	
					?>
					
										<script>
											$( document ).ready(function() {
												$('#dead_close').attr('style','display:block;');  
												setTimeout(function() {
											
												$('#dead_close').fadeOut('hide');
												}, 10000);
										});
										</script>
                        
					<?php	
					}
					else if($enrol!=0)
					{
					?>
										<script>
											$( document ).ready(function() {
												$('#reg_already').attr('style','display:block;');  
												setTimeout(function() {
											
												$('#reg_already').fadeOut('hide');
												}, 10000);
										});
										</script>
					   
						
					
					<?php
					}
					else if($noofseat>=$totseat)
					{
					?>
					
										<script>
											$( document ).ready(function() {
												$('#reg_close').attr('style','display:block;');  
												setTimeout(function() {
											
												$('#reg_close').fadeOut('hide');
												}, 10000);
										});
										</script>
                    
													
					<?php	
					}
					else
					{
					
						$isactive=$result1['IsActive'];
						$regid=$result1['RegisterId'];
						$cid=$_REQUEST['cid'];
						$ins=mysql_query("insert into tblcourseregistered(RegisterId,CourseID,IsActive) values('$regid','$cid','$isactive')");
						$noofseat2=$noofseat+1;
						$upd=mysql_query("update tblcourse set NoofUserRegistered='$noofseat2' where CourseID='$cid'");
						//var_dump($res1);
						//exit();
						
						if($upd)
						{
							
									$cid=$data['CourseID'];
									$tit=$data['Title'];
									//$Instructor=$data['Instructor'];
									$Instigator=$data['Instigator'];
									$StartDate=$data['StartDate'];
									$Location=$data['Location'];
									//$Time=$data['StartTime'];
									
									$Time=date("h:i a", strtotime($data['StartTime'])); 
									$IntendedAudience=$data['IntendedAudience'];
									$MeetingType=$data['MeetingType'];
									$CourseFees=$data['CourseFees'];
								
									
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
								//	$mail->AddEmbeddedImage('emailimage/logo.png','logoimg','logo.jpg');
									$mail->Subject = "AERE Course $tit";
									$mail->Body =  "<img src='http://allinstitute-dev.demobyopeneyes.com/email/emailimage/emaillogo.jpg' style='height:80px; width:180px;' > <br><br><br>
									Hello <b>$fnm,</b><br><br>
							
									Thank you for your interest in the course $tit.We have received your 
									registration with the following detail:<br><br>
										
									<b>First name</b>: $fnm<br>
									<b>Last name</b>: $lnm<br>
									<b>Email Id</b>: $em<br>
									<b>Address</b>: $add<br>
									<b>Phone number</b>: $pno<br>
									<br><br>
									Here is the course detail again:<br><br>
									
									<b>Instructor(s)</b>: $Instructor<br>
									<b>Discussant/Moderator(s)</b>: $Instigator<br>
									<b>Date</b>: $StartDate <br>
									<b>Location</b>: $Location<br>									
									<b>Start Time</b>: $Time<br>
									<b>Intended Audience</b>: $IntendedAudience<br>
									<b>Meeting Type</b>: $MeetingType<br>
									<b>Fees</b>: $$CourseFees<br><br>
									If you need to make any changes to this, please do not hesitate to
									contact us at Manny@AERExperts.com.<br><br>
									Thank you,<br>
									<b>AERE Team</b>";
									$mail->AddAddress($emailpass);
								
									if(!$mail->Send())
									{
										echo "Mailer Error: " . $mail->ErrorInfo;
									}
									else
									{
										
										
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
												
												$mail->Subject = "New registration for course $tit";
												$mail->Body = "<img src='http://allinstitute-dev.demobyopeneyes.com/email/emailimage/emaillogo.jpg' style='height:80px; width:180px;' > <br><br><br>
												Hey Team, <br/><br>	
												Someone just registered to take the course: <b>$tit</b><br><br>
												<b>First name</b>: $fnm<br>
												<b>Last name</b>: $lnm<br>
												<b>Email ID</b>: $em<br>
												<b>Address</b>: $add<br>
												<b>Phone number</b>: $pno<br>
												<br/><br/>	
												Thank You,<br/>
												<b>Our web Team </b><br/>";
												$mail->AddAddress($SETTO);
												if(!$mail->Send())
												{
													echo "Mailer Error: " . $mail->ErrorInfo;
												}
												else
												{
													?>
													
													<script>
														$( document ).ready(function() {
															$('#course_enroll').attr('style','display:block;');  
															setTimeout(function() {
														
															$('#course_enroll').fadeOut('hide');
															}, 10000);
													});	
													</script>
												
													
													<script>
														document.getElementById('num').innerHTML = +document.getElementById('num').innerHTML - 1;
													</script>
												<?php
													
												}
											
									}												
						}
					}
																									
				}			 
				?>          
				<?php 
						// $date=date('Y-m-d');
						// $cnd=" and (EndDate < '$date' ) ";
						// $res=mysql_query("SELECT * FROM tblcourse Where CourseID='$cid' $cnd order by StartDate");

						// $rec=mysql_num_rows($res);
					
					
					$enr=mysql_query("select * from tblcourseregistered where CourseID='$cid' && RegisterId='$regid' ");			
					$enrol=mysql_fetch_array($enr);				
					if($enrol!=0 or $noofseat>=$totseat)
					{
					?>  
				<!--	<div class="alert alert-danger" id="deadline_close_id" style="width:262px; margin:0px 0px 10px 0px">
						<strong>Deadline is closed</strong>
					</div>	-->
					<script>
						setTimeout(function() {
						$('#deadline_close_id').fadeOut('hide');
						}, 10000);
					
					</script>
				  <?php
				   }?>

				<?php
				
				
				    $date=date('Y-m-d');
				    $cnd=" and  ('$date' BETWEEN EnrStartDate and EnrEndDate) ";
					$res_new=mysql_query("SELECT * FROM tblcourse Where  IsStatus = 1 and CourseID='$cid' and  (EndDate < '$date' ) order by StartDate ASC");	
					$logme=mysql_fetch_array($res_new);	
					//$CourseID=$logme['CourseID'];
					$resann2=mysql_query("SELECT * FROM tblcourse where IsStatus = 1 and CourseID = '".$data['CourseID']."' and (EnrStartDate > '$date')  order by AnnDate ASC");
					$ANN=mysql_fetch_array($resann2);
					$recann2=mysql_num_rows($resann2);
					//$ANND=$ANN['EnrStartDate'];
					
					$resann3=mysql_query("SELECT * FROM tblcourse where IsStatus = 1 and CourseID = '".$data['CourseID']."' and (EnrEndDate < '$date')  order by AnnDate ASC");
					$ANN=mysql_fetch_array($resann3);
					$recann3=mysql_num_rows($resann3);


					$noofrec_new=mysql_num_rows($res_new);
					if($noofrec_new>0)
					{
					?>
					 <!-- <div class="alert alert-danger" id="dead_close" style="width:100%;margin:0px 0px 10px 0px;display:none">
				              <b>This course is expired.</b>
				         </div>					 -->
							<div class="sidebar">
									<div class="sidebar-box sidtop1">
										<div class="sidebar-box-inner">	
						
										<h3 class="sidebar-title">The <span class="fontnone">course is ended</span></h3>
										
										</div>
									</div>	
								</div>
					<?php
					 } 
					 else if($recann2>0)
					 {

								
									?>
										<br>
											<div class="sidebar sidtop-enroll">
													<div class="sidebar-box sidtop">
													<div class="sidebar-box-inner">	
							
														<h3 class="sidebar-title"><span class="fontnone">Course will start soon</span></h3>
											
													</div>
												</div>	
												</div>
									<?php	
						 

					 }
					 else if($recann3>0)
					 {

								
									?>
										<br>
											<div class="sidebar sidtop-enroll">
													<div class="sidebar-box sidtop">
													<div class="sidebar-box-inner">	
							
														<h3 class="sidebar-title"><span class="fontnone">Enrollment is ended</span></h3>
											
													</div>
												</div>	
												</div>
									<?php	
						 

					 }
					else
					{
					?>
						<div class="alert alert-danger" id="dead_close" style="width:100%;margin:0px 0px 10px 0px;display:none">
							<b>This course is expired.</b>
						</div>	
						<div class="alert alert-danger" id="reg_already" style="width:100%;margin:0px 0px 10px 0px;display:none">
							<b>You are already enrolled for this course.</b>
						</div>
						<div class="alert alert-danger" id="reg_close" style="width:100%;margin:0px 0px 10px 0px;display:none">
							<b>There is no seats available for this course.</b>
						</div>

						<form method="post">
							<div class="sidebar-box">
								<div class="sidebar-box-inner">	
								
									<input type="button"  
									<?php 
									if(($enrol!=0 or $noofseat>=$totseat) or $rec > 0)
									{
									?> 
									disabled
									<?php 
									}
									?>
									class="btn btn-danger btn-block" value="Enroll" id="Evidential_btn">	
								</div>
							</div>

											
								<div class="modal fade bs-example-modal-sm" id="Update_Modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
								<div class="modal-dialog modal-sm" role="document" style="margin:20% auto;">
									<div class="modal-content">
										<div class="modal-body" >
											<p>Are you sure you want to enroll this course?</p>
										</div>
										<div class="modal-footer text-center">
											<!--<button type="button" class="next_btn" id="yes_btn" name="update">Yes</button>-->
											<center><input type="submit"  value="Yes" id="yesbtn" name="enroll" class="btn btn-success"/>
											<button type="button" class="btn btn-danger" data-dismiss="modal">No</button></center>
										</div>
									</div>
								</div>
							</div>
							
					</form>	
					<?php 
					} 
					?>	





					<?php		
				}
				else 
				{
				?>
						<div class="sidebar">
								<div class="sidebar-box">
									<div class="sidebar-box-inner">	
					
									<h3 class="sidebar-title">Enroll</h3>
										<div class="sidebar-course-price">
											
											<a href="registration.php?cid=<?php echo $_REQUEST['cid'];?>">
											<button type="submit" class="btn btn-danger btn-block">Sign In</button></a>
											
										</div>
									</div>
								</div>	
							</div>
				<?php
				}	
	}



					 $date=date('Y-m-d');
					 $cnd=" and (EndDate < '$date' ) ";
					 $res=mysql_query("SELECT * FROM tblcourse Where CourseID='$cid' $cnd order by StartDate");

					 $rec=mysql_num_rows($res);
					
					if($edate < $date1 &&  $rec>0)
					{	
					?>
					
										<script>
											$( document ).ready(function() {
												$('#dead_close').attr('style','display:block;');  
												setTimeout(function() {
											
												$('#dead_close').fadeOut('hide');
												}, 10000);
										});
										</script>
                        
					<?php	
					}
					else if($enrol!=0)
					{
					?>
										<script>
											$( document ).ready(function() {
												$('#reg_already').attr('style','display:block;');  
												setTimeout(function() {
											
												$('#reg_already').fadeOut('hide');
												}, 10000);
										});
										</script>	
					<?php
					}
					else if($noofseat>=$totseat)
					{
					?>
					
					<script>
											$( document ).ready(function() {
												$('#reg_close').attr('style','display:block;');  
												setTimeout(function() {
											
												$('#reg_close').fadeOut('hide');
												}, 10000);
										});
										</script>
                    
													
					<?php	
					}

					
					
					
					
					error_reporting(0);
					//echo '<pre>'; echo print_r($data); 
					if($data['CourseID'] && $isactive!="1")
					{

						
								$date=date('Y-m-d');											
								//$cnd=" and AnnDate >= '$date' and (EnrStartDate > '$date') ";
							
										
								$resann=mysql_query("SELECT * FROM tblcourse where IsStatus = 1 and CourseID = '".$data['CourseID']."' and (EnrStartDate > '$date')  order by AnnDate ASC");
								$ANN=mysql_fetch_array($resann);
								$recann=mysql_num_rows($resann);
								$ANND=$ANN['EnrStartDate'];
								if($recann)
								{

									?>
										<br>
											<div class="sidebar">
													<div class="sidebar-box sidtop">
													<div class="sidebar-box-inner">	
							
														<h3 class="sidebar-title"><span class="fontnone">Course will start soon</span></h3>
											
													</div>
												</div>	
												</div>
									<?php

								}
								else
								{


									$date=date('Y-m-d');
									$cnd=" and (EndDate < '$date' ) ";
									$res=mysql_query("SELECT c.* FROM tblcourse as c Where CourseID = '".$data['CourseID']."' and (EndDate < '$date')");
									//$data=mysql_fetch_array($res);
									$noofrecin=mysql_num_rows($res);
									if($noofrecin==0)
									{
			
									?>
									<br>
										<div class="sidebar">
											<div class="sidebar-box sidtop">
													<div class="sidebar-box-inner">	
							
													<h3 class="sidebar-title">Enroll</h3>
															<div class="sidebar-course-price">
													
															<a href="registration.php?cid=<?php echo $_REQUEST['cid'];?>">
																<button type="submit" class="btn btn-danger btn-block">Sign In</button></a>
													
															</div>
												</div>
											</div>	
										</div>
									<?php
									}
									else
									{
									?>
										<br>
											<div class="sidebar">
													<div class="sidebar-box sidtop">
													<div class="sidebar-box-inner">	
							
														<h3 class="sidebar-title">The <span class="fontnone">course is ended</span></h3>
											
													</div>
												</div>	
												</div>
									<?php
									}
								}
		
						


						}
					?> 






                        </div>
						<!-- sidebar end -->
                    </div>
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

<script type='text/javascript'  src="js/jquery-2.1.1.min.js"></script>
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
<!-- <script>
$(".about-the-quickfacts").stick_in_parent({
    offset_top: 70
});

</script> -->

<!-- Preloader Start Here -->
    <div id="preloader"></div>
    <!-- Preloader End Here -->
    <!-- jquery-->
   
    

    <!-- Plugins js -->
    <!-- <script src="js_new/plugins.js" type="text/javascript"></script> -->
    <!-- Bootstrap js -->
	<script src="js_new/bootstrap.min.js" type="text/javascript"></script>
	<script>
									$('#Evidential_btn').click(function () {
								$("#Update_Modal").modal('show');
								});

	</script>
    <!-- WOW JS -->
    <script src="js_new/wow.min.js"></script>
    <!-- Nivo slider js -->
    <!-- <script src="vendor/slider/js/jquery.nivo.slider.js" type="text/javascript"></script>
    <script src="vendor/slider/home.js" type="text/javascript"></script> -->
	
    <!-- Owl Cauosel JS -->
    <script src="vendor/OwlCarousel/owl.carousel.js" type="text/javascript"></script>
    <!-- Meanmenu Js -->
    <script src="js_new/jquery.meanmenu.min.js" type="text/javascript"></script>
    <!-- Srollup js -->
    <script src="js_new/jquery.scrollUp.min.js" type="text/javascript"></script>
    <!-- jquery.counterup js -->
    <!-- <script src="js_new/jquery.counterup.min.js"></script>
    <script src="js_new/waypoints.min.js"></script> -->
    <!-- Countdown js -->
    <script src="js_new/jquery.countdown.min.js" type="text/javascript"></script>
    <!-- Isotope js -->
    <script src="js_new/isotope.pkgd.min.js" type="text/javascript"></script>
    <!-- Select2 Js -->
    <!-- <script src="js_new/select2.min.js" type="text/javascript"></script> -->
    <!-- Nouislider Js -->
    <!-- <script src="vendor/noUiSlider/nouislider.min.js" type="text/javascript"></script> -->
    <!-- Validator js -->
    <script src="js_new/validator.min.js" type="text/javascript"></script>
    <!-- Magic Popup js -->
    <!-- <script src="js_new/jquery.magnific-popup.min.js" type="text/javascript"></script> -->
    <!-- Custom Js -->
<script src="js_new/main.js" type="text/javascript"></script> 
 
 <!-- <script>
 $(function() {
  $(window).on('load', function() {
    $('.owl-carousel').owlCarousel({autoWidth: true, autoHeight: true})
  })
})
 </script> -->
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
 <script>
 </script>
</body>
</html>