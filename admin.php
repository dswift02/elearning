<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
 
if(session_id() == ''){
    //session has not started
    session_start();
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!-- Author: Darrian Swift (dswift02) -->
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <title>My Account - Admin</title>
   <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link rel="stylesheet" href="includes/stylesheet.css">
    <link rel="stylesheet" href="includes/responsive.css">
    <script src="includes/javascript.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    
</head>
<body onload = "init()">
	
	<div id = "page"> 
		<header id = "pageheader" role = "banner"> 
			<?php include('includes/header.php') ; ?> 
		</header>
		
		<div id = 'columncontainer' >
			
			<main role = "main">
				<aside id = "pagesidebar" role = complementary>
					
					<div id = "profile" class = "accordionItem">
						<h2>User Profile</h2>
						<div>
							<h3><?php echo("{$_SESSION['username']}"."<br />");?></h3>
							<p><?php echo("{$_SESSION['fname']}". ' ' . "{$_SESSION['lname']}" ."<br />");?></p>
						</div>
					</div>
					
					
					<div id = "adminList"class = "accordionItem">
						<h2>New Admin List </h2>
						<div>
							<p>insert table </p>
						</div>
					</div>
					
					
				</aside>
				<section id = "mainContent">
					<section id = "links"> 
						<ul> 
							<li id = "one" class = "buttons"><a href ="viewCourses.php"> View Courses </a> </li>
							<li id = "two" class = "buttons"><a href ="assignment.php"> View Assignments</a> </li>
							<li id = "three" class = "buttons"><a href ="viewUsers.php"> View Users</a> </li>
							<li id = "four" class = "buttons"><a href ="#"> View Blog</a> </li>
							
						<ul>
					</section>
					<section id = "reports" >
						<h3> Reports </h3>
						<?php include('includes/admin-reports.php') ; ?>
					</section> 
				</section>
				
				
			</main>
			
		</div>
		<footer id = "pagefooter" role = "contentinfo"> 
			<?php include('includes/footer.html') ; ?>
		</footer>
	</div>
		
</body>	
</html>	
