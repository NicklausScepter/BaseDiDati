
<!DOCTYPE html>

<html>
	<head>
		<title>SelectCourse</title>
		<link rel="stylesheet" type="text/css" href="styles.css">
	</head>
	<body>

		
		<!-- menu bar -->
		<ul>	
			<li><a href="SelectCourse.php">HOME</a></li>
			<li><a href="SelectCourse.php">Logout</a></li>
			
		</ul>

		<div class="container" style = "background-color: #ffffff">
			<?php
			while($var>0){
			echo '<a href="SelectCourse.php"><button style="background-color: green"><b>Course'.$var.'</b></button></a>';
          			$var--;
          		}
			?>
		</div>
	</body>
</html>
