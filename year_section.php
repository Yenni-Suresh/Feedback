<html>
<head>
   <title>Year-Section-Feedback Online</title>
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
	  <a href='home.php' style="position:relative; top:-15px; left:4px;  color:#f1f1f1;"><font size="4"><b>Home</b></font></a>
      <a href='logout.php' style="position:relative; top:-15px; float:right; color:#f1f1f1;"><font size="4"><b>Logout</b></font></a>
	</header>
    <link rel="StyleSheet" type="text/css" href="mystyle.css">	
	<script src="jquery-2.1.4.min.js"></script>
	<script>
	     $(document).ready(function(){
             $("#ok").click(function(){
                  $(".full").hide();
              });
			});
	</script>
</head>
<body>
	  <br><br><br>
	   	  <font size="6" style='margin-left:34%; cursor:default;'>Select Year - Section</font><br><br><br><br>
	 <?php
		    echo "<form method='post' action='store_year_sec.php'>";

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
	            
			$no_of_years=$num[0];

			$i=1;

            echo "<font size='5' style='margin-left:34%; cursor:default;'><b>Year: </b></font><select name='year' style='width:50px; height:30px; padding:3px; border-radius:3px; cursor:pointer;'>";
			while($i <= $no_of_years){
			    echo("<option value=$i>$i</option>");
			    $i=$i+1;
			}
					   echo"</select>";// u getting these options from data base as stored from 'alter structure' in home page

			$query = "SELECT max(no_of_sec) FROM year_structure;";
	          if ($result = mysqli_query($link, $query)) {
	            	$num=mysqli_fetch_row($result);
	          	}

	    	$no_of_sections=$num[0];
			mysqli_close($link);

            echo "<font size='5' style='margin-left:20px; cursor:default;'><b>Section: </b></font><select name='section' style='width:50px; height:30px; padding:3px; border-radius:3px; cursor:pointer;'>";
			$i=1;
			
			while($i <= $no_of_sections){
				$op=chr(64+$i);
			    echo"<option value=$i>$op</option>";
			    $i=$i+1;
			}

		   echo "</select>";// u will filter these value according to value enter from above 'Year' and 'alter structure' in home page
		    echo "<br><br><p><input type='submit' style='margin-left:34%; width:90px; height:30px; cursor:pointer; color:#006699;' value='Next' ></p>";
            echo "</form>";
		?>
		<?php
       	    $msg=isset($_GET['msg']) ?  $_GET['msg']  : "";
            if($msg!="")
			{
				echo"<div class='full' >
                  <center>
                     <div class='warning' ><br><br>
                       <center>
					     <font size='5' color='crimson'>Entered Year-Section Doesn't Exist!!</font><br><br>
                         <font  id='ok' style='color:#006699; margin-right:10px; cursor:pointer;' size='6'><b>OK</b></font>
					   </center>
                     </div>
                  </center>
                </div>";
			}
	  ?>
</body>
</html>