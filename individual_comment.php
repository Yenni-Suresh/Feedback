<html>
<head>
  <title>Indi Report-Feedback Online</title>
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
	  <a href='individual_report.php' style="position:relative; top:-15px; left:2px; color:#f1f1f1;"><font size="4"><b>Back</b></font></a>
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
	   margin-top:0px;
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
			$link = mysqli_connect('localhost', 'root', '', 'feedback');
			// Check connection
			if (!$link) {
			  die("Connection failed: " . mysqli_connect_error());
			  echo "connection failed";
			}

			$query="select year,sec,date,stu_count,sub_lab,type,dept,sem from indi_details;";
		   	$res = mysqli_query($link, $query);
		   	$row=mysqli_fetch_row($res);
            $year=$row[0];
			$section=$row[1];
			$d=$row[2];
			$stu_count=$row[3];
			$sub_val=$row[4];
			$type=$row[5];
			$depart=$row[6];
			$sem=$row[7];
			
			if($type=='s')
			{
				$query="select faculty from indi_details ";
		   	    $res = mysqli_query($link,$query);
		   	    $row=mysqli_fetch_row($res);
                $fac_val=$row[0];
			}

             echo "<center><font size='5' style='cursor:default;'>Individual Feedback For Year : $year  - Section : $section</font></center><br>";
			 echo "<p style='cursor:default; margin-left:31%;'>";
			 if($type=='s')
	            echo "<b>Name of faculty               :</b>  $fac_val<br><br>";
	         echo "<b>Subject/Lab                     :</b>  $sub_val<br><br>";
	         echo "<b>Department                     :</b>  $depart <br><br>";
	         echo "<b>Semester                          :</b>  $sem<br><br>";
	         echo "<b>Date                                  :</b>  $d<br><br>";
	         echo "<b>No. of student present    :</b>  $stu_count </p><br>";
			 
		 	echo "<center><table border='2' >
		          <tr>
				    <th>Comments</th>
				   </tr>";
		 	$query = "SELECT comment from indi_comments;";
        	$result = mysqli_query($link, $query);
	 		while(list($com)=mysqli_fetch_row($result))
			{
				echo"<tr>";
				echo"<td style='width:400px;'>$com</td>";
				echo"</tr>";
			}
			echo "</table>";
	 ?><br>
	 <p><button onclick='printPage()' style='cursor:pointer; '><font color='#006699' >Print</font></button></p>
	 </center>
</body>
</html>