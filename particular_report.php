<html>
<head>
<title>Overall Indi Report-Feedback Online</title>
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
	  <a href='particular_facORsub_Report.php' style="position:relative; top:-15px; left:2px; color:#f1f1f1;"><font size="4"><b>Back</b></font></a>
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

			 $temp=$_SESSION['temp'];
			 $fix='fix_'.$year.'_'.$section;
			 
			if($value=='fac'||$value=='sub')
	        {
	          $query = "SELECT sub_name,fac_name FROM $fix where id=$temp;";
	          $result = mysqli_query($link, $query);
	          $row=mysqli_fetch_array($result);
	          $sub_val=$row[0];
	          $fac_val=$row[1];
			  $_SESSION['fac_val']=$fac_val;
	        }
	        else if($value=='lab')   
	        {
	          $query = "SELECT lab_name FROM $fix where id=$temp;";
	          $result = mysqli_query($link, $query);
	          $row=mysqli_fetch_array($result);
	          $sub_val=$row[0];
			}
            $query="select date,stu_count,stu_count_l,sem,dept from feedback_details where year=\"".$year."\" and sec=\"".$section."\" ;";
		   	$res = mysqli_query($link, $query);
		   	$row=mysqli_fetch_row($res);
            $d=$row[0];
			$sem=$row[3];
			$dep=$row[4];
			if($value=='lab')
				$student_count=$row[2];
			else $student_count=$row[1];
			
	        $_SESSION['sub_val']=$sub_val;

            echo "<center><font size='5' style='cursor:default;'>$replace Year - Section : $section</font></center><br>";
			 echo "<p style='cursor:default; margin-left:31%;'>";
			 if($value=='fac'||$value=='sub')
	           echo "<b>Name of faculty               :</b>  $fac_val<br><br>";
	         echo "<b>Subject                             :</b>  $sub_val<br><br>";
	         echo "<b>Department                     :</b>  $dep <br><br>";
	         echo "<b>Semester                          :</b>  $sem<br><br>";
	         echo "<b>Date                                  :</b>  $d<br><br>";
			 echo "<b>No. of student present ( $value )    :</b>  $student_count </p>";
			
			echo "<center><br><table border='2'>
			          <tr>
					    <th>S.no</th><th>A's Count</th><th>B's Count</th><th>C's Count</th><th>D's Count</th>
					   </tr>";
			$var_a=0;
	        $var_b=0;
	        $var_c=0;
	        $var_d=0;
			if($value=='fac' or $value=='sub')   
	        {
	          $table='feedback_data_'.$year;
	          $query = "SELECT a,b,c,d FROM $table where sub_id=$temp and sec_id=$section;";
	          $result = mysqli_query($link, $query);
               $z=1;
	          while(list($a,$b,$c,$d)=mysqli_fetch_row($result))
      		  {
				  
      		  	$var_a+=$a;
      		  	$var_b+=$b;
      		  	$var_c+=$c;
      		  	$var_d+=$d;
      			echo "<tr><td>$z</td> <td>$a</td> <td>$b</td> <td>$c</td> <td>$d</td> </tr>";
				$z++;
      		  }

	        }
	        else if($value=='lab')
	        {
	          $table='feedback_data_lab_'.$year;
	          $query = "SELECT a,b,c,d FROM $table where lab_id=$temp and sec_id=$section;";
	          $result = mysqli_query($link, $query);
                $z=1;
	          while(list($a,$b,$c,$d)=mysqli_fetch_row($result))
      		  {
      		  	$var_a+=$a;
      		  	$var_b+=$b;
      		  	$var_c+=$c;
      		  	$var_d+=$d;
      			echo "<tr><td>$z</td> <td>$a</td> <td>$b</td> <td>$c</td> <td>$d</td> </tr>";
				$z++;
      		  }
	        }
	        echo "<tr><td><b>Total</b></td>";
				 echo"<td>$var_a</td>";
				 echo"<td>$var_b</td>";
				 echo"<td>$var_c</td>";
				 echo"<td>$var_d</td>";
			 echo "</tr></table>";
	        if($var_a+$var_b+$var_c+$var_d > 0){
	        	$grade=((5*$var_a)+(3*$var_b)+(1*$var_c)+(0*$var_d))/($var_a+$var_b+$var_c+$var_d);
	        }
	        else{
	        	$grade=0;
	        }
			$grade=round($grade,2);
	 		echo"<br><font size='4' color='#006699' style='cursor:default;'>Grade :</font> $grade";
	 ?><p><button><a href="particular_comment.php" style='display:block; color:#006699;'>Comments</a></button>    <button onclick='printPage()' style='cursor:pointer;'><font color='#006699'>Print</font></button></p>
	 </center>
</body>
</html>