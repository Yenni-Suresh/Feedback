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
		  if($no_of_years<=6)
		  {
            $no_of_years++;

            $query = "insert into year_structure values($no_of_years,'-NA-',1,0,0,0);";     //need to modify this
            mysqli_query($link, $query);

            $table='feedback_data_'.$no_of_years;
            $query = "create table $table (question varchar(300),sub_id int(11),sec_id int(11), a int(11) not null default 0, b int(11) not null default 0, c int(11) not null default 0, d int(11) not null default 0);";
            mysqli_query($link, $query);
			
			$table='feedback_data_lab_'.$no_of_years;
            $query = "create table $table (question varchar(300),lab_id int(11),sec_id int(11), a int(11) not null default 0, b int(11) not null default 0, c int(11) not null default 0, d int(11) not null default 0);";
            mysqli_query($link, $query);

            mysqli_close($link);
			header('Location: ' . "structure_year.php?msg=Added+Year..");
          }
          else header('Location: ' . "structure_year.php?msg=Reached Maximum Limit..");

?>