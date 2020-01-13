<nav id = "skip" role = "navigation">
	<ul>
		<li><a href="#" class = "skiplink"> Skip to Main Content </a></li>
	</ul>
</nav> 
<!-- Button  -->


<div id = "logowrapper">
	
	<li>LCD<span>Learning</span></li>
	
	
</div>

<nav id = "primary"  role = "navigation">
	<div id = "myNav" class = "overlay">
		<a href="javascript:void(0)"  class ="closebtn" onclick="closeNav()">&times;</a>
		<ul id = "left" class = "overlay-content">
			<li class = "first"><a href = "index"> <i class="fa fa-home fa-lg" aria-hidden="true"></i> </a></li>
			<li><a href = "learn?id=0">Learn</a> </li>
			<li><a href = "code?id=00">Code</a> </li>
			<li><a href = "discuss">Discuss </a> </li>
			<li><a href = "#">Help</a> </li>
		</ul>
		<?php if (login_check($mysqli) == true) : ?>
			<ul id = "right" class = "overlay-content">
				<li><a href = "user"><?php echo htmlentities($_SESSION['username']) ;?> </a> </li>
				<li><a href = "logout">Logout</a> </li>
			</ul>
		<?php else : ?>
			<ul id = "right" class = "overlay-content">
				<li><a href = "login">Login</a> </li>
				<li><a href = "register">Sign Up</a> </li>
			</ul>
		<?php endif; ?>
	</div>
	
</nav>

<span class = "icon " onclick="openNav()">&#9776; </span>
