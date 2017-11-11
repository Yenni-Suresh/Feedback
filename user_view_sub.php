<html>
<head>
  <title>Overall Subjects-Feedback Online</title>
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
	  ?>
	  </center>
	</header>
	 <style>
	    input[type='radio']{
			height:17px;
			width:20px;
			padding:3px;
			cursor:pointer; 
			position:relative;
			bottom:0px;
		}
	  table{
       padding:8px;
       cursor:default;
       text-align:center;
	   margin-left:-7%;
      }
	  td{
       padding:8px;
       cursor:default;
       text-align:center;
	   width:70px;
	  }
    </style>
  <link rel="StyleSheet" type="text/css" href="mystyle.css">
</head>
<body>
  <div class='dis' >
       <?php
	        session_start();
			if($_SESSION['sid']!=session_id() )
			{
			     header("location:feedback.php");
			}
            else if($_SESSION['one']!=0)
			{
				if($_SESSION['two']==0)
			         header("location:user_view_lab.php");
				 else header("location:thankyou.php");
			}
			else if($_SESSION['one']==1)
			{
				header("location:user_view_lab.php");
			}
	         $query="select year,section from temp;";
             $res = mysqli_query($link, $query);
             while(list($yr,$se)=mysqli_fetch_row($res))
            {
              $year=$yr;
              $sec=$se;
            }
	         echo "<font size='4' color='#f1f1f1' style='cursor:default;'>$year Year - Sec: $sec</font>";
	       ?>
		   </div><br>
  <center>
	 <font size='5' color='#006699' style='cursor:default;'><b>Subjects Feedback</b></font><br><br><br>
	 <form method='post' action='store_feedback_result.php'>
	  <?php
	  
		  $query="select year,section from temp;";
	       $res = mysqli_query($link, $query);
	       while(list($yr,$sec)=mysqli_fetch_row($res))
	       {
	         $year=$yr;
	         $section=$sec;
	       }

		 $query = "SELECT no_of_sub FROM year_structure where year_no=$year";
          	$result = mysqli_query($link, $query);
          	$row=mysqli_fetch_array($result);
	     	$sub=$row[0];
	     	
		 $table='section_details_'.$year.'_'.$section;
		 $query = "SELECT sub_name FROM $table ;";
          		$result = mysqli_query($link, $query);
				$subjects=array();
				$i=0;
		 while(list($sub_name)=mysqli_fetch_row($result))
		 {
			 $subjects[$i++]=$sub_name;
		 }	
		 $query = "SELECT question,option1,option2,option3,option4 FROM question_bank where overall='y' and ( status='For Boths' or status='For Subjects' ) ;";
            $result = mysqli_query($link, $query);
		 $i=1;
		 while(list($ques,$op1,$op2,$op3,$op4)=mysqli_fetch_row($result))
		 {
			 echo "<div class='feed'><font size='3' style='cursor:default;' ><font color='780000'><b>$i. $ques </b></font></div>";
			 echo "<p>A) $op1          B) $op2</p>";
			 echo "<p>C) $op3           D) $op4</p>";
			 echo "<table>";
			 for($j=1;$j<=$sub;$j++)
			 {
				$nam='val_'.$j.'_'.$i;
				$x=$j-1;
				echo "<tr><p><td style='text-align:right; width:100px;'><font size='4' >$subjects[$x] :</font></td> <td><input type='radio' name=$nam value='a' checked/>A</td>   <td><input type='radio' name=$nam value='b' />B</td>   <td><input type='radio' name=$nam value='c' />C</td>   <td><input type='radio' name=$nam value='d' />D</td></p></tr>";
			 }
			 echo '</table><br><br>';
			 $i++;
		 }
		 for($j=1;$j<=$sub;$j++)
		 {
			 $area='area'.$j;
			 $x=$j-1;
			 echo "<table></tr><td style='text-align:right; width:100px;'><font size='4' >$subjects[$x] :</font></td> <td><textarea name=$area placeholder='Any comment ?'
			 style=' border-width: 2px;
                     padding: 3px;
					 border-color: 780000;
					 border-radius: 3px;
                     font-size: 15px;
                     width: 650px;
                     height: 30px;
                     position:relative; bottom:-1px;' ></textarea></td></tr></table>";
		 }
		 echo "<br></font>";
		 echo "<input type='submit' name='user_sub' style='height:30px; width:80px; cursor:pointer; font-weight:bold; color:780000; ' /><br><br>";
		 echo "<input type='text' name='len' value=$i hidden/>";
		?>     
		</form>
	 </center>
	<footer>
<font color='#f1f1f1' style='float:right; font-size:15px; cursor:default;'>Yenni Suresh & Uday Koushik @Copyrights</font>
</footer>
</body>
</html>