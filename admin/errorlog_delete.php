<script type="text/javascript">
    function autoRefreshPage()
    {
       window.location = window.location.href;
    }
   // setInterval('autoRefreshPage()', 86400000);
   setInterval('autoRefreshPage()', 10000);
</script>

<title>ALL-Institute | Errorlogs</title>
<?php
include 'side_bar.php';
include 'header.php';
include 'connect.php';
session_start();
$MODE=MODE;
include 'functions.php';
?>


 
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
    <!-- 

   table body

     -->
        <?php

           $datetime1=date('Y-m-d',strtotime('-'.'7'.'days'));

           $resupdate=mysql_query("INSERT INTO tblloghistory SELECT * FROM tbllog WHERE timestamp LIKE '$datetime1%'");

           $resdelete=mysql_query("DELETE FROM tbllog WHERE timestamp LIKE '$datetime1%'");

// $res=mysql_query("SELECT * FROM log");
// $rec=mysql_num_rows($res);

// 	while($r=mysql_fetch_array($res))
// 	{
    
// 	    $timestamp=$r['timestamp'];
//        	$today = date('Y-m-d');
       
		
// 		// $count = 2;
// 		 $datetime1 = new DateTime($today);
// 		 $datetime2 = new DateTime($timestamp);
		 
// 		 $interval = $datetime1->diff($datetime2);
// 		 $diff = $interval->format('%a');
         
     
    
// $rec=mysql_num_rows($res);
		//  if($diff=='8')
		//  {
        //      echo "true";   
        //      die;
        //  }
        //  else
        //  {
        //     echo "false <br>";
        //     die;
        //  }

  // }    
        
?>


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
