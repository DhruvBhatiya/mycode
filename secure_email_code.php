<?php
//    require('constant.php');
   if(isset($_POST["submit"])){
   $fromemail="technical@saicomputer.com";
   // Checking For Blank Fields..
   
   if (isset($_POST['g-recaptcha-response'])) {
   		
   		// require('component/recaptcha/src/autoload.php');		
   		
		//    $recaptcha = new \ReCaptcha\ReCaptcha(SECRET_KEY, new \ReCaptcha\RequestMethod\SocketPost());
		   
   		$verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.SECRET_KEY.'&response='.$_POST['g-recaptcha-response']);
		   // $resp = $recaptcha->verify($_POST['g-recaptcha-response'], $_SERVER['REMOTE_ADDR']);
		   
		   $resp = json_decode($verifyResponse);
   
   		  if (!$resp->success) {
   				$output = "Invalid Captcha";
   				echo "<span style='font-size:16px;color:red'>".$output."</span>";
   				//die($output);				
   		  }	else{
   			if($_POST["fname"]==""||$_POST["pickup"]==""||$_POST["country-code"]==""||$_POST["phone"]==""||$_POST["subject"]==""||$_POST["email"]==""||$_POST["message"]==""){
   		echo "Fill All Fields..";
   	}else{
   // Check if the "Sender's Email" input field is filled out
		$receiver=$_POST["pickup"];
		if($receiver=="Rider"){
			$toEmail="palak@saicomputer.com";
   
		}
		else if($receiver=="Fleet Owner"){
			$toEmail="dhruvcomputers11@gmail.com";
		}
		else if($receiver=="Dealer"){
			$toEmail="technical@saicomputer.com";
		}
		else if($receiver=="Corporate Customer"){
			$toEmail="technical@saicomputer.com";
		}
		else if($receiver=="Institutional Customer"){
			$toEmail="technical@saicomputer.com";
		}
		else if($receiver=="Government Agency"){
			$toEmail="technical@saicomputer.com";
		}
		else if($receiver=="Ride Hailing Companies"){
			$toEmail="technical@saicomputer.com";
		}
		else if($receiver=="Contractor"){
			$toEmail="technical@saicomputer.com";
		}
		else if($receiver=="Courier Companies"){
			$toEmail="technical@saicomputer.com";
		}
		else if($receiver=="Shipping Companies"){
			$toEmail="technical@saicomputer.com";
		}
		else if($receiver=="Logistics Companies"){
			$toEmail="technical@saicomputer.com";
		}
		else if($receiver=="Financial Institutions"){
			$toEmail="technical@saicomputer.com";
		}
		else if($receiver=="Manufacturer"){
			$toEmail="technical@saicomputer.com";
		}
		else if($receiver=="Supplier"){
			$toEmail="technical@saicomputer.com";
		}
		else if($receiver=="Candidate"){
			$toEmail="technical@saicomputer.com";
		}



		echo $toEmail;
   		$email=$_POST['email'];
   // Sanitize E-mail Address
   		$email =filter_var($email, FILTER_SANITIZE_EMAIL);
   // Validate E-mail Address
   		$email= filter_var($email, FILTER_VALIDATE_EMAIL);
   		if (!$email){
   			echo "Invalid Sender's Email";
   		}
   		else{
			$countrycode = $_POST['country-code'];
   			$phone = $_POST['phone'];
			   $message = $_POST['message'];
			   $subject=$_POST['subject'];
   $body = 'Name: ' . $_POST["fname"] . "\n\n" . 'I am a: ' . $_POST["pickup"] . "\n\n" . 'Email: ' . $email . "\n\n" . 'country-code: ' . $countrycode . "\n\n" . 'Phone: ' . $phone . "\n\n" . 'Subject: ' . $subject . "\n\n" . 'Message: ' . $message;
   	$mailHeaders  = 'MIME-Version: 1.0' . "\r\n";
   	$mailHeaders .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
   	$mailHeaders .= "To:".$toEmail."\r\n";
   	$mailHeaders .= "From:Dag<".$fromemail.">\r\n";
   	$mailHeaders .= "Reply-To: ".$fromemail."\r\n";
   	$mailHeaders .= "Return-Path: ".$fromemail."\r\n";
   	$mailHeaders .= "CC: ".$fromemail."\r\n";
   	$mailHeaders .= "BCC: ".$fromemail."\r\n";
	   $body = "<table width='650' cellspacing='0' cellpadding='0' border='0' style='border:3px solid #dcdcdc; background-color:#f1f1f1; font-family:Verdana,Arial,Helvetica,sans-serif; font-size:12px;'>";
	   $body .= "<tr><td><table width='650' border='0' cellpadding='0' cellspacing='0' style='font-family:Verdana,Arial,Helvetica,sans-serif; font-size:12px; background-color:#f1f1f1'>";
	   $body .= "<tr><td style='PADDING-LEFT:20px;PADDING-BOTTOM:10px;PADDING-RIGHT:20px;PADDING-TOP:10px;'>";
	   $body .= "<br />Thank you for contacting us";
	   $body .= "</p><table width='100%' align='center' cellspacing='5' cellpadding='5' border='0' style='background:#ffffff; border-style:solid; line-height:20px;font-family:Verdana,Arial,Helvetica,sans-serif; font-size:12px;'>";
	   $body .= "<tr><td colspan='2' align='center' style='background:#02aff3;'><b style='color:#FFFFFF' >Your Details</b></td>";
	   $body .= "</tr><tr><td>Name:</td><td>".$_POST["fname"]."</td>";
$body .= "</tr><tr><td>Email:</td><td>".$_POST["email"]."</td>";
$body .= "</tr><tr><td>I am a: :</td><td>".$_POST["pickup"]."</td>";
$body .= "</tr><tr><td>Email: :</td><td>".$email."</td>";
$body .= "</tr><tr><td>Phone: :</td><td>".$countrycode." ".$phone."</td>";
$body .= "</tr><tr><td>Subject: :</td><td>".$subject."</td>";
$body .= "</tr><tr><td>Message:</td><td>".$message."</td></tr>";

	   
	   $body .= "</table></td></tr>";
	   $body .= "<tr><td style='PADDING-LEFT:20px;PADDING-BOTTOM:10px;PADDING-RIGHT:20px;PADDING-TOP:10px;'>Dag will get in touch with you.</td><tr></table></td> </tr></table>";
	   
   // Send Mail By PHP Mail Function
   mail($toEmail, "Contact Mail from dag", $body, $mailHeaders);
   echo " Thank you <b> ".$_POST["fname"]." </b> for your feedback ! We will get back to you soon...";
   }
   }
   
   		  }
   		  
   	}
   	}
   ?>