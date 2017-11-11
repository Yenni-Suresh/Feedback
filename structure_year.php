<html>
<head>
 <title>Alter Structure-Feedback Online</title>
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
  <script src="jquery-2.1.4.min.js"></script>
	<script>
	     $(document).ready(function(){
              $("#add_year").click(function(){
				   $(".full").show();
				   $("#two").hide();
				   $("#one").show();
                });
			  $("#remove_year").click(function(){
                   //$("li:last").remove();
				   $(".full").show();
				   $("#one").hide();
				   $("#two").show();
			  });
			  $("#one_hide").click(function(){
                   $(".full").hide();
              });
			  $("#two_hide").click(function(){
                   $(".full").hide();
              });
			});
	</script>
</head>
<body>
  
	 <br><br><br>
	  <center>
	  <font size="5" style='cursor:default;'>Number Of Existing Years</font><br><br>
	    <?php

	    // Create connection
          $link = mysqli_connect('localhost', 'root', '', 'feedback');
          // Check connection
          if (!$link) {
              die("Connection failed: " . mysqli_connect_error());
          }
          $query = "SELECT count(*) FROM year_structure;";
          if ($result = mysqli_query($link, $query)) {
            	$count=mysqli_fetch_row($result);
          	}
            mysqli_close($link);

		 $year=$count[0]; 
		 echo "<font style='font-size:150px;'><b>$year</b></font>";
		 ?>
	   <br><br>
	   <input type='submit' id="add_year" style='width:250; height:30; color:crimson; cursor:pointer;' value='Add New Year' />
	   <input id="remove_year" style=' margin-left:20px; width:250; height:30; color:crimson; cursor:pointer;' type='submit' value='Remove Existing Year'/>
	  <button id="sub" style='margin-left:20px; width:150; height:40;'><a href='decide_section.php' style='display:block; color:#006699;'><b>Edit Structure</b></a></button><br><br>Minimum possible Years are 1 and Maximum are 7<p><b><?php echo $m = isset($_GET['msg']) ?  $_GET['msg']  : "";  ?></b></p>
	  <div class='full' hidden>
		<center>
		 <div class='warning' id='one' >
		  <center>
		   <br><br>
		   <font color='crimson' size='5' style='cursor:default;'>Sure about adding new year ?</font>
		   <br><br>
		   <p style='cursor:default;'><a href='add_year.php' id="ok" style='color:#006699; cursor:pointer;'><font size='5'><b>Yes</b></font></a>      <font id="one_hide" color='#006699' size='5' style='cursor:pointer;' ><b>No</b></p>
		  </center>
		</div>
		<div class='warning' id='two'>
		  <center><br>
		   <font color='crimson' size='5' style='cursor:default;'>Sure about deleting existing year ?</font>
		   <br>
		   <p style='cursor:default;'><a href='remove_year.php' id="ok" style='color:#006699; cursor:pointer;'><font size='5'><b>Yes</b></font></a>      <font id="two_hide" color='#006699' size='5' style='cursor:pointer;' ><b>No</b></p>
		  </center>
		</div>
      </center>
	</div>
	  </center>
</body>
</html>