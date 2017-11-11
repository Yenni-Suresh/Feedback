<html>
<head>
<title>Overall Labs-Feedback Online</title>
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
			     header("location:thankyou.php");
			}
            else if($_SESSION['one']==0)
			{
			     header("location:user_view_sub.php");
			}
	         $query="select year,section from temp;";
             $res = mysqli_query($link, $query);
             while(list($yr,$se)=mysqli_fetch_row($res))
            {
              $year=$yr;
              $sec=$se;
            }
	         echo "<font size='4' color='#f1f1f1' style='cursor:default;' >$year Year - Sec: $sec</font>";
	       ?>
		   </div><br>
  <center>
	 <font size='5' color='#006699' style='cursor:default;'><b>Labs Feedback</b></font><br><br><br>
	 <form method='post' action='store_feedback_result_lab.php'>
	  <?php

	  	$link = mysqli_connect('localhost', 'root', '', 'feedback');
          // Check connection
          if (!$link) {
              die("Connection failed: " . mysqli_connect_error());
          }
		  
          $query="select year,section from temp;";
	       $res = mysqli_query($link, $query);
	       while(list($yr,$sec)=mysqli_fetch_row($res))
	       {
	         $year=$yr;
	         $section=$sec;
	       }

		 $query = "SELECT no_of_labs FROM year_structure where year_no='".$year."' ";
          	$result = mysqli_query($link, $query);
          	$row=mysqli_fetch_array($result);
	     	$lab=$row[0];
		 $table='section_details_'.$year.'_'.$section;
		 $query = "SELECT lab_name FROM $table ;";
          		$result = mysqli_query($link, $query);
				$labs=array();
				$i=0;
		 while(list($lab_name)=mysqli_fetch_row($result))
		 {
			 $labs[$i++]=$lab_name;
		 }	
		 $query = "SELECT question,option1,option2,option3,option4 FROM question_bank where overall='y' and ( status='For Boths' or status='For Labs' ) ;";
            $result = mysqli_query($link, $query);
		 $i=1;
		 while(list($ques,$op1,$op2,$op3,$op4)=mysqli_fetch_row($result))
		 {
			echo "<div class='feed'><font style='cursor:default; font-size:20px;' ><font color='780000'><b>$i. $ques </b></font></div>";
			 echo "<p>A) $op1          B) $op2</p>";
			 echo "<p>C) $op3           D) $op4</p>";
			 echo "<table ><tr>";
			 for($j=1;$j<=$lab;$j++)
			 {
				$nam='val_'.$j.'_'.$i;
				$x=$j-1;
				echo "<tr><p><td style='text-align:right; width:100px;'><font size='4' >$labs[$x] :</font></td> <td><input type='radio' name=$nam value='a' checked/>A</td>   <td><input type='radio' name=$nam value='b' />B</td>   <td><input type='radio' name=$nam value='c' />C</td>   <td><input type='radio' name=$nam value='d' />D</td></p></tr>";
			 }
			 echo '</table><br>';
			 $i++;
		 }
	    $m=0;
		 for($j=1;$j<=$lab;$j++)
		 {
			 $m=1;
			 $area='area'.$j;
			 $x=$j-1;
			 echo "<table><tr><td style='text-align:right; width:100px;'><font size='4' >$labs[$x] :</font></td> <td><textarea name=$area placeholder='Any comment ?'
			 style=' border-width: 2px;
                     padding: 3px;
					 border-color: 780000;
					 border-radius: 3px;
                     font-size: 15px;
                     width: 650px;
                     height: 30px; 
					 position:relative; bottom:-1px; ' ></textarea></td></tr></table>";
		 }
		 if($m==0)
		 {
			  echo "<br><br><center><p>No Labs feedback for You</p>";
			   echo "<p>Just click 'Submit'</p><br><br></center>";
		 }
		 echo "<br></font>";
		 echo "<input type='submit' name='user_lab' style='height:30px; width:80px; cursor:pointer; font-weight:bold; color:780000; ' /><br><br>";
		 echo "<input type='text' name='len' value=$i hidden/>";
		 if($m==0)
		 {
		   echo"<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";
		 }
	   ?>     
		</form>
	 </center>
	 <footer>
<font color='#f1f1f1' style='float:right; font-size:15px; cursor:default;'>Yenni Suresh & Uday Koushik @Copyrights</font>
</footer>
</body>
</html>