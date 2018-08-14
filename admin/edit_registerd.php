<html>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>All-Institute | Edit register</title>

    <script type="text/javascript" src="js/plugins/jquery/jquery.min.js"></script>


    <?php
    include 'side_bar.php';
    include 'header.php';
    include 'connect.php';
    session_start();
$MODE=MODE;
    include 'functions.php';
    $update = $_REQUEST['RegisterId'];

    $query = "SELECT * FROM `tblregister` where RegisterId='$update'";

    $result = mysql_query($query)or die(mysql_error());
    $row = mysql_fetch_array($result)or die(mysql_error());
    $ReIsActive=$row['IsActive'];
    

    $error = false;
    ?>

    <?php
    if (isset($_POST['update'])) {

        $demo = $_REQUEST['rupdate'];

        $FirstName = $_REQUEST['FirstName'];
        $LastName = $_REQUEST['LastName'];
        $Email = $_REQUEST['Email'];


        $Address = $_REQUEST['Address'];
        $Phone = $_REQUEST['Phone'];
        $IsActive=$_REQUEST['IsActive'];

        $update_query = "update `tblregister` set `FirstName`='$FirstName',`LastName`='$LastName', `Email`='$Email',`Address`='$Address',`Phone`='$Phone',`IsActive`='$IsActive' where `RegisterId`='$demo'";



        $z = mysql_query($update_query) or die(mysql_error());
        if ($z) {
            

            // <!-- <script>location.replace('view_Registration.php');</script> -->
            //echo "<script>window.location.replace('edit_registerd.php?RegisterId=$demo?check=0');</script>";
            session_start();
        
            $_SESSION['check']=1;
            echo "<script>window.location.replace('view_Registration.php');</script>";
            
        } else {
            
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
                        <h3 class="panel-title"><b>Edit Registration</b> </h3>  

                        <div class="btn-group pull-right">
                             <button class="btn btn-danger dropdown-toggle" onclick="window.location.href='view_Registration.php'"><i class="fa fa-reply"></i> Back</button>
            
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
                    <center><div class="alert alert-success" id="update_rec" style="width:100%; margin:0px 0px 10px 0px; display:none;">
									<strong>Your record was updated successfully!</strong>
								</div>	  
						</center>
                     <form name="form_register" id='form_register' method="post" class="my_frm"  enctype="multipart/form-data" >
                        <input type="hidden" name="rupdate" value="<?php echo $row['RegisterId']; ?>">     
                        <table class="table">

                            <tr>
                                <th width="30%">*First Name:</th>

                                <td><input type="text" name="FirstName" value="<?php echo $row['FirstName']; ?>" id="FirstName" class="form-control" placeholder="First Name" maxlength="50"/></td>
                            </tr>
                            <tr>
                                <th width="30%">*Last Name:</th>

                                <td><input type="text" name="LastName" value="<?php echo $row['LastName']; ?>" id="LastName" class="form-control" placeholder="Last Name" maxlength="50"/></td>
                            </tr>
                            <tr>
                                <th width="30%">*Email:</th>

                                <td><input type="text" name="Email" value="<?php echo $row['Email']; ?>" id="Email" class="form-control" placeholder="Email" maxlength="50"/></td>
                            </tr>
                            <tr>
                                <th width="30%">*Address:</th>

                                <td><input type="text" name="Address" value="<?php echo $row['Address']; ?>" id="Address" class="form-control" placeholder="Address" maxlength="150"/></td>
                            </tr>
                            <tr>
                                <th width="30%">*Phone:</th>

                                <td><input type="text" name="Phone" value="<?php echo $row['Phone']; ?>" id="Phone" class="form-control" placeholder="Phone" maxlength="13"/></td>
                            </tr>

                            <tr>
                            <th width="30%">*Active/Deactive:</th>

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

                                <td><input type="button" id="Evidential_btn" value="Update" class="btn btn-success"/></td>

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
<script type="text/javascript" src="nicEdit-latest.js"></script>


<!-- END PRELOADS -->                      


<!-- START THIS PAGE PLUGINS-->        

<!-- END THIS PAGE PLUGINS-->  

<!-- START TEMPLATE -->



</body>


<script>
	$('#Evidential_btn').click(function () {
   $("#Update_Modal").modal('show');
});
</script>
<script type="text/javascript">
//<![CDATA[
    $(document).ready(function ()

    {


        $("#form_register").validate(
                {

                    rules: {

                        'FirstName': {
                            required: true,
                            pattern: /^[a-zA-Z0-9\s\-\'\,\:, ]+$/,
                            //minlength: 3 LastName

                        },
                        
						
						'LastName': {

                            required: true,
                            pattern: /^[a-zA-Z0-9\s\-\'\,\.:, ]+$/,
                            //minlength: 3 LastName

                        },

                        'Email': {

                        required: true,
                      //  pattern: /^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i,
                        email: true


                        },


                        

                        'Address': {

                            required: true,
                            pattern: /^[a-zA-Z0-9\s\-\'\,\"?&.:, ]+$/,
                            

                        },

                        'Phone': {

                            required: true,
                            pattern: /^[0-9\s\-\'() ]+$/,
                            

                        }

                    },

                    messages: {

                        'FirstName': {

                            required: "The first name is mandatory!",
                            pattern: "Enter only characters and \"space , \" -"
                           

                        },

                        'LastName': {

                            required: "The last name is mandatory!",
                            pattern: "Enter only characters and \"space , \" -"

                        },

                        'email': {

                        required: "The email is required!",

                       // pattern: "Please enter a valid email address!",
                        email: "Please enter a valid email address!",

                        },
						
						

                        'Address': {

                            required: "The address is mandatory!",
                            pattern: "Please enter correct value",
                        },

                        'Phone': {

                            required: "The phone is mandatory!",
                            pattern: "Please enter correct value",

                        }
                    }

                });

    });

//]]>
</script>

<!-- <script type="text/javascript">
//<![CDATA[
    $(document).ready(function ()

    {


        $("#form_register").validate(
                {

                    rules: {

                        'FirstName': {

                            required: true,
                            pattern: /^[a-zA-Z\']+$/,
                            //pattern: /^[a-zA-Z0-9\s\-\'.:]+$/,


                        },

                        'LastName': {

                            required: true,
                            pattern: /^[a-zA-Z\']+$/,
                            //pattern: /^[a-zA-Z0-9\s\-\'.:]+$/,


                        },

                        'Email': {

                            required: true,
                            pattern: /^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i,
                            email: true


                        },

                        'Address': {

                            required: true,
                            pattern: /^[a-zA-Z0-9\s\-\'.\:#,]+$/,

                        },

                        'Phone': {

                            required: true,
                            pattern: /^[0-9]+$/,

                        },

                        'Instigator': {

                            required: true,
                            pattern: /^[a-zA-Z0-9\s\-\'.:]+$/,

                        }

                    },

                    messages: {

                        'FirstName': {

                            required: "The First Name is mandatory!",
                            pattern: "Enter only characters ",

                        },
                        'LastName': {

                            required: "The Last Name is mandatory!",
                            pattern: "Enter only characters ",

                        },
                        'email': {

                            required: "The email is required!",

                            pattern: "Please enter a valid email address!",
                            email: "Please enter a valid email address!",

                        },
                        'Address': {

                            required: "The address is mandatory!",
                            pattern: "Enter only characters, number and space",

                        },

                        'Phone': {

                            required: "The Phone by is mandatory!",
                            pattern: "Enter only number",

                        },

                        'Instructor': {

                            required: "The instructor is mandatory!",
                            pattern: "Please enter correct value",
                        },

                        'Instigator': {

                            required: "The instigator is mandatory!",
                            pattern: "Please enter correct value",

                        }
                    }

                });

    });

//]]>
</script> -->

</html>

<?php ob_end_flush(); ?>
