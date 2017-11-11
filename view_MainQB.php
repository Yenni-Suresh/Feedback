<html>
<head>
 <title>Main Questions-Feedback Online</title>
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
	  <a href='home.php' style="position:relative; top:-15px; left:2px; color:#f1f1f1;"><font size="4"><b>Back</b></font></a>
	  <a href='home.php' style="position:relative; top:-15px; left:4px;  color:#f1f1f1;"><font size="4"><b>Home</b></font></a>
      <a href='logout.php' style="position:relative; top:-15px; float:right; color:#f1f1f1;"><font size="4"><b>Logout</b></font></a>
	</header>
  <link rel="StyleSheet" type="text/css" href="mystyle.css">
</head>
<body>
	 <center><br><br>
   <font size="5" style='cursor:default;'>Main Question Bank</font><br><br>
   
        <?php
          // Create connection
          $link = mysqli_connect('localhost', 'root', '', 'feedback');
          // Check connection
          if (!$link) {
              die("Connection failed: " . mysqli_connect_error());
          }
          $query = "SELECT question,id,status,option1,option2,option3,option4 FROM question_bank;";
          if ($result = mysqli_query($link, $query)) {
      		  echo"<form action='deleteQ_MainQB.php' method='post' >";
      		  echo "<div CLASS='dlong' align='left'>";
      		  while(list($ques,$id,$status,$o1,$o2,$o3,$o4)=mysqli_fetch_row($result))
      		  {
      			echo "<div class='question' ><p><table><tr><td style='width:70px;' align='center'><input type='checkbox' name=$id value=$id style='height:15px; width:15px; cursor:pointer; '><font size='3' style='cursor:default; color:780000;'> $id. </font></td><td> <font size='3' style='cursor:default; color:780000;'> $ques ($status)</font></td></tr></table>
				 <font > A. $o1         B. $o2 </font>  <br>  
				 <font >C. $o3         D. $o4</font></p></div>";
      		  }
			  echo "</div>";
      		  mysqli_close($link);
          }
           ?>
      <br><center>
      <input type='submit' style="width:250px; height:31px; color:#006699; cursor:pointer; " value='Delete Questions'/>
	 </form>
	 <?php echo $m = isset($_GET['deletemsg']) ?  $_GET['deletemsg']  : "";  ?>
	  <button style=" margin-left:15%; "><a href="addQ_MainQB.php" style='display:block; color:#006699;' >Add New Question</a></button>
	  <?php echo $m = isset($_GET['addmsg']) ?  $_GET['addmsg']  : "";  ?>
	  </center>
</body>
</html>
