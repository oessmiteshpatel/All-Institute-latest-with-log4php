<html>
<head>

	<script type="text/javascript" src="js/plugins/jquery/jquery.min.js"></script>
	<script type="text/javascript" src="js/plugins/jquery/jquery-ui.min.js"></script>
	<script type="text/javascript" src="js/plugins/bootstrap/bootstrap.min.js"></script>                

</head>
<?php 
error_reporting(0);
include 'connect.php';
session_start();

include("../log4php/Logger.php");
include("../Lib_log.php");


Logger::configure('../multiple.xml');
//$log;
//$log=Logger::getLogger('dberror');

$vars = new Lib_log(); 

$delete=$_GET['InsId'];
$ins_id=(string)$delete;

//$resdepend=mysql_query("SELECT InsId FROM tblmstinstructor where InsId='$delete'");
$resdepend=mysql_query("SELECT InsId FROM tblcourse where FIND_IN_SET($ins_id,InsId)");	
//exit;

//$rdepen=mysql_fetch_array($resdepend);
$noofrec=mysql_num_rows($resdepend);



//header("location:view_Course.php");
if($noofrec>0 )
{
	//session_start();
        
	$_SESSION['check']=4;

	echo "<script>window.location.replace('view_Instructor.php');</script>";

}
else
{
	// $qq=mysql_query("select * FROM `tblmstinstructor` WHERE InsId='$delete'");
	// $r2=mysql_fetch_array($qq);
	
	// $result=mysql_query("DELETE FROM `tblmstinstructor` WHERE InsId='$delete'");
	// unlink("instructor/".$r2['InsImg']);	
	
	// 	if($result)
	// 	{
	// 		// echo "<script>
	// 		// 		window.location.href='view_Instructor.php#rec_delete';
	// 		// </script>";
	// 		session_start();
				
	// 			$_SESSION['check']=3;
			
	// 		echo "<script>window.location.replace('view_Instructor.php');</script>";
	// 	}

	$qq=mysql_query("select * FROM `tblmstinstructor` WHERE InsId='$delete'");
	$r2=mysql_fetch_array($qq);
	$InsImg=$r2['InsImg'];
	
	
	$select=mysql_query("select * FROM `tblmstinstructor` WHERE InsImg='$InsImg'");
	$sel=mysql_fetch_array($select);
	$del_img=mysql_num_rows($select);
	
	
	$result=mysql_query("DELETE FROM `tblmstinstructor` WHERE InsId='$delete'");
	
	
	if($del_img==1)
	{
		
		unlink("instructor/".$InsImg);	
		//session_start();
				
		$_SESSION['check']=3;
				
	 	echo "<script>window.location.replace('view_Instructor.php');</script>";
		
	}
	//session_start();
				
		$_SESSION['check']=3;
				
	 	echo "<script>window.location.replace('view_Instructor.php');</script>";



}
?> 
<body>


</body>
 </html>