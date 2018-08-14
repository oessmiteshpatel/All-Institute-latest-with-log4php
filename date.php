<head>

<script type="text/javascript">
    function autoRefreshPage()
    {
       window.location = window.location.href;
    }
    setInterval('autoRefreshPage()', 86400000);
</script>

</head>


<?php
include("admin/connect.php"); 

$FROMNAME=FROMNAME;
$USERNAME=USERNAME;
$USERPASSWORD=USERPASSWORD;
$SETFROM=SETFROM;
$SETTO=SETTO;


$res1=mysql_query("SELECT RegisterId FROM tblcourseregistered group by RegisterId");
	
while($r1=mysql_fetch_array($res1))
{
	$RegisterId = $r1['RegisterId']; 
	$res2=mysql_query("SELECT CourseID FROM tblcourseregistered where RegisterId='$RegisterId'");
	while($r2=mysql_fetch_array($res2))
	{
		$CourseIDS=$r2['CourseID'];
	
		$sel3=mysql_query("SELECT StartDate,Title FROM tblcourse where CourseID='$CourseIDS'");		
		$r3=mysql_fetch_array($sel3);
		
		$seluser=mysql_query("SELECT Email,FirstName FROM tblregister where RegisterId='$RegisterId'");
		$r4=mysql_fetch_array($seluser);
		
		
		
		 $Title=$r3['Title'];	
	     $StartDate=$r3['StartDate'];
		 $today = date('Y-m-d');
		
		// $count = 2;
		 $datetime1 = new DateTime($today);
		 $datetime2 = new DateTime($StartDate);
		 
		 $interval = $datetime1->diff($datetime2);
		 $diff = $interval->format('%a');
		 
		 if($diff == '2')
		 {
		 $FirstName=$r4['FirstName'];
				$Email=$r4['Email'];
				
				$email=trim($Email);
				require_once('email/class.phpmailer.php');
				$mail = new PHPMailer(); // create a new object
				$mail->IsSMTP(); // enable SMTP
				$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
				$mail->SMTPAuth = true; // authentication enabled
				$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
				$mail->Host = "smtp.gmail.com";
				$mail->Port = 465; // or 587
				$mail->IsHTML(true);
			//	$mail->FromName="AERE"; 
			//	$mail->Username = "myopeneyes3937@gmail.com";
			//	$mail->Password = "W3lc0m3@2018";
			//	$mail->SetFrom("myopeneyes3937@gmail.com");
				$mail->FromName=FROMNAME; 
				$mail->Username=USERNAME;
				$mail->Password=USERPASSWORD;
				$mail->SetFrom=SETFROM;
				$mail->Subject = "AERE course reminding you are already registered";
				$mail->Body = "<img src='http://allinstitute-dev.demobyopeneyes.com/email/emailimage/emaillogo.jpg' style='height:80px; width:180px;' > <br><br><br>
					Dear $FirstName, <br/><br/>
				
					Here your are registered for: <b>$Title</b><br><br>
					
					Your course start will be at: $StartDate<br><br>
					
					If you need to make any changes to this, please do not hesitate to 
					contact us at Manny@AERExperts.com or simply reply and someone will get back
					to you soon.<br><br>
					
					<b>Thank you,</b><br>
					<b>AERE Team</b>";
				$mail->AddAddress($email);
				if(!$mail->Send())
				{
					echo "Mailer Error: " . $mail->ErrorInfo;
				}
				else
				{
					//echo"<script>alert('Message has been sent');</script>";
					  echo "mail send<br>";
				}
		}
		 
	}
	
}	


exit;


?>

</table>
