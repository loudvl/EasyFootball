<?php
require("../includes/sessionCheck.php");
require("../managers/SessionManager.php");
require("../managers/UserManager.php");

$form_off = filter_input(INPUT_POST,'btnSubmit');
if($form_off == "login")
{
    $email = filter_input(INPUT_POST,'email',FILTER_SANITIZE_EMAIL);
    $email = ($email == null) ? "" : $email;
    $passwd = filter_input(INPUT_POST,'passwd',FILTER_SANITIZE_STRING);
    $passwd = ($passwd == null) ? "" : $passwd;
    if($email != null && $passwd != null)
    {
        if(UserManager::Connect($email,$passwd) == true)
        {
            SessionManager::addSession("email",$email);
            echo "succes ".$email;
            header('Location: index.php');
        }
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
			                <h6>Sign In</h6>
			            <form action='login.php' method='post'>
			                <input class="form-control" name="email" type="text" placeholder="E-mail address">
			                <input class="form-control" name="passwd" type="password" placeholder="Password">
			                <div class="action">
			                    <input type="submit" name ="btnSubmit" class="btn btn-primary signup" value="login">
							</div>
			            </form>                
			            </div>
			        </div>

			        <div class="already">
			            <p>Don't have an account yet?</p>
			            <a href="signup.php">Sign Up</a>
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