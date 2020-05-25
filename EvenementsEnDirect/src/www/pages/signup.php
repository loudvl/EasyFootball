<?php
require("../managers/SessionManager.php");
require("../managers/UserManager.php");
require("../includes/User.php");
require("../managers/EmailManager.php");

$form_off = filter_input(INPUT_POST,'confirmBtn');
if($form_off == "Confirm")
{
    $email = filter_input(INPUT_POST,'email',FILTER_SANITIZE_EMAIL);
    $email = ($email == null) ? "" : $email;
    $passwd = filter_input(INPUT_POST,'passwd',FILTER_SANITIZE_STRING);
	$passwd = ($passwd == null) ? "" : $passwd;
	$confirmPasswd = filter_input(INPUT_POST,'confirmPasswd',FILTER_SANITIZE_STRING);
    $confirmPasswd = ($confirmPasswd == null) ? "" : $confirmPasswd;
    if($email != null && $passwd != null && $confirmPasswd != null)
    {
		if($passwd == $confirmPasswd)
		{
			if(!UserManager::UserExist($email))
			{
				$user = new User($email,$passwd);
				$token = UserManager::createUser($user);
				if($token != "")
				{
					EmailManager::initMailer();
					if(EmailManager::sendEmail($email,"Register validation","<html><head></head><body><a href='localhost/pages/validate.php?token=".$token."'>Validate</a></body></html>"))
					{
						echo "Confirm email sent";
					}
				}
			}
			else {
				echo "User already exist";
			}
		}
		else {
			echo "Passwords don't match";
		}
	}
	else{
		echo "Some fields are empty";
	}
}
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Bootstrap Admin Theme v3</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- styles -->
    <link href="../css/styles.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="login-bg">
  	<div class="header">
	     <div class="container">
	        <div class="row">
	           <div class="col-md-12">
	              <!-- Logo -->
	              <div class="logo">
	                 <h1><a href="index.php">Bootstrap Admin Theme</a></h1>
	              </div>
	           </div>
	        </div>
	     </div>
	</div>

	<div class="page-content container">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<div class="login-wrapper">
			        <div class="box">
			            <div class="content-wrap">
							<h6>Sign Up</h6>
							<form action='signup.php' method='post'>
			                <input class="form-control" name="email" type="text" placeholder="E-mail address">
			                <input class="form-control" name="passwd" type="password" placeholder="Password">
			                <input class="form-control" name="confirmPasswd" type="password" placeholder="Confirm Password">
			                <div class="action">
			                    <input type='submit' class="btn btn-primary signup" value='Confirm' name=confirmBtn>
							</div>
							</form>                
			            </div>
			        </div>

			        <div class="already">
			            <p>Have an account already?</p>
			            <a href="login.php">Login</a>
			        </div>
			    </div>
			</div>
		</div>
	</div>



    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script src="../js/custom.js"></script>
  </body>
</html>