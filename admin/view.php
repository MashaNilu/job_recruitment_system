<?php

include '../login/connection.php';
session_start();
$username=$_GET['viewid'];
$sql = "SELECT * FROM user WHERE Username = '$username'";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);
$name=$row['Name'];
$username =$row['Username'];
$email =$row['Email'];
$tel_no =$row['Tel_No'];
$password =$row['Password'];
$user_type =$row['User_type'];


 ?>
<html>
<head>
<link rel="stylesheet" href="view.css" type="text/css">
</head>
<body>

<ul>
  <li style="float:left ; font-size:25px" ><a href="index.php">Dashboard</a></li>
  <li><a href="/login/logout.php">Log Out</a></li>
  <li><a href="adduser.php">Add user</a></li> 
  <li><a href="message.php">Message</a></li>        
</ul>


          <h2 align="center">VIEW USER</h2>
	     <div class="tbl-content" >	
            <table cellpadding="0" cellspacing="0" border="0" align="center">
          
          <tr>
             <th class="tbl-header">Full NAME</th>
             <td><?php echo $name;?></td>
          </tr>
	   <tr>
             <th class="tbl-header">User name</th>
             <td><?php echo $username;?></td>
          </tr>
          <tr>
             <th class="tbl-header">Email</th>
             <td><?php echo $email;?></td>
          </tr>
          
         <tr>
             <th class="tbl-header">tel_no</th>
             <td><?php echo $tel_no;?></td>
          </tr>
	   <tr>
             <th class="tbl-header">password</th>
             <td><?php echo $password;?></td>
          </tr>
          <tr>
             <th class="tbl-header">user role</th>
             <td><?php echo $user_type;?></td>
          </tr>
    
       </table>
     </div>
        </body>
	</html>















