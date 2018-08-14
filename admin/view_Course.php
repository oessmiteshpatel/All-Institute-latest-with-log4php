    <title>ALL-Institute | Course List</title>
<?php
include 'side_bar.php';
include 'header.php';
include 'connect.php';

session_start();
$MODE=MODE;

$query = "SELECT * FROM `tblcourse` ";

$result = mysql_query($query)or die(mysql_error());
?>
    <center><div class="alert alert-danger" id="coursedepend_rec" style="width:100%; display:none; margin:0px 0px 10px 0px">
									<strong>You can not delete this course!</strong>
								</div>	  
						</center>
	<center><div class="alert alert-success" id="insert_rec" style="width:100%; display:none; margin:0px 0px 10px 0px">
									<strong>Your record was inserted successfully!</strong>
								</div>	  
						</center>
 <center><div class="alert alert-success" id="update_rec" style="width:100%; margin:0px 0px 10px 0px; display:none;">
									<strong>Your record was updated successfully!</strong>
								</div>	  
						</center>
                        
<center><div class="alert alert-danger" id="rec_delete" style="width:1200px;display:none; margin:0px 0px 10px 0px; fonnt-size:20px"><strong>Your record was deleted! </strong> 
            </div>  
						</center>
<div class="panel panel-default">
<div class="<?php echo $MODE; ?>"></div>
    <div class="panel-heading">                                
        <h3 class="panel-title"><b>List of Courses</b> </h3>   

        <div class="btn-group pull-right">
            <button class="btn btn-danger dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i> Export All Courses</button>
            <ul class="dropdown-menu">
                
               
                <li><a href="#" onClick ="$('#customers2').tableExport({type: 'excel', escape: 'false'});"><img src='img/icons/xls.png' width="24"/> XLS</a></li>
                
            </ul>
        </div> 


    </div>
    <div class="panel-body">
        <table id="customers2" class="table datatable">
            <thead>
                <tr>
                    <th width="80">Sr#</th>
                    <th width="280">Course title </th>

                    <th width="100">Course Start Date</th>
                    <th width="100">Course End Date</th>
					 <th width="50">Time</th>
                    <th>Location</th>
                   
                   
                    <th width="80">#User Regst.</th>
                    <th width="80">Total Capacity </th>

					<th width="80">Is Active?</th>
                    <th width="10%">Action</th>



                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;

                while ($row = mysql_fetch_array($result)) 
				{

                    $IsStatus = $row['IsStatus'];
					
                    ?>
                    <tr>
                       <?php //echo $i; ?>
						<td><?php echo $i; ?></td>
                        <td width="280"><?php echo $row['Title']; ?></td>

                        <?php $sdate = date_create($row['StartDate']); ?>
                        <td><?php echo date_format($sdate, 'm/d/Y') ?></td> 

                        <?php $edate = date_create($row['EndDate']); ?>
                        <td><?php echo date_format($edate, 'm/d/Y') ?></td>
						 <td><?php $stimes=date("h:i a", strtotime($data['StartTime']));
													echo $stimes; ?></td>
                        <td width="100"><?php echo $row['Location']; ?></td>
                       


                        


                        <td><?php echo $row['NoofUserRegistered']; ?></td>
                        <td><?php echo $row['TotalCapacity']; ?></td>
						<td>  
                           <?php
                        if($row['IsStatus']==1)
                    {
                        echo "Yes";
                    }
                    if($row['IsStatus']==0)
                    {
                        echo "No";
                    }
?>
                        </td>
                        <td>
                           
                            <a title="Edit"  href="edit.php?CourseID=<?php echo$row['CourseID']; ?>" style="margin:0px 10px 0px 0px">
							<i class="fa fa-pencil"></i></a><label> | </label>
							

                            <!-- <a class="simpleConfirm" title="Delete" href="delete.php?CourseID=<?php //echo $row['CourseID']; ?>" ><i class="fa fa-minus-circle"></i></a>-->

							

							<button type="button" title="Delete" class="btn-md btn-icon btn-link p4" data-toggle="modal" data-target="#myModal" onClick="delete1(<?php echo $row['CourseID']; ?>)"> <i class="fa fa-trash-o text-danger" aria-hidden="true"></i></button>
							

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

<div class="modal fade bs-example-modal-sm" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-sm" role="document" style="margin:20% auto;">
        <div class="modal-content">
            <div class="modal-body" >
              	<p>Are you sure you want to delete this record?</p>
              </div>
              <div class="modal-footer text-center">
              	<!--<button type="button" class="next_btn" id="yes_btn" name="update">Yes</button>-->
				<center><button type="button" class="btn-md btn-icon btn-link p4" id="yes_btn"><a href="" id="deleteYes" value="Yes"  class="btn btn-success">Yes</a></button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">No</button></center>
            </div>
        </div>
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
<!-- <script type='text/javascript' src='js/plugins/icheck/icheck.min.js'></script>
<script type="text/javascript" src="js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script> -->

<!-- <script type="text/javascript" src="js/plugins/bootstrap/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="js/plugins/bootstrap/bootstrap-timepicker.min.js"></script>
<script type="text/javascript" src="js/plugins/bootstrap/bootstrap-colorpicker.js"></script>
<script type="text/javascript" src="js/plugins/bootstrap/bootstrap-file-input.js"></script>
<script type="text/javascript" src="js/plugins/bootstrap/bootstrap-select.js"></script>
<script type="text/javascript" src="js/plugins/tagsinput/jquery.tagsinput.min.js"></script> -->

  
<script type="text/javascript" src="js/plugins/datatables/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="js/plugins/tableexport/tableExport.js"></script>
<script type="text/javascript" src="js/plugins/tableexport/jquery.base64.js"></script>
<script type="text/javascript" src="js/plugins/tableexport/html2canvas.js"></script>
<!-- <script type="text/javascript" src="js/plugins/tableexport/jspdf/libs/sprintf.js"></script>
<script type="text/javascript" src="js/plugins/tableexport/jspdf/jspdf.js"></script>
<script type="text/javascript" src="js/plugins/tableexport/jspdf/libs/base64.js"></script>     -->


<!-- END PAGE PLUGINS -->

<!-- START TEMPLATE -->



<script type="text/javascript" src="js/plugins.js"></script>        
<script type="text/javascript" src="js/actions.js"></script>     
<!-- <script src="js/jquery.bvalidator.js"></script>
<script src="js/jquery.bvalidator-yc.js"></script> -->



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
						if(check==2) {
							//if(cid){
							$('#insert_rec').css('display','block');
					
						setTimeout(function() {
							$('#insert_rec').css('display','none');

									var my_variable_name = window.location.href;
							
							var success = my_variable_name.replace("?check=0", '');
							
							//window.location.replace(success);

						}, 10000);
					}
					});
					</script>
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
if(check==3) {
//if(cid){
$('#rec_delete').css('display','block');

setTimeout(function() {
$('#rec_delete').css('display','none');

var my_variable_name = window.location.href;

var success = my_variable_name.replace("?check=0", '');

//window.location.replace(success);

}, 10000);
}
});
</script>


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
if(check==4) {
//if(cid){
$('#coursedepend_rec').css('display','block');

setTimeout(function() {
$('#coursedepend_rec').css('display','none');

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
$(document).ready(function () {
	if (window.location.href.indexOf('view_Course.php#rec_delete') > -1) 
	{
		//alert('found it');
		$('#rec_delete').attr('style','display:block;');
		setTimeout(function(){ window.location.href='view_Course.php'; }, 3000);
	}
});
function delete1(id)
{ //alert(id);
	
	$('#deleteYes').attr('href','delete.php?CourseID='+id);
	
}




       $('#customers2').dataTable( {
    "oLanguage": {
      "sLengthMenu": "Show _MENU_ Courses per page",
      "sInfo": "Showing _START_ to _END_ of _TOTAL_ Courses"
    }
});
    
            // $(".simpleConfirm").confirm();
			
			
			
			
			
            
</script>
<script>
setTimeout(function() {
	$('#delete_rec').click(function () {
   $("#rec_delete").fadeOut('hide');
});

}, 10000);

		
					
</script>
</body>
</html>
