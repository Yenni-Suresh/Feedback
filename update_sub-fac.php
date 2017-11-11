<html>
<head>
</head>
<body>
  <?php
  		session_start();
        $reg=$_REQUEST['one_regu'];
	    $sem=$_REQUEST['one_sem'];
	    $year=$_SESSION['year'];
	  		//echo $year;
	    $rep=$_SESSION['replace'];
	    $sec=$_SESSION['section'];	   
	    // Create connection
          $link = mysqli_connect('localhost', 'root', '', 'feedback');
          // Check connection
          if (!$link) {
              die("Connection failed: " . mysqli_connect_error());
          }
          $query = "update year_structure set regulation = '$reg', semester=$sem where year_no=$year;";
          $result = mysqli_query($link, $query);

          $query = "SELECT no_of_sub FROM year_structure where year_no=$year;";
          if ($result = mysqli_query($link, $query)) {
            	$count=mysqli_fetch_row($result);
          	}
		        $sub_c=$count[0];
		        $table='section_details_'.$year.'_'.$sec;
		        echo $table;
				for($i=0;$i<$sub_c;$i++)
				{
					$temp='fac'.$i;
					$fac=$_POST[$temp];
					echo $fac;
					$temp='sub'.$i;
					$sub=$_POST[$temp];
					echo $sub;
					$temp=$i+1;
					$query = "insert into ".$table."(id,fac_name,sub_name) values($temp,'$fac','$sub');";
          			if(!mysqli_query($link, $query))
          			{
          				
						$query = "update $table set fac_name='$fac' , sub_name='$sub' where id=$temp;";
          				mysqli_query($link, $query);
          			}
				}

				$query = "SELECT no_of_labs FROM year_structure where year_no=$year;";
          		$result = mysqli_query($link, $query);
            	$count=mysqli_fetch_row($result);
          	
		        $lab_c=$count[0];
		        $table='section_details_'.$year.'_'.$sec;
				
				echo $table;
				for($i=0;$i<$lab_c;$i++)
				{
					$temp='lab'.$i;
					$lab=$_POST[$temp];
					echo $lab;
					$temp=$i+1;
					$query = "insert into $table(id,lab_name) values($temp,'$lab');";
          			if(!mysqli_query($link, $query))
          			{
          				$query = "update $table set lab_name='$lab' where id=$temp;";
          				mysqli_query($link, $query);
          			}
				}
          mysqli_close($link);

	   header('Location: ' . "sub-fac.php?msg=Data+updated..");	 
	?>
</body>
</html>