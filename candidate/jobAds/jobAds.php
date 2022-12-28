<?php
    include("../../login/connection.php");
	session_start();

  if (isset($_GET['search'])){
    $search=$_GET['search'];
    $sql = "SELECT * from advertisement INNER JOIN user ON advertisement.Username=user.Username WHERE Job_Role  like '%$search%'";
  }
  else{
    $sql = "SELECT * from advertisement INNER JOIN user ON advertisement.Username=user.Username";
  }
$result =mysqli_query($con,$sql);

?>

<html>
    <head>
        <title>jobAds</title>
  
        <link rel="stylesheet" type="text/css" href="card.css">
    </head>

    <body>
    
      <div class="navbar">
        <?php
            if (isset($_SESSION["Username"])) {
              $Username = $_SESSION["Username"];
              echo "<a class='navbar-welcome'>Hi, $Username</a>";
            }
          ?>
         <a class="navbar-topic">Job Advertisements</a>
         <a href="/login/logout.php" class="navbar-text" >Log Out</a>
         <a href="/HelpPage.php" class="navbar-text" >Help</a>
         <a href="/contact/contactPage.php" class="navbar-text" >Contact</a>
         <a href="/main.php" class="navbar-text">Home</a>
      </div>

     
      <div class="find">
       <form method="get">
        <input type="text" name="search" value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" placeholder="Find your dream job">
        <button type="submit" >search</button>
       </form>

       </div>  
        
      
            
      <?php while ($row = mysqli_fetch_array($result)) { ?> 
      <div class="status1">
          <div class="card">
              <div class="photo">
                 <img src="<?php echo $row['Image'];?>">
              </div>
  
               <div class="description">
                 <p><h2><?php echo $row['Job_Role'];?></h2><br /><?php echo $row['Name'];?></p>
                 <button onclick="<?php echo "location.href='formfunc.php?job_id=".$row['Ad_ID']."'"?>">View</button>
               </div>
          </div>
      </div>

     
        <?php
        }    ?> 
    </body>
</html>