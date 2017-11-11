<?php
         session_start();
         if($_SESSION['sid']!=session_id())
             header("location:thankyou.php");
		 
		 $con =  mysqli_connect('localhost', 'root', '', 'feedback');
	          // Check connection
	          if (!$con) {
	              die("Connection failed: " . mysqli_connect_error());
	          }
		 $query="select year,section from temp;";
             $res = mysqli_query($con, $query);
             while(list($yr,$se)=mysqli_fetch_row($res))
            {
              $year=$yr;
              $sec=$se;
            }
			$c=$_POST['area'];
	     mysqli_query($con,"insert into other_comments(year,sec,comment) values(\"".$year."\",\"".$sec."\",\"".$c."\") ");
		 header("location:thankyou.php?msg=Updated..");
		 mysqli_close();
?>