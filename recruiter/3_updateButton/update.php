<?php
session_start();
include '../../login/connection.php';
$Ad_ID=$_GET['updateAd_ID'];
$sql="SELECT * FROM advertisement WHERE Ad_ID=$Ad_ID";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);
$Job_Role=$row['Job_Role'];
$Type=$row['Type'];
$Description=$row['Description'];
$Qualification=$row['Qualification'];
$Location=$row['Location'];
$Website=$row['Website'];

if(isset($_POST['submit'])){
    $Job_Role=mysqli_real_escape_string($con, $_POST['Job_Role']);
    $Type=mysqli_real_escape_string($con, $_POST['Type']);
    $Description=mysqli_real_escape_string($con, $_POST['Description']);
    $Qualification=mysqli_real_escape_string($con, $_POST['Qualification']);
    $Location=$_POST['Location'];
    $Website=$_POST['Website'];

    
    $sql="UPDATE advertisement SET Job_Role='$Job_Role',Type='$Type',Description='$Description', Qualification='$Qualification', Location='$Location',Website='$Website' WHERE Ad_ID=$Ad_ID";
    $result=mysqli_query($con,$sql);
    if($result){
        //echo "updated successfully!";
        header('location:../2_recruiterUI/display.php');
    }else{
        die(mysqli_error($con));
    }
}
?>






<html>
<head>
        <title>display</title>
        <link rel="stylesheet" href="../1_originalForm/user.css" type="text/css">
</head>
<body>
<div class="navbar">
        <a href="/login/logout.php" class="navbar-text" >Log Out</a>
        <a href="/HelpPage.php" class="navbar-text" >Help</a>
        <a href="/candidate/jobAds/jobAds.php" class="navbar-text" >Advertisements</a>
        <a href="/main.php" class="navbar-text">Home</a>
 </div>
  <!-- Topic -->
  <div class="div1">
        <h1 class="topic">#1 Platform for Hiring World Best IT Profetionals</h1>
    </div>
    <!-- form -->
    <div class="createlist"><h1>Update your listing</h1></div>
<br>
<div class="main">

<form method="post">
<fieldset>
<div>
    <label >Job Role:</label><br>
    <input type="text" class="box" placeholder="Enter the job role" name="Job_Role" autocomplete="off" value="<?php echo $Job_Role;?>">
</div>
</fieldset>
<fieldset>
<div>
    <label >Type of Tole:</label><br>
            <label><input type="radio" name="Type" value="fulltime" checked>Full time</label>
            <label><input type="radio" name="Type" value="parttime">Part time</label>
            <label><input type="radio" name="Type" value="freelance">Freelance</label>
            <label><input type="radio" name="Type" value="contract">Contract</label>
    
</div>
</fieldset>
<fieldset>
<div>
    <label >Job Description:</label><br>
    <textarea name="Description" class="box" rows="7" cols="50" placeholder="Job desccription"><?php echo $Description;?></textarea>
</div>
</fieldset>
<fieldset>
<div>
    <label >Qualifications:</label><br>
    <textarea placeholder="Qualifications" class="box" name="Qualification" rows="7" cols="50"><?php echo $Qualification;?></textarea>
    
</div>
</fieldset>
<fieldset>
<div>
    <label >Location:</label><br>
    <input type="text" class="box" placeholder="Enter location" name="Location" value="<?php echo $Location;?>">
</div>
</fieldset>
<fieldset>
<div>
    <label >Company Webite:</label><br>
    <input type="text" class="box" placeholder="Link of your website" name="Website" value="<?php echo $Website;?>">
</div>
</fieldset>
<fieldset>
  <button type="submit" name="submit"  class="btn">Update</button>
  </fieldset>
</form>
</body>
</html>