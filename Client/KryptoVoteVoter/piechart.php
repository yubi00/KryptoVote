<?php
session_start();
if (!isset($_SESSION["sess_user"]))
{
//echo"no";
 header("location:index1.php");
}
else{
    
    
	$name =$_SESSION['sess_user'];

}
?>
<html>
<head>
  <title></title>
  <link href="css/bootstrap.css" rel="stylesheet" type="text/css"/>
<link href="css/font-awesome.css" rel="stylesheet" type="text/css"/>
<link href="css/style1.css" rel="stylesheet" type="text/css"/>
<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


<style>
/* Dropdown Button */
.dropbtn {
    background-color: #2e2e1f;
    color: white;
    padding: 16px;
    font-size: 16px;
    border: none;
    cursor: pointer;
}

/* The container <div> - needed to position the dropdown content */
.dropdown {
    position: relative;
    display: inline-block;
}

/* Dropdown Content (Hidden by Default) */
.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
	right: 70%;
}

/* Links inside the dropdown */
.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
	
}

/* Change color of dropdown links on hover */
.dropdown-content a:hover {background-color: #f1f1f1}

/* Show the dropdown menu on hover */
.dropdown:hover .dropdown-content {
    display: block;
}

/* Change the background color of the dropdown button when the dropdown content is shown */
.dropdown:hover .dropbtn {
    background-color: #3e8e41;
}

</style>

  <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
  <link href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' rel='stylesheet' type='text/css'>
</head>
<body background="vot1.png" >
<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
      </button>
       <a class="navbar-brand" href="#"><img src="logo10.png" style="width:280px; height:50px; margin-top:-10px;" </img></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="index2.php" style="right:30px;">HOME</a></li>
		<div class="dropdown">
		<li>
		

			<a href=#" class="material-icons" style="color: white; font-size:35px; margin-right:50px; margin-top:7px;">person</a>
			
			<div class="dropdown-content" >
				<a href="login/logout.php">Logout</a>
			</div>
		</li>
	      
		</div>
        
    </div>
  </div>
</nav>
<div class="container-fluid text-center " style="height:400px; padding-top:10px;margin-top:10px;">

<h5 style="text-align:center;font-size:30px;">La Trobe University|2017 Student Elections</h5>
<h1 style="text-align:center;font-size:30px;">ELECTION RESULTS</h1>
<h4 id="elecName"></p></h4>


<div class="row" style="margin-top:15px" >
<div class="col-md-8">
<div class="table-responsive">
    <table class="table table-bordered" id="customFields"  style="width:300px;background-color:#d6f5f5">
      <thead>
        <tr>
          <th>CANDIDATE NAME</th>
          <th>VOTE COUNT</th>
        </tr>
      </thead>
    </table>
 
  </div><!--end of table div-->
  </div><!--emd of col-md-5 tbale-->

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js">

</script>
   <script type="text/javascript">
   
google.charts.load("current", {packages:["corechart"]});	 
   </script>
   <script>
document.getElementById("time").innerHTML = Date();
</script>
<div class="col-md-4">
<div id="piechart" style="width:50px; height:50px;"></div>
</div><!--end of col-md-5"-->
</div><!--end of row div-->
</div><!---end of main div-->

</body>
<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js"></script>
<script src="./app1.js"></script>
</html>