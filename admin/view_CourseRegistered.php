<title>ALL-Institute | Register Course</title>
<?php
include 'side_bar.php';
include 'header.php';
include 'connect.php';
session_start();
$MODE=MODE;


include("../log4php/Logger.php");
include("../Lib_log.php");


Logger::configure('../multiple.xml');
//$log;
//$log=Logger::getLogger('dberror');

$vars = new Lib_log();
//include 'functions.php';
//$q = "SELECT * FROM `tbl_1year` ";

$query = "select b.*,c.Title from tblcourseregistered as a left join tblregister as b on a.RegisterId=b.RegisterId left join tblcourse as c on a.CourseID=c.CourseID";

$result = mysql_query($query)or die(mysql_error());
?>


<div class="panel panel-default">
<div class="<?php echo $MODE; ?>"></div>
    <div class="panel-heading">                                
        <h3 class="panel-title"> <b>List of registration for all courses</b> </h3>   

        <div class="btn-group pull-right">
            <button class="btn btn-danger dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i> Export All User Courses</button>
            <ul class="dropdown-menu">
                
                <li><a href="#" onClick ="$('#customers2').tableExport({type: 'excel', escape: 'false'});"><img src='img/icons/xls.png' width="24"/> XLS</a></li>
                
            </ul>
        </div> 


    </div>
    <div class="panel-body">
        <table id="customers2" class="table datatable">
            <thead>
                <tr>
                    <th>Sr#</th>
                    
                   
                    <th width="140"> First Name </th>
                    <th width="140">Last Name</th>
                    <th width="170">Email</th>
                    <th width="140">Phone</th>
                    <th>Course</th>
                    <th>Is Active?</th>
                   
                    


                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;

                while ($row = mysql_fetch_array($result)) {
                     $IsActive = $row['IsActive'];
                    ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        
                        
                        <td><?php echo $row['FirstName']; ?></td>
                        <td><?php echo $row['LastName']; ?></td> 
						 <td><?php echo $row['Email']; ?></td>
                        <td><?php echo $row['Phone']; ?></td>
						<td width="400px;"><?php echo $row['Title']; ?></td>
                        
                        
                        
                        <td>  
                           <?php
                        if($row['IsActive']==1)
                    {
                        echo "Yes";
                    }
                    if($row['IsActive']==0)
                    {
                        echo "No";
                    }
?>
                        </td>
                       

                    </tr>
                    <?php
                    $i++;
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
<!-- END PAGE CONTENT -->
</div>
<?php
include 'footer.php';
?>
<!-- START PLUGINS -->
<script type="text/javascript" src="js/plugins/jquery/jquery.min.js"></script>
<script type="text/javascript" src="js/plugins/jquery/jquery-ui.min.js"></script>
<script type="text/javascript" src="js/plugins/bootstrap/bootstrap.min.js"></script>                
<!-- END PLUGINS -->

<!-- THIS PAGE PLUGINS -->
<script type='text/javascript' src='js/plugins/icheck/icheck.min.js'></script>
<script type="text/javascript" src="js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>

<script type="text/javascript" src="js/plugins/bootstrap/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="js/plugins/bootstrap/bootstrap-timepicker.min.js"></script>
<script type="text/javascript" src="js/plugins/bootstrap/bootstrap-colorpicker.js"></script>
<script type="text/javascript" src="js/plugins/bootstrap/bootstrap-file-input.js"></script>
<script type="text/javascript" src="js/plugins/bootstrap/bootstrap-select.js"></script>
<script type="text/javascript" src="js/plugins/tagsinput/jquery.tagsinput.min.js"></script>

<script type="text/javascript" src="js/plugins/datatables/jquery.dataTables.min.js"></script>  



<script type="text/javascript" src="js/plugins/datatables/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="js/plugins/tableexport/tableExport.js"></script>
<script type="text/javascript" src="js/plugins/tableexport/jquery.base64.js"></script>
<script type="text/javascript" src="js/plugins/tableexport/html2canvas.js"></script>
<script type="text/javascript" src="js/plugins/tableexport/jspdf/libs/sprintf.js"></script>
<script type="text/javascript" src="js/plugins/tableexport/jspdf/jspdf.js"></script>
<script type="text/javascript" src="js/plugins/tableexport/jspdf/libs/base64.js"></script>    


<!-- END PAGE PLUGINS -->

<!-- START TEMPLATE -->



<script type="text/javascript" src="js/plugins.js"></script>        
<script type="text/javascript" src="js/actions.js"></script>    
<script src="js/jquery.bvalidator.js"></script>
<script src="js/jquery.bvalidator-yc.js"></script>








<!-- <audio id="audio-alert" src="audio/alert.mp3" preload="auto"></audio>
<audio id="audio-fail" src="audio/fail.mp3" preload="auto"></audio> -->
<!-- END PRELOADS -->                      


<!-- START THIS PAGE PLUGINS-->        

<!-- END THIS PAGE PLUGINS-->  

<!-- START TEMPLATE -->


<script>
       $('#customers2').dataTable( {
    "oLanguage": {
      "sLengthMenu": "Show _MENU_ Users per page",
      "sInfo": "Showing _START_ to _END_ of _TOTAL_ Users"
    }
});
    
           
            
        </script>

</body>
</html>
