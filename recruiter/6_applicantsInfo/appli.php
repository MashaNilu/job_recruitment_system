<?php

include 'connect.php';
session_start();
$id=$_GET['updateid'];
$sql="select * from applicant_form where id=$id";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);
$username=$row['username'];
$full_name=$row['full_name'];
$email=$row['email'];
$nic=$row['nic'];
$nationality=$row['nationality'];
$DOB=$row['DOB'];
$gender=$row['gender'];
$address=$row['address'];
$job_applying=$row['job_applying'];
$availability=$row['availability'];
?>

<html>
    <head>
        <title>the applicant</title>
        <link rel="stylesheet" href="appli.css" type="text/css">

</head>
<body>
<div class="navbar">
        <?php
            if (isset($_SESSION["Username"])) {
              $Username = $_SESSION["Username"];
              echo "<a class='navbar-welcome'>Hi, $Username</a>";
            }
          ?>
        <a href="/login/logout.php" class="navbar-text" >Log Out</a>
        <a href="/HelpPage.php" class="navbar-text" >Help</a>
        <a href="/candidate/jobAds/jobAds.php" class="navbar-text" >Advertisements</a>
        <a href="/main.php" class="navbar-text">Home</a>
 </div>
 <div class="activity">
     <h1 class="topic">Applicant's  Information</h1>
 </div>
 <div class="tbl-content" ><center>
<table cellpadding="0" cellspacing="0" border="0">
<thead>
    <tr>
        <th class="tbl-header">USER NAMEE</th>
        <td><?php echo $username;?></td>
    </tr>
    <tr>
        <th class="tbl-header">FULL NAME</th>
        <td><?php echo $full_name;?></td>
    </tr>
    <tr>
        <th class="tbl-header">EMAIL</th>
        <td><?php echo $email;?></td>
    </tr>
    <tr>
        <th  class="tbl-header">NIC NUMBER</th>
        <td><?php echo $nic;?></td>
    </tr>
    <tr>
        <th class="tbl-header">NATIONALITY</th>
        <td><?php echo $nationality;?></td>
    </tr>
    <tr>
        <th class="tbl-header">DOB</th>
        <td><?php echo $DOB;?></td>
    </tr>
    <tr>
        <th class="tbl-header">GENDER</th>
        <td><?php echo $gender;?></td>
    </tr>
    <tr>
        <th class="tbl-header">ADDRESS</th>
        <td><?php echo $address;?></td>
    </tr>
    <tr>
        <th class="tbl-header">JOB APPLYING</th>
        <td><?php echo $job_applying;?></td>
    </tr>
    <tr>
        <th class="tbl-header">AVAILABILITY</th>
        <td><?php echo $availability;?></td>
    </tr>  
    
</table></center>
</div><br><br><br>
<div>
        <button class="btnback"><a href="firstveiw.php">Back</a></button>
</div>
</body>
</html>