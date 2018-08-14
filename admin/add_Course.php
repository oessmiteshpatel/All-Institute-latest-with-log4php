<html>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>ALL-Institute | Add Course</title>


<head>


   
<script src="js/ajax/libs/jquery/jquery-1.12.4.js"></script>
    
    
	<style type="text/css">
.wrapper {
    /* padding-top: 20px; */
	padding-top: 50px;
}
input.parsley-error, select.parsley-error, textarea.parsley-error {
	border-color: #843534;
	box-shadow: none;
}
input.parsley-error:focus, select.parsley-error:focus, textarea.parsley-error:focus {
	border-color: #843534;
	box-shadow: inset 0 1px 1px rgba(0,0,0,.075), 0 0 6px #ce8483
}
.parsley-errors-list {
	list-style-type: none;
	opacity: 0;
	transition: all .3s ease-in;
	color: #d16e6c;
	margin-top: 2px;
	margin-bottom: 0;
	padding-left: 220px;
}
.parsley-errors-list.filled {
	opacity: 1;
	color: #C5161D;
}
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
</style>


 


</head>
<?php
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


if(isset($_POST['save'])) 
{
	
	$Title=$_POST['Title'];
    $OfferedBy=$_POST['OfferedBy'];
    $Summary=$_POST['Summary'];
	
	$Image=$_FILES['Image']['name'];
	$Image_2=$_POST['Image_2'];
	$p1=$_FILES['Image']['tmp_name'];
	//$path="admin/upload/$Image";
	move_uploaded_file($p1,"upload/".$_FILES['Image']['name']);
	
	//$photo=$_FILES['photo']['name'];
		//$p1=$_FILES['photo']['tmp_name'];
		//$path="upload/$Image";
		//move_uploaded_file($p1,$path);
	//$v1='http://www.youtube.com/embed/';
    $Video=$_POST['Video'];
    
    $anndate = date_create($_POST['AnnDate']);
    $AnnDate = date_format($anndate, 'Y-m-d');

    $enrstartdate = date_create($_POST['EnrStartDate']);
    $EnrStartDate = date_format($enrstartdate, 'Y-m-d');

    $enrendDate = date_create($_POST['EnrEndDate']);
    $EnrEndDate = date_format($enrendDate, 'Y-m-d');
    
	$sdate = date_create($_POST['StartDate']);
    $StartDate = date_format($sdate, 'Y-m-d');
    $edate = date_create($_POST['EndDate']);
    $EndDate = date_format($edate, 'Y-m-d');
	$Location=$_POST['Location'];
	
	$STime=$_POST['STime'];
	$SSTime=date('h:i:s a', strtotime($STime));
		
	$ETime=$_POST['ETime'];
	$EETime=date('h:i:s a', strtotime($ETime));
	
	$IntendedAudience=$_POST['IntendedAudience'];
	$MeetingType=$_POST['MeetingType'];
   // $CourseFees=$_POST['CourseFees'];
    
    if($_POST['CourseFees']!='')
	{
		$CourseFees=$_POST['CourseFees'];
	}
	else
	{
		$CourseFees=0;
    }
    
	$TotalCapacity=$_POST['TotalCapacity'];
	
	
	
    $Instigator=$_POST['Instigator'];
    
	if($_POST["InsName"]!='')
	{
		$InsName=implode(',',$_POST['InsName']);
	}
	else
	{
		$InsName='';
	}
    
    $IsStatus=$_POST['IsStatus'];
	 
	// if($Image=="" && $Image_2=="")
	// {
		// ?>
		<!--// <center><div class="alert alert-danger" id="img_insert_rec" style="width:1200px; display:inline-block; margin:0px 0px 10px 0px; fonnt-size:20px"><strong>Please select an image.</strong> <br>
            // Your record was not inserted...! </div>  
						// </center>-->
						
	 <script>
		// setTimeout(function() {
		// $('#img_insert_rec').fadeOut('hide');
		// }, 10000);
					
	// </script>					
		 <?php 
    // }
    
	if($Image!='')
	{
        $query = "INSERT INTO tblcourse(
		`Title`,`OfferedBy`,`Summary`,`Image`,`Video`,`AnnDate`,`EnrStartDate`,`EnrEndDate`,`StartDate`,`EndDate`,`Location`,
		`StartTime`,`EndTime`,`IntendedAudience`,`MeetingType`,`CourseFees`,`TotalCapacity`,`NoofUserRegistered`,`Instigator`,`InsId`,
        `IsStatus`,`CreatedBy`,
		`CreatedOn`,`ModifiedBy`,`ModifiedOn`)
                VALUES('$Title','$OfferedBy','$Summary','$Image','$Video','$AnnDate','$EnrStartDate','$EnrEndDate','$StartDate','$EndDate','$Location','$SSTime','$EETime','$IntendedAudience',
				'$MeetingType','$CourseFees','$TotalCapacity','0','$Instigator','$InsName','$IsStatus','0',now(),'0',now())"; 
			
	}
	else if($Image_2!='')
	{
		 $query = "INSERT INTO tblcourse(
		`Title`,`OfferedBy`,`Summary`,`Image`,`Video`,`AnnDate`,`EnrStartDate`,`EnrEndDate`,`StartDate`,`EndDate`,`Location`,
		`StartTime`,`EndTime`,`IntendedAudience`,`MeetingType`,`CourseFees`,`TotalCapacity`,`NoofUserRegistered`,`Instigator`,`InsId`,
		`IsStatus`,`CreatedBy`,
		`CreatedOn`,`ModifiedBy`,`ModifiedOn`)
                VALUES('$Title','$OfferedBy','$Summary','$Image_2','$Video','$AnnDate','$EnrStartDate','$EnrEndDate','$StartDate','$EndDate','$Location','$SSTime','$EETime','$IntendedAudience',
				'$MeetingType','$CourseFees','$TotalCapacity','0','$Instigator','$InsName','$IsStatus','0',now(),'0',now())"; 
			
	}
	else 
	{
	 	 $query = "INSERT INTO tblcourse(
		`Title`,`OfferedBy`,`Summary`,`Image`,`Video`,`AnnDate`,`EnrStartDate`,`EnrEndDate`,`StartDate`,`EndDate`,`Location`,
		`StartTime`,`EndTime`,`IntendedAudience`,`MeetingType`,`CourseFees`,`TotalCapacity`,`NoofUserRegistered`,`Instigator`,`InsId`,
		`IsStatus`,`CreatedBy`,
		`CreatedOn`,`ModifiedBy`,`ModifiedOn`)
                VALUES('$Title','$OfferedBy','$Summary','course-default.jpg','$Video','$AnnDate','$EnrStartDate','$EnrEndDate','$StartDate','$EndDate','$Location','$SSTime','$EETime','$IntendedAudience',
				'$MeetingType','$CourseFees','$TotalCapacity','0','$Instigator','$InsName','$IsStatus','0',now(),'0',now())"; 
			
	}
	//exit;
	
	$res = mysql_query($query);
	  if($res)
	  {
		//session_start();
        
        $_SESSION['check']=2;
    
    echo "<script>window.location.replace('view_Course.php');</script>";
					
	// <!-- <script>
	// 	setTimeout(function() {
	// 	$('#insert_rec').fadeOut('hide');
	// 	}, 10000);
					
	// </script>					 -->
	
	  }
	  else
	  {
		   ?>
						<center><div class="alert alert-danger" id="rec_not_insert" style="width:100%; display:inline-block; margin:0px 0px 10px 0px; fonnt-size:20px"><strong>Your record was not inserted!</strong> 
             </div>  
						</center>
	<script>
		setTimeout(function() {
		$('#rec_not_insert').fadeOut('hide');
		}, 10000);
					
	</script>					
	<?php
	  }

	
	

}
?>

