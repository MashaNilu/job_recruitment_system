<?php
    session_start();
    include("../../login/connection.php");

    $Ad_ID=$_GET['job_id'];
    $sql = "SELECT * from advertisement WHERE Ad_ID = '".$Ad_ID."'";
    $result =mysqli_query($con,$sql);

    $row=mysqli_fetch_assoc($result);

    $Date=$row['Date'];
    $Job_Role=$row['Job_Role'];
    $Type=$row['Type'];
    $Description=$row['Description'];
    $Qualification=$row['Qualification'];
    $Location=$row['Location']; 
    $Website=$row['Website'];
?>

<html>

<head>
<style>

          body{
              background: url("../../assets/RegisterCan.jpg");
              margin: 0;
              padding: 0;
              background-size:cover;
              width: 100%; 
              height: 100vh; 
              overflow: hidden;
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
             background-color: #000;
             opacity: 85%;
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
           button {
             border-radius: 5px;
             background-color: #0492c2;
             padding: 10px;
             margin: 20px;
             color:  white;
             cursor: pointer;
             text-decoration: none;
           }

           button:hover{
             background-color: darkblue;
             color: white;
             box-shadow:slategrey 5px 5px 15px ;
           }
           a
          {
             text-decoration: none;
             color: white;
             font-weight: 700;
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
         <!--<font color="white" size="35px" >Job Advertisements</font>-->
         <a href="/login/logout.php" class="navbar-text" >Log Out</a>
         <a href="/HelpPage.php" class="navbar-text" >Help</a>
         <a href="/contact/contactPage.php" class="navbar-text" >Contact</a>
         <a href="/main.php" class="navbar-text">Home</a>
</div>

<div class="tbl-content" >
<table>
         <?php

             $query="SELECT * FROM advertisement WHERE advertisement.Ad_ID='$Ad_ID'";
             $result =mysqli_query($con,$query);
            $row=mysqli_fetch_assoc($result);
			$_SESSION['Ad_ID'] = $Ad_ID;
                ?>
                       <tr>
                         <th class="tbl-header">Job Role</th>
                         <td><?php echo $row['Job_Role'];?></td>
                       </tr>
                       <tr>
                         <th class="tbl-header">Created Date</th>
                         <td><?php echo $row['Date'];?></td>
                       </tr>
                       <tr>
                         <th class="tbl-header">Type</th>
                         <td><?php echo $row['Type'];?></td>
                       </tr>
                       <tr>
                         <th class="tbl-header">Description</th>
                         <td><?php echo $row['Description'];?></td>
                       </tr>
                       <tr>
                         <th class="tbl-header">Qualification</th>
                         <td><?php echo $row['Qualification'];?></td>
                       </tr>
                       <tr>
                         <th class="tbl-header">Location</th>
                         <td><?php echo $row['Location'];?> </td>
                       </tr>
                       <tr>
                         <th class="tbl-header">Website</th>
                         <td><?php echo $row['Website'];?></td>
                       </tr>
                       <?php
                        if (isset($_SESSION["Username"])) {
                          $Username = $_SESSION["Username"];
                          $sql = "SELECT User_type FROM user WHERE Username = '$Username'";
                          $result = mysqli_query($con,$sql);
                          $row=mysqli_fetch_assoc($result);
                          if ($row['User_type'] == "Candidate") {
                            echo "<tr>
                              <th colspan='2'><button><a href='../applicationForm/form.php'>Apply Now</a></button></th>
                            </tr>";
                          }
                        }
                        else {
                          echo "<tr>
                            <th colspan='2'><button><a href='../applicationForm/form.php'>Apply Now</a></button></th>
                          </tr>";
                        }
                        
                        
                       ?>
</table>
</div>     

</body>
</html>