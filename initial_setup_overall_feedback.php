<?php
		session_start();
        
        $year=$_SESSION['year'];

	    $sec=$_SESSION['section'];
        $_SESSION['type_got']='gge';
		$link = mysqli_connect('localhost', 'root', '', 'feedback');
          if (!$link) {
              die("Connection failed: " . mysqli_connect_error());
          }
          
    //for subjects
       $table='section_details_'.$year.'_'.$sec;

		$query = "SELECT no_of_sub,semester FROM year_structure where year_no='".$year."' ";
      	$result = mysqli_query($link, $query);
      	$row=mysqli_fetch_array($result);
      	$sub=$row[0];
		$sem=$row[1];

        $query = "delete from comments where sec_id=$sec and year=$year;";
          $res = mysqli_query($link, $query);

        $query = "delete from comments_lab where sec_id=$sec and year=$year;";
          $res = mysqli_query($link, $query);

		 $query = "delete from other_comments where sec=$sec and year=$year;";
          $res = mysqli_query($link, $query);
		  
        $table='feedback_data_'.$year;

        $query = "delete from $table where sec_id=$sec;";
          $res = mysqli_query($link, $query);

		  $dep=$_SESSION['dep'];
		  
		mysqli_query($link, "delete from feedback_details where year=\"".$year."\" and sec=\"".$sec."\" ");
        date_default_timezone_set("Asia/Kolkata");
          $d="".date("d-m-y")."";
		  $g=0;
		  $query="insert into feedback_details(year,sec,date,stu_count,stu_count_l,sem,dept) values(\"".$year."\",\"".$sec."\",\"".$d."\",\"".$g."\",\"".$g."\",\"".$sem."\",\"".$dep."\")";
		  mysqli_query($link,$query);
        
      	  $query = "SELECT question FROM question_bank where overall='y' and ( status='For Subjects' or status='For Boths' );";
          $res = mysqli_query($link, $query);
      
      
      while(list($ques)=mysqli_fetch_row($res))
      {
		  //echo "question: ".$ques;
		  //echo "<br><br>";
      		for($i=1;$i<=$sub;$i++)
      		{
      			$query="insert into $table (question,sub_id,sec_id) values ('$ques',$i,$sec);";
            	$result = mysqli_query($link, $query);	
            	if($result<=0)
		        {
					$query="update $table set question='$ques' where sub_id=$i and sec_id=$sec;";
            	  $result = mysqli_query($link, $query);
		        }
      		}
      }

    //for labs

		$query = "SELECT no_of_labs FROM year_structure where year_no='".$year."' ";
      	$result = mysqli_query($link, $query);
      	$row=mysqli_fetch_array($result);
      	$lab=$row[0];

        $table='feedback_data_lab_'.$year;

        $query = "delete from $table where sec_id=$sec;";
          $res = mysqli_query($link, $query);
        
      	$query = "SELECT question FROM question_bank where overall='y' and ( status='For Labs' or status='For Boths' );";
          $res = mysqli_query($link, $query);
      
      
      while(list($ques)=mysqli_fetch_row($res))
      {
      		for($i=1;$i<=$lab;$i++)
      		{
      			$query="insert into $table (question,lab_id,sec_id) values (\"".$ques."\",$i,$sec);";
            	$result = mysqli_query($link, $query);	
            	if($result<=0)
		        {
		          $query="update $table set question='$ques' where lab_id=$i and sec_id=$sec;";
            	  $result = mysqli_query($link, $query);
		        }
      		}
      }
	 $fix='fix_'.$year.'_'.$sec;
     mysqli_query($link,"drop table $fix ");
	 $table='section_details_'.$year.'_'.$sec;
	 mysqli_query($link,"create table $fix as ( select * from $table ) ");
	 $query = "update temp set feed=2 ";
          $result = mysqli_query($link, $query);
		 $result = mysqli_query($link, "update temp set fl='o' ");
		  
	  mysqli_close($link);
	  header('Location: ' . "running.php");	
?>