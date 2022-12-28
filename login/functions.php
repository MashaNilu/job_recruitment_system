<?php

function check_login($con)
{
	if(isset($_SESSION['Username']))
	{
		$id = $_SESSION['Username'];
		$query = "select * from user where Username = '$id' limit 1";
		
		$result = mysqli_query($con,$query);
		if($result && mysqli_num_rows($result) > 0)
		{
			$user_data = mysqli_fetch_assoc($result);
			return $user_data;
		}
	}
	//redirect to login
	header("Location:login.php");
	die;
}