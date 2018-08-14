<link rel="stylesheet" href="css_new/all_ins.css">
<style>
	.d-form {
		margin-top: -13px;
	}
</style>
<script type='text/javascript' src="js/jquery-2.1.1.min.js"></script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119991718-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-119991718-1');
</script>

<script>
$(".navbar-toggle").click(function() {  
    $(this).toggleClass("active_toggle");   
  });
</script>
<footer class="footer" id="footer" role="contentinfo">
	<div id="inner-footer" class="container cf">
		<div class="row">
			<div class=" col-md-4 col-sm-4">
				<!--<div class="source-org copyright cf"><span>&copy; 2015. All Rights Reserved. </span>
                  <ul id="menu-terms" class="terms-nav terms-links">
            <li id="menu-item-484" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-484"><a href="http://elearning.tritraining.com.au" onclick="__gaTracker('send', 'event', 'outbound-widget', 'http://elearning.tritraining.com.au', 'eLearning Login');">eLearning Login</a></li>
            <li id="menu-item-471" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-471"><a href="terms-and-conditions/index.php">*^Terms and Conditions</a></li>
            <li id="menu-item-521" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-521"><a href="policies-and-procedures/index.php">Policies and Procedures</a></li>
            <li id="menu-item-474" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-474"><a href="audit-information/index.php">Audit Info &#038; Partnering Agencies</a></li>
          </ul>
                </div>-->

				<nav role="navigation" class="hom">
					<ul id="menu-footer" class="footer-nav footer-links cf footernavi">
						<!-- <div class="m-all t-all hot d-1of2 footer-logo"> <img src="image/footer-logo.png"> </div>
          

  <li id="menu-item-145" class="m-all t-all hot d-1of3">
                      <h3 class="heading">Our Story</h3>
                      <ul class="sub-menu ">
                <li id="menu-item-153" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-153"><a href="#">Assessment Services</a></li>
                <li id="menu-item-154" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-154"><a href="#">Educational Services</a></li>
                <li id="menu-item-155" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-155"><a href="#">Research Services</a></li>
              </ul>
                    </li>

