<html>
<head>
  <title>Alter Indi Questions-Feedback Online</title>
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
	  <a href='view_individualQB.php' style="position:relative; top:-15px; left:2px; color:#f1f1f1;"><font size="4"><b>Back</b></font></a>
	  <a href='home.php' style="position:relative; top:-15px; left:4px;  color:#f1f1f1;"><font size="4"><b>Home</b></font></a>
      <a href='logout.php' style="position:relative; top:-15px; float:right; color:#f1f1f1;"><font size="4"><b>Logout</b></font></a>
	</header>
  <link rel="StyleSheet" type="text/css" href="mystyle.css">
</head>
<body >

	  <br><br><br>
	  <center>
   <font size="5" style='cursor:default;'>Alter Questions For Individual Feedback</font><br><br>
      <div CLASS="dlong" align="left" >
        <?php 

        // Create connection
          $link = mysqli_connect('localhost', 'root', '', 'feedback');
          // Check connection
          if (!$link) {
              die("Connection failed: " . mysqli_connect_error());
          }
          
          $query = "SELECT question,id,indi,status FROM question_bank";
          $result = mysqli_query($link, $query);
          echo"<form method='post' action='ifeedback_alterDB.php'>";
          while(list($ques,$id,$indi,$status)=mysqli_fetch_row($result))
		  {
				    echo "<div class='question'><table><tr><td style='width:70px' align='center'>";
          		if($indi=='y')
			            echo "<p><input type='checkbox' name=$id style='height:15px; width:15px; cursor:pointer; ' checked/>";
                else echo "<p><input type='checkbox' name=$id style='height:15px; width:15px; cursor:pointer;' />";					
					echo "<font size='3' style='cursor:default; color:780000;'> $id. </font></td><td><font size='3' style='cursor:default; color:780000; position:relative; top:7px;'>  $ques ($status)</font></p></td></tr></table></div>";
		  }
     
          mysqli_close($link);

           ?>        
      </div><br>
	     <input type='submit' style="width:250px; height:30px; color:#006699; cursor:pointer;" value='Save Changes'/>
	  </center>
	 </form>
</body>
</html>
