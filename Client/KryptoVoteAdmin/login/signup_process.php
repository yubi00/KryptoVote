<?php


if(isset($_POST['btn_submit1']))
{
	$name=$_POST['name'];
	$username=$_POST['username'];
	$password=$_POST['password'];
	$password1=$_POST['password1'];

 //to connect to server and select database
include('../connection.php');


	//echo"connected";
	$sql="select *from insert_voter where voter_id='$username'";
	$query=mysql_query($sql,$connection);
	$row=mysql_fetch_array($query);
	if($name=="" || $username=="" || $password=="" || $password1=="")
	{
		session_start();
		$Message1="Signup field is empty";

		header("Location:../index1.php?Message1=". urlencode($Message1));
	}
	else if($row['voter_id']==$username)
	{
		$_SESSSION['sess_user1']="Thank you for signing up!!!";
		$query="INSERT INTO signup(name,username,password,repassword) values ('$name','$username','$password','$password1')";
	 $execute=mysql_query($query,$connection);
	



	if(!$execute)
{
		die("Could not insert the data..");
	}
	else
	{

$Message1="Thank you for signing up. You can now login!";
	header("Location:../index1.php?Message1=". urlencode($Message1));
		
	}
		
	}
	else
	{
	session_start();
	$Message1="Sorrry!!! You are not allowed to signup/voter_id not valid";

		header("Location:../index1.php?Message1=". urlencode($Message1));
	}
	
	

 }
else
{
	echo("is button not post");
}
?>