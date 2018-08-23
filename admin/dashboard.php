<title>ALL-Institute | Dashboard</title>
<?php
include 'side_bar.php';
include 'header.php';
include 'connect.php';
session_start();

$MODE=MODE;
include 'functions.php';

include("../log4php/Logger.php");
include("../Lib_log.php");


Logger::configure('../multiple.xml');
//$log;
//$log=Logger::getLogger('dberror');

$vars = new Lib_log();
//Register user query 

$query = "SELECT Count(RegisterId) FROM tblregister";
$result = mysql_query($query);
$row = mysql_fetch_array($result);
//current cous

$date = date('Y-m-d');
$cnd= " AND '$date' BETWEEN  EnrStartDate AND EndDate ";
//$cnd = " AND '$date' >  StartDate AND EndDate > '$date' AND TotalCapacity!=NoofUserRegistered ";
$query1 = "SELECT COUNT(*) as totalCount FROM tblcourse where IsStatus = 1 $cnd";
$result1 = mysql_query($query1);
 $row1 = mysql_fetch_array($result1);

//completed
//$cnd = " and (EndDate < '$date' or TotalCapacity=NoofUserRegistered) ";
$cnd=" and (EndDate < '$date' ) ";
$query2 = "SELECT COUNT(*) as totalCount FROM tblcourse where IsStatus = 1 $cnd";
$result2 = mysql_query($query2);
 $row2 = mysql_fetch_array($result2);

//print_r($row2);
//die();
//upcoming
//$cnd = " and StartDate > '$date' ";
$cnd=" and AnnDate <= '$date' and (EnrStartDate > '$date') ";
$query3 = "SELECT COUNT(*) as totalCount FROM tblcourse where IsStatus = 1 $cnd";
$result3 = mysql_query($query3);
 $row3 = mysql_fetch_array($result3);

//print_r($row3);
//die();
//SELECT * FROM tblregister ORDER BY RegisterId DESC LIMIT 3
//$query4 = "SELECT * FROM tblregister where IsActive = 1";
$query4 = "SELECT * FROM tblregister ORDER BY `createdOn` DESC LIMIT 5 ";
//$query4 = "SELECT * FROM tblregister ORDER BY RegisterId DESC LIMIT 5 where IsActive = 1";
$result4 = mysql_query($query4);

     
    
?>


<div class="page-content-wrap dashboard_blocks">
<div class="<?php echo $MODE; ?>"></div>
    <div class="row">
        <div class="col-md-4">

            <!-- START WIDGET SLIDER -->
            <div class="widget widget-default widget-item-icon" >
                <div class="widget-item-left">
                    <span class="fa fa-users"></span>
                </div>                             
                <div class="widget-data">
                    <div class="widget-int num-count"><?php echo $row['Count(RegisterId)']; ?></div>
                    <div class="widget-title"> USERS</div>

                </div>      
            </div>        
            <!-- END WIDGET SLIDER -->

        </div>
        <div class="col-md-4">

            <!-- START WIDGET MESSAGES -->
            <div class="widget widget-default widget-item-icon">
                <div class="widget-item-left">
                    <span class="fa fa-envelope"></span>
                </div>                             
                <div class="widget-data">
                    <div class="widget-int num-count"><?php echo $row1['totalCount']; ?></div>
                    <div class="widget-title">Current courses </div>

                </div> 
              <?php
                 /*
                <div class="widget-controls">                                
                    <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="top" title="Remove Widget"><span class="fa fa-times"></span></a>
                </div>
               
                  */ ?>
                  
            </div>       


            <!-- END WIDGET MESSAGES -->

        </div>
        <div class="col-md-4">

            <!-- START WIDGET REGISTRED -->
            <div class="widget widget-default widget-item-icon">
                <div class="widget-item-left">
                    <span class="fa fa-user"></span>
                </div>

                <div class="widget-data">
                    <div class="widget-int num-count"><?php echo $row2['totalCount']; ?></div>
                    <div class="widget-title">Completed courses</div>
                    <!-- <div class="widget-subtitle">On your website</div> -->
                </div>
                 <?php
                 /*
                <div class="widget-controls">                                
                    <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="top" title="Remove Widget"><span class="fa fa-times"></span></a>
                </div> 
                  * 
                  */   
                 ?>
            </div>                            
            <!-- END WIDGET REGISTRED -->

        </div>
    </div>
    <div class="row">
        <!--
        <div class="col-md-4">

            
            
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-title-box">
                        <h3>Weekly Activity</h3>
                        <span>Interviewing vs Submitted</span>
                    </div>                                    
                    <ul class="panel-controls" style="margin-top: 2px;">
                        <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>
                        <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="fa fa-cog"></span></a>                                        
                            <ul class="dropdown-menu">
                                <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span> Collapse</a></li>
                                <li><a href="#" class="panel-remove"><span class="fa fa-times"></span> Remove</a></li>
                            </ul>                                        
                        </li>                                        
                    </ul>                                    
                </div>                                
                <div class="panel-body padding-0">
                    <div class="chart-holder" id="dashboard-bar-1" style="height: 200px;"></div>
                </div>                                    
            </div>
            
            

        </div>
        -->
        <div class="col-md-4">

            <!-- START VISITORS BLOCK -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-title-box">
                        <h3>All courses</h3>
                        
                    </div>
                    <ul class="panel-controls" style="margin-top: 2px;">
                        <!-- <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>-->
                        <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>

                    </ul>
                </div>
                <div class="panel-body padding-0">
                    <div class="chart-holder" id="dashboard-donut-1" style="height:165px;"></div>
                </div>
            </div>
            <!-- END VISITORS BLOCK -->

        </div>

        <div class="col-md-4">

            <!-- START PROJECTS BLOCK -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="panel-title-box">
                        <h3>Last Five Registered Users</h3>
                        
                    </div>
                    <ul class="panel-controls" style="margin-top: 2px;">
                        <!-- <li><a href="#" class="panel-fullscreen"><span class="fa fa-expand"></span></a></li>-->
                        <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
                                                          
                    </ul>
                </div>
                <div class="panel-body panel-body-table">

                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    
                                    
                                    <!--
                                    <th width="20%">Status</th>
                                    <th width="30%">Activity</th>
                                    -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($row4 = mysql_fetch_array($result4)) {
                                    ?>
                                    <tr>
                                        <td><strong><?php echo $row4['FirstName'] . ' ' . $row4['LastName']; ?></strong></td>
                                         
                                       <!-- <td><span class="label label-danger">Developing</span></td> 
                                        <td>
                                            <div class="progress progress-small progress-striped active">
                                                <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 85%;">85%</div>
                                            </div>
                                        </td>
                                            -->
                                    </tr>
                                <?php } ?>
                                <!--                                      
                            <tr>
                                <td><strong>Taurus</strong></td>
                                <td><span class="label label-warning">Updating</span></td>
                                <td>
                                    <div class="progress progress-small progress-striped active">
                                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 72%;">72%</div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>Leo</strong></td>
                                <td><span class="label label-success">Support</span></td>
                                <td>
                                    <div class="progress progress-small progress-striped active">
                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">100%</div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>Virgo</strong></td>
                                <td><span class="label label-success">Support</span></td>
                                <td>
                                    <div class="progress progress-small progress-striped active">
                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">100%</div>
                                    </div>
                                </td>
                            </tr>                                                
                                -->        
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>

    </div>            

