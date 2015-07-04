<?php

function spamcheck($field) {
	// Sanitize e-mail address
	$field=filter_var($field, FILTER_SANITIZE_EMAIL);
	// Validate e-mail address
	if(filter_var($field, FILTER_VALIDATE_EMAIL)) {
    	return TRUE;
	} else {
    	return FALSE;
	}
}

if (isset($_POST["submit"])) {
	$mailcheck = spamcheck($_POST["email"]);
	    if ($mailcheck==FALSE) { //don't send email and display invalid email address page
	    	$invalidEmail = <<<EOD
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dermatrials Research | Invalid Email Address</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
    
    <!-- Custom styles for this template -->
    <link href="jumbotron-narrow.css" rel="stylesheet">
    
    <!-- FancyBox -->
    <link rel="stylesheet" href="assets/plugins/fancybox/source/jquery.fancybox.css" type="text/css" media="screen" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    <style>
		
    </style>
    
    <!-- XS-Header Style -->
    <link rel="stylesheet" href="assets/css/xsstyle.css" type="text/css" media="screen" />
    
  </head>
  <body id="top">
  	<!-- XS Header -->
      <!--<div class="visible-xs" style="margin-bottom:40px;">
        <navheader>
		  <navbutton class="navright">
			  <div class="navlabel"><span class="glyphicon glyphicon-th-list"></span> Menu</div>
		  </navbutton>
	      <navh1>Dermatrials Research</navh1>
	    </navheader>
      </div>-->
    
    <div class="container">
      
      <div class="alert alert-danger"><strong>Failed!</strong> Email invalid. <a href="index.html" class="fadelink">Try Again</a> with a different email address. </div>

    </div> <!-- /container -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    
    <!-- Fade between pages -->
	<script>
		$(document).ready(function() {

		$('body').css('display', 'none');
		
		$('body').fadeIn(500);
		
		
		
		$('.fadelink').click(function(event) {
		
		event.preventDefault();
		
		newLocation = this.href;
		
		$('body').fadeOut(500, newpage);
		
		});
		
		
		
		function newpage() {
		
		window.location = newLocation;
		
		}
		
		});
	</script>
    
	<script type="text/javascript" src="assets/plugins/fancybox/source/jquery.fancybox.pack.js"></script>
	
  </body>
</html>
EOD;
	    	echo "$invalidEmail";
	    } else { //gather data and send email
	    	//Subject and email variables
	    		//For the recruiter
					$recruiterSubject = 'A patient would like to register for an active study.';
					$recruiterEmail = 'recruit@dermatrials.com';
				//For the patient
					$patientSubject = 'Thank you for requesting to register for an active study at Dermatrials Research Inc.';
					
			//Gathering patient data from form for variables
				$first = $_POST['first'];
				$last = $_POST['last'];
				$email = $_POST['email'];
				$home = $_POST['home'];
				$cell = $_POST['cell'];
				$street = $_POST['street'];
				$city = $_POST['city'];
				$province = $_POST['province'];
				$postalcode = $_POST['postalcode'];
				$reason = $_POST['reason'];
				
			//Setting the body 
				//Of the email sent to the recruiter
					$recruiterBody = <<<EOD
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>A patient would like to register for an active study.</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
    
    <!-- Custom styles for this template -->
    <style>
    /* Space out content a bit */
	body {
	  padding-top: 20px;
	  padding-bottom: 20px;
	}
	
	/* Everything but the jumbotron gets side spacing for mobile first views */
	.header,
	.marketing,
	.footer {
	  padding-right: 15px;
	  padding-left: 15px;
	}
	
	/* Custom page header */
	.header {
	  border-bottom: 1px solid #e5e5e5;
	}
	/* Make the masthead heading the same height as the navigation */
	.header h3 {
	  padding-bottom: 19px;
	  margin-top: 0;
	  margin-bottom: 0;
	  line-height: 40px;
	}
	
	/* Custom page footer */
	.footer {
	  padding-top: 19px;
	  color: #777;
	  border-top: 1px solid #e5e5e5;
	}
	
	/* Customize container */
	@media (min-width: 768px) {
	  .container {
	    max-width: 730px;
	  }
	}
	.container-narrow > hr {
	  margin: 30px 0;
	}
	
	/* Main marketing message and sign up button */
	.jumbotron {
	  text-align: center;
	  border-bottom: 1px solid #e5e5e5;
	}
	.jumbotron .btn {
	  padding: 14px 24px;
	  font-size: 21px;
	}
	
	/* Supporting marketing content */
	.marketing {
	  margin: 40px 0;
	}
	.marketing p + h4 {
	  margin-top: 28px;
	}
	
	/* Responsive: Portrait tablets and up */
	@media screen and (min-width: 768px) {
	  /* Remove the padding we set earlier */
	  .header,
	  .marketing,
	  .footer {
	    padding-right: 0;
	    padding-left: 0;
	  }
	  /* Space out the masthead */
	  .header {
	    margin-bottom: 30px;
	  }
	  /* Remove the bottom border on the jumbotron for visual effect */
	  .jumbotron {
	    border-bottom: 0;
	  }
	}
    </style>

  </head>
  <body id="top">
    
    <div class="container">

      <div class="jumbotron">
        <h1>Hello!</h1>
        <p class="lead">A patient would like to register for an active study. Below are their contact details and information:</p>
        <p><a class="btn btn-lg btn-primary" href="mailto:$email" role="button">Reply to Patient</a></p>
      </div>

      <div class="row marketing">
        <div class="col-lg-12">
          <h2>Patient Details</h2><br />
        </div>
        <div class="col-lg-12">
        	<address>
			  <strong>$first $last</strong><br><br>
			  
			  $street<br>
			  $city, $province<br>
			  <span style="text-transform:uppercase;">$postalcode</span><br><br>
			  
			  Home Phone Number: $home<br>
			  Cell Phone Number: $cell<br>
			  Email: <a href="mailto:$email">$email</a><br><br>
			  
			  Reason for contacting: <p>$reason</p><br>
			</address>
        </div>
      </div>

      <div class="footer">
      	<p align="center">This message was sent automatically using the active study registration form at <a href="http://dermatrials.com/">dermatrials.com</a></p>
      </div>

    </div> <!-- /container -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
	
  </body>
</html>
EOD;
					//$recruiterBody .= "Content-type: text/html\r\n";
				//Of the email sent to the patient
					$patientBody = <<<EOD
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>A patient would like to register for an active study.</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
    
    <!-- Custom styles for this template -->
    <style>
    /* Space out content a bit */
	body {
	  padding-top: 20px;
	  padding-bottom: 20px;
	}
	
	/* Everything but the jumbotron gets side spacing for mobile first views */
	.header,
	.marketing,
	.footer {
	  padding-right: 15px;
	  padding-left: 15px;
	}
	
	/* Custom page header */
	.header {
	  border-bottom: 1px solid #e5e5e5;
	}
	/* Make the masthead heading the same height as the navigation */
	.header h3 {
	  padding-bottom: 19px;
	  margin-top: 0;
	  margin-bottom: 0;
	  line-height: 40px;
	}
	
	/* Custom page footer */
	.footer {
	  padding-top: 19px;
	  color: #777;
	  border-top: 1px solid #e5e5e5;
	}
	
	/* Customize container */
	@media (min-width: 768px) {
	  .container {
	    max-width: 730px;
	  }
	}
	.container-narrow > hr {
	  margin: 30px 0;
	}
	
	/* Main marketing message and sign up button */
	.jumbotron {
	  text-align: center;
	  border-bottom: 1px solid #e5e5e5;
	}
	.jumbotron .btn {
	  padding: 14px 24px;
	  font-size: 21px;
	}
	
	/* Supporting marketing content */
	.marketing {
	  margin: 40px 0;
	}
	.marketing p + h4 {
	  margin-top: 28px;
	}
	
	/* Responsive: Portrait tablets and up */
	@media screen and (min-width: 768px) {
	  /* Remove the padding we set earlier */
	  .header,
	  .marketing,
	  .footer {
	    padding-right: 0;
	    padding-left: 0;
	  }
	  /* Space out the masthead */
	  .header {
	    margin-bottom: 30px;
	  }
	  /* Remove the bottom border on the jumbotron for visual effect */
	  .jumbotron {
	    border-bottom: 0;
	  }
	}
    </style>

  </head>
  <body id="top">
    
    <div class="container">

      <div class="jumbotron">
        <h1>$first $last,</h1>
        <p class="lead">Thank you for requesting to register for an active study at Dermatrials Research Inc.</p>
        <p class="lead">This email confirms a message was successfully sent to recruit@dermatrials.com.</p>
        <p class="lead">You will be contacted by phone or email regarding your application if you can be considered for a study.</p>
        <p><a class="btn btn-lg btn-primary" href="http://dermatrials.com/" role="button">Go to dermatrials.com</a></p>
      </div>

      <div class="row marketing">
      </div>

      <div class="footer">
      	<p align="center">This message was sent automatically using the active study registration form at <a href="http://dermatrials.com/">dermatrials.com</a></p>
      </div>

    </div> <!-- /container -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
	
  </body>
</html>
EOD;
					//$patientBody .= "Content-type: text/html\r\n";
			//Setting the headers 
				//For the recruiter email
					$recruiterHeader = "From: $first $last <$email>\r\n";
					$recruiterHeader .= "Content-type: text/html\r\n";
				//For the patient
					$patientHeader = "From: Dermatrials Research Recruitment <$recruiterEmail>\r\n";
					$patientHeader .= "Content-type: text/html\r\n";
				
			//Actually sending the emails
				//To Recruiter
					$recruiterSucsess = mail($recruiterEmail, $recruiterSubject, $recruiterBody, $recruiterHeader);
				//To patient to confirm
					$patientSuccess = mail($email, $patientSubject, $patientBody, $patientHeader);
				
			//Display success page
				$successPage = <<<EOD
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Thank you for registering!</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
    
    <!-- Custom styles for this template -->
    <style>
    /* Space out content a bit */
	body {
	  padding-top: 20px;
	  padding-bottom: 20px;
	}
	
	/* Everything but the jumbotron gets side spacing for mobile first views */
	.header,
	.marketing,
	.footer {
	  padding-right: 15px;
	  padding-left: 15px;
	}
	
	/* Custom page header */
	.header {
	  border-bottom: 1px solid #e5e5e5;
	}
	/* Make the masthead heading the same height as the navigation */
	.header h3 {
	  padding-bottom: 19px;
	  margin-top: 0;
	  margin-bottom: 0;
	  line-height: 40px;
	}
	
	/* Custom page footer */
	.footer {
	  padding-top: 19px;
	  color: #777;
	  border-top: 1px solid #e5e5e5;
	}
	
	/* Customize container */
	@media (min-width: 768px) {
	  .container {
	    max-width: 730px;
	  }
	}
	.container-narrow > hr {
	  margin: 30px 0;
	}
	
	/* Main marketing message and sign up button */
	.jumbotron {
	  text-align: center;
	  border-bottom: 1px solid #e5e5e5;
	}
	.jumbotron .btn {
	  padding: 14px 24px;
	  font-size: 21px;
	}
	
	/* Supporting marketing content */
	.marketing {
	  margin: 40px 0;
	}
	.marketing p + h4 {
	  margin-top: 28px;
	}
	
	/* Responsive: Portrait tablets and up */
	@media screen and (min-width: 768px) {
	  /* Remove the padding we set earlier */
	  .header,
	  .marketing,
	  .footer {
	    padding-right: 0;
	    padding-left: 0;
	  }
	  /* Space out the masthead */
	  .header {
	    margin-bottom: 30px;
	  }
	  /* Remove the bottom border on the jumbotron for visual effect */
	  .jumbotron {
	    border-bottom: 0;
	  }
	}
    </style>

  </head>
  <body id="top">
    
    <div class="container">

      <div class="jumbotron">
        <h1>Thank you!</h1>
        <p class="lead">Thank you for requesting to register for an active study at Dermatrials Research Inc.</p>
        <p class="lead">The message was successfully sent if you receive a confirmation email from Dermatrials Research Recruitment (recruit@dermatrials.com) at the email address you specified in the form.</p>
        <button class="btn btn-danger btn-lg" onclick="window.open('','_self').close();">Close</button>
      </div>

      <div class="row marketing">
      </div>

      <div class="footer">
      	<p>&copy; Dermatrials Research 2014</p>
      </div>

    </div> <!-- /container -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    
        <!-- Fade between pages -->
	<script>
		$(document).ready(function() {

		$('body').css('display', 'none');
		
		$('body').fadeIn(500);
		
		
		
		$('.fadelink').click(function(event) {
		
		event.preventDefault();
		
		newLocation = this.href;
		
		$('body').fadeOut(500, newpage);
		
		});
		
		
		
		function newpage() {
		
		window.location = newLocation;
		
		}
		
		});
	</script>
	
  </body>
</html>
EOD;
				//$successPage .= "Content-type: text/html\r\n";
				echo "$successPage";
	    }
} else {}

?>