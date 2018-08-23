<?php
/**
 * CodeIgniter Log Library
 *
 * @category   Applications
 * @package    CodeIgniter
 * @subpackage Libraries
 * @author     Bo-Yi Wu <appleboy.tw@gmail.com>
 * @license    BSD License
 * @link       http://blog.wu-boy.com/
 * @since      Version 1.0
 */

//require_once 'log4php/Logger.php'; 

//Logger::configure('multiple.xml');  // ### add xml
class Lib_log
{
    /**
     * ci
     *
     * @param instance object
     */
    private $_ci;

    /**
     * log table name
     *
     * @param string
     */
    private $_log_table_name;
    public $log; // ### changes
    public $logdb; // ### changes

    public $levels = array(
        E_ERROR             => 'Error',
        E_WARNING           => 'Warning',
        E_PARSE             => 'Parsing Error',
        E_NOTICE            => 'Notice',
        E_CORE_ERROR        => 'Core Error',
        E_CORE_WARNING      => 'Core Warning',
        E_COMPILE_ERROR     => 'Compile Error',
        E_COMPILE_WARNING   => 'Compile Warning',
        E_USER_ERROR        => 'User Error',
        E_USER_WARNING      => 'User Warning',
        E_USER_NOTICE       => 'User Notice',
        E_STRICT            => 'Runtime Notice',
        E_RECOVERABLE_ERROR => 'Catchable error',
        E_DEPRECATED        => 'Runtime Notice',
        E_USER_DEPRECATED   => 'User Warning'
    );

    /**
     * constructor
     *
     */
    public function __construct()
    {
        
       // $this->_ci =& get_instance();

     //   $this->_ci =& get_instance();
        set_error_handler(array($this, 'error_handler'));
          
        set_exception_handler(array($this, 'exception_handler'));
       
        $this->logdb = Logger::getLogger('dberror');// for db log

    
    }

    /**
     * PHP Error Handler
     *
     * @param   int
     * @param   string
     * @param   string
     * @param   int
     * @return void
     */
    public function error_handler($severity, $message, $filepath, $line)
    {
        $data = array(
            'errno' => $severity,
            'errtype' => isset($this->levels[$severity]) ? $this->levels[$severity] : $severity,
            'errstr' => $message,
            'errfile' => $filepath,
            'errline' => $line,
            //'user_agent' => $this->_ci->input->user_agent(),
            //'ip_address' => $this->_ci->input->ip_address(),
            'time' => date('Y-m-d H:i:s')
        );
       
        self::setCustomMsg(array('errfile'=>$data['errfile'],'errline'=>$data['errline'],'errtype'=>$data['errtype']));
        $this->logdb->fatal($data['errstr']. " at line no ".$data['errline']. " in ".$data['errfile']. " file"); //### db log
       
        require_once('email/class.phpmailer.php');
									$mail = new PHPMailer(); // create a new object
									$mail->IsSMTP(); // enable SMTP
									$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
									$mail->SMTPAuth = true; // authentication enabled
									$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
								//	$mail->Host = "smtp.gmail.com";
								    $mail->Host = "mail.uatbyopeneyes.com";
									$mail->Port = 465; // or 587
									$mail->IsHTML(true);
									$mail->FromName="AERE - All Institute Learning Institute"; 
								// 	$mail->Username="noreply.allinstitute@gmail.com";
								// 	$mail->Password="@ere1234";
								// 	$mail->SetFrom="noreply.allinstitute@gmail.com";
									$mail->Username="noreply.allinstitute@uatbyopeneyes.com";
									$mail->Password="@ere1234";
									$mail->SetFrom="noreply.allinstitute@uatbyopeneyes.com";

									$mail->Subject = "All-Institute errors detail";
									$mail->Body = "<img src='http://allinstitute-dev.demobyopeneyes.com/email/emailimage/emaillogo.jpg' style='height:80px; width:180px;' > <br><br><br>
									Hello, <br/><br>
									
                                        Errors accurs in All-Institute site.<br><br>
                                        
                                       <b></b> 
                                        <b>$message, at line no</b>
                                        <b> $line, in</b>
                                        <b>$filepath file</b>
                                        
											
										<br/><br/><br/><br/>
										
										Kind Regards, <br/>
										Thank You,<br/>
										<b>Our web Team</b> <br/>";
									$mail->AddAddress("mitesh.patel@theopeneyes.in");
									
									if(!$mail->Send())
									{
                   // echo "Mailer Error: " . $mail->ErrorInfo;
                                        echo "wrong";
                                    }
                                  
									


    }
    public static $custom_msg;
    public static function setCustomMsg($msg){
        self::$custom_msg = $msg;
      
    }

    public static function getCustomMsg(){
      
        return self::$custom_msg;
      
    }
    /**
     * PHP Error Handler
     *
     * @param   object
     * @return void
     */
    public function exception_handler($exception)
    {
        $data = array(
            'errno' => $exception->getCode(),
            'errtype' => isset($this->levels[$exception->getCode()]) ? $this->levels[$exception->getCode()] : $exception->getCode(),
            'errstr' => $exception->getMessage(),
            'errfile' => $exception->getFile(),
            'errline' => $exception->getLine(),
          //  'user_agent' => $this->_ci->input->user_agent(),
           // 'ip_address' => $this->_ci->input->ip_address(),
            'time' => date('Y-m-d H:i:s')
        );

        self::setCustomMsg(array('errfile'=>$data['errfile'],'errline'=>$data['errline'],'errtype'=>$data['errtype']));
        $this->logdb->fatal($data['errstr']. ", at line no ".$data['errline']. " in ".$data['errfile']. " file"); //### db log
      
    }
}

/* End of file Lib_log.php */
