<?php
        session_start();
        $val=$_POST['decide'];
        $year=$_SESSION['year'];
        $section=$_SESSION['section'];
		$_SESSION['type_got']=$val;

        $link = mysqli_connect('localhost', 'root', '', 'feedback');
          // Check connection
          if (!$link) {
              die("Connection failed: " . mysqli_connect_error());
              echo "connection failed";
          }

          $query = "delete from indi_feedback_data;";
          $result = mysqli_query($link, $query);

          $query = "delete from indi_comments;";
          $result = mysqli_query($link, $query);

		  if($val=='fac')
          {
            $result = mysqli_query($link, "update temp set fl='s' ");
		  }
		  else if($val=='sub')
		  {
			  $result = mysqli_query($link, "update temp set fl='s' ");
		  }
          else $result = mysqli_query($link, "update temp set fl='l' ");
		  $query = "update temp set feed=1 ";
          $result = mysqli_query($link, $query);
		  
		  if($val=='fac')   
          {
             $temp=$_POST['faculty'];
			 $type='s';
          }
          else if($val=='sub')   
         {
              $temp=$_POST['subject'];
			  $type='s';
         }
         else if($val=='lab')    
         {
              $temp=$_POST['lab'];
			  $type='l';
		  } 
		  
		  mysqli_query($link, "delete from indi_details");
		  date_default_timezone_set("Asia/Kolkata");
          $d=date("d-m-y");
		  $g=0;
		  
		  $table="section_details_".$year."_".$section;
		  $dep=$_SESSION['dep'];
		  
		  $query = "SELECT semester from year_structure where year_no=$year;";
		  	$res = mysqli_query($link, $query);
		  	$row=mysqli_fetch_row($res);
		  	$sem=$row[0];
			
		  if($type=='s')
		  {
		    $query = "SELECT sub_name,fac_name FROM $table where id=$temp;";
		    $result=mysqli_query($link,$query);
		    $details=mysqli_fetch_row($result);
		    $query="insert into indi_details(year,sec,date,stu_count,type,sub_lab,faculty,dept,sem) values(\"".$year."\",\"".$section."\",\"".$d."\",\"".$g."\",\"".$type."\",\"".$details[0]."\",\"".$details[1]."\",\"".$dep."\",\"".$sem."\")";
		  }
		  else if($type=='l')
		  {
		    $query = "SELECT lab_name FROM $table where id=$temp;";
		    $result=mysqli_query($link,$query);
		    $details=mysqli_fetch_row($result);
		    $query="insert into indi_details(year,sec,date,stu_count,type,sub_lab,dept,sem) values(\"".$year."\",\"".$section."\",\"".$d."\",\"".$g."\",\"".$type."\",\"".$details[0]."\",\"".$dep."\",\"".$sem."\")";
		  }
		  mysqli_query($link,$query);
		  
          header('Location: ' . "running.php");
 
?>