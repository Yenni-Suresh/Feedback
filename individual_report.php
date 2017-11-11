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
	   margin-top:-70px;
      }
    </style>
  <link rel="StyleSheet" type="text/css" href="mystyle.css">
  <script src="jquery-2.1.4.min.js"></script>
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
	           echo "<b>Name of faculty               :</b>  $fac_val<br><br>";// get faculty name from db
	         echo "<b>Subject/Lab                     :</b>  $sub_val<br><br>";// get subject name from db
	         echo "<b>Department                     :</b>  $depart <br><br>";// get dept from db
	         echo "<b>Semester                          :</b>  $sem<br><br>";// get semester from db
	         echo "<b>Date                                  :</b>  $d<br><br>";// get system date 
	         echo "<b>No. of student present    :</b>  $stu_count </p>";// dynamically count numbr of student attempted to give feedback...how?? 
			 
	         $table='indi_feedback_data';
			 
			 $query = "select count(*) from $table;";
	          if ($result = mysqli_query($link, $query)) {
	            	$rows=mysqli_fetch_row($result);
	          	}
             echo "<center><table border='2' >
			          <tr>
					    <th>S.no</th><th>A's Count</th><th>B's Count</th><th>C's Count</th><th>D's Count</th>
					   </tr>";
			  /*$query = "SELECT question FROM question_bank where indi='y' and ( status='For Boths' or status='For Subjects' );";
		      $result = mysqli_query($link, $query);
		      $ques=array();
		      $i=0;
		      while(list($que)=mysqli_fetch_row($result))
		      {
		        $ques[$i++]=$que;
		      }*/
			 for($i=1;$i<=$rows[0];$i++)	
			 {
               echo "<tr>";
               $k=$i-1;
                   //echo "<td style='width:500px;'>$ques[$k]</td>";
				   echo "<td>$i</td>";
				 $query = "select no_of_a from $table where id=$i;";
		          if ($result = mysqli_query($link, $query)) {
		            	$count=mysqli_fetch_row($result);
		          	}
		          $var_a=$count[0];

				 echo "<td>$var_a</td>";
				 
				 $query = "select no_of_b from $table where id=$i;";
		          if ($result = mysqli_query($link, $query)) {
		            	$count=mysqli_fetch_row($result);
		          	}
		          $var_b=$count[0];
				 echo"<td>$var_b</td>";

				 $query = "select no_of_c from $table where id=$i;";
		          if ($result = mysqli_query($link, $query)) {
		            	$count=mysqli_fetch_row($result);
		          	}
		          $var_c=$count[0];
				 echo"<td>$var_c</td>";

				 $query = "select no_of_d from $table where id=$i;";
		          if ($result = mysqli_query($link, $query)) {
		            	$count=mysqli_fetch_row($result);
		          	}
		          $var_d=$count[0];
				 echo"<td>$var_d</td><br>";
                 echo "</tr>";
				 $grade=((5*$var_a)+(3*$var_b)+(1*$var_c)+(0*$var_d))/($var_a+$var_b+$var_c+$var_d);
			 }
			 echo "<tr><td><b>Total</b></td>";
			        $query = "select sum(no_of_a) from $table";
		          if($result = mysqli_query($link,$query))
		            	$count=mysqli_fetch_row($result);
						$t=$count[0];
				 echo"<td>$t</td>";
			   $query = "select sum(no_of_b) from $table";
		          if($result = mysqli_query($link,$query))
		            	$count=mysqli_fetch_row($result);
						$t=$count[0];
				 echo"<td>$t</td>";
				 $query = "select sum(no_of_c) from $table";
		          if($result = mysqli_query($link,$query))
		            	$count=mysqli_fetch_row($result);
						$t=$count[0];
				 echo"<td>$t</td>";
				 $query = "select sum(no_of_d) from $table";
		          if($result = mysqli_query($link,$query))
		            	$count=mysqli_fetch_row($result);
						$t=$count[0];
				 echo"<td>$t</td>";
			 echo "</tr></table>";
	         echo"<br> <font size='4' color='#006699' style='cursor:default;'>Grade :</font> $grade";
	 ?>
	 <p><button><a href="individual_comment.php" style='display:block; color:#006699;'>Comments</a></button>    <button onclick='printPage()' style='cursor:pointer; '><font color='#006699' >Print</font></button>       <button><a href="indi_reset.php" style='display:block; color:#006699;'>Clear This Feedback</a></button> </p>
	 </center>
</body>
</html>