<html>
<head>
   <title>Home-Feedback Online</title>
     <link rel='icon' type='image/jpg' href='feedback_icon.jpg'>
  <header>
  <center>
	 <img src='logo.jpg' width='500' height='80' style='border-radius:2px;'/> <br>
	 <font color='#f1f1f1'  size='5' style='cursor:default;' >Online Feedback Application </font>
	  <?php
	   session_start();
         if($_SESSION['sid']!=session_id())
             header("location:login.php");
		 $dep=$_SESSION['dep'];
	  echo "<font color='#f1f1f1'  size='4' style='cursor:default;' > ( $dep )</font><br>";
	  ?>
	  </center>
      <a href='logout.php' style="position:relative; top:-15px; float:right; color:#f1f1f1;"><font size="4"><b>Logout</b></font></a>
	</header>
  <link rel="StyleSheet" type="text/css" href="mystyle.css">
</head>
<body>
	 <br><br><br>
     <center>
	     <font size="6" style='cursor:default;'>Home Page</font><br><br><br>
		 <a href='view_MainQB.php' style=" color:#006699;"><font size='5'>View Question Bank</font></a><br><br><br>
		 <a href="view_individualQB.php" style='color:#006699;'><font size='5'>View Individual Question Bank</font></a><br><br><br>
		 <a href="view_overallQB.php" style='color:#006699;'><font size='5'>View Overall Question Bank</font></a><br><br><br>
		 <a href="structure_year.php" style='color:crimson;'><font size='5'>Alter Structure</font></a><br><br><br>
        <a href="year_section.php" style='color:green; '><b><font size='5'>Feedback</font></b></a><br><br><br>
    </center>
</body>
</html>