<html>
<head>
  <title>Overall Indi Comments-Feedback Online</title>
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
	  <a href='particular_report.php' style="position:relative; top:-15px; left:2px; color:#f1f1f1;"><font size="4"><b>Back</b></font></a>
	  <a href='home.php' style="position:relative; top:-15px; left:4px;  color:#f1f1f1;"><font size="4"><b>Home</b></font></a>
      <a href='logout.php' style="position:relative; top:-15px; float:right; color:#f1f1f1;"><font size="4"><b>Logout</b></font></a>
	</header>
	<style>
	  table,th,td{
       border: 2px solid #006699;
       border-collapse: collapse;
       padding:8px;
       cursor:default;
       text-align:center;
      }
    </style>
  <link rel="StyleSheet" type="text/css" href="mystyle.css">
  <script>
   function printPage() {
    window.print();
    }
</script>
</head>
<body>
	  <br><br><br>
	 <?php
	        $replace=$_SESSION['replace'];
			$section=$_SESSION['section'];

			$year=$_SESSION['year'];
			$value=$_SESSION['decide'];

			$link = mysqli_connect('localhost', 'root', '', 'feedback');
	          // Check connection
	          if (!$link) {
	              die("Connection failed: " . mysqli_connect_error());
	              echo "connection failed";
	          }
            if($value=='sub'||$value=='fac')
			    $fac_val=$_SESSION['fac_val'];
			$sub_val=$_SESSION['sub_val'];
			$temp=$_SESSION['temp'];

			$query="select date,stu_count,stu_count_l,sem,dept from feedback_details where year=\"".$year."\" and sec=\"".$section."\" ;";
		   	$res = mysqli_query($link, $query);
		   	$row=mysqli_fetch_row($res);
            $d=$row[0];
			$sem=$row[3];
			$dep=$row[4];
			if($value=='lab')
				$student_count=$row[2];
			else $student_count=$row[1];
			
            echo "<center><font size='5' style='cursor:default;'>$replace Year - Section : $section</font></center><br>";
			echo "<p style='cursor:default; margin-left:31%;'>";
			 if($value=='fac'||$value=='sub')
	            echo "<b>Name of faculty               :</b>  $fac_val<br><br>";
	         echo "<b>Subject                             :</b>  $sub_val<br><br>";
	         echo "<b>Department                     :</b>  $dep <br><br>";
	         echo "<b>Semester                          :</b>  $sem<br><br>";
	         echo "<b>Date                                  :</b>  $d<br><br>";
	         echo "<b>No. of student present    :</b>  $student_count </p>";
			
			echo "<center><br><table border='2'>
			          <tr>
					    <th>Comments</th>
					   </tr>";
			if($value=='fac' or $value=='sub')
	        {
	          $table='comments';
	          $query = "SELECT comment FROM $table where sub_id=$temp and sec_id=$section and year=$year;";
	          $result = mysqli_query($link, $query);

	          while(list($com)=mysqli_fetch_row($result))
      		  {
      			echo "<tr><td style='width:400px;'>$com</td></tr>";
      		  }
	        }
	        else if($value=='lab')   
	        {
	          $table='comments_lab';
	          $query = "SELECT comment FROM $table where lab_id=$temp and sec_id=$section and year=$year;";
	          $result = mysqli_query($link, $query);

	          while(list($com)=mysqli_fetch_row($result))
      		  {
      			echo "<tr><td style='width:400px;'>$com</td></tr>";
      		  }
	        }
	        echo "</table>";

	?><br>
	 <p><button onclick='printPage()' style='cursor:pointer;'><font color='#006699'>Print</font></button></p>
	 </center>
</body>
</html>