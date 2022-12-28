<html>
	<head>
		<title>Help Page</title>
		<style>
		body{
			margin: 10px;
			padding: 0;
			background: url(assets/admin.jpg);
			background-size: cover;
			background-position: center;
			
		}
		
		h2, p, ol, ul, a, figcaption{
			color: #fff;
		}
		
		.navbar{
          height:50px;
		  opacity: 80%;
          background-color: transparent;
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
		
		a{
			text-decoration: none;
		}

		img{
			display: block;
			margin-left: auto;
			margin-right: auto;
			width: 50%;
		}
		</style>
	</head>
	<body>
		<div class="navbar">
				<a href="/candidate/jobAds/jobAds.php" class="navbar-text" >Advertisements</a>
				<a href="/contact/contactPage.php" class="navbar-text">Contact</a>
				<a href="/login/login.php" class="navbar-text" >Log in</a>
				<a href="main.php" class="navbar-text" >Home</a>
		 </div>
		<h2>Quick Links</h2>

                   <ul>
                       <li><a href="#login">Login Page</a></li>
                       <li><a href="#register">Register Pages</a></li>
                       <li><a href="#recruiter">Recruiter's UIs</a></li>
                       <li><a href="#jobSeeker">Job Seeker's UI</a></li>
                       <li><a href="#contact">Contact Page </a></li>
                   </ul>
		<h2 id="login">Login Page</h2>
		<p>
			All users can login to the system by entering the unique username they assigned in the registration page. Also the user should include the correct password in order to successfully login to the system.
			It is compulsory to enter both the username and the password. If you don't have an account you can click the links under the login button. If you are a,
			<ol>
				<li>Job Seeker - Click the link that says "Register as a job seeker"</li>
				<li>Recruiter - Click the link that says "Register as a recruiter"</li>
			</ol>
			<img src="/Images/Home.png">
		</p>
		<br />
		<h2 id="register">Register Pages</h2>
		<p>
			Both recruiters and job seekers can register to the system by filling the form shown in the register pages. You can navigate to the register page either by clicking on the buttons that says "I am a job seeker" if you are a job seeker and "I am a recruiter" if you are a recruiter in the home page or 
			by clicking on the links displayed in the login page under the login button. A user should enter an unique username and if the username you are entering isn't unique there will be an alerted diplayed in your browser.
			If you already have an account you can directly go to the home page by clicking the link under the register button that says "Already have an account?"
			<figure>
			<img src="/Images/RegCandidate.png">
			<figcaption align="center">--Job Seeker's Register Page--</figcaption>
			</figure>
			<figure>
			<img src="/Images/RegRec.png">
			<figcaption align="center">--Recruiter's Register Page--</figcaption>
			</figure>
		</p>
		<br />
		<h2 id="recruiter">Recruiter's UIs</h2>
		<p>
			Once a recruiter is logged to the system they will be redirected to the recruiter's UI. A recruiter can see all the past advertisements they've posted on the system and they can update or delete these advertisements as they wish.
			However if a user is new to the system they will only see the header of the table.
			Also the user is able to see two buttons that say "Add New" and "View Applicants". By clicking the "Add New" button the user is able to add a new advertisements and by clicking the "View Applicants" button the user is able to view
			the applicants that has already applied for there job postings. Also the user can view the job advertisements in the website wall by clicking the "Advertisements" link on the navigation bar.
			<figure>
			<img src="/Images/RecruiterUI.png">
			<figcaption align="center">--Recruiter's UI Page--</figcaption>
			</figure>
		</p>
		<p>
			Once the user clicks on the "Add New" button they will be redirected to a page with a form. In order to successfully add a new advertisement a user should fill out the form and submit it. If the submission is successful the user will
			be redirected back to the home page and they will be able to see the job advertisement.
			<figure>
			<img src="/Images/AdForm.png">
			<figcaption align="center">--Form to post an advertisement--</figcaption>
			</figure>
		</p>
		<p>
			If the user clicks on the "View Applicants" button they will be redirected to a page that shows all the applicants that have applied for the relevant company's job posting as mentioned above. 
			In front of each and every applicant there will be two buttons, "View" and "Download". View button will open the application that was filled by the job seeker and Download button will download the CV that was entered by the job applicant.
			<figure>
			<img src="/Images/ViewApplicants.png">
			<figcaption align="center">--View Applicants Page--</figcaption>
			</figure>
		</p>
		<p>
			Once the user clicks on "Advertisements" button the user will be redirected to the page that contains all the advertisements in the system and this will be the layout that is displayed for the job seekers as well. By clicking on the "View" button
			user can see full details about each and every job advertisement. However if you are a "recruiter" you won't be seen a "Apply" button. Also Additionally users are able to filter advertisements according to there need.
			<figure>
			<img src="/Images/Ads.png">
			<figcaption align="center">--Advertisements Page--</figcaption>
			</figure>
		</p>
		<p>
			By clicking on the Logout link on the navigation bar you can logout from the system. Also there is a link to the Home which will redirect you to the Recruiter's Home UI and there is link to the contact page as well as the Help page.
		</p>
		<br />
		<h2 id="jobSeeker">Job Seeker's UI</h2>
		<p>
			If you are a job seeker then you will be directed to the job seeker's UI. A user will be able to see a listing of all the jobs that he/she has applied. By clicking on the view button the job seeker is able to view the details that he/she entered the form.
			The users cannot edit there applications that they have already filled and therefore it is important to check the form thorouly before the submission. There are other options such as navigating to the home, advertisements, contact, help pages and login out of the system.
			<figure>
			<img src="/Images/CandidateUI.png">
			<figcaption align="center">--Candidate's UI Page--</figcaption>
			</figure>
		</p>
		<p>
			By clicking the "Advertisements" link on the navigation bar the user is able to view all the job advertisements which are posted on our system and they can view each and every ad seperately. Also the user is given the option to filter the jobs as you wish. Once when the job
			 seeker is redirected to the details of the advertisement they are shown a "Apply Now" button and users can apply for the jobs by clicking it. 
			Once you click the Apply Now you will be redirected to an application form which the user should fill in order to apply for the job you wish to be recruited. At the successfull completion user will be directed to a page where he/she can see the details that they entered to the application.
			<figure>
			<img src="/Images/Ads.png">
			<figcaption align="center">--Advertisements Page--</figcaption>
			</figure>
			<figure>
			<img src="/Images/ApplyNow.png">
			<figcaption align="center">--Advertisement's View--</figcaption>
			</figure>
			<figure>
			<img src="/Images/ApplicationForm.png">
			<figcaption align="center">--Application Form To Apply For Jobs--</figcaption>
			</figure>
		</p>
		<p>
			If the user need any help they can always click on Help which is on the navigation bar and it would redirect the user to this page. Also if the user wants to contact us he/she can click the contact page. Clicking the Logout link will logout the user from the system and redirect them to the Login page.
		</p>
		<br />
		<h2 id="contact">Contact Page</h2>
		<p>
			A user can go to the contact page by clicking on the "Contact" link which is on the navigation bar. However, only a user who has registered the system and logged to the system are previlaged with this option. 
			In order to contact us the user needs to add the full name, email address and the message and click on the "Send" button. One of our administratives will read the message and respond through the email address provided by the user. 
			<figure>
			<img src="/Images/Contact.png">
			<figcaption align="center">--Contact Page--</figcaption>
			</figure>
		</p>
	</body>
</html>