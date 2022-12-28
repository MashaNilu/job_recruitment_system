<?php
session_start();
include '../../login/connection.php';

if(isset($_POST['submit'])){
    //$company_name=$_POST['company_name'];
	$Username=$_SESSION['Username'];
    $Job_Role=$_POST['Job_Role'];
    $Type=$_POST['Type'];
    $Description=$_POST['Description'];
    $Qualification=$_POST['Qualification'];
    $Location=$_POST['Location'];
    $Website=$_POST['Website'];
	$Image=$_POST['Image'];
    
    $sql="insert into advertisement (Username, Job_Role,Type,Description,Qualification,Location,Website, Image)
    values('$Username','$Job_Role','$Type','$Description','$Qualification','$Location','$Website', '$Image')";
    $result=mysqli_query($con,$sql);
    if($result){
        //echo "Data iserted successfully!";
        header('location:../2_recruiterUI/display.php');
    }else{
        die(mysqli_error($con));
    }
}
?>


<html>
<head>
        <title>display</title>
        <link rel="stylesheet" href="user.css" type="text/css">
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
        <a href="/candidate/jobAds/jobAds.php" class="navbar-text" >Top Ads</a>
        <a href="/main.php" class="navbar-text">Home</a>
 </div>
  <!-- Topic -->
  <div class="div1">
        <h1 class="topic">#1 Platform for Hiring World Best IT Profetionals</h1>
    </div>
    <!-- form -->
    <div class="createlist"><h1>Create your listing</h1></div>
<br>
<div class="main">
<form method="post">
<!--<fieldset>
  <div>
    <label >Company Name:</label><br>
    <input type="text" class="box" placeholder="Enter company name" name="company_name" autocomplete="off">
</div>
</fieldset>-->
<fieldset>
<div>
    <label >Job Role:</label><br>
    <input type="text" class="box" placeholder="Enter the job role" name="Job_Role" autocomplete="off">
</div>
</fieldset>
<fieldset>
<div>
<label >Type of Role:</label><br>
            <label><input type="radio" name="Type" value="fulltime">Full time</label>
            <label><input type="radio" name="Type" value="parttime">Part time</label>
            <label><input type="radio" name="Type" value="freelance">Freelance</label>
            <label><input type="radio" name="Type" value="contract">Contract</label>
</div>
</fieldset>
<fieldset>
<div>
    <label >Job Description:</label><br>
    <textarea name="Description" class="box" rows="7" cols="50" ></textarea>
</div>
</fieldset>
<fieldset>
<div>
    <label >Qualifications:</label><br>
    <textarea class="box" name="Qualification" rows="7" cols="50"></textarea>
</div>
</fieldset>
<fieldset>
<div>
    <label >Location:</label><br>
    <input type="text" class="box" placeholder="Enter location" name="Location">
</div>
</fieldset>
<fieldset>
<div>
    <label >Company Webite:</label><br>
    <input type="text" class="box" placeholder="Link of your website" name="Website">
</div>
</fieldset>
<fieldset>
  <div>
    <label >Insert Image:</label><br>
    <input type="file" id="img" accept="image/*" class="box" placeholder="Inssert an Image" name="Image" autocomplete="off">
</div>
</fieldset>
<fieldset>
<div>
  <button type="submit" name="submit" class="btn">Submit</button>
</div>
</fieldset>
</form>
</div>
</body>
</html>