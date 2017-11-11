<html>
<head>
   <title>Sub-Fac-Feedback Online</title>
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
	<script src="jquery-2.1.4.min.js"></script>
</head>
<body>
	<br><br>
	  <?php
	         $replace=$_SESSION['replace'];
			 $section=$_SESSION['section'];
			 $year=$_SESSION['year'];
             echo "<font size='5' style='margin-left:40%; cursor:default;'>$replace Year - Section : $section</font><br>";
		?>
	   <form name="one" onsubmit="return validate();" action="update_sub-fac.php" method='post'>
          <?php
          // Create connection
          $link = mysqli_connect('localhost', 'root', '', 'feedback');
          // Check connection
          if (!$link) {
              die("Connection failed: " . mysqli_connect_error());
          }

          $query = "SELECT regulation,semester FROM year_structure where year_no=$year;";
          $result = mysqli_query($link, $query);
          $row=mysqli_fetch_row($result);
          
          echo "<p style='margin-left:5%; top:0px; cursor:default;'>                         Regulation: <input type='text' name='one_regu' value=$row[0]  style='width:60px;' required/>               Semester: <input type='text' name='one_sem' value=$row[1] style='width:60px;' required/><br>
		           Faculty name                   |               Subject name           </p>
		  <div CLASS='ld'>
		   <ol>";
		   
		   //echo $year;
          $query = "SELECT no_of_sub FROM year_structure where year_no=$year;";
          if ($result = mysqli_query($link, $query)) {
            	$count=mysqli_fetch_row($result);
          	}
            
            $sub_c=$count[0];//take this value from data base as stored in alter structure
		    //echo $sub_c; 
		    
		    $table='section_details_'.$year.'_'.$section;

		    $query = "SELECT fac_name,sub_name FROM $table;";
          	$result = mysqli_query($link, $query);
          		
          		$i=0;
				while(list($fac_name,$sub_name)=mysqli_fetch_row($result))
				{
					if($i<$sub_c)
					{
						$f='fac'.$i;
						$s='sub'.$i;
						if($fac_name=='')
							$fac_name='-NA-';
						if($sub_name=='')
							$sub_name='-NA-';
			    		echo "<p><li><input type='text' value=\"".$fac_name."\" name=$f style='width:220px;'/><input type='text' value=\"".$sub_name."\" name=$s style='margin-left:30px; width:220px;' /></li></p>";
					}
					$i=$i+1;
				}
				//empty ones
				for(;$i<$sub_c;$i++)
				{
					$f='fac'.$i;
					$s='sub'.$i;
					if($fac_name=='')
							$fac_name='-NA-';
						if($sub_name=='')
							$sub_name='-NA-';
		    		echo "<p><li><input type='text' value=\"".$fac_name."\" name=$f style='width:220px;'/><input type='text' value=\"".$sub_name."\" name=$s style='margin-left:30px; width:220px;' /></li></p>";
				}
				
            ?>			  
		   </ol>
          </div>
		  <div CLASS="sd"><br>
		  <p style=' margin-left:120px; top:0px; cursor:default;'>Lab name</p>
		  <ol>
		    <?php
		    
          $query = "SELECT no_of_labs FROM year_structure where year_no=$year;";
          if ($result = mysqli_query($link, $query)) {
            	$count=mysqli_fetch_row($result);
          	}
            
            $lab_c=$count[0];//take this value from data base as stored in alter structure

            $query = "SELECT lab_name FROM $table;";
            $result = mysqli_query($link, $query);
          	
          		$i=0;
				while(list($lab_name)=mysqli_fetch_row($result))
          		{
          			if($lab_name==NULL)
          				break;
          			if($i<$lab_c)
	          		{		
						$l='lab'.$i;
						if($lab_name=='')
							$lab_name='-NA-';
						echo "<p><li><input type='text' value=\"".$lab_name."\" name=$l style='width:220px;'/></li></p>";
				  	}
				  	$i=$i+1;
				}
				//empty ones
				for(;$i<$lab_c;$i++)
				{
					$l='lab'.$i;
					if($lab_name=='')
							$lab_name='-NA-';
				  	echo "<p><li><input type='text' value=\"".$lab_name."\" name=$l style='width:220px;'/></li></p>";	
				}

				mysqli_close($link);
            ?>		
		  </ol>
         </div><br><br>
       <input type="submit" name="sub" value="Save Changes" style='margin-left:60%; width:200px; cursor:pointer; color:#006699;'/>
	   <?php echo $m = isset($_GET['msg']) ?  $_GET['msg']  : "";  ?>
	  </form>

</body>
</html>