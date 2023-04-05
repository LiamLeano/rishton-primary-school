<!DOCTYPE html>
<html lang="en">

  	<head>

		<!--webpage's properties-->
		<title>Rishton Primary School - Parent</title>
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
			// Check connection
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
			<h1 class="content-header-xxxl">Parent Form</h1>
			<h2 class="content-header-xxl">You can register a new parent by filling this form</h2> <br>
			
			<!--form-->
			<form method="post" action="rishton-parent.php">
		
				<label class="content-paragraph-xl">First Name:</label>
				<input class="content-paragraph-xl" type="text" name="first_name" required> <br> <br>

				<label class="content-paragraph-xl">Last Name:</label>
				<input class="content-paragraph-xl" type="text" name="last_name" required><br> <br>

				<label class="content-paragraph-xl">Full Name:</label>
				<input class="content-paragraph-xl" type="text" name="full_name" required><br> <br>
				
				<labe class="content-paragraph-xl">Email Address:</label>
				<input class="content-paragraph-xl" type="email" name="email_address" required><br> <br>

				<label class="content-paragraph-xl">Phone Number:</label>
				<input class="content-paragraph-xl" type="number" name="phone_number" required><br> <br>

				<label class="content-paragraph-xl">Street Address:</label>
				<input class="content-paragraph-xl" type="text" name="street_address" required><br> <br>

				<label class="content-paragraph-xl">City:</label>
				<input class="content-paragraph-xl" type="text" name="city"> <br> <br>

				<label class="content-paragraph-xl">Zip Address:</label>
				<input class="content-paragraph-xl" type="text" name="zip_address" required style="text-transform:uppercase"><br> <br>

				<label class="content-paragraph-xl">Medical Information:</label>
				<input class="content-paragraph-xl" type="text" name="medical_info" required><br> <br>

				<label class="content-paragraph-xl">Select Student:</label>
				<select class="content-paragraph-xl" name="student_id" required>
					
					<?php
					//create a new record with the data provided by the user. php script from https://www.w3schools.com/php/php_mysql_insert.asp was modified
					$sql = mysqli_query($link, "SELECT student_id, full_name FROM students");
					while ($row = $sql->fetch_assoc()){
					echo "<option value='{$row['student_id']}'>{$row['full_name']}</option>";
					}
					?>
				</select> <br> <br>
				
				<input class="content-paragraph-xl" type="submit" name="submit">
		
			</form>

			<hr><hr>

			<h1 class="content-header-xxxl">Parent Table</h1>
			<h2 class="content-header-xxl">You can see the list of parents below</h2> <br>

			<!--See the entire parent's table-->
			<table class="content-paragraph-xl">
		
				<tr>
					<th width="150px">Parent ID<br><hr></th>
					<th width="300px">Full Name<br><hr></th>
					<th width="300px">Email<br><hr></th>
					<th width="300px">Phone Number<br><hr></th>
					<th width="300px">Student id <br><hr></th>
				</tr>
						
				<?php
				$sql = mysqli_query($link, "SELECT parent_id, full_name, email_address, phone_number, student_id FROM parents");
				while ($row = $sql->fetch_assoc()){
				echo "
				<tr>
					<th>{$row['parent_id']}</th>
					<th>{$row['full_name']}</th>
					<th>{$row['email_address']}</th>
					<th>{$row['phone_number']}</th>
					<th>{$row['student_id']}</th>
				</tr>";
				}
				?>
			
			</table>
		
			<?php
			//php script by https://www.w3schools.com/php/php_mysql_insert.asp, modified to create a new record with the data provided by the user
			if (isset($_POST['submit'])) {

				$first_name = $_POST['first_name'];
				$last_name = $_POST['last_name'];
				$full_name = $_POST['full_name'];
				$email_address = $_POST['email_address'];
				$phone_number = $_POST['phone_number'];
				$street_address = $_POST['street_address'];
				$city = $_POST['city'];
				$zip_address = $_POST['zip_address'];
				$medical_info = $_POST['medical_info'];
				$student_id = $_POST['student_id'];

				$sql = "INSERT INTO parents (first_name, last_name, full_name, email_address, phone_number, street_address, city, zip_address, medical_info, student_id)
				VALUES ('$first_name', '$last_name', '$full_name', '$email_address', '$phone_number', '$street_address', '$city', '$zip_address', '$medical_info', '$student_id')";
				if (mysqli_query($link, $sql)) {
				echo "<hr><h2>New parent record created successfully! On the navigation bar, click the page 'Parent' to see it!</h2>";
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