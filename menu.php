<html>
<head>
  <title>Menu-Feedback Online</title>
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
	  <a href='year_section.php' style="position:relative; top:-15px; left:2px; color:#f1f1f1;"><font size="4"><b>Back</b></font></a>
	  <a href='home.php' style="position:relative; top:-15px; left:4px;  color:#f1f1f1;"><font size="4"><b>Home</b></font></a>
      <a href='logout.php' style="position:relative; top:-15px; float:right; color:#f1f1f1;"><font size="4"><b>Logout</b></font></a>
	</header>
  <link rel="StyleSheet" type="text/css" href="mystyle.css">
  <script src="jquery-2.1.4.min.js"></script>
  <script>
  $(document).ready(function(){
    $("#hide").click(function(){
        $("#one").hide();
		$("#two").hide();
    });
	$("#hid").click(function(){
        $("#one").hide();
		$("#three").hide();
    });
    $("#show").click(function(){
        $("#one").show();
		$("#two").show();
    });
	$("#feed").click(function(){
        $("#one").show();
		$("#three").show();
    });
   });
</script>
</head>
<body>
	 <br><br><br>
	  <center>
	 <?php
	         $replace=$_SESSION['replace'];
	         $year=$_SESSION['year'];
			 $section=$_SESSION['section'];
             echo "<font size='6' style='cursor:default;'>$replace Year - Section : $section</font><br><br>";
		?><br>
         <a href="pastData_action.php" style='color:#006699;'><font size='5'>Display Results</font></a><br><br><br>
		 <a href="sub-fac.php" style=' color:#006699; '><font size='5' >Update Faculty-Subjects</font></a><br><br><br>
        <a href="select_facORsub.php" style=' color:#006699; '><font size='5' >Take Individual Feedback</font></a><br><br><br>
		<font size='5' id='feed' style='color:green; cursor:pointer;' >Take Overall Feedback</font></a><br><br><br>
		<font id="show" color='crimson' size='5' style='cursor:pointer;'>Reset Feedback</font><br><br>
		<p><?php echo $m = isset($_GET['msg']) ?  $_GET['msg']  : "";  ?></p>
		<div class='full' id='one' hidden>
		<center>
		 <div class='warning' id='two' hidden>
		  <center>
		   <br><br>
		   <font color='crimson' size='5' ><b>This will Clean all settings and data.<b></font>
		   <br><br>
		   <p style='cursor:default;'><a href='reset.php' style='color:#006699;' id="ok"><font size='5'><b>OK</b><font></a>      <font id="hide" color='#006699' style='cursor:pointer;' size='5'  ><b>Cancel</b></font></p>
		  </center>
		</div>
		<div class='warning' id='three' hidden>
		  <center><br>
		   <font color='crimson' size='5' ><b>Are sure about taking Feedback ?<b></font><br>
		   <font color='crimson' size='4' ><b>Overall past data will be lost !!<b></font>
		   <br>
		   <p style='cursor:default;'><a href='initial_setup_overall_feedback.php' style='color:#006699;' id="ok"><font size='5'><b>Yes</b><font></a>      <font id="hid" color='#006699' style='cursor:pointer;' size='5'  ><b>No</b></font></p>
		  </center>
		</div>
		</center>
	</div>
    </center>
</body>
</html>