<?php
/* Owner : Davila Lou IDAP4A
*  Project : Live Events (TPI 2020)
*  Version : 1.0
*  Date : 25/05/2020 - 09/06/2020
*/
require_once("../includes/sessionCheck.php");
require_once('../includes/displayFunc.php');
require_once("../managers/EventManager.php");
require_once("../managers/SessionManager.php");
?>
<!DOCTYPE html>
<html>

<head>
    <title>Create Event</title>
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

<body>
    <div class="header">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <!-- Logo -->
                    <div class="logo">
                        <h1><a href="index.php">Live Events</a></h1>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-lg-12">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="page-content">
        <div class="row">
            <div class="col-md-2">
                <div class="sidebar content-box" style="display: block;">
                    <?php
                    include("../includes/nav.inc.php");
                    ?>
                </div>
            </div>
            <div class="col-md-10">
                <div class="row">
                    <div class="col-md-12">
                        <div class="content-box-large">
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="panel-heading">
                                        <div class="panel-title">Manage</div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="panel-heading">
                                        <button class="btn btn-primary col-sm-10" value="Start event" name="manageBtn">StartEvent</button>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h5><b>Description :</b></h5>
                                        <p>Ma description</p>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h5><b>Start :</b></h5>
                                                <p>0000-00-00 00:00:00</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h5><b>Country :</b></h5>
                                                <p>My country</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-9">
                                        <input class="form-control" type="text" name="messageBox" disabled>
                                    </div>
                                    <div class="col-md-3">
                                        <button class="btn btn-primary col-sm-10" value="Push" name="pushbtn" disabled>Push message</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    include("../includes/footer.inc.html");
    ?>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script src="../js/custom.js"></script>
    <script src="../js/jqueryUtils.js"></script>
</body>

</html>