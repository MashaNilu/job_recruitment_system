<?php
	include '../../login/connection.php';
	session_start();
?>
<html>
<head>
        <title>recruiter ui</title>
        <link rel="stylesheet" href="display.css" type="text/css">
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
        <a href="/contact/contactPage.php" class="navbar-text" >Contact</a>
        <a href="/candidate/jobAds/jobAds.php" class="navbar-text" >Advertisements</a>
        <a href="/main.php" class="navbar-text">Home</a>
 </div>
 <div class="activity">
     <h1 class="topic">Your Activity</h1>
 </div><center>
 <div class="tbl-content">
    <table cellpadding="0" cellspacing="0" border="0" >
  <thead>
    <tr class="tbl-header">
	  <th>DATE</th>
      <th>JOB ROLE</th>
      <th>ROLE TYPE</th>
      <th style="width: 20%">JOB DESCRIPTION</th>
      <th style="width: 20%">QUALIFICATIONS</th>
      <th>LOCATION</th>
      <th>COMPANY WEBSITE</th>
      <th style="width: 15%">OPTIONS</th>
    </tr>
  </thead>
  <tbody>

  <?php
	$username = $_SESSION["Username"];
    $sql="SELECT * FROM advertisement WHERE Username = '$username'";
    $result=mysqli_query($con,$sql);
    if($result){
        while($row=mysqli_fetch_assoc($result)){
            $Ad_ID=$row['Ad_ID'];
			      $Date=$row['Date'];
            $Job_Role=$row['Job_Role'];
            $Type=$row['Type'];
            $Description=$row['Description'];
            $Qualification=$row['Qualification'];
            $Location=$row['Location'];
            $Website=$row['Website'];
            echo '<tr>
			      <td>'.$Date.'</td>
            <td>'.$Job_Role.'</td>
            <td>'.$Type.'</td>
            <td>'.$Description.'</td>
            <td>'.$Qualification.'</td>
            <td>'.$Location.'</td>
            <td>'.$Website.'</td>
            <td>
              <button class="btn"><a href="../3_updateButton/update.php?updateAd_ID='.$Ad_ID.'">Update</a></button>
              <button class="btn"><a href="../4_deleteButton/delete.php?deleteAd_ID='.$Ad_ID.'">Delete</a></button>
			    </td>
          </tr>';
        }
    }
	else{
		echo "<script>window.alert('Could not retrieve from database.');</script>";
	}
  ?>
  </tbody>
</table></center>
</div>
<br>

<div style="font-size: 0;">
        <button class="btnspec"><a href="../5_viewApplicantsButton/firstveiw.php">View Applicants</a></button><button class="addnew"><a href="../1_originalForm/user.php">Add New</a></button>
</div>
</body>
</html>