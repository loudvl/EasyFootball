<?php
/* Owner : Davila Lou IDAP4A
*  Project : Live Events (TPI 2020)
*  Version : 1.0
*  Date : 25/05/2020 - 09/06/2020
*/
require("../includes/sessionCheck.php");
require("../includes/displayFunc.php");
?>
<!DOCTYPE html>
<html>

<head>
	<title>Dashboard</title>
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
<style>
    table,td,tr,th
    {
        border:1px solid black ;
        text-align: center;
    }
	.tdButtons
	{
		border:none;
		text-align: center;
	}
</style>
	<div class="header">
		<div class="container">
			<div class="row">
				<div class="col-md-5">
					<!-- Logo -->
					<div class="logo">
						<h1><a href="index.php">Live Events</a></h1>
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
				<h3><b>Dashboard</b></h3>
				<div class="row">
					<div class="col-md-12">
						<div class="content-box-large">
							<div class="row">
								<div class="col-md-12">
									<div class="panel-heading">
										<div class="panel-title">My incoming events</div>
									</div>
								</div>
							</div>
							<div class="panel-body">
								<table class="col-sm-8">
									<tr>
										<th>Title</th>
										<th>Start Date</th>
										<th>Country</th>
										<th>State</th>
									</tr>
									<tr>
										<?php echo displayDashboard(true); ?>
								</table>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="content-box-large">
							<div class="row">
								<div class="col-md-12">
									<div class="panel-heading">
										<div class="panel-title">My old events</div>
									</div>
								</div>
							</div>
							<div class="panel-body">
								<table class="col-sm-8">
									<tr>
										<th>Title</th>
										<th>Start Date</th>
										<th>End Date</th>
										<th>Country</th>
									</tr>
									<tr>
										<?php echo displayDashboard(false); ?>
								</table>
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
</body>

</html>