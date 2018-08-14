<script type="text/javascript" src="js/plugins/jquery/jquery.min.js"></script>
<?php
session_start();
include 'connect.php';
$MODE=MODE;
include 'functions.php';
if(isset($_REQUEST['login']))
{
   $un=$_REQUEST['username'];
   $pass=$_REQUEST['password'];
   $sql="select * from admin where `username`='$un' and `password`='$pass'";
   $res=  c_query($sql);
   $count=  mysql_num_rows($res);
   if($count > 0)
   {
       $_SESSION['user']=$un;
       //header('location:view_Registration.php');
       header('location:dashboard.php');
       
   }
 else {
    ?>
						
	<script>
		  $( document ).ready(function() {
            $('#wrong').attr('style','display:block;');
		setTimeout(function() {
            $('#wrong').attr('style','display:none;');  
            }, 10000);
});
					
    </script>	
    
    
  
	<?php
   }
}   
?>
<html lang="en">
    <head>        
        <!-- META SECTION -->
        <title>ALL-Institute</title>            
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <!-- <link rel="icon" href="favicon.png" type="image/x-icon" />-->
        <link rel="icon" href="favicon.png" type="image/x-icon" />
        <!-- <link rel="apple-touch-icon" href="img/favicon-apple.png"> -->
        <!-- END META SECTION -->

        <!-- CSS INCLUDE -->        
        <style>
            .man{width: 33.33%;margin: 0 auto;margin-top: 150px;}
            .man h1{text-align: center;}
        </style>
       <link rel="stylesheet" type="text/css" id="theme" href="css/theme-default.css"/>
       
    </head>
    <body>

        <div class="login-container">
        <div class="<?php echo $MODE; ?>"></div>
            <div class="login-box animated fadeInDown">
                <div class="login-logo"></div>
                <div class="login-body">
                    <div class="login-title"><strong>Welcome</strong>, to ALL Institute Admin area.
					<p>Please be here only if you have admin rights!</p>
                    </div>
                    
                    <center><div class="alert alert-danger" id="wrong" style="width:100%; margin:0px 0px 10px 0px;display:none">
									<strong>Your username or password is wrong!</strong>
								</div>	  
						</center>

                    <form action="" class="form-horizontal" method="post">
                    <div class="form-group">
                        <div class="col-md-12">
                            <input class="form-control" name="username" placeholder="Username" type="text">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <input class="form-control" name="password" placeholder="Password" type="password">
                        </div>
                    </div>
                    <div class="form-group">
                        
                        <div class="col-md-12 text-center">
                            <button type="submit" name="login"  class="btn btn-info btn-block">Log In</button>
                        </div>
                    </div>
                    </form>
                </div>
                
            </div>
            
        </div>
       <!-- END MESSAGE BOX-->

        <!-- START PRELOADS -->
        <!-- <audio id="audio-alert" src="audio/alert.mp3" preload="auto"></audio>
        <audio id="audio-fail" src="audio/fail.mp3" preload="auto"></audio> -->
        <!-- END PRELOADS -->             

        <!-- START SCRIPTS -->
        <!-- START PLUGINS -->
        
        <script type="text/javascript" src="js/plugins/jquery/jquery-ui.min.js"></script>
        <script type="text/javascript" src="js/plugins/bootstrap/bootstrap.min.js"></script>        
        <!-- END PLUGINS -->

        <!-- START THIS PAGE PLUGINS-->        
        <script type='text/javascript' src='js/plugins/icheck/icheck.min.js'></script>        
        <script type="text/javascript" src="js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>
        <script type="text/javascript" src="js/plugins/scrolltotop/scrolltopcontrol.js"></script>
        
      
        <script type="text/javascript" src="js/plugins/rickshaw/d3.v3.js"></script>
        <script type="text/javascript" src="js/plugins/rickshaw/rickshaw.min.js"></script>
        <script type='text/javascript' src='js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js'></script>
        <script type='text/javascript' src='js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js'></script>                
        <script type='text/javascript' src='js/plugins/bootstrap/bootstrap-datepicker.js'></script>                
        <script type="text/javascript" src="js/plugins/owl/owl.carousel.min.js"></script>                 
        
        <script type="text/javascript" src="js/plugins/moment.min.js"></script>
        <script type="text/javascript" src="js/plugins/daterangepicker/daterangepicker.js"></script>
        <!-- END THIS PAGE PLUGINS-->        

        <!-- START TEMPLATE -->
     
        
        <script type="text/javascript" src="js/plugins.js"></script>        
        <script type="text/javascript" src="js/actions.js"></script>   
      
        <!-- END TEMPLATE -->
        <!-- END SCRIPTS -->                   
    </body>
</html>