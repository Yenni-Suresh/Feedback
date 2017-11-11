<html>
<head></head>
<body>
<?php
 
	if( isset($_POST['1']))
	{
		$sec=$_POST['1st_section'];
		$sub=$_POST['1st_subject'];
		$labs=$_POST['1st_lab'];
		$year=1;
	}
	else if( isset($_POST['2']))
	{
		$sec=$_POST['2nd_section'];
		$sub=$_POST['2nd_subject'];
		$labs=$_POST['2nd_lab'];
		$year=2;
	}
	else if( isset($_POST['3']))
	{
		$sec=$_POST['3rd_section'];
		$sub=$_POST['3rd_subject'];
		$labs=$_POST['3rd_lab'];
		$year=3;
	}
	else if( isset($_POST['4']))
	{
		$sec=$_POST['4th_section'];
		$sub=$_POST['4th_subject'];
		$labs=$_POST['4th_lab'];
		$year=4;
	}
	else if( isset($_POST['5']))
	{
		$sec=$_POST['5th_section'];
		$sub=$_POST['5th_subject'];
		$labs=$_POST['5th_lab'];
		$year=5;
	}
	else if( isset($_POST['6']))
	{
		$sec=$_POST['6th_section'];
		$sub=$_POST['6th_subject'];
		$labs=$_POST['6th_lab'];
		$year=6;
	}
	else if( isset($_POST['7']))
	{
		$sec=$_POST['7th_section'];
		$sub=$_POST['7th_subject'];
		$labs=$_POST['7th_lab'];
		$year=7;
	}

          $link = mysqli_connect('localhost', 'root', '', 'feedback');
          // Check connection
          if (!$link) {
              die("Connection failed: " . mysqli_connect_error());
          }
          $query = "select no_of_sec,no_of_sub,no_of_labs from year_structure where year_no=$year; ";

          $result=mysqli_query($link, $query);
          $val=mysqli_fetch_array($result);

          $table='section_details_'.$year.'_';
          $fix='fix_'.$year.'_';
          if($sec > $val[0])
          {
          			$val[0]++;
          		for($i=$val[0];$i<=$sec;$i++)
          		{
          			$table_name=$table.$i;
          			$query="create table $table_name (id int PRIMARY KEY, fac_name varchar(30), sub_name varchar(30) , lab_name varchar(30));";
          			mysqli_query($link, $query);

          			$table_name=$fix.$i;
          			$query="create table $table_name (id int PRIMARY KEY, fac_name varchar(30), sub_name varchar(30) , lab_name varchar(30));";
          			mysqli_query($link, $query);

          		}
          }
          else if($sec < $val[0])
          {
      		for($i=$val[0];$i>$sec;$i--)
      		{
      			$table_name=$table.$i;
      			$query="drop table $table_name;";
      			mysqli_query($link, $query);
                
				$t='feedback_data_'.$year;
				$query="delete from $t where sec_id=\"".$i."\" ;";
      			mysqli_query($link, $query); 
				
                $t='feedback_data_lab_'.$year;
				$query="delete from $t where sec_id=\"".$i."\" ;";
      			mysqli_query($link, $query);
			
				$query="delete from other_comments where sec=\"".$i."\" and year=\"".$year."\" ;";
      			mysqli_query($link, $query);
				
				$query="delete from feedback_details where sec=\"".$i."\" and year=\"".$year."\" ;";
      			mysqli_query($link, $query);
				
      			$table_name=$fix.$i;
      			$query="drop table $table_name;";
      			mysqli_query($link, $query);

          	}
          }
		  if($sub < $val[1])
		  {
			  if($sub>$val[2])
				  $x=$sub;
			  else $x=$val[2];
			  $j=1;
			  while($j<=$sec)
			  {
				  $table_name=$table.$j;
			    for($i=$val[1];$i>$x;$i--)
				  mysqli_query($link,"delete from $table_name where id=\"".$i."\" ");
			  $j++;
			  }
		  }
		  if($labs < $val[2])
		  {
			  if($labs>$val[1])
				  $x=$labs;
			  else $x=$val[1];
			  $j=1;
			  while($j<=$sec)
			  {
				  $table_name=$table.$j;
			    for($i=$val[2];$i>$x;$i--)
				  mysqli_query($link,"delete from $table_name where id=\"".$i."\" ");
			  $j++;
			  }
		  }
          $query = "update year_structure set no_of_sec=$sec, no_of_sub=$sub, no_of_labs=$labs where year_no=$year; ";

          mysqli_query($link, $query);
      		 
      	  mysqli_close($link);

  		header('Location: ' . "decide_section.php?msg=Updated+input..");
?>
</body>
</html>