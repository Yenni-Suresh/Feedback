<html>
<head>
</head>
<body >
  <?php
         session_start();
         if($_SESSION['sid']!=session_id())
             header("location:login.php");
		 $con =  mysqli_connect('localhost', 'root', '', 'feedback');
	          // Check connection
	          if (!$con) {
	              die("Connection failed: " . mysqli_connect_error());
	          }
		 $result = $con->query("select year_no,no_of_sec from year_structure");
		 $var=0;
		 while(list($yr,$se)=mysqli_fetch_row($result))
         {
		   $tem_yr="".$yr."";
	       if($_REQUEST['year']==$tem_yr&&$_REQUEST['section']<=$se)
		   {
			   $var=1;
			   $year=$_REQUEST['year'];
			   $sec=$_REQUEST['section'];
			   $_SESSION['year']=$year;
               $_SESSION['section']=$sec;
               
			   $query="delete from temp;";
               $result = mysqli_query($con, $query);
			   
			   $query="insert into temp (year, section) values($year,$sec);";
               $result = mysqli_query($con, $query);

		       $i=$_SESSION['year'];
			  if($i==1)
				  $_SESSION['replace']='1st ';
			  else if($i==2)
				  $_SESSION['replace']='2nd';
			  else if($i==3)
				  $_SESSION['replace']='3rd';
			  else if($i==4)
				  $_SESSION['replace']='4th';
			  else if($i==5)
				  $_SESSION['replace']='5th';
			  else if($i==6)
				  $_SESSION['replace']='6th';
			  else if($i==7)
				  $_SESSION['replace']='7th';
			  header('Location: ' . "menu.php");
			  break;
		   }
         }
		if($var==0)
			header("location:year_section.php?msg=123");
			
       ?>

</body>
</html>