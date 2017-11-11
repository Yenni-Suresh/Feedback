<html>
<head>
<title>Other Comments-Feedback Online</title>
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
	  <a href='pastData_action.php' style="position:relative; top:-15px; left:2px; color:#f1f1f1;"><font size="4"><b>Back</b></font></a>
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
<body >
	   	 <br><br><br>
	 <?php
	         $replace=$_SESSION['replace'];
			 $section=$_SESSION['section'];
			 $year=$_SESSION['year'];
	 
	          $link = mysqli_connect('localhost', 'root', '', 'feedback');
	          // Check connection
	          if (!$link) {
	              die("Connection failed: " . mysqli_connect_error());
	              echo "connection failed";
	          }
	         $query="select date,stu_count_l,sem,dept from feedback_details where year=\"".$year."\" and sec=\"".$section."\" ;";
		   	$res = mysqli_query($link, $query);
		   	$row=mysqli_fetch_row($res);
            $d=$row[0];
			$student_count=$row[1];
			$sem=$row[2];
			$dep=$row[3];
			
	         
             echo "<center><font size='5' style='cursor:default;'>$replace Year - Section : $section</font></center><br><br>";
	         echo "<p style='cursor:default; margin-left:31%;'><b>Department                     :</b>  $dep<br><br>";// get dept from db
	         echo "<b>Semester                          :</b>  $sem<br><br>";// get semester from db
	         echo "<b>Date                                  :</b>  $d<br><br>";// get system date 
	         echo "<b>No. of student present    :</b>  $student_count</p>";// dynamically count numbr of student attempted to give feedback...how??
			 
			 echo "<br><center><table border='2' >
		          <tr>
				    <th>Comments</th>
				   </tr>";
		 	$query = "SELECT comment from other_comments where year=\"".$year."\" and sec=\"".$section."\" ";
        	$result = mysqli_query($link, $query);
	 		while(list($com)=mysqli_fetch_row($result))
			{
				echo"<tr>";
				echo"<td style='width:400px;'>$com</td>";
				echo"</tr>";
			}
			echo "</table>";
	 ?><center><br>
	 <p><button onclick='printPage()'style='cursor:pointer;' ><font color='#006699'>Print</font></button></p>
	 </center>
</body>
</html>