<div class="page-content-wrap">
<div class="<?php echo $MODE; ?>"></div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
         <div class="panel-heading">      
                     <h3 class="panel-title"><b>Add Course</b> </h3>  
                     
                     </div>
            </div>
            <div class="box">
           
                
                <form name="form_register" id='form_register' method="post" class="my_frm"  enctype="multipart/form-data" >
                          
                    <table class="table">

                      <tr>
                            <th width="30%">*Course Title:</th>

                            <td><input type="text" name="Title" id="Title" class="form-control" placeholder="Type Course Title" maxlength="150"/></td>
                        </tr>
                        <tr>
                            <th width="30%"> Offered By:</th>

                            <td><input type="text" name="OfferedBy" id="OfferedBy" class="form-control" placeholder="Type Offered By" maxlength="150"/></td>
                        </tr>
                        <tr>
                            <th>Description:</th>

                            <td class="description_tab">
                                <textarea  name="Summary" id="area1" style="width:100%;height:200px;"  class="form-control" placeholder="Description" /></textarea>
                            </td>
                        </tr>
						 <tr>
                                <th width="30%"> Image:</th>
								<td>
									
									<button type="button" id="select_btn_img" class="btn btn-info btn-lg" style="margin-top:20px;" data-toggle="tooltip" data-placement="top" title="Image recommended size for better appearance is 300 X 300 (Width X Height) or above this resolution."><span data-toggle="modal" data-target="#myModal">Select new image</span></button>
									<span style="padding:0px 15px 0px 15px; margin-top:20px; position:relative; top:10px;">or</span>

										<label type="button" id="upload_btn_img" for="Image" style=" margin-top:20px;" class="btn btn-info btn-lg" data-toggle="tooltip" data-placement="top" title="Image recommended size for better appearance is 300 X 300 (Width X Height) or above this resolution.">Upload image <input type="file"  name="Image" style="display:none;" id="Image" class="img"
										reuired/></label>
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
                            <th>Video related to course: </th>
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
                                    <div class="row"><div class="col-md-6 col-sm-6 padd_left"><input type="text" readonly value="https://www.youtube.com/watch?v=" class="form-control" placeholder="Add Video url" style=" border-radius:0 4px 4px 0;"/></div><div class="col-md-6 col-sm-6 padd_right padding_video" ><input type="text" name="Video" id="Video11" class="form-control" placeholder="Add video id" data-toggle="tooltip" data-placement="top" data-html="true" title="Enter Video ID (For Example) <br>https://www.youtube.com/watch?v=<span style='border:1px solid #fff;'>DG0C3Tntl1M</span>" style=" border-radius:4px;"/></div><div>
                                </div>
                            </td>
                       </tr>
                     
                       <tr>
                            <th>*Announcement Date: </th>

                            <td>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" name="AnnDate" id="AnnDate"  class="form-control" placeholder="Select Announcement Date "/>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th>*Enrollment Start Date: </th>

                            <td>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" name="EnrStartDate" id="EnrStartDate"  class="form-control" placeholder="Select Enrollment Start Date "/>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th>*Enrollment End Date: </th>

                            <td>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" name="EnrEndDate" id="EnrEndDate"  class="form-control" placeholder="Select Enrollment End Date "/>
                                </div>
                            </td>
                        </tr>                

                       <tr>
                            <th>*Start Date: </th>

                            <td>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" name="StartDate" id="StartDate"  class="form-control" placeholder="Select Start Date "/>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th>*End Date: </th>
                            <td>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="text" name="EndDate" id="EndDate"  class="form-control" placeholder="Select End Date "/>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th>  Location:</th>
                            <td>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-map-marker"></i></div>
                                    <input type="text" maxlength="150" name="Location" id="Location" class="form-control" placeholder="Type Location"/>
                                </div>
 
                            </td>
                        </tr>


                        <tr>
                                <th>*Start Time:</th>
                                <td>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
                                        <input type="time" name="STime"  id="STime"  class="form-control" placeholder="Type Time"  maxlength="50" />
                                    </div>

                                </td>
                            </tr>
							<tr>
                                <th>*End Time:</th>
                                <td>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-clock-o"></i></div>
                                        <input type="time" name="ETime"  id="ETime"  class="form-control" placeholder="Type Time"  
										maxlength="50" />
                                    </div>

                                </td>
                            </tr>

                       <tr>
                            <th> Intended Audience:</th>

                            <td><input type="text" name="IntendedAudience" id="IntendedAudience"  class="form-control" placeholder="Type Intended Audience"/></td>
                        </tr>


                        <tr>
                            <th> Meeting Type:</th>

                            <td><input type="text" name="MeetingType" id="MeetingType"  class="form-control" placeholder="Meeting Type" maxlength="30"/></td>
                        </tr>
                        <tr>
                            <th> Course Fees:</th>

                           <!-- <td><input type="text" name="CourseFees" id="CourseFees" class="form-control" placeholder="Course Fees"/></td> -->

                        <td><div class="input-group"><div class="input-group-addon"><i class="fa fa-usd"></i></div><input type="text" name="CourseFees" id="CourseFees" class="form-control" placeholder="Type Course Fees" maxlength="5" /></div>
                          </td>
                         
                        </tr>

                        <tr>
                            <th>*Total Capacity:</th>

                            <td><input type="text" name="TotalCapacity" id="TotalCapacity" class="form-control" placeholder="Type Total Capacity" maxlength="3" /></td>
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
                        
                        	<option value="<?php echo $r1['InsId'];?>">
							<?php echo $r1['InsName'];?></option>
                        
                        <?php
							}
						?>
                    </select>
                </td>
							
                        </tr>
                        <tr>
                            <th> Instigator:</th>

                            <td><input type="text" name="Instigator" id="Instigator"  class="form-control" placeholder="Type Instigator" maxlength="150"/></td>
                        </tr>
                        
                        <tr>
                            <th width="30%">Active/Deactive:</th>

                            <td>
								<input type="radio"  name="IsStatus" value="1" checked id="IsStatus">Active 
								&nbsp;&nbsp;
  								<input type="radio"  name="IsStatus" value="0" id="IsStatus">Deactive<br>
							</td>
                        </tr>

                        <tr>
                            <th>&nbsp;</th>

                            <td><input type="submit" name="save" class="btn btn-success"  value="Save" />
							</td>

                        </tr>
                    </table>
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

