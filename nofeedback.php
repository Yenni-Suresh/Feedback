<html>
<head>
<title>No-Feedback Online</title>
     <link rel='icon' type='image/jpg' href='feedback_icon.jpg'>
  <header>
  <center>
	 <img src='logo.jpg' width='500' height='80' style='border-radius:2px;'/> <br>
	 <font color='#f1f1f1'  size='5' style='cursor:default;' >Online Feedback Application </font>
	  <?php
	  $link = mysqli_connect('localhost', 'root', '', 'feedback');
		if (!$link) {
    		die("Connection failed: " . mysqli_connect_error());
		}
		$query = "SELECT dept from login_details";
		  	        $res = mysqli_query($link, $query);
		  	        $row=mysqli_fetch_row($res);
		  	        $dep=$row[0];
	  echo "<font color='#f1f1f1'  size='4' style='cursor:default;' > ( $dep )</font><br>";
	  mysqli_close($link);
	  ?>
	  </center>
	</header>
  <link rel="StyleSheet" type="text/css" href="mystyle.css">
</head>
<body>
<br><br><br><br><br>
      <center>
	    <p><font size='6' color='crimson' style='cursor:default' >Feedback Page Not Available</font></p>
		<br><br><br><p style=' cursor:default;'>Link : <a href='feedback.php' ><font size="3">New Feedback</font></a></p>
	  </center>
</body>
</html>