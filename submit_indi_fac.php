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

      $query="select year,sec from indi_details;";
      $res = mysqli_query($link, $query);
      while(list($yr,$sec)=mysqli_fetch_row($res))
      {
        $year=$yr;
        $section=$sec;
      }

      $len=$_POST['len'];

      $query = "SELECT question FROM question_bank where indi='y' and ( status='For Subjects' or status='For Boths' );";
      $res = mysqli_query($link, $query);

      $i=1;
      $table='indi_feedback_data';
      while(list($ques)=mysqli_fetch_row($res))
      {
        $query="insert into $table (id,question,no_of_a,no_of_b,no_of_c,no_of_d) values ($i,'$ques',0,0,0,0);";
        $result = mysqli_query($link, $query);
        $i+=1;
      }

      //increment student count
      $query = "SELECT stu_count from indi_details";
      $res = mysqli_query($link, $query);
      $row=mysqli_fetch_array($res);
      $stu_count=$row[0];

      $stu_count++;

      $query = "update indi_details set stu_count=\"".$stu_count."\" ";
      $res = mysqli_query($link, $query);

	  
        $com=$_POST['area'];
        if($com!="" && $com!=" ")
        {
          $query = "insert into indi_comments values (\"".$com."\")";
          mysqli_query($link, $query);
        }

      $i=1;
      while($i<$len)
      {
        $query = "SELECT no_of_a,no_of_b,no_of_c,no_of_d from $table where id=$i;";
        $res = mysqli_query($link, $query);
        while(list($a,$b,$c,$d)=mysqli_fetch_row($res))
        {
            $no_of_as=$a;
            $no_of_bs=$b;
            $no_of_cs=$c;
            $no_of_ds=$d;
        }
        //echo $i.' and '.$len;
        
        $val=$_POST[$i];
   			if($val=='a')
   				$no_of_as+=1;
   			else if($val=='b')
   				$no_of_bs+=1;
   			else if($val=='c')
   				$no_of_cs+=1;
   			else if($val=='d')
   				$no_of_ds+=1;
   		  
          $query = "update $table set no_of_a=$no_of_as, no_of_b=$no_of_bs, no_of_c=$no_of_cs, no_of_d=$no_of_ds where id=$i;";
          $result = mysqli_query($link, $query);
          
          //insert faculty name in first row.
          /*if($i==1)
          {
            //echo $i;
            $temp=$feed;
            $table='section_details_'.$year.'_'.$section;
            $query = "SELECT fac_name FROM $table where id=$temp;";
            $result = mysqli_query($link, $query);
            $row=mysqli_fetch_array($result);
            $f_v=$row[0];
            
            $table='indi_feedback_data';
            $query = "update $table set faculty='$f_v' where id=1;";  
            $result = mysqli_query($link, $query);
          }*/
        $i+=1;
     	}
      
      mysqli_close($link);
      header('Location: ' . "thankyou.php");	
?>