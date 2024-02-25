<?php
session_start();
$_SESSION["tid"]="";
header("location:../Guest/login.php");
?>