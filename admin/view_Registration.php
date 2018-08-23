<title>ALL-Institute | Registered Users</title>
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

//$q = "SELECT * FROM `tbl_1year` ";

$query = "SELECT * FROM `tblregister` ";

$result = mysql_query($query)or die(mysql_error());
?>

<center><div class="alert alert-success" id="update_rec" style="width:100%; margin:0px 0px 10px 0px; display:none;">
									<strong>Your record was updated successfully!</strong>
								</div>	  
						</center>  
<div class="panel panel-default">
<div class="<?php echo $MODE; ?>"></div>
    <div class="panel-heading">         
                       
        <h3 class="panel-title"> <b>List of registration for all courses</b> </h3>   

        <div class="btn-group pull-right">
            <button class="btn btn-danger dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i> Export All Users</button>
            <ul class="dropdown-menu">
                
                <li><a href="#" onClick ="$('#customers2').tableExport({tableName:'registration',type: 'excel', escape: 'false'});"><img src='img/icons/xls.png' width="24"/> XLS</a></li>
                
            </ul>
        </div> 


    </div>
    <div class="panel-body">
        <table id="customers2" class="table datatable">
            <thead>
                <tr>
                    <th>Sr#</th>
                    
                   
                    <th width="145"> First Name </th>
                    <th width="145">Last Name</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th width="145">Phone</th>
                    <th width="100">Is Active?</th>
                    <th> Action </th>
                   
                    


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
                        <td><?php echo $row['Address']; ?></td>
                        <td><?php echo $row['Phone']; ?></td>
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
                        
                        
                       
                        <td>  <a title="Edit"  href="edit_registerd.php?RegisterId=<?php echo$row['RegisterId']; ?>"><i class="fa fa-pencil"></i></a> </td>
                       

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


<script>
									<?php
					if(isset($_SESSION['check']))
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
							$('#update_rec').css('display','block');
					
						setTimeout(function() {
							$('#update_rec').css('display','none');

									var my_variable_name = window.location.href;
							
							var success = my_variable_name.replace("?check=0", '');
							
							//window.location.replace(success);

						}, 10000);
					}
					});
					
</script>





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
