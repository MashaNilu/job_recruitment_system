<?php
	session_start();
	include '../login/connection.php';
	
	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$Name = $_POST['Name'];
		$Username = $_POST['Username'];
		$Email = $_POST['Email'];
		$Tel_No = $_POST['Tel_No'];
		$Password = $_POST['Password'];
		$User_type = $_POST['User_type'];
		
		$check_user = mysqli_query($con, "SELECT Username FROM user where Username = '$Username' ");
		if(mysqli_num_rows($check_user) > 0){
			echo"<script>window.alert('Username Already exists');</script>";
		}
		elseif(!empty($Name) && !empty($Username) && !empty($Email) && !empty($Tel_No) && !empty($Password) && !is_numeric($Username))
		{
			//save to database
			$query = "insert into user(Name, Username, Email, Tel_No, Password, User_type) values('$Name', '$Username', '$Email', '$Tel_No', '$Password', '$User_type')";
			
			mysqli_query($con, $query);
			
			header("Location:index.php");
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
			Add user
		</title>
		<link rel="stylesheet" type="text/css" href="adduser.css">
	</head>
	<body>
<br>

<div>
<ul>
  <li style="float:left ; font-size:25px" ><a href="index.php">Dashboard</a></li>
  <li><a href="/login/logout.php">Log Out</a></li>
  <li><a href="adduser.php">Add user</a></li>
  <li><a href="message.php">Message</a></li>
</ul>
</div>
<br><br>

		<div class="registerbox">
			
			<h1>Add New User</h1>
			<form method="post">
				<p>Name</p>
				<input type="text" name="Name">
				<p>Username</p>
				<input type="text" name="Username">
				<p>Email</p>
				<input type="email" name="Email">
				<p>Telephone Number</p>
				<input type="text" name="Tel_No">
				<p>Password</p>
				<input type="password" name="Password">
				<div>
                    <label for="user_type">Select user Role</label>
                    <select name="User_type" value="Candidate">
                      <option value="Admin">Admin</option>
                      <option value="Candidate">Candidate</option>
                      <option value="Recruiter">Recruiter</option>
					</select>
                </div>
				<input type="submit" name="" value="Register">
			</form>
		</div>
	</body>
</html>