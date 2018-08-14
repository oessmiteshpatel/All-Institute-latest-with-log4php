<html>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ALL-Institute | Edit instructor</title>
	<head>
	<link type="text/css" rel="stylesheet" href="slider/owl.carousel.css">
    <script type="text/javascript" src="js/plugins/jquery/jquery.min.js"></script>
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
    error_reporting(0);
    include 'side_bar.php';
    include 'header.php';
   
    include 'functions.php';
    include 'connect.php';
    session_start();
    $MODE=MODE;

    include("../log4php/Logger.php");
    include("../Lib_log.php");


    Logger::configure('../multiple.xml');
    //$log;
    //$log=Logger::getLogger('dberror');

    $vars = new Lib_log();

    $update = $_REQUEST['InsId'];

    $query = "SELECT * FROM `tblmstinstructor` where InsId='$update'";

    $result = mysql_query($query)or die(mysql_error());
    $row = mysql_fetch_array($result)or die(mysql_error());
    $ReIsActive=$row['IsActive'];

   
if (isset($_POST['update'])) 
{

    $demo = $_REQUEST['rupdate'];

    
    $InsName =  mysql_real_escape_string($_REQUEST['InsName']);

	$InsImg=$_FILES['InsImg']['name'];
	$InsImg_2=mysql_real_escape_string($_REQUEST['InsImg_2']);
	$p1=$_FILES['InsImg']['tmp_name'];
	
	//$path="admin/upload/$InsImg";
	move_uploaded_file($p1,"upload/instructor/".$_FILES['InsImg']['name']);

    $About =  mysql_real_escape_string($_REQUEST['About']);
    
    $IsActive=mysql_real_escape_string($_REQUEST['IsActive']);

	if($InsImg!="")
	{
		$update_query = "update `tblmstinstructor` set `InsName`='$InsName',`About`='$About',`InsImg`='$InsImg',`IsActive`='$IsActive' where `InsId`='$demo'";
			 
	}
	else if($InsImg_2!="")
	{
		$update_query = "update `tblmstinstructor` set `InsName`='$InsName',`About`='$About',`InsImg`='$InsImg_2',`IsActive`='$IsActive' where `InsId`='$demo'";
			 
	}
	else
	{
		$update_query = "update `tblmstinstructor` set `InsName`='$InsName',`About`='$About',`IsActive`='$IsActive' where `InsId`='$demo'";
		
	}		
    $z = mysql_query($update_query) or die(mysql_error());
   
    if ($z) 
	{
        //echo $demo;

       // session_start();
        
        $_SESSION['check']=1;
    //   echo "<script>window.location.replace('edit_Ins.php?InsId=$demo?check=0');</script>";
    echo "<script>window.location.replace('view_Instructor.php');</script>";
      
        ?>
						
					
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
<script>
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
</script>
    <div class="page-content-wrap">
    <div class="<?php echo $MODE; ?>"></div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">      
                        <h3 class="panel-title"><b>Edit Instructor </b> </h3>  
                        
                        <div class="btn-group pull-right">
                             <button class="btn btn-danger dropdown-toggle" onclick="window.location.href='view_Instructor.php'"><i class="fa fa-reply"></i> Back</button>
            
                         </div>

                    </div>
                </div>
                <div class="box">
                   	
                    <script src="js/index.js"></script>
                   
                    <form name="form_instructor" id='form_instructor' method="post" class="my_frm"  enctype="multipart/form-data" >
                        <input type="hidden" name="rupdate" value="<?php echo $row['InsId']; ?>" required>     
                        <table class="table">

                           <tr>
                            <th width="30%">*Instructor Name:</th>

                            <td><input type="text" name="InsName" id="InsName" value="<?php echo $row['InsName']; ?>" class="form-control" placeholder="Type type Instructor Name" maxlength="150"/></td>
                        </tr>
                        
                        <tr>
                            <th>Instructor About:</th>

                            <td>
                                <textarea  name="About" id="About1" style="width:100%;height:200px;"  class="form-control" placeholder="Description" /><?php echo $row['About']; ?></textarea>
                            </td>
                        </tr>
						
							

						
						
                     
                        <script>
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>
						
						  <tr>
                                <th width="30%">*Instructor Image:</th>
								<td>
                                Current Image : <div style="display:inline-block; font-size:12px;">
                                                        <p> (Image recommended size for better appearance is 300 X 300 (Width X Height) or above this resolution.)</p>
                                                </div><br><img src="upload/instructor/<?php echo $row['InsImg'];?>" height="80px" 
                                    width="120px">
                                    <br>
                                    <br>
									<button type="button" id="select_btn_img2" class="btn btn-info btn-lg" style="margin-top:20px;" data-toggle="tooltip" data-placement="top" title="Image recommended size for better appearance is 300 X 300 (Width X Height) or above this resolution."><span data-toggle="modal" data-target="#myModal2">Select new image</span></button>
									<span style="padding:0px 15px 0px 15px; margin-top:20px; position:relative; top:10px;">or</span>

										<label type="button" id="upload_btn_img2" for="InsImg" data-toggle="tooltip" data-placement="top" title="Image recommended size for better appearance is 300 X 300 (Width X Height) or above this resolution." style="margin-top:20px;" class="btn btn-info btn-lg">Upload image <input type="file"  name="InsImg" value="<?php echo $row['InsImg']; ?>" style="display:none;" id="InsImg" class="img"/></label>
										<br><br>
										<div id="imagePreview_select2" style="display:none;"></div>
										<div id="imagePreview2" style="display:none;"></div>
								</td>
                                
                            </tr>
							<tr>
								<td></td>
								<td>
									
								<input type="hidden" id="InsImg_2" style="border-bottom: 1px solid #e1e1e1; padding-bottom:15px; 
								width: 100%;" class="form-control img" name="InsImg_2" />
											<!-- Modal -->
											<div id="myModal2" class="modal fade" role="dialog">
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
												$sel2=mysql_query("select Distinct InsImg from tblmstinstructor");
												$temp_no2 = 0;
												while($r2=mysql_fetch_array($sel2))
												{	
													
													$temp_no2++;
											?>
											  
													
														<img src="upload/instructor/<?php echo $r2['InsImg'];?>" value="<?php echo $r2['InsImg'];?>" height="100px" width="120px" style="margin:5px;" class="img_main_class" id="img_<?php echo $temp_no2; ?>">
																									
											 	
												<?php
													
												}
												?></p>
												  </div>
												  <div class="modal-footer">
												  <button type="button" id="cancel_btn2" class="btn btn-default" data-dismiss="modal">Cancel</button>
													<button type="button" id="submit_btn2" class="btn btn-default" data-dismiss="modal">Submit</button>
												  </div>
												</div>

											  </div>
											</div>
								</td>
								
                            </tr>

                            <tr>
                            <th width="30%">Active/Deactive:</th>

                            <td>
								<input type="radio"  name="IsActive" value="1"
                    <?php
					if($ReIsActive=="1")
					{
					?>
                    	checked="checked";
                    
                    <?php
					}
					?>
                    >Active
								&nbsp;&nbsp;
  								<input type="radio"  name="IsActive" value="0" 
                    <?php
					if($ReIsActive=="0")
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
				<center><input type="submit"  value="Yes" id="yesbtn" name="update" class="btn btn-success"/>
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

<script type="text/javascript" src="js/plugins/jquery/jquery-ui.min.js"></script>
<script type="text/javascript" src="js/plugins/bootstrap/bootstrap.min.js"></script>  

<script type="text/javascript" src="js/plugins.js"></script>        
<script type="text/javascript" src="js/actions.js"></script>    


         
<!-- END PLUGINS -->
<script type="text/javascript" src="slider/owl.carousel.js"></script> 
<!-- <script>
$("#yesbtn").click(function() { 
    setTimeout(function(){
        alert("fhgfhfghgf");
    window.location.reload();
    },1000);  
 });
</script> -->
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
<!-- THIS PAGE PLUGINS -->
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


<script src="https://cdn.jsdelivr.net/jquery.validation/1.15.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.15.0/additional-methods.min.js"></script>

 

<script type="text/javascript" src="http://js.nicedit.com/nicEdit-latest.js"></script>
<!-- <script type="text/javascript" src="nicEdit-latest.js"></script> -->
<script type="text/javascript">
//<![CDATA[
    bkLib.onDomLoaded(function () {

        new nicEditor({fullPanel: true, maxHeight: 200}).panelInstance('About1');
    });
    //]]>
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


        $("#form_instructor").validate(
                {

                    rules: {

                        'InsName': {

                            required: true,
                            pattern: /^[a-zA-Z0-9\s\-\'?&.:, ]+$/,
                            //minlength: 3

                        },
						
						'About': {

                            required: true,
                           
							//minlength: 1

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

                        'InsName': {

                            required: "The name is mandatory!",
                            pattern: "Enter only characters and \"space , \" -",
                           

                        },

                        'About': {

                            required: "The about is mandatory!",
                           // pattern: "Enter only characters, number and \"space , \" -",
                            //minlength: "Choose a Offered of at least 3 letters!",

                        },
						
						'Video': {

                            required: "The video url is mandatory!",
                            pattern : "Enter only video related url!",
                            minlength: "Please enter a video url!",

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
<script>
    $(function () {
        $("#StartDate").datepicker({dateFormat: 'mm/dd/yyyy'});
        $("#EndDate").datepicker({dateFormat: 'mm/dd/yyyy'});
        $("#CoursDate").datepicker({dateFormat: 'mm/dd/yyyy'});
    });
</script>
</html>

<?php ob_end_flush(); ?>
