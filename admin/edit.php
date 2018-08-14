<html>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ALL-Institute | Edit course</title>
	<head>

    <script src="js/ajax/libs/jquery/jquery-1.12.4.js"></script>
	<link type="text/css" rel="stylesheet" href="slider/owl.carousel.css">
   
			<style>
.slider{display:block; position:relative; padding:0 30px; width:760px; float:right;}
.owl-carousel .owl-item .owl-item{width:100%; text-align:center; display:block;}
.owl-carousel .owl-nav div.owl-prev{ background:url(../admin/slider/prev_small.png) left top no-repeat; width:22px; height:22px; display:inline-block; position:absolute; left:-25px; top:30%; background-size:100%;} 
.owl-carousel .owl-nav div.owl-next{ background:url(../admin/slider/next_small.png) left top no-repeat; width:22px; height:22px; display:inline-block;  position:absolute; right:-25px; top:30%; background-size:100%;} 
.img_main_class{border:5px solid #fff; transition: all 0.3s ease 0s; cursor:pointer;}
.selected_img{ border:5px solid #ac2925; transition: all 0.3s ease 0s;}
</style>
	
	<style>
#imagePreview,#imagePreview_select {
    width: 150px;
    height: 150px;
    background-position: center center;
    background-size: cover;
    -webkit-box-shadow: 0 0 1px 1px rgba(0, 0, 0, .3);
    display: inline-block;
}
#imagePreview img,#imagePreview_select img
{	width:150px; height:150px;}
.modal img{ border:2px solid #fff;}
.modal img.selected_img{ border:2px solid #c4161c;}


#imagePreview2,#imagePreview_select2 {
    width: 150px;
    height: 150px;
    background-position: center center;
    background-size: cover;
    -webkit-box-shadow: 0 0 1px 1px rgba(0, 0, 0, .3);
    display: inline-block;
}
#imagePreview img2,#imagePreview_select2 img
{	width:150px; height:150px;}
</style>
	</head>

    <?php
    //session_start();
	error_reporting(0);
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

    $update = $_REQUEST['CourseID'];

    $query = "SELECT * FROM `tblcourse` where CourseID='$update'";

    $result = mysql_query($query)or die(mysql_error());
    $row = mysql_fetch_array($result)or die(mysql_error());
	//var_dump($row);
	//exit;
	$Ins=explode(",",$row['InsId']);
	$D=date("H:i:s", strtotime($row['StartTime']));
	
	$E=date("H:i:s", strtotime($row['EndTime']));
    
    $ReIsStatus=$row['IsStatus'];
   
    

    
    $error = false;
    
    ?>

    <?php
if (isset($_POST['update'])) 
{

    $demo = $_REQUEST['rupdate'];

    $Title = mysql_real_escape_string($_REQUEST['Title']);
    $OfferedBy =  mysql_real_escape_string($_REQUEST['OfferedBy']);
    $Summary =  mysql_real_escape_string($_REQUEST['Summary']);
    
	$Image=$_FILES['Image']['name'];
	$Image_2=mysql_real_escape_string($_REQUEST['Image_2']);
	$p1=$_FILES['Image']['tmp_name'];
	
	//$path="admin/upload/$Image";
	move_uploaded_file($p1,"upload/".$_FILES['Image']['name']);
    
    $Video = mysql_real_escape_string($_REQUEST['Video']);
    
    $anndate = date_create($_POST['AnnDate']);
    $AnnDate = date_format($anndate, 'Y-m-d');

    $enrstartdate = date_create($_POST['EnrStartDate']);
    $EnrStartDate = date_format($enrstartdate, 'Y-m-d');

    $enrendDate = date_create($_POST['EnrEndDate']);
    $EnrEndDate = date_format($enrendDate, 'Y-m-d');

   // $cdate = date_create($_POST['Course_start_date']);
    //$Course_start_date = date_format($cdate, 'Y-m-d');
    
    $sdate = date_create($_POST['StartDate']);
    $StartDate = date_format($sdate, 'Y-m-d');

    //$EndDate = $_REQUEST['EndDate'];

    $edate = date_create($_POST['EndDate']);
    $EndDate = date_format($edate, 'Y-m-d');

    $Location =  mysql_real_escape_string($_REQUEST['Location']);
	
	$STime=$_POST['STime'];
    $SSTime= mysql_real_escape_string(date('h:i:s a', strtotime($STime)));
	
	
	$ETime=$_POST['ETime'];
	
	$EETime= mysql_real_escape_string(date('h:i:s a', strtotime($ETime)));
	
    $IntendedAudience =  mysql_real_escape_string($_REQUEST['IntendedAudience']);
    $MeetingType =  mysql_real_escape_string($_REQUEST['MeetingType']);
    $CourseFees =  mysql_real_escape_string($_REQUEST['CourseFees']);
    $TotalCapacity =  mysql_real_escape_string($_REQUEST['TotalCapacity']);
    $NoofUserRegistered =  mysql_real_escape_string($_REQUEST['NoofUserRegistered']);
    $Instigator =  mysql_real_escape_string($_REQUEST['Instigator']);
    $IsStatus=mysql_real_escape_string($_REQUEST['IsStatus']);

	if($_POST['InsName']!='')
	{
		$InsName=implode(',',$_POST['InsName']);
	}
	else
	{
		$InsName='';
	}
	
    
	
	if($Image!='')
	{
   $update_query = "update `tblcourse` set `Title`='$Title',`OfferedBy`='$OfferedBy', `Summary`='$Summary', `Image`='$Image',`Video`='$Video',`AnnDate`='$AnnDate',`EnrStartDate`='$EnrStartDate',`EnrEndDate`='$EnrEndDate',
	`StartDate`='$StartDate',`EndDate`='$EndDate',`Location`='$Location',`StartTime`='$SSTime',`EndTime`='$EETime',`IntendedAudience`='$IntendedAudience',
`MeetingType`='$MeetingType',`CourseFees`='$CourseFees',`TotalCapacity` ='$TotalCapacity',`Instigator`='$Instigator',`InsId`='$InsName',`IsStatus`='$IsStatus' where `CourseID`='$demo'";
			 
	}
	else if($Image_2!='')
	{
			$update_query = "update `tblcourse` set `Title`='$Title',`OfferedBy`='$OfferedBy', `Summary`='$Summary', 
	`Image`='$Image_2',`Video`='$Video',`AnnDate`='$AnnDate',`EnrStartDate`='$EnrStartDate',`EnrEndDate`='$EnrEndDate',`StartDate`='$StartDate',`EndDate`='$EndDate',`Location`='$Location',`StartTime`='$SSTime',`EndTime`='$EETime',`IntendedAudience`='$IntendedAudience',
`MeetingType`='$MeetingType',`CourseFees`='$CourseFees',`TotalCapacity` ='$TotalCapacity',`Instigator`='$Instigator',`InsId`='$InsName',`IsStatus`='$IsStatus' where `CourseID`='$demo'";
	}
	
	
	else
	{
		$update_query = "update `tblcourse` set `Title`='$Title',`OfferedBy`='$OfferedBy', `Summary`='$Summary', `Video`='$Video',`AnnDate`='$AnnDate',`EnrStartDate`='$EnrStartDate',`EnrEndDate`='$EnrEndDate',
	`StartDate`='$StartDate',`EndDate`='$EndDate',`Location`='$Location',`StartTime`='$SSTime',`EndTime`='$EETime',`IntendedAudience`='$IntendedAudience',
`MeetingType`='$MeetingType',`CourseFees`='$CourseFees',`TotalCapacity` ='$TotalCapacity',`Instigator`='$Instigator',`InsId`='$InsName',`IsStatus`='$IsStatus' where `CourseID`='$demo'";
		
    }	
    	
    $z = mysql_query($update_query) or die(mysql_error());
    if ($z) 
	{
       
      //  session_start();
        
        $_SESSION['check']=1;

        // echo "<script>window.location.replace('edit.php?CourseID=$demo?check=0');</script>";
			echo "<script>
						window.location.href='view_Course.php';
				  </script>";
	?>  
					
		<script>

            
										// 	$( document ).ready(function() {
										// 		$('#update_rec').attr('style','display:block;');  
										// 		setTimeout(function() {
											
										// 		$('#update_rec').fadeOut('hide');
										// 		}, 10000);
										// });
										

        </script>				
	<?php
    } 
	else
	{
        ?>
        <center><div class="alert alert-danger" id="update_rec_not" style="width:100%; margin:0px 0px 10px 0px">
                    <strong>Your record was not updated!</strong>
                </div>	  
        </center>
<script>
setTimeout(function() {
$('#update_rec_not').fadeOut('hide');
}, 10000);
    
</script>					
<?php
    }
		
	

}
?>

<!-- <script>
$(document).ready(function () {
    if(window.location.href.indexOf("check=0") > -1) {
        $('#update_rec').css('display','block');
   
     setTimeout(function() {
        $('#update_rec').css('display','none');

        var my_variable_name = window.location.href;
        
        var success = my_variable_name.replace("?check=0", '');
        
        window.location.replace(success);

    }, 5000);
}
});
</script> -->
    <div class="page-content-wrap">
    <div class="<?php echo $MODE; ?>"></div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">      
                        <h3 class="panel-title"><b>Edit Course</b> </h3>  

                        <div class="btn-group pull-right">
                             <button class="btn btn-danger dropdown-toggle" onclick="window.location.href='view_Course.php'"><i class="fa fa-reply"></i> Back</button>
            
                         </div>

                    </div>
                </div>
                <div class="box">
                    <?php if ($error == "success") { ?>
                        <div class='alert alert-success'>
                            A new course was inserted successfully!
                        </div>
                    <?php } ?>	
                    <script src="js/index.js"></script>
                   
                    <form name="form_register" id='form_register' method="post" class="my_frm"  enctype="multipart/form-data" >
                        <input type="hidden" name="rupdate" value="<?php echo $row['CourseID']; ?>" required>     
                        <table class="table">

                            <tr>
                                <th width="30%">*Course Title:</th>

                                <td><input type="text" name="Title" value="<?php echo $row['Title']; ?>" id="Title" class="form-control" placeholder="Type Course Title" maxlength="150"/></td>
                            </tr>
                            <tr>
                                <th width="30%"> Offered By:</th>

                                <td><input type="text" name="OfferedBy" value="<?php echo $row['OfferedBy']; ?>" id="OfferedBy" class="form-control" placeholder="Type Offered By" maxlength="256"/></td>
                            </tr>
                            <tr>
                                <th>Description:</th>

                                <td>
                                    <textarea  name="Summary" id="area1" style="width:100%;height:200px;"  class="form-control" placeholder="Description" /><?php echo $row['Summary']; ?></textarea>
                                </td>
                            </tr>
							
							 <tr>
                                <th width="30%"> Image:</th>
								<td>
									Current Image : <div style="display:inline-block; font-size:12px;">
                                                        <p> (Image recommended size for better appearance is 300 X 300 (Width X Height) or above this resolution.)</p>
                                                </div><br><img src="upload/<?php echo $row['Image'];?>" height="80px" 
                                    width="120px">
                                    <br>
                                    
                                    <button type="button" id="select_btn_img" class="btn btn-info btn-lg" data-toggle="tooltip" data-placement="top" title="Image recommended size for better appearance is 300 X 300 (Width X Height) or above this resolution." style="margin-top:20px;"><span data-toggle="modal" data-target="#myModal">Select new image</span></button>
                                    
                                    
									<span style="padding:0px 15px 0px 15px; margin-top:20px; position:relative; top:10px;">or</span>

										<label type="button" id="upload_btn_img" for="Image" style=" margin-top:20px;" data-toggle="tooltip" data-placement="top" title="Image recommended size for better appearance is 300 X 300 (Width X Height) or above this resolution." class="btn btn-info btn-lg">Upload image <input type="file"  name="Image" value="<?php echo $row['Image']; ?>" style="display:none;" id="Image" class="img"/></label>
                                        <br><br>
                                        
										<div id="imagePreview_select" style="display:none;"></div>
                                        <div id="imagePreview" style="display:none;"></div>

                                        
								</td>
                                
                            </tr>
							<tr>
								<td></td>
								<td>
									
								<input type="hidden" id="Image_2" style="border-bottom: 1px solid #e1e1e1; padding-bottom:15px; 
								width: 100%;" class="form-control img" name="Image_2" />
											<!-- Modal -->
											<div id="myModal" class="modal fade" role="dialog">
											  <div class="modal-dialog">

												<!-- Modal content-->
												<div class="modal-content">
												  <div class="modal-header">
													<button type="button" class="close" data-dismiss="modal">&times;</button>
													<h4 class="modal-title">Please select an image</h4>
												  </div>
												  <div class="modal-body" style="max-height:230px;  overflow-y:scroll;">
													
													<br>
													<p><?php 
												$sel=mysql_query("select DISTINCT Image from tblcourse");
												$temp_no = 0;
												while($r1=mysql_fetch_array($sel))
												{	
													
													$temp_no++;
											?>
											  
													
														<img src="upload/<?php echo $r1['Image'];?>" value="<?php echo $r1['Image'];?>" height="100px" width="120px" style="margin:5px;" class="img_main_class" id="img_<?php echo $temp_no; ?>">
																									
											 	

												<?php
													
												}
												?></p>
												  </div>
												  <div class="modal-footer">
												  <button type="button" id="cancel_btn" class="btn btn-default" data-dismiss="modal">Cancel</button>
													<button type="button" id="submit_btn" class="btn btn-default" data-dismiss="modal">Submit</button>
												  </div>
												</div>

											  </div>
											</div>
								</td>
								
                            </tr>
							
								 

										
								
							<tr>
                            <th>  Video related to course:</th>
                           <script>
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>
<style>
.tooltip-inner {
    min-width: 300px;
}
</style>
                              <td>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-image"></i></div>
                                    <div class="row"><div class="col-md-6 col-sm-6" style="padding-left:0;"><input type="text" readonly value="https://www.youtube.com/watch?v=" class="form-control" placeholder="Add Video url" style=" border-radius:0 4px 4px 0;"/></div><div class="col-md-6 col-sm-6 padding_video" ><input type="text" name="Video" id="Video11" value="<?php echo $row['Video']; ?>" class="form-control" placeholder="Add video id" data-toggle="tooltip" data-placement="top" data-html="true" title="Enter Video ID (For Example) <br>https://www.youtube.com/watch?v=<span style='border:1px solid #fff;'>DG0C3Tntl1M</span>" style=" border-radius:4px;"/></div><div>
                                </div>
                            </td>
                            
							</tr>
                            <!--<tr>
                                <th>*  Course date : </th>
                                         <?php
                                         // $cdate = date_create($row['CourseStartDate']);
                                           // $Course_start_date = date_format($cdate, 'm/d/Y');

                                         ?>
                                <td>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                        <input type="text" name="Course_start_date" value="<?php //echo $Course_start_date; ?>" id="CoursDate"  class="form-control" placeholder="Select Start Date "/>
                                    </div>
                                </td>
                            </tr>-->



                            <tr>
                            <th>*Announcement Date: </th>
                                    <?php
       
                                        $anndate = date_create($row['AnnDate']);
                                        $AnnDate = date_format($anndate, 'm/d/Y');

                                        $enrstartdate = date_create($row['EnrStartDate']);
                                        $EnrStartDate = date_format($enrstartdate, 'm/d/Y');

                                        $enrendDate = date_create($row['EnrEndDate']);
                                        $EnrEndDate = date_format($enrendDate, 'm/d/Y');  

                                    ?>
                            <td>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" name="AnnDate" value="<?php echo $AnnDate; ?>" id="AnnDate"  class="form-control" placeholder="Select Announcement Date "/>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th>*Enrollment Start Date: </th>

                            <td>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" name="EnrStartDate" value="<?php echo $EnrStartDate; ?>" id="EnrStartDate"  class="form-control" placeholder="Select Enrollment Start Date "/>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th>*Enrollment End Date: </th>

                            <td>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" name="EnrEndDate" value="<?php echo $EnrEndDate; ?>" id="EnrEndDate"  class="form-control" placeholder="Select Enrollment End Date "/>
                                </div>
                            </td>
                        </tr>                

                            <tr>
                            
                                <th>*Start Date : </th>
                                         <?php


                                            $sdate = date_create($row['StartDate']);
                                            $StartDate = date_format($sdate, 'm/d/Y');

                                            $edate = date_create($row['EndDate']);
                                            $EndDate = date_format($edate, 'm/d/Y');

                                         
                                         ?>
                                <td>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                        <input type="text" name="StartDate" value="<?php echo $StartDate; ?>" id="StartDate"  class="form-control" placeholder="Select Start Date "/>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th>*End Date: </th>
                                <td>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                        <input type="text" name="EndDate" id="EndDate" value="<?php echo  $EndDate; ?>"  class="form-control" placeholder="Select End Date "/>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th>  Location:</th>
                                <td>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-map-marker"></i></div>
                                        <input type="text" maxlength="150" value="<?php echo $row['Location']; ?>" name="Location" id="Location" class="form-control" placeholder="Type Location"/>
                                    </div>

                                </td>
                            </tr>


                             <tr>
                                <th>*Start Time:</th>
                                <td>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
                                        <input type="time" name="STime" 
										value="<?php echo $D?>" id="STime" 
										class="form-control" placeholder="Type Time"  maxlength="50" />
                                    </div>

                                </td>
                            </tr>
							<tr>
                                <th>*End Time:</th>
                                <td>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
                                        <input type="time" name="ETime" value="<?php echo $E?>" id="ETime"  class="form-control" placeholder="Type Time"  maxlength="50" />
                                    </div>

                                </td>
                            </tr>

                            <tr>
                                <th>Intended Audience:</th>

                                <td><input type="text" name="IntendedAudience" value="<?php echo $row['IntendedAudience']; ?>" id="IntendedAudience"  class="form-control" placeholder="Type Intended Audience"/></td>
                            </tr>


                            <tr>
                                <th> Meeting Type:</th>

                                <td><input type="text" name="MeetingType" value="<?php echo $row['MeetingType']; ?>" id="MeetingType"  class="form-control" placeholder="Meeting Type" maxlength="30"/></td>
                            </tr>
                            <tr>
                                <th> Course Fees:</th>

                           <!-- <td><input type="text" name="CourseFees" id="CourseFees" class="form-control" placeholder="Course Fees"/></td> -->

                                <td><div class="input-group"><div class="input-group-addon"><i class="fa fa-usd"></i></div><input type="text" name="CourseFees" id="CourseFees" value="<?php echo $row['CourseFees']; ?>" class="form-control" placeholder="Type Course Fees" maxlength="4" /></div>

                                </td>

                            </tr>

                            <tr>
                                <th>*Total Capacity:</th>

                                <td><input type="text" name="TotalCapacity" value="<?php echo $row['TotalCapacity']; ?>" id="TotalCapacity" class="form-control" placeholder="Type Total Capacity" maxlength="3" /></td>
                            </tr>
                            <tr>
                                <th> No of User Registered:</th>

                                <td><input type="text" readonly name="NoofUserRegistered" value="<?php echo $row['NoofUserRegistered']; ?>" id="NoofUserRegistered"  class="form-control"  maxlength="3"/></td>
                            </tr>


                            <tr>
                            <th> Instructor Name:</th>
							<td>
                	<select name="InsName[]" multiple>
                    	<option>Select Instructor</option>
                        <?php
							//include('connect.php');
							$select=mysql_query("select * from tblmstinstructor where IsActive=1");
							while($r1=mysql_fetch_array($select))
							{
						?>
							
                        	<option value="<?php echo $r1['InsId'];?>" <?php if(in_array($r1['InsId'], $Ins)) echo "selected";?>>
							<?php echo $r1['InsName'];?></option>
                        
                        <?php
							}
						?>
                    </select>
                </td>
							
                        </tr>
						

                            <tr>
                                <th> Instigator:</th>

                                <td><input type="text" name="Instigator" id="Instigator" value="<?php echo $row['Instigator']; ?>"  class="form-control" placeholder="Type Instigator"/></td>
                            </tr>
							
                            <tr>
                            <th width="30%">Active/Deactive:</th>

                            <td>
								<input type="radio"  name="IsStatus" value="1"
                    <?php
					if($ReIsStatus=="1")
					{
					?>
                    	checked="checked";
                    
                    <?php
					}
					?>
                    >Active
								&nbsp;&nbsp;
  								<input type="radio"  name="IsStatus" value="0" 
                    <?php
					if($ReIsStatus=="0")
					{
					?>
                    	checked="checked";
                    
                    <?php
					}
					?>
                    >Deactive
							</td>
                        </tr>


                            <tr>
                                <th>&nbsp;</th>

                                <td><input type="button" id="Evidential_btn" value="Update" name="" class="btn btn-success"/></td>

                            </tr>
                        </table>
						
	<div class="modal fade bs-example-modal-sm" id="Update_Modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-sm" role="document" style="margin:20% auto;">
        <div class="modal-content">
            <div class="modal-body" >
              	<p>Are you sure you want to update this record?</p>
              </div>
              <div class="modal-footer text-center">
              	<!--<button type="button" class="next_btn" id="yes_btn" name="update">Yes</button>-->
				<center><input type="submit"  value="Yes" name="update" class="btn btn-success"/>
                <button type="button" class="btn btn-danger" data-dismiss="modal">No</button></center>
            </div>
        </div>
    </div>
</div>
                    </form>



                </div>

            </div>

        </div>


    </div>
	
    <!-- END PAGE CONTENT WRAPPER -->                                



    <!-- END PAGE CONTENT -->
</div>
<?php
include 'footer.php';
?>
<!-- START PLUGINS -->


  <script src="js/ajax/libs/jquery/jquery-ui.js"></script>

    <script>
// $(function () 
// {
//     $("#StartDate").datepicker({ dateFormat: 'mm/dd/yyyy'});
//     $("#EndDate").datepicker({ dateFormat: 'mm/dd/yyyy' });
//         $("#CoursDate").datepicker({ dateFormat: 'mm/dd/yyyy' });
//          $("#AnnDate").datepicker({ dateFormat: 'mm/dd/yyyy',startDate: new Date() });
    
//     $("#EnrStartDate").datepicker({ dateFormat: 'mm/dd/yyyy',minDate:new Date() });
//         $("#EnrEndDate").datepicker({ dateFormat: 'mm/dd/yyyy' });
// });


$(function () {
            $("#AnnDate").datepicker({minDate: new Date(),
                numberOfMonths: 1,
                onSelect: function (selected) {
                    var dt = new Date(selected);
                    dt.setDate(dt.getDate());
                    $("#EnrStartDate").datepicker("option", "minDate", dt);
                }
            });
            $("#EnrStartDate").datepicker({
                numberOfMonths: 1,
                onSelect: function (selected) {
                    var dt = new Date(selected);
                    dt.setDate(dt.getDate());
                    $("#EnrEndDate").datepicker("option", "minDate", dt);
                    $("#AnnDate").datepicker("option", "maxDate", dt);
                }
            });

            $("#EnrEndDate").datepicker({
                numberOfMonths: 1,
                onSelect: function (selected) {
                    var dt = new Date(selected);
                    dt.setDate(dt.getDate());
                    $("#StartDate").datepicker("option", "minDate", dt);
                    $("#EnrStartDate").datepicker("option", "maxDate", dt);
                }
            });

            $("#StartDate").datepicker({
                numberOfMonths: 1,
                onSelect: function (selected) {
                    var dt = new Date(selected);
                    dt.setDate(dt.getDate());
                    $("#EndDate").datepicker("option", "minDate", dt);
                    $("#EnrEndDate").datepicker("option", "maxDate", dt);
                }
            });

            $("#EndDate").datepicker({
                numberOfMonths: 1,
                onSelect: function (selected) {
                    var dt = new Date(selected);
                    dt.setDate(dt.getDate());
                    $("#EndDate").datepicker("option", "maxDate", dt);
                    $("#StartDate").datepicker("option", "maxDate", dt);
                }
            });

        });






</script>

<!-- <script type="text/javascript" src="js/plugins/jquery/jquery-ui.min.js"></script> -->

<script type="text/javascript" src="js/plugins/bootstrap/bootstrap.min.js"></script> 
<!-- THIS PAGE PLUGINS -->
<script type='text/javascript' src='js/plugins/icheck/icheck.min.js'></script>
<script type="text/javascript" src="js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>

<!-- <script type="text/javascript" src="js/plugins/bootstrap/bootstrap-datepicker.js"></script> -->
<!-- <script type="text/javascript" src="js/plugins/bootstrap/bootstrap-timepicker.min.js"></script> -->
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


<script src="https://cdn.jsdelivr.net/jquery.validation/1.15.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.15.0/additional-methods.min.js"></script>



<script type="text/javascript" src="http://js.nicedit.com/nicEdit-latest.js"></script>
<!-- <script type="text/javascript" src="nicEdit-latest.js"></script> -->
<script type="text/javascript">
//<![CDATA[
    bkLib.onDomLoaded(function () {

        new nicEditor({fullPanel: true, maxHeight: 200}).panelInstance('area1');
    });
    //]]>
</script>



<!-- END PLUGINS -->
<script type="text/javascript" src="slider/owl.carousel.js"></script> 
<script>
    $('.owl-carousel_services').owlCarousel({
        loop:true,
        autoPlay: true,
        nav:true,
        dots: false,
        margin: 15,
		mouseDrag : false,
        stopOnHover : true,
        responsiveClass:true,
        responsive:{
            0:{
                items:6
            },

            300:{
                items:6
            },
            479:{
                items:6
            },
            600:{
                items:6
            },
            768:{
                items:6
            },
            979:{
                items:6
            },
            1024:{
                items:6
            },
            1199:{
                items:6
            }
        }
    })
</script>
<script>
	$('#Evidential_btn').click(function () {
   $("#Update_Modal").modal('show');
});

$('#yes_btn').click(function () {
			window.location.href = "edit.php";
		});

	$(document).ready(function()
	{
		$("#myModal img").click(function() {
			$("img.selected_img").removeClass("selected_img");
			var id_class = $(this).attr('id');
			$('#' + id_class).toggleClass("selected_img");
			
			var src = $(this).attr('src');
			$('#imagePreview_select').html("<img src=" + src + ">");
			$('#imagePreview_select').attr('style', 'display:block;');
			$('#imagePreview').attr('style', 'display:none;');
			//alert(src);
			src = src.split("/").pop();
			//alert(src);
			$('#Image_2').val(src);
			
		});


		$("#myModal2 img").click(function() {
			$("img.selected_img").removeClass("selected_img");
			var id_class = $(this).attr('id');
			$('#' + id_class).toggleClass("selected_img");
			
			var src = $(this).attr('src');
			$('#imagePreview_select2').html("<img src=" + src + ">");
			$('#imagePreview_select2').attr('style', 'display:block;');
			$('#imagePreview2').attr('style', 'display:none;');
			//alert(src);
			src = src.split("/").pop();
			//alert(src);
			$('#InsImg_2').val(src);
			
		});
		
		$("#cancel_btn").click(function() {
			$("img.selected_img").removeClass("selected_img");
			$('#Image_2').val('');
			$('#imagePreview_select').html('');
			$('#imagePreview_select').attr('style', 'display:none;');
		});
		
		$("#cancel_btn2").click(function() {
			$("img.selected_img").removeClass("selected_img");
			$('#InsImg_2').val('');
			$('#imagePreview_select2').html('');
			$('#imagePreview_select2').attr('style', 'display:none;');
		});

		$("#submit_btn").click(function() {
			//alert($('#Image_2').val());
			if($('#InsImg_2').val() != ''){
				$('#upload_btn_img').attr('disabled', true); 
			}
		});

		$("#submit_btn2").click(function() {
			//alert($('#Image_2').val());
			if($('#InsImg_2').val() != ''){
				$('#upload_btn_img2').attr('disabled', true); 
			}
		});
		
		$('#Image').change(function (e) {
			if($('#Image').val() != ''){
				$('#myModal').modal('hide');
				$('#select_btn_img').attr('disabled', true); 
			}
		});

	$('#InsImg').change(function (e) {
			if($('#InsImg').val() != ''){
				$('#myModal2').modal('hide');
				$('#select_btn_img2').attr('disabled', true); 
			}
		});
		
		
		// $("#update").click(function() {
			 // if ($('#upload_btn_img').val() == '') {
				// $('#message').html("Please Attach File");
				// }else {
                            // alert('not work');
                   // }
		// });
		
		
		  
		
	});
	
	
	
	$(function() {
    $("#Image").on("change", function()
    {
        var files = !!this.files ? this.files : [];
        if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support
 
        if (/^image/.test( files[0].type)){ // only image file
            var reader = new FileReader(); // instance of the FileReader
            reader.readAsDataURL(files[0]); // read the local file
 
            reader.onloadend = function(){ // set image data as background of div
                $("#imagePreview").css("background-image", "url("+this.result+")");
            }
			$('#imagePreview').attr('style', 'display:block;');
			$('#imagePreview_select').attr('style', 'display:none;');
        }
    });
});


$(function() {
    $("#InsImg").on("change", function()
    {
        var files = !!this.files ? this.files : [];
        if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support
 
        if (/^image/.test( files[0].type)){ // only image file
            var reader = new FileReader(); // instance of the FileReader
            reader.readAsDataURL(files[0]); // read the local file
 
            reader.onloadend = function(){ // set image data as background of div
                $("#imagePreview2").css("background-image", "url("+this.result+")");
            }
			$('#imagePreview2').attr('style', 'display:block;');
			$('#imagePreview_select2').attr('style', 'display:none;');
        }
    });
});




</script>



<!-- END PRELOADS -->                      


<!-- START THIS PAGE PLUGINS-->        

<!-- END THIS PAGE PLUGINS-->  

<!-- START TEMPLATE -->



</body>
<script type="text/javascript">
//<![CDATA[
    $(document).ready(function ()

    {


        $("#form_register").validate(
                {

                    rules: {

                        'Title': {

                            required: true,
                            pattern: /^[a-zA-Z0-9\s\-\'?&.:, ]+$/,
                            //minlength: 3

                        },
						
						'Video': {

                           // required: true,
                           
							//minlength: 1

                        },	

                        'AnnDate': {

required: true,


},
'EnrStartDate': {

required: true,


},
'EnrEndDate': {

required: true,


},


                        'OfferedBy': {

                            //required: true,
                            pattern: /^[a-zA-Z0-9\s\-\'?&.:, ]+$/,
                           // minlength: 3,

                        },
                        'EndDate': {

                            required: true,
                            

                        },
                        'StartDate': {

                            required: true,

                        },
                        'EndDate': {

                            required: true,

                        },
                        'Location': {

                           // required: true,

                           // minlength: 3

                        },
                        'STime': {
                            required: true,
                            pattern: /^[a-zA-Z0-9\s\-\,\'.:]+$/,
                        }, 'ETime': {
                            required: true,
                            pattern: /^[a-zA-Z0-9\s\-\,\'.:]+$/,
                        },

                        'IntendedAudience': {

                           // required: true,
                            pattern: /^[a-zA-Z0-9\s\-\,\'.:]+$/,
                           // minlength: 3,

                        },
                        'MeetingType': {

                            //required: true,
                            pattern: /^[a-zA-Z0-9\s\-\,\'.:]+$/,

                        },
                        'CourseFees': {

                            //required: true,
                           // number: true,

                        },
                        'TotalCapacity': {

                            required: true,
							pattern: /^[0-9]+$/,
                            //number: true,

                        },

                        'NoofUserRegistered': {

                           // required: true,
                           // number: true,

                        },

                        'Instructor': {

                           // required: true,
                            pattern: /^[a-zA-Z0-9\s\-\,\'.:]+$/,
                            

                        },

                        'Instigator': {

                           // required: true,
                            pattern: /^[a-zA-Z0-9\s\-\,\'.:]+$/,
                            

                        }

                    },

                    messages: {

                        'Title': {

                            required: "The title is mandatory!",
                            pattern: "Enter only characters, number and \"space , \" -",
                           // minlength: "Choose a title of at least 3 letters!",

                        },

                        'OfferedBy': {

                           // required: "The offered by is mandatory!",
                            pattern: "Enter only characters, number and \"space , \" -",
                           // minlength: "Choose a Offered of at least 3 letters!",

                        },
						
						'Video': {

                            //required: "The video url is mandatory!",
                            pattern : "Enter only video related url!",
                           // minlength: "Please enter a video url!",

                        },

                        'AnnDate': {

required: "The course announcement date is mandatory!",

},
'EnrStartDate': {

required: "The course enrollment start date is mandatory!",

},
'EnrEndDate': {

required: "The course enrollment end date is mandatory!",

},
						
                        'CoursDate': {

                            //required: "The course start date date is mandatory!",

                        },
                        'StartDate': {

                            required: "The start date is mandatory!",

                        },

                        'EndDate': {

                            required: "The end date is mandatory!",

                        },

                        'Location': {

                          //  required: "The location is mandatory!",

                            minlength: "Choose a Location of at least 3 letters!",

                        },
                        'STime': {

                            required: "The time is mandatory!",
                            pattern: "Please enter correct value",

                        },

                        'ETime': {

                            required: "The time is mandatory!",
                            pattern: "Please enter correct value",

                        },
                        'IntendedAudience': {

                           // required: "The intended audience is mandatory!",
                            pattern: "Please enter correct value",
                           // minlength: "Enter a IntendedAudience of at least 3 letters!",

                        },

                        'MeetingType': {

                           // required: "The meeting type is mandatory!",
                            pattern: "Please enter correct value",
                        },

                        'CourseFees': {

                           // required: "The course fees is mandatory!",

                        },
                        'TotalCapacity': {

                            required: "The total capacity is mandatory!",

                        },

                        'NoofUserRegistered': {

                           // required: "The no of user registered is mandatory!",

                        },

                        'Instructor': {

                           // required: "The instructor is mandatory!",
                            pattern: "Please enter correct value",
                        },

                        'Instigator': {

                           // required: "The instigator is mandatory!",
                            pattern: "Please enter correct value",

                        }
                    }

                });

    });

//]]>
</script>
<!-- <script>
    $(function () {
        $("#StartDate").datepicker({dateFormat: 'mm/dd/yyyy'});
        $("#EndDate").datepicker({dateFormat: 'mm/dd/yyyy'});
        $("#CoursDate").datepicker({dateFormat: 'mm/dd/yyyy'});
        $("#AnnDate").datepicker({ dateFormat: 'mm/dd/yyyy' });
        $("#EnrStartDate").datepicker({ dateFormat: 'mm/dd/yyyy' });
        $("#EnrEndDate").datepicker({ dateFormat: 'mm/dd/yyyy' });
    });
</script> -->





</html>

<?php ob_end_flush(); ?>