<script type="text/javascript" src="js/plugins/bootstrap/bootstrap.min.js"></script>                
<!-- END PLUGINS -->

<!-- THIS PAGE PLUGINS -->
<script type='text/javascript' src='js/plugins/icheck/icheck.min.js'></script>
<script type="text/javascript" src="js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>


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




	$(document).ready(function()
	{
		$("img").click(function() {
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
		
		$("#cancel_btn").click(function() {
			$("img.selected_img").removeClass("selected_img");
			$('#Image_2').val('');
			$('#imagePreview_select').html('');
			$('#imagePreview_select').attr('style', 'display:none;');
		});
		// $("#upload_btn_img").click(function() {
			// //alert($('#Image').val()bmit);
			// if($('#Image').val() != ''){
				// $('#myModal').modal('hide');
				// $('#select_btn_img').attr('disabled', true); 
			// }
		// });
		$("#submit_btn").click(function() {
			//alert($('#Image_2').val());
			if($('#Image_2').val() != ''){
				$('#upload_btn_img').attr('disabled', true); 
			}
		});
		
		$('#Image').change(function (e) {
			if($('#Image').val() != ''){
				$('#myModal').modal('hide');
				$('#select_btn_img').attr('disabled', true); 
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
                            pattern: /^[a-zA-Z0-9\s\-\'\,\"?&.:]+$/,
                           // minlength: 3

                        },


						'Image': {

                            //required: true,
                            pattern: /^.png|.jpg|.gif/,
							//minlength: 1

                        },	
						
						'Video': {

                           // required: true,
                           
							minlength: 1

                        },	


                        'OfferedBy': {

                           // required: true,
                            pattern: /^[a-zA-Z0-9\s\-\'\,\"?&.:]+$/,
                          //  minlength: 3,

                        },
                        'CoursDate': {

                           // required: true,
                           

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
                        'StartDate': {

                            required: true,
                           

                        },
                        'EndDate': {

                            required: true,
                            

                        },
                        'Location': {

                          //  required: true,
                            pattern: /^[a-zA-Z0-9\s\-\'\,\"?&.:]+$/,
                           // minlength: 3

                        },
						
                        'STime': {
                            required: true,
                            pattern: /^[a-zA-Z0-9\s\-\'\,\"?&.:]+$/,
                        }, 

						'ETime': {
                            required: true,
                            pattern: /^[a-zA-Z0-9\s\-\'\,\"?&.:]+$/,
                        },

                        'IntendedAudience': {

                           // required: true,
                            pattern: /^[a-zA-Z0-9\s\-\'\"?&.:]+$/,
                          //  minlength: 3,

                        },
                        'MeetingType': {

                           // required: true,
                            pattern: /^[a-zA-Z0-9\s\-\'\"?&.:]+$/,

                        },
                        'CourseFees': {

                           //  required: true,
                           // number: true,

                           
                           
                        },
                        'TotalCapacity': {

                            required: true,
                            number: true,
                           
                        },

                        'NoofUserRegistered': {

                           // required: true,
                           // number: true,
                           

                        },

                        'Instructor': {

                            required: true,
                            pattern: /^[a-zA-Z0-9\s\-\'\"?&.:]+$/,
                            maxlength: 50,

                        },

                        'Instigator': {

                           // required: true,
                            pattern: /^[a-zA-Z0-9\s\-\'\"?&.:]+$/,
                           // maxlength: 50,

                        }

                    },

                    messages: {

                        'Title': {

                            required: "The title is mandatory!",
                            pattern : "Enter only characters, number and \"space , \" -",
                            minlength: "Choose a title of at least 3 letters!",

                        },

						
						'Image': {

                            //required: "The image is mandatory!",
                            pattern : "Enter only image fromat .png,.jpg,.gif",
                            minlength: "Choose a image of at least 1!",

                        },
						
						'Video': {

                           // required: "The video url is mandatory!",
                            pattern : "Enter only video related url!",
                          //  minlength: "Please enter a video url!",

                        },


                        'OfferedBy': {

                           // required: "The offered by is mandatory!",
                            pattern : "Enter only characters, number and \"space , \" -",
                            minlength: "Choose a Offered of at least 3 letters!",

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

                        'StartDate': {

                            required: "The start date is mandatory!",

                        },

                        'EndDate': {

                            required: "The end date is mandatory!",

                        },

                        'Location': {

                          //  required: "The location is mandatory!",
                            pattern: "Please enter correct value",
                            minlength: "Choose a Location of at least 3 letters!",

                        },

                        'STime': {

                            required: "The time is mandatory!",
                            pattern : "Please enter correct value",

                        }, 'ETime': {

                            required: "The time is mandatory!",
                            pattern : "Please enter correct value",

                        },
                        'IntendedAudience': {

                           // required: "The intended audience is mandatory!",
                            pattern : "Please enter correct value",
                            minlength: "Enter a IntendedAudience of at least 3 letters!",

                        },

                        'MeetingType': {

                          //  required: "The meeting type is mandatory!",
                            pattern : "Please enter correct value",
                        },

                        'CourseFees': {

                          //  required: "The course fees is mandatory!",

                        },
                        'TotalCapacity': {

                            required: "The total capacity is mandatory!",

                        },

                        'NoofUserRegistered': {

                          //  required: "The no of user registered is mandatory!",

                        },

                        'Instructor': {

                           // required: "The instructor is mandatory!",
                            pattern : "Please enter correct value",
                        },

                        'Instigator': {

                          //  required: "The instigator is mandatory!",
                            pattern : "Please enter correct value",

                        }
                    }

                });

    });

//]]>
</script>




<!-- <script src="js/ajax/libs/jquery/1.6/jquery.min.js" type="text/javascript"></script> -->

   

</html>

<?php ob_end_flush(); ?>
