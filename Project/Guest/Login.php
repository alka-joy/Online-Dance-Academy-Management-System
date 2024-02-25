<?php
session_start();
include(".../Assets/Connection/connection.php");
if(isset($_POST['Login']))
{
	$email=$_POST["txt_email"];
	$password=$_POST["txt_password"];
	
	$selAdmin="select * from tbl_admin where admin_email='$email' and admin_password='$password'";
	$dataAdmin=mysql_query($selAdmin);
	
	$selStudent="select * from tbl_studentregistration where student_email='$email' and student_password='$password'";
	$dataStudent=mysql_query($selStudent);
		
	
     $selTrainer="select * from tbl_trainer where trainer_email='$email' and trainer_password='$password'";
	$dataTrainer=mysql_query($selTrainer);
		
		
	if($rowAdmin=mysql_fetch_array($dataAdmin))
	{
		$_SESSION["admin_name"]=$rowAdmin["admin_name"];
		$_SESSION["admin_id"]=$rowAdmin["admin_id"];
		header("location:../Admin/HomePage.php");
	}
	else if($rowStudent=mysql_fetch_array($dataStudent))
		{
			$_SESSION["student_name"]=$rowStudent["student_name"];
		    $_SESSION["student_id"]=$rowStudent["student_id"];
		    header("location:../Student/HomePage.php");
	}
	else if($rowTrainer=mysql_fetch_array($dataTrainer))
		{
			$_SESSION["trainer_name"]=$rowTrainer["trainer_name"];
		    $_SESSION["trainer_id"]=$rowTrainer["trainer_id"];
		    header("location:../Trainer/Homepage.php");
	}
	else
	{
      echo "<script> alert ('Invalid username or password')</script>";
    
	}
}
?>













<!doctype html>
<html lang="en">
  <head>
  	<title>Login 01</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="../Assets/Template/Login/css/style.css">

	</head>
	<body style="background-image: url(../Assets/Template/Main/img/banner/blue1.jpg);background-size: cover;" >
	<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section" >Login  DropBeat</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-7 col-lg-5">
					<div class="login-wrap p-4 p-md-5">
		      	<div class="icon d-flex align-items-center justify-content-center">
					<svg xmlns="http://www.w3.org/2000/svg" height="1.25em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#ffffff}</style><path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z"/></svg>  	</div>
		      	<h3 class="text-center mb-4">Sign In</h3>
						<form action="#" class="login-form" method="post">
		      		<div class="form-group">
		      			<input type="text" class="form-control rounded-left" placeholder="Username" required name="txt_email">
		      		</div>
	            <div class="form-group d-flex">
	              <input type="password" class="form-control rounded-left" placeholder="Password" required name="txt_password">
	            </div>
	            <div class="form-group">
	            	<button type="submit" class="form-control btn  rounded submit px-3" name="Login" style="color: black;">Login</button>
	            </div>
	          </form>
			  
	        </div>
				</div>
			</div>
		</div>
	</section>

	<script src="../Assets/Template/Login/js/jquery.min.js"></script>
  <script src="../Assets/Template/Login/js/popper.js"></script>
  <script src="../Assets/Template/Login/js/bootstrap.min.js"></script>
  <script src="../Assets/Template/Login/js/main.js"></script>

	</body>
</html>

