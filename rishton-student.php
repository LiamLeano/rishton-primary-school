<!DOCTYPE html>
<html lang="en">
	
	<head>

		<!--webpage's properties-->
		<title>Rishton Primary School - Student</title>
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
			<h1 class="content-header-xxxl">Student Form</h1>
			<h2 class="content-header-xxl">You can register a new student by filling this form</h2>
			
			<hr>
			
			<form method="post" action="rishton-student.php">

				<!--form-->
				<label class="content-paragraph-xl">First Name:</label>
				<input class="content-paragraph-xl" type="text" name="first_name" required> <hr>

				<label class="content-paragraph-xl">Last Name:</label>
				<input class="content-paragraph-xl" type="text" name="last_name" required> <hr>

				<label class="content-paragraph-xl">Full Name:</label>
				<input class="content-paragraph-xl" type="text" name="full_name" required> <hr>

				<label class="content-paragraph-xl">Medical Info:</label>
				<input class="content-paragraph-xl" type="text" name="medical_info" required> <hr>

				<label class="content-paragraph-xl">Select Class:</label>
				<select class="content-paragraph-xl" name="class_id" required>
					<?php
					//name of class dropdown list script provided by https://www.w3schools.com/php/php_mysql_select.asp
					$sql = mysqli_query($link, "SELECT class_id, class_name FROM classes");
					while ($row = $sql->fetch_assoc()){
					echo "<option value='{$row['class_id']}'>{$row['class_name']}</option>";
					}
					?>
				</select> <br> <br>
					
				<input class="content-paragraph-xl" type="submit" name="submit">
				
			</form>

			<hr><hr>

			<h1 class="content-header-xxxl">Student Table</h1>
			<h2 class="content-header-xxl">You can see the list of students below</h2> <br>

			<!--See the entire parent's table-->
			<table class="content-paragraph-xl">
		
				<tr>
					<th width="250px">student ID<br><hr></th>
					<th width="400px">Full Name<br><hr></th>
					<th width="400px">Medical Information<br><hr></th>
					<th width="300px">Class ID<br><hr></th>
				</tr>
						
				<?php
				$sql = mysqli_query($link, "SELECT student_id, full_name, medical_info, class_id FROM students");
				while ($row = $sql->fetch_assoc()){
				echo "
				<tr>
					<th>{$row['student_id']}</th>
					<th>{$row['full_name']}</th>
					<th>{$row['medical_info']}</th>
					<th>{$row['class_id']}</th>
				</tr>";
				}
				?>
			
			</table>
				
			<?php
			//create a new record with the data provided by the user. php script from https://www.w3schools.com/php/php_mysql_insert.asp was modified
			if (isset($_POST['submit'])) {
				
				$first_name = $_POST['first_name'];
				$last_name = $_POST['last_name'];
				$full_name = $_POST['full_name'];
				$medical_info = $_POST['medical_info'];
				$class_id = $_POST['class_id'];
					
				$sql = "INSERT INTO students (first_name, last_name, full_name, medical_info, class_id)
				VALUES ('$first_name','$last_name', '$full_name', '$medical_info', '$class_id')";
				if (mysqli_query($link, $sql)) {
				echo "<hr><h2>New student record created successfully! On the navigation bar, click the page 'Student' to see it!</h2>";
				} else {
				echo "Error adding record ";
				}

			}
			$link->close();
			?>
			
			<hr>

		</div>

  	</body>

</html>