</div>
<?php
include 'footer.php';
?>
<!-- START PLUGINS -->
<script type="text/javascript" src="js/plugins/jquery/jquery.min.js"></script>
<script type="text/javascript" src="js/plugins/jquery/jquery-ui.min.js"></script>
<script type="text/javascript" src="js/plugins/bootstrap/bootstrap.min.js"></script>
<!-- END PLUGINS -->

<!-- START THIS PAGE PLUGINS-->        
<script type='text/javascript' src='js/plugins/icheck/icheck.min.js'></script>
<script type="text/javascript" src="js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>
<script type="text/javascript" src="js/plugins/scrolltotop/scrolltopcontrol.js"></script>

<script type="text/javascript" src="js/plugins/morris/raphael-min.js"></script>
<script type="text/javascript" src="js/plugins/morris/morris.min.js"></script>
<script type="text/javascript" src="js/plugins/rickshaw/d3.v3.js"></script>
<!-- <script type="text/javascript" src="js/plugins/rickshaw/rickshaw.min.js"></script> -->
<!-- <script type='text/javascript' src='js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js'></script>
<script type='text/javascript' src='js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js'></script>
<script type='text/javascript' src='js/plugins/bootstrap/bootstrap-datepicker.js'></script>
<script type="text/javascript" src="js/plugins/owl/owl.carousel.min.js"></script>
<script type="text/javascript" src="js/settings.js"></script>
<script type="text/javascript" src="js/plugins/moment.min.js"></script>
<script type="text/javascript" src="js/plugins/daterangepicker/daterangepicker.js"></script> -->
<!-- END THIS PAGE PLUGINS-->

<!-- START TEMPLATE -->
<script type="text/javascript" src="js/plugins.js"></script>
<script type="text/javascript" src="js/actions.js"></script>
<script type="text/javascript" src="js/demo_dashboard.js"></script>
<script>

                /* Donut dashboard chart */
                Morris.Donut({
                    element: 'dashboard-donut-1',
                    data: [
                        {label: "Current courses", value: <?php echo $row1['totalCount']; ?>},
                        {label: "Upcoming courses", value: <?php echo $row3['totalCount']; ?>},
                        {label: "Completed courses", value: <?php echo $row2['totalCount']; ?>}
                    ],
                    colors: ['#33414E', '#1caf9a', '#FEA223'],
                    resize: true
                });
                /* END Donut dashboard chart */
</script>
<!-- END TEMPLATE -->
<!-- END SCRIPTS -->         
</body>
</html>






