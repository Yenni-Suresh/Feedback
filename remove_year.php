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
          $no_of_years=$count[0];
		  if($no_of_years>=2)
		  {
			  $query = "select no_of_sec from year_structure where year_no=$no_of_years; ";

              $result=mysqli_query($link, $query);
              $val=mysqli_fetch_array($result);

              $table='section_details_'.$no_of_years;
              $fix='fix_'.$no_of_years;
			  $i=0;
              while($i<=$val[0])
			  {
				  $table_name=$table.'_'.$i;
				  mysqli_query($link,"drop table $table_name ");
				  $table_name=$fix.'_'.$i;
				  mysqli_query($link,"drop table $table_name ");
				  $i++;
			  }
			  
			  $query = "delete from other_comments where year=$no_of_years;";     
              mysqli_query($link, $query);
			  
              $query = "delete from year_structure where year_no=$no_of_years;";     
              mysqli_query($link, $query);
			  
			  $query="delete from feedback_details where and year=\"".$no_of_years."\" ;";
      			mysqli_query($link, $query);

              $table='feedback_data_'.$no_of_years;
            
              mysqli_query($link,"drop table $table");
			
			  $table='feedback_data_lab_'.$no_of_years;
            
              mysqli_query($link,"drop table $table");

              mysqli_close($link);
			  header('Location: ' . "structure_year.php?msg=Removed+Year..");
          }
          else header('Location: ' . "structure_year.php?msg=Reached Minimum Limit..");

?>