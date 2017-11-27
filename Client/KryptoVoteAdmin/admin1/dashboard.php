<?php
session_start();
?>
<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Administrator Page</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
	<meta name="viewport" content="width=device-width" />



	<!-- Bootstrap core CSS     -->
	<link href="assets/css/bootstrap.min.css" rel="stylesheet" />

	<!-- Animation library for notifications   -->
	<link href="assets/css/animate.min.css" rel="stylesheet" />

	<!--  Light Bootstrap Table core CSS    -->
	<link href="assets/css/light-bootstrap-dashboard.css" rel="stylesheet" />


	<!--  CSS for Demo Purpose, don't include it in your project     -->
	<link href="assets/css/demo.css" rel="stylesheet" />


	<!--     Fonts and icons     -->
	<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
	<link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />

	<!-- Add icon library -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


	<style>
		.header h4 {
			color: red;
		}

		</style </head><body <div class="wrapper"><div class="sidebar" data-color="azure" data-image="assets/img/sidebar-5.jpg"><div class="sidebar-wrapper"><div class="logo"><a href="dashboard.php" class="simple-text">Administrator Dashboard </a></div><ul class="nav"><li class="nav"><a href="create_election.html"><i class="pe-7s-graph"></i><p>Create Election</p></a></li><li><a href="addvoter.html"><i class="pe-7s-user"></i><p>Add Voter</p></a></li><li><a href="addcandidate.html"><i class="pe-7s-user"></i><p>Add Candidate</p></a></li><li><a href="view_voter.php"><i class="pe-7s-note2"></i><p>View Voters</p></a></li><li><a href="view1.html"><i class="pe-7s-news-paper"></i><p>View Candidates</p></a></li><li><a href="viewresult.html"><i class="pe-7s-science"></i><p>View Results</p></a></li></ul></div></div><div class="main-panel"><nav class="navbar navbar-default navbar-fixed"><div class="container-fluid"><div class="collapse navbar-collapse"><ul class="nav navbar-nav navbar-right"><li><a href=#" class="material-icons" style="font-size:30px">person</a>
 </li><li><?php if (!isset($_SESSION["sess_user"])) {
			echo"no";
			header("location:../index1.php");
		}

		else {

			?><?php
		}

		?></li><li><a href="../login/logout.php"><p>Logout</p></a></li><li class="separator hidden-lg hidden-md"></li></ul></div></div></nav><br><h1>&nbsp;
		&nbsp;
		&nbsp;
		Welcome,
		&nbsp;
		<?=$_SESSION['sess_user'];
		?>!</h1><img src="yess.png" alt="yesDashboard" height="620" align="middle"></div></div></div></div></body><!-- Core JS Files --><script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script><script src="assets/js/bootstrap.min.js" type="text/javascript"></script><!-- Checkbox,
		Radio & Switch Plugins --><script src="assets/js/bootstrap-checkbox-radio-switch.js"></script><!-- Charts Plugin --><script src="assets/js/chartist.min.js"></script><!-- Notifications Plugin --><script src="assets/js/bootstrap-notify.js"></script><!-- Google Maps Plugin --><script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script><!-- Light Bootstrap Table Core javascript and methods for Demo purpose --><script src="assets/js/light-bootstrap-dashboard.js"></script><!-- Light Bootstrap Table DEMO methods,
		don't include it in your project! -->
 <script src="assets/js/demo.js"></script><script type="text/javascript">$(document).ready(function() {

			demo.initChartist();

			$.notify( {
				icon: 'pe-7s-gift',
				message: "Here is your page to manage elections."
			}
			, {
				type: 'info',
				timer: 4000
			}
			);

		}

		);
		</script></html>