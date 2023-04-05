<!DOCTYPE html>
<html lang="en">
	
	<head>

		<!--webpage's properties-->
		<title>Rishton Primary School - Class</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<!--bootstrap's css and javascript--> <!--https://getbootstrap.com-->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

		<!--local css-->
		<link rel="stylesheet" href="style.css">

		<!--SQL server check php script-->
		<?php 
			//php script by https://www.w3schools.com/php/php_mysql_insert.asp
			$link = mysqli_connect("localhost", "root", "", "school");
			// check connection
			if ($link === false) {
				die("Connection failed: try to go to the past and fix the problem");
			}
		?>

	</head>

  	<body>

		<!--2 navigation bars, 1st with the school's name and the 2nd as a navigation menu--> <!-- https://getbootstrap.com/docs/5.3/examples/ -->
		<!--1st navigation bar-->
		<nav class="navbar navbar-expand" id="logo">
			<div class="container-fluid">
				<!--school's name-->
				<a class="navbar-brand" href="index.php">Rishton Primary School</a>
			</div>
		</nav>

		<!--2nd navigation bar-->
		<nav class="navbar navbar-expand">
			<div class="container-fluid">
				<!--5 hyperlinks-->
				<div class="collapse navbar-collapse" id="mynavbar">
					<ul class="navbar-nav me-auto">
						<li class="nav-item">
							<a class="nav-link" href="rishton-student.php">Student</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="rishton-parent.php">Parent</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="rishton-teaching-assistant.php">Assistant</a>
						</li>
						<li class="nav-item">
              				<a class="nav-link" href="rishton-teacher.php">Teacher</a>
           				</li>
						<li class="nav-item">
              				<a class="nav-link" href="rishton-class.php">Class</a>
     			       </li>
					</ul>
				</div>
			</div>
		</nav>

		<!--main content below the navigation bar-->
		<div class="content">

			<h1 class="content-header-xxxl">Class Table</h1>
			<h2 class="content-header-xxl">You can only see the list of classes below</h2> <br>

			<!--See the entire parent's table-->
			<table class="content-paragraph-xl">
		
				<tr>
					<th width="150px">Class ID<br><hr></th>
                    <th width="300px">Class Name<br><hr></th>
                    <th width="150px">Class Capacity<br><hr></th>
                    <th width="150px">Teacher ID<br><hr></th>
				</tr>
						
				<?php
				$sql = mysqli_query($link, "SELECT class_id, class_name, class_capacity, teacher_id  FROM classes");
				while ($row = $sql->fetch_assoc()){
				echo "
				<tr>
					<th>{$row['class_id']}</th>
                    <th>{$row['class_name']}</th>
                    <th>{$row['class_capacity']}</th>
                    <th>{$row['teacher_id']}</th>
				</tr>";
				}
				?>
			
			</table>
        
        </div>

    </body>

</html>