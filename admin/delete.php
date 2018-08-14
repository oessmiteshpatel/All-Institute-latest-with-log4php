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

$delete=$_GET['CourseID'];

//echo $resdepend="SELECT tblcourseregistered CourseID FROM tblcourse INNER JOIN tblcourseregistered ON tblcourse.CourseID=tblcourseregistered.CourseID where tblcourse.CourseID='$delete'";
$resdepend=mysql_query("SELECT CourseID FROM tblcourseregistered where CourseID='$delete'");
//exit;

//$rdepen=mysql_fetch_array($resdepend);
$noofrec=mysql_num_rows($resdepend);


//header("location:view_Course.php");


if($noofrec>0)
{
	
        
	$_SESSION['check']=4;

	echo "<script>window.location.replace('view_Course.php');</script>";

}
else 
{
	// $qq=mysql_query("select * FROM `tblcourse` WHERE CourseID='$delete'");
	// $r2=mysql_fetch_array($qq);
	
	
	// $result=mysql_query("DELETE FROM `tblcourse` WHERE CourseID='$delete'");
	// unlink("upload/".$r2['Image']);	
	
	// 	if($result)
	// 	{

	$qq=mysql_query("select * FROM `tblcourse` WHERE CourseID='$delete'");
	$r2=mysql_fetch_array($qq);
	$Image=$r2['Image'];
	
	
	$select=mysql_query("select * FROM `tblcourse` WHERE Image='$Image'");
	
	$sel=mysql_fetch_array($select);
	$del_img=mysql_num_rows($select);
	
	
	$result=mysql_query("DELETE FROM `tblcourse` WHERE CourseID='$delete'");


	if($del_img==1)
	{
		
		unlink("upload/".$Image);	
				
			
					// echo "<script>
					// 		window.location.href='view_Course.php#rec_delete';
					// </script>";
				

			

				
		}
	//	session_start();
						
		$_SESSION['check']=3;
		echo "<script>window.location.replace('view_Course.php');</script>";

	}
?> 
<body>


</body>
 </html>