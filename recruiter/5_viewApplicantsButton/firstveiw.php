<?php
	include '../../login/connection.php';
	session_start();
  $Username = $_SESSION["Username"];

	if (isset($_GET['app_id'])) {
		$app_id = $_GET['app_id'];
		$sql="SELECT CV, Username FROM application WHERE Application_ID = '$app_id'";
		$result=mysqli_query($con,$sql);
		if($result){
			$row=mysqli_fetch_assoc($result);
			header("Content-Length: " . strlen($row['CV']) );
			header("Content-Type: application/pdf");
			header('Content-Disposition: attachment; filename="'.$row['Username'].'-cv.pdf"');
			header("Content-Transfer-Encoding: binary\n");
			echo $row['CV'];
		}
	}
?>
<html>
<head>
        <title>applicant's info</title>
        <link rel="stylesheet" href="firstveiw.css" type="text/css">
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
     <h1 class="topic">Your Activity</h1>
 </div>

 <div class="tbl-content" >
    <table cellpadding="0" cellspacing="0" border="0">
      <thead>
        <tr class="tbl-header">
            <th>JOB ROLE</th>
            <th>APPLICANT'S FULL NAME</th>
            <th>VEIW APPLICANT </th>
            <th>DOWNLOAD CV</th>
          </tr>
      </thead>
      <tbody>
        <?php
          $sql="SELECT * FROM application JOIN advertisement ON application.Ad_ID = advertisement.Ad_ID WHERE advertisement.Username = '$Username'";
          $result=mysqli_query($con,$sql);
          if($result){
            while($row=mysqli_fetch_assoc($result)){
              $id=$row['Application_ID'];
              $job_role=$row['Job_Role'];
              $Full_Name=$row['Full_Name'];
              echo '<tr>
                <td>'.$job_role.'</td>
                <td>'.$Full_Name.'</td>
                <td><button class="btn"><a href="../../candidate/filledForm/view.php?app_id='.$id.'">View</a></button></td>
                <td><button class="btn"><a href="firstveiw.php?app_id='.$id.'">Download</a></button></td>
              </tr>';
            }
          }
        ?>
      </tbody>
      </table>
  </div>

  <!--<button class="btnspec"><a href="location:../2_recruiterUI/display.php">Back</a></button>-->
</body>
</html>