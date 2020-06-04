<?php
/* Owner : Davila Lou IDAP4A
*  Project : Live Events (TPI 2020)
*  Version : 1.0
*  Date : 25/05/2020 - 09/06/2020
*/
require("../includes/sessionCheck.php");
require("../managers/SessionManager.php");
require("../managers/UserManager.php");

$form_off = filter_input(INPUT_POST,'btnSubmit');
if($form_off == "login")
{
    $nickname = filter_input(INPUT_POST,'nickname',FILTER_SANITIZE_EMAIL);
    $nickname = ($nickname == null) ? "" : $nickname;
    $passwd = filter_input(INPUT_POST,'passwd',FILTER_SANITIZE_STRING);
    $passwd = ($passwd == null) ? "" : $passwd;
    if($nickname != null && $passwd != null)
    {
        if(UserManager::Connect($nickname,$passwd) == true)
        {
            SessionManager::addNickname($nickname);
            echo "Login successful : ".$nickname;
            header('Location: index.php');
		}
		else
		{
			echo "Login failed";
		}
    }
}
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Login</title>
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
			                <h6>Sign In</h6>
			            <form action='login.php' method='post'>
			                <input class="form-control" name="nickname" type="text" placeholder="Nickname">
			                <input class="form-control" name="passwd" type="password" placeholder="Password">
			                <div class="action">
			                    <input type="submit" name ="btnSubmit" class="btn btn-primary signup" value="login">
							</div>
			            </form>                
			            </div>
			        </div>

			        <div class="already">
			            <p>Don't have an account yet?</p>
			            <a href="register.php">Sign Up</a>
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