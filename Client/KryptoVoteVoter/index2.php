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
<title>
</title>

<link href="css/bootstrap.css" rel="stylesheet" type="text/css"/>



<link href="css/style1.css" rel="stylesheet" type="text/css"/>
<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
<script type="text/javascript"  src="js/jquery-1.11.2.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<style>
.carousel-inner img 
{
    
    filter: grayscale(0%); /* make all photos black and white */ 
    width: 100%;
	
	/* Set width to 100% */
    margin: auto;
}

/* Add a dark background color with a little bit see-through */ 
.navbar {
    margin-bottom: 0;
   background-color: #2d2d30;
    border: 0;
    font-size: 15px !important;
	font-weight:bold;
    letter-spacing: 4px;
    opacity:0.80;
}
.navbar-nav li a i
{
font-size:30px;
margin-right:50px;

  color:white;
  
}
.navbar-nav li a i:hover
{
color: #00cc00 !important;
}
/* On hover, the links will turn white */
.navbar-nav li a:hover {
    color: #00cc00 !important;
}
.navbar-nav li.active a 
{
    color: pink !important;
    background-color:#29292c !important;
}

/* Dropdown */
.open .dropdown-toggle {
    color: #fff ;
    background-color: #555 !important;
}

/* Dropdown links */
.dropdown-menu li a {
    color: #000 !important;
	
}

/* On hover, the dropdown links will turn red */
.dropdown-menu li a:hover {
color:fff!important;
    background-color: red !important;
}
.carousel-caption h3
{
font-size:82px;
color:white;
font-weight:bold;
margin-bottom:220px;

}
.carousel-caption h4
{
font-size:32px;
color:white;
font-weight:bold;

}
@media (max-width: 600px) {


   /* .carousel-caption button
	{
	position:relative;
	margin-top:-100px;
	}
	
     */
	 
	 
	 
{
font-size:12px;}
 .carousel-caption h4{
  display: none; 
 }
 
	 /* Hide the carousel text when the screen is less than 600 pixels wide */
    }

	.modal-header, h4, .close {
    background-color: #333;
    color: #fff !important;
    text-align: center;
    font-size: 30px;
}

.modal-header, .modal-body {
    padding: 40px 50px;
}
.na h4{
color:black;

background-color:white;
}
.na na1 h4
{
color:red;
}
.logo-small {
    color: #f4511e;
    font-size: 50px;
}
.team
{
  padding:50px 0px 80px;
  text-align:center;
}
.team img
{
height:150px;
width:150px;
margin-top:80px;
}
.team i
{
height:30px;
width:30px;
background-color:#a0db8e;
color:white;
font-size:17px;
padding:5px;
border-radius:50%;
}
.team a:hover i
{
 background-color:red;
}

/*FOOTER*/
.footer i
{
color:white;}
.footer a:hover i{
background-color:red;
}
.footer {
    
    padding: 30px;
    color: #cccccc;
    background-color: #222222;
}


.footer .social {
    
    font-size: 20px;
    height: 30px;
    width: 30px;
    text-align: center;
    padding: 5px;
    border: 1px solid #cccccc;
    margin-bottom: 10px;
    margin-right: 5px;
}


.footer input {
    
    height: 40px;
    width: 160px;
    padding: 5px;
    border: none;
    background-color: #cccccc;
    color: #000;
}

.footer .btn {
    
    padding: 10px 5px 10px;
    margin: -3px 0 0 5px;
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

#clockdiv{
	margin-top: -100px;
	font-family: sans-serif;
	color: #fff;
	display: inline-block;
	font-weight: 100;
	text-align: center;
	font-size: 30px;
	margin-bottom: 25px;
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








</style>
 </head>

<body>

<nav class="navbar navbar-default navbar-fixed-top">
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
       
        
   
      </ul>
    </div>
  </div>
</nav>

<div class="" style="margin-top:100px;">
<?php

if (!isset($_SESSION["sess_user"]))
{
echo"no";
 header("location:process.php");
}
else{
    
    ?>
    

<h2 style="color:#94b894;font-weight:bold;">Welcome <?=$_SESSION['sess_name'];?>! Shape tomorrow by voting today!</h2>



<?php

}
?>


</div>


<div class="container-fluid text-center  v1" style="background-color:#f2f2f2;height:600px; padding-top:100px;margin-top:20px; background-image:url(vot1.png)"    >
  
  
  <div class="row" style="margin-top:15px;">
  
  <div class="container-fluid text-center ">
  <h1> <div id="countdown" style="margin-top:-100px;font-weight:bold;" ></div></h1>
  <h1><div id="info"  style="margin-top:-130px;margin-right:-45px;font-weight:bold;"></div></h1></br>
  
  <div id="clockdiv">
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
  <div class="col-sm-4">
      <span class="glyphicon glyphicon-pencil logo-small"></span>
      <h2>HOW TO VOTE</h2>
      <p>Instruction for voting</p>
	 <a href="howto.php"> <button type="button" class="btn btn-success" style="margin-bottom:30px">HOW TO VOTE</button></a>
    </div>
    <div class="col-sm-4 na1">
      <span class="glyphicon glyphicon-check logo-small"></span>
      <h2>VOTE</h2>
      <p>Vote for your preferred candidate</p>
	<button onclick="VoteValidation('<?php echo $name;?>')" class="btn btn-success" style="margin-bottom:30px">VOTE HERE</button>
    </div>
    
    <div class="col-sm-4">
      <span class="glyphicon glyphicon-list-alt logo-small"></span>
      <h2>RESULT</h2>
      <p>Election results here</p>
	  <button onclick="results('<?php echo $name;?>')" class="btn btn-success" style="margin-bottom:30px">VIEW RESULTS</button>
	</div>
   
    </div>
    

</div>

<!-- Modal -->
  <div class="modal fade" id="validationModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="padding:5px 50px;background-color: #5cb85c;color:white !important;text-align: center;">
          <h4 style="background-color: #5cb85c;color:white !important;"><span class="glyphicon glyphicon-warning-sign"></span></br>Information</h4>
        </div>
        <div class="modal-body" style="padding:40px 50px;">
          <form role="form">
          <div class="form-group">
		  
            <div id="msg" style="text-align:center;font-size:30px;"></div></br>
			<button type="submit" id="ok_btn" class="btn btn-success btn-block" style="font-size : 20px; width: 100%; height: 50px;">Ok</button>
          </form>
        </div>
        
      </div>
      
    </div>
  </div> <!--end of modal-->
  


 
 
 
 
 
 
 
<script>
$(document).ready(function(){
  // Initialize Tooltip
  $('[data-toggle="tooltip"]').tooltip(); 
  
  // Add smooth scrolling to all links in navbar + footer link
  $(".navbar a, footer a[href='#myPage']").on('click', function(event) {

    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {

      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 900, function(){
   
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });
})
</script>

</body>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">

<script src="./app.js"></script> 
</html>