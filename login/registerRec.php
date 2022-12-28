<?php
	session_start();
	include("connection.php");
	
	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$Name = $_POST['Name'];
		$Username = $_POST['Username'];
		$Email = $_POST['Email'];
		$Tel_No = $_POST['Tel_No'];
		$Password = $_POST['Password'];
		
		$check_user = mysqli_query($con, "SELECT Username FROM user where Username = '$Username' ");
		if(mysqli_num_rows($check_user) > 0){
			echo"<script>window.alert('Username Already exists');</script>";
		}
		elseif(!empty($Name) && !empty($Username) && !empty($Email) && !empty($Tel_No) && !empty($Password) && !is_numeric($Username))
		{
			//save to database
			$query = "insert into user(Name, Username, Email, Tel_No, Password, User_type) values('$Name', '$Username', '$Email', '$Tel_No', '$Password', 'Recruiter')";
			
			mysqli_query($con, $query);
			
			header("Location:login.php");
			die;
		}
		else
		{
			echo "<script>window.alert('Please Enter Valid Information');</script>";
		}
	}
?>

<html>
	<head>
		<title>
			Register Page
		</title>
		<link rel="stylesheet" type="text/css" href="RegisterRecPageStyle.css">
	</head>
	<body>
		<div class="navbar">
				<a href="/HelpPage.php" class="navbar-text" >Help</a>
				<a href="/contact/contactPage.php" class="navbar-text">Contact</a>
				<a href="/main.php" class="navbar-text" >Home</a>
				<a href="/candidate/jobAds/jobAds.php" class="navbar-text" >Advertisements</a>
		</div>
		<div class="registerbox">
			<img src="/assets/Avatar.png" class="avatar">
			<h1>Register as a Recruiter</h1>
			<form method="post">
				<p>Company Name</p>
				<input type="text" name="Name">
				<p>Username</p>
				<input type="text" name="Username">
				<p>Email</p>
				<input type="email" name="Email">
				<p>Telephone Number</p>
				<input type="text" name="Tel_No">
				<p>Password</p>
				<input type="password" name="Password">
				<input type="submit" name="" value="Register">
				<a href="login.php" >Already have an account?</a>
			</form>
		</div>
	</body>
</html>