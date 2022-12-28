<?php
	session_start();
	include 'login/connection.php';

	if (isset($_SESSION["Username"])){
		$Username = $_SESSION["Username"];
		$sql = "SELECT User_type FROM user WHERE Username = '$Username'";
		$result = mysqli_query($con,$sql);
		$row = mysqli_fetch_assoc($result);
		if ($row["User_type"] == "Candidate"){
			header("Location:/candidate/UI/candidateUI.php");
		}
		elseif ($row["User_type"] == "Recruiter"){
			header("Location:/recruiter/2_recruiterUI/display.php");
		}
		else {
			header("Location:/admin/index.php");
		}
	}
?>

<html>
    <head>
        <title>ABC Company</title>
		<link href="mainStyle.css" rel="stylesheet" type="text/css"> 
    </head>

    <body>
	  	<!-- navigation bar -->
		  <div class="navbar">
			<ul>
				<li><a href="/HelpPage.php" class="navbar-text" >Help</a></li>
				<li><a href="/contact/contactPage.php" class="navbar-text">Contact</a></li>
				<li><a href="/login/login.php" class="navbar-text" >Log in</a></li>
				<li><a href="/candidate/jobAds/jobAds.php" class="navbar-text" >Advertisements</a></li>
			</ul>
		  </div>

		  
		<!-- topic-->
		<header>
			<div>
				<div>
					<h1 class="top-topic">LOOKING FOR A JOB?</h1>
		<!-- middle -->
		<hr>
					<p class="middle">Welcome! You are in the best online job recruitment site.<br>
					Explore new jobs here. </p>
				</div>
		<hr>
			</div>
		<!-- list -->
		<div class="vl"></div>
			<div class="div1">
				<ul>
					<li><a href="login/register.php"><button class="button-style">I am a Job Seeker.</button></a></li>
					<li><a href="login/registerRec.php"><button class="button-style">I am a Recruiter.</button></a></li>
				</ul>
			</div>
		</header>
		

</body>
</html>