<?php

include '../login/connection.php';
session_start();
$username=$_GET['updateid'];
$sql = "SELECT * FROM user WHERE Username = '$username'";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);
$name=$row['Name'];
$email =$row['Email'];
$tel_no =$row['Tel_No'];
$password =$row['Password'];
$user_type =$row['User_type'];

if (isset($_POST['submit'])) {
	$username_old = $username;
	$username = $_POST['username'];
	$name = $_POST['name'];
	$email = $_POST['email'];
	$tel_no = $_POST['tel_no'];
	$password = $_POST['password'];
	$user_type =$_POST['user_type'];

	$check_user = mysqli_query($con, "SELECT Username FROM user WHERE Username = '$username' ");
	if(mysqli_num_rows($check_user) > 0){
		echo"<script>window.alert('Username Already exists');</script>";
	}
	elseif(!empty($name) && !empty($username) && !empty($email) && !empty($tel_no) && !empty($password) && !is_numeric($username))
	{
		//save to database
		$query = "INSERT INTO user(Name, Username, Email, Tel_No, Password, User_type) VALUES ('$name', '$username', '$email', '$tel_no', '$password', '$user_type')";
		
		mysqli_query($con, $query);
		
		header("Location:index.php");
		die;
	}
	else
	{
		echo "<script>window.alert('Please Enter Valid Information');</script>";
	}


$sql = "update user set Name='$name',Username='$username',Email='$email',
		Tel_No=$tel_no,password='$password',User_type='$user_type' where Username='$username_old'";
$result=mysqli_query($con,$sql);
if($result){

	header('location:index.php');
	//echo "updated";
}else{
	die(mysqli_error($con));
}

}

 ?>
<html>
<head>
<link rel="stylesheet" href="edit.css" type="text/css">
</head>
<body>

<ul>
  <li style="float:left ; font-size:25px" ><a href="index.php">Dashboard</a></li>
  <li><a href="/login/logout.php">Log Out</a></li>
  <li><a href="adduser.php">Add user</a></li> 
  <li><a href="message.php">Message</a></li>        
</ul>


          <h2 align="center">UPDATE USER</h2>

            <form method="post">
                <div>
                  <label for="name">Name</label>
                  <input type="text" name="name" value=<?php echo $name;?>>
                </div><br>
                <div>
                  <label for="username">Username</label>
                  <input type="text" name="username" value=<?php echo $username;?>>
                </div><br>
                <div>
                  <label for="email">Email address</label>
                  <input type="email" name="email" value=<?php echo $email;?>>
                </div><br>
                <div>
                  <label for="tel_no">Mobile Number</label>
                  <input type="text" name="tel_no" value=<?php echo $tel_no;?>>
                </div><br>
                <div>
                  <label for="password">Password</label>
                  <input type="password" name="password" value=<?php echo $password;?>>
                </div><br>
                <div>
                    <label for="user_type">Select user Role</label>
                    <select name="user_type" value=<?php echo $user_type;?>>
                      <option value="Admin">Admin</option>
                      <option value="Candidate">Candidate</option>
                      <option value="Recruiter">Recruiter</option>
					</select>
                </div><br>
                
                  <input type="submit" value="Update" name="submit">
                  <input type="reset" value="Cancel">


            </form>
          </body>
</html>