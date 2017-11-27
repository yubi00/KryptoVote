<?php

if(isset($_POST['btn_submit']))
{
	$name=$_POST['txt_name'];
	$id=$_POST['txt_voter_id'];
	$contact=$_POST['txt_contact'];
	
   
 
 //to connect to server and select database
include('../connection.php');



$query="INSERT INTO insert_voter(name,voter_id,contact) values ('$name','$id','$contact')";
	 $execute=mysql_query($query,$connection);
	



	if(!$execute)
	{
		//die("Could not insert the data..");
		header("Location:addvoter.html");
	}
	else
	{
		echo '<script language="javascript">';
		echo 'alert("Voter has been added")';
		echo '</script>';
	header("Location:view_voter.php");
		
	}
}
else
{
	echo("is button not post");
}
?>