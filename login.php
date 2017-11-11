<html>
<head>
   <title>Feedback Online</title>
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
	 <p style='margin-left:31%; margin-top:100px; cursor:default;'><font size="6"><b>Login</b></font></p>
     <form name="login" method="post" action="checklogin.php" >
              <input type="text" size="20" name="uname" value="" placeholder="Username"
			   style=' width:212px;
			           height:32px;
					   margin-left:31%;
					   padding:4px;
					   border-radius:3px;
					   border-width:1px;' required/><br><br>
              <input type="password" size="20" name="pwd" value="" placeholder="Password"
			  style=' width:212px;
			           height:32px;
					   margin-left:31%;
					   padding:4px;
					   border-radius:3px;
					   border-width:1px;' required/><br>
              <p style='margin-left:31%;'><input type="submit" value="Submit" style='color:#006699; cursor:pointer;' /><input type="reset" value="Reset" 
			  style='margin-left:10px; color:#006699; cursor:pointer;'/></p>
	  </form>
         <p style='margin-left:31%;'><?php echo $m = isset($_GET['msg']) ?  $_GET['msg']  : "";  ?></p><br><br>
		 <center>
         
<footer style='background-color:#006699;
        padding:5px;
        width:98.5%;
        height:14px;
        bottom:10px;
        position:fixed;
        box-shadow:0px 0px 8px black;
        border-top: 2px solid #f1f1f1;
        left:5px;'>
<font color='#f1f1f1' style='float:right; font-size:15px; cursor:default;'>Yenni Suresh & Uday Koushik @Copyrights</font>
</footer>
</center>
</body>
</html>