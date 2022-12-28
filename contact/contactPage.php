<?php
	session_start();
	include("../login/connection.php");
	
	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		$Full_Name = $_POST['Full_Name'];
		$Email = $_POST['Email'];
		$Message = $_POST['Message'];
		
		if(!empty($Full_Name) && !empty($Email) && !empty($Message))
		{
			if (isset($_SESSION["Username"])) {
				$Username = $_SESSION['Username'];
				mysqli_query($con, "INSERT INTO message(Full_Name, Username, Email, Message) values('$Full_Name', '$Username', '$Email', '$Message')");
			}
			else
				mysqli_query($con, "INSERT INTO message(Full_Name, Email, Message) values('$Full_Name', '$Email', '$Message')");
		}
		else
		{
			echo "<script>window.alert('Please enter valid information');</script>";
		}
	}
?>

<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Contact US Page</title>
		<link rel="stylesheet" type="text/css" href="contactStyle.css">
	</head>
	<body>
		<div class="navbar">
				<?php
            if (isset($_SESSION["Username"])) {
              $Username = $_SESSION["Username"];
              echo "<a class='navbar-welcome'>Hi, $Username</a>";
            }
          ?>
				<a href="/HelpPage.php" class="navbar-text" >Help</a>
				<a href="/login/logout.php" class="navbar-text" >Log Out</a>
				<a href="/candidate/jobAds/jobAds.php" class="navbar-text" >Advertisements</a>
				<a href="/main.php" class="navbar-text">Home</a>
		 </div>
		<section class="contact">
			<div class="content">
				<h2>Contact Us</h2>
			</div>
			<div class="container">
				<div class="contactInfo">
					<div class="box">
						<div class="icon">
							<img class = "img" src="../assets/Phone.jpg">
						</div>
						<div class="text">
							<h3>Phone</h3>
							<p>+94 112734498</p>
						</div>
					</div>
					<div class="box">
						<div class="icon">
							<img class = "img" src="../assets/Email.jpg">
						</div>
						<div class="text">
							<h3>Email</h3>
							<p>jobhub@gmail.com</p>
						</div>
					</div>
				</div>
				<div class="contactForm">
					<form method="post">
						<h2>Send Message</h2>
						<div class="inputBox">
							<input type="text" name="Full_Name" required="required">
							<span>Full Name</span>
						</div>
						<div class="inputBox">
							<input type="text" name="Email" required="required">
							<span>Email</span>
						</div>
						<div class="inputBox">
							<textarea name="Message" required="required"></textarea>
							<span>Type your Message...</span>
						</div>
						<div class="inputBox">
							<input type="submit" name="" value="Send">
						</div>
					</form>
				</div>
			</div>
		</section>
	</body>
</html>