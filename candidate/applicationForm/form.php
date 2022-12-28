<?php
	session_start();
	include '../../login/connection.php';

  if (!isset($_SESSION["Username"])){
    header("Location:/login/register.php");
  }
    
	if($_SERVER['REQUEST_METHOD'] == "POST")
    {
		 //$Application_ID = $_POST['Application_ID'];
		    $Ad_ID = $_SESSION['Ad_ID'];
		    $Username=$_SESSION['Username'];
         $Full_Name = $_POST['Full_Name'];
		    $Tel_No = $_POST['Tel_No'];
         $Email = $_POST['Email'];
         $ID = $_POST['ID'];
         $Nationality = $_POST['Nationality'];
         $DOB = $_POST['DOB'];
         $Gender = $_POST['Gender'];
         $Address = $_POST['Address'];
         $Availability = $_POST['Availability'];
		 
		 if ($_FILES['CV']['error'] != 0) {
			echo 'Something wrong with the file.';
		} else {
			$file_tmp = $_FILES['CV']['tmp_name'];
			if ($pdf_blob = fopen($file_tmp, "rb")) {
				$result = mysqli_query($con,"insert into application(Ad_ID, Username, Full_Name, Tel_No, Email, ID, Nationality, DOB, Gender, Address, Availability, CV)
								   values('$Ad_ID', '$Username', '$Full_Name', '$Tel_No', '$Email' , '$ID', '$Nationality', '$DOB','$Gender' ,'$Address','$Availability','$pdf_blob')");
				
				if($result)
				{
					$Application_ID = mysqli_insert_id($con);
					header("Location:../filledForm/view.php?app_id=$Application_ID");
				}
				die;
			} else {
				echo 'Could not open the attached pdf file';
			}
		}
       

    }

?>

<html>
  <head>    
     <title>Recruitment Form</title>
     <link rel="stylesheet" type="text/css" href="form.css">
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
        <div class="Form">
         <form method= "POST" enctype="multipart/form-data">

         <div class="caption">Job Application</div>

         <div class="status"> Personal Details </div>
            
         <div class="info">

                <div class= "details">
                    Full Name 
                     <input type="text" name = "Full_Name" required> 
                </div> 
         
                <div class= "shortInfo">
                     Telephone 
                     <input type="tel" name="Tel_No" placeholder="Telephone"  required>
                </div>       

                <div class= "shortInfo">
                  Email 
                  <input type ="email" name="Email" placeholder="abc@gmail.com" required>
                </div>
                <div class= "shortInfo">
                   NIC
                     <input type="text" name="ID"  required>
                </div>
            
                <div class= "shortInput">
                    Nationality 
                    <input type="text" name="Nationality">
                </div>
                <div class= "shortInfo">
                   DOB 
                  <input type ="date" name="DOB" max="01/01/2022"> 
                </div>
              
              
                <div class= "Radio"> 
                  Gender 
                  <input type="radio" name="Gender" value="Female">Female
                  <input type="radio" name="Gender" value="Male">Male 
                </div>  
              
                <div class= "detailsAlign">
                     Address
                     <input type = "text" name="Address" >
                </div>
                
                <div class= "Radio"> 
                  Availability
                  <input type="radio" name="Availability" value="Full time">Full time
                  <input type="radio" name="Availability" value="Part time">Part time
                  <input type="radio" name="Availability" value="freelance">Freelance
                </div>
         </div>

         <div class="files">
                 
                Curriculum Vitae
                <input type="file" name="CV" accept=".pdf">
         </div>  
         <div class="agree">  
                <input type="radio" name="Agree" required>I agree to the terms and conditions
         </div>

         <div class="button">
                 <input type="reset" value="Reset">
                 <input type="submit" value="Submit">
         </div>
                 
     </form>
     </div>

  
 </body>
</html>