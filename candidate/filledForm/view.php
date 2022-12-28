<?php

	include '../../login/connection.php';
	session_start();

	$Application_ID = $_GET['app_id'];
	$sql = "SELECT * FROM application WHERE Application_ID = $Application_ID";
	$result = mysqli_query($con,$sql);

	$row=mysqli_fetch_assoc($result);
	$Username=$row['Username'];
	$Full_Name=$row['Full_Name'];
	$Tel_No = $row['Tel_No'];
	$Email=$row['Email'];
	$ID=$row['ID'];
	$Nationality=$row['Nationality'];
	$DOB=$row['DOB'];
	$Gender=$row['Gender'];
	$Address=$row['Address'];
	$Availability=$row['Availability'];

?>

<html>
   <head>
       <title>view</title>
       <style type="text/css">
         
         body{
           background: url("../../assets/RegisterCan.jpg");
           margin: 0;
           padding: 0;
		   height: 100%; 
           background-size: cover;
           background-position: center;
           background-repeat: no-repeat;
		   overflow: hidden;
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
           font-family: 'Courier New', Courier, monospace;
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

 
          table{
             width:50%;
             table-layout: center;
             background-color: rgba(56, 62, 97, 0.7);
          }
  
          .tbl-header{
             background-color: rgba(172, 181, 231, 0.7);
             margin-left: 150px;
           }
  
          .tbl-content{
             width: 95%;
             height:400px;
             margin-top: 100px;
             margin-left:400px;
    
             }
  
          th{
             padding: 15px 15px;
             text-align: left;
             font-weight: 600;
             font-size: 18px;
             color: rgb(39, 35, 35);
             text-transform: uppercase;
          }
  
           td{
             padding: 10px;
             text-align: left;
             vertical-align:middle;
             font-weight: 300;
             font-size: 18px;
             color: rgb(43, 39, 39);
             border-bottom: solid 1px rgba(255,255,255,0.1);
             color:#fff;
           }
		   a{
			   text-decoration: none;
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
				<a href="/candidate/jobAds/jobAds.php" class="navbar-text" >Advertisements</a>
				<a href="/main.php" class="navbar-text">Home</a>
       </div>

      
     <div class="tbl-content" >
      <table cellpadding="0" cellspacing="0" border="0">
          
          <tr>
             <th class="tbl-header">Full NAME</th>
             <td><?php echo $Full_Name;?></td>
          </tr>
		  <tr>
             <th class="tbl-header">Telephone Number</th>
             <td><?php echo $Tel_No;?></td>
          </tr>
          <tr>
             <th class="tbl-header">Email</th>
             <td><?php echo $Email;?></td>
          </tr>
          <tr>
             <th  class="tbl-header">NIC</th>
             <td><?php echo $ID;?></td>
          </tr>
          <tr>
             <th class="tbl-header">Nationality</th>
             <td><?php echo $Nationality;?></td>
          </tr>
          <tr>
             <th  class="tbl-header">DOB</th>
             <td><?php echo $DOB;?></td>
          </tr>
          <tr>
             <th class="tbl-header">Gender</th>
             <td><?php echo $Gender;?></td>
          </tr>
          <tr>
             <th  class="tbl-header">Address</th>
             <td><?php echo $Address;?></td>
          </tr>
          <tr>
             <th  class="tbl-header">Availability</th>
             <td><?php echo $Availability;?></td>
          </tr>
       </table>
     </div>
      
   </body>
</html>