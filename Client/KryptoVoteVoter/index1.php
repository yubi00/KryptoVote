
<?php
session_start();
?>
<html>
<head>
<title>
</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css"/>
<link href="css/font-awesome.css" rel="stylesheet" type="text/css"/>
<link href="css/style1.css" rel="stylesheet" type="text/css"/>
<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
<script type="text/javascript"  src="js/jquery-1.11.2.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="script1.js"></script>

 
<style>
 .modal-header, h4, .close {
      background-color: #5cb85c;
      color:white !important;
      text-align: center;
      font-size: 30px;
  }
  .modal-footer {
      background-color: #f9f9f9;
  }
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
    opacity:0.8;
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


    .carousel-caption button
	{
	position:relative;
	margin-top:-100px;
	}
     
{
font-size:12px;}
 .carousel-caption h4{
  display: none; 
 }
 
	 /* Hide the carousel text when the screen is less than 600 pixels wide */
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
        <li><a href="#home">HOME</a></li>
        <li  id="myBtn1"><a href="#tour">SIGNUP</a></li>  
        
        
    </div>
  </div>
</nav>
<!--carousal-->
<div id="myCarousel" class="carousel slide" data-ride="carousel">

  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="img/lamo4.jpg" alt="New York">
      <div class="carousel-caption">
       <!-- <h3>La Trobe University<br><u>Online Election 2017</u></h3>-->
		
        <div class="bu" style="margin-top:40px;">
		<button type="button" class="btn btn-primary btn-lg" id="myBtn" style="width:120px; height:50px; ">Login</button>
</div>
      </div> 
    </div>

    

  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<form  action="login/process.php" method="POST">
<!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="padding:35px 50px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4><span class="glyphicon glyphicon-lock"></span> Login</h4>
        </div>
        <div class="modal-body" style="padding:40px 50px;">
          <form role="form">
            <div class="form-group">
              <label for="usrname"><span class="glyphicon glyphicon-user"></span> Username</label>
              <input type="text" name="username"class="form-control" id="usrname" placeholder="Enter name">
            </div>
            <div class="form-group">
              <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
              <input type="password" name="password"class="form-control" id="psw" placeholder="Enter password">
            </div>
           
            <div id="login_message" style="color:red;"></div>
              <button type="submit" id="login_btn" class="btn btn-success btn-block"><span class="glyphicon glyphicon-off"></span> Login</button>
              <label style="margin-top:10px;">Don't have an account?<span><a id="login_btn2">Sign Up</a></span></label>
          </form>
           
            
        </div>
        <div class="modal-footer">
        </div>
      </div>
      
    </div>
  </div> <!--end of modal-->

<!---------------------------------------MODAL FOR SIGNUP FORM------------------------------------------>
<form  action="login/signup_process.php" method="POST">
  <!-- Modal -->
  <div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="padding:35px 50px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4><span class="glyphicon glyphicon-lock"></span>SIGNUP FORM</h4>
        </div>
        <div class="modal-body" style="padding:40px 50px;">
          <form role="form">
          <div class="form-group">
              <label for="usrname"><span class="glyphicon glyphicon-user"></span> Name</label>
              <input type="text" name="name"class="form-control" id="usrname" placeholder="Enter name">
            </div>
            <div class="form-group">
              <label for="usrname"><span class="glyphicon glyphicon-user"></span> Username</label>
              <input type="text" name="username"class="form-control" id="usrname" placeholder="Enter username">
            </div>
            <div class="form-group">
              <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
              <input type="password" name="password"class="form-control" id="psw" placeholder="Enter password">
            </div>
              <div class="form-group">
              <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Confirm Password</label>
              <input type="password" name="password1"class="form-control" id="psw" placeholder="Enter password again">
            </div>
            
            <div id="login_message1"></div>
              <button type="submit" id="login_btn" class="btn btn-success btn-block" name="btn_submit1"><span class="glyphicon glyphicon-off"></span>SIGNUP</button>
          </form>
        </div>
        
      </div>
      
    </div>
  </div> <!--end of modal-->
      
  <!-----------------------------------------------END OF MODAL FORM---------------------------------------------------------------------------------->


  <!--------------------------------------- Modal  forsignup message content-->
      <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header" style="padding:35px 50px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4><span class="glyphicon glyphicon-lock"></span> Login</h4>
        </div>
        <div class="modal-body" style="padding:40px 50px;">
          <form role="form">
            <div class="form-group">
              <label for="usrname"><span class="glyphicon glyphicon-user"></span> Username</label>
              <input type="text" name="username"class="form-control" id="usrname" placeholder="Enter email">
            </div>
            <div class="form-group">
              <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
              <input type="password" name="password"class="form-control" id="psw" placeholder="Enter password">
            </div>
            
            <div id="login_message"></div>
              <button type="submit" id="login_btn" class="btn btn-success btn-block"><span class="glyphicon glyphicon-off"></span> Login</button>
          </form>
        </div>
        <div class="modal-footer">
        </div>
      </div>
      
    </div>
  </div> <!-----------------------------end of signup modal-->
  


<div class="form-group" style="color:red;">
 <?php
    
  if (isset($_GET['Message'])) {
  
	print '<script type="text/javascript">var msg = document.getElementById("login_message");
	msg.innerHTML = ("' . $_GET['Message'] . '");$("#myModal").modal();</script>';
}
    ?>
    </div>

    <div class="form-group" style="color:red;">
 <?php
    
  if (isset($_GET['Message1'])) {
  
  print '<script type="text/javascript">var msg = document.getElementById("login_message1");
  msg.innerHTML = ("' . $_GET['Message1'] . '");$("#myModal1").modal();</script>';
}
    ?>
    </div>
  </form>

<script>
$(document).ready(function(){
    $("#myBtn").click(function(){
        $("#myModal").modal();
    });
});


$(document).ready(function(){
    $("#myBtn1").click(function(){
        $("#myModal1").modal();
        
     });
});

$(document).ready(function(){
    $("#login_btn2").click(function(){
        $("#myModal1").modal();
        
     });
});

$(document).ready(function(){
    $("#login_btn1").click(function(){
        $("#myModal1").modal();
        
     });
});
</script>






</body>
</html>