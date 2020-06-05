<?php
/* Owner : Davila Lou IDAP4A
*  Project : Live Events (TPI 2020)
*  Version : 1.0
*  Date : 25/05/2020 - 09/06/2020
*/
require_once("../includes/sessionCheck.php");
require_once("../managers/EventManager.php");
require_once('../managers/SessionManager.php');
require_once('../includes/displayFunc.php');
$eventId = filter_input(INPUT_GET, 'eventId', FILTER_VALIDATE_INT);
if ($eventId != null) {

	$form_off = filter_input(INPUT_POST,'saveBtn');
if($form_off == "Save")
{
	$title = filter_input(INPUT_POST,'title',FILTER_SANITIZE_STRING);
    $title = ($title == null) ? "" : $title;
    $description = filter_input(INPUT_POST,'description',FILTER_SANITIZE_STRING);
    $description = ($description == null) ? "" : $description;
    $country = filter_input(INPUT_POST,'country',FILTER_SANITIZE_STRING);
	$country = ($country == null) ? "" : $country;
	$date = filter_input(INPUT_POST,'date',FILTER_SANITIZE_STRING);
	$date = ($date == null) ? "" : $date;
	$time = filter_input(INPUT_POST,'time',FILTER_SANITIZE_STRING);
	$time = ($time == null) ? "" : $time.":00";
	$showEvent = filter_input(INPUT_POST,'showEvent');
	$showEvent = ($showEvent == null) ? 0 : 1;
	
	if($title != null && $description != null && $country != null && $date != null && $time != null)
	{
		$dateTime = null;
		try
		{
			$dateTime = new DateTime(date('Y-m-d H:i:s',strtotime($date." ".$time)));
		}
		catch(Exception $e)
		{

		}
		EventManager::updateEvent($eventId,$title,$description,$country,$dateTime->format('Y-m-d H:i:s'),$showEvent);
	}
}
	$event = EventManager::getUserEvent($eventId, SessionManager::getNickname());
	if ($event != null) {
		$dateTime = new DateTime(date("Y-m-d H:i:s",strtotime($event->startDateTime)));
		$startDate = $dateTime->format("Y-m-d");
		$startTime = $dateTime->format("H:i");
		if($event->isVisible == true)
		{
			$checkBoxValue = "checked";
		}
		else
		{
			$checkBoxValue = "";
		}
	}
	else
	{
		header('Location: index.php');
	}
}
else
	{
		header('Location: index.php');
	}
?>
<!DOCTYPE html>
<html>

<head>
	<title>Edit Event</title>
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
							<div class="panel-heading">
								<div class="panel-title">Edit Event</div>
							</div>
							<div class="panel-body">
								<div class="row">
									<div class="col-md-6">
										<form class="form-horizontal" role="form" action="editEvent.php?eventId=<?php echo $event->id;?>" method="POST">
											<div class="form-group">
												<label for='title' class="col-sm-2 control-label">Title </label>
												<div class="col-sm-7">
													<input class="form-control" type='text' name="title" id='title' value="<?php echo $event->title ?>" required>
												</div>
											</div>
											<div class="form-group">
												<label for='description' class="col-sm-2 control-label">Description </label>
												<div class="col-sm-10">
													<textarea class="form-control" name="description" id='description' rows="5" style="resize: none;" required><?php echo $event->description ?></textarea>
												</div>
											</div>
											<div class="form-group">
												<label for='country' class="col-sm-2 control-label">Country </label>
												<div class="col-sm-7">
													<select class="form-control" name='country' id='country' required><?php echo genCountriesSelect($event->country) ?></select>
												</div>
											</div>
											<div class="form-group">
												<label for='date' class="col-sm-2 control-label">Date </label>
												<div class="col-sm-3">
													<input class="form-control" type="date" name="date" id="date" value="<?php echo $startDate ?>" required>
												</div>
												<label for='time' class="col-sm-1 control-label">Time </label>
												<div class="col-sm-3">
													<input class="form-control" class="form-control" type="time" name="time" id="time" value="<?php echo $startTime ?>" required>
												</div>
											</div>
											<div class="form-group">
												<label for='showEvent' class="col-sm-2 control-label">Show event</label>
												<div class="col-sm-1">
													<input type="checkbox" class="form-control" name='showEvent' id='showEvent' <?php echo $checkBoxValue ?>>
												</div>
											</div>
											<div class="form-group">
												<div class="col-sm-offset-2 col-sm-12">
													<button class="btn btn-primary col-sm-4" type="submit" value="Save" name="saveBtn">Save</button>
													<div class="col-sm-1"></div><button class="btn btn-primary col-sm-4" value="Delete" name="deleteBtn">Delete event</button>
												</div>
											</div>
										</form>
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