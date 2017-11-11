<html>
<head>
  <title>Individual Subject-Feedback Online</title>
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
	         $query="select year,section from temp;";
             $res = mysqli_query($link, $query);
             while(list($yr,$se)=mysqli_fetch_row($res))
            {
              $year=$yr;
              $sec=$se;
            }
	         echo "<font size='4' color='#f1f1f1' style='cursor:default;'>$year Year - Sec: $sec</font>";
	       ?>
		   </div>
  <br>
  <center>
   <font size='5' color='#006699' style='cursor:default;' ><b>Individual Feedback ( Subject ) </b></font><br><br><br>
	 <form method='post' action='submit_indi_fac.php'>
	  <?php
	  
		   $query="select year,sec,sub_lab from indi_details;";
		   $res = mysqli_query($link, $query);
		   while(list($yr,$sec,$sl)=mysqli_fetch_row($res))
		   {
		   	 $year=$yr;
		   	 $section=$sec;
			 $sub=$sl;
		   }
		   
	   		$fr='For Subjects';
			 
		 $query = "SELECT question,option1,option2,option3,option4 FROM question_bank where indi='y' and ( status='".$fr."' or status='For Boths' );";
          $res = mysqli_query($link, $query);
	     $i=1;
		 while(list($ques,$op1,$op2,$op3,$op4)=mysqli_fetch_row($res))
		 {
			 echo "<div class='feed'><font size='3' style='cursor:default;' ><font color='780000'><b>$i. $ques </b></font></div>";
			 echo "<p>A) $op1          B) $op2</p>";
			 echo "<p>C) $op3           D) $op4</p>";
			 echo "<table ><tr>";
				 echo "<p><td style='text-align:right; width:100px;'><font size='4' >".$sub.":</font></td> <td ><input type='radio' name=$i value='a' checked/>A</td>  <td><input type='radio' name=$i value='b' />B</td>   <td><input type='radio' name=$i value='c'  />C</td>   <td ><input type='radio' name=$i value='d'  />D</td></p>";
			 echo '</tr></table><br>';	
			 $i=$i+1;
		 }
		 echo "<table><tr><p><td style='text-align:right; width:100px;'><font size='4' >$sub:</font></td> <td><textarea name='area' placeholder='Any comment ?'
			 style=' border-width: 2px;
                     padding: 3px;
					 border-color: #780000;
					 border-radius: 3px;
                     font-size: 15px;
                     width: 650px;
                     height: 30px;
                      position:relative; bottom:-1px; '></textarea></td></p>";
		 echo '</tr></table><br></font>';
		 echo "<input type='submit' name='user_sub' style='height:30px; width:80px; cursor:pointer; font-weight:bold; color:#780000; ' /><br><br><br>";
		 echo "<input type='text' value=$i name='len' hidden/>";
		?>     
		</form>
	 </center>
<footer>
<font color='#f1f1f1' style='float:right; font-size:15px; cursor:default;'>Yenni Suresh & Uday Koushik @Copyrights</font>
</footer>
</body>
</html>