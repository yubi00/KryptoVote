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
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>

	<div class="wrapper">
		<div class="sidebar" data-color="azure" data-image="assets/img/sidebar-5.jpg">

			<!--   you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple" -->


			<div class="sidebar-wrapper">
				<div class="logo">
					<a href="dashboard.php" class="simple-text">
                    Administrator Dashboard
                </a>
				</div>

				<ul class="nav">
					<li>
						<a href="create_election.html">
                        <i class="pe-7s-graph"></i>
                        <p>Create Election</p>
                    </a>
					</li>

					<li>
						<a href="addvoter.html">
                        <i class="pe-7s-user"></i>
                        <p>Add  Voter</p>
                    </a>
					</li>
					<li>
						<a href="addcandidate.html">
                        <i class="pe-7s-user"></i>
                        <p>Add Candidate</p>
                    </a>
					</li>
					<li class="active">
						<a href="view_voter.php">
                        <i class="pe-7s-note2"></i>
                        <p>View Voters</p>
                    </a>
					</li>
					<li>
						<a href="view1.html">
                        <i class="pe-7s-news-paper"></i>
                        <p>View Candidates</p>
                    </a>
					</li>
					<li>
						<a href="viewresult.html">
                        <i class="pe-7s-science"></i>
                        <p>View Results</p>
                    </a>
					</li>


				</ul>
			</div>
		</div>

		<div class="main-panel">
			<nav class="navbar navbar-default navbar-fixed">
				<div class="container-fluid">

					<div class="collapse navbar-collapse">


						<ul class="nav navbar-nav navbar-right">
							<li>
								<a href=# " class="material-icons " style="font-size:30px ">person</a>
						</li>
                      
                        <li>
                            <a href="# ">
                                <p>Logout</p>
                            </a>
                        </li>
						<li class="separator hidden-lg hidden-md "></li>
                    </ul>
                </div>
            </div>
        </nav>

    <div id="page-wrapper ">

            <div class="container-fluid ">

                <div class="donate ">
<div class="col-md-12 ">
<div class="panel-group " style="margin-top:50px; ">
<div class="panel panel-primary ">
      <div class="panel-heading text-center ">VIEW VOTER LIST</div>
      <div class="panel-body ">
      
      
      
      <!-- Registration form - START -->
      <div class="col-md-5 ">
      


      
<!--------start of content---------------->
<div class="container ">
<?php
include('../connection.php');


$query="select * from insert_voter ";
$execute=mysql_query($query,$connection);
if(!$execute)
    {
        die("Could not view the data.. ");
    }
    else
    {
       
    }
?>

<div class="container ">
<div class="col-md-12 ">
<div class="row ">
<table style="width:78% ">
  <tr>
    
    <th>Name</th> 
    <th>voter_id</th>
    <th>contact</th>
  </tr>
  

</table>
 <?php 
while($row=mysql_fetch_assoc($execute))
{
	
	?>
  
  <div class=" row col-md-9 ">
  
 
  
    <div class="thumbnail ">
     <div class="caption ">
     <div class="container-fluid ">
       
	 
      
      <div class="row ">
     
        <div class="col-md-4 "><p><?PHP echo $row['name']."</br>";?></p>
					</div>
					<div class="col-md-4">
						<p>
							<?PHP echo $row['voter_id']."</br>";?>
						</p>
					</div>
					<div class="col-md-4">
						<p>
							<?PHP echo $row['contact']."</br>";?>
						</p>
					</div>

				</div>
		</div>



	</div>

	</div>

	</div>
	<?php
    }
    ?>
		</div>

		</div>
		<!--end of well-->
		</div>
		<!--end of container-->
		</div>
		<!--end of content--------------------------------------->

		</div>
		<!--end of col-md-5-->



		<!-- Registration form - END -->





		</div>
		</div>
		</div>
		</div>
		<!--end of container-->
		</div>
		<!--end of donate-->
		</div>
		<!-- /.container-fluid -->

		</div>
		<!-- /#page-wrapper -->

		</div>
		<!-- /#wrapper -->



		</div>
		</div>


</body>

<!--   Core JS Files   -->
<script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

<!--  Checkbox, Radio & Switch Plugins -->
<script src="assets/js/bootstrap-checkbox-radio-switch.js"></script>

<!--  Charts Plugin -->
<script src="assets/js/chartist.min.js"></script>

<!--  Notifications Plugin    -->
<script src="assets/js/bootstrap-notify.js"></script>

<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>

<!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
<script src="assets/js/light-bootstrap-dashboard.js"></script>

<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
<script src="assets/js/demo.js"></script>

</html>