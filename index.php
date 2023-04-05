<!DOCTYPE html>
<html lang="en">

  <head>

    <!--webpage's properties-->
    <title>Welcome to Rishton Primary School</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--bootstrap's css and javascript--> <!-- https://getbootstrap.com -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

    <!--local css and javascript-->
    <link rel="stylesheet" href="style.css">

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
      <h1 class="content-header-xxxl">Welcome to our primary school</h1>
      <h2 class="content-header-xxl">A place where we consider everyone's potential</h2> <br>
      <p class="content-paragraph-xl">Since 1986, we have been working on teaching the next generation of students for the better of their lives</p>
      <img src="media/images/kids_in_rishton_primary_school.jpg" alt="Kids on their seats raising their hands in a classroom">

  </body>

</html>