<?php
include '../login/connection.php';
session_start();
?>
<html>
<head>
<link rel="stylesheet" href="index.css" type="text/css">
<title>Dashboard</title>
</head>
<body>

<div>
<br>
<ul>
  <li style="float:left ; font-size:25px" ><a href="index.php">Dashboard</a></li>
  <li><a href="/login/logout.php">Log Out</a></li>
  <li><a href="adduser.php">Add user</a></li>
  <li><a href="message.php">Message</a></li>
</ul>
</div>
<div>
<h2 align="center">Users List</h2>
</div>
<br><br>
<div>
<center>
<table "border="0"; class="center">
<thead>
  <tr>
    <th>Username</th>
    <th>Name</th>
    <th>Email address</th>
    <th>Mobile</th>
    <th>Created At</th>
    <th>Password</th>
    <th>Action</th>
  </tr>
</thead>
<tbody>
<?php
$sql="select * from user";
$result=mysqli_query($con,$sql);
if($result){
 while($row = mysqli_fetch_assoc($result)){
   $username=$row['Username'];
   $name=$row['Name'];
   $email=$row['Email'];
   $tel_no=$row['Tel_No'];
   $created=$row['Created_At'];
   $password=$row['Password'];
	echo '<tr>
    <td>'.$username.'</td>
    <td>'.$name.'</td>
    <td>'.$email.'</td>
    <td>'.$tel_no.'</td>
    <td>'.$created.'</td>
    <td>'.$password.'</td>
<td><button class="button1"><a href="edit.php?updateid='.$username.'" style="text-decoration:none">Edit</a></button>
    <button class="button2"><a href="delete.php?deleteid='.$username.'" style="text-decoration:none">Remove</a></button>
    <button class="button3"><a href="view.php?viewid='.$username.'" style="text-decoration:none">View</a></button>
  
</tr>';	
}

}


?>
  
    
</tbody>
</table>
</center>
</div>
</body>
</html>