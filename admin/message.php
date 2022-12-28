<?php
session_start();
include '../login/connection.php';

if (isset($_GET["delete_id"])) {
  $delete_id = $_GET["delete_id"];
  $sql = "DELETE FROM message WHERE Message_ID='$delete_id'";
  $result=mysqli_query($con,$sql);
  header("Location:/admin/message.php");
}

?>
<html>
<head>
<link rel="stylesheet" href="message.css" type="text/css">
</head>
<body>

<ul>
  <li style="float:left ; font-size:25px" ><a href="index.php">Dashboard</a></li>
  <li><a href="/login/logout.php">Log Out</a></li>
  <li><a href="adduser.php">Add user</a></li>         
</ul>

<br>
<h2 align="center">MESSAGES</h2>
<br>


<center>
<table class="center">
<thead style="align:center;">
  <tr>
    <th>Message ID</th>
    <th>Username</th>
    <th>Full Name</th>
    <th>Email</th>
    <th>Message</th>
    <th>Date</th>
    <th>Date</th>
  </tr>
</thead>
<tbody style="font-size:15px;">
<?php
$sql="SELECT * FROM message";
$result=mysqli_query($con,$sql);
if($result){
 while($row = mysqli_fetch_assoc($result)){
   $message_id=$row['Message_ID'];
   $username=$row['Username'];
   $full_name=$row['Full_Name'];
   $email=$row['Email'];
   $message=$row['Message'];
   $date=$row['Date'];
	echo '<tr>
    <td>'.$message_id.'</td>
    <td>'.$username.'</td>
    <td>'.$full_name.'</td>
    <td>'.$email.'</td>
    <td>'.$message.'</td>
    <td>'.$date.'</td>
    <td><button onclick="location.href=\'message.php?delete_id='.$message_id.'\'">Delete</button></td>
	</tr>';	
}

}


?>
  
    
</tbody>
</table>
</center>

</body>
</html>