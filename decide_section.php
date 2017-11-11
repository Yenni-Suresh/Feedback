<html>
<head>
  <title>Sec-Sub-Lab-Feedback Online</title>
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
	  <a href='structure_year.php' style="position:relative; top:-15px; left:2px; color:#f1f1f1;"><font size="4"><b>Back</b></font></a>
	  <a href='home.php' style="position:relative; top:-15px; left:4px;  color:#f1f1f1;"><font size="4"><b>Home</b></font></a>
      <a href='logout.php' style="position:relative; top:-15px; float:right; color:#f1f1f1;"><font size="4"><b>Logout</b></font></a>
	</header>
  <link rel="StyleSheet" type="text/css" href="mystyle.css">
</head>
<body>
	  <br><br><br>
	  <center>
	  <font size="6" style='cursor:default;'>Number Of Sections, Subject and Labs</font><br><br>
		 <?php
		 // Create connection
          $link = mysqli_connect('localhost', 'root', '', 'feedback');
          // Check connection
          if (!$link) {
              die("Connection failed: " . mysqli_connect_error());
          }
          $query = "SELECT count(*) FROM year_structure;";
          if ($result = mysqli_query($link, $query)) {
            	$num=mysqli_fetch_row($result);
          	}
            //echo "number of years:". $num[0];

		    $_SESSION['struct_year']=$num[0]; //you take this value frm data base 
		    $i=1;
			
			while($i<=$_SESSION['struct_year'])
			{
			  if($i==1)
				  $replace='1st';
			  else if($i==2)
				  $replace='2nd';
			  else if($i==3)
				  $replace='3rd';
			  else if($i==4)
				  $replace='4th';
			  else if($i==5)
				  $replace='5th';
			  else if($i==6)
				  $replace='6th';
			  else if($i==7)
				  $replace='7th';

			  $subreplace=$i;
			  $replace_sec=$replace.'_section';
			  $replace_subject=$replace.'_subject';
			  $replace_lab=$replace.'_lab';
			  $result=mysqli_query($link,"select no_of_sec,no_of_sub,no_of_labs from year_structure where year_no=$i;");
			  $final=mysqli_fetch_array($result);
			     echo "<form name='send' method='post' action='update_structure.php'>";
			     echo "<p style='cursor:default;' >$replace Year : <input type='text' name=$replace_sec style='width:70px; height:25px;' placeholder='Sections' value=$final[0] required/>    <input type='text' name=$replace_subject style='width:70px; height:25px;' placeholder='Subjects' value=$final[1] required/>    <input type='text' name=$replace_lab style='width:70px; height:25px;' placeholder='Labs' value=$final[2] required/>    <input type='submit' name=$subreplace value='Submit' style='cursor:pointer; color:#006699; '/></p>";
			     echo "</form>";
			  $i=$i+1;
			}
			
			$query="select dept from login_details;";
			$result=mysqli_query($link,$query);
			$deeep=mysqli_fetch_row($result);
			
			echo "<form name='dept_sub' method='POST' action='changedept.php' ><input type='text' name='department' value=\"".$deeep[0]."\" placeholder='Department Name' 
			style='width:325px; height:35px; border-width: 1px;
                    padding: 4px;
                    font-size: 16px;
                    border-radius: 3px;'/> <input type='submit' name='dep_sub' value='Submit' style='cursor:pointer; color:#006699; ' /></form>";
					mysqli_close($link);
		 ?>
		 <p><?php echo $m = isset($_GET['msg']) ?  $_GET['msg']  : "";  ?></p>
		</center>
</body>
</html>