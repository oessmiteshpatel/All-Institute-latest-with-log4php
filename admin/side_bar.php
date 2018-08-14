<!DOCTYPE html>
<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('location:index.php');
}
 $activePage = basename($_SERVER['PHP_SELF'], ".php");
?>
<html lang="en">
    <head>        
        <!-- META SECTION -->
        <title>AERE</title>            
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <link rel="icon" href="img/favicon.png" type="image/x-icon" />
        <!-- END META SECTION -->

        <!-- CSS INCLUDE -->        
        <link rel="stylesheet" type="text/css" id="theme" href="css/theme-default.css"/>
        <link rel="stylesheet" type="text/css" id="theme" href="css/style.css"/>
        <link rel="stylesheet" type="text/css" id="theme" href="css/bvalidator.css"/>


        <!-- EOF CSS INCLUDE -->  
        <!-- this query is for datepeeker  -->
        <link href="http://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel="stylesheet">
        <style>
            .sidebarlogo
            {
                
            }
        </style>
    </head>
    <body>
        <!-- START PAGE CONTAINER -->
        <div class="page-container">

            <!-- START PAGE SIDEBAR -->
            <div class="page-sidebar">
                <!-- START X-NAVIGATION -->
                <ul class="x-navigation">
                    <li class="xn-logo">
                        <a href="dashboard.php" class="sidebarlogo" style="padding:5px;"><img src="img/assets/images/logo.png" width="90" absalign="middle"/></a>
                        <a href="#" class="x-navigation-control"></a>
                    </li>
                    <li class="xn-profile">
                        <a href="#" class="profile-mini">

                        </a>
                    </li>

                    <li class=" <?php echo ($activePage == "dashboard" ? "active" : ""); ?>">
                        <a href="dashboard.php"><span class="fa fa-home" title="Dashboard"></span> <span class="xn-text">Dashboard</span></a>

                    </li>
                    <li class=" <?php echo ($activePage == "view_Registration" ? "active" : ""); ?>">
                        <a href="view_Registration.php"><span class="fa fa-users" title="Registered Users"></span> <span class="xn-text">Registered Users</span></a>

                    </li>
                    <li class=" <?php echo ($activePage == "view_CourseRegistered" ? "active" : ""); ?>">
                        <a href="view_CourseRegistered.php"><span class="fa fa-list" title="Users per Course"></span> <span class="xn-text">Users per Course</span></a>
                    </li>
                    
                    <li class="xn-openable <?php echo ($activePage == "view_Course" ? "active" : ""); ?> <?php echo ($activePage == "add_Course" ? "active" : ""); ?> <?php echo ($activePage == "edit" ? "active" : ""); ?>" >
                        <a href="#"><span class="fa fa-plus" title="All about courses"></span> <span class="xn-text"> All about courses</span></a>

                        <ul>
                            <li class="<?php echo ($activePage == "view_Course" ? "active" : ""); ?>"><a href="view_Course.php"><span class="fa fa-list" title="List of Courses"></span> List of Courses</a></li>
                            <li class="<?php echo ($activePage == "add_Course" ? "active" : ""); ?>"><a href="add_Course.php"><span class="fa fa-plus" title="Add Course"></span> Add Course</a></li>
                        </ul>
                    </li>
					<li class="xn-openable <?php echo ($activePage == "view_Instructor" ? "active" : ""); ?> <?php echo ($activePage == "add_Instructor" ? "active" : ""); ?> <?php echo ($activePage == "edit_Ins" ? "active" : ""); ?>" >
                        <a href="#"><span class="fa fa-plus" title="All about Instructor"></span> <span class="xn-text"> All about Instructor</span></a>

                        <ul>
                            <li class="<?php echo ($activePage == "view_Instructor" ? "active" : ""); ?>"><a href="view_Instructor.php"><span class="fa fa-list" title="List of Instructor"></span> List of Instructor</a></li>
                            <li class="<?php echo ($activePage == "add_Instructor" ? "active" : ""); ?>"><a href="add_Instructor.php"><span class="fa fa-plus" title="Add Instructor"></span> Add Instructor</a></li>
                        </ul>
                    </li>
              <!--
                    <li>
                        <a href="change_pass.php"><span class="fa fa-files-o"></span> <span class="xn-text"> Change Password </span></a>
                    </li>
-->



                </ul>
                <!-- END X-NAVIGATION -->
            </div>