-->
						<li id="menu-item-42" class="m-all t-all hot d-1of2">
							<h3 class="heading">Contact Us</h3>
							<ul class="sub-menu">
								<li id="menu-item-153" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-153"><i class="fa fa-home fa-footer"></i>Gaithersburg, MD 20879 , Located only 23 &nbsp;&nbsp;<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;miles away from Washington, DC </li>
								<li id="menu-item-154" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-154"><i class="fa fa-phone fa-footer"></i><a href="tel:443-716-8075">443-716-8075</a>
								</li>
								<li id="menu-item-155" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-155"><i class="fa fa-envelope fa-footer"></i><a href="mailto:manny@aerexperts.com">manny@aerexperts.com</a>
								</li>
								<li id="menu-item-155" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-155"><i class="fa fa-globe fa-footer"></i><a href="http://www.aerexperts.com" target="_blank">www.aerexperts.com</a>
								</li>
							</ul>
						</li>
					</ul>

				</nav>
			</div>

			<div class="col-md-8 col-sm-8 footer-form">
				<p class="form-msg padding_0">Send us a short message</p>
				<div id="message" class="messagediv"></div>

				<?php
				$FROMNAME=FROMNAME;
				$USERNAME=USERNAME;
				$USERPASSWORD=USERPASSWORD;
				$SETFROM=SETFROM;
				$SETTO=SETTO;
				

				if ( isset( $_POST[ 'send' ] ) ) {
					$fname = $_POST[ 'fname' ];


					$contact = $_POST[ 'contact' ];
					$email = $_POST[ 'email' ];
					$remark = $_POST[ 'remark' ];
					$code = $_POST[ 'code' ];


					session_start();
					if ( strcmp( $_SESSION[ 'code' ], $_POST[ 'code' ] ) != 0 ) {
						// $errors["code"]="You entered Wrong Captcha Code";
						echo " <script>
       $('html, body').animate({
        scrollTop: $('#footer').offset().top
        }, 2000);
       
				
       </script>";
						?>

				<div class="alert alert-danger messageclass" id="insert_not_contact_code" style="width:100%">
					<strong>Your record was not inserted because your captcha code is wrong.</strong>
				</div>


				<script>
					setTimeout( function () {
						$( '#insert_not_contact_code' ).fadeOut( 'hide' );
					}, 10000 );
				</script>
				<?php
				} 
				else 
				{

					//$arr = array("blue","red","green","yellow");
					$m=str_replace("'","\'",$remark);

					$insert = mysql_query( "insert into tblcontact(FirstName,Contact,Email,Remark)
						values('$fname','$contact','$email','$m')" );

					//var_dump($insert);
					//exit;

					if ($insert)
					 {
						?>


				<?php 
							
							       require_once('email/class.phpmailer.php');
									$mail = new PHPMailer(); // create a new object
									$mail->IsSMTP(); // enable SMTP
									$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
									$mail->SMTPAuth = true; // authentication enabled
									$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
									$mail->Host = "smtp.gmail.com";
									$mail->Port = 465; // or 587
									$mail->IsHTML(true);
									$mail->FromName=FROMNAME; 
									$mail->Username=USERNAME;
									$mail->Password=USERPASSWORD;
									$mail->SetFrom=SETFROM;
									

									$mail->Subject = "All-Institute user visited details";
									$mail->Body = "<img src='http://allinstitute-dev.demobyopeneyes.com/email/emailimage/emaillogo.jpg' style='height:80px; width:180px;' > <br><br><br>
									Hello, <br/><br>
									
										Please find below details for user visited All-Institute site.<br><br>
										
										<b>Email ID</b>: $email<br/>
									    <b>Name</b>: $fname<br/>
										<b>Contact number</b>: $contact<br/>
										<b>Remarks</b>: $remark <br/>
										
										<br/>
										
										Kind Regards, <br/>
										Thank You,<br/>
										<b>Our web Team</b> <br/>";
									$mail->AddAddress($SETTO);
									
									if(!$mail->Send())
									{
                   // echo "Mailer Error: " . $mail->ErrorInfo;
										echo " <script>
										$('html, body').animate({
										scrollTop: $('#footer').offset().top
										}, 2000);
										
										
										</script>";
									?>

										<div class="alert alert-danger messageclass" id="insert_not_contact" style="width:100%">
											<strong>Your Email Id is wrong.</strong>
										</div>
										<script>
											setTimeout( function () {
												$( '#insert_not_contact' ).fadeOut( 'hide' );
											}, 10000 );
										</script>

										<?php
										}
										else 
										{
															echo " <script>
											$('html, body').animate({
												scrollTop: $('#footer').offset().top
												}, 2000);
											
														
											</script>";
															?>

														<div class="alert alert-success messageclass" id="insert_contact" style="width:100%">
															<strong>Thank you for your note. We will contact you within 3 business days.</strong>
														</div>
														<script>
															setTimeout( function () {
																$( '#insert_contact' ).fadeOut( 'hide' );
															}, 10000 );
														</script>
														<?php

														//	echo ("<script>alert('record inserted...!');</script>");	
											}

					}

					else
					{
						echo " <script>
						$('html, body').animate({
							scrollTop: $('#footer').offset().top
							}, 2000);
						
									
						</script>";
										?>

									<div class="alert alert-danger messageclass" id="insert_not_rec" style="width:100%">
										<strong>Your record was not inserted.</strong>
									</div>
									<script>
										setTimeout( function () {
											$( '#insert_not_rec' ).fadeOut( 'hide' );
										}, 10000 );
									</script>
									<?php

					}



		}



	}

				?>

				<div class="row">

					<div class='gf_browser_unknown gform_wrapper' id='gform_wrapper_6'>
						<form method="post" enctype="multipart/form-data">
							<div class="col-md-6 col-sm-6">
								<ul id="gform_fields_6" class="gform_fields top_label form_sublabel_below description_below">
									<li id="field_6_1" class="gfield gfield_contains_required field_sublabel_below field_description_below">
										<label class="gfield_label" for="input_6_1">First name<span class="gfield_required">*</span></label>
										<div class="ginput_container">
											<input name="fname" class="large" placeholder="* Your name" type="text" maxlength="50" required oninvalid="this.setCustomValidity('Please enter your name')" oninput="setCustomValidity('')">
										</div>
									</li>
									<li id="field_6_4" class="gfield field_sublabel_below field_description_below">
										<label class="gfield_label" for="input_6_2">Phone</label>
										<div class="ginput_container">
											<input name="contact" class="large" maxlength="14" minlength="10" placeholder="* Phone number" type="text" pattern="[0-9\-\s]+" required oninvalid="this.setCustomValidity('Please enter your phone number in xxx-xxx-xxxx format')" oninput="setCustomValidity('')">
										</div>
									</li>
									<li id="field_6_3" class="gfield gfield_contains_required field_sublabel_below field_description_below">
										<label class="gfield_label" for="input_6_3">Email<span class="gfield_required">*</span></label>
										<div class="ginput_container">
											<input name="email" class="large" placeholder="* Email" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$" type="email" maxlength="50" required oninvalid="this.setCustomValidity('Please enter a valid email address')" oninput="setCustomValidity('')">
										</div>
									</li>

								</ul>

							</div>

							<div class="col-md-6 col-sm-6">
								<div class="ginput_container">
									<textarea name="remark" placeholder="* Remarks" required oninvalid="this.setCustomValidity('Please enter your remarks')" oninput="setCustomValidity('')"></textarea>

								</div>
								<tr>
									<div class="ginput_container">
										<input name="code" id="code" class="large" required maxlength="6" placeholder="* Enter below code here" type="text" required oninvalid="this.setCustomValidity('Please type the below code')" oninput="setCustomValidity('')">
										<?php
										if ( isset( $errors[ "code" ] ) ) {
											echo $errors[ "code" ];
										}
										?>
									</div>
								</tr>
							</div>

							<div class="col-md-6 col-sm-6 pull-sm-right">
								<tr>


								<td>
								<img src="generatecaptcha.php?rand=<?php echo rand(); ?>" style="margin-top:10px;" id="im">
<div class="clearfix"></div>
								<a href='javascript:ref();' style="margin-top:5px;    float: left;
margin-right: 0;">
			<h3 style="margin-top: 0; font-weight: 600;"> Refresh</h3>
			</a><div class="clearfix"></div>

								<script language="javascript">
									function ref() {
										var img = document.images[ 'im' ];

										img.src = img.src.substring( 0, img.src.lastIndexOf( "?" ) ) + "?rand=" + Math.random() * 1000;
									}
								</script>

							</td>

								</tr>


							</div>
							<div class="clearfix visible-xs"></div>
							<div class="col-md-6 pull-left">
								<li>
									<div class="m-all t-all hot d-1of2">
										<input class="gform_button button sbutton" value="Send" type="submit" name="send"/>
									</div>
								</li>
							</div>
							<div class="clearfix"></div>
						</form>
					</div>

				</div>

			</div>
</footer>
<div class="copyright Provided-by">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12 design">Provided by <a href="http://www.aerexperts.com/" target="_blank"> Assessment, Education & Research Experts</a>
			</div>

		</div>
	</div>
</div>
<div class="clearfix"></div>
<div class="copyright">
	<div class="container">
		<div class="row">

			<div class="col-md-12 col-sm-12 design "> Powered by <a style="color:white" ; href="http://www.theopeneyes.com/" target="_blank">OpenEyes Technologies, Inc.</a>
			</div>
		</div>
	</div>
</div>

<style>
	.copyright {
		background: #444442; margin-top:-1px!important;
		color: #fff;
		font-size: 13px;
		margin: 0;
		padding: 5px 0;
		position: relative;
		text-align: center;
	}
	
	.copyright .design a {
		color: #fff;
	}
	
	.Provided-by .design a,
	.Provided-by {
		font-size: 14px;
		line-height: 16px;
	}
	.pull-sm-right{float: right;}
</style>