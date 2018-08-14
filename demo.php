<?php

include("admin/connect.php");
include("log4php/Logger.php");
include("Lib_log.php");

 
Logger::configure('multiple.xml');
 $log;
 $log=Logger::getLogger('dberror');

 $vars = new Lib_log(); 
//  $severity="";
//  $message="";
//  $filepath="";
//  $line="";
//  $vars->error_handler($severity, $message, $filepath, $line);
//  $exception="";
//  $vals=$vars->exception_handler($exception);

// include("log4php/Logger.php");
// //include("Lib_log.php");
// Logger::configure('multiple.xml');



// class Something
// {

	// private $log;

	

	// public function __construct()
	// {
	// 	//$this->log=Logger::getLogger(__CLASS__);
	// 	$this->log=Logger::getLogger('dberror');
	// }


	

	// public function run()
	// {
		
		// $record = 2; 
		// if($record == 1){
		//  echo "success";
		// }
		//$cid="";
		$date=date('Y-m-d');											
		$cnd=" AND EnrStartDate > '$date' ";

							//$cnd2= " AND '$date' BETWEEN  EnrStartDate AND EndDate ";
		$res=mysql_query("SELECT * FROM tblcourse Where CourseID!='$cid' and IsStatus = 1 AND ((EnrStartDate IS NULL and '$date' < EndDate) or ('$date' BETWEEN EnrStartDate AND EndDate)) order by StartDate ");
		$noofrec=mysql_num_rows($res);
		if($noofrec>0)
		{
				echo "record found";
		}
		else{
			echo $www;
		 //echo "email already exist..";
		 $log->info("simple information");
		//trigger_error('hiiiiiiiii',E_USER_ERROR);
		}
		 
// 	}

// }
// $ob=new Something();
// $ob->run();

?>