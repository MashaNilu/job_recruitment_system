<?php

	include '../login/connection.php';
	session_start();
    if(isset($_GET['deleteid'])){
        $username=$_GET['deleteid'];

        $sql="DELETE FROM user WHERE Username='$username'";
        $result=mysqli_query($con,$sql);
        if($result){
            //echo "Deleted successfully";
            header("location:index.php");
        }else{
            die(mysqli_error($con));
        }
    }

?>