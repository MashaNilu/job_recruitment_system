<?php
	session_start();
	include("../../login/connection.php");
	include("../../login/functions.php");
	
	$user_data = check_login($con);
	$Username=$_SESSION['Username'];
	// Date, Job role, Company, View (button)
	$sql = "SELECT application.Ad_ID as Ad_ID, application.Application_ID AS Application_ID,
         application.Date AS Date, Job_Role, user.Name AS Company
			FROM application
         JOIN advertisement ON application.Ad_ID = advertisement.Ad_ID
         JOIN user ON user.Username = advertisement.Username
         WHERE application.Username='$Username'";
	$result =mysqli_query($con,$sql);
?>

<html>
   <head>
      <title>Form_view</title>

      <style type="text/css">

         body{
            background: url("../../assets/RegisterCan.jpg");
            margin: 0;
            padding: 0;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
          }
          .navbar{
             height:50px;
             opacity: 80%;
             background-color: #000;
           }
     
          .navbar-text{
            float: right;
            padding: 15px;
            font-size: 17px;
            font-weight: 900;
            font-family: Courier New, Courier, monospace;
            color: #fff;
          }
         .navbar-text:hover{
           color: lightblue;
           text-decoration: none;
         }

         .navbar-welcome{
            float: left;
            padding: 15px;
            font-size: 17px;
            font-weight: 900;
            font-family: 'Courier New', Courier, monospace;
            color: #fff;
         }
        
          table {
            table-layout: none;
            background-color: rgba(0, 0, 0, 0.7);
            table-layout: fixed;
            width: 70%;
            margin-left: auto;
            margin-right: auto;
            color: #fff;
            text-align: center;
          }
          table th{
              font-size: 26px;
          }

          button {
             border-radius: 5px;
             background-color: #0492c2;
             padding: 10px;
             margin: 30px;
             color:  white;
             cursor: pointer;
             text-decoration: none;
          }

          table td:hover button {
             background-color:darkblue;
             color: #fff;
             box-shadow:slategrey 5px 5px 15px ;
          }

         a
         {
           text-decoration: none;
           color: white;
           font-weight: 800;
         }


      </style>
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
         <a href="/candidate/jobAds/jobAds.php" class="navbar-text">Advertisements</a>
         <a href="/main.php" class="navbar-text">Home</a>
      </div>
      <br />
      <table border="0">
		<tr>
			<th>Ad_ID</td>
			<th>Applied Date</td>
			<th>Job_Role</td>
			<th>Company</td>
			<th>View</td>
		</tr>

		<?php
			while ($row=mysqli_fetch_assoc($result)) {
				echo "<tr>";
				echo "<td>".$row['Ad_ID']."</td>";
				echo "<td>".$row['Date']."</td>";
				echo "<td>".$row['Job_Role']."</td>";
				echo "<td>".$row['Company']."</td>";
				echo "<th><button class='btn'><a href='../filledForm/view.php?app_id=".$row['Application_ID']."'>View</a></button></td>";
				echo "</tr>";
			}
		?>
        
      </table>
   </body>
</html>