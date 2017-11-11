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
          
		   $table='section_details_'.$year.'_'.$section;
	      mysqli_query($link,"delete from $table ");
		  
		  mysqli_query($link,"delete from comments where year=\"".$year."\" and sec_id=\"".$section."\" ");
		  
		  mysqli_query($link,"delete from comments_lab where year=\"".$year."\" and sec_id=\"".$section."\" ");
		  
		  $table='fix_'.$year.'_'.$section;
		  mysqli_query($link,"delete from $table ");
		  
		  $table='feedback_data_'.$year;
		   mysqli_query($link,"delete from $table where sec_id=\"".$section."\" ");
		   
		  $table='feedback_data_lab_'.$year;
		    mysqli_query($link,"delete from $table where sec_id=\"".$section."\" ");
			
		  mysqli_query($link,"delete from feedback_details where year=\"".$year."\" and sec=\"".$section."\" ");
		  
		  mysqli_query($link,"delete from other_comments where year=\"".$year."\" and sec=\"".$section."\" ");
			
         $result=mysqli_query($link,"select year,sec from indi_details");
			$indi=0;
			while(list($y,$s)=mysqli_fetch_row($result))
			{
				if($y==$year&&$s==$section)
				{
					$indi=1;
					break;
				}
			}	
        if($indi==1)
        {			
		  mysqli_query($link,"delete from indi_details");
			  
		  mysqli_query($link,"delete from indi_comments");
			   
		  mysqli_query($link,"delete from indi_feedback_data");
		}
		
	  mysqli_close($link);
	  header('Location: ' . "menu.php?msg=Reset Done..");
?>