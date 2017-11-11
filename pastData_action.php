<html>
<head>
  <title>Past Data-Feedback Online</title>
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
	  <a href='menu.php' style="position:relative; top:-15px; left:2px; color:#f1f1f1;"><font size="4"><b>Back</b></font></a>
	  <a href='home.php' style="position:relative; top:-15px; left:4px;  color:#f1f1f1;"><font size="4"><b>Home</b></font></a>
      <a href='logout.php' style="position:relative; top:-15px; float:right; color:#f1f1f1;"><font size="4"><b>Logout</b></font></a>
	</header>
  <link rel="StyleSheet" type="text/css" href="mystyle.css">
</head>
<body>
  
	 <br><br><br>
	  <center>
	  <?php
	         $replace=$_SESSION['replace'];
			 $section=$_SESSION['section'];
			 $year=$_SESSION['year'];
             echo "<font size='6' style='cursor:default;' >$replace Year - Section : $section</font><br><br>";
			 
			 $link = mysqli_connect('localhost', 'root', '', 'feedback');
	          // Check connection
	          if (!$link) {
	              die("Connection failed: " . mysqli_connect_error());
	              echo "connection failed";
	          }
			$result=mysqli_query($link,"select year,sec from indi_details");
			$indi=0;
			while(list($y,$s)=mysqli_fetch_row($result))
			{
				if($y==$year&&$s==$section)
				{
					$indi=1;
					break;
				}
			}
			$result=mysqli_query($link,"select year,sec from feedback_details");
			$feedback=0;
			while(list($y,$s)=mysqli_fetch_row($result))
			{
				if($y==$year&&$s==$section)
				{
					$feedback=1;
					break;
				}
			}
		    mysqli_close($link);
		echo "<br><br>";
		if($feedback==1)
		{
         echo "<a href='particular_facORsub_report.php' style='color:#006699;'><font size='5'>Overall - Individual Report</a></font><br><br><br><br>";
         echo "<a href='overall_report.php' style='color:#006699;'><font size='5'>Overall Report</a></font><br><br><br><br>";
         echo "<a href='other_comment.php' style='color:#006699;'><font size='5'>Other Comments</a></font><br><br><br><br>";
		}
		else
		{
			echo "<font size='5' style='color:grey; cursor:default;'>Overall - Individual Report</font><br><br><br><br>";
            echo "<font size='5' style='color:grey; cursor:default;'>Overall Report</font><br><br><br><br>";
            echo "<font size='5' style='color:grey; cursor:default;'>Other Comments</font><br><br><br><br>";
		}
		if($indi==1)
		  echo "<a href='individual_report.php' style='color:#006699;'><font size='5'>Individual Feedback Report</a></font>";
	     else echo "<font size='5' style='color:grey; cursor:default;'>Individual Feedback Report</font> ";
		 ?><br><br>
		 <p><?php echo $m = isset($_GET['msg']) ?  $_GET['msg']  : "";  ?></p>
    </center>
</body>
</html>