<?php
session_start();
$_SESSION["sid"]="";
header("location:../Guest/login.php");
?>