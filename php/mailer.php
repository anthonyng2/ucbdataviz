<?php
/* Set e-mail recipient */
$myemail = "peter@peteraldhous.com";

/* Check all form inputs using check_input function */
$name = check_input($_POST['inputName'], "Your Name");
$email = check_input($_POST['inputEmail'], "Your E-mail Address");
$subject = check_input($_POST['inputSubject'], "Message Subject");
$message = check_input($_POST['inputMessage'], "Your Message");

/* If e-mail is not valid show error message */
if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $email))
{
show_error("Invalid e-mail address");
}
/* Let's prepare the message for the e-mail */

$message = "

Message from 2014 Data Viz | Student Projects:

Name: $name
Email: $email
Subject: $subject

Message:
$message

";

/* Send the message using mail() function */
mail($myemail, $subject, $message);

/* Redirect visitor to the thank you page */
header('Location: ../2014/confirm.html');
exit();

/* Functions we used */
function check_input($data, $problem='')
{
$data = trim($data);
$data = stripslashes($data);
$data = htmlspecialchars($data);
if ($problem && strlen($data) == 0)
{
show_error($problem);
}
return $data;
}

function show_error($myError)
{
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    

    <title>Intro to Data Viz | Student Projects</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
	<link href="../css/custom.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

<body class="markdown clearness">

    <!-- Fixed navbar -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a href="../2014/index.html" class="navbar-brand">Intro Data Viz</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="../2014/contact.html">Contact</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container">
    
		<div class="alert alert-danger">
			<a href="#" class="close" data-dismiss="alert">&times;</a>
			<p>Please correct the following error:</p>
			<p><strong><?php echo $myError; ?></strong></p>
			<p>Hit the back button or try again below.</p>
		</div>


		<div class="panel panel-default" style="margin:0 auto">
				<div class="panel-heading">
					<h5 class="panel-title">Instructor: <a href="http://peteraldhous.com/" target="_blank">Peter Aldhous</a></h5>
				</div>
				<div class="panel-body">
					<form name="contactform" method="post" action="../php/mailer.php" class="form-horizontal" role="form">
						<div class="form-group">
							<label for="inputName" class="col-lg-2">Name</label>
							<div class="col-lg-12">
								<input type="text" class="form-control" id="inputName" name="inputName" placeholder="Your name">
							</div>
						</div>
						<div class="form-group">
							<label for="inputEmail" class="col-lg-2">Email</label>
							<div class="col-lg-12">
								<input type="text" class="form-control" id="inputEmail" name="inputEmail" placeholder="Your email">
							</div>
						</div>
						<div class="form-group">
							<label for="inputSubject" class="col-lg-2">Subject</label>
							<div class="col-lg-12">
								<input type="text" class="form-control" id="inputSubject" name="inputSubject" placeholder="Your subject">
							</div>
						</div>
						<div class="form-group">
							<label for="inputMessage" class="col-lg-2">Message</label>
							<div class="col-lg-12">
								<textarea class="form-control" rows="4" id="inputMessage" name="inputMessage" placeholder="Your message"></textarea>
							</div>
						</div>
						<div class="form-group">
							<div class ="col-lg-12">
								<button type="submit" class="btn btn-default">
									Send Message
								</button>
							</div>
						</div>
					</form>
				</div>
		</div>


    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
  </body>
</html>

<?php
exit();
}
?>