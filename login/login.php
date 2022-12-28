<?php
	session_start();
	include("connection.php");
	
	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$Username = $_POST['Username'];
		$Password = $_POST['Password'];
		
		if(!empty($Username) && !empty($Password) && !is_numeric($Username))
		{
			//read from the database
			$query_user = "SELECT * FROM user WHERE Username = '$Username' LIMIT 1";
			$result = mysqli_query($con, $query_user);
			
			if($result)
			{
				if(mysqli_num_rows($result) > 0)
				{
					$user_data = mysqli_fetch_assoc($result);
					if($user_data['Password'] === $Password)
					{
						$_SESSION['Username'] = $Username;
						$user_type = $user_data['User_type'];
						if($user_type == 'Candidate')
						{
							header("Location:../candidate/UI/candidateUI.php");
							die;
						}
						elseif($user_type == 'Recruiter')
						{
							header("Location:../recruiter/2_recruiterUI/display.php");
							die;
						}
						else {
							header("Location:../admin/index.php");
							die;
						}
					}
				}
			}
			echo "<script>window.alert('Please enter a correct password');</script>";
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
			Login Page
		</title>
		<link rel="stylesheet" type="text/css" href="LoginPage.css">
	</head>
	<body>
		<div class="navbar">
			<a href="/HelpPage.php" class="navbar-text" >Help</a>
			<a href="/main.php" class="navbar-text">Home</a>
		</div>
		<div class="loginbox">
			<img src="../assets/Avatar.png" class="avatar">
			<h1>Login Here</h1>
			<form method="post">
				<p>Username</p>
				<input type="text" name="Username">
				<p>Password</p>
				<input type="password" name="Password">
				<input type="submit" name="" value="Login">
				<p>Don't have an account?</p>
				<a href="register.php" >Register as a job seeker</a><br />
				<a href="registerRec.php">Register as a recruiter</a>
			</form>
		</div>
	</body>
</html>