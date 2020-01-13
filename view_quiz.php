<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
include_once 'includes/register.inc.php';

if(session_id() == ''){
    //session has not started
    session_start();
}
if(isset($_GET['lesson'])){
	$lesson_id = $_GET['lesson'];
}else {$lesson_id = 0 ;}
if(isset($_SESSION['course_id'])){
	$course_id = $_SESSION['course_id'] ;
}else {$course_id = 0 ;}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!-- Author: Darrian Swift (dswift02) -->
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<title>Quiz</title>
	<meta name = "viewport" content = "width=device-width, initial-scale = 1.0">
	 <link rel="stylesheet" href="includes/stylesheet.css">
	<link rel="stylesheet" href="includes/responsive.css">
	<script src="includes/javascript.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script type="text/JavaScript" src="includes/sha512.js"></script> 
	<script type="text/JavaScript" src="includes/forms.js"></script>
	<script type="text/JavaScript" src="includes/quiz.js?version=1.295"></script>
	
    
</head>
<body>
	
	<div id = "page"> 
		<header id = "pageheader" role = "banner"> 
			<?php include('includes/header.php') ; ?> 
		</header>
		
			<main role = "main">
			
				<section id = "mainContent">
					<div id = quiz>
					<h3> Quiz</h3>
					<?php
					if (login_check($mysqli) == true) {	
						
						$output = '' ;
						//create a form with radio button
						$result = mysqli_query($mysqli, "SELECT * FROM quiz WHERE lesson_id = $lesson_id and course_id = $course_id") ;
						$row_count = $result->num_rows;
						$output .= "<form action = '' method = 'post' id = 'quizForm'><fieldset>" ;
						$count = 0 ;
						$counter = 0 ;
						$correct = '' ;
						if($row_count > 0 ) {
							while ($row=mysqli_fetch_assoc($result)) {
								$count = 1 ; //COUNT = 1
								$counter ++ ; 
								$answer = $row['correct']  ;
								$correct .= $row['correct'] . '-';
								$pieces = explode(':', $row['answer']);
								$output .= "<div class = 'question'><h3>" .'Q' .$counter. '.   ' .$row['question']. "</h3></div>" ;
								
								
								$output .= '<div class = "answer"><label for = "a1"> ' .  $pieces[0].' </label>' ;
								$output .= '<input type="radio" name = "q'.$counter.'" id="a1"' ;
							 	if($answer == $count){
							 		$output .= 'value = "1" checked>';
							 	}else{
							 		$output .= 'value= "0" checked>';
							 	}
							 	$output .= '</input></div></br>' ;
								
								$count++ ; //count = 2
								$output .= '<div class = "answer"><label for = "a2"> ' .  $pieces[1].' </label>' ;
								$output .= '<input type="radio" name = "q'.$counter.'" id="a2"'; 
								if($answer == $count){
							 		$output .= 'value = "1">';
							 	}else{
							 		$output .= 'value= "0">';
							 	}
							 	$output .= '</input></div></br>' ;
								
								$count ++ ; //count = 3
								$output .= '<div class = "answer"><label for = "a3"> ' .  $pieces[2].' </label>' ;
								$output .= '<input type="radio" name = "q'.$counter.'" id="a3" ' ;
								if($answer == $count){
							 		$output .= 'value = "1">';
							 	}else{
							 		$output .= 'value= "0">';
							 	}
							 	$output .= '</input></div></br>' ;
								
								$count ++ ; //count = 4
								
								$output .= '<div class = "answer"><label for = "a4"> ' .  $pieces[3].' </label>' ;
								$output .= '<input type="radio" name = "q'.$counter.'" id="a4"' ;
								if($answer == $count){
							 		$output .= 'value = "1">';
							 	}else{
							 		$output .= 'value= "0">';
							 	}
							 	$output .= '</input></div></br>' ;
							
							}
							$correct .= '0' ;
							
							$output .= '<input type="submit" name="submitbutton" id ="submit" value="Calculate" > </input></br>' ;
							
						} else {
							$output .= '<p> No Quiz to Display. </p>' ;
						}
						$output .= '</div></fieldset></form>';
						/*$array = explode('-',$correct);
						$answer = '' ;
						$i = 1 ;
						$j = 0 ;
						$correct_score = 0 ;
						/*while($j != $row_count ) {
							$answer = $_GET["q$i"] ;
							
							if ($answer == $correct[$j]){
								$correct_score++ ;
							}
							$j++ ;
						}
						
						echo $correct_score ;*/
						//return $ouput ;
						
						$output .= '<div id = "hiddenPanel" class = "result"></div>' ;
						
						echo $output ;
						?>
						<div id = "total">  </div>
					</div>
					<?php
					}else {
						echo '<p>Please <a href = "login.php"> Login</a> To View a Quiz.</p>';
						header('Location: https://titan.dcs.bbk.ac.uk/~dswift02/project/code.php?id=00');
					}
					?>
				</section>
				
			</main>
			
		
		<footer id = "pagefooter" role = "contentinfo"> 
			<?php include('includes/footer.html') ; ?>
		</footer>
	</div>
		
</body>	
</html>	
