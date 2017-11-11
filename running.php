<html>
<head>
  <title>Running-Feedback Online</title>
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
	</header>
  <link rel="StyleSheet" type="text/css" href="mystyle.css">
</head>
<body>
<?php
       
        $year=$_SESSION['year'];
	    $sec=$_SESSION['section'];
		 if($_SESSION['type_got']=='sub'||$_SESSION['type_got']=='fac')
		 {
			 $typ='Subject';
		 }
		 else $typ='Lab';
		 $x=$_SESSION['type_got'];
		$link = mysqli_connect('localhost', 'root', '', 'feedback');
          if (!$link) {
              die("Connection failed: " . mysqli_connect_error());
          }
	         $replace=$_SESSION['replace'];
			 $section=$_SESSION['section'];
             echo "<br><br><br><center><font size='6' style='cursor:default;'>$replace Year - Section : $section</font><br><br>";
		
		  echo "<br><font size='5' color='#006699' style='cursor:default;' >Feedback Page is Online . . . . </font><br><br>";
		  
		$query = "select feed from temp";
          $result = mysqli_query($link, $query);
		  $f=mysqli_fetch_row($result);
		  if($f[0]==0)
		  {
			  header('Location:'."menu.php");
		  }
		  else if($f[0]==1)
		  {
			  echo "<br><font size='4' color='#006699' style='cursor:default;' >Type : Individual Feedback - $typ </font><br>";
		  }
		  else if($f[0]==2)
		  {
			  echo "<br><font size='4' color='#006699' style='cursor:default;' >Type : Overall Feedback</font><br>";
		  }
		  echo "<br><br><font size='4' color='#006699' style='cursor:default;' >URL For Students: '(IP_ADDRESS)/feedback/feedback.php'</font><br>";
		  echo "<br><br><font size='4' style='cursor:default;' >When All students are gone, to close Feedback click 'Done'</font><br><br><br>";
?>
<form name='clos' method='post' action='' >
  <input type='submit' value='Done' name='close' style='color:#006699; width:100px; cursor:pointer;' />
  </form>
  <?php
      if(isset($_POST['close']))
	  {
		  $query = "update temp set feed=0 ";
          $result = mysqli_query($link, $query);
		  $link->close();
		  header('Location:'."menu.php?msg=Feedback+Updated..");
	  }
    ?>
	</center>
</body>
</html>