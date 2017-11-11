<html>
<head>
 <title>Select Indi-Feedback Online</title>
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
	  <a href='menu.php' style="position:relative; top:-15px; left:2px; color:#f1f1f1;"><font size="4"><b>Back</b></font></a>
	  <a href='home.php' style="position:relative; top:-15px; left:4px;  color:#f1f1f1;"><font size="4"><b>Home</b></font></a>
      <a href='logout.php' style="position:relative; top:-15px; float:right; color:#f1f1f1;"><font size="4"><b>Logout</b></font></a>
	</header>
  <link rel="StyleSheet" type="text/css" href="mystyle.css">
</head>
<body>
 
	 <br><br><br>
	  <center>
	 <?php
	 			
	         $replace=$_SESSION['replace'];
	         $year=$_SESSION['year'];
			 $section=$_SESSION['section'];
             echo "<font size='6' style='cursor:default;'>$replace Year - Section : $section</font><br>";
		
		?><br><br>
	 <?php
	 	  echo "<form method='post' action='decide_facOrSubOrLab.php'>";
		   
          $link = mysqli_connect('localhost', 'root', '', 'feedback');
          // Check connection
          if (!$link) {
              die("Connection failed: " . mysqli_connect_error());
              echo "connection failed";
          }
          
          $table='section_details_'.$year.'_'.$section;
          
          $query = "SELECT id,fac_name FROM $table";

          $result = mysqli_query($link, $query);

          echo "<input type='radio' name='decide' value='fac' style='width:20px; height:20px; padding:3px; cursor:pointer; position:relative; bottom:-5px;' required/>
			      <font size='4' style='cursor:default;'><b>Faculty: </b></font>
			      <select name='faculty' style='width:250px; height:30px; padding:3px; border-radius:3px; cursor:pointer;'>";

      	  while(list($id,$fac_name)=mysqli_fetch_row($result))
  		  {
  			echo "<option value=$id>$fac_name</option>";
  		  }
			
			echo "</select>";
			echo "<br><br><font size='4' style='cursor:default;'>OR</font><br><br>";
            
		
			$query = "SELECT id,sub_name FROM $table;";

          	$result = mysqli_query($link, $query);

          	echo "<input type='radio' name='decide' value='sub' style='width:20px; height:20px; padding:3px; cursor:pointer; position:relative; bottom:-5px;' required/>
			      <font size='4' style='cursor:default;'><b>Subject: </b></font>
			      <select name='subject' style='width:250px; height:30px; padding:3px; border-radius:3px; cursor:pointer;'>";

      			while(list($id,$sub_name)=mysqli_fetch_row($result))
      		  	{
      				echo "<option value=$id>$sub_name</option>";
      		  	}
      		  
      		echo "</select>";// 
			echo "<br><br><font size='4' style='cursor:default;'>OR</font><br><br>";
			
		
      		$query = "SELECT id,lab_name FROM $table;";
          	
            $result = mysqli_query($link, $query);

            echo "<input type='radio' name='decide' value='lab' style='width:20px; height:20px; padding:3px; cursor:pointer; position:relative; bottom:-5px;' required/>
			      <font size='4' style='cursor:default;'><b>Lab: </b></font>
			      <select name='lab' style='width:250px; height:30px; padding:3px; border-radius:3px; cursor:pointer;'>";
			      
			while(list($id,$lab_name)=mysqli_fetch_row($result))
      		{
				if($lab_name)
					echo "<option value=$id >$lab_name</option>";
			}
			echo "</select>";
			echo "<br><br><br><font size='3' color='crimson' style='cursor:default;' >On Taking New Feedback , Past Data For Individual Feedback Will Be Lost !!</font>";
		    echo "<br><br><input type='submit' style='width:150px; height:30px; color:green; cursor:pointer;' value='Take Feedback' />";
            echo "</form>";

            mysqli_close($link);
	?>
    </center>
</body>
</html>