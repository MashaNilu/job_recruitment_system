<?php

    include '../../login/connection.php';
	session_start();
    if(isset($_GET['deleteAd_ID'])){
        $Ad_ID=$_GET['deleteAd_ID'];

        $sql="delete from application where Ad_ID=$Ad_ID";
        $result=mysqli_query($con,$sql);
        if (!$result){
            die(mysqli_error($con));
        }
        
        $sql="delete from advertisement where Ad_ID=$Ad_ID";
        $result=mysqli_query($con,$sql);
        if($result){
            //echo "Deleted successfully";
            header("location:../2_recruiterUI/display.php");
        }else{
            die(mysqli_error($con));
        }
    }

?>