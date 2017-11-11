<html>
<head>
<title>Overall Report-Feedback Online</title>
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
<body>
	  <br><br><br>
	 <?php
	         $replace=$_SESSION['replace'];
			 $section=$_SESSION['section'];
			 $year=$_SESSION['year'];
             
			 $link = mysqli_connect('localhost', 'root', '', 'feedback');
	          // Check connection
	          if (!$link) {
	              die("Connection failed: " . mysqli_connect_error());
	          }

	         $query="select date,stu_count,stu_count_l,sem,dept from feedback_details where year=\"".$year."\" and sec=\"".$section."\" ;";
		   	$res = mysqli_query($link, $query);
		   	$row=mysqli_fetch_row($res);
		   	$stu_lab_count=$row[2];
            $d=$row[0];
			$stu_sub_count=$row[1];
			$sem=$row[3];
			$dep=$row[4];
			
	         echo "<center><font size='5' style='cursor:default;' >$replace Year - Section : $section</font></center><br>";
			 echo "<p style='cursor:default; margin-left:31%;'><b>Department                     :</b>  $dep <br><br>";// get dept from db
	         echo "<b>Semester                          :</b>  $sem<br><br>";// get semester from db
	         echo "<b>Date                                  :</b>  $d<br><br>";// get system date 
	         echo "<b>No. of student present ( Sub )    :</b>  $stu_sub_count<br><br>";
			 echo "<b>No. of student present ( Lab )    :</b>  $stu_lab_count </p>";
			 //subjects
			 $fix='fix_'.$year.'_'.$section;
			 $table_data='feedback_data_'.$year;
			 $query = "SELECT count(*) from $fix ;";
	          if ($result = mysqli_query($link, $query)) {
	            	$count=mysqli_fetch_row($result);
	          	}
	          $sub_c=$count[0];

              echo "<center><br><table border='2' >
			          <tr>
					    <th>Faculty Name</th><th>Subject Name</th><th>A's Count</th><th>B's Count</th><th>C's Count</th><th>D's Count</th><th>Grade</th>
					   </tr>";
			 for($i=1;$i<=$sub_c;$i++)
			 {
				echo "<tr>";
				$query = "SELECT fac_name from $fix where id=$i;";
		          if ($result = mysqli_query($link, $query)) {
		            	$count=mysqli_fetch_row($result);
		          	}
		          $fac_name=$count[0];
		          echo "<td>$fac_name</td>";
				  
			 	$query = "SELECT sub_name from $fix where id=$i;";
		          if ($result = mysqli_query($link, $query)) {
		            	$count=mysqli_fetch_row($result);
		          	}
		          $sub_name=$count[0];
		          echo "<td>$sub_name</td>";

		          $k=$i-1;
				 $query = "SELECT sum(a) from $table_data where sub_id=$i and sec_id=$section;";
		          if ($result = mysqli_query($link, $query)) {
		            	$count=mysqli_fetch_row($result);
		          	}
		          $var_a=$count[0];

				 echo "<td>$var_a</td>";
				 
				 $query = "SELECT sum(b) from $table_data where sub_id=$i and sec_id=$section;";
		          if ($result = mysqli_query($link, $query)) {
		            	$count=mysqli_fetch_row($result);
		          	}
		          $var_b=$count[0];
				 echo"<td>$var_b</td>";

				 $query = "SELECT sum(c) from $table_data where sub_id=$i and sec_id=$section;";
		          if ($result = mysqli_query($link, $query)) {
		            	$count=mysqli_fetch_row($result);
		          	}
		          $var_c=$count[0];
				 echo"<td>$var_c</td>";

				 $query = "SELECT sum(d) from $table_data where sub_id=$i and sec_id=$section;";
		          if ($result = mysqli_query($link, $query)) {
		            	$count=mysqli_fetch_row($result);
		          	}
		          $var_d=$count[0];
				 echo"<td>$var_d</td>";
               
				 $grade=((5*$var_a)+(3*$var_b)+(1*$var_c)+(0*$var_d))/($var_a+$var_b+$var_c+$var_d);
				 $grade=round($grade,2);
				 echo"<td>$grade</td>";
				echo "</tr>";
			 }
			 echo "</table><br>";
			 
			 //labs
			 $table_data='feedback_data_lab_'.$year;
			 $query = "SELECT count(*) from $fix where lab_name!='NULL' ;";
	          if ($result = mysqli_query($link, $query)) {
	            	$count=mysqli_fetch_row($result);
	          	}
	          $lab_c=$count[0];

              echo "<table border='2' >
			          <tr>
					    <th>Lab Name</th><th>A's Count</th><th>B's Count</th><th>C's Count</th><th>D's Count</th><th>Grade</th>
					   </tr>";
	
			 for($i=1;$i<=$lab_c;$i++)
			 {
				echo "<tr>";
			 	$query = "SELECT lab_name from $fix where id=$i;";
		          if ($result = mysqli_query($link, $query)) {
		            	$count=mysqli_fetch_row($result);
		          	}
		          $lab_name=$count[0];
		          echo "<td>$lab_name</td>";

		          $k=$i-1;
				 $query = "SELECT sum(a) from $table_data where lab_id=$i and sec_id=$section;";
		          if ($result = mysqli_query($link, $query)) {
		            	$count=mysqli_fetch_row($result);
		          	}
		          $var_a=$count[0];

				 echo "<td>$var_a</td>";
				 
				 $query = "SELECT sum(b) from $table_data where lab_id=$i and sec_id=$section;";
		          if ($result = mysqli_query($link, $query)) {
		            	$count=mysqli_fetch_row($result);
		          	}
		          $var_b=$count[0];
				 echo"<td>$var_b</td>";

				 $query = "SELECT sum(c) from $table_data where lab_id=$i and sec_id=$section;";
		          if ($result = mysqli_query($link, $query)) {
		            	$count=mysqli_fetch_row($result);
		          	}
		          $var_c=$count[0];
				 echo"<td>$var_c</td>";

				 $query = "SELECT sum(d) from $table_data where lab_id=$i and sec_id=$section;";
		          if ($result = mysqli_query($link, $query)) {
		            	$count=mysqli_fetch_row($result);
		          	}
		          $var_d=$count[0];
				 echo"<td>$var_d</td>";
                 if($var_a==0&&$var_b==0&&$var_c==0&&$var_d==0)
					 $grade=0;
				 else $grade=((5*$var_a)+(3*$var_b)+(1*$var_c)+(0*$var_d))/($var_a+$var_b+$var_c+$var_d);
				 echo"<td>$grade</td>";
				echo "</tr>";
			 }
			 mysqli_close($link);
			 echo "</table>";
	 ?>
	 <br>
	 <p> <button onclick='printPage()'style='cursor:pointer;' ><font color='#006699'>Print</font></button></p>
	 </center>
</body>
</html>