<?php
         session_start();
         if($_SESSION['sid']!=session_id())
             header("location:login.php");
		 
		 $year=$_SESSION['year'];
		 $section=$_SESSION['section'];
	    
          $link = mysqli_connect('localhost', 'root', '', 'feedback');
          if (!$link) {
              die("Connection failed: " . mysqli_connect_error());
          }
          
		  mysqli_query($link,"delete from indi_details");
			  
		  mysqli_query($link,"delete from indi_comments");
			   
		  mysqli_query($link,"delete from indi_feedback_data");
		  
		  mysqli_close($link);
	  header('Location: ' . "pastData_action.php?msg=Feedback Cleared..");
?>