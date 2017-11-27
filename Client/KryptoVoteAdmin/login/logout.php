<?php
session_start();
unset($_SESSSION['sess_user']);
session_destroy();
header("location:../index1.php");
?>