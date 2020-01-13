<?php
$current = 'Home' ;
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
include_once 'includes/register.inc.php';

if(session_id() == ''){
    //session has not started
    session_start();
}


?>
<!doctype html>
<!-- Author: Darrian Swift (dswift02) -->
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <title>Home Page</title>
    
    <!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<![endif]-->
	<meta name = "viewport" content = "width=device-width, initial-scale = 1.0"/>
	<link rel="stylesheet" href="includes/stylesheet.css?version=1.11"/>
	<link rel="stylesheet" href="includes/responsive.css?version=1.1"/>
	<script src="includes/javascript.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script src="includes/sha512.js"></script> 
	<script src="includes/forms.js"></script>
    
</head>
<body>
	
	<div id = "page"> 
		<header id = "pageheader" role = "banner"> 
			<?php include('includes/header.php') ; ?> 
		</header>
		
		<div id = 'columncontainer' >
			<section id = "banner">
				<h1> Learn. Code. Discuss. </h1>
				<p> The E-learning Programme for Our Future Programmers! </p>
				<ul>
					<li><a href = "discuss.php">View Blog</a> </li>
					<li><a href = "user.php">View Account </a> </li>
				</ul>
			</section>
			<main role = "main">
			
				<section id = "mainContent">
					
					<?php
						$result =  mysqli_query($mysqli, "SELECT * FROM headlines") ;
						$print = '' ;
						if ($result->num_rows > 0) {
							
							while($row = $result->fetch_assoc()) {
							
								$print .= '<article><h2>'.$row["header1"].'</h2>';
								$print .= '<p>'.$row["content1"]. '</p></article>';
								$print .= '<article><h2>'.$row["header2"].'</h2>';
								$print .= '<p>'.$row["content2"]. '</p></article>';
							}	
						} else {
							echo "<article> <h2> 0 results </h2> </article>";
						}
						echo $print ;
					?>
						<!--<h2>Headline #1 </h2>
						<p> 
						</p>
						
					</article>
						
					<article>
						<h2>Headline #2 </h2>
						<p> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
						</p>
					</article>-->
				</section>
				<aside id = "homepagesidebar" role = "complementary">
					<section id = "signup">
						<h3>Sign Up</h3>
						<?php include('includes/register_form.php') ;?>
					</section>
					
				</aside>
			</main>
			
		</div>
		<footer id = "pagefooter" role = "contentinfo"> 
			<?php include('includes/footer.html') ; ?>
		</footer>
	</div>
		
</body>	
</html>	
