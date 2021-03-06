<?php
/* Owner : Davila Lou IDAP4A
*  Project : Live Events (TPI 2020)
*  Version : 1.0
*  Date : 25/05/2020 - 09/06/2020
*/
require("../managers/SessionManager.php");
require("../managers/UserManager.php");
require("../managers/EmailManager.php");

$form_off = filter_input(INPUT_POST,'confirmBtn');
if($form_off == "Register")
{
	$nickname = filter_input(INPUT_POST,'nickname',FILTER_SANITIZE_STRING);
    $nickname = ($nickname == null) ? "" : $nickname;
    $email = filter_input(INPUT_POST,'email',FILTER_SANITIZE_EMAIL);
    $email = ($email == null) ? "" : $email;
    $passwd = filter_input(INPUT_POST,'passwd',FILTER_SANITIZE_STRING);
	$passwd = ($passwd == null) ? "" : $passwd;
	$confirmPasswd = filter_input(INPUT_POST,'confirmPasswd',FILTER_SANITIZE_STRING);
    $confirmPasswd = ($confirmPasswd == null) ? "" : $confirmPasswd;
    if($nickname != null && $email != null && $passwd != null && $confirmPasswd != null)
    {
		if($passwd == $confirmPasswd)
		{
			if(!UserManager::UserExist($nickname))
			{
				$token = UserManager::createUser($nickname,$email,hash("sha256",$passwd));
				if($token != "")
				{
					if(EmailManager::sendEmail($email,"Register validation","<html><head></head><body><a href='localhost/pages/validate.php?nickname=".$nickname."&token=".$token."'>Validate</a></body></html>"))
					{
						header("Location: index.php");
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
    <title>Register</title>
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
	                 <h1><a href="index.php">Live Events</a></h1>
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
							<form action='register.php' method='post'>
							<input class="form-control" name="nickname" type="text" placeholder="Nickname">
			                <input class="form-control" name="email" type="text" placeholder="E-mail address">
			                <input class="form-control" name="passwd" type="password" placeholder="Password">
			                <input class="form-control" name="confirmPasswd" type="password" placeholder="Confirm Password">
			                <div class="action">
			                    <input type='submit' class="btn btn-primary signup" value='Register' name=confirmBtn>
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