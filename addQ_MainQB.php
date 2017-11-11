<html>
<head>
 <title>Add Question-Feedback Online</title>
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
	  <a href='view_MainQB.php' style="position:relative; top:-15px; left:2px; color:#f1f1f1;"><font size="4"><b>Back</b></font></a>
	  <a href='home.php' style="position:relative; top:-15px; left:4px;  color:#f1f1f1;"><font size="4"><b>Home</b></font></a>
      <a href='logout.php' style="position:relative; top:-15px; float:right; color:#f1f1f1;"><font size="4"><b>Logout</b></font></a>
	</header>
  <link rel="StyleSheet" type="text/css" href="mystyle.css">
</head>
<body>
        <center><br><br><br>
		     <font size="5" style='cursor:default;'>Enter New Question</font><br><br>
	         <form name="newques" method="post" action="newQ_updated.php">
                <br><textarea name="ques" rows="6" cols="120" value="" placeholder='Enter question..' required></textarea>
				 <p><font size='3' style='cursor:default;'>Keep '?' at the End of Question.</font></p>
				<p style='cursor:default;'><input type='radio' name='status' value='For Subjects' style='cursor:pointer;'/>For Subjects              <input type='radio' style='cursor:pointer;' name='status' value='For Labs' />For Labs           <input type='radio' name='status' style='cursor:pointer;' value='For Boths' required/>For Both</p>
				<p><input name='option1' type='text' placeholder='Option A' required/>        <input name='option2' type='text' placeholder='Option B' required/></p>  
                <p><input name='option3' type='text' placeholder='Option C' required/>        <input name='option4' type='text' placeholder='Option D' required/></p><br>
			  <input type="submit" name="new" style="width:250px; height:30px; color:#006699; cursor:pointer;" value="Add Question" >
	         </form><br>
     </center>
</body>
</html>