<?php
$username=$_POST['username'];
$password=$_POST['password'];
//TO PREVENT MYSQL INJECTION
$username=stripcslashes($username);
$password=stripcslashes($password);
//$username=mysql_real_escape_string($username);
$password=($password);
//to connect to server and select database
include('../connection.php');

	echo"connected";
	$sql="select *from signup where username='$username' and password='$password'";
	$query=mysql_query($sql,$connection);
	$row=mysql_fetch_array($query);
	if($username=="" || $password=="")
     {
     session_start();
     $Message="Empty username or password";

		header("Location:../index1.php?Message=". urlencode($Message));
     }
     else if(($row['username']==$username && $row['password']==$password) &&$row['username']!='admin' )
	{
		
		
		session_start();
		$_SESSION['sess_user']=$username;
		$_SESSION['sess_name']=$row['name'];
			header("Location:../index2.php");
		

	}
	
	 else if($row['username']==$username && $row['password']=='admin')
     {
     	session_start();
		$_SESSION['sess_user']=$username;
     	header("Location:../admin1/dashboard.php");
     }
          else
     {
     session_start();
       $Message="Invalid username or password";

		header("Location:../index1.php?Message=". urlencode($Message));
     }
	
	?>