<?php
    session_start();
            if($_SESSION['sid']!=session_id() )
			{
			     header("location:feedback.php");
			}
    $_SESSION['two']=3;
    $link = mysqli_connect('localhost', 'root', '', 'feedback');
          if (!$link) {
              die("Connection failed: " . mysqli_connect_error());
          }

          $query="select year,section from temp;";
         $res = mysqli_query($link, $query);
         while(list($yr,$se)=mysqli_fetch_row($res))
         {
           $year=$yr;
           $sec=$se;
         }

        $len=$_POST['len'];
        $query = "SELECT no_of_labs FROM year_structure where year_no='".$year."' ";
        $result = mysqli_query($link, $query);
        $row=mysqli_fetch_array($result);
        $no_of_lab=$row[0];


      $query = "SELECT question FROM question_bank where overall='y' and ( status='For Boths' or status='For Labs' );";
      $result = mysqli_query($link, $query);
      $ques=array();
      $i=0;
      while(list($que)=mysqli_fetch_row($result))
      {
        $ques[$i++]=$que;
      }
      
	  $query = "SELECT stu_count_l from feedback_details where year=$year and sec=$sec ;";
      $res = mysqli_query($link, $query);
      $row=mysqli_fetch_row($res);
      $stu_count=$row[0];

      $stu_count++;

      $query = "update feedback_details set stu_count_l=$stu_count where year=$year and sec=$sec;";
      $res = mysqli_query($link, $query);
	  
      $table='feedback_data_lab_'.$year;
      //echo $table;

      for($i=1;$i<$len;$i++)
      {
        for($j=1;$j<=$no_of_lab;$j++)
        {
          $name='val_'.$j.'_'.$i;
          $val=$_POST[$name];

          $k=$i-1;
          if($val=='a')
          {
            $query = "SELECT a FROM $table where lab_id=$j and sec_id=$sec and question like '$ques[$k]';";
            $result = mysqli_query($link, $query);
            $row=mysqli_fetch_array($result);
            $count=$row[0];

            $count++;

            $query = "update $table set a=$count where lab_id=$j and sec_id=$sec and question like '$ques[$k]';";
            $result = mysqli_query($link, $query);
          }
          else if($val=='b')
          {
            
            $query = "SELECT b FROM $table where lab_id=$j and sec_id=$sec and question like '$ques[$k]';";
            $result = mysqli_query($link, $query);
            $row=mysqli_fetch_array($result);
            $count=$row[0];

            $count++;

            $query = "update $table set b=$count where lab_id=$j and sec_id=$sec and question like '$ques[$k]';";
            $result = mysqli_query($link, $query);
          }
          else if($val=='c')
          {
            
            $query = "SELECT c FROM $table where lab_id=$j and sec_id=$sec and question like '$ques[$k]';";
            $result = mysqli_query($link, $query);
            $row=mysqli_fetch_array($result);
            $count=$row[0];

            $count++;

            $query = "update $table set c=$count where lab_id=$j and sec_id=$sec and question like '$ques[$k]';";
            $result = mysqli_query($link, $query);
          }
          else if($val=='d')
          {
            
            $query = "SELECT d FROM $table where lab_id=$j and sec_id=$sec and question like '$ques[$k]';";
            $result = mysqli_query($link, $query);
            $row=mysqli_fetch_array($result);
            $count=$row[0];

            $count++;

            $query = "update $table set d=$count where lab_id=$j and sec_id=$sec and question like '$ques[$k]';";
            $result = mysqli_query($link, $query);
          }
        }
      }
      for($j=1;$j<=$no_of_lab;$j++)
      {
        //comments
          $area='area'.$j;
          $com=$_POST[$area];
          if($com!="" && $com!=" ")
          {
            $query = "insert into comments_lab(year,lab_id,sec_id,comment) values(\"".$year."\",\"".$j."\",\"".$sec."\",\"".$com."\") ";
            $result = mysqli_query($link, $query);

          }
      }
      
      mysqli_close($link);
      header('Location: ' . "thankyou.php"); 
?>