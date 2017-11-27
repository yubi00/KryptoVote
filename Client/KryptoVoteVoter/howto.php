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
	  
	  
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
	
	 
	  <li><a href="#home"><i class="fa fa-facebook-official" aria-hidden="true"></i></a></li>
	  <li><a href="#home"><i class="fa fa-twitter-square" aria-hidden="true"></i></i></a></li>
	  <li><a href="#home"><i class="fa fa-instagram" aria-hidden="true"></i></i></a></li>
	 
        <li><a href="index2.php">HOME</a></li>
      
        
        <li><a href="login/logout.php">LOGOUT</a></li>
       
        
   
      </ul>
    </div>
  </div>
</nav>

<div class="" style="margin-top:50px;">



</div>


<div class="container-fluid text-center  v1" style="background-color:#f2f2f2;height:600px; padding-top:20px;margin-top:10px; background-image:url(vot2.png);"    >
  
  <br>
  <div class="row">
  
    <div class="col-sm-30">
      
   
    </div>
    

</div>

     

      
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
<script src="./app1.js"></script>
</html>