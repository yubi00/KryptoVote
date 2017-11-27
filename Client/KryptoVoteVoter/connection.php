
<?php

define("HOST",'eu-cdbr-azure-west-b.cloudapp.net');
define("PASSWORD",'5d36efeb');
define("USERNAME","bb671e4f5b9eb5");
define("DB","krptovotesystem");

$connection=@mysql_connect(HOST,USERNAME,PASSWORD,DB);

if(!$connection)
{
	die("NOT Connected....");
}
else
{
//echo"Connected";
	
}
mysql_select_db(DB) or die(mysql_error());


?>