<?php
session_start();
if (!isset($_SESSION["sess_user"]))
{
echo"no";
 header("location:process.php");
}
else{
    
    ?>
    

<h2>Welcome,<?=$_SESSION['sess_user'];?>!<a href="logout.php">LOGOUT</h2>



<?php

}
?>