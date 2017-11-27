<?php
session_start();
if (!isset($_SESSION["sess_user"]))
{
echo"no";
 header("location:index1.php");
}
else{
    
    
	$name =$_SESSION['sess_user'];

}
?>
<!-- <!DOCTYPE html> -->
<html>
<head>
  <title>Election Ballot</title>
  <link href="css/bootstrap.css" rel="stylesheet" type="text/css"/>
<link href="css/font-awesome.css" rel="stylesheet" type="text/css"/>
  
<link href="css/style1.css" rel="stylesheet" type="text/css"/>
<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
<script type="text/javascript"  src="js/jquery-1.11.2.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>
<style>
  h4{
    background-color:#2e2e1f;
	padding:15px;
	text-align:center;
	color:white;
	font-size:25px;
	font-weight:bold;
	}
  #time
  {
  
  color:red;
  font-size:20px;
  margin-left:0px;
  }
  .table-responsive
  {
	border:2px  black;
	}
	
	#clockdiv{
	font-family: sans-serif;
	color: #fff;
	display: inline-block;
	font-weight: 100;
	text-align: center;
	font-size: 30px;
}


#clockdiv > div{
	padding: 10px;
	border-radius: 3px;
	background: #00BF96;
	display: inline-block;
	text-align: center;
}

#clockdiv div > span{
	padding: 15px;
	border-radius: 3px;
	background: #00816A;
	display: inline-block;
	text-align: center;
}

.smalltext{
	padding-top: 5px;
	font-size: 16px;
	text-align: center;
	
}

#alerts{
    position: fixed;
    left: 50%;
    top: 50%;
    z-index: 100;
	font-size: 50px;

    height: 400px;
    margin-top: -200px;

    width: 600px;
    margin-left: -300px;
}
.loader {
  border: 16px solid #f3f3f3;
  border-radius: 50%;
  border-top: 16px solid #3498db;
  width: 20px;
  height: 20px;
  -webkit-animation: spin 2s linear infinite;
  animation: spin 2s linear infinite;
}

@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
.radio input[type="radio"]{
   cursor: pointer; 
  position:absolute;
  width:100%;
  height:100%;
  z-index: 1;
  opacity: 0;
  filter: alpha(opacity=0);
  -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=0)"
}
.radio{
  color:#999;
  font-size:15px;
  position:relative;
}
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
<body class="container" background="vot1.png">





<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid" >
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
  <!-- <h1 style="margin-top:0px">Online Election Ballot</h1>
  <p> You still have &nbsp;&nbsp;<span id="votingendtime"></span></p>remaining time to cast your vote in this ballot page.</p> -->
  <div class="container-fluid text-center ">
  <br/><h1> <div id="countdown" style="padding-top: 50px;font-weight:bold;" ></div></h1><br/>
  <h1><div id="info" ></div></h1><br/>
  <div id="clockdiv" >
    <div id="daysinfo">
      <span class="days"></span>
      <div class="smalltext">Days</div>
    </div>
    <div id="hoursinfo">
      <span class="hours"></span>
      <div class="smalltext">Hours</div>
    </div>
    <div id="minutesinfo">
      <span class="minutes"></span>
      <div class="smalltext">Minutes</div>
    </div>
    <div id="secondsinfo">
      <span class="seconds"></span>
      <div class="smalltext">Seconds</div>
    </div>
  </div>
    </div>
  
  <!---for table -->
  <div style="margin-left:200px;width:800px;">
  <p style="font-size:20px; font-weight:bold;text-align:center;margin-top:15px;"> Please tick one box per candidate</p>
  <h4 id="elecName"></p></h4>
  <div id="address"></div>
  <div class="table-responsive">
      <table class="table table-striped table-bordered" id="customFields" >
      <thead>
        <tr>
          <th style="text-align:center;font-weight:bold;">Candidate</th>
        </tr>
      </thead>
      <!-- <tbody>
      </tbody> -->
    </table> 

</table>

	
	
  </div>
  <a href="#" onclick="voteForCandidate('<?php echo $name;?>')" class="btn btn-primary" style="height:50px;width:200px;font-size:25px;margin-left:230px; margin-top:10px;">Vote</a>
  </div>
  <!-- <a href="results.html" class="btn btn-primary">Results</a> -->
<!--<div class="centered " style="position: fixed;top: 50%;left: 50%;transform: translate(-50%, -50%);">
<div id="alerts"></div>
</div> -->

<!-- Modal -->
  <div class="modal fade" id="ballotModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="padding:5px 50px;background-color: #5cb85c;color:white !important;text-align: center;">
          <h4 style="background-color: #5cb85c;color:white !important;"><span class="glyphicon glyphicon-warning-sign"></span></br>Information</h4>
        </div>
        <div class="modal-body" style="padding:40px 50px;">
          <form role="form">
          <div class="form-group">
		  
            <div id="msg" style="text-align:center;font-size:30px;"></div>
			<div id="processing"></div></br>
			<!-- <button type="submit" id="ok_btn" class="btn btn-success btn-block" style="font-size : 20px; width: 100%; height: 50px;">Ok</button> -->
          </form>
        </div>
        
      </div>
      
    </div>
  </div> <!--end of modal-->

</body>

<!--<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script> -->
<!--<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> -->
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script> -->
<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
<!-- <script src="http://localhost:8080/ballot.js"></script> -->

<script src="./ballot.js"></script> 
</html>
