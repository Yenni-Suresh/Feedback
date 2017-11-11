<?php
		session_start();
        $year=$_SESSION['year'];
	  	echo $year;
	    $sec=$_SESSION['section'];

		$link = mysqli_connect('localhost', 'root', '', 'feedback');
          if (!$link) {
              die("Connection failed: " . mysqli_connect_error());
          }
        $len=$_POST['len'];
		$query = "SELECT no_of_labs FROM year_structure where year_no='".$year."' ";
      	$result = mysqli_query($link, $query);
      	$row=mysqli_fetch_array($result);
     	$no_of_sub=$row[0];

     	
     	$table='section_details_'.$year.'_'.$sec;
     	for($i=1;$i<$len;$i++)
     	{
     		$no_of_as=0;
	     	$no_of_bs=0;
	     	$no_of_cs=0;
	     	$no_of_ds=0;
     		for($j=1;$j<=$no_of_sub;$j++)
     		{
     			$name='val_'.$j.'_'.$i;
     			$val=$_POST[$name];
     			if($val=='a')
     				$no_of_as++;
     			else if($val=='b')
     				$no_of_bs++;
     			else if($val=='c')
     				$no_of_cs++;
     			else if($val=='d')
     				$no_of_ds++;
     		}
     		$query = "update $table set no_of_as=$no_of_as,no_of_bs=$no_of_bs,no_of_cs=$no_of_cs,no_of_ds=$no_of_ds where id=$i;";
      	  	$result = mysqli_query($link, $query);
     	}

     	
      	mysqli_close($link);
      	header('Location: ' . "thankyou.html");	
?>









